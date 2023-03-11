<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="../css/navbar.css" />
    <link rel="stylesheet" href="../css/login.css" />
    <title>Techno World</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Lexend:wght@300&family=Nunito:ital,wght@0,300;0,400;1,200&family=Rubik:wght@300&family=Source+Sans+Pro&display=swap");

      body {
        font-family: "Rubik" !important;
        font-style: normal !important;
      }
      /* main header starts here */

      .main-header {
        background-color: rgba(15, 35, 60, 1) !important;
        height: 70px !important;
      }

      .navbar .container {
        width: 1260px !important;
      }

      .navbar-nav li a {
        color: white !important;
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
        color: #fff;
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
    <nav class="navbar main-header navbar-expand-lg navbar-light bg-dark">
      <div class="container">
        <a class="navbar-brand text-white" href="../../college_project/">Techno World</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
              >
                Category
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Contact Us</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-light mx-2">Wishlist</button>

            <button type="button" class="btn btn-light">Cart</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
