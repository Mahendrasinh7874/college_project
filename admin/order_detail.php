<?php
include 'header.php';
include 'config.php';
// include 'jquery.php';

// $sql2 = "select order_date from orders";
// $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
// $data2 = mysqli_fetch_assoc($result2);
$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';
echo $u_id;

/* $sql1 = "select qty from order_payment_mapping";
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($result1); */

$order_id = $_GET['order_id'];

?>

<div class=" mr-3 mt-3" style="width: 82%; height: 500px; margin: auto">
  <div class="row ml-2 mt-2 mr-2  ">
    <div class="col-md-4 ">
      <h2>Order Detail</h2>
      <?php

      // $order_id = $GET['order_id'];
      $sql = "select * from orders WHERE orders.order_id = $order_id order by order_id desc";

      $result = mysqli_query($conn, $sql);
      $data3 = mysqli_fetch_assoc($result);
      $count = 0;
      //$dataa = mysqli_fetch_assoc($result);
      // echo $u_id;

      //   $sql1 = "SELECT *, SUM(opm.qty) AS total_qty 
      //  FROM order_payment_mapping opm 
      //  LEFT JOIN product p ON p.product_id = opm.product_id 
      //  LEFT JOIN category c ON p.product_category_id = c.cate_id 
      //  LEFT JOIN brands b ON b.brand_id = p.product_brand_id 
      //  LEFT JOIN orders o ON o.order_id = opm.order_id 
      //  WHERE opm.order_id = orders.order_id
      //  GROUP BY opm.order_id 
      //  ORDER BY opm.order_id";

      $sql1 = "SELECT *, SUM(opm.qty) AS total_qty 
          FROM order_payment_mapping opm 
          LEFT JOIN product p ON p.product_id = opm.product_id 
          LEFT JOIN category c ON p.product_category_id = c.cate_id 
          LEFT JOIN brands b ON b.brand_id = p.product_brand_id 
          LEFT JOIN orders o ON o.order_id = opm.order_id
          WHERE opm.order_id = $order_id
          GROUP BY opm.order_id 
          ORDER BY opm.order_id";

      $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
      // print_r($data1);

      if (mysqli_num_rows($result1) > 0) {

        echo "<table border='1' class='table table-bordered mg-b-0 my-5'>
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
    <div class="col-8" style="margin-top:2%">
      <?php
      if (mysqli_num_rows($result1) > 0) {
        echo '<table class="table table-bordered my-4">';
        echo '<thead>';
        echo '<tr>
    <th scope="col">Order ID</th>

    <th scope="col">Product details</th>
    <th scope="col">Qty</th>
    <th scope="col">Product Price</th>
    <th scope="col">Status</th>
    <th scope="col">Order Date</th>
</tr>
</thead>';
        echo '<tbody>';



        while ($row = mysqli_fetch_array($result1)) {
          // print_r($row);


          // $sql1 = "select qty from order_payment_mapping WHERE u_id={$u_id} AND product_id={$row['product_id']} AND order_id={$row['order_id']}";
          // $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
          // $data1 = mysqli_fetch_assoc($result1);
          echo '<tr>
                    <th  style="width:10%; scope="row"> ' . $row['order_id'] . '</th>
                    <td  class="d-flex"> 
                    <img style="width:300px;height:150px;" class="mr-3" src="./uploads/' . $row['image'] . '" alt="product-image"/> 
                    <div>
                    <h5 class="product-title font-weight-bold">' . $row['product_title'] . '</h5>
                    <p class="product-description text-ellipsis--2 font-weight-600">' . $row["product_description"] . '</p>
                    </div>
                </td>
                    <td style="width:5%;"> ' . $row['qty'] . '</td>
                    <td style="width:10%;"> ₹' . $row['price']  . '</td>
                    <td style="width:10%;"> ' . 'Pending' . '</td>
                     <td style="width:13%;"> ' . date('Y-m-d', strtotime($row['order_date']))  . '</td>
                </tr>';
        }
      } else {
        // echo '<tr><td colspan="5" class="text-center"><h1 class="py-5">No orders found</h1></td></tr>';
        echo ' <table class=" bordered text-center  table my-4">';
        echo '<tbody>';
        echo '<tr><td colspan="5" class="text-center"><h1 class="py-5">No orders found</h1></td></tr>';
        echo '</tbody>';
        echo "</table>";
      }
      ?>


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