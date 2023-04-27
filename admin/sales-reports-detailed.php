<?php


include 'header.php';
include 'jquery.php';
include './config.php';

$fromDate = $_POST['fromdate'];
$toDate = $_POST['todate'];





$sql = "SELECT product.product_id, product.product_title, product.price, brands.brand_title, category.category_name,product.image
    FROM product
    INNER JOIN brands ON product.product_brand_id = brands.brand_id
    INNER JOIN category ON product.product_category_id = category.cate_id;";
$result = mysqli_query($conn, $sql);
$count = 0;


$count = mysqli_num_rows($result);



$sql1 = "SELECT * FROM users";
$result1 = mysqli_query($conn, $sql1);
$count1 = mysqli_num_rows($result1);



$sql2 = "SELECT * FROM orders";
$result2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($result2);


$sql3 = "select * from order_payment_mapping
    LEFT JOIN product on product.product_id= order_payment_mapping.product_id
    LEFT JOIN orders on orders.order_id= order_payment_mapping.order_id
    LEFT JOIN category on product.product_category_id = category.cate_id
    LEFT JOIN brands on brands.brand_id = product.product_brand_id
    LEFT JOIN users on users.u_id = order_payment_mapping.u_id
    WHERE date(orders.order_date) BETWEEN '$fromDate' AND '$toDate'
    group by order_payment_mapping.order_id
    order by order_payment_mapping.order_id desc
    ";

$result3 = mysqli_query($conn, $sql3);


?>
<style>
    /* Webpixels CSS */
    /* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
    /* URL: https://github.com/webpixels/css */

    @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

    /* Bootstrap Icons */
    @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

    .shadow {
        min-height: 120px;
    }

    img {
        width: 150px;
    }
</style>
<main class="py-6 bg-surface-secondary my-4   ml-auto" style="width:77%;margin-right: 50px;">
    <div class="container-fluid">
        <!-- Card stats -->
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Products</span>
                                <span class="h3 font-bold mb-0"><?= $count ?></span>
                            </div>

                            <div class="col-auto">
                                <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                    <i class="bi bi-card-list"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Users</span>
                                <span class="h3 font-bold mb-0"><?= $count1 ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Sales</span>
                                <span class="h3 font-bold mb-0"><?= $count2 ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                    <i class="bi bi-shop"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Delivery</span>
                                <span class="h3 font-bold mb-0">0</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                    <i class="bi bi-minecart-loaded"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <h5 class="mb-0">Recent Orders</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Transaction id</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Product Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result3) > 0) {
                            while ($row = mysqli_fetch_assoc($result3)) {
                                echo '<tr>';
                                echo  '<td>';
                                echo   '<img alt="..." src="./uploads/' . $row['image'] . '" class="avatar avatar-p rounded-circle me-2">';
                                echo '<a class="text-heading font-semibold" >
                                            ' . $row['product_title'] . ' 
                                           </a>';
                                echo '  </td>';
                                echo '<td>
                                        ' . $row['trasaction_id'] . ' 
                                       </td>';
                                echo '<td>';
                                echo '<img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2">
                                            <a class="text-heading font-semibold" >
                                            ' . $row['first_name'] . " " .  $row['last_name']  . ' 

                                            </a>';
                                echo   '</td>';
                                echo '<td>
                                        ₹ ' . $row['price'] . '
                                        </td>';



                                echo  '</tr>';
                            }
                        } else {
                            echo '<tr style="height:200px; ">
                                    <td colspan="12" >
                                         <h2 style="text-align:center;margin:44px 0;"> No Orders Found</h2>
                                        </td></tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>
<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>