<?php

include './admin/config.php';
session_start();
$u_id = $_SESSION['u_id'];
if (isset($_POST['submit'])) {
    $product_id = $_POST['product'];
    foreach ($product_id as $key => $value) {
        $insert_product_id = $product_id[$key];

        $sql = "INSERT INTO cart (u_id,product_id) values ('$u_id','$insert_product_id')";

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    $sql = "delete from wishlist where u_id='{$u_id}' and product_id='{$insert_product_id}'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

header('location:http://localhost/college_project/cart_view.php');
