<!-- index head Section -->
<?= $this->include('index_head_view') ?>
<!-- index head Section End -->

<body class="homepage-body-container">

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-bottom-right" role="alert" id="success-message">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Story Section -->
    <?= $this->include('navbar_view') ?>
    <!-- Story Section End -->

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="image">
                    <img src="<?= base_url() ?>images/men.png" alt="">
                </div>
            </div>
            <div class="col-md-6 aboutus">
                <div class="secHeading">Slay The Streets</div>
                <div>
                    <h3>Our Story</h3>
                    <p class="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur.
                    </p>
                </div>
            </div>
        </div>


    </div>

    <!-- Story Section -->
    <?= $this->include('footer') ?>
    <!-- Story Section End -->

</body>

<script type="text/javascript" src="<?= base_url(); ?>js/index.js"></script>

</html>