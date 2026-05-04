<?php 
include('config.php');

$prod_id = $_GET['prod_id'];
$result = getproductdetail($prod_id);
$product = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $product['prod_name'] ?> - Foody</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?php include('navbar.php'); ?>
<?php include('header.php'); ?>

<div class="container py-5">
    <div class="row g-5">
        <!-- Image -->
        <div class="col-lg-6">
            <img src="<?= $product['prod_img'] ?>" class="img-fluid w-100 rounded" alt="<?= $product['prod_name'] ?>">
        </div>

        <!-- Details -->
        <div class="col-lg-6">
            <h1 class="display-5 mb-3"><?= $product['prod_name'] ?></h1>
            <h3 class="text-primary mb-4">$<?= $product['prod_price'] ?></h3>
            <p class="mb-4"><?= $product['prod_desc'] ?></p>
            <div class="d-flex gap-3">
                <a href="cart.php?itemid=<?=$product['prod_id']?>" class="btn btn-primary rounded-pill py-3 px-5">
                    <i class="fa fa-shopping-bag me-2"></i>Add to Cart
                </a>
                <a href="product.php" class="btn btn-outline-primary rounded-pill py-3 px-5">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>