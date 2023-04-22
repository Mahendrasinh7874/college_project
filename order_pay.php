<style>
    #loader {
        position: fixed;
        z-index: 999;
        top: 0;

        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        /* background-color: red; */
    }

    .loader-icon {
        display: inline-block;
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 6px solid #000;
        border-color: #000 transparent #000 transparent;
        animation: loader 1.2s linear infinite;
    }

    @keyframes loader {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<?php
include './admin/config.php';
session_start();

//$apiKey = 'rzp_test_nOd8dlvNpuSZOu';
$apiKey = 'rzp_test_ReTgU6RDMrKHDQ';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$order_date = date('Y-m-d');
$email = $_POST['email'];
$mobile = $_POST['tel'];
$country = $_POST['country'];

$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];


$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';

$_SESSION['order_fname'] = $_POST['fname'];
$_SESSION['order_lname'] = $_POST['lname'];
$_SESSION['order_email'] = $_POST['email'];
$_SESSION['order_mobile'] = $_POST['tel'];
$_SESSION['order_date'] = $order_date;
$_SESSION['order_city'] = $_POST['city'];
$_SESSION['order_country'] = $_POST['country'];
$_SESSION['order_state'] = $_POST['state'];
$_SESSION['order_pincode'] = $_POST['pincode'];


$sql1 = "SELECT * FROM cart 
LEFT JOIN product ON cart.product_id = product.product_id 
LEFT JOIN category ON product.product_category_id = category.cate_id 
LEFT JOIN brands ON product.product_brand_id = brands.brand_id 
WHERE cart.u_id = $u_id and cart.qty != 0";


$result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

$amount = 0;
if (mysqli_num_rows($result1) > 0) {
    $totalPrice = 0;
    foreach ($result1 as $row1) {
        $product_id = $row1['product_id'];

        $sql2 = "SELECT * FROM cart where u_id = $u_id and product_id = $product_id and qty != 0";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        $pqty = 0;

        foreach ($result2 as $row2) {
            $pqty = $row2['qty'];
        }

        $totalPrice += $row1['price']  * $pqty;
    }
    $amount = $totalPrice;
}
?>


<script type="text/javascript" src="./js/jquery.js">

</script>
<form action="payment_success.php" class="text-center" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $apiKey; ?>" data-amount="<?php echo $amount * 100; ?>" data-currency="INR" data-id="<?php echo 'OID' . rand(10, 100) . 'END'; ?>" data-buttontext="Pay With RazorPay" data-name="Payment" data-description="Techno World" data-prefill.name="<?php echo $name ?>" data-prefill.email="<?php echo $email ?>" data-prefill.contact="<?php echo $mobile ?>" data-theme.color="#0373fc"></script>
    <input type="hidden" class="" custom="Hidden Element" name="hidden">
</form>
<style>
    .razorpay-payment-button {
        display: none;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('.razorpay-payment-button').click();
    });
</script>
<div id="loader">
    <div class="loader-icon"></div>
</div>


<script>
    jQuery(window).on('load', function() {

        $('#loader').fadeOut('slow', function() {
            $(this).remove();
        });

    });
    // window.addEventListener("load", function() {
    //     // alert('loaded');

    //     // console.log('first');

    //     var loader = document.getElementById("loader");
    //     console.log(loader);
    //     loader.style.display = "block";
    //     setTimeout(() => {
    //         loader.style.display = "none";

    //     }, 1000);
    // });
</script>