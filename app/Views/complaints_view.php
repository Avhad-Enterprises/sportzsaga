<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->
<?php

$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
$username = 'awesomeboysboys@gmail.com';
$appPassword = 'qewa zvdp zwgl zohd';

$inbox = @imap_open($hostname, $username, $appPassword);

if (!$inbox) {
    echo 'Cannot connect to Gmail: ' . imap_last_error();
    exit;
}

if (isset($_POST['delete_id'])) {
    $deleteId = (int)$_POST['delete_id'];
    if (imap_delete($inbox, $deleteId)) {
        imap_expunge($inbox);
        $successMessage = "Email deleted successfully.";
    } else {
        $successMessage = "Failed to delete email.";
    }
}

$totalEmails = imap_num_msg($inbox);

$limit = 20;

$start = $totalEmails > $limit ? $totalEmails - $limit + 1 : 1;

function decodeBody($body, $encoding)
{
    if ($encoding == 3) {
        return base64_decode($body);
    } elseif ($encoding == 4) {
        return quoted_printable_decode($body);
    } else {
        return $body;
    }
}

$emails = [];
if ($totalEmails > 0) {
    for ($i = $totalEmails; $i >= $start; $i--) {
        $header = imap_headerinfo($inbox, $i);
        $subject = isset($header->subject) ? imap_utf8($header->subject) : "(No Subject)";
        $from = isset($header->from[0]) ? $header->from[0]->mailbox . '@' . $header->from[0]->host : "(Unknown Sender)";
        $fromName = isset($header->from[0]->personal) ? imap_utf8($header->from[0]->personal) : $from;
        $date = date('Y-m-d', strtotime($header->date));

        $structure = imap_fetchstructure($inbox, $i);
        $body = '';

        if (isset($structure->parts) && is_array($structure->parts)) {
            foreach ($structure->parts as $partNumber => $part) {
                if ($part->type == 0 && in_array($part->subtype, ['PLAIN', 'HTML'])) {
                    $body = decodeBody(imap_fetchbody($inbox, $i, $partNumber + 1), $part->encoding);
                    if ($part->subtype == 'PLAIN') {
                        $body = nl2br(htmlspecialchars($body));
                    }
                    break;
                }
            }
        } else {
            $body = decodeBody(imap_fetchbody($inbox, $i, 1), $structure->encoding);
            $body = nl2br(htmlspecialchars($body));
        }

        $isUnread = ($header->Unseen == 'U');

        $emails[] = [
            'subject' => $subject,
            'from' => $fromName,
            'body' => $body,
            'id' => $i,
            'date' => $date,
            'isUnread' => $isUnread
        ];
    }
}

function cleanEmailBody($body)
{
    $allowed_tags = '<b><i><u><a><p><br><img><ul><ol><li><strong><em>';
    $body = strip_tags($body, $allowed_tags);

    $body = nl2br($body);

    $body = preg_replace('/(https?:\/\/[^\s]+)/', '<a href="$1" target="_blank">$1</a>', $body);

    return $body;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply_to'])) {
    $replyToId = (int)$_POST['reply_to'];

    echo "Replying to email with ID: $replyToId";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forward_email'])) {
    $forwardEmailId = (int)$_POST['forward_email'];

    echo "Forwarding email with ID: $forwardEmailId";
}

imap_close($inbox);
?>

<body>

    <!-- Header View Start -->
    <?= $this->include('header_view') ?>
    <!-- Header View End -->

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Header View Start -->
    <?= $this->include('left_view') ?>
    <!-- Header View End -->

    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Email's</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        driphunter@gmail.com
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-box mb-30">
                            <div class="email-heading">
                                <h6 class="text-blue h6">Emails</h6>
                            </div>
                            <div class="pd-5">
                                <?php foreach ($emails as $email) : ?>
                                    <div class="email-item <?php echo $email['isUnread'] ? 'unread' : ''; ?>" onclick="showEmail('email-<?php echo $email['id']; ?>')">
                                        <h6><?php echo htmlspecialchars($email['subject']); ?></h6>
                                        <div class="email-subject" style="color: #212529;">
                                            <?php
                                            $bodyPreview = strip_tags($email['body']);
                                            echo htmlspecialchars(substr($bodyPreview, 0, 35)) . (strlen($bodyPreview) > 35 ? '...' : '');
                                            ?>
                                        </div>
                                        <span class="text-muted"><?php echo htmlspecialchars($email['date']); ?></span>
                                        <?php if ($email['isUnread']) : ?>
                                            <span class="badge badge-success ml-10">New</span>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-box mb-30">
                            <div class="pd-20">
                                <?php foreach ($emails as $email) : ?>
                                    <div id="email-<?php echo $email['id']; ?>" class="email-body">
                                        <h4><?php echo htmlspecialchars($email['subject']); ?></h4>
                                        <p><?php echo $email['body']; ?></p>
                                        <div class="actions-buttons">
                                            <form method="post" action="" onsubmit="return confirm('Are you sure you want to delete this email?');">
                                                <input type="hidden" name="delete_id" value="<?php echo $email['id']; ?>" />
                                                <button type="submit" class="btn btn-light"><i class="fas fa-trash"></i> Delete</button>
                                            </form>
                                            <form method="post" action="reply.php">
                                                <input type="hidden" name="reply_to" value="<?php echo $email['id']; ?>" />
                                                <button type="submit" class="btn btn-light"><i class="fas fa-reply"></i> Reply</button>
                                            </form>
                                            <form method="post" action="forward.php">
                                                <input type="hidden" name="forward_email" value="<?php echo $email['id']; ?>" />
                                                <button type="submit" class="btn btn-light"><i class="fas fa-share"></i> Forward</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
                <?php if (isset($successMessage)) : ?>
                    <div class="floating-message"><?php echo $successMessage; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

<!-- Footer View Start -->
<?= $this->include('footer_view') ?>
<!-- Footer View End -->

</html>