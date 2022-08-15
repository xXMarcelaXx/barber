<?php 
session_start();
include "../data/conxion.php";
if(!empty($_POST)){
$q1 = $con->query("INSERT INTO cart(client_email,created_at) value(\"$_POST[email]\",NOW())");
if($q1){
$cart_id = $con->insert_id;
foreach($_SESSION["cart"] as $c){
$q1 = $con->query("INSERT into cart_product(product_id,q,cart_id) value($c[product_id],$c[q],$cart_id)");
}
unset($_SESSION["cart"]);
}
}
print "<script>alert('Venta procesada exitosamente');window.location='../products.php';</script>";
?>