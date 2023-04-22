<?php
include 'header.php';
include 'config.php';
// include 'jquery.php';

// $sql2 = "select order_date from orders";
// $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
// $data2 = mysqli_fetch_assoc($result2);
// $u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';


$sql1 = "select qty from order_payment_mapping";
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($result1);
$order_id = $_GET['order_id'];

?>

<div class=" mr-3 mt-3" style="width: 82%; height: 500px; margin: auto">
    <div class="row ml-2 mt-2 mr-2  ">
        <div class="col-md-6 ">
            <h2>Order Detail</h2>
            <?php

            // $order_id = $GET['order_id'];
            $sql = "select * from order_payment_mapping
            LEFT JOIN product on product.product_id= order_payment_mapping.product_id
            LEFT JOIN category on product.product_category_id = category.cate_id
            LEFT JOIN brands on brands.brand_id = product.product_brand_id
            WHERE order_payment_mapping.order_id = {$order_id}
            order by order_id desc
            ";


            $result = mysqli_query($conn, $sql);
            // print_r($result);
            $count = 0;
            // $dataa = mysqli_fetch_assoc($result);


            $u_id = $_SESSION['u_id'];

            $sql2 = "SELECT * from orders where u_id = {$u_id}";
            $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
            $data3 = mysqli_fetch_assoc($result2);

            // print_r($data3);

            if (mysqli_num_rows($result) > 0) {
                echo " <table border='1' class='table table-bordered mg-b-0 my-5'>
            <tr align='center'>
           <td colspan='2' style='font-size:20px;color:blue'>
            User Details</td></tr>
           
               <tr>
               <th>First Name</th>
               <td>" . $data3['first_name'] . "</td>
             </tr>
             <tr>
               <th>Last Name</th>
               <td> " . $data3['last_name'] . "</td>
               </tr>
             <tr>
               <th>Last Name</th>
               <td> " . $data3['email'] . "</td>
               </tr>
             <tr>
               <th>Last Name</th>
               <td> " . $data3['phone'] . "</td>
               </tr>
             <tr>
               <th>Country</th>
               <td> " . $data3['country'] . "</td>
               </tr>
             <tr>
               <th>State</th>
               <td> " . $data3['state'] . "</td>
               </tr>
             <tr>
               <th>City</th>
               <td> " . $data3['city'] . "</td>
               </tr>
             <tr>
               <th>City</th>
               <td> " . $data3['order_date'] . "</td>
               </tr>
             <tr>
               <th>Order Status</th>
               <td> Pending</td>
               </tr>
               </table>";
            }


            ?>

            </tr>

            </tbody>
            </table>

        </div>
        <div class="col-6" style="margin-top:2%">
            <?php

            $cnt = 1; ?>
            <table border="1" class="table table-bordered mg-b-0">
                <tr align="center">
                    <td colspan="6" style="font-size:20px;color:blue">
                        Order Details</td>
                </tr>

                <tr>
                    <th>#</th>
                    <th>Product </th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Price/Unit</th>
                    <th>Total</th>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($product = mysqli_fetch_array($result)) {

                ?>
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            '<td><img src='./uploads/<?php echo $product['image'] ?>' width=" 70" height="60"></td>
                            <td><?php echo $product['product_title']; ?></td>
                            <td><?php echo $data['qty']; ?></td>

                            <td>₹<?php echo $product['price']; ?></td>
                            <td>₹<?php echo $total = $data['qty'] * $product['price']; ?></td>
                        </tr>
                <?php
                        $grandtotal = $product['price'];
                        $grandtotal += $total;
                    }
                }
                ?>
                <!-- <tr>
                    <th colspan="5" style="text-align:center">Grand Total </th>
                    <td>₹<?php echo $grandtotal  ?></td>
                </tr> -->


            </table>


        </div>
    </div>
</div>


<script>
    const confirmDelete = () => {
        console.log("delete");
        if (confirm("Are you sure you want to delete this Catrgory?")) {
            return true;
        } else {
            return false;
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="plugins/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="plugins/moment/moment.min.js"></script> -->
<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>