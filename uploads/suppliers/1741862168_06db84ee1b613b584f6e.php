<?php

namespace App\Controllers;

use App\Models\Home_model;
use App\Models\Registerusers_model;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\Ordermanagement_model;
use App\Models\CatalogModel;

class Home extends BaseController
{
    protected $logger;

    public function __construct()
    {
        // Initialize custom logger for cart operations
        $this->logger = service('logger');
    }
    public function index(): string
    {
        $homemodel = new Home_model();

        // Get the logged-in user's ID from the session
        $session = session();
        $userId = $session->get('user_id'); // Replace 'user_id' with the correct session key for your user ID

        $data['head'] = $this->header();
        $data['products'] = $homemodel->GetallProductsData($userId);
        $data['blogs'] = $homemodel->GetallBlogsData();
        $data['collections'] = $homemodel->GetallcollectionsData();
        return view('index', $data);
    }

    public function products($slug)
    {
        $homemodel = new Home_model();
        $data['products'] = $homemodel->getProductBySlug($slug);
        //print_r($data); exit();
        return view('product_page_view', $data);
    }

    public function header()
    {
        $homemodel = new Home_model();
        $usermodel = new Registerusers_model();

        // Get the logged-in user's ID from the session
        $session = session();
        $userId = $session->get('user_id'); // Replace 'user_id' with the correct session key for your user ID


        $data['blogs'] = $homemodel->GetallBlogsData();
        $data['products'] = $homemodel->GetallProductsData($userId);
        $data['search'] = $homemodel->getsearch();
        $data['cart'] = $this->fetch_cart_products();
        $data['cart_count'] = is_array($data['cart']) ? count($data['cart']) : 0;
        $data['cart_total'] = $this->calculate_cart_total($data['cart']);



        $r_productsIds = explode(',', $data['search']['r_products']);
        $data['r_products'] = array_filter($data['products'], function ($r_products) use ($r_productsIds) {
            return in_array($r_products['product_id'], $r_productsIds);
        });
        usort($data['r_products'], function ($a, $b) use ($r_productsIds) {
            return array_search($a['product_id'], $r_productsIds) - array_search($b['product_id'], $r_productsIds);
        });

        $t_productsIds = explode(',', $data['search']['t_products']);
        $data['t_products'] = array_filter($data['products'], function ($t_products) use ($t_productsIds) {
            return in_array($t_products['product_id'], $t_productsIds);
        });
        usort($data['t_products'], function ($a, $b) use ($t_productsIds) {
            return array_search($a['product_id'], $t_productsIds) - array_search($b['product_id'], $t_productsIds);
        });

        $m_productsIds = explode(',', $data['search']['m_products']);
        $data['m_products'] = array_filter($data['products'], function ($m_products) use ($m_productsIds) {
            return in_array($m_products['product_id'], $m_productsIds);
        });
        usort($data['m_products'], function ($a, $b) use ($m_productsIds) {
            return array_search($a['product_id'], $m_productsIds) - array_search($b['product_id'], $m_productsIds);
        });

        $s_blogsIds = explode(',', $data['search']['s_blogs']);
        $data['s_blogs'] = array_filter($data['blogs'], function ($s_blogs) use ($s_blogsIds) {
            return in_array($s_blogs['blog_id'], $s_blogsIds);
        });
        usort($data['s_blogs'], function ($a, $b) use ($s_blogsIds) {
            return array_search($a['blog_id'], $s_blogsIds) - array_search($b['blog_id'], $s_blogsIds);
        });

        $user = session()->get('user_id');
        if ($user) {
            $data['wishlist'] = $usermodel->getRegisteredUserData($user);
        }

        //print_r($data); exit();
        return $data;
    }

    public function about()
    {
        $homemodel = new Home_model();

        $blogs = $homemodel->GetallBlogsData();
        $data['about'] = $homemodel->getabout();
        $data['members'] = $homemodel->getmembers();
        $data['head'] = $this->header();


        $blogsIds = explode(',', $data['about']['blogs']);
        $data['blogs'] = array_filter($blogs, function ($blogs) use ($blogsIds) {
            return in_array($blogs['blog_id'], $blogsIds);
        });
        usort($data['blogs'], function ($a, $b) use ($blogsIds) {
            return array_search($a['blog_id'], $blogsIds) - array_search($b['blog_id'], $blogsIds);
        });

        //print_r($data); exit();
        return view('about', $data);
    }

    public function contact()
    {
        $homemodel = new Home_model();

        $data['contact'] = $homemodel->getcontact();
        $data['head'] = $this->header();

        //print_r($data); exit();
        return view('contact', $data);
    }


