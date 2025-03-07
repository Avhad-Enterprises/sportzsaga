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
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-6" />
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

    <!-- Left Sidebar Start -->
    <?= $this->include('left_view') ?>
    <!-- Left Sidebar End -->

    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h4>Abandoned Cart</h4>
                        </div>

                        <div class="col-md-6 col-sm-12 text-right blogs-imex">
                            <div class="dropdown">
                                <!-- Button to send multiple emails -->
                                <button type="submit" class="btn btn-primary fw-bold" id="send-email-btn" disabled>
                                    Send Multiple Email
                                </button>
                                <!-- Button to open custom email modal -->
                                <button type="button" class="btn btn-secondary fw-bold" data-toggle="modal"
                                    data-target="#customEmailModal">
                                    Create Custom Email
                                </button>
                            </div>
                        </div>

                        <!-- Custom Email Modal -->
                        <div class="modal fade" id="customEmailModal" tabindex="-1" role="dialog"
                            aria-labelledby="customEmailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="customEmailModalLabel">Compose Custom Email</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="custom-email-form" method="POST"
                                        action="<?= base_url('send-custom-email') ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="email-subject">Subject</label>
                                                <input type="text" class="form-control" id="email-subject"
                                                    name="email_subject" placeholder="Enter email subject" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email-body">Message Body</label>
                                                <textarea class="form-control" id="email-body" name="email_body"
                                                    rows="6" placeholder="Write your message here..."
                                                    required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="email-recipients">Recipients</label>
                                                <input type="text" class="form-control" id="email-recipients"
                                                    name="email_recipients" readonly>
                                                <small class="form-text text-muted">Recipients will be filled
                                                    automatically based on selected users.</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Send Email</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Abandoned Cart Items</h4>
                    </div>
                    <form method="POST" action="<?= base_url('send-email-multiple') ?>" id="abandoned-cart-form">
                        <div class="pb-20">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="select-all"></th> <!-- Checkbox to select all -->
                                        <th>ID</th>
                                        <th>User ID / Session ID</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($cart)): ?>
                                        <?php foreach ($cart as $item): ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="user_ids[]"
                                                        value="<?= $item['user_id'] ?? $item['guest_id'] ?>"
                                                        class="user-checkbox">
                                                </td>
                                                <td><?= $item['id'] ?></td>
                                                <td>
                                                    <?php if (!empty($item['user_id'])): ?>
                                                        <a href="<?= base_url('cart/edit_cart/' . $item['user_id']) ?>" class="text-success">
                                                            <?= $item['user_id'] ?>
                                                        </a>
                                                    <?php elseif (!empty($item['guest_id'])): ?>
                                                        <a href="<?= base_url('cart/edit_cart/' . $item['guest_id']) ?>" class="text-danger">
                                                            <?= $item['guest_id'] ?>
                                                        </a>
                                                    <?php else: ?>
                                                        NA
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if (!empty($item['product_image'])): ?>
                                                        <img src="<?= $item['product_image'] ?>"
                                                            alt="<?= $item['product_name'] ?>" width="50" height="50">
                                                    <?php else: ?>
                                                        No Image
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $item['product_name'] ?></td>
                                                <td><?= $item['quantity'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('abandoned-orders/send-email/' . ($item['user_id'] ?? $item['guest_id'])) ?>"
                                                        class="btn btn-primary btn-sm"
                                                        onclick="return confirm('Send email to this user or session?');">
                                                        Send Email
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">No items in the cart.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <?= $this->include('footer_view') ?>
            </div>
        </div>
    </div>
<script>
// Select/Deselect all checkboxes
document.getElementById('select-all').addEventListener('change', function () {
    const checkboxes = document.querySelectorAll('.user-checkbox');
    const isChecked = this.checked;
    checkboxes.forEach(checkbox => checkbox.checked = isChecked);
    toggleSendButton();
    updateRecipients();
});

// Enable/Disable the "Send Email" button based on selected checkboxes
document.querySelectorAll('.user-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        toggleSendButton();
        updateRecipients();
    });
});

function toggleSendButton() {
    const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
    const sendButton = document.getElementById('send-email-btn');
    sendButton.disabled = selectedCheckboxes.length === 0;
}

function updateRecipients() {
    const selectedUsers = Array.from(document.querySelectorAll('.user-checkbox:checked')).map(checkbox => checkbox.value).join(', ');
    document.getElementById('email-recipients').value = selectedUsers;
}

// Reset recipients when modal is closed (for custom email functionality)
$('#customEmailModal').on('hidden.bs.modal', function () {
    document.getElementById('email-recipients').value = '';
    document.getElementById('email-subject').value = '';
    document.getElementById('email-body').value = '';
});

// Submit the custom email form (for custom email functionality)
document.getElementById('custom-email-form').addEventListener('submit', function (event) {
    const recipients = document.getElementById('email-recipients').value;
    if (!recipients) {
        alert('Please select at least one recipient before sending the email.');
        event.preventDefault();
    }
});

// Submit the form when the send button is clicked (for sending emails)
document.getElementById('send-email-btn').addEventListener('click', function () {
    const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
    if (selectedCheckboxes.length > 0) {
        // Trigger the form submission if at least one checkbox is selected
        document.getElementById('abandoned-cart-form').submit();
    } else {
        alert('Please select at least one user to send the email.');
    }
});

// Enable the send button initially if there are selected checkboxes
window.onload = function () {
    toggleSendButton();  // Check and update the button status on page load
};
</script>




</body>

</html>