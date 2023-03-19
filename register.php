<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: index.php");
}
include './common.php';

?>
<?=
!empty($_SESSION['message_registerd']) ? $_SESSION['message_registerd'] : '';

?>
<?php $_SESSION['message_registerd'] = '' ?>
<div class="login-container">
    <div class="card py-3" style="width:53%">
        <div class=" text-center">
            <h2 class=" letter-spacing-1 font-weight-bold mb-4">Register</h2>
        </div>
        <form method="post" action="registerCode.php" class="px-5 row">

            <!-- <div class="form-row"> -->
            <div class="form-group col-md-6  my-2">
                <label for="firstName">First Name</label>
                <input required type="text" name="first_name" class="form-control" id="firstName" placeholder="Enter First Name">
            </div>
            <div class="form-group col-md-6 my-2">
                <label for="lastName">Last Name</label>
                <input required type="text" class="form-control" name="last_name" id="lastName" placeholder="Enter Last Name">
            </div>
            <div class="form-group col-md-6 my-2">
                <label for="email">Email</label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                <?php if (isset($_SESSION['email_taken'])) {
                    echo "<p class='ml-4 text-danger'>This Email Id is already Taken</p>";
                    unset($_SESSION["email_taken"]);
                } ?>
                <label id="checked"></label>
                <div class="status" id="status"></div>
            </div>
            <div class="form-group col-md-6 my-2">
                <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control" name="gender" id="exampleFormControlSelect1">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group col-md-6 my-2">
                <label for="date">Date Of Birth</label>
                <input required type="date" name="date_of_birth" class="form-control" id="date" placeholder="Enter Date Of Birth">
            </div>
            <div class="form-group col-md-6 my-2">
                <label for="phone">Mobile Number</label>
                <input required type="phone" name="mobile_no" class="form-control" id="phone" placeholder="Enter Mobile Number">
                <?php if (isset($_SESSION['mobile_taken'])) {
                    echo "<p class='ml-4 text-danger'>This Mobile Number  is already Taken</p>";
                    unset($_SESSION["mobile_taken"]);
                } ?>
                <label id="checked_mobile"></label>
            </div>
            <div class="form-group col-md-12 my-2">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control" name="address" placeholder="Enter Address" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group col-md-6 my-2">
                <label for="password">Password</label>
                <input required name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <!-- <div class="form-group col-md-6">
        <label for="confirmPassword">Confirm Password</label>
        <input required type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm Password">
    </div> -->
            <button type="submit" class="btn btn-primary  button btn-block mx-3">Regsiter</button>
        </form>
        <div class="text-center mt-3 ">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</div>
</div>
<?php include './common/footer.php'; ?>

<script type="text/javascript" src="./js/jquery.js"></script>

<script>
    $("#email").on('keyup', function() {
        var search_term = $(this).val();

        $.ajax({
            url: "validation.php",
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
            url: "validation.php",
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
</body>

</html>