<?php
require_once('config.php');


$itemsum=0;
$itemcount=0;
if(isset($_GET['itemid'])){
    addtocart($_GET['itemid']);
    header('Location: checkout.php');
    exit();
}
function addtocart($id){
    if(isset(($_SESSION['prod'.$id]))){
        $_SESSION['prod'.$id]+=1;

    }else{
         $_SESSION['prod'. $id]=1;
    }
}


   function checkoutfield(){
     foreach($_SESSION as $key => $value){

if (substr($key,0,4) == 'prod'){
    $itemid=substr($key,4);
    $res=query("select * from product where prod_id=$itemid");
    $product=mysqli_fetch_array($res);
    $totalitem=$product['prod_price'] * $value;
    global $itemsum;
    $itemsum+= $totalitem;
    global $itemcount;
    $itemcount+=$value;
    $row = <<<DELIMETER
    <div class="cart-item">
   
<div class="cart-item-img">
    <img src="$product[prod_img]" alt="Organic Apples">
</div>

<div class="flex-grow-1">
    <div class="cart-item-name">$product[prod_name]</div>
    <div class="cart-item-cat"></div>

    <div class="qty-control mt-2">
        <button class="qty-btn" >−</button>
        <input class="qty-input" type="number" value="$value" >
       <button class="qty-btn" >+</button> 
    </div>
</div>

<div class="text-end d-flex flex-column align-items-end gap-2">
    <span class="cart-item-price">$$totalitem</span>
    <button class="btn-remove" ><i class="fa fa-times"></i></button> 
</div>
</div>

DELIMETER;
echo $row;
}
}
   }
?>