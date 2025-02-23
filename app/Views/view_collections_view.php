<!-- Story Section -->
<?= $this->include('collection_head_view') ?>
<!-- Story Section End -->

<body>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-bottom-right" role="alert" id="success-message">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Story Section -->
    <?= $this->include('navbar_view') ?>
    <!-- Story Section End -->

    <div class="container CollectionView">
        <div class="container search-bar">
            <div class="search-container">
                <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                <input type="text" class="search-input" placeholder="Search...">
                <a href=""><i class="fa-solid fa-camera"></i></a>
            </div>
        </div>

        <section class="container" id="path">
            <p>
                Home / Clothing / Men Topwear
            </p>
        </section>

        <section class="container">
                <div class="ad" 
                style="
                    background-image: url('<?= base_url('uploads/' . $collections['collection_pc_image']) ?>');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    height: 300px;
                    width: 100%;
                ">
                    <h1 class="pageHead"><?= esc($collections['collection_title']) ?></h1>
                    <div class="img-text">
                        <p class="short-desc">
                            <?= esc(substr($collections['collection_description'], 0, 50)) ?>...
                        </p>
                        <p class="full-desc" style="display: none;">
                            <?= esc($collections['collection_description']) ?>
                        </p>
                    </div>
                    <div>
                        <a href="javascript:void(0);" class="readmore">Read More</a>
                        <i class="fa-solid fa-eye readmore-icon"></i>
                    </div>
                </div>
            
        </section>

        <section class="container">

            <div>
                
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <div class="p-1">
                            <div id="dropdown" onclick="" class="btn btn-outline-dark">
                                <p>Sort by :</p>
                                <select class="" id="dropdown">
                                    <option selected>Recommended</option>
                                    <option value="1">Latest</option>
                                    <option value="2">Most Viewed</option>
                                    <option value="3">Brand A-Z</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="" id="filterbutton">
                        <h2 class="accordion-header">
                            <button id="dropdown" class="filter-btn" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <select onclick="" id="dropdown">
                                    <option selected>Filter</option>
                                </select>
                            </button>
                        </h2>
                    </div>
                </div>
                
                <div id="selectedFilterContainer" style="display: flex; margin: 0; flex-wrap: wrap;">

                </div>
            </div>

            <div class="d-flex" style="justify-content: space-between;">
                <div class="row">
                <?php foreach ($products as $product) : ?>
                    <div class="col-6 col-sm-4 col-md-3 mb-3" id="items">
                        <div class="item-container" id="container">
                            <div class="filterDiv" id="item">
                                <div>
                                    <img src="<?= base_url('uploads/' . $product['product_image']) ?>" class="object-fit-cover" alt="<?= esc($product['product_title']) ?>">
                                </div>
                                <b><?= esc($product['brand']) ?></b>
                                <p><?= esc($product['product_title']) ?></p>
                                <section>
                                    <i class="fa-solid fa-star" style="color: #ffdc22;"></i>
                                    <i class="fa-solid fa-star" style="color: #ffdc22;"></i>
                                    <i class="fa-solid fa-star" style="color: #ffdc22;"></i>
                                    <i class="fa-regular fa-star" style="color: #ffdc22;"></i>
                                    <i class="fa-regular fa-star" style="color: #ffdc22;"></i>
                                    <span>
                                        <p class="rating-text">(3.5)</p>
                                    </span>
                                </section>
                                <price>
                                    <b>&#8377;<?= esc($product['selling_price']) ?></b>
                                    <p>&#8377;<?= esc($product['cost_price']) ?></p>
                                    <red>(Discount)</red>
                                </price>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

                
                
                <div class="FilterOption" id="filter-option">
                    <div class="accordion-item">
                        <div id="collapseExample" class="collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" style="width: -webkit-fill-available;">
                                <div id="mobile">
                                    <h1>Filters</h1>
                                    <div class="d-flex align-items-start" style="text-align: left; font-size: x-small; ">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link active" id="v-pills-Gender-tab" data-toggle="pill" href="#v-pills-Gender"
                                                type="button" role="tab" aria-selected="true">Gender</button>
                                            <button class="nav-link" id="v-pills-Categories-tab" data-toggle="pill" href="#v-pills-Categories"
                                                type="button" role="tab" aria-selected="false">Categories</button>
                                            <button class="nav-link" id="v-pills-Brands-tab" data-toggle="pill" href="#v-pills-Brands"
                                                type="button" role="tab" aria-selected="false">Brands</button>
                                            <button class="nav-link" id="v-pills-Price-tab" data-toggle="pill" href="#v-pills-Price"
                                                type="button" role="tab" aria-selected="false">Price</button>
                                            <button class="nav-link" id="v-pills-Review-tab" data-toggle="pill" href="#v-pills-Review"
                                                type="button" role="tab" aria-selected="false">Avg. Customer Review</button>
                                            <button class="nav-link" id="v-pills-Discount-tab" data-toggle="pill" href="#v-pills-Discount"
                                                type="button" role="tab" aria-selected="false">Discount Range</button>
                                            <button class="nav-link" id="v-pills-Colors-tab" data-toggle="pill" href="#v-pills-Colors"
                                                type="button" role="tab" aria-selected="false">Colors</button>
                                        </div>
                                        <div class="tab-content" id="v-pills-tabContent">

                                            <div class="tab-pane fade show active" id="v-pills-Gender" role="tabpanel"
                                                aria-labelledby="v-pills-Gender-tab" tabindex="0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="Men"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexRadioDefault1">Men</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="Women"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexRadioDefault1">Women</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="Unisex"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexRadioDefault1">Unisex</label>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-Categories" role="tabpanel"
                                                aria-labelledby="v-pills-Categories-tab" tabindex="0">
                                                <div id="mobileInput" class="dropdown-content"><svg width="15" height="25" viewBox="0 0 24 25"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M20.71 19.79L17.31 16.4C18.407 15.0025 19.0022 13.2767 19 11.5C19 9.91775 18.5308 8.37103 17.6518 7.05544C16.7727 5.73985 15.5233 4.71447 14.0615 4.10897C12.5997 3.50347 10.9911 3.34504 9.43928 3.65372C7.88743 3.9624 6.46197 4.72433 5.34315 5.84315C4.22433 6.96197 3.4624 8.38743 3.15372 9.93928C2.84504 11.4911 3.00347 13.0997 3.60897 14.5615C4.21447 16.0233 5.23985 17.2727 6.55544 18.1518C7.87103 19.0308 9.41775 19.5 11 19.5C12.7767 19.5022 14.5025 18.907 15.9 17.81L19.29 21.21C19.383 21.3037 19.4936 21.3781 19.6154 21.4289C19.7373 21.4797 19.868 21.5058 20 21.5058C20.132 21.5058 20.2627 21.4797 20.3846 21.4289C20.5064 21.3781 20.617 21.3037 20.71 21.21C20.8037 21.117 20.8781 21.0064 20.9289 20.8846C20.9797 20.7627 21.0058 20.632 21.0058 20.5C21.0058 20.368 20.9797 20.2373 20.9289 20.1154C20.8781 19.9936 20.8037 19.883 20.71 19.79ZM5 11.5C5 10.3133 5.3519 9.15328 6.01119 8.16658C6.67047 7.17989 7.60755 6.41085 8.7039 5.95673C9.80026 5.5026 11.0067 5.38378 12.1705 5.61529C13.3344 5.8468 14.4035 6.41825 15.2426 7.25736C16.0818 8.09648 16.6532 9.16558 16.8847 10.3295C17.1162 11.4933 16.9974 12.6997 16.5433 13.7961C16.0892 14.8925 15.3201 15.8295 14.3334 16.4888C13.3467 17.1481 12.1867 17.5 11 17.5C9.4087 17.5 7.88258 16.8679 6.75736 15.7426C5.63214 14.6174 5 13.0913 5 11.5Z"
                                                            fill="#2E2E2E" />
                                                    </svg>
                                                    <input type="text" name="searchmobilecategories" placeholder="Search.." id="myInput"
                                                        onkeyup="filtermobilecategories()">
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecategories" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Top Wear" id="mobile-filter-checkbox">
                                                        Top Wear
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecategories" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Bottom Wear"
                                                            id="mobile-filter-checkbox">
                                                        Bottom Wear
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecategories" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Caps" id="mobile-filter-checkbox">
                                                        Caps
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecategories" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Jeans" id="mobile-filter-checkbox">
                                                        Jeans
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecategories" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Shorts" id="mobile-filter-checkbox">
                                                        Shorts
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecategories" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Saree" id="mobile-filter-checkbox">
                                                        Saree
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-Brands" role="tabpanel" aria-labelledby="v-pills-Brands-tab"
                                                tabindex="0">
                                                <div id="mobileInput" class="dropdown-content"><svg width="15" height="25" viewBox="0 0 24 25"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M20.71 19.79L17.31 16.4C18.407 15.0025 19.0022 13.2767 19 11.5C19 9.91775 18.5308 8.37103 17.6518 7.05544C16.7727 5.73985 15.5233 4.71447 14.0615 4.10897C12.5997 3.50347 10.9911 3.34504 9.43928 3.65372C7.88743 3.9624 6.46197 4.72433 5.34315 5.84315C4.22433 6.96197 3.4624 8.38743 3.15372 9.93928C2.84504 11.4911 3.00347 13.0997 3.60897 14.5615C4.21447 16.0233 5.23985 17.2727 6.55544 18.1518C7.87103 19.0308 9.41775 19.5 11 19.5C12.7767 19.5022 14.5025 18.907 15.9 17.81L19.29 21.21C19.383 21.3037 19.4936 21.3781 19.6154 21.4289C19.7373 21.4797 19.868 21.5058 20 21.5058C20.132 21.5058 20.2627 21.4797 20.3846 21.4289C20.5064 21.3781 20.617 21.3037 20.71 21.21C20.8037 21.117 20.8781 21.0064 20.9289 20.8846C20.9797 20.7627 21.0058 20.632 21.0058 20.5C21.0058 20.368 20.9797 20.2373 20.9289 20.1154C20.8781 19.9936 20.8037 19.883 20.71 19.79ZM5 11.5C5 10.3133 5.3519 9.15328 6.01119 8.16658C6.67047 7.17989 7.60755 6.41085 8.7039 5.95673C9.80026 5.5026 11.0067 5.38378 12.1705 5.61529C13.3344 5.8468 14.4035 6.41825 15.2426 7.25736C16.0818 8.09648 16.6532 9.16558 16.8847 10.3295C17.1162 11.4933 16.9974 12.6997 16.5433 13.7961C16.0892 14.8925 15.3201 15.8295 14.3334 16.4888C13.3467 17.1481 12.1867 17.5 11 17.5C9.4087 17.5 7.88258 16.8679 6.75736 15.7426C5.63214 14.6174 5 13.0913 5 11.5Z"
                                                            fill="#2E2E2E" />
                                                    </svg>
                                                    <input type="text" name="searchmobilebrands" placeholder="Search.." id="myInput"
                                                        onkeyup="filtermobilebrands()">
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilebrands" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="UNRL" id="mobile-filter-checkbox">
                                                        UNRL
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilebrands" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Bewakoof" id="mobile-filter-checkbox">
                                                        Bewakoof
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilebrands" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Gavin Paris"
                                                            id="mobile-filter-checkbox">
                                                        Gavin Paris
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilebrands" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Adidas" id="mobile-filter-checkbox">
                                                        Adidas
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilebrands" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Kevien" id="mobile-filter-checkbox">
                                                        Kevien
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilebrands" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Cottonking"
                                                            id="mobile-filter-checkbox">
                                                        Cottonking
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="tab-pane fade" id="v-pills-Price" role="tabpanel" aria-labelledby="v-pills-Price-tab"
                                                tabindex="0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Less then &#8377;500"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">Less then &#8377;500</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="&#8377;501 - &#8377;1000"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">&#8377;501 - &#8377;1000</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="&#8377;1001 - &#8377;2000"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">&#8377;1001 - &#8377;2000</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="More than &#8377;2001"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">More than &#8377;2001</label>
                                                </div>
                                            </div>


                                            <div class="tab-pane fade" id="v-pills-Review" role="tabpanel" aria-labelledby="v-pills-Review-tab"
                                                tabindex="0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="4-star" id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault"><svg width="108" height="20"
                                                            viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.8007 8C12.5805 8 12.3863 7.85598 12.3223 7.64532L10.4784 1.57503C10.3348 1.10213 9.66523 1.10213 9.52158 1.57503L7.67773 7.64532C7.61374 7.85598 7.41949 8 7.19932 8H1.56147C1.07493 8 0.874993 8.62439 1.27103 8.907L5.88596 12.2002C6.06148 12.3254 6.13694 12.5491 6.07316 12.7551L4.2912 18.5104C4.14736 18.975 4.68422 19.3507 5.0714 19.0564L9.69767 15.5398C9.87637 15.404 10.1237 15.4039 10.3025 15.5396L14.9395 19.0586C15.3268 19.3525 15.8632 18.9768 15.7194 18.5124L13.9368 12.7548C13.873 12.5489 13.9483 12.3254 14.1236 12.2001L18.7313 8.90678C19.127 8.62398 18.9269 8 18.4406 8H12.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M34.8007 8C34.5805 8 34.3863 7.85598 34.3223 7.64532L32.4784 1.57503C32.3348 1.10213 31.6652 1.10213 31.5216 1.57503L29.6777 7.64532C29.6137 7.85598 29.4195 8 29.1993 8H23.5615C23.0749 8 22.875 8.62439 23.271 8.907L27.886 12.2002C28.0615 12.3254 28.1369 12.5491 28.0732 12.7551L26.2912 18.5104C26.1474 18.975 26.6842 19.3507 27.0714 19.0564L31.6977 15.5398C31.8764 15.404 32.1237 15.4039 32.3025 15.5396L36.9395 19.0586C37.3268 19.3525 37.8632 18.9768 37.7194 18.5124L35.9368 12.7548C35.873 12.5489 35.9483 12.3254 36.1236 12.2001L40.7313 8.90678C41.127 8.62398 40.9269 8 40.4406 8H34.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M56.8007 8C56.5805 8 56.3863 7.85598 56.3223 7.64532L54.4784 1.57503C54.3348 1.10213 53.6652 1.10213 53.5216 1.57503L51.6777 7.64532C51.6137 7.85598 51.4195 8 51.1993 8H45.5615C45.0749 8 44.875 8.62439 45.271 8.907L49.886 12.2002C50.0615 12.3254 50.1369 12.5491 50.0732 12.7551L48.2912 18.5104C48.1474 18.975 48.6842 19.3507 49.0714 19.0564L53.6977 15.5398C53.8764 15.404 54.1237 15.4039 54.3025 15.5396L58.9395 19.0586C59.3268 19.3525 59.8632 18.9768 59.7194 18.5124L57.9368 12.7548C57.873 12.5489 57.9483 12.3254 58.1236 12.2001L62.7313 8.90678C63.127 8.62398 62.9269 8 62.4406 8H56.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M78.8007 8C78.5805 8 78.3863 7.85598 78.3223 7.64532L76.4784 1.57503C76.3348 1.10213 75.6652 1.10213 75.5216 1.57503L73.6777 7.64532C73.6137 7.85598 73.4195 8 73.1993 8H67.5615C67.0749 8 66.875 8.62439 67.271 8.907L71.886 12.2002C72.0615 12.3254 72.1369 12.5491 72.0732 12.7551L70.2912 18.5104C70.1474 18.975 70.6842 19.3507 71.0714 19.0564L75.6977 15.5398C75.8764 15.404 76.1237 15.4039 76.3025 15.5396L80.9395 19.0586C81.3268 19.3525 81.8632 18.9768 81.7194 18.5124L79.9368 12.7548C79.873 12.5489 79.9483 12.3254 80.1236 12.2001L84.7313 8.90678C85.127 8.62398 84.9269 8 84.4406 8H78.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M99.8438 7.79064C99.9718 8.21197 100.36 8.5 100.801 8.5H106.441L101.833 11.7933C101.482 12.0439 101.332 12.491 101.459 12.9027L103.242 18.6603L98.6048 15.1413C98.2472 14.8699 97.7525 14.8701 97.3951 15.1418L92.7688 18.6583L94.5508 12.9029C94.6783 12.491 94.5274 12.0437 94.1764 11.7932L89.5615 8.5H95.1993C95.6397 8.5 96.0282 8.21197 96.1562 7.79064L98 1.72035L99.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                        </svg> & up</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="3-star" id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault"><svg width="108" height="20"
                                                            viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.8007 8C12.5805 8 12.3863 7.85598 12.3223 7.64532L10.4784 1.57503C10.3348 1.10213 9.66523 1.10213 9.52158 1.57503L7.67773 7.64532C7.61374 7.85598 7.41949 8 7.19932 8H1.56147C1.07493 8 0.874993 8.62439 1.27103 8.907L5.88596 12.2002C6.06148 12.3254 6.13694 12.5491 6.07316 12.7551L4.2912 18.5104C4.14736 18.975 4.68422 19.3507 5.0714 19.0564L9.69767 15.5398C9.87637 15.404 10.1237 15.4039 10.3025 15.5396L14.9395 19.0586C15.3268 19.3525 15.8632 18.9768 15.7194 18.5124L13.9368 12.7548C13.873 12.5489 13.9483 12.3254 14.1236 12.2001L18.7313 8.90678C19.127 8.62398 18.9269 8 18.4406 8H12.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M34.8007 8C34.5805 8 34.3863 7.85598 34.3223 7.64532L32.4784 1.57503C32.3348 1.10213 31.6652 1.10213 31.5216 1.57503L29.6777 7.64532C29.6137 7.85598 29.4195 8 29.1993 8H23.5615C23.0749 8 22.875 8.62439 23.271 8.907L27.886 12.2002C28.0615 12.3254 28.1369 12.5491 28.0732 12.7551L26.2912 18.5104C26.1474 18.975 26.6842 19.3507 27.0714 19.0564L31.6977 15.5398C31.8764 15.404 32.1237 15.4039 32.3025 15.5396L36.9395 19.0586C37.3268 19.3525 37.8632 18.9768 37.7194 18.5124L35.9368 12.7548C35.873 12.5489 35.9483 12.3254 36.1236 12.2001L40.7313 8.90678C41.127 8.62398 40.9269 8 40.4406 8H34.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M56.8007 8C56.5805 8 56.3863 7.85598 56.3223 7.64532L54.4784 1.57503C54.3348 1.10213 53.6652 1.10213 53.5216 1.57503L51.6777 7.64532C51.6137 7.85598 51.4195 8 51.1993 8H45.5615C45.0749 8 44.875 8.62439 45.271 8.907L49.886 12.2002C50.0615 12.3254 50.1369 12.5491 50.0732 12.7551L48.2912 18.5104C48.1474 18.975 48.6842 19.3507 49.0714 19.0564L53.6977 15.5398C53.8764 15.404 54.1237 15.4039 54.3025 15.5396L58.9395 19.0586C59.3268 19.3525 59.8632 18.9768 59.7194 18.5124L57.9368 12.7548C57.873 12.5489 57.9483 12.3254 58.1236 12.2001L62.7313 8.90678C63.127 8.62398 62.9269 8 62.4406 8H56.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M77.8438 7.79064C77.9718 8.21197 78.3603 8.5 78.8007 8.5H84.4406L79.8329 11.7933C79.4823 12.0439 79.3317 12.491 79.4591 12.9027L81.2418 18.6603L76.6048 15.1413C76.2472 14.8699 75.7525 14.8701 75.3951 15.1418L70.7688 18.6583L72.5508 12.9029C72.6783 12.491 72.5274 12.0437 72.1764 11.7932L67.5615 8.5H73.1993C73.6397 8.5 74.0282 8.21197 74.1562 7.79064L76 1.72035L77.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                            <path
                                                                d="M99.8438 7.79064C99.9718 8.21197 100.36 8.5 100.801 8.5H106.441L101.833 11.7933C101.482 12.0439 101.332 12.491 101.459 12.9027L103.242 18.6603L98.6048 15.1413C98.2472 14.8699 97.7525 14.8701 97.3951 15.1418L92.7688 18.6583L94.5508 12.9029C94.6783 12.491 94.5274 12.0437 94.1764 11.7932L89.5615 8.5H95.1993C95.6397 8.5 96.0282 8.21197 96.1562 7.79064L98 1.72035L99.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                        </svg> & up</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="2-star" id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault"><svg width="108" height="20"
                                                            viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.8007 8C12.5805 8 12.3863 7.85598 12.3223 7.64532L10.4784 1.57503C10.3348 1.10213 9.66523 1.10213 9.52158 1.57503L7.67773 7.64532C7.61374 7.85598 7.41949 8 7.19932 8H1.56147C1.07493 8 0.874993 8.62439 1.27103 8.907L5.88596 12.2002C6.06148 12.3254 6.13694 12.5491 6.07316 12.7551L4.2912 18.5104C4.14736 18.975 4.68422 19.3507 5.0714 19.0564L9.69767 15.5398C9.87637 15.404 10.1237 15.4039 10.3025 15.5396L14.9395 19.0586C15.3268 19.3525 15.8632 18.9768 15.7194 18.5124L13.9368 12.7548C13.873 12.5489 13.9483 12.3254 14.1236 12.2001L18.7313 8.90678C19.127 8.62398 18.9269 8 18.4406 8H12.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M34.8007 8C34.5805 8 34.3863 7.85598 34.3223 7.64532L32.4784 1.57503C32.3348 1.10213 31.6652 1.10213 31.5216 1.57503L29.6777 7.64532C29.6137 7.85598 29.4195 8 29.1993 8H23.5615C23.0749 8 22.875 8.62439 23.271 8.907L27.886 12.2002C28.0615 12.3254 28.1369 12.5491 28.0732 12.7551L26.2912 18.5104C26.1474 18.975 26.6842 19.3507 27.0714 19.0564L31.6977 15.5398C31.8764 15.404 32.1237 15.4039 32.3025 15.5396L36.9395 19.0586C37.3268 19.3525 37.8632 18.9768 37.7194 18.5124L35.9368 12.7548C35.873 12.5489 35.9483 12.3254 36.1236 12.2001L40.7313 8.90678C41.127 8.62398 40.9269 8 40.4406 8H34.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M55.8438 7.79064C55.9718 8.21197 56.3603 8.5 56.8007 8.5H62.4406L57.8329 11.7933C57.4823 12.0439 57.3317 12.491 57.4591 12.9027L59.2418 18.6603L54.6048 15.1413C54.2472 14.8699 53.7525 14.8701 53.3951 15.1418L48.7688 18.6583L50.5508 12.9029C50.6783 12.491 50.5274 12.0437 50.1764 11.7932L45.5615 8.5H51.1993C51.6397 8.5 52.0282 8.21197 52.1562 7.79064L54 1.72035L55.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                            <path
                                                                d="M77.8438 7.79064C77.9718 8.21197 78.3603 8.5 78.8007 8.5H84.4406L79.8329 11.7933C79.4823 12.0439 79.3317 12.491 79.4591 12.9027L81.2418 18.6603L76.6048 15.1413C76.2472 14.8699 75.7525 14.8701 75.3951 15.1418L70.7688 18.6583L72.5508 12.9029C72.6783 12.491 72.5274 12.0437 72.1764 11.7932L67.5615 8.5H73.1993C73.6397 8.5 74.0282 8.21197 74.1562 7.79064L76 1.72035L77.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                            <path
                                                                d="M99.8438 7.79064C99.9718 8.21197 100.36 8.5 100.801 8.5H106.441L101.833 11.7933C101.482 12.0439 101.332 12.491 101.459 12.9027L103.242 18.6603L98.6048 15.1413C98.2472 14.8699 97.7525 14.8701 97.3951 15.1418L92.7688 18.6583L94.5508 12.9029C94.6783 12.491 94.5274 12.0437 94.1764 11.7932L89.5615 8.5H95.1993C95.6397 8.5 96.0282 8.21197 96.1562 7.79064L98 1.72035L99.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                        </svg> & up</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1-star" id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault"><svg width="108" height="20"
                                                            viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.8007 8C12.5805 8 12.3863 7.85598 12.3223 7.64532L10.4784 1.57503C10.3348 1.10213 9.66523 1.10213 9.52158 1.57503L7.67773 7.64532C7.61374 7.85598 7.41949 8 7.19932 8H1.56147C1.07493 8 0.874993 8.62439 1.27103 8.907L5.88596 12.2002C6.06148 12.3254 6.13694 12.5491 6.07316 12.7551L4.2912 18.5104C4.14736 18.975 4.68422 19.3507 5.0714 19.0564L9.69767 15.5398C9.87637 15.404 10.1237 15.4039 10.3025 15.5396L14.9395 19.0586C15.3268 19.3525 15.8632 18.9768 15.7194 18.5124L13.9368 12.7548C13.873 12.5489 13.9483 12.3254 14.1236 12.2001L18.7313 8.90678C19.127 8.62398 18.9269 8 18.4406 8H12.8007Z"
                                                                fill="#FFDC22" />
                                                            <path
                                                                d="M33.8438 7.79064C33.9718 8.21197 34.3603 8.5 34.8007 8.5H40.4406L35.8329 11.7933C35.4823 12.0439 35.3317 12.491 35.4591 12.9027L37.2418 18.6603L32.6048 15.1413C32.2472 14.8699 31.7525 14.8701 31.3951 15.1418L26.7688 18.6583L28.5508 12.9029C28.6783 12.491 28.5274 12.0437 28.1764 11.7932L23.5615 8.5H29.1993C29.6397 8.5 30.0282 8.21197 30.1562 7.79064L32 1.72035L33.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                            <path
                                                                d="M55.8438 7.79064C55.9718 8.21197 56.3603 8.5 56.8007 8.5H62.4406L57.8329 11.7933C57.4823 12.0439 57.3317 12.491 57.4591 12.9027L59.2418 18.6603L54.6048 15.1413C54.2472 14.8699 53.7525 14.8701 53.3951 15.1418L48.7688 18.6583L50.5508 12.9029C50.6783 12.491 50.5274 12.0437 50.1764 11.7932L45.5615 8.5H51.1993C51.6397 8.5 52.0282 8.21197 52.1562 7.79064L54 1.72035L55.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                            <path
                                                                d="M77.8438 7.79064C77.9718 8.21197 78.3603 8.5 78.8007 8.5H84.4406L79.8329 11.7933C79.4823 12.0439 79.3317 12.491 79.4591 12.9027L81.2418 18.6603L76.6048 15.1413C76.2472 14.8699 75.7525 14.8701 75.3951 15.1418L70.7688 18.6583L72.5508 12.9029C72.6783 12.491 72.5274 12.0437 72.1764 11.7932L67.5615 8.5H73.1993C73.6397 8.5 74.0282 8.21197 74.1562 7.79064L76 1.72035L77.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                            <path
                                                                d="M99.8438 7.79064C99.9718 8.21197 100.36 8.5 100.801 8.5H106.441L101.833 11.7933C101.482 12.0439 101.332 12.491 101.459 12.9027L103.242 18.6603L98.6048 15.1413C98.2472 14.8699 97.7525 14.8701 97.3951 15.1418L92.7688 18.6583L94.5508 12.9029C94.6783 12.491 94.5274 12.0437 94.1764 11.7932L89.5615 8.5H95.1993C95.6397 8.5 96.0282 8.21197 96.1562 7.79064L98 1.72035L99.8438 7.79064Z"
                                                                stroke="#FFDC22" />
                                                        </svg> & up</label>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-Discount" role="tabpanel"
                                                aria-labelledby="v-pills-Discount-tab" tabindex="0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="10% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">10% and above</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="20% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">20% and above</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="30% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">30% and above</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="40% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">40% and above</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="50% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">50% and above</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="60% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">60% and above</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="70% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">70% and above</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="80% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">80% and above</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="90% and above"
                                                        id="mobile-filter-checkbox">
                                                    <label class="form-check-label" for="flexCheckDefault">90% and above</label>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-Colors" role="tabpanel" aria-labelledby="v-pills-Colors-tab"
                                                tabindex="0">
                                                <div id="mobileInput" class="dropdown-content"><svg width="15" height="25" viewBox="0 0 24 25"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M20.71 19.79L17.31 16.4C18.407 15.0025 19.0022 13.2767 19 11.5C19 9.91775 18.5308 8.37103 17.6518 7.05544C16.7727 5.73985 15.5233 4.71447 14.0615 4.10897C12.5997 3.50347 10.9911 3.34504 9.43928 3.65372C7.88743 3.9624 6.46197 4.72433 5.34315 5.84315C4.22433 6.96197 3.4624 8.38743 3.15372 9.93928C2.84504 11.4911 3.00347 13.0997 3.60897 14.5615C4.21447 16.0233 5.23985 17.2727 6.55544 18.1518C7.87103 19.0308 9.41775 19.5 11 19.5C12.7767 19.5022 14.5025 18.907 15.9 17.81L19.29 21.21C19.383 21.3037 19.4936 21.3781 19.6154 21.4289C19.7373 21.4797 19.868 21.5058 20 21.5058C20.132 21.5058 20.2627 21.4797 20.3846 21.4289C20.5064 21.3781 20.617 21.3037 20.71 21.21C20.8037 21.117 20.8781 21.0064 20.9289 20.8846C20.9797 20.7627 21.0058 20.632 21.0058 20.5C21.0058 20.368 20.9797 20.2373 20.9289 20.1154C20.8781 19.9936 20.8037 19.883 20.71 19.79ZM5 11.5C5 10.3133 5.3519 9.15328 6.01119 8.16658C6.67047 7.17989 7.60755 6.41085 8.7039 5.95673C9.80026 5.5026 11.0067 5.38378 12.1705 5.61529C13.3344 5.8468 14.4035 6.41825 15.2426 7.25736C16.0818 8.09648 16.6532 9.16558 16.8847 10.3295C17.1162 11.4933 16.9974 12.6997 16.5433 13.7961C16.0892 14.8925 15.3201 15.8295 14.3334 16.4888C13.3467 17.1481 12.1867 17.5 11 17.5C9.4087 17.5 7.88258 16.8679 6.75736 15.7426C5.63214 14.6174 5 13.0913 5 11.5Z"
                                                            fill="#2E2E2E" />
                                                    </svg>
                                                    <input type="text" name="searchmobilecolor" placeholder="Search.." id="myInput"
                                                        onkeyup="filtermobilecolor()">
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecolor" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Red" id="mobile-filter-checkbox">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="6" cy="6" r="6" fill="#FF0000" />
                                                        </svg> Red</label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecolor" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Blue" id="mobile-filter-checkbox">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="6" cy="6" r="6" fill="#0098FD" />
                                                        </svg> Blue</label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecolor" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Green" id="mobile-filter-checkbox">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="6" cy="6" r="6" fill="#26EF00" />
                                                        </svg> Green</label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecolor" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Yellow" id="mobile-filter-checkbox">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="6" cy="6" r="6" fill="#FFDC22" />
                                                        </svg> Yellow</label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecolor" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Black" id="mobile-filter-checkbox">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="6" cy="6" r="6" fill="#000000" />
                                                        </svg> Black</label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-mobilecolor" for="flexCheckDefault">
                                                        <input class="form-check-input" type="checkbox" value="Orange" id="mobile-filter-checkbox">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="6" cy="6" r="6" fill="#ff6f00" />
                                                        </svg> Orange</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="nav nav-pills nav-justified" id="mobile-apply">
                                        <button class="nav-link col" type="button" data-toggle="collapse" data-target="#collapseExample"
                                            aria-expanded="false" aria-controls="collapseExample">
                                            Close
                                        </button>
                                        <svg width="2" height="25" viewBox="0 0 2 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 24.8125L1 0.8125" stroke="#D7D7D7" stroke-width="0.5" />
                                        </svg>
                                        <button class="nav-link col" type="button" id="apply" data-toggle="collapse"
                                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            <r style="color: red;">Apply</r>
                                        </button>
                                    </div>

                                </div>

                                <div id="filter">
                                    <b>Gender</b>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="Men" id="filter-checkbox">
                                        <label class="form-check-label" for="flexRadioDefault1">Men</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="Women"
                                            id="filter-checkbox">
                                        <label class="form-check-label" for="flexRadioDefault1">Women</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="Unisex"
                                            id="filter-checkbox">
                                        <label class="form-check-label" for="flexRadioDefault1">Unisex</label>
                                    </div>
                                </div>
                                <br>

                                <div id="filter" class="categories">
                                    <b onclick="searchcategories()">Categories <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.71 19.79L17.31 16.4C18.407 15.0025 19.0022 13.2767 19 11.5C19 9.91775 18.5308 8.37103 17.6518 7.05544C16.7727 5.73985 15.5233 4.71447 14.0615 4.10897C12.5997 3.50347 10.9911 3.34504 9.43928 3.65372C7.88743 3.9624 6.46197 4.72433 5.34315 5.84315C4.22433 6.96197 3.4624 8.38743 3.15372 9.93928C2.84504 11.4911 3.00347 13.0997 3.60897 14.5615C4.21447 16.0233 5.23985 17.2727 6.55544 18.1518C7.87103 19.0308 9.41775 19.5 11 19.5C12.7767 19.5022 14.5025 18.907 15.9 17.81L19.29 21.21C19.383 21.3037 19.4936 21.3781 19.6154 21.4289C19.7373 21.4797 19.868 21.5058 20 21.5058C20.132 21.5058 20.2627 21.4797 20.3846 21.4289C20.5064 21.3781 20.617 21.3037 20.71 21.21C20.8037 21.117 20.8781 21.0064 20.9289 20.8846C20.9797 20.7627 21.0058 20.632 21.0058 20.5C21.0058 20.368 20.9797 20.2373 20.9289 20.1154C20.8781 19.9936 20.8037 19.883 20.71 19.79ZM5 11.5C5 10.3133 5.3519 9.15328 6.01119 8.16658C6.67047 7.17989 7.60755 6.41085 8.7039 5.95673C9.80026 5.5026 11.0067 5.38378 12.1705 5.61529C13.3344 5.8468 14.4035 6.41825 15.2426 7.25736C16.0818 8.09648 16.6532 9.16558 16.8847 10.3295C17.1162 11.4933 16.9974 12.6997 16.5433 13.7961C16.0892 14.8925 15.3201 15.8295 14.3334 16.4888C13.3467 17.1481 12.1867 17.5 11 17.5C9.4087 17.5 7.88258 16.8679 6.75736 15.7426C5.63214 14.6174 5 13.0913 5 11.5Z"
                                                fill="#2E2E2E" />
                                        </svg>
                                    </b>

                                    <div id="searchcategories" class="dropdown-content">
                                        <input type="text" name="searchcategories" placeholder="Search.." id="myInput"
                                            onkeyup="filtercategories()">
                                    </div>

                                    <div id="expandcategories" class="normal">
                                        <div class="form-check">
                                            <label class="form-check-categories" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Top Wear" id="filter-checkbox">
                                                Top Wear
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-categories" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Bottom Wear" id="filter-checkbox">
                                                Bottom Wear
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-categories" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Caps" id="filter-checkbox">
                                                Caps
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-categories" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Jeans" id="filter-checkbox">
                                                Jeans
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-categories" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Shorts" id="filter-checkbox">
                                                Shorts
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-categories" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Saree" id="filter-checkbox">
                                                Saree
                                            </label>
                                        </div>
                                    </div>



                                    <button onclick="expandcategories()">
                                        <svg width="200" height="30" viewBox="0 0 274 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M90.452 19.896C92.0733 19.896 92.884 19.3413 92.884 18.232C92.884 17.8907 92.8093 17.6027 92.66 17.368C92.5213 17.1227 92.3293 16.9147 92.084 16.744C91.8387 16.5627 91.556 16.408 91.236 16.28C90.9267 16.152 90.596 16.024 90.244 15.896C89.8387 15.7573 89.4547 15.6027 89.092 15.432C88.7293 15.2507 88.4147 15.0427 88.148 14.808C87.8813 14.5627 87.668 14.2747 87.508 13.944C87.3587 13.6133 87.284 13.2133 87.284 12.744C87.284 11.7733 87.6147 11.016 88.276 10.472C88.9373 9.928 89.8493 9.656 91.012 9.656C91.684 9.656 92.292 9.73067 92.836 9.88C93.3907 10.0187 93.796 10.1733 94.052 10.344L93.556 11.608C93.332 11.4693 92.996 11.336 92.548 11.208C92.1107 11.0693 91.5987 11 91.012 11C90.7133 11 90.436 11.032 90.18 11.096C89.924 11.16 89.7 11.256 89.508 11.384C89.316 11.512 89.1613 11.6773 89.044 11.88C88.9373 12.072 88.884 12.3013 88.884 12.568C88.884 12.8667 88.9427 13.1173 89.06 13.32C89.1773 13.5227 89.3427 13.704 89.556 13.864C89.7693 14.0133 90.0147 14.152 90.292 14.28C90.58 14.408 90.8947 14.536 91.236 14.664C91.716 14.856 92.1533 15.048 92.548 15.24C92.9533 15.432 93.3 15.6613 93.588 15.928C93.8867 16.1947 94.116 16.5147 94.276 16.888C94.436 17.2507 94.516 17.6933 94.516 18.216C94.516 19.1867 94.1587 19.9333 93.444 20.456C92.74 20.9787 91.7427 21.24 90.452 21.24C90.0147 21.24 89.6093 21.208 89.236 21.144C88.8733 21.0907 88.548 21.0267 88.26 20.952C87.972 20.8667 87.7213 20.7813 87.508 20.696C87.3053 20.6 87.1453 20.52 87.028 20.456L87.492 19.176C87.7373 19.3147 88.1107 19.4693 88.612 19.64C89.1133 19.8107 89.7267 19.896 90.452 19.896ZM95.8316 16.856C95.8316 16.12 95.9383 15.48 96.1516 14.936C96.365 14.3813 96.6476 13.9227 96.9996 13.56C97.3516 13.1973 97.757 12.9253 98.2156 12.744C98.6743 12.5627 99.1436 12.472 99.6236 12.472C100.744 12.472 101.602 12.824 102.2 13.528C102.797 14.2213 103.096 15.2827 103.096 16.712C103.096 16.776 103.096 16.8613 103.096 16.968C103.096 17.064 103.09 17.1547 103.08 17.24H97.3836C97.4476 18.104 97.6983 18.76 98.1356 19.208C98.573 19.656 99.2556 19.88 100.184 19.88C100.706 19.88 101.144 19.8373 101.496 19.752C101.858 19.656 102.13 19.5653 102.312 19.48L102.52 20.728C102.338 20.824 102.018 20.9253 101.56 21.032C101.112 21.1387 100.6 21.192 100.024 21.192C99.2983 21.192 98.669 21.0853 98.1356 20.872C97.613 20.648 97.181 20.344 96.8396 19.96C96.4983 19.576 96.2423 19.1227 96.0716 18.6C95.9116 18.0667 95.8316 17.4853 95.8316 16.856ZM101.544 16.04C101.554 15.368 101.384 14.8187 101.032 14.392C100.69 13.9547 100.216 13.736 99.6076 13.736C99.2663 13.736 98.9623 13.8053 98.6956 13.944C98.4396 14.072 98.221 14.2427 98.0396 14.456C97.8583 14.6693 97.7143 14.9147 97.6076 15.192C97.5116 15.4693 97.4476 15.752 97.4156 16.04H101.544ZM104.769 16.856C104.769 16.12 104.876 15.48 105.089 14.936C105.302 14.3813 105.585 13.9227 105.937 13.56C106.289 13.1973 106.694 12.9253 107.153 12.744C107.612 12.5627 108.081 12.472 108.561 12.472C109.681 12.472 110.54 12.824 111.137 13.528C111.734 14.2213 112.033 15.2827 112.033 16.712C112.033 16.776 112.033 16.8613 112.033 16.968C112.033 17.064 112.028 17.1547 112.017 17.24H106.321C106.385 18.104 106.636 18.76 107.073 19.208C107.51 19.656 108.193 19.88 109.121 19.88C109.644 19.88 110.081 19.8373 110.433 19.752C110.796 19.656 111.068 19.5653 111.249 19.48L111.457 20.728C111.276 20.824 110.956 20.9253 110.497 21.032C110.049 21.1387 109.537 21.192 108.961 21.192C108.236 21.192 107.606 21.0853 107.073 20.872C106.55 20.648 106.118 20.344 105.777 19.96C105.436 19.576 105.18 19.1227 105.009 18.6C104.849 18.0667 104.769 17.4853 104.769 16.856ZM110.481 16.04C110.492 15.368 110.321 14.8187 109.969 14.392C109.628 13.9547 109.153 13.736 108.545 13.736C108.204 13.736 107.9 13.8053 107.633 13.944C107.377 14.072 107.158 14.2427 106.977 14.456C106.796 14.6693 106.652 14.9147 106.545 15.192C106.449 15.4693 106.385 15.752 106.353 16.04H110.481ZM122.946 19.464C122.839 19.208 122.695 18.8827 122.514 18.488C122.343 18.0933 122.156 17.6667 121.954 17.208C121.751 16.7493 121.532 16.28 121.298 15.8C121.074 15.3093 120.86 14.8507 120.658 14.424C120.455 13.9867 120.263 13.5973 120.082 13.256C119.911 12.9147 119.772 12.6533 119.666 12.472C119.548 13.7307 119.452 15.096 119.378 16.568C119.303 18.0293 119.239 19.5067 119.186 21H117.666C117.708 20.04 117.756 19.0747 117.81 18.104C117.863 17.1227 117.922 16.1627 117.986 15.224C118.06 14.2747 118.135 13.352 118.21 12.456C118.295 11.56 118.386 10.712 118.482 9.912H119.842C120.13 10.3813 120.439 10.936 120.77 11.576C121.1 12.216 121.431 12.888 121.762 13.592C122.092 14.2853 122.412 14.984 122.722 15.688C123.031 16.3813 123.314 17.016 123.57 17.592C123.826 17.016 124.108 16.3813 124.418 15.688C124.727 14.984 125.047 14.2853 125.378 13.592C125.708 12.888 126.039 12.216 126.37 11.576C126.7 10.936 127.01 10.3813 127.298 9.912H128.658C129.02 13.4853 129.292 17.1813 129.474 21H127.954C127.9 19.5067 127.836 18.0293 127.762 16.568C127.687 15.096 127.591 13.7307 127.474 12.472C127.367 12.6533 127.223 12.9147 127.042 13.256C126.871 13.5973 126.684 13.9867 126.482 14.424C126.279 14.8507 126.06 15.3093 125.826 15.8C125.602 16.28 125.388 16.7493 125.186 17.208C124.983 17.6667 124.791 18.0933 124.61 18.488C124.439 18.8827 124.3 19.208 124.194 19.464H122.946ZM139.155 16.84C139.155 17.5013 139.059 18.0987 138.867 18.632C138.675 19.1653 138.403 19.624 138.051 20.008C137.71 20.392 137.299 20.6907 136.819 20.904C136.339 21.1067 135.817 21.208 135.251 21.208C134.686 21.208 134.163 21.1067 133.683 20.904C133.203 20.6907 132.787 20.392 132.435 20.008C132.094 19.624 131.827 19.1653 131.635 18.632C131.443 18.0987 131.347 17.5013 131.347 16.84C131.347 16.1893 131.443 15.5973 131.635 15.064C131.827 14.52 132.094 14.056 132.435 13.672C132.787 13.288 133.203 12.9947 133.683 12.792C134.163 12.5787 134.686 12.472 135.251 12.472C135.817 12.472 136.339 12.5787 136.819 12.792C137.299 12.9947 137.71 13.288 138.051 13.672C138.403 14.056 138.675 14.52 138.867 15.064C139.059 15.5973 139.155 16.1893 139.155 16.84ZM137.603 16.84C137.603 15.9013 137.39 15.16 136.963 14.616C136.547 14.0613 135.977 13.784 135.251 13.784C134.526 13.784 133.95 14.0613 133.523 14.616C133.107 15.16 132.899 15.9013 132.899 16.84C132.899 17.7787 133.107 18.5253 133.523 19.08C133.95 19.624 134.526 19.896 135.251 19.896C135.977 19.896 136.547 19.624 136.963 19.08C137.39 18.5253 137.603 17.7787 137.603 16.84ZM144.321 12.504C144.449 12.504 144.593 12.5147 144.753 12.536C144.923 12.5467 145.089 12.568 145.249 12.6C145.409 12.6213 145.553 12.648 145.681 12.68C145.819 12.7013 145.921 12.7227 145.985 12.744L145.729 14.04C145.611 13.9973 145.414 13.9493 145.137 13.896C144.87 13.832 144.523 13.8 144.097 13.8C143.819 13.8 143.542 13.832 143.265 13.896C142.998 13.9493 142.822 13.9867 142.737 14.008V21H141.249V13.032C141.601 12.904 142.038 12.7867 142.561 12.68C143.083 12.5627 143.67 12.504 144.321 12.504ZM146.957 16.856C146.957 16.12 147.063 15.48 147.277 14.936C147.49 14.3813 147.773 13.9227 148.125 13.56C148.477 13.1973 148.882 12.9253 149.341 12.744C149.799 12.5627 150.269 12.472 150.749 12.472C151.869 12.472 152.727 12.824 153.325 13.528C153.922 14.2213 154.221 15.2827 154.221 16.712C154.221 16.776 154.221 16.8613 154.221 16.968C154.221 17.064 154.215 17.1547 154.205 17.24H148.509C148.573 18.104 148.823 18.76 149.261 19.208C149.698 19.656 150.381 19.88 151.309 19.88C151.831 19.88 152.269 19.8373 152.621 19.752C152.983 19.656 153.255 19.5653 153.437 19.48L153.645 20.728C153.463 20.824 153.143 20.9253 152.685 21.032C152.237 21.1387 151.725 21.192 151.149 21.192C150.423 21.192 149.794 21.0853 149.261 20.872C148.738 20.648 148.306 20.344 147.965 19.96C147.623 19.576 147.367 19.1227 147.197 18.6C147.037 18.0667 146.957 17.4853 146.957 16.856ZM152.669 16.04C152.679 15.368 152.509 14.8187 152.157 14.392C151.815 13.9547 151.341 13.736 150.733 13.736C150.391 13.736 150.087 13.8053 149.821 13.944C149.565 14.072 149.346 14.2427 149.165 14.456C148.983 14.6693 148.839 14.9147 148.733 15.192C148.637 15.4693 148.573 15.752 148.541 16.04H152.669Z"
                                                fill="#6E6E6E" />
                                            <path d="M180.5 13L175.5 18L170.5 13" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                </div>
                                <br>

                                <div id="filter" class="brands">
                                    <b onclick="searchbrands()">Brands <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.71 19.79L17.31 16.4C18.407 15.0025 19.0022 13.2767 19 11.5C19 9.91775 18.5308 8.37103 17.6518 7.05544C16.7727 5.73985 15.5233 4.71447 14.0615 4.10897C12.5997 3.50347 10.9911 3.34504 9.43928 3.65372C7.88743 3.9624 6.46197 4.72433 5.34315 5.84315C4.22433 6.96197 3.4624 8.38743 3.15372 9.93928C2.84504 11.4911 3.00347 13.0997 3.60897 14.5615C4.21447 16.0233 5.23985 17.2727 6.55544 18.1518C7.87103 19.0308 9.41775 19.5 11 19.5C12.7767 19.5022 14.5025 18.907 15.9 17.81L19.29 21.21C19.383 21.3037 19.4936 21.3781 19.6154 21.4289C19.7373 21.4797 19.868 21.5058 20 21.5058C20.132 21.5058 20.2627 21.4797 20.3846 21.4289C20.5064 21.3781 20.617 21.3037 20.71 21.21C20.8037 21.117 20.8781 21.0064 20.9289 20.8846C20.9797 20.7627 21.0058 20.632 21.0058 20.5C21.0058 20.368 20.9797 20.2373 20.9289 20.1154C20.8781 19.9936 20.8037 19.883 20.71 19.79ZM5 11.5C5 10.3133 5.3519 9.15328 6.01119 8.16658C6.67047 7.17989 7.60755 6.41085 8.7039 5.95673C9.80026 5.5026 11.0067 5.38378 12.1705 5.61529C13.3344 5.8468 14.4035 6.41825 15.2426 7.25736C16.0818 8.09648 16.6532 9.16558 16.8847 10.3295C17.1162 11.4933 16.9974 12.6997 16.5433 13.7961C16.0892 14.8925 15.3201 15.8295 14.3334 16.4888C13.3467 17.1481 12.1867 17.5 11 17.5C9.4087 17.5 7.88258 16.8679 6.75736 15.7426C5.63214 14.6174 5 13.0913 5 11.5Z"
                                                fill="#2E2E2E" />
                                        </svg>
                                    </b>


                                    <div id="searchbrands" class="dropdown-content">
                                        <input type="text" name="searchbrands" placeholder="Search.." id="myInput" onkeyup="filterbrands()">
                                    </div>

                                    <div id="expandbrands" class="normal">
                                        <div class="form-check">
                                            <label class="form-check-brands" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="UNRL" id="filter-checkbox">
                                                UNRL
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-brands" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Bewakoof" id="filter-checkbox">
                                                Bewakoof
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-brands" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Gavin Paris" id="filter-checkbox">
                                                Gavin Paris
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-brands" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Adidas" id="filter-checkbox">
                                                Adidas
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-brands" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Kevien" id="filter-checkbox">
                                                Kevien
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-brands" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Cottonking" id="filter-checkbox">
                                                Cottonking
                                            </label>
                                        </div>
                                    </div>

                                    <button onclick="expandbrands()">
                                        <svg width="200" height="30" viewBox="0 0 274 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M90.452 19.896C92.0733 19.896 92.884 19.3413 92.884 18.232C92.884 17.8907 92.8093 17.6027 92.66 17.368C92.5213 17.1227 92.3293 16.9147 92.084 16.744C91.8387 16.5627 91.556 16.408 91.236 16.28C90.9267 16.152 90.596 16.024 90.244 15.896C89.8387 15.7573 89.4547 15.6027 89.092 15.432C88.7293 15.2507 88.4147 15.0427 88.148 14.808C87.8813 14.5627 87.668 14.2747 87.508 13.944C87.3587 13.6133 87.284 13.2133 87.284 12.744C87.284 11.7733 87.6147 11.016 88.276 10.472C88.9373 9.928 89.8493 9.656 91.012 9.656C91.684 9.656 92.292 9.73067 92.836 9.88C93.3907 10.0187 93.796 10.1733 94.052 10.344L93.556 11.608C93.332 11.4693 92.996 11.336 92.548 11.208C92.1107 11.0693 91.5987 11 91.012 11C90.7133 11 90.436 11.032 90.18 11.096C89.924 11.16 89.7 11.256 89.508 11.384C89.316 11.512 89.1613 11.6773 89.044 11.88C88.9373 12.072 88.884 12.3013 88.884 12.568C88.884 12.8667 88.9427 13.1173 89.06 13.32C89.1773 13.5227 89.3427 13.704 89.556 13.864C89.7693 14.0133 90.0147 14.152 90.292 14.28C90.58 14.408 90.8947 14.536 91.236 14.664C91.716 14.856 92.1533 15.048 92.548 15.24C92.9533 15.432 93.3 15.6613 93.588 15.928C93.8867 16.1947 94.116 16.5147 94.276 16.888C94.436 17.2507 94.516 17.6933 94.516 18.216C94.516 19.1867 94.1587 19.9333 93.444 20.456C92.74 20.9787 91.7427 21.24 90.452 21.24C90.0147 21.24 89.6093 21.208 89.236 21.144C88.8733 21.0907 88.548 21.0267 88.26 20.952C87.972 20.8667 87.7213 20.7813 87.508 20.696C87.3053 20.6 87.1453 20.52 87.028 20.456L87.492 19.176C87.7373 19.3147 88.1107 19.4693 88.612 19.64C89.1133 19.8107 89.7267 19.896 90.452 19.896ZM95.8316 16.856C95.8316 16.12 95.9383 15.48 96.1516 14.936C96.365 14.3813 96.6476 13.9227 96.9996 13.56C97.3516 13.1973 97.757 12.9253 98.2156 12.744C98.6743 12.5627 99.1436 12.472 99.6236 12.472C100.744 12.472 101.602 12.824 102.2 13.528C102.797 14.2213 103.096 15.2827 103.096 16.712C103.096 16.776 103.096 16.8613 103.096 16.968C103.096 17.064 103.09 17.1547 103.08 17.24H97.3836C97.4476 18.104 97.6983 18.76 98.1356 19.208C98.573 19.656 99.2556 19.88 100.184 19.88C100.706 19.88 101.144 19.8373 101.496 19.752C101.858 19.656 102.13 19.5653 102.312 19.48L102.52 20.728C102.338 20.824 102.018 20.9253 101.56 21.032C101.112 21.1387 100.6 21.192 100.024 21.192C99.2983 21.192 98.669 21.0853 98.1356 20.872C97.613 20.648 97.181 20.344 96.8396 19.96C96.4983 19.576 96.2423 19.1227 96.0716 18.6C95.9116 18.0667 95.8316 17.4853 95.8316 16.856ZM101.544 16.04C101.554 15.368 101.384 14.8187 101.032 14.392C100.69 13.9547 100.216 13.736 99.6076 13.736C99.2663 13.736 98.9623 13.8053 98.6956 13.944C98.4396 14.072 98.221 14.2427 98.0396 14.456C97.8583 14.6693 97.7143 14.9147 97.6076 15.192C97.5116 15.4693 97.4476 15.752 97.4156 16.04H101.544ZM104.769 16.856C104.769 16.12 104.876 15.48 105.089 14.936C105.302 14.3813 105.585 13.9227 105.937 13.56C106.289 13.1973 106.694 12.9253 107.153 12.744C107.612 12.5627 108.081 12.472 108.561 12.472C109.681 12.472 110.54 12.824 111.137 13.528C111.734 14.2213 112.033 15.2827 112.033 16.712C112.033 16.776 112.033 16.8613 112.033 16.968C112.033 17.064 112.028 17.1547 112.017 17.24H106.321C106.385 18.104 106.636 18.76 107.073 19.208C107.51 19.656 108.193 19.88 109.121 19.88C109.644 19.88 110.081 19.8373 110.433 19.752C110.796 19.656 111.068 19.5653 111.249 19.48L111.457 20.728C111.276 20.824 110.956 20.9253 110.497 21.032C110.049 21.1387 109.537 21.192 108.961 21.192C108.236 21.192 107.606 21.0853 107.073 20.872C106.55 20.648 106.118 20.344 105.777 19.96C105.436 19.576 105.18 19.1227 105.009 18.6C104.849 18.0667 104.769 17.4853 104.769 16.856ZM110.481 16.04C110.492 15.368 110.321 14.8187 109.969 14.392C109.628 13.9547 109.153 13.736 108.545 13.736C108.204 13.736 107.9 13.8053 107.633 13.944C107.377 14.072 107.158 14.2427 106.977 14.456C106.796 14.6693 106.652 14.9147 106.545 15.192C106.449 15.4693 106.385 15.752 106.353 16.04H110.481ZM122.946 19.464C122.839 19.208 122.695 18.8827 122.514 18.488C122.343 18.0933 122.156 17.6667 121.954 17.208C121.751 16.7493 121.532 16.28 121.298 15.8C121.074 15.3093 120.86 14.8507 120.658 14.424C120.455 13.9867 120.263 13.5973 120.082 13.256C119.911 12.9147 119.772 12.6533 119.666 12.472C119.548 13.7307 119.452 15.096 119.378 16.568C119.303 18.0293 119.239 19.5067 119.186 21H117.666C117.708 20.04 117.756 19.0747 117.81 18.104C117.863 17.1227 117.922 16.1627 117.986 15.224C118.06 14.2747 118.135 13.352 118.21 12.456C118.295 11.56 118.386 10.712 118.482 9.912H119.842C120.13 10.3813 120.439 10.936 120.77 11.576C121.1 12.216 121.431 12.888 121.762 13.592C122.092 14.2853 122.412 14.984 122.722 15.688C123.031 16.3813 123.314 17.016 123.57 17.592C123.826 17.016 124.108 16.3813 124.418 15.688C124.727 14.984 125.047 14.2853 125.378 13.592C125.708 12.888 126.039 12.216 126.37 11.576C126.7 10.936 127.01 10.3813 127.298 9.912H128.658C129.02 13.4853 129.292 17.1813 129.474 21H127.954C127.9 19.5067 127.836 18.0293 127.762 16.568C127.687 15.096 127.591 13.7307 127.474 12.472C127.367 12.6533 127.223 12.9147 127.042 13.256C126.871 13.5973 126.684 13.9867 126.482 14.424C126.279 14.8507 126.06 15.3093 125.826 15.8C125.602 16.28 125.388 16.7493 125.186 17.208C124.983 17.6667 124.791 18.0933 124.61 18.488C124.439 18.8827 124.3 19.208 124.194 19.464H122.946ZM139.155 16.84C139.155 17.5013 139.059 18.0987 138.867 18.632C138.675 19.1653 138.403 19.624 138.051 20.008C137.71 20.392 137.299 20.6907 136.819 20.904C136.339 21.1067 135.817 21.208 135.251 21.208C134.686 21.208 134.163 21.1067 133.683 20.904C133.203 20.6907 132.787 20.392 132.435 20.008C132.094 19.624 131.827 19.1653 131.635 18.632C131.443 18.0987 131.347 17.5013 131.347 16.84C131.347 16.1893 131.443 15.5973 131.635 15.064C131.827 14.52 132.094 14.056 132.435 13.672C132.787 13.288 133.203 12.9947 133.683 12.792C134.163 12.5787 134.686 12.472 135.251 12.472C135.817 12.472 136.339 12.5787 136.819 12.792C137.299 12.9947 137.71 13.288 138.051 13.672C138.403 14.056 138.675 14.52 138.867 15.064C139.059 15.5973 139.155 16.1893 139.155 16.84ZM137.603 16.84C137.603 15.9013 137.39 15.16 136.963 14.616C136.547 14.0613 135.977 13.784 135.251 13.784C134.526 13.784 133.95 14.0613 133.523 14.616C133.107 15.16 132.899 15.9013 132.899 16.84C132.899 17.7787 133.107 18.5253 133.523 19.08C133.95 19.624 134.526 19.896 135.251 19.896C135.977 19.896 136.547 19.624 136.963 19.08C137.39 18.5253 137.603 17.7787 137.603 16.84ZM144.321 12.504C144.449 12.504 144.593 12.5147 144.753 12.536C144.923 12.5467 145.089 12.568 145.249 12.6C145.409 12.6213 145.553 12.648 145.681 12.68C145.819 12.7013 145.921 12.7227 145.985 12.744L145.729 14.04C145.611 13.9973 145.414 13.9493 145.137 13.896C144.87 13.832 144.523 13.8 144.097 13.8C143.819 13.8 143.542 13.832 143.265 13.896C142.998 13.9493 142.822 13.9867 142.737 14.008V21H141.249V13.032C141.601 12.904 142.038 12.7867 142.561 12.68C143.083 12.5627 143.67 12.504 144.321 12.504ZM146.957 16.856C146.957 16.12 147.063 15.48 147.277 14.936C147.49 14.3813 147.773 13.9227 148.125 13.56C148.477 13.1973 148.882 12.9253 149.341 12.744C149.799 12.5627 150.269 12.472 150.749 12.472C151.869 12.472 152.727 12.824 153.325 13.528C153.922 14.2213 154.221 15.2827 154.221 16.712C154.221 16.776 154.221 16.8613 154.221 16.968C154.221 17.064 154.215 17.1547 154.205 17.24H148.509C148.573 18.104 148.823 18.76 149.261 19.208C149.698 19.656 150.381 19.88 151.309 19.88C151.831 19.88 152.269 19.8373 152.621 19.752C152.983 19.656 153.255 19.5653 153.437 19.48L153.645 20.728C153.463 20.824 153.143 20.9253 152.685 21.032C152.237 21.1387 151.725 21.192 151.149 21.192C150.423 21.192 149.794 21.0853 149.261 20.872C148.738 20.648 148.306 20.344 147.965 19.96C147.623 19.576 147.367 19.1227 147.197 18.6C147.037 18.0667 146.957 17.4853 146.957 16.856ZM152.669 16.04C152.679 15.368 152.509 14.8187 152.157 14.392C151.815 13.9547 151.341 13.736 150.733 13.736C150.391 13.736 150.087 13.8053 149.821 13.944C149.565 14.072 149.346 14.2427 149.165 14.456C148.983 14.6693 148.839 14.9147 148.733 15.192C148.637 15.4693 148.573 15.752 148.541 16.04H152.669Z"
                                                fill="#6E6E6E" />
                                            <path d="M180.5 13L175.5 18L170.5 13" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                </div>
                                <br>

                                <div id="filter">
                                    <b>Price</b>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Less then &#8377;500" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">Less then &#8377;500</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="&#8377;501 - &#8377;1000" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">&#8377;501 - &#8377;1000</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="&#8377;1001 - &#8377;2000"
                                            id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">&#8377;1001 - &#8377;2000</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="More than &#8377;2001" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">More than &#8377;2001</label>
                                    </div>
                                </div>
                                <br>

                                <div id="filter">
                                    <b>Avg. Customer Review</b>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="4-star" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault"><svg width="108" height="20"
                                                viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.8007 8C12.5805 8 12.3863 7.85598 12.3223 7.64532L10.4784 1.57503C10.3348 1.10213 9.66523 1.10213 9.52158 1.57503L7.67773 7.64532C7.61374 7.85598 7.41949 8 7.19932 8H1.56147C1.07493 8 0.874993 8.62439 1.27103 8.907L5.88596 12.2002C6.06148 12.3254 6.13694 12.5491 6.07316 12.7551L4.2912 18.5104C4.14736 18.975 4.68422 19.3507 5.0714 19.0564L9.69767 15.5398C9.87637 15.404 10.1237 15.4039 10.3025 15.5396L14.9395 19.0586C15.3268 19.3525 15.8632 18.9768 15.7194 18.5124L13.9368 12.7548C13.873 12.5489 13.9483 12.3254 14.1236 12.2001L18.7313 8.90678C19.127 8.62398 18.9269 8 18.4406 8H12.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M34.8007 8C34.5805 8 34.3863 7.85598 34.3223 7.64532L32.4784 1.57503C32.3348 1.10213 31.6652 1.10213 31.5216 1.57503L29.6777 7.64532C29.6137 7.85598 29.4195 8 29.1993 8H23.5615C23.0749 8 22.875 8.62439 23.271 8.907L27.886 12.2002C28.0615 12.3254 28.1369 12.5491 28.0732 12.7551L26.2912 18.5104C26.1474 18.975 26.6842 19.3507 27.0714 19.0564L31.6977 15.5398C31.8764 15.404 32.1237 15.4039 32.3025 15.5396L36.9395 19.0586C37.3268 19.3525 37.8632 18.9768 37.7194 18.5124L35.9368 12.7548C35.873 12.5489 35.9483 12.3254 36.1236 12.2001L40.7313 8.90678C41.127 8.62398 40.9269 8 40.4406 8H34.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M56.8007 8C56.5805 8 56.3863 7.85598 56.3223 7.64532L54.4784 1.57503C54.3348 1.10213 53.6652 1.10213 53.5216 1.57503L51.6777 7.64532C51.6137 7.85598 51.4195 8 51.1993 8H45.5615C45.0749 8 44.875 8.62439 45.271 8.907L49.886 12.2002C50.0615 12.3254 50.1369 12.5491 50.0732 12.7551L48.2912 18.5104C48.1474 18.975 48.6842 19.3507 49.0714 19.0564L53.6977 15.5398C53.8764 15.404 54.1237 15.4039 54.3025 15.5396L58.9395 19.0586C59.3268 19.3525 59.8632 18.9768 59.7194 18.5124L57.9368 12.7548C57.873 12.5489 57.9483 12.3254 58.1236 12.2001L62.7313 8.90678C63.127 8.62398 62.9269 8 62.4406 8H56.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M78.8007 8C78.5805 8 78.3863 7.85598 78.3223 7.64532L76.4784 1.57503C76.3348 1.10213 75.6652 1.10213 75.5216 1.57503L73.6777 7.64532C73.6137 7.85598 73.4195 8 73.1993 8H67.5615C67.0749 8 66.875 8.62439 67.271 8.907L71.886 12.2002C72.0615 12.3254 72.1369 12.5491 72.0732 12.7551L70.2912 18.5104C70.1474 18.975 70.6842 19.3507 71.0714 19.0564L75.6977 15.5398C75.8764 15.404 76.1237 15.4039 76.3025 15.5396L80.9395 19.0586C81.3268 19.3525 81.8632 18.9768 81.7194 18.5124L79.9368 12.7548C79.873 12.5489 79.9483 12.3254 80.1236 12.2001L84.7313 8.90678C85.127 8.62398 84.9269 8 84.4406 8H78.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M99.8438 7.79064C99.9718 8.21197 100.36 8.5 100.801 8.5H106.441L101.833 11.7933C101.482 12.0439 101.332 12.491 101.459 12.9027L103.242 18.6603L98.6048 15.1413C98.2472 14.8699 97.7525 14.8701 97.3951 15.1418L92.7688 18.6583L94.5508 12.9029C94.6783 12.491 94.5274 12.0437 94.1764 11.7932L89.5615 8.5H95.1993C95.6397 8.5 96.0282 8.21197 96.1562 7.79064L98 1.72035L99.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                            </svg> & up</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3-star" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault"><svg width="108" height="20"
                                                viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.8007 8C12.5805 8 12.3863 7.85598 12.3223 7.64532L10.4784 1.57503C10.3348 1.10213 9.66523 1.10213 9.52158 1.57503L7.67773 7.64532C7.61374 7.85598 7.41949 8 7.19932 8H1.56147C1.07493 8 0.874993 8.62439 1.27103 8.907L5.88596 12.2002C6.06148 12.3254 6.13694 12.5491 6.07316 12.7551L4.2912 18.5104C4.14736 18.975 4.68422 19.3507 5.0714 19.0564L9.69767 15.5398C9.87637 15.404 10.1237 15.4039 10.3025 15.5396L14.9395 19.0586C15.3268 19.3525 15.8632 18.9768 15.7194 18.5124L13.9368 12.7548C13.873 12.5489 13.9483 12.3254 14.1236 12.2001L18.7313 8.90678C19.127 8.62398 18.9269 8 18.4406 8H12.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M34.8007 8C34.5805 8 34.3863 7.85598 34.3223 7.64532L32.4784 1.57503C32.3348 1.10213 31.6652 1.10213 31.5216 1.57503L29.6777 7.64532C29.6137 7.85598 29.4195 8 29.1993 8H23.5615C23.0749 8 22.875 8.62439 23.271 8.907L27.886 12.2002C28.0615 12.3254 28.1369 12.5491 28.0732 12.7551L26.2912 18.5104C26.1474 18.975 26.6842 19.3507 27.0714 19.0564L31.6977 15.5398C31.8764 15.404 32.1237 15.4039 32.3025 15.5396L36.9395 19.0586C37.3268 19.3525 37.8632 18.9768 37.7194 18.5124L35.9368 12.7548C35.873 12.5489 35.9483 12.3254 36.1236 12.2001L40.7313 8.90678C41.127 8.62398 40.9269 8 40.4406 8H34.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M56.8007 8C56.5805 8 56.3863 7.85598 56.3223 7.64532L54.4784 1.57503C54.3348 1.10213 53.6652 1.10213 53.5216 1.57503L51.6777 7.64532C51.6137 7.85598 51.4195 8 51.1993 8H45.5615C45.0749 8 44.875 8.62439 45.271 8.907L49.886 12.2002C50.0615 12.3254 50.1369 12.5491 50.0732 12.7551L48.2912 18.5104C48.1474 18.975 48.6842 19.3507 49.0714 19.0564L53.6977 15.5398C53.8764 15.404 54.1237 15.4039 54.3025 15.5396L58.9395 19.0586C59.3268 19.3525 59.8632 18.9768 59.7194 18.5124L57.9368 12.7548C57.873 12.5489 57.9483 12.3254 58.1236 12.2001L62.7313 8.90678C63.127 8.62398 62.9269 8 62.4406 8H56.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M77.8438 7.79064C77.9718 8.21197 78.3603 8.5 78.8007 8.5H84.4406L79.8329 11.7933C79.4823 12.0439 79.3317 12.491 79.4591 12.9027L81.2418 18.6603L76.6048 15.1413C76.2472 14.8699 75.7525 14.8701 75.3951 15.1418L70.7688 18.6583L72.5508 12.9029C72.6783 12.491 72.5274 12.0437 72.1764 11.7932L67.5615 8.5H73.1993C73.6397 8.5 74.0282 8.21197 74.1562 7.79064L76 1.72035L77.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                                <path
                                                    d="M99.8438 7.79064C99.9718 8.21197 100.36 8.5 100.801 8.5H106.441L101.833 11.7933C101.482 12.0439 101.332 12.491 101.459 12.9027L103.242 18.6603L98.6048 15.1413C98.2472 14.8699 97.7525 14.8701 97.3951 15.1418L92.7688 18.6583L94.5508 12.9029C94.6783 12.491 94.5274 12.0437 94.1764 11.7932L89.5615 8.5H95.1993C95.6397 8.5 96.0282 8.21197 96.1562 7.79064L98 1.72035L99.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                            </svg> & up</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2-star" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault"><svg width="108" height="20"
                                                viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.8007 8C12.5805 8 12.3863 7.85598 12.3223 7.64532L10.4784 1.57503C10.3348 1.10213 9.66523 1.10213 9.52158 1.57503L7.67773 7.64532C7.61374 7.85598 7.41949 8 7.19932 8H1.56147C1.07493 8 0.874993 8.62439 1.27103 8.907L5.88596 12.2002C6.06148 12.3254 6.13694 12.5491 6.07316 12.7551L4.2912 18.5104C4.14736 18.975 4.68422 19.3507 5.0714 19.0564L9.69767 15.5398C9.87637 15.404 10.1237 15.4039 10.3025 15.5396L14.9395 19.0586C15.3268 19.3525 15.8632 18.9768 15.7194 18.5124L13.9368 12.7548C13.873 12.5489 13.9483 12.3254 14.1236 12.2001L18.7313 8.90678C19.127 8.62398 18.9269 8 18.4406 8H12.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M34.8007 8C34.5805 8 34.3863 7.85598 34.3223 7.64532L32.4784 1.57503C32.3348 1.10213 31.6652 1.10213 31.5216 1.57503L29.6777 7.64532C29.6137 7.85598 29.4195 8 29.1993 8H23.5615C23.0749 8 22.875 8.62439 23.271 8.907L27.886 12.2002C28.0615 12.3254 28.1369 12.5491 28.0732 12.7551L26.2912 18.5104C26.1474 18.975 26.6842 19.3507 27.0714 19.0564L31.6977 15.5398C31.8764 15.404 32.1237 15.4039 32.3025 15.5396L36.9395 19.0586C37.3268 19.3525 37.8632 18.9768 37.7194 18.5124L35.9368 12.7548C35.873 12.5489 35.9483 12.3254 36.1236 12.2001L40.7313 8.90678C41.127 8.62398 40.9269 8 40.4406 8H34.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M55.8438 7.79064C55.9718 8.21197 56.3603 8.5 56.8007 8.5H62.4406L57.8329 11.7933C57.4823 12.0439 57.3317 12.491 57.4591 12.9027L59.2418 18.6603L54.6048 15.1413C54.2472 14.8699 53.7525 14.8701 53.3951 15.1418L48.7688 18.6583L50.5508 12.9029C50.6783 12.491 50.5274 12.0437 50.1764 11.7932L45.5615 8.5H51.1993C51.6397 8.5 52.0282 8.21197 52.1562 7.79064L54 1.72035L55.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                                <path
                                                    d="M77.8438 7.79064C77.9718 8.21197 78.3603 8.5 78.8007 8.5H84.4406L79.8329 11.7933C79.4823 12.0439 79.3317 12.491 79.4591 12.9027L81.2418 18.6603L76.6048 15.1413C76.2472 14.8699 75.7525 14.8701 75.3951 15.1418L70.7688 18.6583L72.5508 12.9029C72.6783 12.491 72.5274 12.0437 72.1764 11.7932L67.5615 8.5H73.1993C73.6397 8.5 74.0282 8.21197 74.1562 7.79064L76 1.72035L77.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                                <path
                                                    d="M99.8438 7.79064C99.9718 8.21197 100.36 8.5 100.801 8.5H106.441L101.833 11.7933C101.482 12.0439 101.332 12.491 101.459 12.9027L103.242 18.6603L98.6048 15.1413C98.2472 14.8699 97.7525 14.8701 97.3951 15.1418L92.7688 18.6583L94.5508 12.9029C94.6783 12.491 94.5274 12.0437 94.1764 11.7932L89.5615 8.5H95.1993C95.6397 8.5 96.0282 8.21197 96.1562 7.79064L98 1.72035L99.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                            </svg> & up</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1-star" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault"><svg width="108" height="20"
                                                viewBox="0 0 108 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.8007 8C12.5805 8 12.3863 7.85598 12.3223 7.64532L10.4784 1.57503C10.3348 1.10213 9.66523 1.10213 9.52158 1.57503L7.67773 7.64532C7.61374 7.85598 7.41949 8 7.19932 8H1.56147C1.07493 8 0.874993 8.62439 1.27103 8.907L5.88596 12.2002C6.06148 12.3254 6.13694 12.5491 6.07316 12.7551L4.2912 18.5104C4.14736 18.975 4.68422 19.3507 5.0714 19.0564L9.69767 15.5398C9.87637 15.404 10.1237 15.4039 10.3025 15.5396L14.9395 19.0586C15.3268 19.3525 15.8632 18.9768 15.7194 18.5124L13.9368 12.7548C13.873 12.5489 13.9483 12.3254 14.1236 12.2001L18.7313 8.90678C19.127 8.62398 18.9269 8 18.4406 8H12.8007Z"
                                                    fill="#FFDC22" />
                                                <path
                                                    d="M33.8438 7.79064C33.9718 8.21197 34.3603 8.5 34.8007 8.5H40.4406L35.8329 11.7933C35.4823 12.0439 35.3317 12.491 35.4591 12.9027L37.2418 18.6603L32.6048 15.1413C32.2472 14.8699 31.7525 14.8701 31.3951 15.1418L26.7688 18.6583L28.5508 12.9029C28.6783 12.491 28.5274 12.0437 28.1764 11.7932L23.5615 8.5H29.1993C29.6397 8.5 30.0282 8.21197 30.1562 7.79064L32 1.72035L33.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                                <path
                                                    d="M55.8438 7.79064C55.9718 8.21197 56.3603 8.5 56.8007 8.5H62.4406L57.8329 11.7933C57.4823 12.0439 57.3317 12.491 57.4591 12.9027L59.2418 18.6603L54.6048 15.1413C54.2472 14.8699 53.7525 14.8701 53.3951 15.1418L48.7688 18.6583L50.5508 12.9029C50.6783 12.491 50.5274 12.0437 50.1764 11.7932L45.5615 8.5H51.1993C51.6397 8.5 52.0282 8.21197 52.1562 7.79064L54 1.72035L55.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                                <path
                                                    d="M77.8438 7.79064C77.9718 8.21197 78.3603 8.5 78.8007 8.5H84.4406L79.8329 11.7933C79.4823 12.0439 79.3317 12.491 79.4591 12.9027L81.2418 18.6603L76.6048 15.1413C76.2472 14.8699 75.7525 14.8701 75.3951 15.1418L70.7688 18.6583L72.5508 12.9029C72.6783 12.491 72.5274 12.0437 72.1764 11.7932L67.5615 8.5H73.1993C73.6397 8.5 74.0282 8.21197 74.1562 7.79064L76 1.72035L77.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                                <path
                                                    d="M99.8438 7.79064C99.9718 8.21197 100.36 8.5 100.801 8.5H106.441L101.833 11.7933C101.482 12.0439 101.332 12.491 101.459 12.9027L103.242 18.6603L98.6048 15.1413C98.2472 14.8699 97.7525 14.8701 97.3951 15.1418L92.7688 18.6583L94.5508 12.9029C94.6783 12.491 94.5274 12.0437 94.1764 11.7932L89.5615 8.5H95.1993C95.6397 8.5 96.0282 8.21197 96.1562 7.79064L98 1.72035L99.8438 7.79064Z"
                                                    stroke="#FFDC22" />
                                            </svg> & up</label>
                                    </div>
                                </div>
                                <br>

                                <div id="filter">
                                    <b>Discount Range</b>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="10% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">10% and above</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="20% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">20% and above</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="30% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">30% and above</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="40% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">40% and above</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="50% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">50% and above</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="60% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">60% and above</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="70% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">70% and above</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="80% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">80% and above</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="90% and above" id="filter-checkbox">
                                        <label class="form-check-label" for="flexCheckDefault">90% and above</label>
                                    </div>
                                </div>
                                <br>

                                <div id="filter" class="color">
                                    <b onclick="searchcolor()">Colors <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.71 19.79L17.31 16.4C18.407 15.0025 19.0022 13.2767 19 11.5C19 9.91775 18.5308 8.37103 17.6518 7.05544C16.7727 5.73985 15.5233 4.71447 14.0615 4.10897C12.5997 3.50347 10.9911 3.34504 9.43928 3.65372C7.88743 3.9624 6.46197 4.72433 5.34315 5.84315C4.22433 6.96197 3.4624 8.38743 3.15372 9.93928C2.84504 11.4911 3.00347 13.0997 3.60897 14.5615C4.21447 16.0233 5.23985 17.2727 6.55544 18.1518C7.87103 19.0308 9.41775 19.5 11 19.5C12.7767 19.5022 14.5025 18.907 15.9 17.81L19.29 21.21C19.383 21.3037 19.4936 21.3781 19.6154 21.4289C19.7373 21.4797 19.868 21.5058 20 21.5058C20.132 21.5058 20.2627 21.4797 20.3846 21.4289C20.5064 21.3781 20.617 21.3037 20.71 21.21C20.8037 21.117 20.8781 21.0064 20.9289 20.8846C20.9797 20.7627 21.0058 20.632 21.0058 20.5C21.0058 20.368 20.9797 20.2373 20.9289 20.1154C20.8781 19.9936 20.8037 19.883 20.71 19.79ZM5 11.5C5 10.3133 5.3519 9.15328 6.01119 8.16658C6.67047 7.17989 7.60755 6.41085 8.7039 5.95673C9.80026 5.5026 11.0067 5.38378 12.1705 5.61529C13.3344 5.8468 14.4035 6.41825 15.2426 7.25736C16.0818 8.09648 16.6532 9.16558 16.8847 10.3295C17.1162 11.4933 16.9974 12.6997 16.5433 13.7961C16.0892 14.8925 15.3201 15.8295 14.3334 16.4888C13.3467 17.1481 12.1867 17.5 11 17.5C9.4087 17.5 7.88258 16.8679 6.75736 15.7426C5.63214 14.6174 5 13.0913 5 11.5Z"
                                                fill="#2E2E2E" />
                                        </svg>
                                    </b>
                                    <div id="searchcolor" class="dropdown-content">
                                        <input type="text" name="searchcolor" placeholder="Search.." id="myInput" onkeyup="filtercolor()">
                                    </div>

                                    <div id="expandcolor" class="normal">
                                        <div class="form-check">
                                            <label class="form-check-color" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Red" id="filter-checkbox">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="9" cy="9" r="9" fill="#FF0000" />
                                                </svg> Red</label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-color" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Blue" id="filter-checkbox">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="9" cy="9" r="9" fill="#0098FD" />
                                                </svg> Blue</label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-color" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Green" id="filter-checkbox">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="9" cy="9" r="9" fill="#26EF00" />
                                                </svg> Green</label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-color" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Yellow" id="filter-checkbox">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="9" cy="9" r="9" fill="#FFDC22" />
                                                </svg> Yellow</label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-color" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Black" id="filter-checkbox">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="9" cy="9" r="9" fill="#000000" />
                                                </svg> Black</label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-color" for="flexCheckDefault">
                                                <input class="form-check-input" type="checkbox" value="Orange" id="filter-checkbox">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="9" cy="9" r="9" fill="#ff6f00" />
                                                </svg> Orange</label>
                                        </div>
                                    </div>

                                    <button onclick="expandcolor()">
                                        <svg width="200" height="30" viewBox="0 0 274 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M90.452 19.896C92.0733 19.896 92.884 19.3413 92.884 18.232C92.884 17.8907 92.8093 17.6027 92.66 17.368C92.5213 17.1227 92.3293 16.9147 92.084 16.744C91.8387 16.5627 91.556 16.408 91.236 16.28C90.9267 16.152 90.596 16.024 90.244 15.896C89.8387 15.7573 89.4547 15.6027 89.092 15.432C88.7293 15.2507 88.4147 15.0427 88.148 14.808C87.8813 14.5627 87.668 14.2747 87.508 13.944C87.3587 13.6133 87.284 13.2133 87.284 12.744C87.284 11.7733 87.6147 11.016 88.276 10.472C88.9373 9.928 89.8493 9.656 91.012 9.656C91.684 9.656 92.292 9.73067 92.836 9.88C93.3907 10.0187 93.796 10.1733 94.052 10.344L93.556 11.608C93.332 11.4693 92.996 11.336 92.548 11.208C92.1107 11.0693 91.5987 11 91.012 11C90.7133 11 90.436 11.032 90.18 11.096C89.924 11.16 89.7 11.256 89.508 11.384C89.316 11.512 89.1613 11.6773 89.044 11.88C88.9373 12.072 88.884 12.3013 88.884 12.568C88.884 12.8667 88.9427 13.1173 89.06 13.32C89.1773 13.5227 89.3427 13.704 89.556 13.864C89.7693 14.0133 90.0147 14.152 90.292 14.28C90.58 14.408 90.8947 14.536 91.236 14.664C91.716 14.856 92.1533 15.048 92.548 15.24C92.9533 15.432 93.3 15.6613 93.588 15.928C93.8867 16.1947 94.116 16.5147 94.276 16.888C94.436 17.2507 94.516 17.6933 94.516 18.216C94.516 19.1867 94.1587 19.9333 93.444 20.456C92.74 20.9787 91.7427 21.24 90.452 21.24C90.0147 21.24 89.6093 21.208 89.236 21.144C88.8733 21.0907 88.548 21.0267 88.26 20.952C87.972 20.8667 87.7213 20.7813 87.508 20.696C87.3053 20.6 87.1453 20.52 87.028 20.456L87.492 19.176C87.7373 19.3147 88.1107 19.4693 88.612 19.64C89.1133 19.8107 89.7267 19.896 90.452 19.896ZM95.8316 16.856C95.8316 16.12 95.9383 15.48 96.1516 14.936C96.365 14.3813 96.6476 13.9227 96.9996 13.56C97.3516 13.1973 97.757 12.9253 98.2156 12.744C98.6743 12.5627 99.1436 12.472 99.6236 12.472C100.744 12.472 101.602 12.824 102.2 13.528C102.797 14.2213 103.096 15.2827 103.096 16.712C103.096 16.776 103.096 16.8613 103.096 16.968C103.096 17.064 103.09 17.1547 103.08 17.24H97.3836C97.4476 18.104 97.6983 18.76 98.1356 19.208C98.573 19.656 99.2556 19.88 100.184 19.88C100.706 19.88 101.144 19.8373 101.496 19.752C101.858 19.656 102.13 19.5653 102.312 19.48L102.52 20.728C102.338 20.824 102.018 20.9253 101.56 21.032C101.112 21.1387 100.6 21.192 100.024 21.192C99.2983 21.192 98.669 21.0853 98.1356 20.872C97.613 20.648 97.181 20.344 96.8396 19.96C96.4983 19.576 96.2423 19.1227 96.0716 18.6C95.9116 18.0667 95.8316 17.4853 95.8316 16.856ZM101.544 16.04C101.554 15.368 101.384 14.8187 101.032 14.392C100.69 13.9547 100.216 13.736 99.6076 13.736C99.2663 13.736 98.9623 13.8053 98.6956 13.944C98.4396 14.072 98.221 14.2427 98.0396 14.456C97.8583 14.6693 97.7143 14.9147 97.6076 15.192C97.5116 15.4693 97.4476 15.752 97.4156 16.04H101.544ZM104.769 16.856C104.769 16.12 104.876 15.48 105.089 14.936C105.302 14.3813 105.585 13.9227 105.937 13.56C106.289 13.1973 106.694 12.9253 107.153 12.744C107.612 12.5627 108.081 12.472 108.561 12.472C109.681 12.472 110.54 12.824 111.137 13.528C111.734 14.2213 112.033 15.2827 112.033 16.712C112.033 16.776 112.033 16.8613 112.033 16.968C112.033 17.064 112.028 17.1547 112.017 17.24H106.321C106.385 18.104 106.636 18.76 107.073 19.208C107.51 19.656 108.193 19.88 109.121 19.88C109.644 19.88 110.081 19.8373 110.433 19.752C110.796 19.656 111.068 19.5653 111.249 19.48L111.457 20.728C111.276 20.824 110.956 20.9253 110.497 21.032C110.049 21.1387 109.537 21.192 108.961 21.192C108.236 21.192 107.606 21.0853 107.073 20.872C106.55 20.648 106.118 20.344 105.777 19.96C105.436 19.576 105.18 19.1227 105.009 18.6C104.849 18.0667 104.769 17.4853 104.769 16.856ZM110.481 16.04C110.492 15.368 110.321 14.8187 109.969 14.392C109.628 13.9547 109.153 13.736 108.545 13.736C108.204 13.736 107.9 13.8053 107.633 13.944C107.377 14.072 107.158 14.2427 106.977 14.456C106.796 14.6693 106.652 14.9147 106.545 15.192C106.449 15.4693 106.385 15.752 106.353 16.04H110.481ZM122.946 19.464C122.839 19.208 122.695 18.8827 122.514 18.488C122.343 18.0933 122.156 17.6667 121.954 17.208C121.751 16.7493 121.532 16.28 121.298 15.8C121.074 15.3093 120.86 14.8507 120.658 14.424C120.455 13.9867 120.263 13.5973 120.082 13.256C119.911 12.9147 119.772 12.6533 119.666 12.472C119.548 13.7307 119.452 15.096 119.378 16.568C119.303 18.0293 119.239 19.5067 119.186 21H117.666C117.708 20.04 117.756 19.0747 117.81 18.104C117.863 17.1227 117.922 16.1627 117.986 15.224C118.06 14.2747 118.135 13.352 118.21 12.456C118.295 11.56 118.386 10.712 118.482 9.912H119.842C120.13 10.3813 120.439 10.936 120.77 11.576C121.1 12.216 121.431 12.888 121.762 13.592C122.092 14.2853 122.412 14.984 122.722 15.688C123.031 16.3813 123.314 17.016 123.57 17.592C123.826 17.016 124.108 16.3813 124.418 15.688C124.727 14.984 125.047 14.2853 125.378 13.592C125.708 12.888 126.039 12.216 126.37 11.576C126.7 10.936 127.01 10.3813 127.298 9.912H128.658C129.02 13.4853 129.292 17.1813 129.474 21H127.954C127.9 19.5067 127.836 18.0293 127.762 16.568C127.687 15.096 127.591 13.7307 127.474 12.472C127.367 12.6533 127.223 12.9147 127.042 13.256C126.871 13.5973 126.684 13.9867 126.482 14.424C126.279 14.8507 126.06 15.3093 125.826 15.8C125.602 16.28 125.388 16.7493 125.186 17.208C124.983 17.6667 124.791 18.0933 124.61 18.488C124.439 18.8827 124.3 19.208 124.194 19.464H122.946ZM139.155 16.84C139.155 17.5013 139.059 18.0987 138.867 18.632C138.675 19.1653 138.403 19.624 138.051 20.008C137.71 20.392 137.299 20.6907 136.819 20.904C136.339 21.1067 135.817 21.208 135.251 21.208C134.686 21.208 134.163 21.1067 133.683 20.904C133.203 20.6907 132.787 20.392 132.435 20.008C132.094 19.624 131.827 19.1653 131.635 18.632C131.443 18.0987 131.347 17.5013 131.347 16.84C131.347 16.1893 131.443 15.5973 131.635 15.064C131.827 14.52 132.094 14.056 132.435 13.672C132.787 13.288 133.203 12.9947 133.683 12.792C134.163 12.5787 134.686 12.472 135.251 12.472C135.817 12.472 136.339 12.5787 136.819 12.792C137.299 12.9947 137.71 13.288 138.051 13.672C138.403 14.056 138.675 14.52 138.867 15.064C139.059 15.5973 139.155 16.1893 139.155 16.84ZM137.603 16.84C137.603 15.9013 137.39 15.16 136.963 14.616C136.547 14.0613 135.977 13.784 135.251 13.784C134.526 13.784 133.95 14.0613 133.523 14.616C133.107 15.16 132.899 15.9013 132.899 16.84C132.899 17.7787 133.107 18.5253 133.523 19.08C133.95 19.624 134.526 19.896 135.251 19.896C135.977 19.896 136.547 19.624 136.963 19.08C137.39 18.5253 137.603 17.7787 137.603 16.84ZM144.321 12.504C144.449 12.504 144.593 12.5147 144.753 12.536C144.923 12.5467 145.089 12.568 145.249 12.6C145.409 12.6213 145.553 12.648 145.681 12.68C145.819 12.7013 145.921 12.7227 145.985 12.744L145.729 14.04C145.611 13.9973 145.414 13.9493 145.137 13.896C144.87 13.832 144.523 13.8 144.097 13.8C143.819 13.8 143.542 13.832 143.265 13.896C142.998 13.9493 142.822 13.9867 142.737 14.008V21H141.249V13.032C141.601 12.904 142.038 12.7867 142.561 12.68C143.083 12.5627 143.67 12.504 144.321 12.504ZM146.957 16.856C146.957 16.12 147.063 15.48 147.277 14.936C147.49 14.3813 147.773 13.9227 148.125 13.56C148.477 13.1973 148.882 12.9253 149.341 12.744C149.799 12.5627 150.269 12.472 150.749 12.472C151.869 12.472 152.727 12.824 153.325 13.528C153.922 14.2213 154.221 15.2827 154.221 16.712C154.221 16.776 154.221 16.8613 154.221 16.968C154.221 17.064 154.215 17.1547 154.205 17.24H148.509C148.573 18.104 148.823 18.76 149.261 19.208C149.698 19.656 150.381 19.88 151.309 19.88C151.831 19.88 152.269 19.8373 152.621 19.752C152.983 19.656 153.255 19.5653 153.437 19.48L153.645 20.728C153.463 20.824 153.143 20.9253 152.685 21.032C152.237 21.1387 151.725 21.192 151.149 21.192C150.423 21.192 149.794 21.0853 149.261 20.872C148.738 20.648 148.306 20.344 147.965 19.96C147.623 19.576 147.367 19.1227 147.197 18.6C147.037 18.0667 146.957 17.4853 146.957 16.856ZM152.669 16.04C152.679 15.368 152.509 14.8187 152.157 14.392C151.815 13.9547 151.341 13.736 150.733 13.736C150.391 13.736 150.087 13.8053 149.821 13.944C149.565 14.072 149.346 14.2427 149.165 14.456C148.983 14.6693 148.839 14.9147 148.733 15.192C148.637 15.4693 148.573 15.752 148.541 16.04H152.669Z"
                                                fill="#6E6E6E" />
                                            <path d="M180.5 13L175.5 18L170.5 13" stroke="#6E6E6E" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="pagination-container">
                <?= $pager->links() ?>
            </div>


        </section>

    <!-- Story Section -->
    <?= $this->include('instagram_view') ?>
    <!-- Story Section End -->
    
    <section class="container text-center">
        <h1>Recently Viewed</h1>
        <div class="card-container-sale" style="margin: 30px;">
          <button class="prev-sale">&#10094;</button>
          <div class="frame-sale">
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
            <div class="card" style="border: none;">
              <img src="<?= base_url(); ?>images/collec-img.jpg" alt="Item 1">
              <a>Name of the Brand</a>
              <p>Name of the article</p>
              <b>Price</b>
              <button type="button" class="btn btn-secondary">Add To Cart</button>
            </div>
    
          </div>
          <button class="next-sale">&#10095;</button>
        </div>
      </section>
    
    </div>

    <!-- Story Section -->
    <?= $this->include('footer') ?>
    <!-- Story Section End -->

</body>

<!-- Index Footer Section -->
<?= $this->include('collection_footer_view') ?>
<!-- Index Footer End -->

</html>