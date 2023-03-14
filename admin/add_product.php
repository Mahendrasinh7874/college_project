<?php
include 'header.php';
include 'config.php';
include 'jquery.php';
?>



<div class="container-fluid my-4">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="" class="">
                    <div class="card-body row">
                        <div class="form-group col-md-6">
                            <label for="product_category">Product Category</label>
                            <select class="form-control" name="product_category" placeholder="Select Product Category" id="product_category">
                                <!-- <option selected>Select Gender</option> -->
                                <option id="search" value="" disabled selected hidden>Choose Category</option>
                                <option>Mobile</option>
                                <option>Laptop</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_brand">Product Brand</label>
                            <select class="form-control" name="product_brand" placeholder="Select Product Brand" id="product_brand">
                            <option id="search" value="" disabled selected hidden>Choose Brand</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_title">Product Title</label>
                            <input required type="text" name="product_title" class="form-control" id="product_title" placeholder="Enter Product Title">
                        </div>
                        <!-- <div class="form-group col-md-6">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" name="product_description" placeholder="Enter Address" id="product_description" rows="3"></textarea>
                        </div> -->
                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input required type="number" name="price" class="form-control" id="price" placeholder="Enter Product Price">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="qty">Product Quantity</label>
                            <input required type="number" name="qty" class="form-control" id="qty" placeholder="Enter Quantity">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_description">Product Description</label>
                            <textarea class="form-control" name="product_description" placeholder="Enter Description" id="product_description" rows="3"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password">Product Image</label>
                            <input type="file" name="product_image" class="form-control-file" onchange="readURL(this);">
                            <img id="pic" class="mt-3" src="" />
                        </div>
                        <div class="col-6 my-2"> <button type="submit" class="btn btn-info">Submit</button></div>
                    </div>
            </div>


        </div>
        <!-- /.card-body -->


        </form>
    </div>
</div>