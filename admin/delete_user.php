<?php

include 'config.php';
$user_id = $_GET['u_id'];

//$conn = $conn = mysqli_connect("localhost", "root", "", "cms") or die(mysqli_connect_error());

$sql = "delete from users where u_id='{$user_id}'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
    header("location: user.php");
}
