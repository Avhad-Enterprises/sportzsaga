<!-- index head Section -->
<?= $this->include('index_head_view') ?>
<!-- index head Section End -->

<body class="homepage-body-container">
    <!-- Story Section -->
    <?= $this->include('navbar_view') ?>
    <!-- Story Section End -->
    
    <div class="pageHead">
        <a href="<?= base_url() ?>allblogs">
            Blogs
        </a>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($blogs as $blog) : ?>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <a href="<?= base_url(); ?>blog/<?= $blog['blog_metaurl'] ?>">
                        <div class="mb-4">
                            <div class="blogImgSection">
                                <img src="<?= base_url('uploads/' . $blog['blog_image']) ?>" alt="" />
                            </div>
                            <div class="blogBotCategory">
                                <div class="d-flex">
                                <div class="no-wrap">
                                    <?= $blog['category'] ?>
                                </div>
                                <div class="">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5 10C11.9696 10 11.4609 10.2107 11.0858 10.5858C10.7107 10.9609 10.5 11.4696 10.5 12C10.5 12.5304 10.7107 13.0391 11.0858 13.4142C11.4609 13.7893 11.9696 14 12.5 14C13.61 14 14.5 13.11 14.5 12C14.5 11.4696 14.2893 10.9609 13.9142 10.5858C13.5391 10.2107 13.0304 10 12.5 10Z" fill="black"></path>
                                    </svg>
                                </div>
                                <div class="no-wrap dateOfTx">
                                    <?php $date = new DateTime($blog['publish_date_and_time']);echo $date->format('d-F-Y');?>
                                </div>
                            </div>
                            </div>
                            <div class="secHeadingex">
                                <?= $blog['blog_title'] ?>
                            </div>
                            <div class="blogContTex">
                                <?= substr($blog['blog_description'], 0, 100) ?>...
                            </div>
                            <button type="button" class="readMoreButton">
                                Read more
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.2705 12C21.2705 11.641 21.0765 11.406 20.6885 10.934C19.2685 9.21 16.1365 6 12.5005 6C8.86447 6 5.73247 9.21 4.31247 10.934C3.92447 11.406 3.73047 11.641 3.73047 12C3.73047 12.359 3.92447 12.594 4.31247 13.066C5.73247 14.79 8.86447 18 12.5005 18C16.1365 18 19.2685 14.79 20.6885 13.066C21.0765 12.594 21.2705 12.359 21.2705 12ZM12.5005 15C13.2961 15 14.0592 14.6839 14.6218 14.1213C15.1844 13.5587 15.5005 12.7956 15.5005 12C15.5005 11.2044 15.1844 10.4413 14.6218 9.87868C14.0592 9.31607 13.2961 9 12.5005 9C11.7048 9 10.9418 9.31607 10.3791 9.87868C9.81654 10.4413 9.50047 11.2044 9.50047 12C9.50047 12.7956 9.81654 13.5587 10.3791 14.1213C10.9418 14.6839 11.7048 15 12.5005 15Z" fill="black" />
                                </svg>
                            </button>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="clearfix"></div>

        <!-- Pagination Links -->
        <div class="pagination-container">
            <?= $pager->links() ?>
        </div>
    </div>
    <!-- Footer Section -->
    <?= $this->include('footer') ?>
    <!-- Footer Section End -->
</body>

<!-- Index Footer Section -->
<?= $this->include('index_footer_view') ?>
<!-- Index Footer End -->

</html>