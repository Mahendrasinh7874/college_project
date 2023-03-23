<?php

$hostname = "http://localhost/college-project/";


$conn =  mysqli_connect("localhost", "root", "", "college-project")
  or die(mysqli_connect_error());


$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';


$sql = "SELECT * FROM cart where u_id = $u_id and qty != 0";
$sql1 = "SELECT * FROM wishlist where u_id = $u_id";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

// Get the number of rows in the result set
$num_rows = mysqli_num_rows($result);
$wishlist_num_rows = mysqli_num_rows($result1);


$check1 = "SELECT SUM(qty) AS TotalItemsOrdered FROM cart where u_id='$u_id'";
$check_result2 = mysqli_query($conn, $check1) or die(mysqli_error($conn));
foreach ($check_result2 as $row1) {
  //print_r($row1);
  $cart_qty = $row1['TotalItemsOrdered'];
  $main_qty = $cart_qty ? $cart_qty : '0';
}
// echo (!empty($_SESSION['u_id']));

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/navbar.css" />
  <link rel="stylesheet" href="../css/login.css" />

  <title>Techno World</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Lexend:wght@300&family=Nunito:ital,wght@0,300;0,400;1,200&family=Rubik:wght@300&family=Source+Sans+Pro&display=swap");

    body {
      font-family: "Rubik" !important;
      font-style: normal !important;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translate3d(0, -100%, 0);
      }

      to {
        opacity: 1;
        transform: none;
      }
    }

    .position-absolute {
      right: 5px;
      top: -7px;
      font-size: 10px !important;
    }

    .sticky {
      position: fixed !important;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 999;
      -webkit-box-shadow: 0 2px 28px 0 rgba(0, 0, 0, 0.09);
      box-shadow: 0 2px 28px 0 rgba(0, 0, 0, 0.09);
      background-color: #ffffff !important;
      -webkit-animation: 500ms ease-in-out 0s normal none 1 running fadeInDown !important;
      animation: 500ms ease-in-out 0s normal none 1 running fadeInDown !important;
      padding-top: 5px;
      padding-bottom: 5px;

    }


    /* main header starts here */

    .main-header {
      /* background-color: rgba(15, 35, 60, 1) !important; */
      /* padding: 30px 0 !important; */
      /* margin: 13px 0; */
      height: 70px !important;
      background: white;
      transition: opacity .2s ease-in-out;
      text-align: center;
    }





    .navbar .container {
      width: 1260px !important;
    }

    .navbar-nav li a {
      color: black !important;
      margin: 0;
    }

    .btn-outline-danger {
      height: 45px !important;
    }

    .dropdown-menu .dropdown-item {
      color: black !important;
    }

    .navbar-brand {
      font-size: 23px !important;
    }

    /* main header Ends here */

    /*SImple header Starts here */
    .simple-header {
      background: rgba(245, 245, 245, 1);
    }

    .simple-header p {
      margin: 0 15px;
    }

    .login-text {
      color: black;
      text-decoration: none !important;
    }

    /*SImple header Ends here */

    /* footer starts here  */

    footer {
      background-color: #f8f8f8;
      padding: 20px;
      position: absolute;
      width: 100%;
      bottom: 0;
    }

    .footer-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .footer-menu ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .footer-menu ul li {
      margin-right: 20px;
    }

    .footer-menu ul li:last-child {
      margin-right: 0;
    }

    .footer-menu ul li a {
      text-decoration: none;
      color: #333;
    }

    .footer-email form {
      display: flex;
      align-items: center;
    }

    .footer-email input[type="email"] {
      border: none;
      border-radius: 5px;
      padding: 10px;
      width: 200px;
      margin-right: 10px;
    }

    .footer-email button {
      background-color: #333;
      color: #000;
      border: none;
      border-radius: 5px;
      padding: 10px;
      cursor: pointer;
    }

    .p1[data-count]:after {
      position: absolute;
      right: 9%;
      top: -3%;
      content: attr(data-count);
      font-size: 70%;
      padding: 0.2em;
      border-radius: 50%;
      line-height: 1em;
      color: white;
      background: rgba(255, 0, 0, .85);
      text-align: center;
      min-width: 15px;

    }

    .has-badge {
      margin-right: 20px;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 20px;
    }

    /* footer Endshere  */
  </style>
