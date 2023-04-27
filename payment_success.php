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

$razorpay_payment_id = $_POST['razorpay_payment_id'];

$api_key = 'rzp_test_ReTgU6RDMrKHDQ';
$api_secret = 'vqSLkql9bZq90uKfV625FEJu';

$url = 'https://api.razorpay.com/v1/payments/' . $razorpay_payment_id;
// print_r($url);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, $api_key . ':' . $api_secret);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

if ($result === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    $data = json_decode($result, true);
    // print_r($data);
}

curl_close($ch);


$fname = $_SESSION['order_fname'];
$lname = $_SESSION['order_lname'];
$email = $_SESSION['order_email'];
$mobile = $_SESSION['order_mobile'];
$country = $_SESSION['order_country'];
$state = $_SESSION['order_state'];
$city = $_SESSION['order_city'];
$pincode = $_SESSION['order_pincode'];
// $order_date = date('Y-m-d H:i:s');
$timezone = new DateTimeZone('Asia/Kolkata');
$date = new DateTime('now', $timezone);
$order_date = $date->format('Y-m-d H:i:s');
$pay_status = $data['status'];
$id = $data['id'];
$amount = $data['amount'];
$currency = $data['currency'];



$sql2 = "select order_id from orders
              where order_date='$order_date' and email='$email';
              ";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

foreach ($result2 as $raw) {
    $_SESSION['order_id'] = $raw['order_id'];
}



// $_POST['']
// print_r($_POST);

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


        $totalPrice += $row1['price']  * $pqty;
    }
    $amount = $totalPrice;
}

// print_r($pqty);

$sql = "INSERT INTO orders (u_id,first_name,last_name,email,phone,trasaction_id,country,state,city,pincode,amount,order_date,pay_status,currency) values ('$u_id','$fname','$lname','$email','$mobile','$id','$country','$state','$city','$pincode','$amount','$order_date','$pay_status','$currency')";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));




$getOrder = "SELECT order_id FROM orders  WHERE u_id = $u_id  order by u_id DESC ";
$result3 = mysqli_query($conn, $getOrder) or die(mysqli_error($conn));
// $order_id = '';

if ($result) {
    $product_id = $pro_id; // Replace with the actual product ID
    $product_qty = $pqty; // Replace with the actual product quantity

    // Update product quantity in the product table
    $update_sql = "UPDATE product SET qty = qty - $product_qty WHERE product_id = $product_id";
    mysqli_query($conn, $update_sql) or die(mysqli_error($conn));
}

foreach ($result3 as $row3) {
    $order_id = $row3['order_id'];
}
//fetch cart for add product maping
if (mysqli_num_rows($result1) > 0) {
    foreach ($result1 as $row1) {
        $quantity_product_cart = $row1['qty'];
        // print_r($quantity_product_cart);
        $pro_id = $row1['product_id'];
        $insertOrder = "INSERT INTO order_payment_mapping (u_id,order_id,product_id,qty) values ('$u_id','$order_id','$pro_id','$pqty')";
        $inserResult = mysqli_query($conn, $insertOrder) or die(mysqli_error($conn));
        // unset($_SESSION['qty']);
    }
}


$deleteCartData = "DELETE FROM `cart` WHERE u_id={$u_id}";

$delete = mysqli_query($conn, $deleteCartData) or die(mysqli_error($conn));




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
            <a href="order.php"><input type="submit" class="btn btn-success" value="View Orders"></a>
        </div>
    </div>
</div>


<script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 2000);
</script>