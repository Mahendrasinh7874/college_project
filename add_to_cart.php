<?php
include 'admin/config.php';
session_start();

if (!empty($_SESSION['user_id'])) {
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['user_id'];

    $check = "select * from product_cart where user_id='$user_id' and  product_id='$product_id'";

    $check_result = mysqli_query($conn, $check) or die(mysqli_error($conn));

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['exits'] = 'exits';
        header("location:http://localhost/e-commerce/");
    } else {
        $sql = "INSERT INTO product_cart(user_id,product_id) values ('$user_id','$product_id')";

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $_SESSION['success'] = 'success';
        header("location:http://localhost/e-commerce/");
    }
} else {
    $_SESSION['not_login'] = 'not_login';
    header("location:http://localhost/e-commerce/");
}
