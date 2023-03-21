<?php
include 'admin/config.php';
session_start();
if (!empty($_SESSION['u_id'])) {
    $product_id = $_GET['product_id'];
    $u_id = $_SESSION['u_id'];

    $check = "select * from wishlist where u_id='$u_id' and product_id='$product_id'";
    $sql = "select * from wishlist
              LEFT JOIN product on product.product_id = wishlist.product_id
              LEFT JOIN category on product.product_category_id = category.cate_id 
              LEFT JOIN brands on brands.brand_id = product.product_brand_id       
              WHERE wishlist.u_id = $u_id";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $check_result = mysqli_query($conn, $check) or die(mysqli_error($conn));

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['already_wishlist'] = 'already-cart';
        header("location:http://localhost/college_project/");
    } else {
        $sql = "INSERT INTO wishlist (u_id,product_id) values ('$u_id','$product_id')";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $_SESSION['success_wishlist'] = 'success';
        $_SESSION['wishlist_product'] = 'wish';

        header("location:http://localhost/college_project/");
    }
} else {
    $_SESSION['not_login'] = 'not_login';
    header("location:http://localhost/college_project/");
}
