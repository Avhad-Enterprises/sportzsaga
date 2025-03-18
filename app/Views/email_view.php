<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

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
        <div class="pd-ltr-20 xs-pd-10-10">
            <div class="min-height-200px">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>
                                <span>
                                    <a href="<?= base_url('fetchConversations') ?>">
                                        <i class="bi bi-arrow-left-square-fill"></i>
                                    </a>
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- Page Main Content Start -->
                <div class="row">
                    <div class="col col-md-9">
                        <!-- email_view.php -->
                        <div>
                            <div class="row p-3">
                                <div class="col p-3 card-box">

                                    <strong id="ticket">
                                        <?php if (!empty($ticketNo)): ?>
                                            <?= esc($ticketNo) ?>
                                            (<?= esc($ticketStatus) ?>)
                                        <?php endif; ?>
                                    </strong>
                                    <h3 class="text-blue h3"><?= esc($email['subject']); ?></h3>

                                </div>
                                <div class="col-4">
                                    <label>Select Agent</label>
                                    <select class="form-control" id="agent-select" data-msgno="<?= $email['msg_no'] ?>">
                                        <option value="">Select Agent</option>
                                    </select>
                                    <input type="hidden" id="msg_no" value="<?= $email['msg_no'] ?>">
                                    <input type="hidden" id="user_id" value="<?= $email['user_id'] ?>">
                                </div>
                            </div>
                            <div>
                                <div class="conversation-thread mt-4">
                                    <?php foreach ($thread as $message): ?>
                                        <div class="message-container <?= $message['message_type'] ?> mb-3">
                                            <div class="card-box p-3 <?= getMessageCardClass($message['message_type']) ?>">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="avatar mr-2">
                                                        <img src="<?= $message['userdata']['profile_img'] ?? base_url('vendors/images/photo1.jpg') ?>"
                                                            class="border-radius-100"
                                                            width="40"
                                                            height="40"
                                                            style="object-fit: cover;aspect-ratio: 1;"
                                                            alt="">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">
                                                            <?= esc($message['from']) ?>
                                                            <?php if ($message['message_type'] === 'internal_note'): ?>
                                                                <span class="badge badge-warning ml-2">Internal Note</span>
                                                            <?php endif; ?>
                                                        </h6>
                                                        <small><?= date('M d, Y H:i', strtotime($message['date'])) ?></small>
                                                    </div>
                                                </div>

                                                <div class="message-content">
                                                    <?php if ($message['message_type'] === 'internal_note'): ?>
                                                        <div class="internal-note">
                                                            <?= nl2br($message['full_message']) ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="email-body">
                                                            <?= $message['full_message'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if (!empty($message['attachments'])): ?>
                                                    <div class="attachments mt-3">
                                                        <h6>Attachments:</h6>
                                                        <div class="attachment-previews row">
                                                            <?php foreach ($message['attachments'] as $attachment): ?>
                                                                <div class="col-md-3 mb-3">
                                                                    <div class="attachment-preview-card"
                                                                        data-filename="<?= esc($attachment['filename']) ?>"
                                                                        data-type="<?= strtolower($attachment['subtype']) ?>">
                                                                        <div class="preview-placeholder">
                                                                            <i class="fa fa-spinner fa-spin"></i>
                                                                        </div>
                                                                        <div class="attachment-info">
                                                                            <span class="filename"><?= esc($attachment['filename']) ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="modal fade" id="previewModal" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">File Preview</h5>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="preview-content"></div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" id="download-btn" onclick="downloadAttachment(this.getAttribute('data-filename'))">Download</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div>
                                <div id="replyModal" class="card-box p-3 mt-4">
                                    <!-- Display Unique Tags -->


                                    <div class="d-flex mb-20 justify-content-between">
                                        <div class="">
                                            <label>Tags</label>
                                        </div>
                                        <div class="">
                                            <!-- (+) Icon to open the modal -->
                                            <button type="button" class="btn btn-sm btn-primary" id="add-tag-btn" data-toggle="modal" data-target="#tagModal">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Dropdown for selecting tags with reduced size -->
                                    <div class="d-flex mb-20 justify-content-between">
                                        <div class="form-group">
                                            <select id="email-tags" name="email-tags[]" multiple="multiple" class="form-control custom-dropdown">
                                                <?php foreach ($tags as $tag): ?>
                                                    <option value="<?= $tag['tag_name']; ?>"
                                                        <?= in_array(trim($tag['tag_name']), $uniqueTags) ? 'selected' : ''; ?>>
                                                        <?= $tag['tag_name']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="tag-error" class="text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-primary" id="update-tag-btn" data-msgno="<?= $email['msg_no'] ?>">
                                                Update tags
                                            </button>
                                        </div>
                                    </div>


                                    <!-- Modal for Adding Tags -->
                                    <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tagModalLabel">Add New Tag</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="tag-form">
                                                        <div class="form-group">
                                                            <label for="tag_name">Tag Name</label>
                                                            <input type="text" id="tag_name" class="form-control" placeholder="Enter tag name">
                                                        </div>
                                                        <small id="tag-modal-error" class="text-danger"></small>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" id="save-tag-btn" class="btn btn-primary">Save Tag</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="form-group col-5">
                                            <label>Select Macro</label>
                                            <select class="form-control" id="macro-select">
                                                <option value="">Select Macro</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <div class="form-group p-3 mt-3 mr-3">
                                                <button type="button" class="btn form-control btn-primary" id="add-macros">Add Macros</button>
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-end">
                                            <div class="form-group  p-3 mt-3 ml-3">
                                                <select class="form-control" id="reply-type">
                                                    <option value="reply">Reply</option>
                                                    <?php if ($email['channel'] === 'email'): ?>
                                                        <option value="forward">Forward</option>
                                                    <?php endif; ?>
                                                    <option value="internal_note">Internal Note</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="email-options" class="mb-3">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" id="email-subject" value="<?= esc($email['subject']); ?>">
                                            <input type="hidden" id="channel" value="<?= $email['channel'] ?>">
                                            <input type="hidden" id="session_id" value="<?= $email['session_id'] ?>">

                                        </div>

                                        <?php if ($email['channel'] === 'email'): ?>
                                            <div class="email-field-container">
                                                <label>
                                                    To
                                                    <span class="cc-bcc-links">
                                                        <a href="#" class="cc-bcc-toggle" data-target="cc">Cc</a>
                                                        <a href="#" class="cc-bcc-toggle" data-target="bcc">Bcc</a>
                                                    </span>
                                                </label>
                                                <div class="email-tag-container form-control" id="to-container">
                                                    <input type="text" class="email-input" id="email-to" placeholder="Enter email addresses">
                                                </div>
                                            </div>

                                            <div class="email-field-container" id="cc-container" style="display: none;">
                                                <label>Cc</label>
                                                <div class="email-tag-container form-control">
                                                    <input type="text" class="email-input" id="email-cc" placeholder="Enter CC email addresses">
                                                </div>
                                            </div>

                                            <div class="email-field-container" id="bcc-container" style="display: none;">
                                                <label>Bcc</label>
                                                <div class="email-tag-container form-control">
                                                    <input type="text" class="email-input" id="email-bcc" placeholder="Enter BCC email addresses">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <div id="editor-reply-content" style="height: 200px;"></div>
                                        <input type="hidden" id="reply-content">
                                    </div>
                                    <?php if ($email['channel'] === 'email'): ?>
                                        <div class="form-group">
                                            <div class="attachment-upload-container">
                                                <button type="button" class="btn btn-secondary" id="add-attachment">
                                                    <i class="fa fa-paperclip"></i> Add Attachment
                                                </button>
                                                <input type="file" id="file-input" multiple style="display: none;">
                                            </div>
                                            <div class="attachment-previews row mt-3" id="upload-previews"></div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col">
                                        </div>
                                        <div class="col d-flex justify-content-end">
                                            <button type="button" class="btn btn-primary" id="send-reply">Send</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="addMacroModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add New Macro</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Macro Title</label>
                                                    <input type="text" class="form-control" id="macro-title">
                                                </div>

                                                <div class="form-group">
                                                    <label>CS Tags</label>
                                                    <div class="tag-container form-control" id="cs-tags-container">
                                                        <input type="text" class="tag-input" placeholder="Select tags..." readonly>
                                                        <input type="hidden" id="cs-tags-hidden">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Reply Type</label>
                                                    <select class="form-control" id="macro-reply-type">
                                                        <option value="reply">Reply</option>
                                                        <option value="forward">Forward</option>
                                                        <option value="internal_note">Internal Note</option>
                                                    </select>
                                                </div>

                                                <div id="macro-email-field">
                                                    <div class="email-field-container">
                                                        <label>To</label>
                                                        <div class="email-tag-container form-control" id="macro-to-container">
                                                            <input type="text" class="email-input" placeholder="Enter email addresses">
                                                            <input type="hidden" id="macro-to-hidden">
                                                        </div>
                                                    </div>

                                                    <div class="email-field-container">
                                                        <label>CC</label>
                                                        <div class="email-tag-container form-control" id="macro-cc-container">
                                                            <input type="text" class="email-input" placeholder="Enter CC email addresses">
                                                            <input type="hidden" id="macro-cc-hidden">
                                                        </div>
                                                    </div>

                                                    <div class="email-field-container">
                                                        <label>BCC</label>
                                                        <div class="email-tag-container form-control" id="macro-bcc-container">
                                                            <input type="text" class="email-input" placeholder="Enter BCC email addresses">
                                                            <input type="hidden" id="macro-bcc-hidden">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" id="macro-content-container">
                                                    <label>Content</label>
                                                    <div id="editor-macro-content" style="height: 200px;"></div>
                                                    <input type="hidden" id="macro-content">
                                                </div>


                                                <div class="form-group">
                                                    <div class="macro-attachment-container">
                                                        <div id="macro-attachment-tags" class="mb-2"></div>
                                                        <div class="dropdown" id="attachment-dropdown" style="display: none;">
                                                            <div class="attachment-options">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="recent-invoice" value="recent-invoice">
                                                                    <label class="custom-control-label" for="recent-invoice">Recent Order Invoice</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="last-5-invoices" value="last-5-invoices">
                                                                    <label class="custom-control-label" for="last-5-invoices">Last 5 Orders' Invoices</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="macro-attachments">
                                                        <button type="button" class="btn btn-secondary" id="add-macro-attachment">
                                                            <i class="fa fa-paperclip"></i> Add Attachment
                                                        </button>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="save-macro">Save Macro</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php if (empty($ticketNo)): ?>
                                <!-- Show Create Ticket button if no ticket exists -->
                                <a class="btn btn-primary col" id="create-ticket" data-id="<?= esc($email['msg_no']) ?>">Create Ticket</a>
                            <?php else: ?>
                                <!-- If ticket exists, show Close/Open button based on ticket status -->
                                <?php if ($ticketStatus === 'opened'): ?>
                                    <a class="btn btn-danger col" id="close-ticket" data-id="<?= esc($email['msg_no']) ?>">Close Ticket</a>
                                <?php elseif ($ticketStatus === 'closed'): ?>
                                    <a class="btn btn-success col" id="open-ticket" data-id="<?= esc($email['msg_no']) ?>">Reopen Ticket</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <?php if ($email['userdata']): ?>
                                    <h6 class="text-blue h6">Customer Details</h6>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar mr-2">
                                            <img src="<?= $email['userdata']['profile_img'] ?? base_url('vendors/images/photo1.jpg') ?>"
                                                class="border-radius-100"
                                                width="40"
                                                height="40"
                                                style="object-fit: cover;aspect-ratio: 1;"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-0">
                                                <?= $email['userdata']['name'] ?? 'user is not registered' ?>
                                            </h6>
                                            <small><?= $email['userdata']['email'] ?? 'Not Available'  ?></small>
                                        </div>
                                    </div>
                                    <p> <strong>Contact: </strong><br>
                                        <?= $email['userdata']['phone_no'] ?? 'Not Available'  ?>
                                    </p>
                                    <p> <strong>Address: </strong><br>
                                        <?= $email['userdata']['address_one'] ?? 'Not Available'  ?><?= $email['userdata']['address_two'] ?? 'Not Available'  ?>
                                    </p>
                                    <div class="row">
                                        <div class="col-md">
                                            <p> <strong>City: </strong><br>
                                                <?= $email['userdata']['city'] ?? 'Not Available'  ?>
                                            </p>
                                        </div>
                                        <div class="col-md">
                                            <p> <strong>State: </strong><br>
                                                <?= $email['userdata']['state'] ?? 'Not Available'  ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <p> <strong>Country: </strong><br>
                                                <?= $email['userdata']['country'] ?? 'Not Available'  ?>
                                            </p>
                                        </div>
                                        <div class="col-md">
                                            <p> <strong>Pincode: </strong><br>
                                                <?= $email['userdata']['pincode'] ?? 'Not Available'  ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="p-20">
                                        <div class="title cdtitle d-flex justify-content-center">
                                            <h6>User is not registered</h6>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Recent Order Details</h6>
                                <p><?= $email['orderdata']['order_number'] ?? "No Order found" ?> </p>
                                <?php if ($email['orderdata']): ?>
                                    <p><strong>Fulfillment Status : </strong><?= $email['orderdata']['fulfillment_status'] ?? "Not found" ?> </p>
                                    <?php
                                    $product_titles = json_decode($email['orderdata']['product_details'], true);
                                    if (is_array($product_titles)):
                                    ?>
                                        <?php foreach ($product_titles as $productTitle): ?>
                                            <div class="name-avatar d-flex align-items-center pr-2">
                                                <div class="avatar mr-2 flex-shrink-0">
                                                    <img src="<?= $productTitle['product_image'] ?>" style="aspect-ratio: 1;" class="border-radius-100 box-shadow" width="50" height="50" alt="">
                                                </div>
                                                <div class="txt">
                                                    <div class="font-14 weight-600"><?= $productTitle['product_title'] ?></div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="weight-500" data-color="#b2b1b6">
                                                            <span class="badge badge-pill badge" data-bgcolor="#e7ebf5" data-color="#265ed7">
                                                                Qty : <?= $productTitle['quantity'] ?>
                                                            </span>

                                                        </div>
                                                        <div class="font-14 text-right weight-600">
                                                            &#8377;<?= $productTitle['discounted_price'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <span>Product not found</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Payment Details</h6>
                                <div class="font-14 ">
                                    <strong>Total</strong> : &#8377;<?= $email['orderdata']['total_amount'] ?? 'Not Available'  ?>
                                </div>
                                <div class="font-14 ">
                                    <strong>Transaction ID</strong> :- <?= $email['orderdata']['payment_ref'] ?? 'Not Available'  ?>
                                </div>
                                <div class="font-14 ">
                                    <strong>Payment Status</strong> : <?= $email['orderdata']['payment_status'] ?? 'Not Available'  ?>
                                </div>
                                <div class="font-14 ">
                                    <strong>Payment Method</strong> : <?= $email['orderdata']['payment_method'] ?? 'Not Available'  ?>
                                </div>
                            </div>
                        </div>


                        <h6 class="text-blue h6">Tracking</h6>

                        <?php if (!empty($email['tracking'])) : ?>
                            <?php foreach ($email['tracking'] as $index => $track) : ?>
                                <?php
                                // Decode tracking details
                                $trackingDetails = json_decode($track['tracking_details'], true);
                                $latestScan = !empty($trackingDetails) ? $trackingDetails[0] : null;
                                $orderItems = json_decode($track['order_items'], true);
                                ?>

                                <!-- Collapsible Tracking Summary Card -->
                                <div class="tracking-card card-box p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="font-14 weight-600">
                                                <strong>Tracking No.:</strong> <?= esc($track['tracking_id']) ?>
                                            </div>
                                            <div class="font-12">
                                                <strong>Latest Status:</strong> <?= esc($latestScan ? $latestScan['Scan'] : 'No updates yet') ?>
                                            </div>
                                            <div class="font-12">
                                                <strong>Shipment Status:</strong>
                                                <span class="badge <?= ($track['shipment_status'] == 'delivered') ? 'badge-success' : 'badge-warning' ?>">
                                                    <?= esc(ucfirst($track['shipment_status'])) ?>
                                                </span>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm toggle-timeline" data-toggle="collapse" data-target="#timeline-<?= $index ?>">
                                            View Details
                                        </button>
                                    </div>
                                    <!-- Order Items Section -->
                                    <h6 class="text-blue h6">Order Items</h6>
                                    <?php if (!empty($orderItems)) : ?>
                                        <?php foreach ($orderItems as $item) : ?>
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="<?= esc($item['product_image']) ?>" alt="<?= esc($item['product_title']) ?>" width="50" class="mr-2">
                                                <div>
                                                    <div class="font-14 weight-600"><?= esc($item['product_title']) ?></div>
                                                    <div class="font-12 text-muted">&#8377;<?= esc($item['discounted_price']) ?> | Qty: <?= esc($item['quantity']) ?></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p>No order items found.</p>
                                    <?php endif; ?>

                                    <!-- Collapsible Timeline Section -->
                                    <div id="timeline-<?= $index ?>" class="collapse">
                                        <div class="container pd-0">
                                            <div class="timeline mb-30">
                                                <ul>
                                                    <?php if (!empty($trackingDetails)) : ?>
                                                        <?php foreach ($trackingDetails as $detail) : ?>
                                                            <li>
                                                                <div class="timeline-date">
                                                                    <?= date('d M Y', strtotime($detail['ScanDate'])) ?> <?= esc($detail['ScanTime']) ?>
                                                                </div>
                                                                <div class="timeline-desc p-3 card-box">
                                                                    <p>
                                                                        <strong><?= esc($detail['Scan']) ?></strong> <br>
                                                                        <span class="text-muted"><?= esc($detail['ScannedLocation']) ?></span>
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <li>
                                                            <div class="timeline-desc card-box">
                                                                <p>No tracking details available.</p>
                                                            </div>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No tracking information available.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Page Main Content End -->
        </div>
    </div>
    </div>
    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->


    <?php
    // Helper function for message card classes
    function getMessageCardClass($messageType)
    {
        switch ($messageType) {
            case 'sent':
                return 'bg-light';
            case 'internal_note':
                return 'bg-warning-light';
            default:
                return 'bg-white';
        }
    }
    ?>
</body>

<style>
    .conversation-thread {
        margin: 0 auto;
    }

    .message-container {}

    .message-container.received .card-box {
        background-color: #f8f9fa;

    }

    .message-container.sent .card-box {
        background-color: #e9ecef;

    }

    .message-container.internal_note .card-box {
        background-color: #fff3cd;

        border-left: 4px solid #ffc107;
    }

    .message-content {
        word-break: break-word;
    }



    .attachment-preview-card {
        cursor: pointer;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        padding: 10px;
        text-align: center;
    }

    .attachment-preview-card:hover {
        background-color: #f8f9fa;
    }

    .attachment-preview-card {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    .preview-placeholder {
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        margin-bottom: 10px;
    }

    .preview-placeholder img {
        max-width: 100%;
        max-height: 150px;
        object-fit: contain;
    }

    .attachment-info {
        font-size: 0.9em;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    #preview-content {
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #preview-content img {
        max-width: 100%;
        max-height: 70vh;
    }

    #preview-content iframe {
        width: 100%;
        height: 70vh;
        border: none;
    }

    .email-tag-container {
        border: 1px solid #ddd;
        padding: 5px;
        min-height: 38px;
        cursor: text;
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        height: auto;
        align-items: center;
    }

    .email-tag {
        background-color: #e9ecef;
        border-radius: 3px;
        padding: 2px 8px;
        margin-right: 5px;
        display: inline-flex;
        align-items: center;
    }

    .email-tag .remove-tag {
        margin-left: 5px;
        cursor: pointer;
        color: #666;
    }

    .email-tag .remove-tag:hover {
        color: #dc3545;
    }

    .email-input {
        border: none;
        outline: none;
        flex-grow: 1;
        min-width: 100px;
    }

    .email-field-container {
        margin-bottom: 10px;
    }

    .cc-bcc-toggle {
        color: #666;
        text-decoration: none;
        font-size: 0.9em;
        margin-left: 10px;
    }

    .cc-bcc-toggle:hover {
        text-decoration: underline;
    }

    .tag-container {
        display: flex;
        gap: 10px;

    }

    .tag-container .cs-tag {
        background: #ccc;
        padding: 5px;
        border-radius: 5px;
        margin: auto;
    }

    .tag-container .remove-tags {
        padding: 1px 5px;
        background: #dee2e6;
        border-radius: 20px;
        margin-left: 5px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
    }

    .tag-input {
        height: 100%;
        border: none;
        width: 100%;
    }

    .variable-item {
        padding: 5px;
        cursor: pointer;
    }

    .variable-item:hover {
        background: grey;
    }

    .tags-dropdown,
    .variable-dropdown {
        background: white;
        position: absolute;
        border: 1px solid;
        transform: translateY(40px);
        border-radius: 8px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-height: 300px;
        overflow-y: auto;
        width: fit-content;
        scrollbar-width: none;
    }

    .variable-search,
    .tag-search {
        position: sticky;
        top: 0;
    }











    .attachment-preview-card {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        position: relative;
    }

    .preview-placeholder {
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        margin-bottom: 10px;
    }

    .preview-placeholder img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }

    .attachment-info {
        font-size: 0.9em;
        word-break: break-all;
    }

    .remove-attachment {
        position: absolute;
        top: 5px;
        right: 5px;
        border-radius: 50px;
        height: 25px;
        aspect-ratio: 1;
        padding: 2px;
    }

    .filename {
        display: block;
        margin-top: 5px;
        font-size: 0.8em;
    }

    .macro-attachment-tag {
        display: inline-block;
        background: #e9ecef;
        padding: 2px 8px;
        margin: 2px;
        border-radius: 3px;
    }

    .macro-attachment-tag .remove-attachment {
        position: static;
        cursor: pointer;
        margin-left: 5px;
        color: #666;
    }

    .attachment-options {
        background: white;
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>


<script>
    $(document).ready(function() {
        // Create Ticket
        $(document).on("click", "#create-ticket", function() {
            let conversationId = $(this).data("id");

            $.post("<?= base_url('createTicket') ?>", {
                conversation_ids: [conversationId]
            }, function(response) {
                if (response.status === "success") {
                    // Update UI dynamically: Show ticket number & "Close Ticket" button
                    location.reload();
                } else {
                    alert(response.message);
                }
            }, "json");
        });

        // Close Ticket
        $(document).on("click", "#close-ticket", function() {
            let conversationId = $(this).data("id");

            $.post("<?= base_url('closeTicket') ?>", {
                conversation_ids: [conversationId]
            }, function(response) {
                if (response.status === "success") {
                    // Update UI dynamically: Show "Reopen Ticket" button
                    location.reload();
                } else {
                    alert(response.message);
                }
            }, "json");
        });

        // Reopen Ticket
        $(document).on("click", "#open-ticket", function() {
            let conversationId = $(this).data("id");

            $.post("<?= base_url('openTicket') ?>", {
                conversation_ids: [conversationId]
            }, function(response) {
                if (response.status === "success") {
                    // Update UI dynamically: Show "Close Ticket" button
                    location.reload();
                } else {
                    alert(response.message);
                }
            }, "json");
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Initialize Select2 for tags
        $('#email-tags').select2({
            placeholder: 'Select Tags',
            allowClear: true
        });

        // Handle saving new tags
        $('#save-tag-btn').on('click', function(e) {
            e.preventDefault();
            const tagName = $('#tag_name').val().trim();

            if (tagName) {
                $.ajax({
                    url: '<?= base_url('Tags/save') ?>',
                    type: 'POST',
                    data: {
                        tag_name: tagName
                    },
                    success: function(response) {
                        if (response.success) {
                            // Add new tag to the dropdown
                            const newOption = new Option(tagName, tagName, false, true);
                            $('#email-tags').append(newOption).trigger('change');
                            $('#tag_name').val('');
                            $('#tagModal').modal('hide');
                        } else {
                            $('#tag-modal-error').text(response.message);
                        }
                    },
                    error: function() {
                        $('#tag-modal-error').text('An error occurred. Please try again.');
                    }
                });
            } else {
                $('#tag-modal-error').text('Tag name cannot be empty.');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        function refreshThread() {
            var msgNo = '<?= $thread[0]['msg_no'] ?>';
            var channel = '<?= $thread[0]['channel'] ?>';
            $.ajax({
                url: '<?= base_url('conversation_view') ?>/' + msgNo + '/' + channel,
                method: 'GET',
                success: function(response) {
                    // Update the conversation thread content
                    $('.conversation-thread').html($(response).find('.conversation-thread').html());

                    // Reinitialize attachment previews
                    initializeAttachmentPreviews();
                },
                error: function(xhr, status, error) {
                    console.error('Error refreshing thread:', error);
                }
            });
        }

        // Refresh every 30 seconds
        setInterval(refreshThread, 30000);
    });
</script>

<script>
    $(document).ready(function() {

        let attachedFiles = new FormData();
        let fileCounter = 0;
        let pendingInvoices = 0;

        <?php
        // Extract only the email part in PHP
        preg_match('/<([^>]+)>/', $email['from'], $matches);
        $emailOnly = isset($matches[1]) ? $matches[1] : $email['from'];
        ?>

        // Initialize with the original recipient email
        const originalEmail = '<?= esc($emailOnly); ?>';





        // Load agents
        $.ajax({
            url: '<?= base_url('getAgents') ?>',
            method: 'GET',
            success: function(response) {
                if (response.status === 'success') {
                    var select = $('#agent-select');
                    response.agents.forEach(function(agent) {
                        var option = $('<option>')
                            .val(agent.name)
                            .text(agent.name);
                        if (agent.name == '<?= $email['agentdata'] ?>') {
                            option.prop('selected', true);
                        }
                        select.append(option);
                    });
                }
            }
        });

        var tags = '<?= is_array($email['tags']) ? implode(",", $email['tags']) : $email['tags'] ?>';


        // Load macros
        function loadMacros(tags = '') {
            $.ajax({
                url: '<?= base_url('getMacros') ?>',
                method: 'GET',
                data: {
                    tags: tags
                },
                success: function(response) {
                    if (response.status === 'success') {
                        var select = $('#macro-select');
                        select.empty().append('<option value="">Select Macro</option>');

                        response.macros.forEach(function(macro) {
                            select.append($('<option>')
                                .val(macro.id)
                                .text(macro.macros_title));
                        });

                        // Initialize Select2 on the select dropdown
                        select.select2({
                            placeholder: 'Search and select a macro',
                            allowClear: true,
                            width: '100%'
                        });
                    }
                }
            });
        }

        loadMacros();

        // Re-initialize Select2 if macros change
        $('#macro-select').on('select2:open', function() {
            $(this).select2('open');
        });

        // Handle agent change
        $('#agent-select').change(function() {
            var msgNo = $(this).data('msgno');
            var agentId = $(this).val();

            $.ajax({
                url: '<?= base_url('updateAssignedAgent') ?>',
                method: 'POST',
                data: {
                    msg_no: msgNo,
                    agent_id: agentId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        //alert('Agent updated successfully');
                    }
                }
            });
        });

        $('#update-tag-btn').on('click', function() {
            // Get the message number and selected tags
            const msgNo = $(this).data('msgno');
            const selectedTags = $('#email-tags').val(); // Get selected tags as an array
            const tagError = $('#tag-error');

            if (!selectedTags || selectedTags.length === 0) {
                tagError.text('Please select at least one tag.');
                return;
            }

            // Clear any previous error
            tagError.text('');

            // Make an AJAX request to update tags
            $.ajax({
                url: '<?= base_url('updateTags') ?>', // Update to your controller's endpoint
                method: 'POST',
                data: {
                    msg_no: msgNo,
                    tags: selectedTags.join(',') // Convert array to comma-separated string
                },
                success: function(response) {
                    if (response.status === 'success') {
                        //alert('Tags updated successfully.');
                    } else {
                        tagError.text('Failed to update tags. Please try again.');
                    }
                },
                error: function() {
                    tagError.text('An error occurred while updating tags.');
                }
            });
        });


        // Function to replace variables in macro content
        function replaceVariables(content, data) {
            return content.replace(/`(.*?)`/g, (match, variable) => {
                const value = data[variable] || '';
                return value;
            });
        }

        // Initialize Quill for reply content with matching configuration
        const replyQuill = new Quill('#editor-reply-content', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'align': []
                    }],
                    ['clean']
                ]
            },
            placeholder: 'Compose your reply...'
        });

        // Sync Quill content with hidden input
        replyQuill.on('text-change', function() {
            const content = replyQuill.root.innerHTML;
            $('#reply-content').val(content);
            console.log('Reply content updated:', content);
        });

        // Modified macro selection handler
        $('#macro-select').change(function() {
            const macroId = $(this).val();
            const userId = $('#user_id').val();

            if (macroId) {
                console.log('Loading macro ID:', macroId);

                $.ajax({
                    url: '<?= base_url('getMacroContent') ?>',
                    method: 'GET',
                    data: {
                        macro_id: macroId,
                        user_id: userId
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            console.log('Macro data received successfully');

                            attachedFiles = new FormData();
                            fileCounter = 0;
                            $('#upload-previews').empty();

                            const macroData = {
                                cs_tags: response.cs_tags,
                                reply_type: response.reply_type,
                                to_email: response.to_email,
                                cc_email: response.cc_email,
                                bcc_email: response.bcc_email,
                                macro_attachments: response.macro_attachments,
                                reply_msg: response.content
                            };

                            const user = response.user || {};
                            const agentname = response.agentname;
                            const agentemail = response.agentemail;
                            const order = response.order || {};
                            const last5_orders = response.last5_orders || [];

                            // Fallback values if user data is not available
                            const customer_name = user['name'] || '<?= esc($email['from']) ?>';
                            const customer_email = user['email'] || '<?= esc($emailOnly) ?>';
                            const customer_mobile = user['phone_no'] || 'N/A';
                            const customer_address = user['address_information'] || 'N/A';


                            // Set reply type
                            $('#reply-type').val(macroData.reply_type).trigger('change');
                            console.log('Reply type set:', macroData.reply_type);

                            // Update email fields
                            updateEmailTagContainer('to-container', macroData.to_email, originalEmail);
                            updateEmailTagContainer('cc-container', macroData.cc_email);
                            updateEmailTagContainer('bcc-container', macroData.bcc_email);
                            console.log('Email containers updated');







                            // Replace variables in content
                            const content = replaceVariables(macroData.reply_msg, {
                                customer_name: customer_name,
                                customer_email: customer_email,
                                customer_mobile: customer_mobile,
                                customer_address: customer_address,
                                recent_order_number: order['order_number'] || 'N/A',
                                recent_order_status: order['fulfillment_status'] || 'N/A',
                                recent_order_date: order['created_at'] || 'N/A',
                                recent_order_products: order['product_name'] || 'N/A',
                                recent_order_delivery_date: order['delivery_date'] || 'N/A',
                                recent_order_return_date: order['return_date'] || 'N/A',
                                recent_order_total_amount: order['total_amount'] || 'N/A',
                                recent_order_tracking_ids: order['tracking_id'] || 'N/A',
                                recent_order_transaction_id: order['payment_ref'] || 'N/A',
                                current_agent_name: agentname || 'N/A',
                                current_agent_email: agentemail || 'N/A',
                                last_5_order_number: last5_orders.map(o => o.number).join(', ') || 'N/A',
                                last_5_order_transactions: last5_orders.map(o => o.transactions).join(', ') || 'N/A'
                            });

                            // Update Quill editor content
                            replyQuill.root.innerHTML = content;
                            $('#reply-content').val(content);
                            console.log('Reply content set in editor', macroData.macro_attachments);

                            if (macroData.macro_attachments) {
                                console.log('Processing macro attachments:', macroData.macro_attachments);
                                processInvoiceAttachments(
                                    macroData.macro_attachments,
                                    response.order,
                                    response.last5_orders
                                );
                            } else {
                                // Enable send button if no invoices to process
                                $('#send-reply').prop('disabled', false);
                            }





                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading macro:', error);
                        alert('Failed to load macro content. Please try again.');
                    }
                });
            }
        });


        function processInvoiceAttachments(attachmentString, orderData, last5Orders) {
            const attachments = attachmentString.split(',');
            pendingInvoices = 0; // Reset counter

            console.log('Starting invoice attachment processing');

            // Process recent invoice if needed
            if (attachments.includes('recent-invoice') && orderData?.id) {
                pendingInvoices++;
                generateSingleInvoice(
                    orderData.id,
                    orderData.order_number,
                    'Recent Order Invoice'
                );
            }

            // Process last 5 invoices if needed
            if (attachments.includes('last-5-invoices') && Array.isArray(last5Orders)) {
                last5Orders.forEach(order => {
                    if (order.id) {
                        pendingInvoices++;
                        generateSingleInvoice(
                            order.id,
                            order.order_number,
                            `Order ${order.order_number} Invoice`
                        );
                    }
                });
            }

            // Update send button state
            if (pendingInvoices === 0) {
                console.log('No invoices to process');
                $('#send-reply').prop('disabled', false);
            } else {
                $('#send-reply').prop('disabled', true);
            }
        }

        // Generate single invoice
        function generateSingleInvoice(orderId, orderNumber, displayName) {
            console.log(`Generating invoice for order ID: ${orderId}, Order Number: ${orderNumber}`);

            $.ajax({
                url: '<?= base_url('ordermanagement/generateInvoice') ?>/' + `${orderId}`,
                method: 'GET',
                xhrFields: {
                    responseType: 'blob'
                },
                beforeSend: function() {
                    // Show loader on the #add-attachment button
                    $('#add-attachment').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Generating...');
                },
                success: function(blob) {
                    fileCounter++;
                    const fileName = `Invoice_${orderNumber}.pdf`;
                    const file = new File([blob], fileName, {
                        type: 'application/pdf'
                    });

                    attachedFiles.append(`file_${fileCounter}`, file);
                    createAttachmentPreview(file, fileCounter, displayName);

                    console.log(`Successfully generated invoice for order ${orderNumber}`);
                    pendingInvoices--;

                    // Update send button state
                    if (pendingInvoices === 0) {
                        console.log('All invoice generations completed');
                        $('#send-reply').prop('disabled', false);
                        // Hide loader on the #add-attachment button
                        $('#add-attachment').prop('disabled', false).html('<i class="fa fa-paperclip"></i> Add Attachment');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(`Error generating invoice for order ${orderId}:`, error);
                    pendingInvoices--;

                    // Update send button state
                    if (pendingInvoices === 0) {
                        console.log('All invoice generations completed');
                        $('#send-reply').prop('disabled', false);
                        // Hide loader on the #add-attachment button
                        $('#add-attachment').prop('disabled', false).html('<i class="fa fa-paperclip"></i> Add Attachment');
                    }
                }
            });
        }

        // Create preview for attached files
        function createAttachmentPreview(file, id, displayName) {
            const previewCard = $(`
            <div class="col-md-3 mb-3" id="preview-${id}">
                <div class="attachment-preview-card">
                    <div class="preview-placeholder">
                        <i class="fa fa-file-pdf fa-3x"></i>
                    </div>
                    <div class="attachment-info">
                        <span class="filename">${displayName || file.name}</span>
                        <button type="button" class="btn btn-sm btn-secondary remove-attachment" 
                                data-id="${id}">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        `);

            $('#upload-previews').append(previewCard);
        }


        // Function to update email tag container
        function updateEmailTagContainer(containerId, initialEmails, originalEmail) {
            const container = $(`#${containerId}`);
            const input = container.find('.email-input');
            const hiddenInput = $(`#${containerId}-hidden`);

            // Clear existing tags, except the original recipient email
            container.find('.email-tag:not(:contains("' + originalEmail + '"))').remove();

            // Add new tags based on initialEmails
            if (initialEmails) {
                const emails = initialEmails.split(',');
                emails.forEach(email => {
                    const tag = createEmailTag(email.trim(), container);
                    container.find('.email-input').before(tag);
                });
                updateHiddenInput(container);
            }

            // Preserve the original recipient email
            /*if (originalEmail) {
                const tag = createEmailTag(originalEmail);
                container.find('.email-input').before(tag);
                hiddenInput.val(originalEmail);
            }*/

            // Update hidden input with all emails
            function updateHiddenInput(container) {
                const emails = [];
                container.find('.email-tag').each(function() {
                    emails.push($(this).text().slice(0, -1)); // Remove the × symbol
                });
                hiddenInput.val(emails.join(','));
            }

        }



        // Initialize reply type as 'reply'
        $('#reply-type').val('reply');
        $('#email-options').show();

        // Show/hide CC/BCC fields
        $('.cc-bcc-toggle').click(function(e) {
            e.preventDefault();
            const target = $(this).data('target');
            $(`#${target}-container`).show();
            $(this).hide();
        });

        // Email validation function
        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        // Function to create an email tag
        function createEmailTag(email, container) {
            return $('<span>', {
                class: 'email-tag',
                html: `${email}<span class="remove-tag">×</span>`
            });
        }

        // Function to initialize email tag container
        function initializeEmailTagContainer(containerId, initialEmails) {
            const container = $(`#${containerId}`);
            const input = container.find('.email-input');

            // Store emails in a hidden input
            const hiddenInput = $('<input>', {
                type: 'hidden',
                id: `${containerId}-hidden`,
                name: `${containerId}-hidden`
            });
            container.append(hiddenInput);

            // Add initial emails as tags
            if (initialEmails) {
                const emails = initialEmails.split(',');
                emails.forEach(email => {
                    const tag = createEmailTag(email.trim(), container);
                    container.find('.email-input').before(tag);
                });
                updateHiddenInput(container);
            }

            // Handle input keypress
            input.on('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    const email = $(this).val().trim().replace(',', '');

                    if (email && isValidEmail(email)) {
                        const tag = createEmailTag(email, container);
                        $(this).before(tag);
                        $(this).val('');
                        updateHiddenInput(container);
                    } else if (email) {
                        alert('Please enter a valid email address');
                    }
                }
            });

            // Handle tag removal
            container.on('click', '.remove-tag', function() {
                $(this).parent().remove();
                updateHiddenInput(container);
            });

            // Focus input when container is clicked
            container.on('click', function(e) {
                if (e.target === this) {
                    input.focus();
                }
            });

            // Update hidden input with all emails
            function updateHiddenInput(container) {
                const emails = [];
                container.find('.email-tag').each(function() {
                    emails.push($(this).text().slice(0, -1)); // Remove the × symbol
                });
                container.find('input[type="hidden"]').val(emails.join(','));
            }
        }


        // Initialize all email tag containers
        initializeEmailTagContainer('to-container', originalEmail);
        initializeEmailTagContainer('cc-container');
        initializeEmailTagContainer('bcc-container');

        //const attachedFiles = new FormData();
        //let fileCounter = 0;

        $('#add-attachment').click(function() {
            $('#file-input').click();
        });

        $('#file-input').change(function(e) {
            const files = e.target.files;

            for (let file of files) {
                fileCounter++;
                attachedFiles.append(`file_${fileCounter}`, file);

                // Create preview card
                const previewCard = $(`
                <div class="col-md-3 mb-3" id="preview-${fileCounter}">
                    <div class="attachment-preview-card">
                        <div class="preview-placeholder">
                            ${getPreviewContent(file)}
                        </div>
                        <div class="attachment-info">
                            <span class="filename">${file.name}</span>
                            <button type="button" class="btn btn-sm btn-secondary remove-attachment" 
                                    data-id="${fileCounter}">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `);

                $('#upload-previews').append(previewCard);

                // If it's an image, create preview
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $(`#preview-${fileCounter} .preview-placeholder`).html(`
                        <img src="${e.target.result}" class="img-thumbnail">
                    `);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        function getPreviewContent(file) {
            const type = file.type.split('/')[0];
            const subtype = file.type.split('/')[1];

            switch (type) {
                case 'image':
                    return '<i class="fa fa-spinner fa-spin"></i>';
                case 'application':
                    if (subtype === 'pdf') {
                        return '<i class="fa fa-file-pdf fa-2x"></i>';
                    }
                    return '<i class="fa fa-file fa-2x"></i>';
                case 'text':
                    return '<i class="fa fa-file-text fa-2x"></i>';
                default:
                    return '<i class="fa fa-file fa-2x"></i>';
            }
        }

        $(document).on('click', '.remove-attachment', function() {
            const fileId = $(this).data('id');
            attachedFiles.delete(`file_${fileId}`);
            $(`#preview-${fileId}`).remove();
        });

        // Replace your existing send-reply click handler with this
        $('#send-reply').click(function() {
            const msgno = $('#msg_no').val();
            const session_id = $('#session_id').val();
            const content = $('#reply-content').val();
            const replyType = $('#reply-type').val();
            const subject = $('#email-subject').val();
            const toEmails = $('#to-container-hidden').val();
            const ccEmails = $('#cc-container-hidden').val();
            const bccEmails = $('#bcc-container-hidden').val();
            const channel = $('#channel').val(); // Check if it's email or livechat

            if (!content.trim()) {
                alert('Please enter content');
                return;
            }

            if (!toEmails && replyType !== 'internal_note' && channel === 'email') {
                alert('Please enter at least one recipient email address');
                return;
            }

            const formData = new FormData();
            formData.append('msg_no', msgno);
            formData.append('session_id', session_id);
            formData.append('content', content);
            formData.append('to_email', toEmails);
            formData.append('cc_email', ccEmails);
            formData.append('bcc_email', bccEmails);
            formData.append('subject', subject);
            formData.append('reply_type', replyType);
            formData.append('channel', channel);

            for (let pair of attachedFiles.entries()) {
                formData.append(pair[0], pair[1]);
            }

            $.ajax({
                url: '<?= base_url('sendReply') ?>',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#send-reply').prop('disabled', true).text('Sending...');
                },
                success: function(response) {
                    console.log('Server response:', response);
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Send error:', error);
                    alert('Error sending message. Please try again.');
                },
                complete: function() {
                    $('#send-reply').prop('disabled', false).text('Send');
                }
            });
        });




        let selectedAttachments = [];

        // Toggle attachment dropdown
        $('#add-macro-attachment').click(function() {
            $('#attachment-dropdown').toggle();
        });

        // Handle attachment selection
        $('.attachment-options input[type="checkbox"]').change(function() {
            const value = $(this).val();
            const isChecked = $(this).prop('checked');

            if (isChecked && !selectedAttachments.includes(value)) {
                selectedAttachments.push(value);
                createAttachmentTag(value);
            } else if (!isChecked) {
                selectedAttachments = selectedAttachments.filter(item => item !== value);
                removeAttachmentTag(value);
            }
            updateHiddenAttachmentInput();
        });

        // Create attachment tag
        function createAttachmentTag(value) {
            const displayText = value === 'recent-invoice' ? 'Recent Order Invoice' : 'Last 5 Orders\' Invoices';
            const tag = $(`
            <span class="macro-attachment-tag">
                ${displayText}
                <span class="remove-attachment" data-value="${value}">×</span>
            </span>
        `);
            $('#macro-attachment-tags').append(tag);
        }

        // Remove attachment tag
        function removeAttachmentTag(value) {
            $('#macro-attachment-tags').find(`[data-value="${value}"]`).parent().remove();
            $(`#${value}`).prop('checked', false);
        }

        // Update hidden input with selected attachments
        function updateHiddenAttachmentInput() {
            $('#macro-attachments').val(selectedAttachments.join(','));
        }

        // Handle tag removal
        $(document).on('click', '.remove-attachment', function() {
            const value = $(this).data('value');
            selectedAttachments = selectedAttachments.filter(item => item !== value);
            removeAttachmentTag(value);
            updateHiddenAttachmentInput();
        });













        // Modified reply type change handler
        $('#reply-type').change(function() {
            var replyType = $(this).val();
            var subject = $('#email-subject').val().replace(/^(Re:|Fwd:|)\s*(\[Internal Note\]\s*)?/i, '');

            if (replyType === 'internal_note') {
                $('#email-options').hide();
                $('#email-subject').val('[Internal Note] ' + subject);
            } else {
                $('#email-options').show();
                if (replyType === 'reply') {
                    $('#email-subject').val('Re: ' + subject);
                } else if (replyType === 'forward') {
                    $('#email-subject').val('Fwd: ' + subject);
                }
            }
        });





        // Macro Form Modal
        $('#add-macros').click(function() {
            $('#addMacroModal').modal('show');
        });

        function initializeTagContainer() {
            const container = $('#cs-tags-container');
            const tagInput = container.find('.tag-input');
            const hiddenInput = $('#cs-tags-hidden');
            let selectedTags = [];

            // Load CS tags for dropdown
            $.ajax({
                url: '<?= base_url('getCSTags') ?>',
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        const dropdown = $('<div>', {
                            class: 'tags-dropdown',
                            css: {
                                display: 'none'
                            }
                        });

                        const searchInput = $('<input>', {
                            type: 'text',
                            class: 'form-control tag-search',
                            placeholder: 'Search tags...'
                        });

                        const tagList = $('<div>', {
                            class: 'tag-list'
                        });
                        response.tags.forEach(tag => {
                            const checkbox = $('<div>', {
                                class: 'tag-checkbox custom-control custom-checkbox',
                                html: `                                
                                <input class="custom-control-input" id="${tag.tag_name}" type="checkbox" value="${tag.id}">
                                <label class="custom-control-label" for="${tag.tag_name}">${tag.tag_name}</label>
                            `
                            });
                            tagList.append(checkbox);
                        });

                        dropdown.append(searchInput).append(tagList);
                        container.append(dropdown);

                        // Handle tag search
                        searchInput.on('input', function() {
                            const searchTerm = $(this).val().toLowerCase();
                            $('.tag-checkbox').each(function() {
                                const tagText = $(this).text().toLowerCase();
                                $(this).toggle(tagText.includes(searchTerm));
                            });
                        });

                        // Handle tag selection
                        tagList.on('change', 'input[type="checkbox"]', function() {
                            const tagName = $(this).parent().text().trim();
                            if (this.checked) {
                                if (!selectedTags.includes(tagName)) {
                                    selectedTags.push(tagName);
                                    createTag(tagName);
                                }
                            } else {
                                selectedTags = selectedTags.filter(t => t !== tagName);
                                removeTag(tagName);
                            }
                            updateHiddenInput();
                        });
                    }
                }
            });

            function createTag(tagName) {
                const tag = $('<span>', {
                    class: 'cs-tag',
                    html: `${tagName}<span class="remove-tags">×</span>`
                });
                tagInput.before(tag);
            }

            function removeTag(tagName) {
                // Remove tag from selectedTags
                selectedTags = selectedTags.filter(t => t !== tagName);

                // Update hidden input
                updateHiddenInput();

                // Remove the tag element
                container.find('.cs-tag').each(function() {
                    if ($(this).text().slice(0, -1) === tagName) {
                        $(this).remove();
                    }
                });

                // Uncheck the corresponding checkbox in the tag list
                $('.tag-checkbox input[type="checkbox"]').each(function() {
                    if ($(this).parent().text().trim() === tagName) {
                        $(this).prop('checked', false);
                    }
                });
            }

            function updateHiddenInput() {
                hiddenInput.val(selectedTags.join(','));
            }

            // Show/hide dropdown
            tagInput.on('focus', function() {
                $('.tags-dropdown').show();
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#cs-tags-container').length) {
                    $('.tags-dropdown').hide();
                }
            });

            // Handle remove tag click event
            container.on('click', '.remove-tags', function() {
                const tagName = $(this).parent().text().slice(0, -1).trim();
                removeTag(tagName);
            });
        }

        const quill = new Quill('#editor-macro-content', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'align': []
                    }],
                    ['clean']
                ]
            },
            placeholder: 'Compose your message...'
        });

        // Initialize variable selector for content
        function initializeVariableSelector() {
            // Remove any existing variable dropdown to prevent duplicates
            $('#variable-dropdown').remove();

            let variableDropdown = $('<div>', {
                id: 'variable-dropdown',
                class: 'variable-dropdown',
                css: {
                    display: 'none',
                    position: 'absolute',
                    zIndex: 1000,
                    backgroundColor: '#fff',
                    border: '1px solid #ddd',
                    borderRadius: '4px',
                    boxShadow: '0 2px 4px rgba(0,0,0,0.1)',
                    maxHeight: '200px',
                    overflowY: 'auto',
                    width: 'auto'
                }
            });

            const variables = [
                'customer_name',
                'customer_email',
                'customer_mobile',
                'customer_address',
                'recent_order_number',
                'recent_order_status',
                'recent_order_date',
                'recent_order_products',
                'recent_order_delivery_date',
                'recent_order_return_date',
                'recent_order_total_amount',
                'recent_order_tracking_ids',
                'recent_order_transaction_id',
                'current_agent_name',
                'current_agent_email',
                'last_5_order_number',
                'last_5_order_transactions'
            ];

            const searchInput = $('<input>', {
                type: 'text',
                class: 'form-control variable-search',
                placeholder: 'Search variables...',
                css: {
                    margin: '5px',
                    width: 'calc(100% - 10px)'
                }
            });

            const varList = $('<div>', {
                class: 'variable-list',
                css: {
                    padding: '5px'
                }
            });

            variables.forEach(variable => {
                varList.append($('<div>', {
                    class: 'variable-item',
                    text: variable,
                    css: {
                        padding: '5px 10px',
                        cursor: 'pointer',
                        '&:hover': {
                            backgroundColor: '#f0f0f0'
                        }
                    }
                }));
            });

            variableDropdown.append(searchInput).append(varList);
            $('#macro-content-container').append(variableDropdown);

            // Track the last two characters typed
            let lastChars = '';
            let lastPosition = 0;

            quill.on('text-change', function(delta, oldDelta, source) {
                if (source === 'user') {
                    const text = quill.getText();
                    const cursorPosition = quill.getSelection()?.index;

                    if (cursorPosition && cursorPosition >= 2) {
                        lastChars = text.slice(cursorPosition - 2, cursorPosition);
                        lastPosition = cursorPosition;

                        if (lastChars === '//') {
                            const bounds = quill.getBounds(cursorPosition);
                            const quillContainer = quill.container;

                            variableDropdown.show().css({
                                top: quillContainer.offsetTop + bounds.top + bounds.height + 10,
                                left: quillContainer.offsetLeft + bounds.left
                            });

                            // Focus on search input
                            searchInput.focus();
                        }
                    }
                }
            });

            // Handle search functionality
            searchInput.on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                $('.variable-item').each(function() {
                    const text = $(this).text().toLowerCase();
                    $(this).toggle(text.includes(searchTerm));
                });
            });

            // Handle variable selection
            varList.on('click', '.variable-item', function() {
                const variable = $(this).text();

                // Delete the '//' characters and insert the variable
                if (lastPosition >= 2) {
                    quill.deleteText(lastPosition - 2, 2);
                    quill.insertText(lastPosition - 2, '`' + variable + '`', 'user');

                    // Reset the lastPosition
                    lastPosition = 0;
                }

                // Hide and reset the dropdown
                variableDropdown.hide();
                searchInput.val('');
                $('.variable-item').show();
            });

            // Hide dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#variable-dropdown, #editor-macro-content').length) {
                    variableDropdown.hide();
                    searchInput.val('');
                    $('.variable-item').show();
                }
            });

            // Prevent dropdown from closing when clicking inside it
            variableDropdown.on('click', function(e) {
                e.stopPropagation();
            });
        }

        $('#save-macro').click(function() {
            const macroTitle = $('#macro-title').val().trim();
            const toEmail = $('#macro-to-hidden').val().trim();
            const content = quill.root.innerHTML;

            // Update hidden input with the HTML content
            $('#macro-content').val(content);

            if (!macroTitle) {
                alert('Macro Title is required.');
                return;
            }

            if (!content || content === '<p><br></p>') {
                alert('Content is required.');
                return;
            }

            const formData = {
                macros_title: macroTitle,
                cs_tags: $('#cs-tags-hidden').val(),
                reply_type: $('#macro-reply-type').val(),
                to_email: toEmail,
                cc_email: $('#macro-cc-hidden').val(),
                bcc_email: $('#macro-bcc-hidden').val(),
                reply_msg: content,
                macro_attachments: $('#macro-attachments').val()
            };

            $.ajax({
                url: '<?= base_url('saveMacro') ?>',
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        $('#addMacroModal').modal('hide');
                        alert('Macro saved successfully');
                        resetMacroForm();
                    } else {
                        alert('Error saving macro: ' + response.message);
                    }
                }
            });
        });

        // Modified reset function
        function resetMacroForm() {
            $('#macro-title').val('');
            $('#cs-tags-hidden').val('');
            quill.setContents([]);
            $('#macro-content').val('');

            // Reset other form elements
            $('#cs-tags-container .cs-tag').remove();
            $('#cs-tags-container .tag-checkbox input[type="checkbox"]').prop('checked', false);
            $('#macro-to-hidden').val('');
            $('#macro-cc-hidden').val('');
            $('#macro-bcc-hidden').val('');
            $('#macro-to-container .email-tag').remove();
            $('#macro-cc-container .email-tag').remove();
            $('#macro-bcc-container .email-tag').remove();
            $('#macro-reply-type').val('reply');
            $('#macro-email-field').show();
            selectedAttachments = [];
            $('#macro-attachment-tags').empty();
            $('#macro-attachments').val('');
            $('.attachment-options input[type="checkbox"]').prop('checked', false);
        }

        // Modified reply type change handler
        $('#macro-reply-type').change(function() {
            var replyType = $(this).val();

            if (replyType === 'internal_note') {
                $('#macro-email-field').hide();
            } else {
                $('#macro-email-field').show();
            }
        });








        // Initialize all components
        initializeTagContainer();
        initializeVariableSelector();
        initializeEmailTagContainer('macro-to-container');
        initializeEmailTagContainer('macro-cc-container');
        initializeEmailTagContainer('macro-bcc-container');




    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize previews for all attachments
        document.querySelectorAll('.attachment-preview-card').forEach(card => {
            const filename = card.getAttribute('data-filename');
            loadPreview(card, filename);
        });

        // Handle preview card clicks
        document.querySelectorAll('.attachment-preview-card').forEach(card => {
            card.addEventListener('click', function() {
                const filename = this.getAttribute('data-filename');
                showPreviewModal(filename);
            });
        });


    });



    function downloadAttachment(filename) {
        console.log('Initiating download for:', filename);

        // Create form data
        const formData = new FormData();
        formData.append('filename', filename);

        // Show loading state
        const downloadBtn = document.getElementById('download-btn');
        const originalText = downloadBtn.innerHTML;
        downloadBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Downloading...';
        downloadBtn.disabled = true;


        fetch('<?= base_url('downloadAttachment') ?>/' + filename, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Download failed');
                return response.blob();
            })
            .then(blob => {
                console.log('Download successful, creating download link');

                // Create download link
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = filename;

                // Trigger download
                document.body.appendChild(a);
                a.click();

                // Cleanup
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            })
            .catch(error => {
                console.error('Download error:', error);
                alert('Error downloading file. Please try again.');
            })
            .finally(() => {
                // Reset button state
                downloadBtn.innerHTML = originalText;
                downloadBtn.disabled = false;
            });
    }


    function loadPreview(card, filename) {
        console.log('Loading preview for:', filename);

        fetch(`<?= base_url('getAttachmentPreview') ?>/${filename}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Preview data received:', data);
                updatePreviewCard(card, data);
            })
            .catch(error => {
                console.error('Error loading preview:', error);
                card.querySelector('.preview-placeholder').innerHTML = '<i class="fa fa-file"></i>';
            });
    }


    function showPreviewModal(filename) {
        console.log('Opening preview modal for:', filename);
        const modal = $('#previewModal');
        const previewContent = document.getElementById('preview-content');
        const downloadBtn = document.getElementById('download-btn');

        // Show loading state
        previewContent.innerHTML = '<i class="fa fa-spinner fa-spin fa-3x"></i>';
        modal.modal('show');

        fetch(`<?= base_url('getAttachmentPreview') ?>/${filename}`)
            .then(response => response.json())
            .then(data => {
                console.log('Modal preview data received:', data);
                updateModalPreview(previewContent, data);
                downloadBtn.setAttribute('data-filename', filename);
            })
            .catch(error => {
                console.error('Error loading modal preview:', error);
                previewContent.innerHTML = '<div class="text-danger">Error loading preview</div>';
            });
    }


    function updatePreviewCard(card, data) {
        const placeholder = card.querySelector('.preview-placeholder');

        switch (data.preview_type) {
            case 'image':
                placeholder.innerHTML = `<img src="data:${data.mime_type};base64,${data.content}" alt="Preview">`;
                break;
            case 'pdf':
                placeholder.innerHTML = '<i class="fa fa-file-pdf fa-3x"></i>';
                break;
            case 'spreadsheet':
                placeholder.innerHTML = '<i class="fa fa-file-excel fa-3x"></i>';
                break;
            default:
                placeholder.innerHTML = '<i class="fa fa-file fa-3x"></i>';
        }
    }

    function updateModalPreview(container, data) {
        switch (data.preview_type) {
            case 'image':
                container.innerHTML = `<img src="data:${data.mime_type};base64,${data.content}" alt="Preview">`;
                break;
            case 'pdf':
                // Using PDF.js for PDF preview
                //container.innerHTML = `<iframe src="https://mozilla.github.io/pdf.js/web/viewer.html?file=${encodeURIComponent(data.url)}"></iframe>`;
                container.innerHTML = `<div class="text-center">
                <i class="fa fa-file fa-5x mb-3"></i>
                <p>Preview not available for this file type</p>
                <p>Click download to view the file</p>
            </div>`;
                break;
            default:
                container.innerHTML = `
                <div class="text-center">
                    <i class="fa fa-file fa-5x mb-3"></i>
                    <p>Preview not available for this file type</p>
                    <p>Click download to view the file</p>
                </div>`;
        }
    }
</script>


</html>