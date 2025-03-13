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
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Customer Service</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <!--
                            <div class="row">
                                <i class="fa-brands fa-facebook socialmes"></i>
                                <i class="fa-brands fa-twitter socialmes"></i>
                                <i class="fa-brands fa-instagram socialmes"></i>
                            </div>           
                            -->
                            <button type="button" class="btn btn-primary mx-3" id="compose-email-btn" data-toggle="modal" data-target="#composeEmailModal">
                                <i class="fa fa-envelope"></i> Compose New Email
                            </button>
                            <a href="<?= base_url('contact_us_data') ?>">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-phone"></i> Contact Us
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Page Main Content Start -->
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box pd-20 mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Notifications</h6>
                                <div class=" height-100-p pd-10 min-height-200px">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card-box mb-30">
                            <div class="pd-10">
                                <h6 class="text-blue h6">Agents</h6>
                                <div class=" height-100-p pd-10 min-height-200px">
                                    <div class="d-flex justify-content-between pb-10">
                                        <!--<div class="h5 mb-0">Agents</div>
                                         <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="user-list">
                                        <ul>
                                            <?php if (!empty($agents)): ?>
                                                <?php foreach ($agents as $agent): ?>
                                                    <li class="d-flex align-items-center justify-content-between">
                                                        <div class="name-avatar d-flex align-items-center pr-2">
                                                            <div class="avatar mr-2 flex-shrink-0">
                                                                <img src="<?= $agent->profile_img ?>" style="object-fit: cover;aspect-ratio: 1;" class="border-radius-100 box-shadow" width="50" height="50" alt="" />
                                                            </div>
                                                            <div class="txt">
                                                                <span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">Available</span>
                                                                <div class="font-14 weight-600"><?= $agent->name ?></div>
                                                                <div class="font-12 weight-500" data-color="#b2b1b6">
                                                                    Customer Service Agent
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <li>No Agents found.</li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-20">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="create-view-form" class="card-box pd-20 mb-30" style="display: none;">
                    <h4 class="text-blue h4">Manage View</h4>
                    <input type="hidden" id="edit-view-id">

                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" required id="view_name">
                    </div>

                    <!-- Status Filter -->
                    <div class="row form-group">
                        <div class="col-2 btn">Where:</div>
                        <div class="col"><a class="btn col border">Status</a></div>
                        <div class="col">
                            <select class="form-control" id="status_operand">
                                <option value="is">is</option>
                                <option value="isnot">is not</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" id="status_value">
                                <option value="">Select</option>
                                <?php foreach ($distinctValues['statuses'] as $status): ?>
                                    <option value="<?= esc($status['status']) ?>"><?= esc($status['status']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Channel Filter -->
                    <div class="row form-group">
                        <div class="col-2 btn">and</div>
                        <div class="col"><a class="btn col border">Channel</a></div>
                        <div class="col">
                            <select class="form-control" id="channel_operand">
                                <option value="is">is</option>
                                <option value="isnot">is not</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" id="channel_value">
                                <option value="">Select</option>
                                <?php foreach ($distinctValues['channels'] as $channel): ?>
                                    <option value="<?= esc($channel['channel']) ?>"><?= esc($channel['channel']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Assigned User Filter -->
                    <div class="row form-group">
                        <div class="col-2 btn">and</div>
                        <div class="col"><a class="btn col border">Assignee User</a></div>
                        <div class="col">
                            <select class="form-control" id="user_operand">
                                <option value="is">is</option>
                                <option value="isnot">is not</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" id="user_value">
                                <option value="">Select</option>
                                <?php foreach ($distinctValues['agents'] as $agent): ?>
                                    <option value="<?= esc($agent['assigned_agent']) ?>"><?= esc($agent['assigned_agent']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="text-right form-group">
                        <a class="btn btn-primary" id="create-view">Create View</a>
                        <a class="btn btn-success" id="update-view">Update View</a>
                        <a class="btn btn-danger" id="delete-view">Delete View</a>
                    </div>
                </div>


                <style>
                    .view-btn {
                        position: relative;
                        display: inline-block;
                        padding-right: 35px;
                        /* Space for the edit button */
                    }

                    .edit-icon {
                        position: absolute;
                        right: 5px;
                        top: 50%;
                        transform: translateY(-50%);
                        display: none;
                        cursor: pointer;
                        color: #212529;
                    }

                    .view-btn:hover .edit-icon {
                        display: inline;
                    }
                </style>

                <div class="d-flex justify-content-between mb-30">
                    <div class="col"
                        style="
                            width: 100%;
                            overflow-x: auto;
                            scrollbar-width: none;
                            display: flex;
                            gap: 5px;
                        "
                        id="views">
                        <?php foreach ($views as $view): ?>
                            <a class="btn border apply-view view-btn" data-id="<?= $view['id'] ?>">
                                <?= esc($view['name']) ?>
                                <i class="icon-copy fa fa-edit edit-icon edit-view"
                                    data-id="<?= $view['id'] ?>"
                                    data-name="<?= esc($view['name']) ?>"
                                    data-status="<?= esc($view['status_filter']) ?>"
                                    data-status-operand="<?= esc($view['status_operand']) ?>"
                                    data-channel="<?= esc($view['channel_filter']) ?>"
                                    data-channel-operand="<?= esc($view['channel_operand']) ?>"
                                    data-user="<?= esc($view['assignee_filter']) ?>"
                                    data-user-operand="<?= esc($view['assignee_operand']) ?>"
                                    title="Edit View"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <a class="btn btn-primary ml-3" id="toggle-create-view">Add View</a>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20 row">
                        <div class="col-5">
                            <h4 class="text-blue h4">Recent Conversations</h4>
                        </div>
                        <div class="col d-flex justify-content-end"></div>
                    </div>

                    <div class="pb-20">
                        <table id="manage-table" class="table dataTable hover max-width nowrap data-table-export">
                            <thead>
                                <tr>
                                    <th class="dt-body-center">
                                        <div class="dt-checkbox">
                                            <input type="checkbox" id="select-all-emails">
                                            <span class="dt-checkbox-label"></span>
                                        </div>
                                    </th>
                                    <th class="table-plus">Conversations</th>
                                    <th>Tags</th>
                                    <th>Customer Details</th>
                                    <th>Assigned User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($conversations)): ?>
                                    <?php foreach ($conversations as $conversation): ?>
                                        <tr id="conversation-<?= esc($conversation['id']) ?>"> <!-- Unique ID for each row -->
                                            <td class="dt-body-center">
                                                <div class="dt-checkbox">
                                                    <input type="checkbox" class="email-checkbox" name="selected_emails[]" value="<?= esc($conversation['id']) ?>">
                                                    <span class="dt-checkbox-label"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="email-thread mb-3">
                                                    <div class="name-avatar d-flex align-items-center pr-2">
                                                        <div class="txt w-100">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="font-14 weight-600">
                                                                    <!-- Display Chat or Email Icon -->
                                                                    <?php if ($conversation['channel'] === 'livechat'): ?>
                                                                        <span class="badge badge-success">Live Chat</span>
                                                                        <a href="<?= base_url('conversation_view/' . esc($conversation['id']) . '/' . esc($conversation['channel'])); ?>">
                                                                            <?= esc($conversation['subject']) ?>
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-primary">Email</span>
                                                                        <a href="<?= base_url('conversation_view/' . esc($conversation['id']) . '/' . esc($conversation['channel'])); ?>">
                                                                            <?= esc($conversation['subject']) ?>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <small class="text-muted">
                                                                    <?= timeAgo($conversation['email_date']) ?>
                                                                </small>
                                                            </div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="font-12 weight-600 text-dark">
                                                                    <?= $conversation['from_email'] ? 'From:' . esc($conversation['from_email']) : '' ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if (!empty($conversation['unique_tags'])): ?>
                                                    <?php foreach ($conversation['unique_tags'] as $tag): ?>
                                                        <span class="badge badge-pill badge-primary">
                                                            <?= esc($tag) ?>
                                                        </span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?= esc($conversation['customer_name']) ?: '{Guest}' ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($conversation['assigned_agent'])): ?>
                                                    <span class="badge badge-pill badge-info">
                                                        Agent: <?= esc($conversation['assigned_agent']) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <select class="status-dropdown form-control" data-id="<?= esc($conversation['id']) ?>">
                                                    <option value="new" <?= $conversation['status'] === 'new' ? 'selected' : '' ?>>New</option>
                                                    <option value="processing" <?= $conversation['status'] === 'processing' ? 'selected' : '' ?>>Processing</option>
                                                    <option value="resolved" <?= $conversation['status'] === 'resolved' ? 'selected' : '' ?>>Resolved</option>
                                                    <option value="active" <?= $conversation['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                                                    <option value="unresolved" <?= $conversation['status'] === 'unresolved' ? 'selected' : '' ?>>Unresolved</option>
                                                </select>
                                            </td>
                                            <td>
                                                <?php if (empty($conversation['ticket_no'])): ?>
                                                    <a class="btn btn-primary btn-sm create-ticket" data-id="<?= esc($conversation['id']) ?>">Create Ticket</a>
                                                <?php else: ?>
                                                    <?php if ($conversation['ticket_status'] === 'opened'): ?>
                                                        <a class="btn btn-danger btn-sm close-ticket" data-id="<?= esc($conversation['id']) ?>">Close Ticket</a>
                                                    <?php else: ?>
                                                        <a class="btn btn-success btn-sm open-ticket" data-id="<?= esc($conversation['id']) ?>">Reopen Ticket</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>No conversations found.</tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Compose Email Modal -->
                <div class="modal fade" id="composeEmailModal" tabindex="-1" role="dialog" aria-labelledby="composeEmailLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="composeEmailLabel">Compose New Email</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="compose-email-form">
                                    <!-- To Field -->
                                    <div class="form-group">
                                        <label>To</label>
                                        <div class="email-tag-container form-control" id="compose-to-container">
                                            <input type="text" class="email-input" id="compose-email-to" placeholder="Enter recipient email">
                                        </div>
                                    </div>

                                    <!-- CC Field -->
                                    <div class="form-group">
                                        <label>Cc</label>
                                        <div class="email-tag-container form-control" id="compose-cc-container">
                                            <input type="text" class="email-input" id="compose-email-cc" placeholder="Enter CC email (optional)">
                                        </div>
                                    </div>

                                    <!-- BCC Field -->
                                    <div class="form-group">
                                        <label>Bcc</label>
                                        <div class="email-tag-container form-control" id="compose-bcc-container">
                                            <input type="text" class="email-input" id="compose-email-bcc" placeholder="Enter BCC email (optional)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" id="compose-email-subject" placeholder="Enter subject">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <div id="compose-email-content" style="height: 200px;"></div>
                                        <input type="hidden" id="email-content-hidden">
                                    </div>
                                    <!-- Attachments -->
                                    <div class="form-group">
                                        <label>Attachments</label>
                                        <button type="button" class="btn btn-secondary" id="add-compose-attachment">
                                            <i class="fa fa-paperclip"></i> Add Attachment
                                        </button>
                                        <input type="file" id="compose-file-input" multiple style="display: none;">
                                        <div class="attachment-previews row mt-3" id="compose-upload-previews"></div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="send-compose-email">Send Email</button>
                                    </div>
                                </form>
                            </div>
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

</body>


<?php
function timeAgo($timestamp)
{
    $time = strtotime($timestamp);
    $current = time();
    $diff = $current - $time;

    $intervals = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($intervals as $secs => $str) {
        $d = $diff / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
    return 'just now';
}
?>



<script>
    $(document).ready(function() {
        // Select/Deselect All
        $("#select-all-emails").change(function() {
            $(".email-checkbox").prop("checked", $(this).prop("checked"));
        });

        function getSelectedIds() {
            let selectedIds = [];
            $(".email-checkbox:checked").each(function() {
                selectedIds.push($(this).val());
            });
            return selectedIds;
        }

        function performBulkAction(action, button) {
            let selectedIds = getSelectedIds();
            let clickedId = $(button).data("id");

            if (selectedIds.length === 0) {
                selectedIds = [clickedId]; // If no checkboxes selected, perform action only for clicked row
            }

            if (action === "create" || action === "close" || action === "open") {
                let url = "<?= base_url() ?>" + action + "Ticket"; // Fix: Properly concatenate base_url()

                $.post(url, {
                    conversation_ids: selectedIds
                }, function(response) {
                    if (response.status === "success") {
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, "json");
            } else {
                $.post("<?= base_url('updateStatus') ?>", {
                    conversation_ids: selectedIds,
                    status: action
                }, function(response) {
                    if (response.status === "success") {
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, "json");
            }
        }

        // Change Status
        $(".status-dropdown").change(function() {
            let action = $(this).val();
            performBulkAction(action, this);
        });

        // Create Ticket
        $(".create-ticket").click(function() {
            performBulkAction("create", this);
        });

        // Close Ticket
        $(".close-ticket").click(function() {
            performBulkAction("close", this);
        });

        // Open Ticket
        $(".open-ticket").click(function() {
            performBulkAction("open", this);
        });
    });
</script>

<script>
    $(document).ready(function() {
        let composeAttachments = new FormData();

        initializeEmailTagContainer("compose-to-container");
        initializeEmailTagContainer("compose-cc-container");
        initializeEmailTagContainer("compose-bcc-container");

        // Email validation function
        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        // Open File Input on Button Click
        $("#add-compose-attachment").click(function() {
            $("#compose-file-input").click();
        });

        // Handle File Selection
        $("#compose-file-input").change(function(e) {
            const files = e.target.files;

            for (let file of files) {
                let fileId = "file_" + Date.now();
                composeAttachments.append(fileId, file);

                // Create preview
                const previewCard = $(`<div class="col-md-3 mb-3" id="preview-${fileId}">
                <div class="attachment-preview-card">
                    <div class="preview-placeholder">${getPreviewContent(file)}</div>
                    <div class="attachment-info">
                        <span class="filename">${file.name}</span>
                        <button type="button" class="btn btn-sm btn-secondary remove-compose-attachment" data-id="${fileId}">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>`);

                $("#compose-upload-previews").append(previewCard);
            }
        });

        // Remove Attachment
        $(document).on("click", ".remove-compose-attachment", function() {
            let fileId = $(this).data("id");
            composeAttachments.delete(fileId);
            $(`#preview-${fileId}`).remove();
        });


        // Send Email
        $("#send-compose-email").click(function() {
            let toEmails = $("#compose-to-container-hidden").val() || "";
            let ccEmails = $("#compose-cc-container-hidden").val() || "";
            let bccEmails = $("#compose-bcc-container-hidden").val() || "";
            let subject = $("#compose-email-subject").val() ? $("#compose-email-subject").val().trim() : "";
            let content = $("#email-content-hidden").val() ? $("#email-content-hidden").val().trim() : "";

            // Validation
            if (!toEmails) {
                alert("Please enter at least one recipient email.");
                return;
            }

            if (!subject) {
                alert("Please enter a subject.");
                return;
            }

            if (!content) {
                alert("Please enter the email content.");
                return;
            }

            let formData = new FormData();
            formData.append("to_email", toEmails);
            formData.append("cc_email", ccEmails);
            formData.append("bcc_email", bccEmails);
            formData.append("subject", subject);
            formData.append("content", content);

            for (let pair of composeAttachments.entries()) {
                formData.append(pair[0], pair[1]);
            }

            $.ajax({
                url: "<?= base_url('sendComposeEmail') ?>",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#send-compose-email").prop("disabled", true).text("Sending...");
                },
                success: function(response) {
                    if (response.status === "success") {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function() {
                    alert("Error sending email. Please try again.");
                },
                complete: function() {
                    $("#send-compose-email").prop("disabled", false).text("Send Email");
                }
            });
        });


        // Initialize Quill Editor
        const composeQuill = new Quill("#compose-email-content", {
            theme: "snow",
            modules: {
                toolbar: [
                    ["bold", "italic", "underline"],
                    [{
                        "list": "ordered"
                    }, {
                        "list": "bullet"
                    }],
                    ["clean"]
                ],
            },
            placeholder: "Compose your email...",
        });

        composeQuill.on("text-change", function() {
            $("#email-content-hidden").val(composeQuill.root.innerHTML);
        });


        // Function to initialize email tag containers
        function initializeEmailTagContainer(containerId) {
            const container = $(`#${containerId}`);
            const input = container.find(".email-input");

            // Store emails in a hidden input
            const hiddenInput = $("<input>", {
                type: "hidden",
                id: `${containerId}-hidden`,
                name: `${containerId}-hidden`
            });
            container.append(hiddenInput);

            input.on("keydown", function(e) {
                if (e.key === "Enter" || e.key === ",") {
                    e.preventDefault();
                    const email = $(this).val().trim().replace(",", "");

                    if (email && isValidEmail(email)) {
                        const tag = createEmailTag(email, container);
                        $(this).before(tag);
                        $(this).val("");
                        updateHiddenInput(container);
                    } else if (email) {
                        alert("Please enter a valid email address");
                    }
                }
            });

            container.on("click", ".remove-tag", function() {
                $(this).parent().remove();
                updateHiddenInput(container);
            });

            function updateHiddenInput(container) {
                const emails = [];
                container.find(".email-tag").each(function() {
                    emails.push($(this).text().slice(0, -1));
                });
                container.find("input[type='hidden']").val(emails.join(","));
            }
        }

        // Function to create an email tag
        function createEmailTag(email, container) {
            return $('<span>', {
                class: 'email-tag',
                html: `${email}<span class="remove-tag">×</span>`
            });
        }


        function getPreviewContent(file) {
            const type = file.type.split("/")[0];

            switch (type) {
                case "image":
                    return '<i class="fa fa-spinner fa-spin"></i>';
                case "application":
                    return file.name.endsWith(".pdf") ? '<i class="fa fa-file-pdf fa-2x"></i>' : '<i class="fa fa-file fa-2x"></i>';
                default:
                    return '<i class="fa fa-file fa-2x"></i>';
            }
        }
    });
</script>


<!-- Update the JavaScript -->
<script>
    $(document).ready(function() {

        // Toggle Create View Form
        $("#toggle-create-view").click(function() {
            $("#create-view-form").slideToggle();
            $("#update-view").hide();
            $("#delete-view").hide();
            $("#create-view").show();
        });

        // Open Edit View Form
        $(".edit-view").click(function(event) {
            event.stopPropagation(); // Prevent triggering the apply-view click
            let viewId = $(this).data("id");

            // Populate form fields with view data
            $("#edit-view-id").val(viewId);
            $("#view_name").val($(this).data("name"));
            $("#status_operand").val($(this).data("status-operand"));
            $("#status_value").val($(this).data("status"));
            $("#channel_operand").val($(this).data("channel-operand"));
            $("#channel_value").val($(this).data("channel"));
            $("#user_operand").val($(this).data("user-operand"));
            $("#user_value").val($(this).data("user"));

            $("#create-view-form").slideDown();
            $("#update-view").show();
            $("#delete-view").show();
            $("#create-view").hide();
        });

        // Create New View
        $("#create-view").click(function() {
            let viewName = $("#view_name").val().trim();

            // Validation: Ensure the name is not empty
            if (viewName === "") {
                alert("View name cannot be empty.");
                return;
            }

            let formData = {
                view_name: viewName,
                status_value: $("#status_value").val(),
                status_operand: $("#status_operand").val(),
                channel_value: $("#channel_value").val(),
                channel_operand: $("#channel_operand").val(),
                user_value: $("#user_value").val(),
                user_operand: $("#user_operand").val()
            };

            $.post("<?= base_url('createView') ?>", formData, function(response) {
                if (response.status === "success") {
                    location.reload();
                } else {
                    alert(response.message);
                }
            }, "json");
        });

        // Update View
        $("#update-view").click(function() {
            let viewName = $("#view_name").val().trim();

            // Validation: Ensure the name is not empty
            if (viewName === "") {
                alert("View name cannot be empty.");
                return;
            }

            let formData = {
                view_id: $("#edit-view-id").val(),
                view_name: viewName,
                status_value: $("#status_value").val(),
                status_operand: $("#status_operand").val(),
                channel_value: $("#channel_value").val(),
                channel_operand: $("#channel_operand").val(),
                user_value: $("#user_value").val(),
                user_operand: $("#user_operand").val()
            };

            $.post("<?= base_url('updateView') ?>", formData, function(response) {
                if (response.status === "success") {
                    location.reload();
                } else {
                    alert(response.message);
                }
            }, "json");
        });

        // Delete View
        $("#delete-view").click(function() {
            let viewId = $("#edit-view-id").val();

            if (confirm("Are you sure you want to delete this view?")) {
                $.post("<?= base_url('deleteView') ?>", {
                    view_id: viewId
                }, function(response) {
                    if (response.status === "success") {
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, "json");
            }
        });

        // Apply View Filter and Highlight Selected View
        $(".apply-view").click(function() {
            $(".apply-view").removeClass("active").addClass("border");
            $(this).removeClass("border").addClass("active");

            let viewId = $(this).data("id");

            $.get("<?= base_url('applyView/') ?>" + viewId, function(response) {
                if (response.status === "success") {
                    $("#manage-table tbody tr").hide();
                    response.conversationIds.forEach(function(id) {
                        $("#conversation-" + id).show();
                    });
                }
            }, "json");
        });


        // Toggle replies visibility
        $('.toggle-replies').click(function(e) {
            e.preventDefault();
            var threadId = $(this).data('thread');
            var repliesContainer = $('#replies-' + threadId);
            repliesContainer.slideToggle();

            // Update button text
            $(this).text(repliesContainer.is(':visible') ? 'Hide replies' : 'Show replies');
        });

        // Function to refresh emails
        function refreshEmails() {
            $.ajax({
                url: '<?= base_url('process_new_emails') ?>',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('Email refresh response:', response);
                    if (response.status === 'success' && response.processed > 0) {
                        // Update only affected threads
                        updateAffectedThreads(response.processed);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error refreshing emails:', error);
                }
            });
        }

        // Function to update affected threads
        function updateAffectedThreads() {
            $.ajax({
                url: '<?= base_url('fetchEmails') ?>',
                method: 'GET',
                success: function(response) {
                    $('#email-list-container').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error updating threads:', error);
                }
            });
        }

        // Check for new emails every 5 minutes
        setInterval(refreshEmails, 300000);
    });
</script>

<script>
    $.fn.dataTable.ext.errMode = 'none';
    $('.data-table-export').DataTable({
        scrollX: true,
        scrollCollapse: true,
        autoWidth: false,
        responsive: false,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search",
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            }
        },
    });
</script>


<script>
    $(document).ready(function() {
        $('.data-table-export').DataTable({
            scrollX: true,
            scrollCollapse: true,
            autoWidth: false,
            responsive: false,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                searchPlaceholder: "Search",
                paginate: {
                    next: '<i class="ion-chevron-right"></i>',
                    previous: '<i class="ion-chevron-left"></i>'
                }
            },
        });
    });
</script>

</html>