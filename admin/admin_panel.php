<?php

session_start();
if (!isset($_SESSION["admin_username"])) {
  echo $_SESSION["email"];
  header("location:http://localhost/college_project/admin");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- /.navbar -->
    <?php include 'header.php' ?>

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper d-flex justify-content-center "> -->
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header"> -->
    <?php

    include './config.php';






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
        <h2 class="my-5 text-center">Welcome To Dashboard</h2>
        <div class="row g-6 mb-6 my-5">
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
        <!-- /.container-fluid -->
        <!-- </div> -->
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- /.content -->
        <!-- </div> -->
        <!-- /.content-wrapper -->

    </main>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge("uibutton", $.ui.button);
      </script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="plugins/moment/moment.min.js"></script>
      <script src="plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>