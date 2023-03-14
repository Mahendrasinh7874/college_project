<?php
include 'header.php';
include 'config.php';

$user_id = $_GET['u_id'];
$sql = "select * from users where u_id='{$user_id}'";
$result =  mysqli_query($conn, $sql) or die(mysqli_error($conn));
/* echo '<pre>';
print_r($result);
echo '</pre>';
exit();
 */
?>
<div class="container-fluid my-4">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 m-auto">
            <!-- general form elements -->
            <?php
            $data = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {

            ?>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="update_user_code.php?u_id=<?php echo $data['u_id']; ?>" class="">
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name</label>
                                <input value="<?php echo $data["first_name"] ?>" required type="text" name="update_first_name" class="form-control" id="firstName" placeholder="Enter First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name</label>
                                <input value="<?php echo $data["last_name"] ?>" required type="text" class="form-control" name="update_last_name" id="lastName" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input value="<?php echo $data["email"] ?>" required type="email" name="update_email" class="form-control" id="email" placeholder="Enter Email">
                                <?php if (isset($_SESSION['email_taken'])) {
                                    echo "<p class='ml-4 text-danger'>This Email Id is already Taken</p>";
                                    unset($_SESSION["email_taken"]);
                                } ?>
                                <label id="checked"></label>
                                <div class="status" id="status"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Gender</label>
                                <select value="<?php echo $data["gender"] ?>" class="form-control" name="update_gender" placeholder="Select Gender" id="exampleFormControlSelect1">
                                    <!-- <option selected>Select Gender</option> -->
                                    <option value="Male" <?php if ($data['gender'] == "Male") echo "selected" ?>>Male</option>
                                    <option value="Female" <?php if ($data['gender'] == "Female") echo "selected" ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Date Of Birth</label>
                                <input value="<?php echo $data["date_of_birth"] ?>" required type="date" name="update_date_of_birth" class="form-control" id="date" placeholder="Enter Date Of Birth">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Mobile Number</label>
                                <input value="<?php echo $data["mobile_no"] ?>" required type="phone" name="update_mobile_no" class="form-control" id="phone" placeholder="Enter Mobile Number">
                                <?php if (isset($_SESSION['mobile_taken'])) {
                                    echo "<p class='ml-4 text-danger'>This Mobile Number  is already Taken</p>";
                                    unset($_SESSION["mobile_taken"]);
                                } ?>
                                <label id="checked_mobile"></label>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <textarea class="form-control" name="update_address" placeholder="Enter Address" id="exampleFormControlTextarea1" rows="3"><?php echo $data["address"] ?></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="password">Password</label>
                                <input value="<?php echo $data["password"] ?>" required name="update_password" type="password" class="form-control" id="password" placeholder="Enter Password">
                            </div>
                            <div class="col-6 my-2"> <button type="submit" class="btn btn-info">Update</button></div>
                        </div>
                </div>
            <?php

                mysqli_close($conn);
            } else {
                echo "<h3> not found </h3>";
            }

            ?>

        </div>
        <!-- /.card-body -->


        </form>
    </div>
</div>


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