
<?php

$conn = mysqli_connect("localhost", "root", "", "college-project") or die(mysqli_connect_error());



if (isset($_GET['brand'])) {
    $sql = "SELECT * FROM brands where cate_id='{$_GET['brand']}'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $json = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $json[$row["brand_id"]] = $row['brand_title'];
    }


    echo json_encode($json);
}

?>