<?php

include 'config.php';


if (isset($_POST['search'])) {

    $exists_sql = "select * from users where email='{$_POST['search']}'";

    $exists_result = mysqli_query($conn, $exists_sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($exists_result) > 0) {
        echo '<p class="text-danger"> This Email Id is already Taken.</p>';
    }
}
if (isset($_POST['search'])) {

    $exists_sql = "select * from users where mobile_no='{$_POST['search']}'";

    $exists_result = mysqli_query($conn, $exists_sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($exists_result) > 0) {
        echo '<p class="text-danger"> This Mobile Number is already Taken.</p>';
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_GET['u_id'];
    $update_first_name = $_POST['update_first_name'];
    $update_last_name = $_POST['update_last_name'];
    $update_gender = $_POST['update_gender'];
    $update_password = $_POST['update_password'];
    $update_email = $_POST['update_email'];
    $update_mobile_no = $_POST['update_mobile_no'];
    $update_address = $_POST['update_address'];
    $update_date_of_birth = $_POST['update_date_of_birth'];

    $exists_sql = "select * from users where email='{$_POST['email']}'";

    $exists_result = mysqli_query($conn, $exists_sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($exists_result) > 0) {
        session_start();
        $_SESSION["email_taken"] = 'email_taken';
        header("location: update_user.php");
    }

    $exists_sql = "select * from users where mobile_no='{$_POST['mobile_no']}'";

    $exists_result = mysqli_query($conn, $exists_sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($exists_result) > 0) {
        session_start();
        $_SESSION["mobile_taken"] = 'mobile_taken';
        header("location: update_user.php");
    }

    $sql = "update users set first_name='{$update_first_name}',last_name='{$update_last_name}',email='{$update_email}',gender='{$update_gender}',password='{$update_password}',mobile_no='{$update_mobile_no}',address='{$update_address}', date_of_birth='{$update_date_of_birth}' where u_id='{$user_id}'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        header("location: user.php");
    } else {
        echo '<h3 class="text-danger">Something went wrong please try again latter</h3>';
    }
}
?>