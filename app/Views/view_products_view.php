<!-- Include meta head section -->
<?= $this->include('index_head_view', [
    'meta_title' => $meta_title ?? 'Default Title',
    'meta_description' => $meta_description ?? 'Default Description'
]) ?>

<body>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-bottom-right" role="alert" id="success-message">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    

    <div class="container products_view">


        <section class="container" id="path">
            <u>
                <?php foreach ($tier1id as $tier) : ?>
                    <a href="<?= esc($tier['tier_link']) ?>"><?= esc($tier['tier_name']) ?> </a>
                <?php endforeach; ?>
            </u>
            /
            <u>
                <?php foreach ($tier2id as $tier) : ?>
                    <a href="<?= esc($tier['tier_2_link']) ?>"><?= $tier['tier_name'] ?> </a>
                <?php endforeach; ?>
            </u>
            /
            <u>
                <?php foreach ($tier3id as $tier) : ?>
                    <a href="<?= esc($tier['tier_3_link']) ?>"><?= $tier['tier_name'] ?> </a>
                <?php endforeach; ?>
            </u>
        </section>
        <section class="container text-center">
            <div class="row">
                <div class="col-sm-8">
                    <section class="container text-center">
                        <div class="product-frame">
                            <button class="product-prev">❮</button>
                            <div class="products">
                                <div class="product">
                                    <img src="<?= base_url('uploads/' . esc($products['product_image'])) ?>" alt="Slide 1">
                                </div>
                                <div class="product">
                                    <img src="<?= base_url('uploads/' . esc($products['other_image_1'])) ?>" alt="Slide 2">
                                </div>
                                <div class="product">
                                    <img src="<?= base_url('uploads/' . esc($products['other_image_2'])) ?>" alt="Slide 3">
                                </div>
                                <div class="product">
                                    <img src="<?= base_url('uploads/' . esc($products['other_image_3'])) ?>" alt="Slide 4">
                                </div>
                                <div class="product">
                                    <img src="<?= base_url('uploads/' . esc($products['other_image_4'])) ?>" alt="Slide 5">
                                </div>
                                <div class="product">
                                    <img src="<?= base_url('uploads/' . esc($products['other_image_5'])) ?>" alt="Slide 6">
                                </div>
                            </div>
                            <button class="product-next">❯</button>
                        </div>
                        <div class="navigation">
                            <div class="nav-dot"></div>
                            <div class="nav-dot"></div>
                            <div class="nav-dot"></div>
                            <div class="nav-dot"></div>
                            <div class="nav-dot"></div>
                            <div class="nav-dot"></div>
                        </div>
                    </section>
                </div>
                <div class="col-sm-4" id="productdetails">
                    <div class="infoproduct">
                        <div style="display: flex;align-items: center;">
                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.75 11.75H8.25V7.25H6.75V11.75ZM7.5 5.75C7.7125 5.75 7.89075 5.678 8.03475 5.534C8.17875 5.39 8.2505 5.212 8.25 5C8.2495 4.788 8.1775 4.61 8.034 4.466C7.8905 4.322 7.7125 4.25 7.5 4.25C7.2875 4.25 7.1095 4.322 6.966 4.466C6.8225 4.61 6.7505 4.788 6.75 5C6.7495 5.212 6.8215 5.39025 6.966 5.53475C7.1105 5.67925 7.2885 5.751 7.5 5.75ZM7.5 15.5C6.4625 15.5 5.4875 15.303 4.575 14.909C3.6625 14.515 2.86875 13.9808 2.19375 13.3063C1.51875 12.6318 0.984501 11.838 0.591001 10.925C0.197501 10.012 0.000500949 9.037 9.49367e-07 8C-0.000499051 6.963 0.196501 5.988 0.591001 5.075C0.985501 4.162 1.51975 3.36825 2.19375 2.69375C2.86775 2.01925 3.6615 1.485 4.575 1.091C5.4885 0.697 6.4635 0.5 7.5 0.5C8.5365 0.5 9.5115 0.697 10.425 1.091C11.3385 1.485 12.1323 2.01925 12.8063 2.69375C13.4803 3.36825 14.0148 4.162 14.4098 5.075C14.8048 5.988 15.0015 6.963 15 8C14.9985 9.037 14.8015 10.012 14.409 10.925C14.0165 11.838 13.4823 12.6318 12.8063 13.3063C12.1303 13.9808 11.3365 14.5152 10.425 14.9097C9.5135 15.3042 8.5385 15.501 7.5 15.5Z"
                                    fill="#FFDC22" />
                            </svg>
                            <yellow>ID: <?= esc($products['product_id']) ?></yellow>
                            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.75 10.56C11.18 10.56 10.67 10.785 10.28 11.1375L4.9325 8.025C4.97 7.8525 5 7.68 5 7.5C5 7.32 4.97 7.1475 4.9325 6.975L10.22 3.8925C10.625 4.2675 11.1575 4.5 11.75 4.5C12.995 4.5 14 3.495 14 2.25C14 1.005 12.995 0 11.75 0C10.505 0 9.5 1.005 9.5 2.25C9.5 2.43 9.53 2.6025 9.5675 2.775L4.28 5.8575C3.875 5.4825 3.3425 5.25 2.75 5.25C1.505 5.25 0.5 6.255 0.5 7.5C0.5 8.745 1.505 9.75 2.75 9.75C3.3425 9.75 3.875 9.5175 4.28 9.1425L9.62 12.2625C9.5825 12.42 9.56 12.585 9.56 12.75C9.56 13.9575 10.5425 14.94 11.75 14.94C12.9575 14.94 13.94 13.9575 13.94 12.75C13.94 11.5425 12.9575 10.56 11.75 10.56Z"
                                    fill="#FFDC22" />
                            </svg>
                        </div>
                    </div>
                    <a><?= esc($products['product_title']) ?></a>
                    <p style=" display: flex; ">Product rating<svg width="87" height="21" viewBox="0 0 87 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.93 8.5L10.5 0.5L8.07 8.5H0.5L6.68 12.91L4.33 20.5L10.5 15.81L16.68 20.5L14.33 12.91L20.5 8.5H12.93Z"
                                fill="#FFDC22" />
                            <path
                                d="M34.93 8.5L32.5 0.5L30.07 8.5H22.5L28.68 12.91L26.33 20.5L32.5 15.81L38.68 20.5L36.33 12.91L42.5 8.5H34.93Z"
                                fill="#FFDC22" />
                            <path
                                d="M56.93 8.5L54.5 0.5L52.07 8.5H44.5L50.68 12.91L48.33 20.5L54.5 15.81L60.68 20.5L58.33 12.91L64.5 8.5H56.93Z"
                                fill="#FFDC22" />
                            <path
                                d="M86.5 7.74L79.31 7.12L76.5 0.5L73.69 7.13L66.5 7.74L71.96 12.47L70.32 19.5L76.5 15.77L82.68 19.5L81.05 12.47L86.5 7.74ZM76.5 13.9V4.6L78.21 8.64L82.59 9.02L79.27 11.9L80.27 16.18L76.5 13.9Z"
                                fill="#FFDC22" />
                        </svg> | 2..3K</p>
                    <p>Sold by: Sportzsaga</p>
                    <div>
                        <div id="price">
                            <b>&#x20B9;<?= esc($products['selling_price']) ?></b>
                            <p>&#x20B9;<?= esc($products['cost_price']) ?></p>
                            <red>(22% OFF)</red>
                        </div>
                    </div>

                    <div>
                        <div>
                            <?php if (esc($products['inventory']) > 0): ?>
                                <div class="row">
                                    <div class="col cart-btn">
                                        <form id="add-to-cart-form" method="post">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="addtocart">Add To Cart</button>
                                        </form>
                                        <a href="<?= base_url(); ?>add_to_wishlist/<?= esc($products['product_id']) ?>">
                                            <div class="wishlist">Add To Wishlist</div>
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="outOfstock">
                                    <p>Out Of Stock</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <center>
                        <a style="font-size: 14px; color: #000000; text-align: center;">X Years Warranty*</a>
                    </center>

                    <div id="delivery">
                        <b>Delivery Options<svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5 7C19.5 5.9 18.6 5 17.5 5H15.5C14.95 5 14.5 5.45 14.5 6C14.5 6.55 14.95 7 15.5 7H17.5V9.65L14.02 14H10.5V10C10.5 9.45 10.05 9 9.5 9H6.5C4.29 9 2.5 10.79 2.5 13V15C2.5 15.55 2.95 16 3.5 16H4.5C4.5 17.66 5.84 19 7.5 19C9.16 19 10.5 17.66 10.5 16H14.02C14.63 16 15.2 15.72 15.58 15.25L19.06 10.9C19.35 10.54 19.5 10.1 19.5 9.65V7ZM7.5 17C6.95 17 6.5 16.55 6.5 16H8.5C8.5 16.55 8.05 17 7.5 17Z"
                                    fill="#2E2E2E" />
                                <path
                                    d="M6.5 6H9.5C10.05 6 10.5 6.45 10.5 7C10.5 7.55 10.05 8 9.5 8H6.5C5.95 8 5.5 7.55 5.5 7C5.5 6.45 5.95 6 6.5 6ZM19.5 13C17.84 13 16.5 14.34 16.5 16C16.5 17.66 17.84 19 19.5 19C21.16 19 22.5 17.66 22.5 16C22.5 14.34 21.16 13 19.5 13ZM19.5 17C18.95 17 18.5 16.55 18.5 16C18.5 15.45 18.95 15 19.5 15C20.05 15 20.5 15.45 20.5 16C20.5 16.55 20.05 17 19.5 17Z"
                                    fill="#2E2E2E" />
                            </svg></b>
                        <div id="zip">
                            <div class="col-sm">
                                <input type="tel" style=" text-align: center;" class="form-control" id="validationTooltip05" minlength="6" maxlength="6">
                                <div class="invalid-tooltip">
                                    !
                                </div>
                                <div class="valid-tooltip">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="ionicon" viewBox="0 0 512 512">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.5 21C13.6819 21 14.8522 20.7672 15.9442 20.3149C17.0361 19.8626 18.0282 19.1997 18.864 18.364C19.6997 17.5282 20.3626 16.5361 20.8149 15.4442C21.2672 14.3522 21.5 13.1819 21.5 12C21.5 10.8181 21.2672 9.64778 20.8149 8.55585C20.3626 7.46392 19.6997 6.47177 18.864 5.63604C18.0282 4.80031 17.0361 4.13738 15.9442 3.68508C14.8522 3.23279 13.6819 3 12.5 3C10.1131 3 7.82387 3.94821 6.13604 5.63604C4.44821 7.32387 3.5 9.61305 3.5 12C3.5 14.3869 4.44821 16.6761 6.13604 18.364C7.82387 20.0518 10.1131 21 12.5 21ZM12.268 15.64L17.268 9.64L15.732 8.36L11.432 13.519L9.207 11.293L7.793 12.707L10.793 15.707L11.567 16.481L12.268 15.64Z"
                                            fill="#2E2E2E" />
                                    </svg>
                                </div>
                            </div>
                            <red class="col-md-auto" type="submit">Change</red>
                        </div>
                        <div>
                            <b><svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 28.5C20 28.8978 19.842 29.2794 19.5607 29.5607C19.2794 29.842 18.8978 30 18.5 30H11C10.6022 30 10.2206 29.842 9.93934 29.5607C9.65804 29.2794 9.5 28.8978 9.5 28.5C9.5 28.1022 9.65804 27.7206 9.93934 27.4393C10.2206 27.158 10.6022 27 11 27H18.5C18.8978 27 19.2794 27.158 19.5607 27.4393C19.842 27.7206 20 28.1022 20 28.5ZM32 6H36.5C36.8978 6 37.2794 5.84196 37.5607 5.56066C37.842 5.27936 38 4.89782 38 4.5C38 4.10218 37.842 3.72064 37.5607 3.43934C37.2794 3.15804 36.8978 3 36.5 3H30.5C30.1022 3 29.7206 3.15804 29.4393 3.43934C29.158 3.72064 29 4.10218 29 4.5V10.5H32V6ZM45.5 21.75V33C45.5 33.7956 45.1839 34.5587 44.6213 35.1213C44.0587 35.6839 43.2957 36 42.5 36H26V42C26 42.3978 25.842 42.7794 25.5607 43.0607C25.2794 43.342 24.8978 43.5 24.5 43.5C24.1022 43.5 23.7206 43.342 23.4393 43.0607C23.158 42.7794 23 42.3978 23 42V36H6.5C5.70435 36 4.94129 35.6839 4.37868 35.1213C3.81607 34.5587 3.5 33.7956 3.5 33V21.75C3.50347 18.7674 4.68985 15.9079 6.79889 13.7989C8.90792 11.6899 11.7674 10.5035 14.75 10.5H29V27C29 27.3978 29.158 27.7794 29.4393 28.0607C29.7206 28.342 30.1022 28.5 30.5 28.5C30.8978 28.5 31.2794 28.342 31.5607 28.0607C31.842 27.7794 32 27.3978 32 27V10.5H34.25C37.2326 10.5035 40.0921 11.6899 42.2011 13.7989C44.3101 15.9079 45.4965 18.7674 45.5 21.75ZM23 21.75C23 19.562 22.1308 17.4635 20.5836 15.9164C19.0365 14.3692 16.938 13.5 14.75 13.5C12.562 13.5 10.4635 14.3692 8.91637 15.9164C7.36919 17.4635 6.5 19.562 6.5 21.75V33H23V21.75Z"
                                        fill="#2E2E2E" />
                                </svg>
                                Estimate Delivery, May 17
                            </b>
                            <b><svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.5219 2.27905C27.125 2.30718 26.1219 2.57905 25.4563 3.06655L16.3344 7.95093L11.2625 14.85C10.1938 16.5 10.9532 19.6875 14.2907 17.6437L17.9469 12.825C22.5875 8.8228 32.0563 10.6594 27.5657 18.6937C25.3625 23.3437 26.3938 25.6125 29.2344 26.5687L30.5282 22.2187C32.7688 17.175 36.95 16.2656 36.7813 12.1969L46.8313 12.9187L46.7375 2.4103L28.5219 2.27905ZM23.45 11.9719C21.8188 11.9437 20.2157 12.6187 19.0532 13.5937L15.3875 18.4125C16.3907 19.2094 17.4032 18.7781 18.4063 17.8125C19.5875 18.4125 20.5063 17.4844 21.2563 15.6281C21.5657 14.3625 22.025 13.4719 23.45 11.9719ZM15.9875 20.9719C15.95 20.9719 15.9032 20.9719 15.8657 20.9812C15.5563 21.0469 15.1907 21.375 14.9469 22.125C14.6938 22.875 14.6375 23.9437 14.8625 25.0875C15.0875 26.2219 15.5563 27.1875 16.0813 27.7875C16.5875 28.3781 17.0563 28.5469 17.3657 28.4812C17.6844 28.425 18.0407 28.0875 18.2844 27.3469C18.5375 26.5969 18.6032 25.5187 18.3782 24.3844C18.1438 23.2406 17.675 22.275 17.1594 21.6844C16.7094 21.1594 16.2969 20.9719 15.9875 20.9719ZM23.7313 30.9844C22.9907 30.9937 22.0625 31.2281 21.1532 31.6687C20.1125 32.1844 19.2969 32.8969 18.8563 33.5531C18.4157 34.2 18.3782 34.6875 18.5188 34.9781C18.6594 35.2594 19.0719 35.5312 19.8594 35.5687C20.6469 35.6156 21.7063 35.4 22.7469 34.8844C23.7875 34.3687 24.6032 33.6656 25.0438 33.0094C25.4844 32.3625 25.5219 31.8656 25.3813 31.5844C25.2407 31.2937 24.8282 31.0312 24.0407 30.9937C23.9375 30.9844 23.8438 30.9844 23.7313 30.9844ZM14.5813 39.9469C14.1407 39.9562 13.7375 40.0219 13.3813 40.125C12.5844 40.3594 12.125 40.7812 11.975 41.2781C11.8157 41.7844 11.975 42.3844 12.5094 43.0312C13.0532 43.6687 13.9625 44.2781 15.0875 44.6156C16.2032 44.9531 17.2907 44.9437 18.0969 44.7C18.9032 44.4656 19.3625 44.0437 19.5125 43.5469C19.6625 43.0406 19.5125 42.4406 18.9688 41.7937C18.4344 41.1562 17.525 40.5469 16.4 40.2094C15.7625 40.0219 15.1438 39.9375 14.5813 39.9469Z"
                                        fill="#2E2E2E" />
                                </svg>
                                Pay on delivery available
                            </b>

                            <div class="infoproduct">
                                <div style="display: flex;">
                                    <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M47.7857 16.2857L37.5 6V13.7143H19.5V18.8571H37.5V26.5714M11.7857 21.4286L1.5 31.7143L11.7857 42V34.2857H29.7857V29.1429H11.7857V21.4286Z"
                                            fill="#2E2E2E" />
                                    </svg>
                                    <b style=" max-width: 160px;">Easy 12 days return & exchange available</b>
                                </div>
                                <b>
                                    <yellow>More Info</yellow>
                                </b>
                            </div>
                        </div>
                        <center>100% Original Product </center>
                    </div>

                    <div id="offer" class="viewless">
                        <b>Best Offers<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.125 4.75C3.82663 4.75 3.54048 4.63147 3.3295 4.4205C3.11853 4.20952 3 3.92337 3 3.625C3 3.32663 3.11853 3.04048 3.3295 2.8295C3.54048 2.61853 3.82663 2.5 4.125 2.5C4.42337 2.5 4.70952 2.61853 4.9205 2.8295C5.13147 3.04048 5.25 3.32663 5.25 3.625C5.25 3.92337 5.13147 4.20952 4.9205 4.4205C4.70952 4.63147 4.42337 4.75 4.125 4.75ZM16.0575 8.185L9.3075 1.435C9.0375 1.165 8.6625 1 8.25 1H3C2.1675 1 1.5 1.6675 1.5 2.5V7.75C1.5 8.1625 1.665 8.5375 1.9425 8.8075L8.685 15.5575C8.9625 15.8275 9.3375 16 9.75 16C10.1625 16 10.5375 15.8275 10.8075 15.5575L16.0575 10.3075C16.335 10.0375 16.5 9.6625 16.5 9.25C16.5 8.83 16.3275 8.455 16.0575 8.185Z"
                                    fill="#2E2E2E" />
                            </svg></b>
                        <div>
                            <b>7.5% Discount on Myntra Kotak Credit Card</b>
                            <p>Max Discount Up to ₹750 on every spends.</p>
                            <red>Terms & Condition</red>
                        </div>
                        <div>
                            <b>7.5% Discount on Myntra Kotak Credit Card</b>
                            <p>Max Discount Up to ₹750 on every spends.</p>
                            <red>Terms & Condition</red>
                        </div>
                        <div>
                            <b>7.5% Discount on Myntra Kotak Credit Card</b>
                            <p>Max Discount Up to ₹750 on every spends.</p>
                            <red>Terms & Condition</red>
                        </div>
                        <div>
                            <b>7.5% Discount on Myntra Kotak Credit Card</b>
                            <p>Max Discount Up to ₹750 on every spends.</p>
                            <red>Terms & Condition</red>
                        </div>
                    </div>
                    <center>
                        <yellow onclick="expandoffers()">View More</yellow>
                    </center>
                </div>
            </div>
        </section>


        <section class="container text-center">
            <div id="productnav">
                <div class="nav flex-grow-1 nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="col-sm nav-link active" id="v-pills-Details-tab" data-toggle="pill" href="#v-pills-Details" role="tab"
                        aria-controls="v-pills-Details" aria-selected="true">Product Details</a>
                    <a class="col-sm nav-link" id="v-pills-Reviews-tab" data-toggle="pill" href="#v-pills-Reviews" role="tab"
                        aria-controls="v-pills-Reviews" aria-selected="false">Product Reviews</a>
                    <a class="col-sm nav-link" id="v-pills-Technical-tab" data-toggle="pill" href="#v-pills-Technical" role="tab"
                        aria-controls="v-pills-Technical" aria-selected="false">Technical Information</a>
                </div>
                <br>
                <div class="flex-grow-1 tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-Details" role="tabpanel"
                        aria-labelledby="v-pills-Details-tab" tabindex="0">
                        <div id="detailstab">
                            <div class="row">
                                <b>Product Story</b>
                                <p><?= esc($products['product_description']) ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-Reviews" role="tabpanel" aria-labelledby="v-pills-Reviews-tab" tabindex="0">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus fugit odio reprehenderit, eaque quod exercitationem quidem repellat. Molestias, quisquam architecto quasi fugit, dolorem sequi pariatur dolor doloribus error alias omnis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laborum corporis modi nisi quasi omnis sed, harum accusamus distinctio cumque provident rem officiis quae consequuntur dicta beatae possimus iusto reprehenderit.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima quibusdam temporibus hic eaque, ut tempore ipsam aspernatur earum magnam assumenda dolor iure quo blanditiis provident consequatur voluptatem nobis aut enim!
                    </div>

                    <div class="tab-pane fade" id="v-pills-Technical" role="tabpanel" aria-labelledby="v-pills-Technical-tab"
                        tabindex="0">
                        <div class="row" id="detailstab">
                            <b class="col-sm-4">
                                Product Dimensions
                            </b>
                            <p class="col-sm-8">
                                22 x 34 x 5 cm
                            </p>
                        </div>

                        <div class="row" id="detailstab">
                            <b class="col-sm-4">
                                Item Weight
                            </b>
                            <p class="col-sm-8">
                                135 g
                            </p>
                        </div>

                        <div class="row" id="detailstab">
                            <b class="col-sm-4">
                                Material type
                            </b>
                            <p class="col-sm-8">
                                Polyester
                            </p>
                        </div>

                        <div class="row" id="detailstab">
                            <b class="col-sm-4">
                                Style
                            </b>
                            <p class="col-sm-8">
                                Bermuda Shorts
                            </p>
                        </div>

                        <div class="row" id="detailstab">
                            <b class="col-sm-4">
                                Length
                            </b>
                            <p class="col-sm-8">
                                Standard Length
                            </p>
                        </div>

                        <div class="row" id="detailstab">
                            <b class="col-sm-4">
                                Care instructions
                            </b>
                            <p class="col-sm-8">
                                Machine Wash
                            </p>
                        </div>

                        <div class="row" id="detailstab">
                            <b class="col-sm-4">
                                Manufacturer 
                            </b>
                            <p class="col-sm-8">
                                Puma, Sin Joo Bo International Limited Hung Dao Commune Duong Kinh District 18671 Hai Phong City
                            </p>
                        </div>

                        <div class="row" id="detailstab">
                            <b class="col-sm-4">
                                Country of Origin
                            </b>
                            <p class="col-sm-8">
                                India
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="container">
            <div class="ad"
                style="
            position: relative;
            background-image: url('<?= base_url() ?>images/var-car.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 300px;
            width: 100%;
            ">
                <!-- Overlay for the fade effect -->
                <div class="fade-overlay"
                    style="
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background: rgba(0, 0, 0, 0.5); /* Black color with 50% opacity */
                z-index: 1;
            ">
                </div>

                <!-- Content that stays above the overlay -->
                <div class="content" style="position: relative; z-index: 2; padding: 20px;">
                    <h1 class="secHeading" style="color: #fff;">Siscaa</h1>
                    <div class="img-text">
                        <p class="short-desc" style="color: #fff;">
                            Carrom is a tabletop game of Indian origin in which players flick discs, attempting...
                        </p>
                        <p class="full-desc" style="display: none; color: #fff;">
                            to knock them to the corners of the board. In South Asia, many clubs and cafés hold regular tournaments. Carrom is commonly played by families, including children, and at social functions. Different standards and rules exist in different areas.
                        </p>
                    </div>
                    <div>
                        <a href="javascript:void(0);" class="readmore" style="color: #fff;">Read More</a>
                        <i class="fa-solid fa-eye readmore-icon" style="color: #fff;"></i>
                    </div>
                </div>
            </div>
        </section>


        <!-- Recent Viewed Section -->
        <?= $this->include('recent_viewed_view') ?>
        <!-- Recent Viewed Section End -->

    </div>

    <!-- Story Section -->
    <?= $this->include('footer') ?>
    <!-- Story Section End -->

</body>

<!-- Index Footer Section -->
<?= $this->include('index_footer_view') ?>
<!-- Index Footer End -->

<!-- Index Footer Section -->
<?= $this->include('collection_footer_view') ?>
<!-- Index Footer End -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sizeButtons = document.querySelectorAll('.size-btn');
        const selectedSizeInput = document.getElementById('selected-size');
        const addToCartForm = document.getElementById('add-to-cart-form');
        const errorMessage = document.getElementById('size-error-message');

        sizeButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (!button.classList.contains('disabled')) {
                    sizeButtons.forEach(btn => btn.classList.remove('selected'));
                    button.classList.add('selected');
                    const selectedSize = button.getAttribute('data-size');
                    selectedSizeInput.value = selectedSize;
                    errorMessage.style.display = 'none';
                }
            });
        });

        addToCartForm.addEventListener('submit', function(event) {
            event.preventDefault();

            if (selectedSizeInput.value === '') {
                errorMessage.textContent = 'Please select a size.';
                errorMessage.style.display = 'block';
                return;
            }

            // Send AJAX request
            const formData = new FormData(addToCartForm);

            fetch('<?= base_url('add_to_cart/' . esc($products['product_id'])) ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Product added to cart!', 'success'); // Show success toast

                        // Refresh the page after a short delay
                        setTimeout(function() {
                            window.location.reload(); // Auto-refresh the page
                        }, 2000); // Adjust the delay as necessary (2 seconds in this case)

                    } else {
                        showToast(data.message, 'error'); // Show error toast
                        errorMessage.textContent = data.message;
                        errorMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('An error occurred. Please try again.', 'error'); // Show error toast
                });
        });

        // Function to show toast
        function showToast(message, type) {
            let backgroundColor = (type === 'success') ?
                "linear-gradient(to right, #00b09b, #96c93d)" // Success gradient
                :
                "linear-gradient(to right, #FF5F6D, #FFC371)"; // Error gradient

            Toastify({
                text: message,
                duration: 4000, // TimeOut (same as toastr timeout, auto close after this)
                gravity: "bottom", // Positioning (bottom like toastr)
                position: "right", // Bottom right (similar to toastr)
                stopOnFocus: true, // Prevents dismissing on hover
                style: {
                    background: backgroundColor,
                },
                onClick: function() {} // Optional callback after click
            }).showToast();
        }
    });
</script>

</html>