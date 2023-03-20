<?php
include './common.php';
?>
<style>
.btn-primary:focus{
    background-color: rgba(255, 154, 62, 1) !important;
}
</style>
<div class="login-container px-1 px-lg-0">
    <div class="container ">
        <div class="card">
            <div class=" text-center">
                <h2 class=" letter-spacing-1 font-weight-bold my-4 mb-5">Login</h2>
            </div>
            <!-- <form class="px-5" ac> -->
            <form class="px-5" method="post" action="loginCode.php">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input required type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block button">Submit</button>
                <?= !empty($_SESSION['loginError']) ?  $_SESSION['loginError'] : " " ?>

                <?php $_SESSION['loginError'] = '' ?>
            </form>
            <div class="text-center mt-0 ">

                <p><a href="#">Forgot your password? </a></p>
            </div>
            <div class="text-center mt-3 ">

                <div class="card-footer">

                    <p>Don't have an account? <a href="register.php">Register here</a></p>
                </div>

            </div>
        </div>
    </div>


</div>
<?php include './common/footer.php'; ?>
</body>

</html>