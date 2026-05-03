<?php
if (isset($_GET['itemid'])){
    addtocart($_GET['itemid']);
    header('Location:checkout.php?print=1');
}
function addtocart($id){
    if(isset(($_SESSION['prod'.$id]))){
        $_SESSION['prod'.$id]+=1;

    }else{
         $_SESSION['prod' . $id]=1;
    }
}
?>