    public function details()
    {
        $usermodel = new Registerusers_model();
        $user = session()->get('user_id');
        $data['details'] = $usermodel->getRegisteredUserData($user);
        $data['head'] = $this->header();

        //print_r($data); exit();
        return view('details', $data);
    }
    public function addresses()
    {
        $usermodel = new Registerusers_model();
        $user = session()->get('user_id');
        $data['addresses'] = $usermodel->getRegisteredUserData($user);
        $data['head'] = $this->header();

        //print_r($data); exit();
        return view('addresses', $data);
    }
    public function wishlist()
    {
        $homemodel = new Home_model();
        $usermodel = new Registerusers_model();

        $user = session()->get('user_id');
        $data['wishlist'] = $usermodel->getRegisteredUserData($user);
        $data['wishlist_page'] = $homemodel->getwishlistpage();
        $data['head'] = $this->header();

        //print_r($data); exit();
        return view('wishlist', $data);
    }
    public function history()
    {
        // Check if user is logged in
        $userId = session()->get('user_id');
        /*
        if (!$userId) {
            return redirect()->to('/')->with('error', 'Please login to view your order history.');
        }
        */

        $orderModel = new Home_model();

        $data['history'] = $orderModel->getOrderHistoryByUser($userId);
        $data['head'] = $this->header();

        // Load the history view and pass the data
        return view('history', $data);
    }

    public function cart()
    {
        // Check if user is logged in
        /*
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/')->with('error', 'Please login to view your order history.');
        }
        */
        $homemodel = new Home_model();
        $data['cart_page'] = $homemodel->getcartpage();
        $products = $homemodel->GetallProductsData();
        $data['head'] = $this->header();


        $cm_productsIds = explode(',', $data['cart_page']['cm_products']);
        $data['cm_products'] = array_filter($products, function ($cm_products) use ($cm_productsIds) {
            return in_array($cm_products['product_id'], $cm_productsIds);
        });
        usort($data['cm_products'], function ($a, $b) use ($cm_productsIds) {
            return array_search($a['product_id'], $cm_productsIds) - array_search($b['product_id'], $cm_productsIds);
        });

        //print_r($data['cart_page']['cm_products']); exit();
        return view('cart', $data);
    }

    public function checkout()
    {
        $homemodel = new Home_model();
        $usermodel = new Registerusers_model();


        $userId = session()->get('user_id');

        if (!$userId) {
            // Redirect to a page with modal for email verification        
            $data['head'] = $this->header();
            return view('checkout_email_verification', $data);
        } else {

            $data['checkout'] = $homemodel->getcheckout();
            $data['head'] = $this->header();
            $data['userdata'] = $usermodel->getRegisteredUserData($userId);

            return view('checkout', $data);

        }

    }



    public function orderConfirmation($orderId = null)
    {
        if (!$orderId) {
            return redirect()->to(base_url());
        }

        $orderModel = new Ordermanagement_model();
        $order = $orderModel->find($orderId);

        if (!$order) {
            return redirect()->to(base_url());
        }

        // Verify this order belongs to the logged-in user
        if ($order['user_id'] !== session()->get('user_id')) {
            return redirect()->to(base_url());
        }

        $data = [
            'order' => $order,
            'head' => $this->header(),
            'page_title' => 'Order Confirmation',
            'product_details' => json_decode($order['product_details'], true)
        ];

        return view('order_confirmation', $data);
    }


    public function order()
    {
        $orderModel = new Ordermanagement_model();

        // Get the posted order number
        $number = $this->request->getPost('order');

        // Decode the URL-encoded order number
        $decodedOrderNumber = urldecode($number);

        // Fetch order and tracking details
        $data['order'] = $orderModel->getOrderBynumber($decodedOrderNumber);
        $data['tracking_details'] = $orderModel->getOrdertracking($decodedOrderNumber);
        $data['product_details'] = json_decode($data['order']['product_details'], true);

        $data['head'] = $this->header();

        return view('order_tracking', $data);
    }




























