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
                <a style="text-transform:uppercase;" class="nav-link mx-2" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a style="text-transform:uppercase;" class="nav-link mx-2" href="products.php">Products</a>
              </li>
              <!-- <li class="nav-item">
                <a style="text-transform:uppercase;" class="nav-link" href="#"> Contact Us</a>
              </li> -->
            </ul>
            <div class="m-auto">
              <div class="input-group ">
                <input type="text" class="form-control" style="border-right:none !important;width:400px;height:45px;" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append ">
                  <button type="button " style="background-color:white;" class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
            <form class="form-inline my-2 my-lg-0">
              <a style="text-transform:uppercase; cursor:pointer;">
                <i style="font-size: 22px" class="mx-4 fa-sharp fa-regular fa-heart"></i></a>
              <a style="text-transform:uppercase;  cursor:pointer;"> Cart
                <i style="font-size: 20px" class="mr-4 ml-1  fa-solid fa-cart-shopping"></i></a>
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
                      <a class="dropdown-item" href="#">My Account</a>
                      <a class="dropdown-item" href="#">Change Password</a>
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
          console.log('etdhs')
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        }
      </script>

    
    </body>

    </html>