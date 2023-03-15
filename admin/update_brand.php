<?php
include 'header.php';
include 'config.php';
include 'jquery.php';

$brand_id = $_GET['brand_id'];
$sql = "select * from brands where brand_id='{$brand_id}'";
$result =  mysqli_query($conn, $sql) or die(mysqli_error($conn));
/* echo '<pre>';
print_r($result);
echo '</pre>';
exit();
 */

?>


<div class="container-fluid my-5">
    <div class="row">
        <!-- left column -->
        <div class="col-md-5 m-auto">
            <?php
            $data = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {

            ?>
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="update_brand_code.php?brand_id=<?php echo $data['brand_id']; ?>"" class="">
                        <div class=" card-body row">
                        <div class="form-group col-md-12">
                            <select name="update_cate_id" class="form-control" id="">
                                <option value="" disabled selected hidden>Choose Category</option>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "college-project") or die("connection failed");
                                $sql = "select * from category";
                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $selected = "";
                                        if ($row["cate_id"] == $data["cate_id"]) {
                                            $selected = "selected";
                                        }
                                        $output = "<option value='{$row["cate_id"]}' $selected>{$row["category_name"]}</option>";
                                        echo $output;
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="brand_title">Brand Title</label>
                            <input value="<?php echo $data['brand_title'] ?>" required type="text" name="update_brand_title" class="form-control" id="brand_title" placeholder="Enter brand  Title">
                        </div>
                        <div class="col-6 my-2"> <button type="submit" class="btn btn-info">Submit</button></div>

                </div>
                </form>
        </div>
    <?php

                mysqli_close($conn);
            } else {
                echo "<h3> not found </h3>";
            }

    ?>
    </div>
</div>
</div>