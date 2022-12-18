



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/login.css" />
    
    <title>Document</title>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <form action="admin_panel.php" method="POST" class="form-input">
                <p>Admin Login</p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="input" required placeholder="Email" />
                <label for="password">Password</label>
                <input type="password" required name="password" class="input" id="password" placeholder="Password" />
                <!-- <button type="submit">Login</button> -->
                <input type="submit" id="btn" name="btn" value="Login" />

                <?php
                // if (isset($_SESSION['admin_log'])) {
                //     echo "<h4 class='text-danger'>please enter valid email and password.";
                //     session_unset();
                //     session_destroy();
                // }
                ?>
            </form>
        </div>
    </div>
</body>

</html>