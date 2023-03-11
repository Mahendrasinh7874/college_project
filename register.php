<?php include './common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'college-project');

    //validate input
    $username = mysqli_real_escape_string($conn, $_POST['firstName']) . " " . mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $confirmPassword = $_POST['confirmPassword'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $mobile_no = $_POST['mobile_no'];

    //check if email already exists
    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($result) > 0) {
        // echo '<div class="alert alert-warning" role="alert">Email already in use</div>';
        echo '<div class="alert alert-warning" alert-dismissible fade show" role="alert">
        <strong>Email already in use</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        exit();
    }

    //check if mobile number already exists
    $check_mobile_no_query = "SELECT * FROM users WHERE mobile_no='$mobile_no'";
    $result = mysqli_query($conn, $check_mobile_no_query);
    if (mysqli_num_rows($result) > 0) {
        // echo '<div class="alert alert-warning" role="alert">Mobile number already in use</div>';
        echo '<div class="alert alert-warning" alert-dismissible fade show" role="alert">
        <strong>Mobile number already in use</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        exit();
    }

    //insert user into database
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // echo '<div mobile numberiv class="alert alert-warning" role="alert">Invalid email format</div>';
        echo '<div class="alert alert-warning" alert-dismissible fade show" role="alert">
        <strong>Invalid email format</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        exit();
    }

    // Validate mobile number
    if (!preg_match("/^[0-9]{10}$/", $mobile_no)) {
        // echo '<div class="alert alert-warning" role="alert">Invalid mobile number</div>';
        echo '<div class="alert alert-warning" alert-dismissible fade show" role="alert">
        <strong>Invalid mobile number</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        exit();
    }

    // Insert the data into the database
    $sql = "INSERT INTO users (username, email, password, date_of_birth, gender, address, mobile_no) VALUES ('$username', '$email', '$password', '$date_of_birth', '$gender', '$address', '$mobile_no')";
    if ($conn->query($sql) === TRUE) {
        // echo '<div class="alert alert-success" role="alert">Registration successful</div>';
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registration successful</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        header("Location: login.php");
        exit();
    } else {
        echo '<div class="alert alert-warning" role="alert">Error: ' . $sql . "<br>" . $conn->error . '</div>';
    }
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
                <select class="form-control" name="gender" id="exampleFormControlSelect1">
                    <option>Male</option>
                    <option>Female</option>
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

            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input required name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <!-- <div class="form-group col-md-6">
        <label for="confirmPassword">Confirm Password</label>
        <input required type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm Password">
    </div> -->
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