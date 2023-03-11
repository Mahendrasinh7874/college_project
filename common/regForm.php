
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
<div class="card py-3" style="width:40%">
        <div class=" text-center">
            <h2 class=" letter-spacing-1 font-weight-bold mb-4">Register</h2>
        </div>
        <form method="post" action="register.php" class="px-5 row">
            <!-- <div class="form-row"> -->
            <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input required type="text" name="firstName" class="form-control" id="firstName" placeholder="Enter First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input required type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control" name="gender" id="exampleFormControlSelect1">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="date">Date Of Birth</label>
                <input required type="date" name="date_of_birth" class="form-control" id="date" placeholder="Enter Date Of Birth">
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Mobile Number</label>
                <input required type="phone" name="mobile_no" class="form-control" id="phone" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control" name="address" placeholder="Enter Address" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group col-md-12">
                <label for="password">Password</label>
                <input required name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block mx-3">Regsiter</button>
        </form>
        <div class="text-center mt-3 ">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

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
