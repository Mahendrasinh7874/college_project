<?php

include './common.php';
include './admin/config.php';
if (isset($_SESSION["u_id"]) === ''  && empty($_SESSION["u_id"])) {

    header("location:http://localhost/college_project/");
}
$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';


$sql = "SELECT * FROM cart 
LEFT JOIN product ON cart.product_id = product.product_id 
LEFT JOIN category ON product.product_category_id = category.cate_id 
LEFT JOIN brands ON product.product_brand_id = brands.brand_id 
WHERE cart.u_id = $u_id;
-- WHERE wishlist.u_id = $u_id";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>

<style>
    :root {
        --color-border: #eee;
        --color-label: #aaa;
        --font-default: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        --font-bold: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
    }

    /* Global "table" column settings */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        display: none;
    }

    .product-image {
        float: left;
        width: 20%;
    }

    .product-details {
        float: left;
        width: 37%;
    }

    .product-price {
        float: left;
        width: 12%;
    }

    .product-quantity {
        float: left;
        width: 10%;
    }

    .product-removal {
        float: left;
        width: 9%;
    }

    .shopping-cart {
        display: flex !important;
        flex-direction: column !important;

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

    .column-labels {
        display: flex !important;
    }

    /* Apply clearfix in a few places */
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

    /* Body/Header stuff */
    body {
        /* padding: 0px 30px 30px 20px; */
        font-family: var(--font-default);
        font-weight: 100;
    }

    h1 {
        font-weight: 100;
    }

    label {
        color: var(--color-label);
    }

    .shopping-cart {
        margin-top: -45px;
    }

    /* Column headers */
    .column-labels label {
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid var(--color-border);
    }

    .column-labels .product-image,
    .column-labels .product-details,
    .column-labels .product-removal {
        /* text-indent: -9999px; */
    }

    /* Product entries */
    .product {
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--color-border);
    }

    .product .product-image {
        text-align: center;
    }

    .product .product-image img {
        width: 100px;
    }

    .product .product-details .product-title {
        margin-right: 20px;
        font-family: var(--font-bold);
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
        color: #fff;
        font-family: var(--font-bold);
        font-size: 12px;
        border-radius: 3px;
    }

    .product .remove-product:hover {
        background-color: #a44;
    }

    /* Totals section */
    .totals .totals-item {
        float: right;
        clear: both;
        width: 100%;
        margin-bottom: 10px;
    }

    a {
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;

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
</style>
<div class="container my-5 py-3 ">

    <h3>Shopping Cart</h3>
</div>
<main class="container  py-3">
    <!-- <h4>Shopping Cart</h4> -->

    <div class="shopping-cart">

        <div class="column-labels">
            <label class="product-image">Image</label>
            <label class="product-details">Product</label>
            <label class="product-price">Price</label>
            <label class="product-quantity">Quantity</label>
            <label class="product-removal">Remove</label>
            <label class="product-line-price">Total</label>
        </div>

        <?php
        if (mysqli_num_rows($result) > 0) {
            $totalPrice = 0;
            foreach ($result as $row) {
                $product_id = $row['product_id'];
                // $totalPrice += $row['price'];


                $sql1 = "SELECT * FROM cart where u_id = $u_id and product_id = $product_id";
                $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                print_r($sql1);
                $pqty = 0;
                $sub_total = 0;
                foreach ($result1 as $row1) {

                    $pqty = $row1['qty'];
                }
                $main = $pqty == 0 ? 'disabled' : '';
                // $sub_total = $row['price'] *
        ?>

                <div class="product d-flex">
                    <div class="product-image">
                        <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg">
                    </div>
                    <div class="product-details">
                        <div class="product-title"><?= $row['product_title'] ?></div>
                        <p class="product-description"><?= $row['product_description'] ?></p>
                    </div>
                    <div class="product-price"><?= $row['price'] ?></div>
                    <!-- <div class="product-quantity">
                <input type="number" value="2" min="1">
            </div> -->
                    <div class="input-group mb-3 " style="width: 117px;margin-right: 23px;">
                        <div class="input-group-prepend">
                            <!-- <button class="input-group-text minus-btn" onclick="addCart(' . $product_id . ',' . true . ')" ' . $main  . '>-</button> -->
                            <button class="input-group-text minus-btn" onclick="addCart(<?php echo $product_id ?>, true)" <?= $main ?> style="height: 38px;border-radius: 4px;">-</button>
                        </div>
                        <input value=<?= $pqty ?> type="number" id="" class=" text-center form-control get-value" aria-label="Amount (to the nearest dollar)" min="0">
                        <div class="input-g roup-append">
                            <button class="input-group-text minus-btn" onclick="addCart(<?php echo $product_id ?>, false)">+</button>

                        </div>
                    </div>
                    <div class="product-removal">
                        <a href="delete_cart.php?cart_id=<?= $row['cart_id']; ?>" class="remove-product">

                            Remove
                        </a>
                    </div>
                    <div class="product-line-price" style="height:38px !important;">25.98</div>
                </div>

        <?php
            }

            echo '<p class="text-right">Total Amount : ₹ ' .  $totalPrice . ' </p>';
            echo '<div class="d-flex justify-content-between">';
            echo  '<button class="shopping">Continue Shopping</button>';
            echo  '<button class="checkout">Checkout</button>';
            echo '</div>';
        } else {
            echo '<h2>No Data Found</h2>';
        }
        ?>





    </div>
</main>
<?php include './common/footer.php'; ?>
<script src='./js/jquery.js'></script>
<script type="text/javascript">
    $(Document).ready(function() {
        function loadTable() {
            getProducts();
        }
        loadTable();


        $("#search").on("keyup", function() {
            var search_term = $(this).val();

            $.ajax({
                url: "product_search.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });

        });
    });
    const getProducts = () => {

        $.ajax({
            url: "product_view.php",
            type: "GET",
            success: function(data) {
                $("#table-data").html(data);
            }
        });
    }
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function addCart(value, isminus) {
        $.ajax({
            url: "add_to_cart.php",
            type: "GET",
            data: {
                product_id: value,
                isminus: isminus
            },
            success: function(data) {
                getProducts();
                changeCountValue(data);
            }
        });
    }
</script>

<script>
    function loadCategoryData(category) {
        // var search_term = $(this).val();
        // console.log(search_  term);
        // alert('called')
        $.ajax({
            url: "product_view.php",
            type: "POST",
            data: {
                category: category
            },
            success: function(data) {
                if (data.trim() !== '') { // check if data is not empty
                    $("#table-data").html(data);
                } else {
                    $("#table-data").html('<h2 style="text-align:center;">No data found.</h2>');
                }
            },
            error: function() {
                $("#table-data").html('<p>Error loading data.</p>');
            }
        });
    }
</script>