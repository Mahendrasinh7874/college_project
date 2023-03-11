<?php
session_start();
if (empty($_SESSION["email"])) {
  echo $_SESSION["email"];
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel</title>
  <link rel="stylesheet" href="css/dashboard.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css" integrity="sha512-CB+XYxRC7cXZqO/8cP3V+ve2+6g6ynOnvJD6p4E4y3+wwkScH9qEOla+BTHzcwB4xKgvWn816Iv0io5l3rAOBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
  .header {
    float: right;
    width: 100%;
    margin: 0;
    position: sticky;
    top: 0;
    overflow: hidden;


    padding: 5px 10px;

  }

  body {
    background-color: #f1f5f9 !important;
  }

  .header a {
    float: left;

    color: black;
    text-align: center;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    line-height: 25px;
    border-radius: 4px;
  }

  .header a.logo {
    font-size: 25px;
    font-weight: bold;
  }

  .header a:hover {
    background-color: #ddd;
    color: black;
  }

  .header a.active {
    background-color: dodgerblue;
    color: white;
  }

  .header-right {
    float: right;
  }

  @media screen and (max-width: 500px) {
    .header a {
      float: none;
      display: block;
      text-align: left;
    }

    .header-right {
      float: none;
    }
  }
</style>

<body>
  <div class="admin-container">
    <div class="navigation-area" id='navigation-area'>
      <nav class="navigation-navbar">
        <h2 class="logo">Project</h2>
      </nav>
      <p class="menu-text">Menu</p>
      <div class="navigation-menu">
        <ul>
          <li><a href="#"></a><i class="fa fa-dashboard"></i>Dashboard</li>
          <li> <a href=""><i class="fa fa-dropbox"></i>Products </a></li>
          <li> <a href="#category"><i class="fa fa-database"></i>Category</a>
          </li>
          <li> <a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i> Payment</a></li>
          <li> <a href="#"><i class="fa fa-database"> </i>Order</li>
          <li> <a href="#"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Cart</a></li>
        </ul>
      </div>
    </div>
    <div class="content-wrapper">

      <nav class="main-header navbar navbar-expand  navbar-white navbar-light">

        <ul class="navbar-nav">
          <li class="nav-item">
            <button  id="Toggle-btn" class="nav-link btn" data-widget="pushmenu" href="" role="button"><i class="fa fa-bars"></i></button>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <div class="dropdown mr-5" style="">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php

              echo $_SESSION["admin_username"];

              ?> </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left: 0px; right: inherit;">
              <a class="dropdown-item" href="#">Change Password</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </div>
        </ul>
      </nav>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <script>
    const button = document.getElementById('Toggle-btn');
    const navarea = document.getElementById('navigation-area');
    
    button.addEventListener('click',(e) => {
      document.querySelector('.navigation-area').classList.toggle('left')
    })

  </script>

</body>

</html>