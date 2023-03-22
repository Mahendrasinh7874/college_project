<?php

include './admin/config.php';
session_start();
$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product'];

    foreach ($product_id as $key => $value) {

        $insert_product_id = $product_id[$key];
        $sql1 = "SELECT * from cart where u_id=$u_id and product_id=$insert_product_id and qty != 0";
        $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));


       // print_r($result1);
        if (mysqli_num_rows($result1) > 0) {
            // header('location:http://localhost/college_project/cart_view.php');

            // $_SESSION['alreadywish'] = 'wish';
        } else {
            $sql = "INSERT INTO cart (u_id,product_id) values ('$u_id','$insert_product_id')";

            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
    }
    $sql = "delete from wishlist where u_id='{$u_id}' and product_id='{$insert_product_id}'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

// header('location:http://localhost/college_project/cart_view.php');
