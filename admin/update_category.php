<?php
include 'header.php';
include 'config.php';
include 'jquery.php';

$cate_id = $_GET['cate_id'];
$sql = "select * from category where cate_id='{$cate_id}'";
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
                        <h3 class="card-title">Update Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="update_category_code.php?cate_id=<?php echo $data['cate_id']; ?>" class="">
                        <div class="card-body row">
                            <div class="form-group col-md-12">
                                <label for="update_category_name">Category Title</label>
                                <input value="<?php echo $data["category_name"] ?>" required type="text" name="update_category_name" class="form-control" id="update_category_name" placeholder="Enter Category Title">
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