    ////////////////////////////////////////////////////////////////////////////////////////
    public function fetch_cart_products()
    {
        $this->logger->info("Fetching cart products started");

        $cartData = [];

        try {
            $cartModel = new CartModel();
            $productModel = new ProductModel();
            $catalogModel = new CatalogModel();  // Added this model to fetch catalog-related data

            $userId = session('user_id');
            $guestId = $this->request->getCookie('guest_id');

            $this->logger->info("User Context - User ID: {$userId}, Guest ID: {$guestId}");

            // Fetch cart items for the user or guest
            $cartItems = [];
            if ($userId) {
                $this->logger->info("Fetching cart items for user: {$userId}");
                $cartItems = $cartModel->where('user_id', $userId)->findAll(); // Fetch cart for logged-in user
            } elseif ($guestId) {
                $this->logger->info("Fetching cart items for guest: {$guestId}");
                $cartItems = $cartModel->where('guest_id', $guestId)->findAll(); // Fetch cart for guest user
            }

            if (empty($cartItems)) {
                $this->logger->info("No cart items found");
                return $cartData; // Return empty array if no items found
            }

            $this->logger->info("Cart items found: " . json_encode($cartItems));

            // Extract product IDs from cart items
            $productIds = array_column($cartItems, 'product_id');

            // Fetch product details
            $products = $productModel->whereIn('product_id', $productIds)->findAll();
            $this->logger->info("Products fetched: " . json_encode($products));

            // Fetch catalog information for the logged-in user (only for user ID)
            $catalogData = null;
            $catalogProducts = [];
            $catalogSellingPrices = [];
            $quantityRules = [];

            if ($userId) {
                // For logged-in users, check catalog data
                $catalogData = $catalogModel->where('publish_for LIKE', "%{$userId}%")
                    ->where('status', 'active')
                    ->get()
                    ->getRowArray();
            }

            // If catalog data exists, prepare product and price mappings
            if ($catalogData) {
                $catalogProducts = explode(',', $catalogData['products']);
                $catalogSellingPrices = json_decode($catalogData['selling_price'], true);
                $quantityRules = json_decode($catalogData['quantity_rules'], true);
                //print_r($quantityRules);
                //exit();
                $this->logger->info("Catalog data found for user: " . json_encode($catalogData));
            }

            // Map product details with catalog prices if applicable
            foreach ($cartItems as &$item) {
                foreach ($products as $product) {
                    if ($item['product_id'] == $product['product_id']) {
                        // If product exists in the catalog (for logged-in users), use the catalog's selling price
                        if (in_array($product['product_id'], $catalogProducts)) {
                            $item['selling_price'] = $catalogSellingPrices[$product['product_id']] ?? $item['selling_price'];
                        }

                        // Fetch and apply quantity increment rule
                        $incrementValue = $quantityRules['increment']?? 1; // Default increment value

                        // Ensure the quantity follows the increment rule
                        $adjustedQuantity = max($incrementValue, ceil($item['quantity'] / $incrementValue) * $incrementValue);

                        // Add product to cartData
                        $cartData[] = [
                            'cart_id' => $item['id'],
                            'product_id' => $product['product_id'],
                            'product_title' => $product['product_title'],
                            'product_image' => $product['product_image'],
                            'url' => $product['url'],
                            'cost_price' => $product['cost_price'],
                            'selling_price' => $item['selling_price'], // Adjusted selling price
                            'quantity' => $adjustedQuantity, // Apply increment rule
                            'increment_value' => $incrementValue, // Send increment value to frontend
                        ];

                        break;
                    }
                }
            }

            $this->logger->info("Cart products fetched successfully");
        } catch (\Exception $e) {
            $this->logger->error("Failed to fetch cart products: " . $e->getMessage());
            $this->logger->error("Stack trace: " . $e->getTraceAsString());
        }

        return $cartData;
    }



