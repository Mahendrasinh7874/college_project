<?php

// include 'config.php';
// session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /*   file include code   */
    if (isset($_FILES['image'])) {
        $error = array();
        $image = $_FILES['image'];
        // print_r($image);
        $image_name = $image['name'];
        $image_type = $image['type'];
        $image_tmp_name = $image['tmp_name'];
        $image_size = $image['size'];
        //$image_ext = strtolower(end(explode('.', $image_name)));
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $extensions = array("jpeg", "jpg", "png");

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
    /*   file include code end    */
    // print_r($_POST);
    $product_category_id = $_POST['cate_id'];
    $product_brand_id = $_POST['brand'];
    $product_title = $_POST['product_title'];
    $price = $_POST['price'];
    $product_description = $_POST['product_description'];
    $qty = $_POST['qty'];


    $sql = "INSERT INTO product(product_category_id,product_brand_id,product_title,price,product_description,image,qty) 
            values ('$product_category_id','$product_brand_id','$product_title','$price','$product_description','$image_name','$qty')";


    $conn =  mysqli_connect("localhost", "root", "", "college-project")
        or die(mysqli_connect_error());

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        // header("location:http://localhost/e-commerce/admin/product_index.php");
        header('Location: products_index.php');
    } else {
        echo '<h1 class="text-center"> 404 Not Found </h1>';
    }
}
