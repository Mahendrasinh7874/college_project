
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="./css/navbar.css">
    
</head>
<body>
<?php
include 'common/navbar.php';
?>
<div class="student-login container">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12">
            <img src="" />
                <h1 style="color: white ">Student Login</h1>
            </div>
        </div>
    </div>
    <div class="avatar">
        <img src="images/nophoto.png" alt="img" class="avatar">
    </div>
    <div class="row">
        <form action="student_log.php" method="POST"">
            <div class="form-group">
                <input style="width: 300px; border-radius:50px;  background-color: #f7f7f7;"  type="text" class="form-control" required name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input style="width: 300px; border-radius:50px;  background-color: #f7f7f7;" type="password" class="form-control" required name="password" placeholder="Password">
            </div>
            <div class="form-group ">
                <input style="margin-left: 20px;" type="checkbox"> &nbsp; Remember Me
                <?php
                if (isset($_SESSION["login"])){
                    echo '<h6 class="text-danger">Please , Enter valid username and password </h6>';
                    session_unset();
                    session_destroy();
                }

                ?>
            </div>
            <div class="form-group text-center">
                <input style="width: 150px;  border-radius:50px;" type="submit"  class="btn btn-success" name="submit" placeholder="Log In">
            </div>
<!--            <div>
                <p class="text-center ">You Have Not Register?<a href="student_register.php" class=""> Register</a></p>
            </div>-->
        </form>

    </div>
</div>
</body>
</html>
