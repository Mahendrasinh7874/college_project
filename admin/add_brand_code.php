<?php 
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand_title = $_POST['brand_title']; 
    $cate_id = $_POST['cate_id'];

    $sql = "INSERT INTO brands (cate_id,brand_title) values ('$cate_id','$brand_title')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    print_r($result);

    if ($result) {
        header('Location: brand_index.php');
    } else {
        echo '<h1 class="text-center"> 404 Not Found </h1>';
    }
}

?>