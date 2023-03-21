<?php

include './admin/config.php';


$product_wishlist_id = $_GET['wishlist_id'];


$sql = "delete from wishlist where wishlist_id='{$product_wishlist_id}'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
    header("location:http://localhost/college_project/wishlist_view.php");
}
