<?php
include 'header.php';
include 'jquery.php';

?>


<div class="container-fluid my-4">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="add_user_code.php" class="">
                    <div class="card-body row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First Name</label>
                            <input required type="text" name="first_name" class="form-control" id="firstName" placeholder="Enter First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input required type="text" class="form-control" name="last_name" id="lastName" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input required type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                            <?php if (isset($_SESSION['email_taken'])) {
                                echo "<p class='ml-4 text-danger'>This Email Id is already Taken</p>";
                                unset($_SESSION["email_taken"]);
                            } ?>
                            <label id="checked"></label>
                            <div class="status" id="status"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Gender</label>
                            <select class="form-control" name="gender" placeholder="Select Gender" id="exampleFormControlSelect1">
                                <!-- <option selected>Select Gender</option> -->
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
                            <?php if (isset($_SESSION['mobile_taken'])) {
                                echo "<p class='ml-4 text-danger'>This Mobile Number  is already Taken</p>";
                                unset($_SESSION["mobile_taken"]);
                            } ?>
                            <label id="checked_mobile"></label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Address</label>
                            <textarea class="form-control" name="address" placeholder="Enter Address" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input required name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
                        </div>
                        <div class="col-6 my-2"> <button type="submit" class="btn btn-info">Submit</button></div>
                    </div>
            </div>


        </div>
        <!-- /.card-body -->


        </form>
    </div>
</div>
<!-- /.card -->



<script type="text/javascript" src="../js/jquery.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script>
    $("#email").on('keyup', function() {
        var search_term = $(this).val();

        $.ajax({
            url: "add_user_validation.php",
            type: "POST",
            data: {
                search: search_term
            },
            success: function(data) {
                $("#checked").html(data);
            }
        });
    });
    $("#phone").on('keyup', function() {
        var search_term = $(this).val();
        $.ajax({
            url: "add_user_validation.php",
            type: "POST",
            data: {
                search: search_term
            },
            success: function(data) {
                $("#checked_mobile").html(data);
            }
        });
    });
</script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>