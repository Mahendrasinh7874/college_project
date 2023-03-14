<?php
include 'header.php';
include 'config.php';

$user_id = $_GET['u_id'];

//$conn = $conn = mysqli_connect("localhost", "root", "", "cms") or die(mysqli_connect_error());

$sql = "select * from users where u_id='{$user_id}'";


$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $output = '

<div class=" mr-3 mt-3" style="width: 82%; height: 500px; margin: auto;">
<table class="table table-striped" width="100% cellspacing="0" cellpadding="10px"> 
                    <tr>
                  
                 
</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $u_id = $row["u_id"];
        $output .= "<tr><h3>User Id :&nbsp;{$row["u_id"]}</h3></tr>
                    <a href='update_user.php?u_id=$u_id'><input type='submit' class='btn btn-primary' value='Update'>&nbsp;&nbsp;
                    <a onclick=\"return confirmDelete();\" href='delete_user.php?u_id=$u_id'><input class='btn btn-danger' type='submit' value='Delete'></a><br><br>
                    <tr><th>First Name</th><td>{$row["first_name"]}</td>
                    <tr><th>Last Name</th><td>{$row["last_name"]}</td></tr>
                    <tr><th>Email</th><td>{$row["email"]}</td></tr>
                    <tr><th>Mobile Number</th><td>{$row["mobile_no"]}</td></tr>
                    <tr><th>Semester</th><td>{$row["gender"]}</td></tr>
                    <tr><th>Address</th><td>{$row["address"]}</td></tr>
                    <tr><th>Date Of Birth</th><td>{$row["date_of_birth"]}</td></tr>
                   </tr>";
    }
    $output .= '</table></div>';
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h3> not found </h3>";
}

?>

<script>
    const confirmDelete = () => {
        // console.log("delete");
        if (confirm("Are you sure you want to delete this user?")) {
            return true;
        } else {
            return false;
        }
    }
</script>