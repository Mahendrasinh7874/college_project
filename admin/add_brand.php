<?php
include 'config.php';
include 'header.php';
include 'jquery.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO category (category_name) values ('$category_name')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        header('Location: category_index.php');
    } else {
        echo '<h1 class="text-center"> 404 Not Found </h1>';
    }
}

?>

<div class="container-fluid my-5">
    <div class="row">
        <!-- left column -->
        <div class="col-md-5 m-auto">
            <!-- general form elements -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="add_brand_code.php" class="">
                    <div class="card-body row">
                        <div class="form-group col-md-12">
                            <select name="cate_id" class="form-control" id="">
                                <option value="" disabled selected hidden>Choose Category</option>
                                <?=
                                $conn = mysqli_connect("localhost", "root", "", "college-project") or die("connection failed");

                                $sql = "select * from category";

                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $output = "<option value='{$row["cate_id"]}'>{$row["category_name"]}</option>
                    ";
                                        echo $output;
                                    }
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="brand_title">Brand Title</label>
                            <input required type="text" name="brand_title" class="form-control" id="brand_title" placeholder="Enter brand  Title">
                        </div>
                        <div class="col-6 my-2"> <button type="submit" class="btn btn-info">Submit</button></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>