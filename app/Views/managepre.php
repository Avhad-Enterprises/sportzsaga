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
                <p>Manage preferences</p>
            </div>
            <div class="footer-con-text">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nihil laboriosam voluptatem atque vitae at adipisci itaque eligendi hic impedit? Hic voluptates animi amet laudantium. Nostrum inventore quaerat amet modi? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sunt nihil, aliquid odio numquam voluptatibus amet quidem, saepe temporibus pariatur earum quisquam non iste beatae, libero dicta magnam. Voluptates, beatae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, fugit minima accusamus cupiditate reprehenderit aspernatur dolores odio tempora dolore, quo nam voluptatibus ducimus rem quod, ex quos error! Commodi, assumenda. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et totam nobis inventore fuga autem dolorum nostrum! Sequi, ab id voluptatem, perspiciatis odio doloribus provident enim minus voluptates veritatis sed laborum? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam repellendus porro rem, adipisci aut dolore ex enim consectetur modi magni ducimus a praesentium! Perspiciatis architecto tempora magnam reiciendis, harum qui? Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro iusto debitis iure voluptatem sequi facilis quis aliquam optio, quas voluptatum nostrum totam minima illo saepe dolorum. Ipsa, amet quam. Blanditiis?
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