<?php
include './admin/config.php';

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //connect to database
  $conn = mysqli_connect('localhost', 'root', '', 'college-project');

  //validate input
  // $username = mysqli_real_escape_string($conn, $_POST['firstName']) . " " . mysqli_real_escape_string($conn, $_POST['lastName']);

  $first_name = $_POST['first_name '];
  $last_name = $_POST['last_name '];
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
    $_SESSION['message_registerd'] = '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
        <strong>Email already in use</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    header('Location:register.php');
    exit();
  }

  //check if mobile number already exists
  $check_mobile_no_query = "SELECT * FROM users WHERE mobile_no='$mobile_no'";
  $result = mysqli_query($conn, $check_mobile_no_query);
  if (mysqli_num_rows($result) > 0) {
    // echo '<div class="alert alert-warning" role="alert">Mobile number already in use</div>';
    $_SESSION['message_registerd'] = '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
        <strong>Mobile number already in use</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    header('Location:register.php');

    exit();
  }

  //insert user into database
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // echo '<div mobile numberiv class="alert alert-warning" role="alert">Invalid email format</div>';
    $_SESSION['message_registerd'] = '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
        <strong>Invalid email format</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    header('Location:register.php');

    exit();
  }

  // Validate mobile number
  if (!preg_match("/^[0-9]{10}$/", $mobile_no)) {
    // echo '<div class="alert alert-warning" role="alert">Invalid mobile number</div>';
    $_SESSION['message_registerd'] = '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
        <strong>Invalid mobile number</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    header('Location:register.php');

    exit();
  }

  // Insert the data into the database
  $sql = "INSERT INTO users (first_name,last_name, email, password, date_of_birth, gender, address, mobile_no) VALUES ('$first_name','$last_name', '$email', '$password', '$date_of_birth', '$gender', '$address', '$mobile_no')";
  if ($conn->query($sql) === TRUE) {
    // echo '<div class="alert alert-success" role="alert">Registration successful</div>';
    $_SESSION['message_registerd'] =  '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registration successful</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';

    $_SESSION['loggedin'] = true;
    // $_SESSION['username'] = $_POST['firstName'] . " " . $_POST['lastName'];
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['username'] = $_POST['first_name'] . " " . $_POST['last_name'];
    header("Location: index.php");
    exit();
  } else {
    echo '<div class="alert alert-warning" role="alert">Error: ' . $sql . "<br>" . $conn->error . '</div>';
  }
}
