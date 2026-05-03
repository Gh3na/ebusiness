<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=DM+Sans:wght@300;400;500&display=swap');

    :root {
        --green: #3a7d44;
        --green-light: #e8f5ea;
        --green-mid: #c5e8c9;
        --accent: #f4a624;
        --text-dark: #1a2e1c;
        --text-muted: #6b7c6d;
        --border: #d4e8d6;
        --white: #ffffff;
        --bg: #f7fbf7;
        --danger: #d94040;
    }

    body {
        font-family: 'DM Sans', sans-serif;
        background-color: var(--bg);
        color: var(--text-dark);
    }

    h1, h2, h3, h4, h5 {
        font-family: 'Playfair Display', serif;
    }

    /* ── Page Header ── */
    .checkout-header {
        background: linear-gradient(135deg, var(--green) 0%, #2d6235 100%);
        padding: 3rem 0 2rem;
        position: relative;
        overflow: hidden;
    }
    .checkout-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Ccircle cx='30' cy='30' r='20'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .checkout-header h1 { color: var(--white); }
    .checkout-header .breadcrumb-item,
    .checkout-header .breadcrumb-item a { color: rgba(255,255,255,0.75); font-size: 0.875rem; }
    .checkout-header .breadcrumb-item.active { color: var(--white); }
    .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,0.5); }

    /* ── Step Indicator ── */
    .steps-bar {
        background: var(--white);
        border-bottom: 1px solid var(--border);
        padding: 1rem 0;
    }
    .step-item { display: flex; align-items: center; gap: 0.5rem; color: var(--text-muted); font-size: 0.85rem; font-weight: 500; }
    .step-item.active { color: var(--green); }
    .step-item.done { color: var(--green); }
    .step-num {
        width: 28px; height: 28px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        border: 2px solid currentColor; font-size: 0.75rem; font-weight: 700;
        flex-shrink: 0;
    }
    .step-item.active .step-num { background: var(--green); color: white; border-color: var(--green); }
    .step-item.done .step-num { background: var(--green); color: white; border-color: var(--green); }
    .step-divider { flex: 1; height: 2px; background: var(--border); max-width: 60px; }
    .step-divider.done { background: var(--green); }

    /* ── Cards ── */
    .card-clean {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.75rem;
        margin-bottom: 1.5rem;
    }
    .card-clean h5 {
        font-size: 1.15rem;
        color: var(--text-dark);
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid var(--green-light);
        display: flex; align-items: center; gap: 0.5rem;
    }
    .card-clean h5 i { color: var(--green); }

    /* ── Cart Items ── */
    .cart-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid var(--green-light);
    }
    .cart-item:last-child { border-bottom: none; }
    .cart-item-img {
        width: 70px; height: 70px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
        border: 2px solid var(--green-light);
        background: var(--green-light);
        display: flex; align-items: center; justify-content: center;
        overflow: hidden;
    }
    .cart-item-img img { width: 100%; height: 100%; object-fit: cover; }
    .cart-item-img .no-img { font-size: 1.5rem; }
    .cart-item-name { font-weight: 600; font-size: 0.95rem; color: var(--text-dark); }
    .cart-item-cat { font-size: 0.78rem; color: var(--text-muted); margin-top: 2px; }
    .cart-item-price { font-weight: 700; color: var(--green); font-size: 1rem; white-space: nowrap; }

    /* ── Quantity Controls ── */
    .qty-control {
        display: flex; align-items: center; gap: 0;
        border: 1.5px solid var(--border);
        border-radius: 8px;
        overflow: hidden;
        width: fit-content;
    }
    .qty-btn {
        background: var(--green-light);
        border: none;
        width: 30px; height: 30px;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; font-size: 1rem; font-weight: 700; color: var(--green);
        transition: background 0.2s;
    }
    .qty-btn:hover { background: var(--green-mid); }
    .qty-input {
        width: 36px; height: 30px;
        border: none; text-align: center;
        font-family: 'DM Sans', sans-serif;
        font-weight: 600; font-size: 0.9rem;
        color: var(--text-dark);
        background: white;
    }
    .qty-input:focus { outline: none; }

    /* ── Remove Button ── */
    .btn-remove {
        background: none; border: none;
        color: #ccc; cursor: pointer;
        padding: 4px; border-radius: 6px;
        transition: color 0.2s, background 0.2s;
        line-height: 1;
    }
    .btn-remove:hover { color: var(--danger); background: #ffeaea; }

    /* ── Form Inputs ── */
    .form-label {
        font-size: 0.82rem; font-weight: 600;
        color: var(--text-muted); text-transform: uppercase;
        letter-spacing: 0.05em; margin-bottom: 0.4rem;
    }
    .form-control, .form-select {
        border: 1.5px solid var(--border);
        border-radius: 10px;
        padding: 0.65rem 1rem;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.92rem;
        background: var(--white);
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-control:focus, .form-select:focus {
        border-color: var(--green);
        box-shadow: 0 0 0 3px rgba(58,125,68,0.1);
    }
    .input-group .form-control { border-radius: 10px 0 0 10px; }
    .input-group .btn { border-radius: 0 10px 10px 0; }

    /* ── Payment Methods ── */
    .payment-option {
        border: 2px solid var(--border);
        border-radius: 12px; padding: 0.9rem 1rem;
        cursor: pointer; transition: all 0.2s;
        display: flex; align-items: center; gap: 0.75rem;
        margin-bottom: 0.75rem;
    }
    .payment-option:hover { border-color: var(--green); background: var(--green-light); }
    .payment-option input[type="radio"] { accent-color: var(--green); width: 18px; height: 18px; }
    .payment-option .pm-label { font-weight: 600; font-size: 0.92rem; flex: 1; }
    .payment-option .pm-icons i { color: var(--text-muted); font-size: 1.1rem; }
    .payment-option.selected { border-color: var(--green); background: var(--green-light); }

    /* ── Order Summary ── */
    .summary-row {
        display: flex; justify-content: space-between;
        align-items: center; padding: 0.5rem 0;
        font-size: 0.92rem;
    }
    .summary-row.total {
        border-top: 2px solid var(--green-light);
        margin-top: 0.5rem; padding-top: 1rem;
        font-size: 1.15rem; font-weight: 700;
        font-family: 'Playfair Display', serif;
    }
    .summary-row .label { color: var(--text-muted); }
    .summary-row .value { font-weight: 600; }
    .summary-row.total .value { color: var(--green); }
    .badge-free {
        background: var(--green); color: white;
        font-size: 0.7rem; padding: 2px 8px;
        border-radius: 20px; font-weight: 600;
    }

    /* ── Coupon ── */
    .coupon-section { margin-bottom: 1rem; }
    .coupon-toggle {
        color: var(--green); font-size: 0.85rem;
        font-weight: 600; cursor: pointer; text-decoration: none;
        display: inline-flex; align-items: center; gap: 0.3rem;
    }
    .coupon-toggle:hover { color: #2d6235; }

    /* ── CTA Button ── */
    .btn-checkout {
        background: linear-gradient(135deg, var(--green) 0%, #2d6235 100%);
        color: white; border: none;
        border-radius: 12px; padding: 1rem 1.5rem;
        font-family: 'DM Sans', sans-serif;
        font-size: 1rem; font-weight: 700;
        width: 100%; cursor: pointer;
        transition: transform 0.15s, box-shadow 0.2s;
        display: flex; align-items: center; justify-content: center; gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(58,125,68,0.3);
    }
    .btn-checkout:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(58,125,68,0.4);
        color: white;
    }
    .btn-checkout:active { transform: translateY(0); }

    .btn-outline-green {
        border: 2px solid var(--green);
        color: var(--green); background: transparent;
        border-radius: 10px; padding: 0.5rem 1.25rem;
        font-weight: 600; font-size: 0.9rem;
        cursor: pointer; transition: all 0.2s;
    }
    .btn-outline-green:hover { background: var(--green); color: white; }

    /* ── Trust Badges ── */
    .trust-badges { display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 1rem; }
    .trust-badge {
        display: flex; align-items: center; gap: 0.4rem;
        font-size: 0.78rem; color: var(--text-muted); font-weight: 500;
    }
    .trust-badge i { color: var(--green); }

    /* ── Promo Banner ── */
    .promo-banner {
        background: linear-gradient(135deg, #fff8e7, #fff3d4);
        border: 1.5px solid #f4a624;
        border-radius: 12px; padding: 0.75rem 1rem;
        display: flex; align-items: center; gap: 0.6rem;
        font-size: 0.85rem; margin-bottom: 1.5rem;
    }
    .promo-banner i { color: var(--accent); font-size: 1rem; }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .cart-item { flex-wrap: wrap; }
        .cart-item-img { width: 55px; height: 55px; }
    }

    /* ── Sticky Summary ── */
    @media (min-width: 992px) {
        .sticky-summary { position: sticky; top: 1.5rem; }
    }
</style>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <?php include('navbar.php'); ?>
    <!-- Navbar End -->

    <!-- Page Header -->
    <div class="checkout-header">
       <?php include('navbar.php');?>
       
    </div>

   
   
    <!-- Main Content -->
    <div class="container py-5">
    
        <div class="row g-4">

            <!-- LEFT COLUMN -->
            <div class="col-lg-7">

                <!-- Cart Items -->
                <div class="card-clean">
                    <h5><i class="fa fa-shopping-bag"></i> Your Cart
                        <span class="ms-auto badge" style="background:var(--green-light);color:var(--green);font-size:0.75rem;padding:4px 10px;border-radius:20px;font-family:'DM Sans',sans-serif;">
                            <?php
                                $total_items = 0;
                                $cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                                foreach($cart_items as $item) { $total_items += $item['quantity']; }
                                echo $total_items . ' item' . ($total_items != 1 ? 's' : '');
                            ?>
                        </span>
                    </h5>

                    <?php if (!empty($cart_items)): ?>
                        <?php foreach($cart_items as $key => $item): ?>
                        <div class="cart-item">
                            <div class="cart-item-img">
                                <?php if (!empty($item['prod_img'])): ?>
                                    <img src="<?= htmlspecialchars($item['prod_img']) ?>" alt="<?= htmlspecialchars($item['prod_name']) ?>">
                                <?php else: ?>
                                    <span class="no-img">🥦</span>
                                <?php endif; ?>
                            </div>
                            <div class="flex-grow-1">
                                <div class="cart-item-name"><?= htmlspecialchars($item['prod_name']) ?></div>
                                <div class="cart-item-cat"><?= htmlspecialchars($item['cat_name'] ?? 'Organic') ?></div>
                                <div class="mt-2">
                                    <form method="POST" action="update_cart.php" class="d-inline">
                                        <input type="hidden" name="prod_id" value="<?= $item['prod_id'] ?>">
                                        <div class="qty-control">
                                            <button type="submit" name="action" value="decrease" class="qty-btn">−</button>
                                            <input type="text" class="qty-input" value="<?= $item['quantity'] ?>" readonly>
                                            <button type="submit" name="action" value="increase" class="qty-btn">+</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-end gap-2">
                                <div class="cart-item-price">$<?= number_format($item['prod_price'] * $item['quantity'], 2) ?></div>
                                <div style="font-size:0.78rem;color:var(--text-muted);">$<?= number_format($item['prod_price'], 2) ?> each</div>
                                <form method="POST" action="remove_cart.php">
                                    <input type="hidden" name="prod_id" value="<?= $item['prod_id'] ?>">
                                    <button type="submit" class="btn-remove" title="Remove item">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-4">
                            <div style="font-size:3rem;">🛒</div>
                            <p class="text-muted mt-2 mb-3">Your cart is empty</p>
                            <a href="shop.php" class="btn-outline-green">Continue Shopping</a>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($cart_items)): ?>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <a href="shop.php" style="color:var(--green);font-size:0.88rem;font-weight:600;text-decoration:none;">
                            <i class="fa fa-arrow-left me-1"></i> Continue Shopping
                        </a>
                        <form method="POST" action="clear_cart.php">
                            <button type="submit" style="background:none;border:none;color:#ccc;font-size:0.82rem;cursor:pointer;" onclick="return confirm('Clear all items?')">
                                <i class="fa fa-trash me-1"></i>Clear cart
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
            <!-- END LEFT -->

            <!-- RIGHT COLUMN: Order Summary -->
            <div class="col-lg-5">
                <div class="sticky-summary">
                    <div class="card-clean">
                        <h5><i class="fa fa-receipt"></i> Order Summary</h5>

                        <!-- Mini cart preview -->
                        <?php
                            $subtotal = 0;
                            foreach($cart_items as $item) {
                                $subtotal += $item['prod_price'] * $item['quantity'];
                            }
                            $shipping_cost = 0; // default standard
                            $discount = 0;
                            $tax = $subtotal * 0.08;
                            $total = $subtotal + $shipping_cost + $tax - $discount;
                        ?>

                        <div class="summary-row">
                            <span class="label">Subtotal (<?= $total_items ?> items)</span>
                            <span class="value">$<?= number_format($subtotal, 2) ?></span>
                        </div>
                      
                        <div class="summary-row">
                            <span class="label">Tax (8%)</span>
                            <span class="value" id="tax-display">$<?= number_format($tax, 2) ?></span>
                        </div>
                        <?php if ($discount > 0): ?>
                        <div class="summary-row">
                            <span class="label" style="color:var(--green);">Discount</span>
                            <span class="value" style="color:var(--green);">−$<?= number_format($discount, 2) ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span class="value" id="total-display">$<?= number_format($total, 2) ?></span>
                        </div>

                 
                       

                        <!-- Place Order Button -->
                        <button type="submit" form="checkoutForm" class="btn-checkout mt-3"
                            <?= empty($cart_items) ? 'disabled' : '' ?>>
                            
                            Place Order · $<span id="btn-total"><?= number_format($total, 2) ?></span>
                        </button>

               
                        

                    <!-- What's in your box summary -->
                    <?php if (!empty($cart_items)): ?>
                    <div class="card-clean" style="padding:1.25rem;">
                        <h5 style="font-size:0.95rem;" class="mb-3">
                            <i class="fa fa-box-open"></i> In Your Box
                        </h5>
                        <?php foreach($cart_items as $item): ?>
                        <div class="d-flex justify-content-between align-items-center py-1" style="font-size:0.85rem;">
                            <span style="color:var(--text-muted);">
                                <?= htmlspecialchars($item['prod_name']) ?>
                                <span style="font-size:0.78rem;background:var(--green-light);color:var(--green);padding:1px 7px;border-radius:10px;margin-left:4px;">×<?= $item['quantity'] ?></span>
                            </span>
                            <span style="font-weight:600;">$<?= number_format($item['prod_price'] * $item['quantity'], 2) ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    </form><!-- close checkoutForm here -->
                </div>
            </div>
            <!-- END RIGHT -->

        </div>
    </div>

    <!-- Footer Start -->
    <?php include('footer.php'); ?>
    <!-- Footer End -->

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
    // ── Shipping toggle ──
    let shippingCost = 0;
    const subtotal = <?= $subtotal ?>;
    const tax = <?= $tax ?>;

    function updateShipping(cost) {
        shippingCost = cost;
        const newTotal = subtotal + cost + tax;
        document.getElementById('total-display').textContent = newTotal.toFixed(2);
        document.getElementById('btn-total').textContent = newTotal.toFixed(2);
        const shippingEl = document.getElementById('shipping-display');
        if (cost === 0) {
            shippingEl.innerHTML = '<span class="badge-free">FREE</span>';
        } else {
            shippingEl.innerHTML = '<span class="value">$' + cost.toFixed(2) + '</span>';
        }
    }

    // ── Card number formatting ──
    document.getElementById('cardNum')?.addEventListener('input', function(e) {
        let v = e.target.value.replace(/\D/g, '').substring(0, 16);
        e.target.value = v.replace(/(.{4})/g, '$1 ').trim();
    });

    // ── Payment method toggle ──
    document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.payment-option').forEach(el => el.classList.remove('selected'));
            this.closest('.payment-option').classList.add('selected');
            const cardFields = document.getElementById('card-fields');
            if (this.value === 'card') {
                cardFields.style.display = '';
            } else {
                cardFields.style.display = 'none';
            }
        });
    });

    // ── Shipping option highlight ──
    document.querySelectorAll('input[name="shipping"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.payment-option[id^="ship-"]').forEach(el => el.classList.remove('selected'));
            this.closest('.payment-option').classList.add('selected');
        });
    });
    </script>
</body>
</html>