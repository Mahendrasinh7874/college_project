<?php
include './admin/config.php';


if (isset($_POST['search'])) {

    $exists_sql = "select * from users where email='{$_POST['search']}'";

    $exists_result = mysqli_query($conn, $exists_sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($exists_result) > 0) {
        echo '<p class="text-danger"> This Email Id is already Taken.</p>';
    }
}
if (isset($_POST['search'])) {

    $exists_sql = "select * from users where mobile_no='{$_POST['search']}'";

    $exists_result = mysqli_query($conn, $exists_sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($exists_result) > 0) {
        echo '<p class="text-danger"> This Mobile Number is already Taken.</p>';
    }
}
