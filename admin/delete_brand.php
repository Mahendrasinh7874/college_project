<?php

include 'config.php';
$brand_id = $_GET['brand_id'];

//$conn = $conn = mysqli_connect("localhost", "root", "", "cms") or die(mysqli_connect_error());

$sql = "delete from brands where brand_id='{$brand_id}'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
    header("location: brand_index.php");
}
