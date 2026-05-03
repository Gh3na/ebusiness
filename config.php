<?php 
defined('LOCALHOST')?null:define('LOCALHOST','localhost');
defined('USERNAME')?null:define('USERNAME','root');
defined('PASSWORD')?null:define('PASSWORD','');
defined('DBNAME')?null:define('DBNAME','foody');
$conn;
function connect(){
global $conn;
$conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DBNAME)or die("connection failed");
return $conn;
}
function query($q){
    $conn=connect();
    return mysqli_query($conn,$q);
}
function getcategory(){

return query("select * from category");
}
function getproduct(){
    return query("select * from product");
}
function getproductbyid($id){
    if($id== ""||$id==3){
    return query("select * from product");
    }
    else{
            return query("select * from product where cat_id=$id");

    }
}


    ?>