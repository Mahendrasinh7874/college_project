<?php
include './admin/config.php';

session_start();
if (empty($_SESSION['u_id'])) {
    header('Location:login.php');
}

?>

<style>
    @charset "utf-8";
    /* CSS Document */

    /* CSS Reset */

    ol,
    ul {
        list-style: none;
    }

    blockquote,
    q {
        quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: "";
        content: none;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

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

    .order .redbutton {
        background-color: #d6544e;
        padding: 13px 30px;
        font-size: 14px;
        font-weight: 100;
        margin-top: 25px;
    }

    .order .redbutton:hover {
        background-color: #000;
        border: none;
    }

    textarea {
        height: 120px;
    }

    textarea:hover,
    input:hover {
        background-color: #fff;
    }

    textarea:active,
    input:active {
        background-color: #f5f5f5;
    }

    textarea:focus,
    input:focus {
        border: 1px solid #000;
        background-color: #f5f5f5;
    }

    label:not(.notes):after {
        content: "*";
        color: red;
        padding-left: 5px;
    }

    .notes {
        display: block;
        padding-top: 20px;
    }

    /* Grid Styles */
    * {
        box-sizing: border-box;
    }

    .wrapper {
        width: 100%;
        margin: 0 auto;
        margin-bottom: 100px;
    }

    .col {
        margin-right: 16px;
        float: left;
    }

    .col:last-child {
        margin-right: 0;
    }

    .col-1,
    .col-2,
    .col-3,
    .col-4,
    .col-5,
    .col-6,
    .col-7,
    .col-8,
    .col-9,
    .col-10,
    .col-11,
    .col-12 {
        width: 100%;
    }

    .col-push-1,
    .col-push-2,
    .col-push-3,
    .col-push-4,
    .col-push-5,
    .col-push-6,
    .col-push-7,
    .col-push-8,
    .col-push-9,
    .col-push-10,
    .col-push-11 {
        margin-left: 0;
    }

    /* TABLET STARTS HERE */

    @media (min-width: 768px) {
        .wrapper {
            width: 768px;
        }

        .col-1,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-10,
        .col-11 {
            width: 376px;
        }

        .col-12 {
            width: 100%;
        }

        .col-push-1,
        .col-push-2,
        .col-push-3,
        .col-push-4,
        .col-push-5,
        .col-push-6,
        .col-push-7,
        .col-push-8,
        .col-push-9,
        .col-push-10,
        .col-push-11 {
            margin-left: 392px;
        }

        .col:nth-child(2n + 2) {
            margin-right: 0;
        }
    }

    /*DESKTOP STARTS HERE*/

    @media (min-width: 1136px) {
        .wrapper {
            width: 1136px;
        }

        .col-1 {
            width: 80px;
        }

        .col-2 {
            width: 176px;
        }

        .col-3 {
            width: 272px;
        }

        .col-4 {
            width: 368px;
        }

        .col-5 {
            width: 464px;
        }

        .col-6 {
            width: 560px;
        }

        .col-7 {
            width: 656px;
        }

        .col-8 {
            width: 752px;
        }

        .col-9 {
            width: 848px;
        }

        .col-10 {
            width: 944px;
        }

        .col-11 {
            width: 1040px;
        }

        .col-12 {
            width: 100%;
        }

        .col-push-1 {
            margin-left: 96px;
        }

        .col-push-2 {
            margin-left: 192px;
        }

        .col-push-3 {
            margin-left: 288px;
        }

        .col-push-4 {
            margin-left: 384px;
        }

        .col-push-5 {
            margin-left: 480px;
        }

        .col-push-6 {
            margin-left: 576px;
        }

        .col-push-7 {
            margin-left: 672px;
        }

        .col-push-8 {
            margin-left: 768px;
        }

        .col-push-9 {
            margin-left: 864px;
        }

        .col-push-10 {
            margin-left: 960px;
        }

        .col-push-11 {
            margin-left: 1056px;
        }

        .col:nth-child(2n + 2) {
            margin-right: 16px;
        }

        .col:last-child {
            margin-right: 0;
        }
    }

    /* Main CSS Starts Here */
    body {
        font-family: "Raleway", sans-serif;
        color: #959595;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        text-transform: uppercase;
        font-weight: 900;
        padding: 20px 0;
        color: #000;
    }

    h1 {
        font-size: 72px;
        color: #000;
    }

    h2 {
        font-size: 28px;
    }

    h3 {
        font-size: 16px;
    }

    h4 {
        font-size: 15px;
    }

    h5 {
        font-size: 14px;
    }

    h6 {
        font-size: 13px;
    }

    p {
        font-size: 13px;
        padding: 20px 0;
    }

    /* Heading Top Border Styles Start Here */
    h3 {
        position: relative;
    }

    h3.topborder {
        margin-top: 0;
    }

    h3.topborder:before {
        content: "";
        display: block;
        border-top: 1px solid #c2c2c2;
        width: 100%;
        height: 1px;
        position: absolute;
        top: 50%;
        z-index: 1;
    }

    h3.topborder span {
        background: #fff;
        padding: 0 10px 0 0;
        position: relative;
        z-index: 5;
    }

    /* Heading Top Border Styles End Here */

    .white-space {
        height: 90px;
        border-bottom: 1px solid #ddd;
        box-shadow: 0px 12px 14px -10px #dddddd;
        -webkit-box-shadow: 0px 12px 14px -10px #dddddd;
        -moz-box-shadow: 0px 12px 14px -10px #dddddd;
        -o-box-shadow: 0px 12px 14px -10px #dddddd;
    }

    .fa-info {
        font-size: 24px;
        padding: 0 20px;
        color: #757575;
        line-height: 56px;
        vertical-align: middle;
    }

    a:hover {
        color: #000;
    }

    .info-bar {
        height: 56px;
        background-color: #f5f5f5;
        margin: 20px 0;
    }

    .info-bar p:first-child {
        padding: 0;
    }

    .order {
        border: 12px solid #f5f5f5;
        padding: 30px;
        margin-top: 28px;
    }

    .order div:not(.qty) {
        width: 100%;
        border-bottom: 1px solid #dddddd;
        padding: 20px 0;
    }

    .order a {
        display: block;
    }

    .order p {
        padding: 0;
        line-height: 20px;
    }

    .order h4,
    h5 {
        padding: 0;
    }

    .order div:nth-child(6) {
        border: none;
    }

    .col-6 {
        width: 50%;
        float: left;
    }

    .padleft {
        margin-left: 39px;
    }

    /* 
    .padright {
        padding-right: 40px;
    } */

    .padLeft {
        padding-left: 40px;
    }

    .inline {
        display: inline-block;
    }

    .alignright {
        float: right;
    }

    .prod-description {
        text-transform: uppercase;
        color: #000;
    }

    .qty {
        font-weight: 900;
        font-size: 13px;
        color: #000;
        padding-left: 4px;
    }

    .smalltxt {
        font-size: 9px;
        vertical-align: middle;
    }

    .paymenttypes {
        border: 1px solid #dddddd;
        width: 135px;
        padding: 0 8px;
        margin: 0 0 20px 10px;
        display: inline-block;
        vertical-align: middle;
    }

    .paypal {
        width: 39px;
        height: 13px;
    }

    .cards {
        width: 135px;
        height: 24px;
    }

    .difwidth {
        width: 150px;
        line-height: 20px;
    }

    .order .center {
        line-height: 40px;
        color: #000;
    }
</style>

<?php
include './common.php';
?>

<div class="row m-0 my-5">
    <form method="post" action="order_pay.php" class="">
        <div class="col-7 m-auto">
            <h3 class="topborder"><span>Contact information</span></h3>

            <div class="row">
                <div class="col-6">
                    <label for="fname">First Name</label>
                    <input type="text" placeholder="First Name" name="fname" id="fname" required />
                </div>

                <div class="col-6">
                    <label for="lname">Last Name</label>
                    <input type="text" placeholder="Last Name" name="lname" id="lname" required />
                </div>
                <div class="col-12 mb-3">
                    <label for="country">Country</label>
                    <select name="country" id="country" required>
                        <option value="">Please select a country</option>
                        <option value="Canada">Canada</option>
                        <option value="Not Canada">Not Canada</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="state">State</label>
                    <input type="text" placeholder="State" name="state" id="state" required />
                </div>
                <div class="col-6">
                    <label for="city">City</label>
                    <input type="text" placeholder="City" name="city" id="city" required />
                </div>

                <div class="col-6">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="pincode" id="postcode" placeholder="Postcode / Zip" required />
                </div>
                <div class="col-6 padright">
                    <label for="email">Email Address</label>
                    <input type="text" placeholder="Email Address 
" name="email" id="email" required />
                </div>
                <div class="col-6">
                    <label for="tel">Phone</label>
                    <input type="text" placeholder="Phone" name="tel" id="tel" required />
                </div>
            </div>
            <input type="submit" name="submit" value="Place Order" class="redbutton" />
        </div>
    </form>
</div>