<?php

include 'config.php';




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cate_id = $_GET['cate_id'];
    $update_category_name = $_POST['update_category_name'];

    // $sql = "UPDATE `category` SET `category_name` = '{$update_category_name}' WHERE `cate_id` = '{$cate_id}'";;
    $sql = "update category set category_name='{$update_category_name}' where cate_id='{$cate_id}'";
    

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        header("location: category_index.php");
    } else {
        echo '<h3 class="text-danger">Something went wrong please try again latter</h3>';
    }
}

