<?php
include 'header.php';
include 'config.php';
// include 'jquery.php';

$sql2 = "select order_date from orders";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
$data2 = mysqli_fetch_assoc($result2);
// $u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';


$sql1 = "select qty from order_payment_mapping";
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($result1);


?>

<div class=" mr-3 mt-3" style="width: 82%; height: 500px; margin: auto">
    <div class="row ml-2 mt-2 mr-2">
        <div class="col-md-8">
            <h2>Orders</h2>
        </div>
        <?php

        $sql = "select * from order_payment_mapping
LEFT JOIN product on product.product_id= order_payment_mapping.product_id
LEFT JOIN category on product.product_category_id = category.cate_id
LEFT JOIN brands on brands.brand_id = product.product_brand_id

order by order_id desc
";

        $result = mysqli_query($conn, $sql);
        // print_r($result);

        $count = 0;


        if (mysqli_num_rows($result) > 0) {

            echo ' <table class="table my-4">';
            echo ' <thead>
            <tr>
                <th scope="col">No</th>  
                <th scope="col">Order Date</th>
                <th scope="col">Action</th>
                
                </tr>
                </thead>';
                // <th scope="col">Product Name</th>
                // <th scope="col"> Qty</th>
                // <th scope="col">Price</th>
            echo '<tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                $count++;
                echo ' <tr>';
                echo "<td>" . $count . "</td>";
                // echo "<td>" . $row['product_title'] . "</td>";
                // echo "<td>" . $data['qty'] . "</td>";
                // echo "<td>₹" . $row['price'] * $data['qty']  . "</td>";
                echo "<td>" . $data2['order_date'] . "</td>";
                echo "<td><a  href='order_detail.php?order_id=" . $row['order_id'] . "' >View Details</a></td>";
                echo "</tr>";
            }
            echo '</tbody>';
            echo "</table>";
        } else {
            echo ' <table class=" bordered text-center table my-4">';
            echo '<tbody>';
            echo ' <tr >';
            echo "<td class='my-5'><h2 class='my-5'>Not Found</h2></td>";
            echo '</tbody>';
            echo "</table>";
        }

        ?>

        </tr>

        </tbody>
        </table>

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

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

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



<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>