<?php
include './admin/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "Select * from users where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['u_id'] = $row['u_id'];
            $_SESSION['username'] = $row['first_name'] . " " . $row['last_name'];
            $_SESSION['email'] = $row['email'];
           
        }
        header('Location:index.php');
    } else {
        echo 'else';
        $_SESSION['loginError'] =  '<h6 class="my-3 text-danger font-bold" style="text-align:center;">  Please Enter Valid Username Or Password!</h6>';
        header('Location:login.php');
    }
}