    public function calculate_cart_total($cart)
    {
        $total = 0;

        if (is_array($cart)) {
            foreach ($cart as $item) {
                $total += $item['selling_price'] * $item['quantity'];
            }
        }

        return $total;
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function resetPassword($token)
    {
        $model = new Registerusers_model(); // Correctly instantiate the model

        $data['head'] = $this->header();
        $data['token'] = $token;
        $user = $model->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('/')->with('msg', 'Invalid token.');
        }

        return view('reset_password', $data);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////


    public function sendOtp()
    {
        log_message('debug', 'Entered the sendOtp method.');

        $email = $this->request->getPost('email');

        if (empty($email)) {
            log_message('error', 'Email is missing in the sendOtp request.');
            return $this->response->setJSON(['status' => false, 'message' => 'Email is required.']);
        }

        $model = new Registerusers_model();
        $existingUser = $model->where('email', $email)->first();

        $otp = random_int(100000, 999999);
        $session = session();
        $session->set('otp', $otp);
        $session->set('otp_email', $email);

        log_message('debug', "OTP generated: $otp for email: $email");

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('OTP Verification');
        $emailService->setMessage("Your OTP is: $otp");

        if ($emailService->send()) {
            log_message('debug', 'OTP email sent successfully.');
            return $this->response->setJSON(['status' => true, 'message' => 'OTP sent successfully.']);
        } else {
            log_message('error', 'Failed to send OTP email.');
            return $this->response->setJSON(['status' => false, 'message' => 'Failed to send OTP.']);
        }
    }

    public function verifyOtp()
    {
        log_message('debug', 'Entered the verifyOtp method.');

        $otp = $this->request->getPost('otp');
        $session = session();
        $expectedOtp = $session->get('otp');
        $email = $session->get('otp_email');

        log_message('debug', "Verifying OTP: $otp for email: $email");

        if ($otp != $expectedOtp) {
            log_message('error', 'Invalid OTP provided.');
            return $this->response->setJSON(['status' => false, 'message' => 'Invalid OTP.']);
        }

        $model = new Registerusers_model();
        $cartModel = new CartModel();

        $existingUser = $model->where('email', $email)->first();

        if ($existingUser) {
            $userId = $existingUser['user_id'];
            log_message('debug', "Existing user found: $userId");
        } else {
            log_message('debug', 'No user found. Creating a new user.');

            $userId = $model->insert([
                'email' => $email,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            log_message('debug', "New user created with ID: $userId");

            $user = $model->where('email', $email)->first();

            $ses_data = [
                'user_id' => $user['user_id'],
                'account_type' => 'customer',
                'email' => $user['email'],
                'logged_in' => TRUE
            ];

            session()->set($ses_data);
        }

        // Update cart
        $guestId = $this->request->getCookie('guest_id');
        $cartModel->updateGuestCartToUser($guestId, $userId);

        log_message('debug', "Cart updated from guest_id: $guestId to user_id: $userId");

        session()->set('user_id', $userId);
        return $this->response->setJSON(['status' => true, 'redirect' => base_url('/checkout')]);
    }
















}





















































<script>
    document.addEventListener('DOMContentLoaded', () => {
        const CartHandler2 = {
            // Constants for shipping charges, discount, and partial COD charges
            SHIPPING_THRESHOLD: 1500,  // Threshold for shipping charges
            SHIPPING_CHARGES_BELOW_THRESHOLD: 100,  // Shipping charges if subtotal is below 1500
            DISCOUNT_PERCENTAGE: 0,  // Discount percentage (you can update this later)
            GST_RATE: 0.12,  // GST (12%)
            PARTIAL_COD_THRESHOLD: 3000,  // Subtotal threshold for partial COD charges
            PARTIAL_COD_BELOW_THRESHOLD: 150,  // Partial COD charge if subtotal is below 3000
            PARTIAL_COD_ABOVE_THRESHOLD: 300,  // Partial COD charge if subtotal is above 3000

            init: function () {
                this.bindEvents();
                this.calculateTotal();
            },

            bindEvents: function () {
                document.querySelectorAll('.increase').forEach(button => {
                    button.addEventListener('click', this.updateQuantity.bind(this, 1));
                });

                document.querySelectorAll('.decrease').forEach(button => {
                    button.addEventListener('click', this.updateQuantity.bind(this, -1));
                });

                document.querySelectorAll('.cart-table-prd-remove').forEach(button => {
                    button.addEventListener('click', this.removeItem.bind(this));
                });

                const clearCartBtn = document.querySelector('.js-clear-cart');
                if (clearCartBtn) {
                    clearCartBtn.addEventListener('click', this.clearCart.bind(this));
                }

                document.querySelectorAll('input[name="pmode"]').forEach(radio => {
                    radio.addEventListener('change', this.calculateTotal.bind(this));
                });

                const payButton = document.getElementById('payButton');
                if (payButton) {
                    payButton.addEventListener('click', this.placeOrder.bind(this));
                }
            },


            updateQuantity: function (delta, event) {
                const button = event.currentTarget;
                const cartId = button.dataset.cartId;
                const parent = button.closest('.cart-table-prd');
                const input = parent.querySelector('.qty-input');

                if (!input) {
                    console.error(`Error: No input field found for cartId ${cartId}`);
                    return;
                }

                let currentQuantity = parseInt(input.value);
                let incrementValue = parseInt(input.dataset.increment);

                if (isNaN(incrementValue) || incrementValue < 1) {
                    console.warn(`Invalid increment value for cartId ${cartId}, defaulting to 1`);
                    incrementValue = 1; // Fallback if undefined
                }

                console.log(`Cart ID: ${cartId} | Current Quantity: ${currentQuantity} | Increment: ${incrementValue}`);

                if (delta > 0) {
                    currentQuantity += incrementValue;
                } else {
                    if (currentQuantity > incrementValue) {
                        currentQuantity -= incrementValue;
                    }
                }

                const minQuantity = parseInt(input.dataset.min) || incrementValue;
                const maxQuantity = parseInt(input.dataset.max) || 1000;

                if (currentQuantity < minQuantity || currentQuantity > maxQuantity) {
                    console.log(`Quantity update restricted | Min: ${minQuantity}, Max: ${maxQuantity}`);
                    return;
                }

                console.log(`New quantity set: ${currentQuantity}`);
                input.value = currentQuantity;

                // Update cart on server
                this.updateServerQuantity(cartId, currentQuantity, parent);
            },


            updateServerQuantity: function (cartId, quantity, parent) {
                console.log(`Sending update to server | Cart ID: ${cartId}, Quantity: ${quantity}`);

                fetch(`<?= base_url('cart/update_quantity/') ?>${cartId}`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ quantity }),
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status) {
                            const totalPrice = parent.querySelector('.cart-table-prd-price-total');
                            const sellingPrice = parseFloat(parent.querySelector('.price-new').innerText.replace('₹', ''));

                            totalPrice.innerText = `₹${(quantity * sellingPrice).toFixed(2)}`;
                            this.calculateTotal();
                        } else {
                            alert(data.message || 'Failed to update quantity');
                        }
                    })
                    .catch(error => console.error("Error updating cart:", error));
            },

            removeItem: function (event) {
                event.preventDefault();
                const button = event.currentTarget;
                const cartId = button.dataset.cartId;
                const parent = button.closest('.cart-table-prd');

                fetch(`<?= base_url('cart/remove/') ?>${cartId}`, { method: 'POST' })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status) {
                            parent.remove();
                            this.calculateTotal();
                        } else {
                            alert(data.message || 'Failed to remove item');
                        }
                    })
                    .catch(console.error);
            },

            clearCart: function () {
                fetch(`<?= base_url('cart/clear') ?>`, { method: 'POST' })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status) {
                            document.querySelectorAll('.cart-table-prd').forEach(item => item.remove());
                            this.calculateTotal();
                        } else {
                            alert(data.message || 'Failed to clear cart');
                        }
                    })
                    .catch(console.error);
            },

            calculateTotal: function () {
                let subtotal = 0;
                document.querySelectorAll('.cart-table-prd-price-total').forEach(el => {
                    subtotal += parseFloat(el.innerText.replace('₹', ''));
                });

                let shippingCharges = subtotal < this.SHIPPING_THRESHOLD ? this.SHIPPING_CHARGES_BELOW_THRESHOLD : 0;
                let gst = subtotal * this.GST_RATE;
                let partialCodCharges = 0;

                if (document.querySelector('input[name="pmode"]:checked').value === 'partial_cod') {
                    partialCodCharges = subtotal < this.PARTIAL_COD_THRESHOLD ? this.PARTIAL_COD_BELOW_THRESHOLD : this.PARTIAL_COD_ABOVE_THRESHOLD;
                }

                let discount = (subtotal * this.DISCOUNT_PERCENTAGE) / 100;
                let totalAmount = subtotal + shippingCharges + partialCodCharges - discount;

                document.getElementById('cart-total').innerText = totalAmount.toFixed(2);
                document.getElementById('shipping-charges').innerText = shippingCharges.toFixed(2);
                document.getElementById('gst-total').innerText = gst.toFixed(2);
                document.getElementById('partial-cod-charges').innerText = partialCodCharges.toFixed(2);
                document.getElementById('discount-amount').innerText = discount.toFixed(2);

                this.totalAmount = totalAmount;
                this.shippingCharges = shippingCharges;
                this.gst = gst;
                this.partialCodCharges = partialCodCharges;
                this.discount = discount;
            },

            placeOrder: function () {
                console.log('Starting order placement process...');

                const paymentMode = document.querySelector('input[name="pmode"]:checked').value;
                const amountToPay = paymentMode === 'partial_cod' ? this.totalAmount * 0.3 : this.totalAmount;
                this.amountToPay = amountToPay;

                const customerDetails = this.validateAndGetCustomerDetails();
                if (!customerDetails.isValid) {
                    alert(customerDetails.error);
                    return;
                }

                const options = {
                    key: 'rzp_test_HNDDo4TA783qRj',
                    amount: amountToPay * 100,
                    currency: "INR",
                    name: "Spotzsaaga Enterprises",
                    description: "Order Payment",
                    handler: (response) => {
                        this.saveOrder(response.razorpay_payment_id, paymentMode, customerDetails.data, amountToPay);
                    }
                };

                try {
                    const razorpay = new Razorpay(options);
                    razorpay.open();
                } catch (error) {
                    alert('Failed to initialize payment. Please try again.');
                }
            }
        };

        CartHandler2.init();
    });

