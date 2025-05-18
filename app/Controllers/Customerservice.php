<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Cuservicemodel;
use App\Models\ReplyModel;
use App\Models\Ordermanagement_model;
use App\Models\Registerusers_model;
use App\Models\TagModel;
use DOMDocument;
use DOMXPath;

class Customerservice extends BaseController
{
    protected $replyModel;
    public function __construct()
    {
        header('Content-Type: text/html; charset=utf-8');
        $this->replyModel = new ReplyModel();
    }

    public function fetchEmails()
    {
        try {
            log_message('info', 'Starting fetchEmails method');

            $model = new ReplyModel();

            // Process new emails first
            $this->processNewEmails();

            // Fetch email threads instead of individual emails
            $threadData = $model->getEmailThreads();
            log_message('info', 'Retrieved ' . count($threadData) . ' email threads');

            // Set proper content type header
            $this->response->setHeader('Content-Type', 'text/html; charset=utf-8');

            // Return the view with thread data
            return $this->response->setJSON([
                'status' => 'success'
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error in fetchEmails: ' . $e->getMessage());
            return 'Error loading emails. Please check logs for details.';
        }
    }


    private function cleanEmailContent($content, $type = 'html')
    {
        if (empty($content)) {
            return '';
        }

        // If it's plain text, convert to HTML with line breaks
        if ($type === 'plain') {
            return nl2br(htmlspecialchars($content));
        }

        // For HTML content
        try {
            // Remove common email client style blocks
            $content = preg_replace('/<style[^>]*>.*?<\/style>/is', '', $content);

            // Remove excessive whitespace
            $content = preg_replace('/\s+/', ' ', $content);

            // Remove common email client meta tags
            $content = preg_replace('/<meta[^>]*>/is', '', $content);

            // Clean up nested tables while preserving content
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            // Function to clean up nested tables
            $xpath = new \DOMXPath($dom);
            $tables = $xpath->query('//table');

            foreach ($tables as $table) {
                // If this table only contains one table, replace it with its content
                $nestedTables = $xpath->query('.//table', $table);
                if ($nestedTables->length === 1) {
                    $parent = $table->parentNode;
                    $content = $nestedTables->item(0);
                    $parent->replaceChild($content, $table);
                }
            }

            // Get the body content only
            $xpath = new \DOMXPath($dom);
            $body = $xpath->query('//body')->item(0);

            if ($body) {
                $cleanContent = '';
                foreach ($body->childNodes as $node) {
                    $cleanContent .= $dom->saveHTML($node);
                }
                return trim($cleanContent);
            }

            return $dom->saveHTML();
        } catch (\Exception $e) {
            log_message('error', 'Error cleaning email content: ' . $e->getMessage());
            return $content; // Return original content if cleaning fails
        }
    }








    private function getMessageParts($inbox, $msgno, $structure, $partNumber = "")
    {
        $data = [];

        try {

            // Handle multipart emails
            if ($structure->type == 1) {
                foreach ($structure->parts as $partNum => $part) {
                    $newPartNumber = $partNumber . ($partNumber ? "." : "") . ($partNum + 1);
                    $data = array_merge_recursive($data, $this->getMessageParts($inbox, $msgno, $part, $newPartNumber));
                }
            }
            // Handle text parts
            elseif ($structure->type == 0) {
                $content = imap_fetchbody($inbox, $msgno, $partNumber ?: 1);

                // Decode content based on encoding
                if ($structure->encoding == 3) { // BASE64
                    $content = base64_decode($content);
                } elseif ($structure->encoding == 4) { // QUOTED-PRINTABLE
                    $content = quoted_printable_decode($content);
                }

                // Handle character encoding
                $charset = $this->getCharset($structure);
                if ($charset && strtoupper($charset) !== 'UTF-8') {
                    $content = mb_convert_encoding($content, 'UTF-8', $charset);
                }

                // Store content based on type
                $type = strtolower($structure->subtype);
                if ($type == 'plain') {
                    $data['plain'] = $content;
                } elseif ($type == 'html') {
                    $data['html'] = $content;
                }
            }
            // Handle file attachments
            else if (
                isset($structure->disposition) &&
                strtolower($structure->disposition) == 'attachment'
            ) {
                $filename = '';
                if (isset($structure->dparameters[0])) {
                    $filename = $structure->dparameters[0]->value;
                } elseif (isset($structure->parameters[0])) {
                    $filename = $structure->parameters[0]->value;
                }

                if ($filename) {
                    $attachmentData = [
                        'filename' => $filename,
                        'content' => imap_fetchbody($inbox, $msgno, $partNumber ?: 1),
                        'encoding' => $structure->encoding,
                        'type' => $structure->type,
                        'subtype' => $structure->subtype,
                        'part_number' => $partNumber
                    ];
                    $data['attachments'][] = $attachmentData;
                }
            }
        } catch (\Exception $e) {
            log_message('error', 'Error processing message parts: ' . $e->getMessage());
        }

        return $data;
    }

    private function getCharset($structure)
    {
        if (isset($structure->parameters)) {
            foreach ($structure->parameters as $param) {
                if (strtolower($param->attribute) == 'charset') {
                    return $param->value;
                }
            }
        }
        if (isset($structure->dparameters)) {
            foreach ($structure->dparameters as $param) {
                if (strtolower($param->attribute) == 'charset') {
                    return $param->value;
                }
            }
        }
        return 'UTF-8';
    }


    // Modified processNewEmails method with better email content extraction
    public function processNewEmails()
    {
        // Set proper headers for AJAX response
        $this->response->setHeader('Content-Type', 'application/json');

        $model = new ReplyModel();

        try {
            log_message('info', 'Starting email processing');

            // ✅ Gmail IMAP Configuration
            $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
            $username = 'adityapatil93564@gmail.com';
            $password = 'tbhz kenk gsgj lzjs'; // Use App Password, NOT your Gmail password

            $inbox = imap_open($hostname, $username, $password);
            if (!$inbox) {
                throw new \Exception('Cannot connect to email: ' . imap_last_error());
            }

            $emails = imap_search($inbox, 'ALL');
            $processedCount = 0;

            if ($emails) {
                rsort($emails);

                foreach ($emails as $email_number) {
                    try {
                        $overview = imap_fetch_overview($inbox, $email_number, 0);

                        if (!$model->checkExistingEmail($overview[0]->msgno)) {
                            log_message('info', 'Processing new email: ' . $overview[0]->subject);

                            // Check if this is a reply to an existing email
                            $relatedEmail = $model->findRelatedEmail(
                                $this->decodeSubject($overview[0]->subject),
                                $overview[0]->from
                            );

                            // Get message structure
                            $structure = imap_fetchstructure($inbox, $email_number);

                            // Get message content
                            $messageData = $this->getMessageParts($inbox, $email_number, $structure);

                            // Process the email content
                            $emailContent = '';
                            if (!empty($messageData['html'])) {
                                $emailContent = $this->cleanEmailContent($messageData['html'], 'html');
                            } elseif (!empty($messageData['plain'])) {
                                $emailContent = $this->cleanEmailContent($messageData['plain'], 'plain');
                            } else {
                                $rawContent = imap_body($inbox, $email_number);
                                $emailContent = $this->cleanEmailContent($rawContent, 'plain');
                            }

                            // Clean the content
                            //$emailContent = strip_tags($emailContent);
                            //$emailContent = preg_replace('/\s+/', ' ', $emailContent);
                            $emailContent = trim($emailContent);

                            // Get user ID if sender exists in users table
                            $fromEmail = $overview[0]->from;
                            $userId = $model->getUserIdByEmail($fromEmail);

                            // Get tags based on message content
                            $tags = $model->getTagsForMessage($emailContent);
                            $tagsString = implode(',', $tags);

                            // Get agent based on primary tag
                            $assignedAgent = $model->getAgentForTags($tags);

                            // Prepare email data
                            $emailData = [
                                'msg_no' => $overview[0]->msgno,
                                'subject' => $this->decodeSubject($overview[0]->subject),
                                'from_email' => $overview[0]->from,
                                'user_id' => $userId,
                                'full_message' => $emailContent,
                                'email_date' => date('Y-m-d H:i:s', strtotime($overview[0]->date)),
                                'tags' => $tagsString,
                                'assigned_agent' => $assignedAgent,
                                'status' => 'new',
                                'replied_to_msgno' => $relatedEmail ? $relatedEmail['msg_no'] : null
                            ];

                            // Save to database
                            $model->insert($emailData);
                            $processedCount++;

                            log_message('info', 'Email saved successfully: ' . $overview[0]->msgno .
                                ($relatedEmail ? ' (Reply to: ' . $relatedEmail['msg_no'] . ')' : ''));
                        }
                    } catch (\Exception $e) {
                        log_message('error', 'Error processing individual email: ' . $e->getMessage());
                        continue;
                    }
                }
            }

            imap_close($inbox);
            log_message('info', 'Email processing completed. Processed ' . $processedCount . ' new emails');

            return $this->response->setJSON([
                'status' => 'success',
                'processed' => $processedCount
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error processing emails: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    private function sanitizeHtml($html)
    {
        // Define allowed HTML tags with their allowed attributes
        $allowedTags = [
            'p' => ['style', 'class'],
            'br' => [],
            'strong' => [],
            'b' => [],
            'em' => [],
            'i' => [],
            'u' => [],
            'h1' => ['style', 'class'],
            'h2' => ['style', 'class'],
            'h3' => ['style', 'class'],
            'h4' => ['style', 'class'],
            'h5' => ['style', 'class'],
            'h6' => ['style', 'class'],
            'ul' => ['style', 'class'],
            'ol' => ['style', 'class'],
            'li' => ['style', 'class'],
            'span' => ['style', 'class'],
            'div' => ['style', 'class'],
            'table' => ['style', 'class', 'width', 'border'],
            'tr' => ['style', 'class'],
            'td' => ['style', 'class', 'colspan', 'rowspan'],
            'th' => ['style', 'class', 'colspan', 'rowspan'],
            'tbody' => [],
            'thead' => [],
            'a' => ['href', 'title', 'class', 'style'],
            'img' => ['src', 'alt', 'title', 'style', 'class', 'width', 'height'],
            'font' => ['color', 'size', 'face'],
            'blockquote' => ['style', 'class']
        ];

        // First, remove any potentially harmful HTML tags and attributes
        $dom = new \DOMDocument();
        // Handle potential parsing errors gracefully
        libxml_use_internal_errors(true);
        // Load HTML with UTF-8 encoding
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        $nodes = $xpath->query('//*');

        // Remove disallowed tags and attributes
        foreach ($nodes as $node) {
            if (!isset($allowedTags[$node->nodeName])) {
                // If tag is not allowed, replace it with its contents
                while ($node->hasChildNodes()) {
                    $node->parentNode->insertBefore($node->firstChild, $node);
                }
                $node->parentNode->removeChild($node);
            } else {
                // Remove disallowed attributes
                $allowedAttributes = $allowedTags[$node->nodeName];
                foreach ($node->attributes as $attribute) {
                    if (!in_array($attribute->nodeName, $allowedAttributes)) {
                        $node->removeAttribute($attribute->nodeName);
                    }
                }
            }
        }

        // Get cleaned HTML
        $cleanHtml = $dom->saveHTML();
        return $cleanHtml;
    }

    private function decodeSubject($subject)
    {
        $subject = imap_mime_header_decode($subject);
        $decodedSubject = '';
        foreach ($subject as $part) {
            $decodedSubject .= $part->text;
        }
        return $decodedSubject;
    }

    public function customerEmailView($msgno)
    {
        log_message('info', 'Starting to fetch complete email thread for message number: ' . $msgno);
        $model = new ReplyModel();

        try {
            $conversationThread = $model->getCompleteThread($msgno);
            log_message('info', 'Found ' . count($conversationThread) . ' messages in complete thread');

            // ✅ Gmail IMAP Configuration
            $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
            $username = 'adityapatil93564@gmail.com';
            $password = 'tbhz kenk gsgj lzjs'; // Use App Password, NOT your Gmail password

            $inbox = imap_open($hostname, $username, $password);
            if (!$inbox) {
                throw new \Exception('Cannot connect to email server');
            }

            $threadData = [];
            foreach ($conversationThread as $message) {
                $messageData = [];
                $attachments = [];

                if ($message['message_type'] === 'received') {
                    // Existing IMAP attachment handling
                    $structure = imap_fetchstructure($inbox, $message['msg_no']);
                    $messageData = $this->getMessageParts($inbox, $message['msg_no'], $structure);

                    if (isset($messageData['attachments'])) {
                        foreach ($messageData['attachments'] as $key => $attachment) {
                            $tempPath = FCPATH . 'uploads/' . $attachment['filename'];
                            $decodedContent = $attachment['encoding'] == 3 ?
                                base64_decode($attachment['content']) :
                                quoted_printable_decode($attachment['content']);
                            file_put_contents($tempPath, $decodedContent);
                            $attachments[] = [
                                'filename' => $attachment['filename'],
                                'type' => $attachment['type'],
                                'subtype' => $attachment['subtype'],
                                'temp_path' => $tempPath
                            ];
                        }
                    }
                } else if ($message['message_type'] === 'sent' && !empty($message['attachments'])) {
                    // Handle stored attachments for sent messages
                    $storedAttachments = json_decode($message['attachments'], true);

                    foreach ($storedAttachments as $attachment) {
                        // Copy file to temporary location for consistent handling
                        $tempFilename = basename($attachment['filepath']);
                        $tempPath = FCPATH . 'uploads/' . $attachment['filename'];

                        if (file_exists($attachment['filepath'])) {
                            copy($attachment['filepath'], $tempPath);

                            // Parse MIME type into type and subtype
                            list($mainType, $subType) = array_pad(explode('/', $attachment['filetype']), 2, 'unknown');

                            $typeMap = [
                                'text' => 0,
                                'multipart' => 1,
                                'message' => 2,
                                'application' => 3,
                                'audio' => 4,
                                'image' => 5,
                                'video' => 6,
                                'other' => 7
                            ];

                            $attachments[] = [
                                'filename' => $attachment['filename'],
                                'type' => $typeMap[$mainType] ?? 7,
                                'subtype' => strtoupper($subType),
                                'temp_path' => $tempPath
                            ];
                        }
                    }
                }

                // Prepare unified message format
                $threadData[] = [
                    'msg_no' => $message['msg_no'],
                    'subject' => $message['subject'],
                    'from' => $message['from_email'],
                    'to' => $message['to_email'],
                    'date' => $message['email_date'] ?? $message['created_at'],
                    'full_message' => $message['full_message'],
                    'message_type' => $message['message_type'],
                    'attachments' => $attachments,
                    'agentdata' => $message['assigned_agent'],
                    'tags' => $message['tags'] ?? [],
                    'user_id' => $message['user_id'] ?? null
                ];
            }

            if ($inbox) {
                imap_close($inbox);
            }
            log_message('info', 'Email thread processing completed successfully');

            return view('email_view', ['thread' => $threadData, 'email' => $threadData[0]]);
        } catch (\Exception $e) {
            log_message('error', 'Error processing email thread: ' . $e->getMessage());
            return view('error_view', ['error' => $e->getMessage()]);
        }
    }



    public function customerConversationView($id, $channel)
    {
        log_message('info', "Fetching conversation for ID: $id (Channel: $channel)");
        $model = new ReplyModel();
        $user = new Registerusers_model();
        $ordermodel = new Ordermanagement_model();
        $tagModel = new TagModel();

        try {
            // Fetch conversation based on channel type
            if ($channel === 'email') {
                $conversationThread = $model->getCompleteThread($id);
            } else {
                $conversationThread = $model->getLiveChatThread($id);
            }

            log_message('info', "Found " . count($conversationThread) . " messages in the conversation thread");

            $threadData = [];
            $attachments = [];
            $allTags = [];

            // Fetch ticket number
            $ticketDetails = $model->getTicketDetails($id);
            $ticketNo = $ticketDetails['ticket_no'] ?? null;
            $ticketStatus = $ticketDetails['ticket_status'] ?? null;

            // Initialize IMAP connection only if the channel is email
            if ($channel === 'email') {
                // ✅ Gmail IMAP Configuration
                $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
                $username = 'adityapatil93564@gmail.com';
                $password = 'tbhz kenk gsgj lzjs';

                $inbox = imap_open($hostname, $username, $password);
                if (!$inbox) {
                    throw new \Exception('Cannot connect to email server');
                }
            }

            foreach ($conversationThread as $message) {
                $messageData = [];
                $attachments = [];

                // Process email attachments
                if ($channel === 'email' && $message['message_type'] === 'received') {
                    $structure = imap_fetchstructure($inbox, $message['msg_no']);
                    $messageData = $this->getMessageParts($inbox, $message['msg_no'], $structure);

                    if (isset($messageData['attachments'])) {
                        foreach ($messageData['attachments'] as $attachment) {
                            $tempPath = FCPATH . 'uploads/' . $attachment['filename'];
                            $decodedContent = ($attachment['encoding'] == 3)
                                ? base64_decode($attachment['content'])
                                : quoted_printable_decode($attachment['content']);
                            file_put_contents($tempPath, $decodedContent);

                            $attachments[] = [
                                'filename' => $attachment['filename'],
                                'type' => $attachment['type'],
                                'subtype' => $attachment['subtype'],
                                'temp_path' => $tempPath
                            ];
                        }
                    }
                } elseif ($message['message_type'] === 'sent' && !empty($message['attachments'])) {
                    // Process sent email/live chat attachments
                    $storedAttachments = json_decode($message['attachments'], true);
                    foreach ($storedAttachments as $attachment) {
                        $tempPath = FCPATH . 'uploads/' . basename($attachment['filepath']);

                        if (file_exists($attachment['filepath'])) {
                            copy($attachment['filepath'], $tempPath);

                            list($mainType, $subType) = array_pad(explode('/', $attachment['filetype']), 2, 'unknown');
                            $typeMap = [
                                'text' => 0,
                                'multipart' => 1,
                                'message' => 2,
                                'application' => 3,
                                'audio' => 4,
                                'image' => 5,
                                'video' => 6,
                                'other' => 7
                            ];

                            $attachments[] = [
                                'filename' => $attachment['filename'],
                                'type' => $typeMap[$mainType] ?? 7,
                                'subtype' => strtoupper($subType),
                                'temp_path' => $tempPath
                            ];
                        }
                    }
                }

                if ($message['user_id']) {
                    $userdata = $user->getRegisteredUserData($message['user_id']);
                    $orderData = !empty($message['user_id']) ? $ordermodel->getuserOrderData($message['user_id']) : null;
                    $tracking = !empty($orderData['order_number']) ? $ordermodel->getOrderTracking($orderData['order_number']) : null;
                    //print_r($tracking);exit();
                }

                // Extract tags from each message and merge them
                if (!empty($message['tags'])) {
                    $tagsArray = explode(',', $message['tags']);
                    $allTags = array_merge($allTags, $tagsArray);
                }
                $uniqueTags = array_unique(array_map('trim', $allTags));
                $tags = $tagModel->findAll();
                // Prepare message data
                $threadData[] = [
                    'msg_no' => $message['msg_no'] ?? $message['session_id'],
                    'subject' => $message['subject'] ?? 'Live Chat Conversation',
                    'from' => $message['from_email'],
                    'to' => $message['to_email'] ?? 'Support Team',
                    'date' => $message['email_date'] ?? $message['created_at'],
                    'full_message' => $message['full_message'],
                    'message_type' => $message['message_type'],
                    'attachments' => $attachments,
                    'agentdata' => $message['assigned_agent'] ?? 'Unassigned',
                    'tags' => $message['tags'] ?? [],
                    'session_id' => $message['session_id'] ?? '',
                    'channel' => $message['channel'] ?? [],
                    'userdata' => $userdata ?? [],
                    'orderdata' => $orderData ?? [],
                    'tracking' => $tracking ?? [],
                    'user_id' => $message['user_id'] ?? null
                ];
            }

            if ($channel === 'email' && $inbox) {
                imap_close($inbox);
            }

            //print_r($threadData);exit();
            log_message('info', "Conversation processing completed successfully");

            // echo '<pre>';
            // print_r($threadData);
            // echo '</pre>';
            // exit();

            return view('email_view', [
                'thread' => $threadData,
                'tags' => $tags,
                'email' => $threadData[0],
                'channel' => $channel,
                'uniqueTags' => $uniqueTags,
                'ticketNo' => $ticketNo,
                'ticketStatus' => $ticketStatus
            ]);
        } catch (\Exception $e) {
            log_message('error', "Error processing conversation: " . $e->getMessage());
            return view('error_view', ['error' => $e->getMessage()]);
        }
    }

    // Helper method to decode email subjects
    private function decodeEmailSubject($string)
    {
        $elements = imap_mime_header_decode($string);
        $text = '';
        foreach ($elements as $element) {
            $text .= $element->text;
        }
        return $text;
    }

    public function downloadAttachment($filename)
    {
        log_message('info', 'Download requested for file: ' . $filename);

        // Verify this is an AJAX request
        if (!$this->request->isAJAX()) {
            log_message('error', 'Non-AJAX request detected for download');
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid request method']);
        }

        $tempPath = FCPATH . 'uploads/' . $filename;

        if (!file_exists($tempPath)) {
            log_message('error', 'Download file not found: ' . $tempPath);
            return $this->response->setStatusCode(404)->setJSON(['error' => 'File not found']);
        }

        try {
            log_message('info', 'Starting file download process for: ' . $filename);

            $fileContent = file_get_contents($tempPath);
            if ($fileContent === false) {
                throw new \Exception('Failed to read file');
            }

            // Get file mime type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($tempPath);

            // Set headers for file download
            $this->response->setHeader('Content-Type', $mimeType);
            $this->response->setHeader('Content-Disposition', 'attachment; filename="' . basename($filename) . '"');
            $this->response->setHeader('Content-Length', filesize($tempPath));
            $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
            $this->response->setHeader('Cache-Control', 'post-check=0, pre-check=0');
            $this->response->setHeader('Pragma', 'no-cache');

            // Send file content
            $this->response->setBody($fileContent);

            // Log successful download
            log_message('info', 'File download completed successfully: ' . $filename);

            // Clean up the temporary file
            unlink($tempPath);

            return $this->response;
        } catch (\Exception $e) {
            log_message('error', 'Error during file download: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'error' => 'Error downloading file',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Controller method addition - Add this to your existing controller
    public function getAttachmentPreview($filename)
    {
        log_message('info', 'Attempting to get preview for file: ' . $filename);

        $tempPath = FCPATH . 'uploads/' . $filename;

        if (!file_exists($tempPath)) {
            // If not in temp folder, check in email attachments folder
            $potentialPaths = glob(WRITEPATH . 'uploads/email_attachments/*/*/*/' . '*');
            $filePath = '';

            foreach ($potentialPaths as $path) {
                if (basename($path) === basename($filename)) {
                    $filePath = $path;
                    break;
                }
            }

            if ($filePath && file_exists($filePath)) {
                copy($filePath, $tempPath);
            }
        }

        if (!file_exists($tempPath)) {
            log_message('error', 'Preview file not found: ' . $tempPath);
            return $this->response->setJSON(['error' => 'File not found']);
        }

        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->file($tempPath);
        $fileSize = filesize($tempPath);

        log_message('info', 'File mime type: ' . $mimeType);

        $previewData = [
            'filename' => $filename,
            'mime_type' => $mimeType,
            'size' => $fileSize,
            'preview_type' => $this->getPreviewType($mimeType),
        ];

        if (in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif'])) {
            $previewData['content'] = base64_encode(file_get_contents($tempPath));
        } elseif ($mimeType === 'application/pdf') {
            $previewData['url'] = base_url('downloadAttachment/' . $filename);
        } else {
            $previewData['url'] = base_url('downloadAttachment/' . $filename);
        }

        log_message('info', 'Preview data prepared successfully for: ' . $filename);
        return $this->response->setJSON($previewData);
    }

    private function getPreviewType($mimeType)
    {
        $imageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $documentTypes = ['application/pdf'];
        $spreadsheetTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        if (in_array($mimeType, $imageTypes)) return 'image';
        if (in_array($mimeType, $documentTypes)) return 'pdf';
        if (in_array($mimeType, $spreadsheetTypes)) return 'spreadsheet';
        return 'generic';
    }

    public function view_attachment($filename)
    {
        // Define the path to the attachment storage (modify as necessary)
        $attachmentPath = '/path/to/attachments/' . $filename; // Adjust path

        // Check if the file exists
        if (file_exists($attachmentPath)) {
            // Determine the content type based on file extension
            $fileInfo = pathinfo($attachmentPath);
            $ext = strtolower($fileInfo['extension']);

            switch ($ext) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                case 'gif':
                    // Serve image files
                    header('Content-Type: image/' . $ext);
                    readfile($attachmentPath);
                    exit;
                case 'pdf':
                    // Serve PDF files
                    header('Content-Type: application/pdf');
                    readfile($attachmentPath);
                    exit;
                    // Add more cases as necessary for other file types
                default:
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('File type not supported for viewing');
            }
        } else {
            // Handle the case when the file doesn't exist
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Attachment not found');
        }
    }

    public function customerservice()
    {
        return view('customerservice_view');
    }

    public function statics()
    {
        return view('statics_view');
    }

    public function viewEmail($uid)
    {
        $db = \Config\Database::connect();

        // Get the original email from IMAP server
        // ✅ Gmail IMAP Configuration
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'adityapatil93564@gmail.com';
        $password = 'tbhz kenk gsgj lzjs';
        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect to Hostinger email: ' . imap_last_error());

        $overview = imap_fetch_overview($inbox, $uid, 0);
        $message = imap_fetchbody($inbox, $uid, 1);
        imap_close($inbox);

        // Fetch all replies related to this email UID from the database
        $builder = $db->table('email_replies');
        $replies = $builder->where('email_uid', $uid)->get()->getResultArray();

        return view('email_thread', [
            'overview' => $overview,
            'message' => $message,
            'replies' => $replies
        ]);
    }


    public function getAgents()
    {
        try {
            $model = new ReplyModel();
            $agents = $model->getAllAgents();
            log_message('info', 'Successfully fetched agents list');
            return $this->response->setJSON(['status' => 'success', 'agents' => $agents]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching agents: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function updateAssignedAgent()
    {
        try {
            $msgNo = $this->request->getPost('msg_no');
            $agentId = $this->request->getPost('agent_id');
            $userId = session()->get('user_id'); // Get user_id from session

            $model = new ReplyModel();
            $result = $model->updateAgent($msgNo, $agentId, $userId);

            log_message('info', "Agent updated for message $msgNo by user $userId");
            return $this->response->setJSON(['status' => 'success']);
        } catch (\Exception $e) {
            log_message('error', 'Error updating agent: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function updateTags()
    {
        $model = new ReplyModel();
        $userId = session()->get('user_id'); // Get user_id from session

        $msg_no = $this->request->getPost('msg_no');
        $tags = $this->request->getPost('tags'); // Comma-separated tags

        if (empty($msg_no) || empty($tags)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid input data.']);
        }

        try {
            // Update the tags in the database
            $model->updateTags($msg_no, $tags, $userId);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Tags updated successfully.']);
        } catch (\Exception $e) {
            log_message('error', 'Failed to update tags: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update tags.']);
        }
    }

    public function getMacros()
    {
        try {
            $tags = $this->request->getGet('tags');
            $model = new ReplyModel();

            // Fetch macros based on tags if provided, else fetch all
            $macros = $tags ? $model->getMacrosByTags($tags) : $model->getAllMacros();

            log_message('info', 'Successfully fetched macros for tags: ' . $tags);
            return $this->response->setJSON(['status' => 'success', 'macros' => $macros]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching macros: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function getMacroContenta()
    {
        try {
            $macroId = $this->request->getGet('macro_id');
            $userId = $this->request->getGet('user_id');

            log_message('info', 'Successfully fetched macro content for ID: ' . $macroId . $userId);

            $model = new ReplyModel();
            $macroContent = $model->getMacroContent($macroId);
            $userData = $model->getUserData($userId);
            $agentName = session()->get('admin_name');

            $content = "Hello, " . $userData->name . "\n\n" .
                $macroContent->reply_msg . "\n\n" .
                "Best regards,\n" . $agentName;

            log_message('info', 'Successfully fetched macro content for ID: ' . $macroId);
            return $this->response->setJSON(['status' => 'success', 'content' => $content]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching macro content: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function getMacroContent()
    {
        try {
            log_message('info', 'Fetching macro content');

            $macroId = $this->request->getGet('macro_id');
            $userId = $this->request->getGet('user_id');

            if (empty($macroId)) {
                throw new \Exception('Macro ID is required');
            }

            $model = new ReplyModel();
            $ordermodel = new Ordermanagement_model();
            $macroData = $model->getMacroContent($macroId);
            $orderData = !empty($userId) ? $ordermodel->getuserOrderData($userId) : null;
            $last5_orders = !empty($userId) ? $ordermodel->getlast5_ordersData($userId) : [];


            $userData = !empty($userId) ? $model->getUserData($userId) : null;
            $agentname = session()->get('admin_name');
            $agentemail = session()->get('admin_email');

            if ($macroData) {
                log_message('info', 'Macro content retrieved successfully');
                return $this->response->setJSON([
                    'status' => 'success',
                    'cs_tags' => $macroData['cs_tags'],
                    'reply_type' => $macroData['reply_type'],
                    'to_email' => $macroData['to_email'],
                    'cc_email' => $macroData['cc_email'],
                    'bcc_email' => $macroData['bcc_email'],
                    'content' => $macroData['reply_msg'],
                    'macro_attachments' => $macroData['macro_attachments'],
                    'user' => $userData,
                    'agentname' => $agentname,
                    'agentemail' => $agentemail,
                    'last5_orders' => $last5_orders,
                    'order' => $orderData
                ]);
            } else {
                throw new \Exception('Macro not found');
            }
        } catch (\Exception $e) {
            log_message('error', 'Error fetching macro content: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }



    /*

Create the upload directory:

mkdir -p writable/uploads/email_attachments
chmod -R 777 writable/uploads/email_attachments

*/



    public function sendReply()
    {
        try {
            log_message('info', 'Starting sendReply process');

            // Get form input
            $msgno = $this->request->getPost('msg_no');
            $session_id = $this->request->getPost('session_id');
            $content = $this->request->getPost('content');
            $toEmails = $this->request->getPost('to_email');
            $ccEmails = $this->request->getPost('cc_email');
            $bccEmails = $this->request->getPost('bcc_email');
            $subject = $this->request->getPost('subject');
            $replyType = $this->request->getPost('reply_type');
            $channel = $this->request->getPost('channel'); // Check if it's email or livechat

            // Handle file uploads
            $uploadedFiles = [];
            $files = $this->request->getFiles();

            if (!empty($files)) {
                $uploadPath = WRITEPATH . 'uploads/email_attachments/' . date('Y/m/d/');
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                foreach ($files as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move($uploadPath, $newName);

                        $uploadedFiles[] = [
                            'filename' => $file->getClientName(),
                            'filepath' => $uploadPath . $newName,
                            'filetype' => $file->getClientMimeType()
                        ];
                    }
                }
            }

            $model = new ReplyModel();

            // **Handle Live Chat Messages**
            if ($channel === 'livechat') {
                log_message('info', 'Processing live chat message');

                $chatData = [
                    'msg_no' => 'livechat-' . uniqid(),
                    'session_id' => $session_id,  // msg_no is session_id for live chat
                    'sender' => 'team',
                    'user_id' => session()->get('user_id'),
                    'from_email' => session()->get('admin_name') . ' <' . session()->get('admin_email') . '>',
                    'full_message' => $content,
                    'message_type' => ($replyType === 'internal_note') ? 'internal_note' : 'sent',
                    //'attachments' => !empty($uploadedFiles) ? json_encode($uploadedFiles) : null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'channel' => 'livechat'
                ];

                $saved = $model->saveMessage($chatData);
                if (!$saved) {
                    log_message('error', 'Database insert returned false.');
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Failed to save live chat message. Please try again.'
                    ]);
                }
                log_message('info', 'Live chat message saved successfully.');
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Chat message sent successfully'
                ]);
            }

            // **Handle Email Replies**
            log_message('info', 'Processing email reply');

            if (empty($toEmails) && $replyType !== 'internal_note') {
                throw new \Exception('At least one recipient email is required.');
            }

            $emailData = [
                'msg_no' => time() . rand(1000, 9999),
                'user_id' => session()->get('user_id'),
                'subject' => $subject,
                'from_email' => session()->get('admin_name') . ' <' . session()->get('admin_email') . '>',
                'to_email' => $toEmails,
                'cc_email' => $ccEmails,
                'bcc_email' => $bccEmails,
                'full_message' => $content,
                'attachments' => !empty($uploadedFiles) ? json_encode($uploadedFiles) : null,
                'email_date' => date('Y-m-d H:i:s'),
                'assigned_agent' => session()->get('admin_name'),
                'message_type' => ($replyType === 'internal_note') ? 'internal_note' : 'sent',
                'replied_to_msgno' => $msgno,
                'channel' => 'email'
            ];

            $saved = $model->insert($emailData);
            if (!$saved) {
                throw new \Exception('Failed to save email message.');
            }

            // If not an internal note, send an actual email
            if ($replyType !== 'internal_note') {
                $email = \Config\Services::email();
                $email->setFrom('adityapatil93564@gmail.com', 'Sportzsaga Support');
                $email->setTo(explode(',', $toEmails));

                if (!empty($ccEmails)) {
                    $email->setCC(explode(',', $ccEmails));
                }

                if (!empty($bccEmails)) {
                    $email->setBCC(explode(',', $bccEmails));
                }

                $email->setSubject($subject);
                $email->setMessage($content);

                foreach ($uploadedFiles as $file) {
                    $email->attach($file['filepath']);
                }

                if (!$email->send()) {
                    throw new \Exception('Failed to send email: ' . $email->printDebugger(['headers']));
                }
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => $replyType === 'internal_note' ? 'Internal note saved' : 'Reply sent successfully'
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error in sendReply: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }




    public function getCSTags()
    {
        try {
            log_message('info', 'Fetching CS tags');
            $model = new ReplyModel();
            $tags = $model->getCSTagsList();
            return $this->response->setJSON(['status' => 'success', 'tags' => $tags]);
        } catch (\Exception $e) {
            log_message('error', 'Error fetching CS tags: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function saveMacro()
    {
        try {
            log_message('info', 'Starting macro save process');

            $data = [
                'macros_title' => $this->request->getPost('macros_title'),
                'cs_tags' => $this->request->getPost('cs_tags'),
                'reply_type' => $this->request->getPost('reply_type'),
                'to_email' => $this->request->getPost('to_email'),
                'cc_email' => $this->request->getPost('cc_email'),
                'bcc_email' => $this->request->getPost('bcc_email'),
                'reply_msg' => $this->request->getPost('reply_msg'),
                'macro_attachments' => $this->request->getPost('macro_attachments')
            ];

            $model = new ReplyModel();
            $saved = $model->saveMacro($data);

            if ($saved) {
                log_message('info', 'Macro saved successfully');
                return $this->response->setJSON(['status' => 'success']);
            } else {
                throw new \Exception('Failed to save macro');
            }
        } catch (\Exception $e) {
            log_message('error', 'Error saving macro: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }













    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function fetchConversations()
    {
        try {
            log_message('info', 'Fetching all conversations.');

            $conversations = $this->replyModel->getAllConversations();
            $agents = $this->replyModel->getAllAgents();
            $views = $this->replyModel->getSavedViews();
            $distinctValues = $this->replyModel->getDistinctValues();

            if (empty($conversations)) {
                log_message('warning', 'No conversations found.');
            }

            // Process each conversation to extract unique tags
            foreach ($conversations as &$conversation) {
                $conversation['unique_tags'] = $this->replyModel->getUniqueTagsForConversation($conversation['id'], $conversation['channel']);
                $conversation['ticket_no'] = $this->replyModel->getTicketNumber($conversation['id']);
            }

            log_message('info', 'Processed ' . count($conversations) . ' conversations with unique tags.');

            // Set proper content type header
            $this->response->setHeader('Content-Type', 'text/html; charset=utf-8');

            return view('emails_list', [
                'conversations' => $conversations,
                'agents' => $agents,
                'views' => $views,
                'distinctValues' => $distinctValues
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error in fetchConversations: ' . $e->getMessage());
            return 'Error loading conversations. Please check logs for details.';
        }
    }


    public function updateStatus()
    {
        $conversationIds = $this->request->getPost('conversation_ids');
        $status = $this->request->getPost('status');

        foreach ($conversationIds as $id) {
            $this->replyModel->updateStatus($id, $status);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function createTicket()
    {
        $conversationIds = $this->request->getPost('conversation_ids');

        foreach ($conversationIds as $id) {
            $this->replyModel->createTicket($id);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function closeTicket()
    {
        $conversationIds = $this->request->getPost('conversation_ids');

        foreach ($conversationIds as $id) {
            $this->replyModel->closeTicket($id);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function openTicket()
    {
        $conversationIds = $this->request->getPost('conversation_ids');

        foreach ($conversationIds as $id) {
            $this->replyModel->openTicket($id);
        }

        return $this->response->setJSON(['status' => 'success']);
    }







    public function createView()
    {
        $data = $this->request->getPost();

        $viewData = [
            'name' => $data['view_name'],
            'status_filter' => $data['status_value'],
            'status_operand' => $data['status_operand'],
            'channel_filter' => $data['channel_value'],
            'channel_operand' => $data['channel_operand'],
            'assignee_filter' => $data['user_value'],
            'assignee_operand' => $data['user_operand']
        ];

        if ($this->replyModel->saveView($viewData)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save view']);
        }
    }


    public function applyView($viewId)
    {
        log_message('info', "Applying view filter with ID: $viewId");

        $filteredConversations = $this->replyModel->getConversationsByView($viewId);

        if (empty($filteredConversations)) {
            log_message('warning', "No conversations found for view ID: $viewId");
        }

        // Extract matching conversation IDs
        $conversationIds = array_map(function ($conversation) {
            return (string) $conversation['id']; // Ensure IDs are strings for JavaScript
        }, $filteredConversations);

        log_message('info', 'Filtered Conversations IDs: ' . implode(',', $conversationIds));

        return $this->response->setJSON([
            'status' => 'success',
            'conversationIds' => $conversationIds
        ]);
    }

    public function updateView()
    {
        $data = $this->request->getPost();
        $this->replyModel->updateView($data['view_id'], $data);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function deleteView()
    {
        $data = $this->request->getPost();
        $this->replyModel->deleteView($data['view_id']);

        return $this->response->setJSON(['status' => 'success']);
    }



    public function sendComposeEmail()
    {
        try {
            log_message('info', 'Starting sendComposeEmail process');

            // Get form input
            $toEmails = $this->request->getPost('to_email');
            $ccEmails = $this->request->getPost('cc_email');
            $bccEmails = $this->request->getPost('bcc_email');
            $subject = $this->request->getPost('subject');
            $content = $this->request->getPost('content');

            // Validate required fields
            if (empty($toEmails)) {
                throw new \Exception('At least one recipient email is required.');
            }

            if (empty($subject)) {
                throw new \Exception('Subject cannot be empty.');
            }

            if (empty($content)) {
                throw new \Exception('Email content cannot be empty.');
            }

            // Handle file uploads
            $uploadedFiles = [];
            $files = $this->request->getFiles();

            if (!empty($files)) {
                $uploadPath = WRITEPATH . 'uploads/email_attachments/' . date('Y/m/d/');
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                foreach ($files as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move($uploadPath, $newName);

                        $uploadedFiles[] = [
                            'filename' => $file->getClientName(),
                            'filepath' => $uploadPath . $newName,
                            'filetype' => $file->getClientMimeType()
                        ];
                    }
                }
            }

            $model = new ReplyModel();

            // **Save Email Data in Database**
            $emailData = [
                'msg_no' => time() . rand(1000, 9999),
                'user_id' => session()->get('user_id'),
                'subject' => $subject,
                'from_email' => session()->get('admin_name') . ' <' . session()->get('admin_email') . '>',
                'to_email' => $toEmails,
                'cc_email' => $ccEmails,
                'bcc_email' => $bccEmails,
                'full_message' => $content,
                'attachments' => !empty($uploadedFiles) ? json_encode($uploadedFiles) : null,
                'email_date' => date('Y-m-d H:i:s'),
                'assigned_agent' => session()->get('admin_name'),
                'message_type' => 'sent',
                'channel' => 'email'
            ];

            $saved = $model->insert($emailData);
            if (!$saved) {
                throw new \Exception('Failed to save email message.');
            }

            // **Send Email**
            $email = \Config\Services::email();
            $email->setFrom('adityapatil93564@gmail.com', 'Sportzsaga Support');
            $email->setTo(explode(',', $toEmails));

            if (!empty($ccEmails)) {
                $email->setCC(explode(',', $ccEmails));
            }

            if (!empty($bccEmails)) {
                $email->setBCC(explode(',', $bccEmails));
            }

            $email->setSubject($subject);
            $email->setMessage($content);

            // Attach files
            foreach ($uploadedFiles as $file) {
                $email->attach($file['filepath']);
            }

            if (!$email->send()) {
                throw new \Exception('Failed to send email: ' . $email->printDebugger(['headers']));
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Email sent successfully'
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error in sendComposeEmail: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function ContactUsData()
    {
        $model = new ReplyModel();
        $data['inquiries'] = $model->getContactUsData();
        return view('contactus_data', $data);
    }
}
