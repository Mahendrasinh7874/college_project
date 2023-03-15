<?php

include 'config.php';
$product_id = $_GET['product_id'];

//$conn = $conn = mysqli_connect("localhost", "root", "", "cms") or die(mysqli_connect_error());

$sql = "delete from product where product_id='{$product_id}'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
    header("location: products_index.php");
}
