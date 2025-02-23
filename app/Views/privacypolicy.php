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
                <p>Privacy Policy</p>
            </div>
            <div class="footer-con-text">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nihil laboriosam voluptatem atque vitae at adipisci itaque eligendi hic impedit? Hic voluptates animi amet laudantium. Nostrum inventore quaerat amet modi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque cumque assumenda, at ab rerum similique ipsam quas repudiandae corporis soluta in nemo molestias voluptas id eligendi sunt impedit et voluptatem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto obcaecati modi possimus. At nihil ipsa rerum consectetur eaque. Cum, consequatur. Animi voluptates debitis ad in? Praesentium optio eligendi aut esse! Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio quam nobis neque asperiores ea? Dicta inventore tempora dolore facilis dignissimos quae, asperiores odio nesciunt et officia rem consequuntur iste non. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero maxime possimus ad beatae ipsa sequi obcaecati omnis eius architecto fugiat odio, debitis consequuntur velit excepturi reprehenderit praesentium ex numquam repellat!
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