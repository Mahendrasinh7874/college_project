<?php
include 'config.php';
include 'header.php';
include 'jquery.php';


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
                <form method="post" action="add_catgoryCode.php" class="">
                    <div class="card-body row">
                        <div class="form-group col-md-12">
                            <label for="category">Category Title</label>
                            <input required type="text" name="category_name" class="form-control" id="category" placeholder="Enter Category Title">
                        </div>
                        <div class="col-6 my-2"> <button type="submit" class="btn btn-info">Submit</button></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>