</script>



































<!-- Head Start -->
<?= $this->include('head_view'); ?>
<!-- Head End -->

<body class="has-smround-btns has-loader-bg equal-height">

	<!--header-->
	<?= $this->include('header_view'); ?>
	<!--header end-->

	<!--header Side Panel-->
	<?= $this->include('header_side_panel_view'); ?>
	<!--header Side Panel end-->

	<!--//header-->
	<div class="page-content">
		<div class="holder breadcrumbs-wrap mt-0">
			<div class="container">
				<ul class="breadcrumbs">
					<li><a href="<?= base_url() ?>">Home</a></li>
					<li><span>Cart</span></li>
				</ul>
			</div>
		</div>
		<div class="holder">
			<div class="container">
				<div class="page-title text-center">
					<h1><?= $cart_page['cart_title'] ?></h1>
				</div>
				<div class="row">
					<div class="col-lg-11 col-xl-13">
						<?php if (!empty($head['cart']) && is_array($head['cart'])): ?>
							<div class="cart-table">
								<div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
									<div class="cart-table-prd-image text-center">Image</div>
									<div class="cart-table-prd-content-wrap">
										<div class="cart-table-prd-info">Name</div>
										<div class="cart-table-prd-qty">Qty</div>
										<div class="cart-table-prd-price">Price</div>
										<div class="cart-table-prd-action">&nbsp;</div>
									</div>
								</div>

								<?php foreach ($head['cart'] as $item): ?>
									<div class="cart-table-prd" data-cart-id="<?= $item['cart_id'] ?>">
										<div class="cart-table-prd-image">
											<a href="<?= base_url('product/') . $item['url'] ?? '#' ?>" class="prd-img">
												<img class="lazyload fade-up" src="<?= $item['product_image'] ?>"
													data-src="<?= $item['product_image'] ?>" alt="">
											</a>
										</div>
										<div class="cart-table-prd-content-wrap">
											<div class="cart-table-prd-info">
												<div class="cart-table-prd-price">
													<div class="price-old">₹<?= $item['cost_price'] ?></div>
													<div class="price-new">₹<?= $item['selling_price'] ?></div>
												</div>
												<h2 class="cart-table-prd-name"><a
														href="<?= base_url('product/') . $item['url'] ?? '#' ?>"><?= $item['product_title'] ?></a>
												</h2>
											</div>
											<div class="cart-table-prd-qty">
												<div class="qty qty-changer">
													<button class="decrease" data-cart-id="<?= $item['cart_id'] ?>">-</button>
													<input type="text" class="qty-input" value="<?= $item['quantity'] ?>"
														data-min="1" data-max="1000"
														data-increment="<?= $item['increment_value'] ?>" readonly>


													<button class="increase" data-cart-id="<?= $item['cart_id'] ?>">+</button>

												</div>
											</div>
											<div class="cart-table-prd-price-total">
												₹<?= ($item['quantity'] * $item['selling_price']) ?>
											</div>
										</div>
										<div class="cart-table-prd-action">
											<a href="#" class="cart-table-prd-remove" data-cart-id="<?= $item['cart_id'] ?>"
												data-tooltip="Remove Product">
												<i class="icon-recycle"></i>
											</a>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="text-center mt-1">
								<a href="#" class="btn btn--grey js-clear-cart">Clear All</a>
							</div>
						<?php else: ?>
							<div class="minicart-empty js-minicart-empty">
								<div class="minicart-empty-text">Your cart is empty</div>
								<div class="minicart-empty-icon">
									<i class="icon-shopping-bag"></i>
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
										viewBox="0 0 306 262" style="enable-background:new 0 0 306 262;"
										xml:space="preserve">
										<path class="st0"
											d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z" />
									</svg>
								</div>
							</div>
						<?php endif; ?>





						<div class="d-none d-lg-block">
							<div class="mt-4"></div>
							<div class="holder">
								<div class="container">
									<div class="title-wrap text-center">
										<h2 class="h1-style"><?= $cart_page['more_title'] ?></h2>
										<div class="carousel-arrows carousel-arrows--center"></div>
									</div>
									<div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
										data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>



										<?php foreach ($cm_products as $product): ?>
											<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
												<div class="prd-inside">
													<div class="prd-img-area">
														<a href="<?= base_url('product/') . $product['url'] ?? '#' ?>"
															class="prd-img image-hover-scale image-container">
															<img src="<?= $product['product_image'] ?>"
																data-src="<?= $product['product_image'] ?>"
																alt="<?= $product['product_title'] ?>"
																class="js-prd-img lazyload fade-up">
															<div class="foxic-loader"></div>
															<div class="prd-big-squared-labels">


																<div class="label-sale"><span>-10% <span
																			class="sale-text">Sale</span></span>

																	<div class="countdown-circle">
																		<div class="countdown js-countdown"
																			data-countdown="2021/07/01"></div>
																	</div>

																</div>


															</div>
														</a>
														<div class="prd-circle-labels">
															<a href="#"
																class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
																title="Add To Wishlist"><i
																	class="icon-heart-stroke"></i></a><a href="#"
																class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
																title="Remove From Wishlist"><i
																	class="icon-heart-hover"></i></a>
															<a href="#"
																class="circle-label-qview js-prd-quickview prd-hide-mobile"
																data-src="ajax/ajax-quickview.html"><i
																	class="icon-eye"></i><span>QUICK VIEW</span></a>

														</div>

														<ul class="list-options color-swatch">
															<li data-image="<?= $product['other_image_1'] ?? '' ?>"
																class="active"><a href="#" class="js-color-toggle"
																	data-toggle="tooltip" data-placement="right"
																	title="Color Name"><img
																		src="<?= $product['other_image_1'] ?? '' ?>"
																		data-src="<?= $product['other_image_1'] ?? '' ?>"
																		class="lazyload fade-up" alt="Color Name"></a></li>

															<li data-image="<?= $product['other_image_2'] ?? '' ?>">
																<a href="#" class="js-color-toggle" data-toggle="tooltip"
																	data-placement="right" title="Color Name"><img
																		src="<?= $product['other_image_2'] ?? '' ?>"
																		data-src="<?= $product['other_image_2'] ?? '' ?>"
																		class="lazyload fade-up" alt="Color Name"></a>
															</li>


															<li data-image="<?= $product['other_image_3'] ?? '' ?>">
																<a href="#" class="js-color-toggle" data-toggle="tooltip"
																	data-placement="right" title="Color Name"><img
																		src="<?= $product['other_image_3'] ?? '' ?>"
																		data-src="<?= $product['other_image_3'] ?? '' ?>"
																		class="lazyload fade-up" alt="Color Name"></a>
															</li>



														</ul>

													</div>
													<div class="prd-info">
														<div class="prd-info-wrap">
															<!--
															<div class="prd-info-top">
																<div class="prd-rating"><i
																		class="icon-star-fill fill"></i><i
																		class="icon-star-fill fill"></i><i
																		class="icon-star-fill fill"></i><i
																		class="icon-star-fill fill"></i><i
																		class="icon-star-fill fill"></i></div>
															</div>
															<div class="prd-rating justify-content-center"><i
																	class="icon-star-fill fill"></i><i
																	class="icon-star-fill fill"></i><i
																	class="icon-star-fill fill"></i><i
																	class="icon-star-fill fill"></i><i
																	class="icon-star-fill fill"></i></div>
															<div class="prd-tag"><a href="#">FOXic</a></div>
															-->
															<h2 class="prd-title"><a
																	href="<?= base_url('product/') . $product['url'] ?? '#' ?>"><?= $product['product_title'] ?></a>
															</h2>
															<div class="prd-description">
																<?= $product['product_description'] ?>
															</div>
															<div class="prd-action">
																<form
																	action="<?= base_url('cart/add/') . $product['product_id'] ?>">
																	<button type="submit" class="btn js-prd-addtocart"
																		data-product='{"name": "<?= $product['product_title'] ?>", "path":"<?= $product['product_image'] ?>", "url":"<?= base_url('product/') . $product['url'] ?>", "aspect_ratio":0.778}'>Add
																		To Cart</button>
																</form>
															</div>
														</div>
														<div class="prd-hovers">
															<div class="prd-circle-labels">
																<div><a href="#"
																		class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
																		title="Add To Wishlist"><i
																			class="icon-heart-stroke"></i></a><a href="#"
																		class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
																		title="Remove From Wishlist"><i
																			class="icon-heart-hover"></i></a></div>
																<div class="prd-hide-mobile"><a href="#"
																		class="circle-label-qview js-prd-quickview"
																		data-src="ajax/ajax-quickview.html"><i
																			class="icon-eye"></i><span>QUICK VIEW</span></a>
																</div>
															</div>
															<div class="prd-price">
																<div class="price-old"> ₹<?= $product['selling_price'] ?>
																</div>
																<div class="price-new"> ₹<?= $product['cost_price'] ?></div>
															</div>
															<div class="prd-action">
																<div class="prd-action-left">
																	<div class="prd-action-left">
																		<form
																			action="<?= base_url('cart/add/') . $product['product_id'] ?>">
																			<button type="submit"
																				class="btn js-prd-addtocart"
																				data-product='{"name": "<?= $product['product_title'] ?>", "path":"<?= $product['product_image'] ?>", "url":"<?= base_url('product/') . $product['url'] ?>", "aspect_ratio":0.778}'>Add
																				To Cart</button>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-xl-5 mt-3 mt-md-0">
						<div <?= 'style=" background: url(' . $cart_page['offer_bg'] . '); background-size: cover; background-position: center; "' ?> class="cart-promo-banner">
							<div class="cart-promo-banner-inside">
								<div class="txt1"><?= $cart_page['offer_title'] ?></div>
								<div class="txt2"><?= $cart_page['offer_subtitle'] ?></div>
							</div>
						</div>
						<div class="card-total">
							<div class="text-right">
								<a href="<?= base_url('cart') ?>" class="btn btn--grey"><span>UPDATE CART</span><i
										class="icon-refresh"></i></a>
							</div>
							<div class="row d-flex">
								<div class="col card-total-txt">Total</div>
								<div class="col-auto card-total-price text-right">₹<span
										id="cart-total"><?= number_format($head['cart_total'], 2) ?></span></div>
							</div>
							<a href="<?= base_url('checkout') ?>"
								class="btn btn--full btn--lg"><span>Checkout</span></a>
							<div class="card-text-info text-right">
								<h5><?= $cart_page['shipping_title'] ?></h5>
								<p><b><?= $cart_page['shipping_subtitle'] ?></b><br><?= $cart_page['shipping_description'] ?>
								</p>
							</div>
						</div>
						<div class="mt-2"></div>
						<div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">
							<!--
							<div class="panel">
								<div class="panel-heading active">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#productAccordion"
											href="#collapse1">Shipping options</a>
										<span class="toggle-arrow"><span></span><span></span></span>
									</h4>
								</div>
								<div id="collapse1" class="panel-collapse collapse show">
									<div class="panel-body">
										<label>Country:</label>
										<div class="form-group select-wrapper select-wrapper-sm">
											<select class="form-control form-control--sm">
												<option value="United States">United States</option>
												<option value="Canada">Canada</option>
												<option value="China">China</option>
												<option value="India">India</option>
												<option value="Italy">Italy</option>
												<option value="Mexico">Mexico</option>
											</select>
										</div>
										<label>State:</label>
										<div class="form-group select-wrapper select-wrapper-sm">
											<select class="form-control form-control--sm">
												<option value="AL">Alabama</option>
												<option value="AK">Alaska</option>
												<option value="AZ">Arizona</option>
												<option value="AR">Arkansas</option>
												<option value="CA">California</option>
												<option value="CO">Colorado</option>
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="DC">District Of Columbia</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="HI">Hawaii</option>
												<option value="ID">Idaho</option>
												<option value="IL">Illinois</option>
												<option value="IN">Indiana</option>
												<option value="IA">Iowa</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
											</select>
										</div>
										<label>Zip/Postal code:</label>
										<div class="form-group">
											<input type="text" class="form-control form-control--sm">
										</div>
									</div>
								</div>
							</div>
							-->
							<div class="panel">
								<div class="panel-heading active">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#productAccordion"
											href="#collapse2">Discount Code</a>
										<span class="toggle-arrow"><span></span><span></span></span>
									</h4>
								</div>
								<div id="collapse2" class="panel-collapse collapse show">
									<div class="panel-body">
										<p><?= $cart_page['discount_info'] ?></p>
										<div class="form-inline mt-2">
											<input type="text" class="form-control form-control--sm"
												placeholder="Promotion/Discount Code">
											<button type="submit" class="btn">Apply</button>
										</div>
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-heading active">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#productAccordion" href="#collapse3">Note
											for the seller</a>
										<span class="toggle-arrow"><span></span><span></span></span>
									</h4>
								</div>
								<div id="collapse3" class="panel-collapse collapse show">
									<div class="panel-body">
										<textarea class="form-control form-control--sm textarea--height-100"
											placeholder="Text here"></textarea>
										<div class="card-text-info mt-2">
											<p><?= $cart_page['note_info'] ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?= $this->include('footer_view'); ?>
	<!-- Footer End -->

	<!-- Footer -->
	<?= $this->include('footer_sticky_view'); ?>
	<!-- Footer End -->

	<!-- Purchased Toast Notifi -->
	<?= $this->include('recent_buy_toast'); ?>
	<!-- Purchased Toast Notifi End -->

	<!-- Email Subscribe Modal-->
	<?= $this->include('email_modal'); ?>
	<!-- Email Subscribe Modal End -->

	<!-- Script Start -->
	<?= $this->include('script_view'); ?>
	<!-- Script End -->

</body>

</html>