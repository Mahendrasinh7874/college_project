<?php

include './common.php';
include './admin/config.php';
if (isset($_SESSION["u_id"]) === ''  && empty($_SESSION["u_id"])) {

    header("location:http://localhost/college_project/");
}
$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';


$sql = "SELECT * FROM wishlist 
LEFT JOIN product ON wishlist.product_id = product.product_id 
LEFT JOIN category ON product.product_category_id = category.cate_id 
LEFT JOIN brands ON product.product_brand_id = brands.brand_id 
WHERE wishlist.u_id = $u_id;
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

    .product {
        display: flex !important;
    }

    a {
        color: black;
        text-decoration: none !important;
    }

    a:hover {
        color: black;
    }

    .product-removal {
        float: left;
        width: 9%;
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
    .shopping-cart {
        display: flex !important;
        flex-direction: column;
    }

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
        padding: 0 !important;
        margin: 0 !important;
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
</style>
<div class="container my-5 py-3 ">

    <h3>Wishlist</h3>
</div>
<main class="container  py-3">
    <!-- <h4>Shopping Cart</h4> -->


    <div class="shopping-cart">

        <div class="column-labels">
            <label class="product-image">Image</label>
            <label class="product-details">Product</label>
            <label class="product-price" style="padding:0 100px;">Price</label>
            <!-- <label class="product-quantity">Quantity</label> -->
            <label class="product-removal">Remove</label>
            <!-- <label class="product-line-price">Price</label> -->
        </div>

        <form action="proceed_to_cart.php" method="POST">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $totalPrice = 0;
                foreach ($result as $row) {
                    $totalPrice += $row['price'];
            ?>

                    '<div class="product">
                        <div class="product-image">
                            <img src="./admin/uploads/<?= $row['image'] ?>">
                        </div>
                        <div class="product-details">
                            <div class="product-title"><?= $row['product_title'] ?></div>
                            <p class="product-description"><?= $row['product_description'] ?></p>
                        </div>
                        <div class="product-price" style="padding:0 100px;"><?= $row['price'] ?></div>

                        <!-- <div class="product-quantity">
                            <input type="number" value="2" min="1">
                        </div> -->
                        <div class="product-removal">
                            <a href="delete_wishlist.php?wishlist_id=<?= $row['wishlist_id']; ?>" class="remove-product">
                                Remove
                            </a>
                        </div>
                        <!-- <div class="product-line-price">25.98</div> -->
                    </div>

                    <input type='hidden' name='product[<?= $row['product_id'] ?>]' value=<?= $row['product_id'] ?>>
            <?php
                }

                echo '<p class="text-right">Total Amount : ₹ ' .  $totalPrice . ' </p>';
                echo '<input class="checkout" type="submit" name="submit" value="Proceed to cart" />';
            } else {
                echo '<h2>No Product Added in Wishlist</h2>';
            }
            ?>
        </form>








    </div>
</main>
<?php include './common/footer.php'; ?>



<script src="./js/jquery.js"></script>