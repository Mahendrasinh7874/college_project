<?php
include 'admin/config.php';
session_start();

if (!empty($_SESSION['u_id'])) {
    $product_id = $_GET['product_id'];
    $u_id = $_SESSION['u_id'];

    $check = "select * from cart where u_id='$u_id' and  product_id='$product_id'";

    $check_result = mysqli_query($conn, $check) or die(mysqli_error($conn));

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['exits_cart'] = 'exits';
        header("location:http://localhost/college_project/");
    } else {
        $sql = "INSERT INTO cart (u_id,product_id) values ('$u_id','$product_id')";

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $_SESSION['success_cart'] = 'success';
        header("location:http://localhost/college_project/");
    }
} else {
    $_SESSION['not_login'] = 'not_login';
    header("location:http://localhost/college_project/");
}