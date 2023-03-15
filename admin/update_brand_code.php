<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand_id = $_GET['brand_id'];
    $update_cate_id = $_POST['update_cate_id'];
    $update_brand_title = $_POST['update_brand_title'];

    $sql = "UPDATE brands SET cate_id='$update_cate_id', brand_title='$update_brand_title' WHERE brand_id='$brand_id'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    print_r($result);
    if ($result) {
        header("location: brand_index.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
