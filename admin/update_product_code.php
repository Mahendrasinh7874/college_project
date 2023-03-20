<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_FILES['image']['name'])) {
        $image_name = $_POST['update_image'];
        print_r($image_name);
    } else {
        if (isset($_FILES['image'])) {
            $error = array();
            $image = $_FILES['image'];

            $image_name = $image['name'];
            $image_type = $image['type'];
            $image_tmp_name = $image['tmp_name'];
            $image_size = $image['size'];
            //$image_ext = strtolower(end(explode('.', $image_name)));
            $ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png", "jfif");

            if (in_array($ext, $extensions) === false) {
                $error[] = "This file is not allowed, Please select jpg or png file";
            }

            if ($image_size > 2097152) {
                $error[] = "The file size must be 2mb or lower";
            }
            if (empty($error) == true) {
                move_uploaded_file($image_tmp_name, "uploads/" . $image_name);
            } else {
                print_r($error);
                die();
            }
        }
    }

    $product_id = $_GET['product_id'];
    $update_cate_id = $_POST['update_cate_id'];

    $update_product_title = $_POST['update_product_title'];
    $update_qty = $_POST['update_qty'];
    $update_product_description = $_POST['update_product_description'];
    // $update_image = $_POST['update_image'];
    $update_price = $_POST['update_price'];
    $update_brand_id = $_POST['update_brand_id'];

    // $sql = "UPDATE product SET cate_id='$update_cate_id', brand_title='$update_brand_title' WHERE brand_id='$brand_id'";
    $sql  = "UPDATE `product` SET `product_title` = '$update_product_title', `product_description` = '$update_product_description', `price` = '$update_price', `product_category_id` = '$update_cate_id', `product_brand_id` = '$update_brand_id', `qty` = '$update_qty', `image` = '$image_name' WHERE `product`.`product_id` = $product_id";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        header("location: products_index.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
