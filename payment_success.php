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

    .success-animation {
        margin-top: 40px;
        margin-bottom: 14px
    }

    .checkmark {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #4bb71b;
        stroke-miterlimit: 10;
        box-shadow: inset 0px 0px 0px #4bb71b;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        position: relative;
        top: 5px;
        right: 5px;
        margin: 0 auto;
    }

    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #4bb71b;
        fill: #fff;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;

    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0;
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none;
        }

        50% {
            transform: scale3d(1.1, 1.1, 1);
        }
    }

    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 30px #4bb71b;
        }
    }
</style>

<?php

include './common.php';
include './admin/config.php';

// session_start();
$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';

$fname = $_SESSION['order_fname'];
$lname = $_SESSION['order_lname'];
$email = $_SESSION['order_email'];
$mobile = $_SESSION['order_mobile'];
$country = $_SESSION['order_country'];
$state = $_SESSION['order_state'];
$city = $_SESSION['order_city'];
$pincode = $_SESSION['order_pincode'];




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
        $_SESSION['product_id'] =  $product_id;
        $pro_id =  $_SESSION['product_id'];


        $sql2 = "SELECT * FROM cart where u_id = $u_id and product_id = $product_id and qty != 0";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        $pqty = 0;

        foreach ($result2 as $row2) {
            $pqty = $row2['qty'];
            $_SESSION['qty'] = $row2['qty'];
            // print_r($qty);
        }

        $qty = $_SESSION['qty'];
        $totalPrice += $row1['price']  * $pqty;
    }
    $amount = $totalPrice;
}
$sql = "INSERT INTO orders (u_id,first_name,last_name,email,phone,country,state,city,pincode,amount) values ('$u_id','$fname','$lname','$email','$mobile','$country','$state','$city','$pincode','$amount')";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


$getOrder = "SELECT order_id FROM orders  WHERE u_id = $u_id  order by u_id DESC ";
$result3 = mysqli_query($conn, $getOrder) or die(mysqli_error($conn));
// $order_id = '';

foreach ($result3 as $row3) {
    $order_id = $row3['order_id'];
}

$insertOrder = "INSERT INTO order_payment_mapping (u_id,order_id,product_id,qty) values ('$u_id','$order_id','$pro_id','$qty')";
$inserResult = mysqli_query($conn, $insertOrder) or die(mysqli_error($conn));
unset($_SESSION['qty']);


if ($inserResult) {

    $deleteCartData = "DELETE FROM cart WHERE u_id = $u_id";
    $delete = mysqli_query($conn, $deleteCartData) or die(mysqli_error($conn));
}



?>


<div class="row">
    <div class="col-md-12">
        <div class="success-animation">
            <svg class="checkmark" xmlns="" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
        </div>
        <p class="text-success text-center h4">Payment Successfully </p>
        <div class="col-md-12 text-center mt-4">
            <a href="layout.php"><input type="submit" class="btn btn-success" value="View Orders"></a>
        </div>
    </div>
</div>

<div id="loader">
    <div class="loader-icon"></div>
</div>

<script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 2000);
</script>



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