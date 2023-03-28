<?php
include 'config.php';
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = $_POST['password'];
} else {
    session_start();
    $_SESSION["admin_log"] = 'admin_log';
    $_SESSION["u_id"] = 'u_id';
    header("/college_project/admin/admin_panel.php");
}

//$conn = mysqli_connect("localhost", "root", "", "cms");

$sql = "SELECT * FROM admin WHERE email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
/* echo '<pre>';
print_r($result);
echo '</pre>';
exit();
 */
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION["email"] = $row['email'];
        $_SESSION["u_id"] = $row['u_id'];
        $_SESSION["admin_username"] = 'Mahendra Zala';
    }
    header("Location: admin_panel.php");
} else {
    session_start();
    $_SESSION["admin_log"] = 'admin_log';
    header("Location: index.php");
}
// 
