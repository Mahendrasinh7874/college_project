<?php

include './common.php';
// session_start();
if (empty($_SESSION['u_id'])) {
    header("location:http://localhost/college_project/login.php");
}



?>
<style>
    input[type="text"],
    input[type="password"],
    select,
    input[type="email"],
    input[type="tel"],
    input[type="date"],
    textarea {
        border: 1px solid #ddd;
        background-color: #fff;
        color: #959595;
        width: 100%;

        padding: 10px;

        margin: 7px 0 25px 0;
    }

    a {
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }

    /* label {
        font-size: 14px;
    } */

    input[type="checkbox"] {
        margin: 5px 10px 5px 0px;
    }

    .user-pswd input[type="checkbox"] {
        margin: 5px 10px 5px 15px;
    }

    input[type="checkbox"]+p,
    input[type="radio"]+p {
        font-size: 15px;
        padding: 0 5px;
        display: inline;
        color: #959595;
    }

    input:disabled,
    textarea:disabled,
    select:disabled {

        background: #e9ecef;
        border-radius: 5px;
    }


    input[type="radio"]+p {
        font-size: 13px;
        padding: 0 0 0 20px;
    }


    input[type="submit"] {
        padding: 10px 20px;
        color: #fff;
        background-color: #000;
        text-transform: uppercase;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #d6544e;
        border: none;
    }

    .coupon input[type="text"] {
        width: 160px;
    }

    .coupon input[type="submit"] {
        margin: 0 0 0 20px;
    }

    .account-img {
        width: 200px;
        height: 200px;
    }
</style>

<div class="container">
    <div class="card py-3 px-5 my-4">
        <div class="row">
            <div class="col-lg-12 border-bottom my-4 ">

                <h2 class="ml-3 " style="text-transform:capitalize;">
                    <?= $_SESSION['username'] ?>
                </h2>
                <h4><?= $_SESSION['email'] ?></h4>
            </div>


            <form action="" method="POST" enctype="multipart/form-data" class="row mt-5">

                <div class="col-6">
                    <label for="fname">First Name</label>
                    <input disabled type="text" placeholder="First Name" value=<?= $_SESSION['firstname'] ?> name="fname" id="fname" required />
                </div>

                <div class="col-6">
                    <label for="lname">Last Name</label>
                    <input disabled type="text" placeholder="Last Name" value=<?= $_SESSION['lastname'] ?> name="lname" id="lname" required />
                </div>
                <div class="col-6 padright">
                    <label for="email">Email Address</label>
                    <input disabled type="email" value=<?= $_SESSION['email'] ?> placeholder="Email Address 
" name="email" id="email" required />
                </div>
                <div class="col-6">
                    <label for="tel">Phone</label>
                    <input disabled type="text" value=<?= $_SESSION['mobile'] ?> placeholder="Phone" name="tel" id="tel" required />
                </div>
                <div class="col-6">
                    <label for="gender">Gender</label>
                    <!-- <input disabled type="gender" value=<?= $_SESSION['gender'] ?> placeholder="Gender" name="gender" id="gender" required /> -->

                    <!-- <select class="form-control" name="gender" placeholder="Select Gender" id="exampleFormControlSelect1">
                         <option selected>Select Gender</option> -->
                    <!-- <option>Male</option>
                    <option>Female</option>
                    </select>  -->

                    <select value="<?php echo $_SESSION["gender"] ?>" class="form-control" disabled name="gender" placeholder="Select Gender" id="exampleFormControlSelect1">
                        <!-- <option selected>Select Gender</option> -->
                        <option value="Male" <?php if ($_SESSION['gender'] == "Male") echo "selected" ?>>Male</option>
                        <option value="Female" <?php if ($_SESSION['gender'] == "Female") echo "selected" ?>>Female</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="date">Date Of Birth</label>
                    <input disabled type="date" value=<?= $_SESSION['date'] ?> placeholder="date of birth" name="date" id="date" required />
                </div>
                <div class="col-6 ">
                    <label for="address">Address</label>
                    <textarea disabled required placeholder="Enter Address"><?= $_SESSION['address'] ?></textarea>
                </div>


                <div class="col-12 mb-3">
                    <!-- <input type="submit" name="submit" value="Submit" class="redbutton" /> -->
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#pic')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>