</head>

<body>
  <nav class="navbar main-header navbar-expand-lg  " id="myHeader">
    <div class="container">
      <a class="navbar-brand logo" href="../../college_project/" style="
                font-size: 25px !important;
                color: black !important;
                font-weight: 700 !important;
              ">Techno World</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!-- <li class="nav-item active">
                <a style="text-transform:uppercase;" class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li> -->
          <li class="nav-item">
            <a style="text-transform:uppercase;" class="nav-link mx-2" href="../../college_project/">Home</a>
          </li>
          <li class="nav-item">
            <a style="text-transform:uppercase;" class="nav-link mx-2" href="../../college_project/">About Us</a>
          </li>
          <!-- <li class="nav-item">
                <a style="text-transform:uppercase;" class="nav-link" href="#"> Contact Us</a>
              </li> -->
        </ul>
        <div class="m-auto">
          <div class="input-group ">
            <input type="search" id="search" class="form-control" style="border-right:none !important;width:400px;height:45px;" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append ">
              <button type="button " style="background-color:white;" class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        <form class="form-inline my-2 my-lg-0">
          <?php
          if (!empty($_SESSION['u_id'])) {
            echo ' <a href="wishlist_view.php" id="wishlist"  style="text-transform:uppercase; cursor:pointer;" class="p1 fa-stack  has-badge" data-count="' . $wishlist_num_rows . '" >
<i style="font-size: 20px;color:black;" class="p3 fa fa-regular fa-heart fa-stack-1x xfa-inverse" data-count="4b"></i>
</a>';
          } else {
            echo ' <a href="../college_project" id="wishlist" style="text-transform:uppercase; cursor:pointer;" class="p1 fa-stack mr-2">
            <i style="font-size: 20px;color:black;" class="p3 fa fa-regular fa-heart fa-stack-1x xfa-inverse"></i>
            </a>';
            $SESSION['not-loggedin'] = 'not-looged';
          }

          if (!empty($_SESSION['u_id'])) {
            echo '  <a href="cart_view.php" style="text-transform:uppercase; cursor:pointer;" class="p1 fa-stack  has-badge" id="cart-count" data-count="' . $main_qty . '">
<i style="font-size: 20px;color:black;" class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="4b"></i>
</a>';
          } else {
            echo '  <a  href="../college_project" style="text-transform:uppercase; cursor:pointer;" class="p1 mr-3 fa-stack">
<i style="font-size: 20px;color:black;" class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse "></i>
</a>';
          }
          ?>

          <div class="col- 6 second-part">
            <?php
            // session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) :  ?>
              <!-- <a href="login.php" class="login-text"><?= $_SESSION['username'] ?></a> -->
              <div class="dropdown " style="cursor:pointer;">
                <a style="text-transform: uppercase;" class=" username dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <?= !empty($_SESSION['username']) ? $_SESSION['username'] : 'test' ?>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="myaccount.php">My Account</a>
                  <a class="dropdown-item" href="#">Orders</a>
                  <!-- <a class="dropdown-item" href="#">Change Password</a> -->
                  <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
              </div>
            <?php else :  ?>
              <a href="login.php" class="login-text">Login<i class="mx-2 fa-solid fa-user"></i> </a>
            <?php endif; ?>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script>
    window.onscroll = function() {
      myFunction()
    };

    // Get the header
    var header = document.getElementById("myHeader");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }
  </script>

  <script>
    const wishlist = document.getElementById('wishlist');
    const count = wishlist.getAttribute('data-count');

    if (count === 0) {
      console.log(count);
      const badge = wishlist.querySelector('.has-badge');
      badge.style.display = 'none';
    }
  </script>
  <script>
    $("#search").on("keyup", function() {
      var search_term = $(this).val();

      $.ajax({
        url: "search.php",
        type: "POST",
        data: {
          search: search_term
        },
        success: function(data) {
          $("#table-data").html(data);
        }
      });

    });

    const changeCountValue = (qty) => {
      $("#cart-count").attr('data-count', qty);


    }
  </script>
</body>

</html>