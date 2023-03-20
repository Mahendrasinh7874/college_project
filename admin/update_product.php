<?php
include 'header.php';
include 'config.php';
include 'jquery.php';


$product_id = $_GET['product_id'];
$sql = "select * from product where product_id='{$product_id}'";
$result =  mysqli_query($conn, $sql) or die(mysqli_error($conn));
/* echo '<pre>';
print_r($result);
echo '</pre>';
exit();
 */



?>



<div class="container-fluid my-4">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <?php
            $data = mysqli_fetch_assoc($result);
            // print_r($data['image']);
            if (mysqli_num_rows($result) > 0) {

            ?>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="update_product_code.php?product_id=<?php echo $data['product_id']; ?>" enctype="multipart/form-data" class="">
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label for="product_category">Product Category</label>
                                <select class="form-control" name="update_cate_id" placeholder="Select Product Category" id="product_category">
                                    <!-- <option selected>Select Gender</option> -->
                                    <!-- <option id="search" value="" disabled selected hidden>Choose Category</option>
                                <option>Mobile</option>
                                <option>Laptop</option> -->
                                    <option id="search" value="" disabled selected hidden>Choose Category</option>
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "college-project") or die("connection failed");
                                    $sql = "select * from category";
                                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $selected = "";
                                            if ($row["cate_id"] == $data["product_category_id"]) {
                                                $selected = "selected";
                                            }
                                            $output = "<option value='{$row["cate_id"]}' $selected>{$row["category_name"]}</option>";
                                            echo $output;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_brand">Product Brand</label>
                                <select class="form-control" name="update_brand_id" placeholder="Select Product Brand" id="product_brand">
                                    <!-- <option id="search" value="" disabled selected hidden>Choose Brand</option> -->
                                    <option value="" disabled selected hidden>Choose Brand</option>
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "college-project") or die("connection failed");
                                    $sql = "select * from brands";
                                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $selected = "";
                                            if ($row["brand_id"] == $data["product_brand_id"]) {
                                                $selected = "selected";
                                            }
                                            $output = "<option value='{$row["brand_id"]}' $selected>{$row["brand_title"]}</option>";
                                            echo $output;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_title">Product Title</label>
                                <input required type="text" name="update_product_title" value="<?php echo $data["product_title"] ?>" class="form-control" id="product_title" placeholder="Enter Product Title">
                            </div>
                            <!-- <div class="form-group col-md-6">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" name="product_description" placeholder="Enter Address" id="product_description" rows="3"></textarea>
                        </div> -->
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input required type="number" name="update_price" value="<?php echo $data["price"] ?>" class="form-control" id="price" placeholder="Enter Product Price">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="qty">Product Quantity</label>
                                <input required type="number" name="update_qty" value="<?php echo $data["qty"] ?>" class="form-control" id="qty" placeholder="Enter Quantity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="product_description">Product Description</label>
                                <textarea class="form-control" name="update_product_description" placeholder="Enter Description" id="product_description" rows="5"><?php echo $data["product_description"] ?></textarea>
                            </div>

                            <div class="form-group col-md-6">
                            <label for="product_image">Product Image* | 301 × 148 px </label>
                                <input type="file" name="image" id="product_image" class="form-control-file" value="<?php echo $data['image'] ?>" onchange=" readURL(this);">
                                <!-- <img id="pic" class="mt-3" src="" /> -->
                                <img id="pic" height="100" width="150" class="mt-3" src="uploads/<?php echo $data['image'] ?>" />
                                <input type="hidden" name="update_image" value="<?php echo $product_image ?>">


                            </div>
                            <div class="col-6 my-2"> <button type="submit" class="btn btn-info">Submit</button></div>
                        </div>
                </div>
            <?php

                mysqli_close($conn);
            } else {
                echo "<h3> not found </h3>";
            }

            ?>

        </div>
        <!-- /.card-body -->


        </form>
    </div>
</div>

<!-- <script type="text/javascript" src="./js/jquery.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $("select[name='cate_id']").change(function() {
        var stateID = $(this).val();

        if (stateID) {
            $.ajax({
                url: "search.php",
                dataType: 'Json',
                data: {
                    '_id': stateID
                },
                success: function(data) {
                    $('select[name="_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="_id"]').empty();
        }
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#pic')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>