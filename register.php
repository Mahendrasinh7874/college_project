<?php

include './common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'college-project');

    //validate input
    $username = mysqli_real_escape_string($conn, $_POST['firstName']) . " " . mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //hash password
    $password = password_hash($password, PASSWORD_BCRYPT);

    //insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $sql);

    //redirect to login page
    header("Location: login.php");
    exit();
}
?>
    
<div class="login-container">
    <div class="card py-3" style="width:40%">
        <div class=" text-center">
            <h2 class=" letter-spacing-1 font-weight-bold mb-4">Register</h2>
        </div>
        <form method="post" action="register.php" class="px-5 row">
            <!-- <div class="form-row"> -->
            <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input required type="text" name="firstName" class="form-control" id="firstName" placeholder="Enter First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input required type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="date">Date Of Birth</label>
                <input required type="date" name="date_of_birth" class="form-control" id="date" placeholder="Enter Date Of Birth">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Mobile Number</label>
                <input required type="phone" name="mobile_no" class="form-control" id="phone" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control" name="address" placeholder="Enter Address" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          
            <div class="form-group col-md-12">
                <label for="password">Password</label>
                <input required name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block mx-3">Regsiter</button>
        </form>
        <div class="text-center mt-3 ">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</div>
</div>

</body>

</html>