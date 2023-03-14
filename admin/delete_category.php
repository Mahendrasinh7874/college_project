<?php

include 'config.php';
$cate_id = $_GET['cate_id'];

//$conn = $conn = mysqli_connect("localhost", "root", "", "cms") or die(mysqli_connect_error());

$sql = "delete from category where cate_id='{$cate_id}'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
    header("location: category_index.php");
}
