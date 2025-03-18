<?php

namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $table = 'cs_mails';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'msg_no',
        'session_id',
        'subject',
        'from_email',
        'to_email',
        'user_id',
        'full_message',
        'attachments',
        'email_date',
        'tags',
        'assigned_agent',
        'status',
        'message_type',
        'replied_to_msgno',
        'cc_email',
        'bcc_email',
        'channel',
        'ticket_status',
        'ticket_no'
    ];

    public function checkExistingEmail($msgNo)
    {
        return $this->where('msg_no', $msgNo)->first();
    }

    public function getUserIdByEmail($email)
    {
        $db = db_connect();
        $query = $db->query("SELECT user_id FROM users WHERE email = ?", [$email]);
        $result = $query->getRow();
        return $result ? $result->id : null;
    }

    public function getTagsForMessage($message)
    {
        $db = db_connect();
        $tags = $db->table('cs_tags')->orderBy('priority', 'DESC')->get()->getResult();

        $matchedTags = [];
        foreach ($tags as $tag) {
            $keywords = explode(',', $tag->tag_keywords);
            $keywordCount = 0;

            foreach ($keywords as $keyword) {
                if (stripos($message, trim($keyword)) !== false) {
                    $keywordCount++;
                }
            }

            if ($keywordCount > 0) {
                $matchedTags[] = [
                    'tag_name' => $tag->tag_name,
                    'matches' => $keywordCount
                ];
            }
        }

        // Sort by number of matches
        usort($matchedTags, function ($a, $b) {
            return $b['matches'] - $a['matches'];
        });

        return array_column($matchedTags, 'tag_name');
    }

    public function getAgentForTags($tags)
    {
        if (empty($tags)) return null;

        $primaryTag = $tags[0];
        $db = db_connect();

        $query = $db->query("
            SELECT agent_name 
            FROM cs_agents 
            WHERE status = 'active' 
            AND FIND_IN_SET(?, cs_tags) > 0 
            ORDER BY RAND() 
            LIMIT 1
        ", [$primaryTag]);

        $result = $query->getRow();
        return $result ? $result->agent_name : null;
    }



    public function getAllAgents()
    {
        $db = db_connect();
        return $db->table('users')
            ->select('user_id, name, profile_img, agent_status')
            ->whereIn('account_type', ['employee', 'super_admin'])
            ->get()
            ->getResult();
    }

    public function getAgent($msgNo)
    {
        $db = db_connect();
        return $db->table('cs_mails')
            ->where('msg_no', $msgNo)
            ->get()
            ->getResult();
    }

    public function updateAgent($msgNo, $agentId, $userId)
    {
        $db = db_connect();
        return $db->table('cs_mails')
            ->where('msg_no', $msgNo)
            ->update([
                'assigned_agent' => $agentId,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }


    public function updateTags($msgNo, $tags, $userId)
    {
        $db = db_connect();
        return $db->table('cs_mails')
            ->where('msg_no', $msgNo)
            ->update([
                'tags' => $tags,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }

    public function getMacrosByTags($tags)
    {
        $db = db_connect();
        $tagArray = explode(',', $tags);

        $query = $db->table('cs_macros')
            ->groupStart()
            ->orWhereIn('cs_tags', $tagArray)
            ->groupEnd()
            ->get();

        return $query->getResult();
    }

    public function getAllMacros()
    {
        $db = db_connect();
        $query = $db->table('cs_macros')->get();
        return $query->getResult();
    }

    /*public function getMacroContent($macroId)
    {
        $db = db_connect();
        return $db->table('cs_macros')
                ->where('id', $macroId)
                ->get()
                ->getRow();
    }*/

    public function getUserData($userId)
    {
        $db = db_connect();
        return $db->table('users')
            ->where('user_id', $userId)
            ->get()
            ->getRow();
    }

    public function getEmailThread($msgNo)
    {
        $thread = [];
        $currentMsg = $msgNo;

        // First get all replies to this message
        $replies = $this->where('replied_to_msgno', $msgNo)
            ->orderBy('email_date', 'ASC')
            ->findAll();

        // Get the current message
        $currentEmail = $this->where('msg_no', $msgNo)->first();
        if ($currentEmail) {
            $thread[] = $currentEmail;

            // If this is a reply, get the original message and any other replies
            if ($currentEmail['replied_to_msgno']) {
                $originalAndOtherReplies = $this->getEmailThread($currentEmail['replied_to_msgno']);
                $thread = array_merge($thread, $originalAndOtherReplies);
            }
        }

        // Add all replies
        $thread = array_merge($thread, $replies);

        // Remove duplicates based on msg_no
        $uniqueThread = array_unique(array_column($thread, 'msg_no'));
        $thread = array_intersect_key($thread, $uniqueThread);

        // Sort by date
        usort($thread, function ($a, $b) {
            return strtotime($a['email_date']) - strtotime($b['email_date']);
        });

        return $thread;
    }

    public function findRelatedEmail($subject, $fromEmail)
    {
        // Remove common reply prefixes
        $cleanSubject = preg_replace('/^(RE:|Re:|FWD:|Fwd:)\s*/i', '', $subject);
        $cleanSubject = trim($cleanSubject);

        // Look for an existing email with matching subject (ignoring Re:/Fwd:)
        return $this->where('from_email', $fromEmail)
            ->like('subject', $cleanSubject)
            ->orderBy('email_date', 'DESC')
            ->first();
    }

    // Fetch email threads
    public function getEmailThreads()
    {
        log_message('info', 'Fetching email threads');

        // Get all root emails (those without replied_to_msgno)
        $rootEmails = $this->where('channel', 'email')
            ->where('replied_to_msgno IS NULL', null, false)
            ->orderBy('email_date', 'DESC')
            ->findAll();

        log_message('info', 'Found ' . count($rootEmails) . ' root emails');

        // Fetch replies and structure threads
        $threads = [];
        foreach ($rootEmails as $rootEmail) {
            $thread = [
                'type' => 'email',
                'root' => $rootEmail,
                'replies' => $this->where('replied_to_msgno', $rootEmail['msg_no'])
                    ->orderBy('email_date', 'DESC')
                    ->findAll(),
                'latest_date' => $rootEmail['email_date']
            ];

            // Update latest date if there are replies
            if (!empty($thread['replies'])) {
                $latestReply = max(array_column($thread['replies'], 'email_date'));
                $thread['latest_date'] = $latestReply;
            }

            $threads[] = $thread;
        }

        return $threads;
    }

    // Fetch live chat sessions
    public function getLiveChatSessions()
    {
        log_message('info', 'Fetching live chat sessions');

        // Get all unique live chat sessions
        $sessions = $this->where('channel', 'livechat')
            ->groupBy('session_id')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        log_message('info', 'Found ' . count($sessions) . ' live chat sessions');

        // Fetch messages for each session
        $chatSessions = [];
        foreach ($sessions as $session) {
            $chatMessages = $this->where('session_id', $session['session_id'])
                ->orderBy('created_at', 'ASC')
                ->findAll();

            $chatSessions[] = [
                'type' => 'livechat',
                'session' => $session,
                'messages' => $chatMessages,
                'latest_date' => $session['created_at']
            ];
        }

        return $chatSessions;
    }


    public function getCompleteThread($msgno)
    {
        log_message('info', 'Fetching complete thread for message: ' . $msgno);

        // First get the original message
        $originalMessage = $this->where('msg_no', $msgno)->first();
        if (!$originalMessage) {
            throw new \Exception('Original message not found');
        }

        // Get all related messages using recursive CTE
        $sql = "WITH RECURSIVE conversation_thread AS (
            -- Base case: start with the original message
            SELECT *, 0 as depth
            FROM cs_mails
            WHERE msg_no = ?
            
            UNION ALL
            
            -- Recursive case: get replies and related messages
            SELECT m.*, ct.depth + 1
            FROM cs_mails m
            INNER JOIN conversation_thread ct
            ON m.replied_to_msgno = ct.msg_no
            OR ct.msg_no = m.replied_to_msgno
            WHERE m.msg_no != ?
        )
        SELECT DISTINCT *
        FROM conversation_thread
        ORDER BY email_date ASC";

        $result = $this->db->query($sql, [$msgno, $msgno])->getResultArray();
        log_message('info', 'Found ' . count($result) . ' messages in thread');

        return $result;
    }

    public function getLiveChatThread($sessionId)
    {
        log_message('info', "Fetching complete live chat session for session ID: $sessionId");

        $result = $this->where('session_id', $sessionId)
            ->orderBy('created_at', 'ASC')
            ->findAll();

        log_message('info', 'Found ' . count($result) . ' messages in live chat session');
        return $result;
    }

    public function getCSTagsList()
    {
        return $this->db->table('cs_tags')
            ->select('id, tag_name')
            ->get()
            ->getResultArray();
    }

    public function saveMacro($data)
    {
        return $this->db->table('cs_macros')->insert($data);
    }

    // Modify your existing getMacroContent method to handle variables
    public function getMacroContent($macroId)
    {
        try {
            $builder = $this->db->table('cs_macros');
            $macro = $builder->select('cs_tags, reply_type, to_email, cc_email, bcc_email, reply_msg, macro_attachments')
                ->where('id', $macroId)
                ->get()
                ->getRowArray();

            if (!$macro) {
                log_message('error', 'Macro not found with ID: ' . $macroId);
                return null;
            }

            return $macro;
        } catch (\Exception $e) {
            log_message('error', 'Database error while fetching macro: ' . $e->getMessage());
            return null;
        }
    }

    private function replaceVariables($content)
    {
        preg_match_all('/`(.*?)`/', $content, $matches);

        foreach ($matches[1] as $variable) {
            $value = $this->getVariableValue($variable);
            $content = str_replace("`$variable`", $value, $content);
        }

        return $content;
    }

    private function getVariableValue($variable)
    {
        // Add logic to fetch appropriate data based on variable
        $userId = session()->get('current_user_id');

        switch ($variable) {
            case 'customer_name':
            case 'customer_email':
            case 'customer_mobile':
            case 'customer_address':
                $userData = $this->db->table('users')
                    ->where('id', $userId)
                    ->get()
                    ->getRow();
                return $userData->{$variable} ?? '';

            case 'recent_order_number':
            case 'recent_order_status':
                // Add cases for all order-related variables
                $orderData = $this->db->table('order_management')
                    ->where('user_id', $userId)
                    ->orderBy('order_date', 'DESC')
                    ->get()
                    ->getRow();
                return $orderData->{$variable} ?? '';

            case 'current_agent_name':
                return session()->get('admin_name');

            case 'current_admin_email':
                return session()->get('admin_email');
        }
    }




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getAllConversations()
    {
        log_message('info', 'Fetching all email and live chat conversations');

        $db = db_connect();

        // Fetch email threads (Root emails - those without replied_to_msgno)
        $emailThreads = $db->table('cs_mails')
            ->select('msg_no as id, subject, from_email, customer_name, assigned_agent, status, email_date, "email" as channel, replied_to_msgno, ticket_no, ticket_status')
            ->where('channel', 'email')
            ->where('replied_to_msgno IS NULL', null, false)  // Fetch only root emails
            ->orderBy('email_date', 'DESC')
            ->get()
            ->getResultArray();

        log_message('info', 'Fetched ' . count($emailThreads) . ' email threads.');

        // Fetch live chat sessions (Grouped by session_id)
        $chatSessions = $db->table('cs_mails')
            ->select('session_id as id, subject, from_email, customer_name, assigned_agent, status, created_at as email_date, "livechat" as channel, null as replied_to_msgno, ticket_no, ticket_status')
            ->where('channel', 'livechat')
            ->groupBy('session_id')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();

        log_message('info', 'Fetched ' . count($chatSessions) . ' live chat sessions.');

        // Merge both results
        $allConversations = array_merge($emailThreads, $chatSessions);

        // Sort by latest message date
        usort($allConversations, function ($a, $b) {
            return strtotime($b['email_date']) - strtotime($a['email_date']);
        });

        log_message('info', 'Total conversations fetched after merging: ' . count($allConversations));

        return $allConversations;
    }


    // Fetch complete thread or live chat messages
    public function getCompleteConversation($id, $channel)
    {
        log_message('info', 'Fetching conversation for ID: ' . $id . ' (Channel: ' . $channel . ')');

        if ($channel === 'email') {
            return $this->where('msg_no', $id)
                ->orWhere('replied_to_msgno', $id)
                ->orderBy('email_date', 'ASC')
                ->findAll();
        } elseif ($channel === 'livechat') {
            return $this->where('session_id', $id)
                ->orderBy('created_at', 'ASC')
                ->findAll();
        }

        return [];
    }


    public function saveChatMessage($data)
    {
        return $this->insert($data);
    }

    public function saveMessage($data)
    {
        log_message('info', 'Inserting chat/email message: ' . json_encode($data));

        $builder = $this->db->table('cs_mails');
        $inserted = $builder->insert($data);

        if (!$inserted) {
            $dbError = $this->db->error();
            log_message('error', 'Database insert failed: ' . json_encode($dbError));
            return false; // ✅ Return false instead of throwing an exception
        }

        log_message('info', 'Message saved successfully.');
        return true; // ✅ Return true when successful
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getUniqueTagsForConversation($id, $channel)
    {
        log_message('info', "Fetching unique tags for conversation ID: $id (Channel: $channel)");

        $db = db_connect();

        // Query to fetch all messages related to the conversation
        if ($channel === 'email') {
            $messages = $db->table('cs_mails')
                ->select('tags')
                ->where('msg_no', $id)
                ->orWhere('replied_to_msgno', $id)
                ->get()
                ->getResultArray();
        } else {
            $messages = $db->table('cs_mails')
                ->select('tags')
                ->where('session_id', $id)
                ->get()
                ->getResultArray();
        }

        // Extract and merge tags from all messages
        $allTags = [];
        foreach ($messages as $msg) {
            if (!empty($msg['tags'])) {
                $tagsArray = explode(',', $msg['tags']);
                $allTags = array_merge($allTags, $tagsArray);
            }
        }

        // Remove duplicates and return unique tags
        $uniqueTags = array_unique(array_map('trim', $allTags));

        log_message('info', 'Unique tags found: ' . implode(', ', $uniqueTags));

        return $uniqueTags;
    }

    public function getDistinctValues()
    {
        $db = db_connect();

        return [
            'statuses' => $db->table('cs_mails')->select('DISTINCT(status) as status')->get()->getResultArray(),
            'channels' => $db->table('cs_mails')->select('DISTINCT(channel) as channel')->get()->getResultArray(),
            'agents' => $db->table('cs_mails')->select('DISTINCT(assigned_agent) as assigned_agent')->get()->getResultArray(),
        ];
    }

    public function getTicketNumber($conversationId)
    {
        $db = db_connect();
        $result = $db->table('cs_mails')
            ->select('ticket_no', 'ticket_status')
            ->where('msg_no', $conversationId)
            ->orWhere('session_id', $conversationId)
            ->get()
            ->getRow();

        return $result ? $result->ticket_no : null;
    }

    public function getTicketDetails($conversationId)
    {
        $db = db_connect();
        return $db->table('cs_mails')
            ->select('ticket_no, ticket_status')
            ->where('msg_no', $conversationId)
            ->orWhere('session_id', $conversationId)
            ->get()
            ->getRowArray();
    }


    public function createTicket($conversationId)
    {
        $ticketNo = "TICKET-" . strtoupper(uniqid());
        $db = db_connect();

        $db->table('cs_mails')
            ->where('msg_no', $conversationId)
            ->orWhere('session_id', $conversationId)
            ->update([
                'ticket_no' => $ticketNo,
                'ticket_status' => 'opened'
            ]);

        return $ticketNo;
    }

    public function closeTicket($conversationId)
    {
        $db = db_connect();

        return $db->table('cs_mails')
            ->where('msg_no', $conversationId)
            ->orWhere('session_id', $conversationId)
            ->update(['ticket_status' => 'closed']);
    }

    public function openTicket($conversationId)
    {
        $db = db_connect();

        return $db->table('cs_mails')
            ->where('msg_no', $conversationId)
            ->orWhere('session_id', $conversationId)
            ->update(['ticket_status' => 'opened']);
    }

    public function updateStatus($conversationId, $status)
    {
        $db = db_connect();
        return $db->table('cs_mails')
            ->where('msg_no', $conversationId)
            ->orWhere('session_id', $conversationId)
            ->update(['status' => $status]);
    }


    public function saveView($data)
    {
        return $this->db->table('saved_views')->insert($data);
    }


    public function getSavedViews()
    {
        return $this->db->table('saved_views')->get()->getResultArray();
    }

    public function getConversationsByView($viewId)
    {
        log_message('info', "Fetching conversations for view ID: $viewId");

        $db = db_connect();

        // Fetch the saved view details
        $view = $db->table('saved_views')->where('id', $viewId)->get()->getRowArray();

        if (!$view) {
            log_message('error', "No view found for ID: $viewId");
            return [];
        }

        log_message('info', "View details: " . json_encode($view));

        // Build the base query to fetch email conversations
        $emailBuilder = $db->table('cs_mails')
            ->select('msg_no as id, subject, from_email, customer_name, assigned_agent, status, email_date, "email" as channel, replied_to_msgno')
            ->where('channel', 'email')
            ->where('replied_to_msgno IS NULL', null, false);  // Fetch only root emails

        // Apply filters for email conversations
        if (!empty($view['status_filter'])) {
            log_message('info', "Applying status filter: {$view['status_operand']} {$view['status_filter']}");
            if ($view['status_operand'] === 'is') {
                $emailBuilder->where('status', $view['status_filter']);
            } else {
                $emailBuilder->where('status !=', $view['status_filter']);
            }
        }

        if (!empty($view['channel_filter'])) {
            log_message('info', "Applying channel filter: {$view['channel_operand']} {$view['channel_filter']}");
            if ($view['channel_operand'] === 'is') {
                $emailBuilder->where('channel', $view['channel_filter']);
            } else {
                $emailBuilder->where('channel !=', $view['channel_filter']);
            }
        }

        if (!empty($view['assignee_filter'])) {
            log_message('info', "Applying assignee filter: {$view['assignee_operand']} {$view['assignee_filter']}");
            if ($view['assignee_operand'] === 'is') {
                $emailBuilder->where('assigned_agent', $view['assignee_filter']);
            } else {
                $emailBuilder->where('assigned_agent !=', $view['assignee_filter']);
            }
        }

        $emailThreads = $emailBuilder->orderBy('email_date', 'DESC')->get()->getResultArray();
        log_message('info', "Filtered email conversations count: " . count($emailThreads));

        // Build the base query to fetch live chat sessions
        $chatBuilder = $db->table('cs_mails')
            ->select('session_id as id, subject, from_email, customer_name, assigned_agent, status, created_at as email_date, "livechat" as channel, null as replied_to_msgno')
            ->where('channel', 'livechat')
            ->groupBy('session_id');

        // Apply filters for live chat conversations
        if (!empty($view['status_filter'])) {
            log_message('info', "Applying status filter for livechat: {$view['status_operand']} {$view['status_filter']}");
            if ($view['status_operand'] === 'is') {
                $chatBuilder->where('status', $view['status_filter']);
            } else {
                $chatBuilder->where('status !=', $view['status_filter']);
            }
        }

        if (!empty($view['channel_filter'])) {
            log_message('info', "Applying channel filter for livechat: {$view['channel_operand']} {$view['channel_filter']}");
            if ($view['channel_operand'] === 'is') {
                $chatBuilder->where('channel', $view['channel_filter']);
            } else {
                $chatBuilder->where('channel !=', $view['channel_filter']);
            }
        }

        if (!empty($view['assignee_filter'])) {
            log_message('info', "Applying assignee filter for livechat: {$view['assignee_operand']} {$view['assignee_filter']}");
            if ($view['assignee_operand'] === 'is') {
                $chatBuilder->where('assigned_agent', $view['assignee_filter']);
            } else {
                $chatBuilder->where('assigned_agent !=', $view['assignee_filter']);
            }
        }

        $chatSessions = $chatBuilder->orderBy('created_at', 'DESC')->get()->getResultArray();
        log_message('info', "Filtered live chat conversations count: " . count($chatSessions));

        // Merge results
        $allConversations = array_merge($emailThreads, $chatSessions);

        // Sort by latest message date
        usort($allConversations, function ($a, $b) {
            return strtotime($b['email_date']) - strtotime($a['email_date']);
        });

        log_message('info', 'Total filtered conversations after merging: ' . count($allConversations));

        return $allConversations;
    }


    public function updateView($viewId, $data)
    {
        return $this->db->table('saved_views')->where('id', $viewId)->update($data);
    }

    public function deleteView($viewId)
    {
        return $this->db->table('saved_views')->where('id', $viewId)->delete();
    }

    public function getContactUsData()
    {
        return $this->db->table('contact_us_form')->get()->getResultArray();
    }
}
