<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO category (category_name) values ('$category_name')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        header('Location: category_index.php');
    } else {
        echo '<h1 class="text-center"> 404 Not Found </h1>';
    }
}


?>