<?php

include './common.php';
include './admin/config.php';



$login = false;
$err = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "Select * from users where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num >= 0) {
        $login = true;
        session_start();
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['loggedin'] = true;
            header('Location:index.php');
        }
    } else {
        $err = 'invalid';
    }
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {


//     // Get the email and password from the form
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Validate the input
//     if (empty($email) || empty($password)) {
//         $error = "Please enter your email and password";
//     } else {
//         // Connect to the database
//         $conn = mysqli_connect("localhost", "root", "", "college-project");

//         // Check if the email exists in the database
//         $query = "SELECT * FROM users WHERE email = '$email'";
//         $result = mysqli_query($conn, $query);
//         $user = mysqli_fetch_assoc($result);

//         if (!$user) {
//             $error = "Invalid email or password";
//         } else {
//             // Verify the password
//             if (password_verify($password, $user['password'])) {
//                 // Create a session
//                 $_SESSION['user_id'] = $user['id'];
//                 header("Location: index.php");
//                 exit;
//             } else {
//                 $error = "Invalid email or password";
//             }
//         }

//         // Close the database connection
//         mysqli_close($conn);
//     }
// }
// 


?>


<div class="login-container px-1 px-lg-0">
    <?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong>You are Logged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }
    if ($err) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid credentials !!!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }
    ?>
    <div class="container ">
        <div class="card">
            <div class=" text-center">
                <h2 class=" letter-spacing-1 font-weight-bold my-4 mb-5">Login</h2>
            </div>
            <!-- <form class="px-5" ac> -->
            <form class="px-5" method="post" action="login.php">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input required type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            <div class="text-center mt-0 ">

                <p><a href="#">Forgot your password? </a></p>
            </div>
            <div class="text-center mt-3 ">

                <div class="card-footer">

                    <p>Don't have an account? <a href="register.php">Register here</a></p>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

</html>