<?php
include './common.php';


$u_id = $_SESSION['u_id'];

$sql = "SELECT *, SUM(opm.qty) AS total_qty 
FROM order_payment_mapping opm 
LEFT JOIN product p ON p.product_id = opm.product_id 
LEFT JOIN category c ON p.product_category_id = c.cate_id 
LEFT JOIN brands b ON b.brand_id = p.product_brand_id 
WHERE opm.u_id = {$u_id} 
GROUP BY opm.order_id 
ORDER BY opm.order_id";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($result);
// print_r($data);


$sql2 = "select order_date from orders where u_id={$u_id}";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
$data2 = mysqli_fetch_assoc($result2);




?>


<style>
    :root {
        --color-border: #eee;
        --color-label: #aaa;
        --font-default: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        --font-bold: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
    }

    /* Global "table" column settings */


    .column-labels {
        justify-content: space-between;
    }



    .product {
        display: flex !important;
        justify-content: space-between;

    }

    a {
        color: black;
        text-decoration: none !important;
    }

    a:hover {
        color: black;
    }


    .product-line-price {
        float: left;
        width: 12%;
        text-align: right;
    }

    /* This is used as the traditional .clearfix class */
    .group:before,
    .group:after {
        content: '';
        display: table;
    }

    .group:after {
        clear: both;
    }

    .group {
        zoom: 1;
    }


    /* Apply clearfix in a few places */
    .shopping-cart {
        display: flex !important;
        flex-direction: column;
    }

    .column-labels {}

    .shopping-cart,
    .column-labels,
    .product,
    .totals-item {
        display: table;
        clear: both;
    }

    /* Apply dollar signs */
    .product .product-price:before,
    .product .product-line-price:before,
    .totals-value:before {
        content: '₹';
    }

    h1 {
        font-weight: 400;
    }

    label {
        color: var(--color-label);
    }

    .shopping-cart {
        margin-top: -45px;
    }

    /* Column headers */
    .column-labels label {

        margin-bottom: 15px;

    }


    /* Product entries */
    .product {
        padding: 10px 0;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--color-border);
    }

    .product .product-image {
        text-align: left;
    }

    .product .product-image img {
        width: 100px;
    }

    .product .product-details .product-title {
        margin-right: 20px;
        font-family: var(--font-bold);
        font-weight: 600;
        font-size: 23px;
    }

    .product .product-details .product-description {
        margin: 5px 20px 5px 0;
        line-height: 1.4em;
    }

    .product .product-quantity input {
        width: 40px;
    }

    .product .remove-product {
        border: 0;
        padding: 4px 8px;
        background-color: #c66;
        font-family: var(--font-bold);
        color: white !important;
        font-size: 12px;
        cursor: pointer;
        border-radius: 3px;
    }

    .product .remove-product:hover {
        background-color: #a44;
        color: white !important;
    }

    /* Totals section */
    .totals .totals-item {
        float: right;
        clear: both;
        width: 100%;
        margin-bottom: 10px;
    }

    .totals .totals-item label {
        float: left;
        clear: both;
        width: 79%;
        text-align: right;
    }

    .totals .totals-item .totals-value {
        float: right;
        width: 21%;
        text-align: right;
    }

    .checkout {
        float: right !important;
        border: 0;
        margin-top: 20px;
        padding: 2px 20px;
        background-color: #6b6;
        color: #fff;
        font-size: 20px;
        border-radius: 3px;
        width: 200px;
        margin-left: auto;
    }

    .checkout:hover {
        background-color: #494;
    }

    .shopping {
        float: left !important;
        border: 0;
        margin-top: 20px;
        padding: 2px 20px;
        background-color: #c66;
        color: #fff;
        font-size: 20px;
        border-radius: 3px;
    }

    .shopping:hover {
        background-color: #a44;
    }

    @media screen and (max-width: 650px) {
        .shopping-cart {
            margin: 0;
            padding-top: 20px;
            border-top: 1px solid grey;
        }

        .column-labels {
            display: none;
        }

        .product-image {
            float: right;
            width: auto;
        }

        .product-image img {
            margin: 0 0 10px 10px;
        }

        .product-details {
            float: none;
            margin-bottom: 10px;
            width: auto;
        }

        .product-price {
            clear: both;
            width: 70px;
        }

        .product-quantity {
            width: 100px;
        }

        .product-quantity input {
            margin-left: 20px;
        }

        .product-quantity:before {
            content: 'x';
        }

        .product-removal {
            width: auto;
        }

        .product-line-price {
            float: right;
            width: 70px;
        }
    }

    @media screen and (max-width: 350px) {
        .product-removal {
            float: right;
        }

        .product-line-price {
            float: right;
            clear: left;
            width: auto;
            margin-top: 10px;
        }

        .product .product-line-price:before {
            content: 'Item Total: $';
        }

        .totals .totals-item label {
            width: 60%;
        }

        .totals .totals-item .totals-value {
            width: 40%;
        }
    }

    .table {
        border-collapse: collapse;
    }
</style>

<div class="container my-5 pb-5">
    <h1 class="">My Orders</h1>

    <table class="table table-bordered my-4">

        <thead>
            <tr>
                <th scope="col">Order ID</th>

                <th scope="col">Product details</th>
                <th scope="col">Qty</th>
                <th scope="col">Product Price</th>
                <th scope="col">Status</th>
                <th scope="col">Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    print_r($row);
                    $sql1 = "select qty from order_payment_mapping WHERE u_id={$u_id} AND product_id={$row['product_id']} AND order_id={$row['order_id']}";
                    $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                    $data1 = mysqli_fetch_assoc($result1);
                    echo '<tr>
                    <th  style="width:10%; scope="row"> ' . $row['order_id'] . '</th>
                    <td  class="d-flex"> 
                    <img style="width:150px;height:250px;" class="mr-3" src="./admin/uploads/' . $row['image'] . '" alt="product-image"/> 
                    <div>
                    <h5 class="product-title font-weight-bold">' . $row['product_title'] . '</h5>
                    <p class="product-description font-weight-600">' . $row["product_description"] . '</p>
                    </div>
                </td>
                    <td style="width:5%;"> ' . $data1['qty'] . '</td>
                    <td style="width:10%;"> ₹' . $row['price']  . '</td>
                    <td style="width:10%;"> ' . 'Pending' . '</td>
                    // <td style="width:13%;"> ' . $data2['order_date'] . '</td>
                </tr>';
                }
            } else {
                echo '<tr><td colspan="5" class="text-center"><h1 class="py-5">No orders found</h1></td></tr>';
            }
            ?>



        </tbody>
    </table>











</div>

</div>
<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>