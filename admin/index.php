<?php
session_start();
if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
  echo $_SESSION["email"];
  header("Location: admin_panel.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/login.css" />


  <title>Admin Login</title>
  <style>
    .text-danger {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <div class="login-container">
    <div class="login-box">

      <!-- <form action=?>" method="POST" class="form-input"> -->
      <form method="post" class="form-input" action="adminlog.php">

        <p>Admin Login</p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="input" required placeholder="Email" />
        <label for="password">Password</label>
        <input type="password" required name="password" class="input" id="password" placeholder="Password" />
        <!-- <button type="submit">Login</button> -->
        <input type="submit" id="btn" name="btn" value="Login" />

        <?php

        if (isset($_SESSION['admin_log'])) {
          echo "<h4 class='text-danger'>Please Enter Valid Username and Password.";
          // session_unset();
          // session_destroy();
        }
        ?>

      </form>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>