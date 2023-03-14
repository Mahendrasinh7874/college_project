<?php

include 'config.php';
//$conn = mysqli_connect("localhost", "root", "", "cms");
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $mobile_no = $_POST['mobile_no'];
    $date_of_birth = $_POST['date_of_birth'];
    $password = $_POST['password'];

    $exists_sql = "select * from users where email='{$_POST['email']}'";

    $exists_result = mysqli_query($conn, $exists_sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($exists_result) > 0) {
        session_start();
        $_SESSION["email_taken"] = 'email_taken';
        header("location: add_user.php");
    } else {
        $exists_sql = "select * from users where mobile_no='{$_POST['mobile_no']}'";

        $exists_result = mysqli_query($conn, $exists_sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($exists_result) > 0) {
            session_start();
            $_SESSION["mobile_taken"] = 'mobile_taken';
            header("location: add_user.php");
        } else {
            $sql = "INSERT INTO users (first_name,last_name, email, password, date_of_birth, gender, address, mobile_no) VALUES ('$first_name','$last_name', '$email', '$password', '$date_of_birth', '$gender', '$address', '$mobile_no')";


            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


            header("location: user.php");
        }
    }
}
