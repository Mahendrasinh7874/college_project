<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <title>Techno World</title>
  <link rel="stylesheet" href="../css/navbar.css" />
</head>

<body>
  <!-- <nav class="navbar simple-header navbar-expand-lg navbar-light bg-light"> -->
  <!-- <div class="container row m-auto">
      <div class="col-6 pl-0 first-part d-flex">
        <p class="ml-0">Free Delivery</p>
        <p>|</p>
        <p>Returns Policy</p>
        <p>|</p>

        <p>Follow Us</p>
      </div>
      <div class="col- 6 second-part">
        <?php
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) :  ?>
 <?= $_SESSION['username'] ?></a><div class="dropdown " style="cursor:pointer;">
            <a class=" username dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['username'] ?>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">My Account</a>
              <a class="dropdown-item" href="#">Change Password</a>
              <a class="dropdown-item" href="logout.php">Log Out</a>
            </div>
          </div>
        <?php else :  ?>
          <a href="login.php" class="login-text">Login<i class="mx-2 fa-solid fa-user"></i> </a>
        <?php endif; ?>
      </div>
    </div> -->
  <!-- </nav> -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>