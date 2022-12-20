
 <?php
        if (isset($_POST['submit'])) {
          include 'config.php';
          $email = $_POST['email'];
          $password = $_POST['password'];

          $sql = "Select * from admin where email='$email' AND password='$password'";


          $result = mysqli_query($conn, $sql) or die('Query Failed');

          // $num =mysqli_num_rows($result);
        
          if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
              session_start();
              $_SESSION['email'] = $row['email'];
              // $_SESSION['password'] = $row['password'];
        
              // header('Location : dashboard.php');
            
              header('Location: '.$newURL);

            }
          } else {
            echo '<p style="font-size:15px;color:red;">Please Enter Valid Email and Password!</p>';
          }
        }
        ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/login.css" />


  <title>Login</title>
</head>

<body>
  <div class="login-container">
    <div class="login-box">

      <!-- <form action=?>" method="POST" class="form-input"> -->
      <form method="post" class="form-input" action="dashboard.php">

        <p>Admin Login</p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="input" required placeholder="Email" />
        <label for="password">Password</label>
        <input type="password" required name="password" class="input" id="password" placeholder="Password" />
        <!-- <button type="submit">Login</button> -->
        <input type="submit" id="btn" name="btn" value="Login" />

       
      </form>
    </div>
  </div>
</body>

</html>