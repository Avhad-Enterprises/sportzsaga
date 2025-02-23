<!-- Story Section -->
<?= $this->include('index_head_view') ?>
<!-- Story Section End -->

<body class="homepage-body-container">

    <!-- Story Section -->
    <?= $this->include('navbar_view') ?>
    <!-- Story Section End -->

    <div class="container">
        
        <a href="<?= base_url() ?>cart" class="ub-bold"><strong><u>Back</u></strong></a>
        <?php foreach ($users as $user) : ?>
            <form action="<?= base_url('cart/update') ?>" method="post" id="Form">
                
                <div class="row">
                    <div class="col">
                        <div class="Cartboxes">
                            <p>
                                <b><?= $user['name'] ?></b><br>
                                +91 <?= $user['phone_no'] ?><br>
                                <?= $user['email'] ?><br>
                                <span class="offer-text"><?= $user['address_information'] ?></span><br>
                                <b><?= $user['pincode'] ?></b>
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="Cartboxes">
                            <?php foreach ($cartItems as $index => $item): ?>
                                <div class="Cartboxes-product">
                                    <i class="fa-solid fa-circle-xmark close-icon" data-product-id="<?= $item['product_id'] ?>"></i>
                                    <div class="flex">
                                        <div class="product-img">
                                            <img src="<?= base_url('uploads/' . $item['product_image']) ?>" alt="<?= esc($item['product_title']) ?>">
                                        </div>
                                        <div class="item-details">
                                            <p><strong><?= esc($item['brand']) ?></strong></p>
                                            <p><?= esc($item['product_title']) ?></p>
                                            <p>Sold by: <?= esc($item['vendor']) ?></p>
                                            <div class="flex-space-between">
                                                <div class="ProductSize">
                                                    <label for="size">Size</label>
                                                    <select name="product_size[]" id="product_size_<?= $index ?>" class="product-size">
                                                        <option value="xs" <?= $item['size'] == 'xs' ? 'selected' : '' ?>>XS</option>
                                                        <option value="s" <?= $item['size'] == 's' ? 'selected' : '' ?>>S</option>
                                                        <option value="m" <?= $item['size'] == 'm' ? 'selected' : '' ?>>M</option>
                                                        <option value="l" <?= $item['size'] == 'l' ? 'selected' : '' ?>>L</option>
                                                        <option value="xl" <?= $item['size'] == 'xl' ? 'selected' : '' ?>>XL</option>
                                                        <option value="xxl" <?= $item['size'] == 'xxl' ? 'selected' : '' ?>>XXL</option>
                                                        <option value="xxxl" <?= $item['size'] == 'xxxl' ? 'selected' : '' ?>>XXXL</option>
                                                    </select>
                                                </div>
                                                <div class="ProductQty">
                                                    <label for="qty">Qty</label>
                                                    <select name="product_qty[]" id="product_qty_<?= $index ?>" class="product-qty">
                                                        <?php for ($i = 1; $i <= 6; $i++): ?>
                                                            <option value="<?= $i ?>" <?= $item['quantity'] == $i ? 'selected' : '' ?>><?= $i ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="flex-space-between">
                                                <p class="ub-bold" id="selling_price_<?= $index ?>">&#8377;<?= esc($item['selling_price']) ?></p>
                                                <p class="price-old">&#8377;<?= esc($item['cost_price']) ?></p>
                                                <p class="price-discount">(22%)</p>
                                            </div>
                                            <p>
                                                <span class="coupon-discount">Coupon Discount:</span> Amount
                                            </p>
                                            <p>
                                                <span><i class="fa-solid fa-rotate"></i></span>
                                                <b>NO. of Days</b> Return Available
                                            </p>
                                            <p>
                                                <span><i class="fa-solid fa-circle-check" style="color: #39ff14;"></i></span>
                                                Delivery by <b>Company Name</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                
                                <!-- Hidden Inputs for Each Product -->
                                <input type="hidden" name="product_title[]" value="<?= esc($item['product_title']) ?>">
                                <input type="hidden" name="brand[]" value="<?= esc($item['brand']) ?>">
                                <input type="hidden" name="product_image[]" value="<?= esc($item['product_image']) ?>">
                                <input type="hidden" name="selling_price[]" id="hidden_selling_price_<?= $index ?>" value="<?= esc($item['selling_price']) ?>">
                                <input type="hidden" name="cost_price[]" value="<?= esc($item['cost_price']) ?>">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
            </form>
        <?php endforeach; ?>


    </div>

    <!-- Story Section -->
    <?= $this->include('footer') ?>
    <!-- Story Section End -->

    <!-- Add this script at the end of your body -->
    <script>
        $(document).ready(function() {
            // Toastr options
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "4000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            <?php if (session()->getFlashdata('success')) : ?>
                toastr.success('<?= session()->getFlashdata('success') ?>', null, {
                    className: 'toast-custom'
                });
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                toastr.error('<?= session()->getFlashdata('error') ?>', null, {
                    className: 'toast-custom'
                });
            <?php endif; ?>
        });
    </script>
</body>

<!-- Index Footer Section -->
<?= $this->include('index_footer_view') ?>
<!-- Index Footer End -->

</html>