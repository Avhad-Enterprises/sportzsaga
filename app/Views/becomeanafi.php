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

        <div class="tandc-image" style="    background-image: url(<?= base_url() ?>images/tandcimage.jpg);">
            <h1> Recommend Drip. Earn Ad Fees*</h1>
        </div>
        <div>
            <h1 class="tandc-h1">Driphunter Associates - Driphunter’s affiliate marketing program</h1>
            <p class="tandc-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim. Natoque penatibus et magnis dis parturient montes nascetur. Eu lobortis elementum nibh tellus.</p>
        </div>
        <div class="instructioncards row">
            <div class="instructioncard col-sm">
            <img src="<?= base_url() ?>images/becoafis1.jpg">
            <h1>Step 1: Sign up </h1>
            <p>Join tens of thousands of creators, publishers and bloggers who are earning with the Driphunter Associates Program.</p>
            </div>

            <div class="instructioncard col-sm">
            <img src="<?= base_url() ?>images/becoafis2.jpg">
            <h1>Step 2: Recommend </h1>
            <p>Share millions of products with your audience. We have customized linking tools for large publishers, individual bloggers and social media influencers.</p>
            </div>

            <div class="instructioncard col-sm">
            <img src="<?= base_url() ?>images/becoafis3.jpg">
            <h1>Step 3: Earn </h1>
            <p>Earn up to x% in affiliate fees from qualifying purchases and programs. Our competitive conversion rates help maximize earnings.</p>
            </div>
        </div>

        <div class="carousel-container-homepage">
            <div class="carousel carousel-desktop"><!-- 1330*560 -->
                <img src="<?= base_url('images/becomeanaficar1.jpg') ?>" alt="Description for Image 1">
                <img src="<?= base_url('images/becomeanaficar1.jpg') ?>" alt="Description for Image 2">
                <img src="<?= base_url('images/becomeanaficar1.jpg') ?>" alt="Description for Image 3">
            </div>
        
            <!-- Mobile Carousel -->
            <div class="carousel carousel-mobile">
                <img src="<?= base_url('images/becoafimobile.jpg') ?>" alt="Description for Image 1">
                <img src="<?= base_url('images/becoafimobile.jpg') ?>" alt="Description for Image 2">
                <img src="<?= base_url('images/becoafimobile.jpg') ?>" alt="Description for Image 3">
            </div>
        </div>
        
        <ul class="indicators">
            <li class="indicator active"></li>
            <li class="indicator"></li>
            <li class="indicator"></li>
        </ul>

        <div class="row HeaderPara">
            <div class="col-sm-7">
                <h1 class="tandc-h1">Header</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </br></br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed odio morbi quis commodo odio aenean sed adipiscing diam. Bibendum neque egestas congue quisque egestas diam in arcu. Commodo ullamcorper a lacus vestibulum sed arcu non. Congue mauris rhoncus aenean vel elit scelerisque mauris. Aliquam sem fringilla ut morbi tincidunt augue interdum velit euismod. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Lorem ipsum dolor sit amet consectetur adipiscing. Porta nibh venenatis cras sed felis eget velit aliquet. Vulputate sapien nec sagittis aliquam malesuada bibendum arcu. In cursus turpis massa tincidunt dui ut ornare. In dictum non consectetur a erat nam at. Ut ornare lectus sit amet est placerat. Mattis enim ut tellus elementum sagittis vitae et. Orci phasellus egestas tellus rutrum
                </p>            
            </div>
            <div class="col-sm-5 faq">
                <p>Frequently Asked Questions*</p>
                <div class="accordion" id="accordionExample">
                    <div class="question">
                        <a class="q" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                            <div class="" >
                            How does the Associates Program work?
                            </div>
                            <i class="icon-copy fa fa-angle-down" aria-hidden="true"></i>                            
                        </a>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                        You can share products and available programs on Amazon with your audience through customized linking tools and earn money on qualifying purchases and customer actions like signing up for a free trial program. Learn more.
                        </div>
                        </div>
                    </div>
                    <div class="question">
                        <a class="q" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id="headingTwo">
                            <div class="" >
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                            </div>
                            <i class="icon-copy fa fa-angle-down" aria-hidden="true"></i>                            
                        </a>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        </div>
                    </div>
                    <div class="question">
                        <a class="q" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" id="headingThree">
                            <div class="" >
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit?
                            </div>
                            <i class="icon-copy fa fa-angle-down" aria-hidden="true"></i>                            
                        </a>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>

        <div class="row join_us">
            <div class="col-sm-5">                
                <img src="<?= base_url() ?>images/becomafijoinus.jpg">
            </div>
            <div class="col-sm-7">
                <h1>Become an Driphunter Affiliate</h1>
                <p>Start your affiliate Journey on Driphunter and become a part of our marketing community.</p>
                <button type="button" class="btn btn-warning">Sign up*</button>
                <a>It takes only few minutes to setup your account </a>
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