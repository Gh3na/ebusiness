<?php include_once('config.php');
include('cart.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include('head.php');
 ?>

<link href="css/checkout-style.css" rel="stylesheet">

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
    <?php if(isset($_GET['print'])){
        print_r($_SESSION);
    }
    ?>
        <div class="row g-4">

            <!-- LEFT COLUMN -->
            <!-- Cart Items -->
             <div class="col-lg-7">
<div class="card-clean">
    <h5><i class="fa fa-shopping-bag"></i> Your Cart</h5>
<?php checkoutfield(); ?>
    
</div>
</div>
            <!-- END LEFT -->

            <!-- RIGHT COLUMN: Order Summary -->
            <div class="col-lg-5">
                <div class="sticky-summary">
                    <div class="card-clean">
                        <h5><i class="fa fa-receipt"></i> Order Summary</h5>

                        <!-- Mini cart preview -->
                         <div class="summary-row">
                            <span class="label">Items </span>
                            <span class="value"><?php echo $itemcount?> </span>
                        </div>
                        <div class="summary-row">
                            <span class="label">Subtotal </span>
                            <span class="value">$<?php echo $itemsum?> </span>
                        </div>
                          
                       
                      
                      
                        <div class="summary-row">
                            <span class="label">Tax (8%)</span>
                            <span class="value" id="tax-display"> <?=0.08 * $itemsum?></span>
                        </div>
                       
                        
 <div class="summary-row">
                            <span class="label">Total Price </span>
                            <span class="value" id="tax-display"> <?= 1.08 * $itemsum?></span>
                        </div>
                       
                 
                       

                        <!-- Place Order Button -->
                        <button type="submit" form="checkoutForm" class="btn-checkout mt-3"
                            >
                            
                            Place Order 
                        </button>

               
                        

                    <!-- What's in your box summary -->
                    

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

   
    </script>
</body>
</html>