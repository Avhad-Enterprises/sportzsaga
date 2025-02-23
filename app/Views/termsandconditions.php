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

        <div class="col">
            <div class="tandc-button">
                <p>Terms and Conditions</p>
            </div>
            <div class="footer-con-text">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nihil laboriosam voluptatem atque vitae at adipisci itaque eligendi hic impedit? Hic voluptates animi amet laudantium. Nostrum inventore quaerat amet modi? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero dolorem nulla ex eum iste temporibus, possimus veritatis? Earum aliquid reiciendis, nulla, obcaecati nostrum, ex sapiente cumque minima delectus quod doloribus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit eaque labore aliquam quam minima doloremque, autem repellendus laboriosam maiores, qui rem neque. Aut culpa corrupti facere fugiat nesciunt, architecto non. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias iste quos nihil iusto corporis vitae accusantium quidem? Tenetur facere labore aliquam quia, sunt veritatis corrupti voluptates obcaecati cumque delectus molestias. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam sequi voluptas ut eligendi ipsa? Nostrum nisi reprehenderit, perferendis eos maxime consequatur, cum minima repudiandae, voluptatem in hic! Cupiditate, delectus beatae!
                </p>
            </div>

            <div class="tandc-image">
                <img src="<?= base_url() ?>images/tandcimage.jpg" alt="">
            </div>
        </div>


    </div>

    <!-- Story Section -->
    <?= $this->include('footer') ?>
    <!-- Story Section End -->

</body>

<!-- Index Footer Section -->
<?= $this->include('index_footer_view') ?>
<!-- Index Footer End -->

</html>