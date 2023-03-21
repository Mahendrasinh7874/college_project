<?php
include 'admin/config.php';
session_start();

if (!empty($_SESSION['u_id'])) {
    $product_id = $_GET['product_id'];
    $u_id = $_SESSION['u_id'];

    $check = "select * from cart where u_id='$u_id' and  product_id='$product_id'";

    $check_result = mysqli_query($conn, $check) or die(mysqli_error($conn));


    foreach ($check_result as $row) {
        $qty = !empty($_GET['isminus']) && $_GET['isminus']  ? $row['qty'] - 1 : $row['qty'] + 1;
    }
    if (mysqli_num_rows($check_result) > 0) {
        // $_SESSION['exits_cart'] = 'exits';

        $sql1 =  "UPDATE cart SET qty = '$qty' WHERE u_id='$u_id' and  product_id='$product_id'";
        $check_result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

        $check1 = "SELECT SUM(qty) AS TotalItemsOrdered FROM cart where u_id='$u_id'";
        $check_result2 = mysqli_query($conn, $check1) or die(mysqli_error($conn));
        foreach ($check_result2 as $row1) {
            //print_r($row1);
            $qty = $row1['TotalItemsOrdered'];
        }
        echo $qty;
        // header("location:http://localhost/college_project/");
    } else {
        $sql = "INSERT INTO cart (u_id,product_id,qty) values ('$u_id','$product_id',1)";

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $_SESSION['success_cart'] = 'success';
        echo true;
        //header("location:http://localhost/college_project/");
    }
} else {
    $_SESSION['not_login'] = 'not_login';
    // echo 'false';
    header("location:http://localhost/college_project/");
}
