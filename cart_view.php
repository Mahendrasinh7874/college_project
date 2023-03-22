<?php

include './common.php';
include './admin/config.php';
if (isset($_SESSION["u_id"]) === ''  && empty($_SESSION["u_id"])) {

    header("location:http://localhost/college_project/");
}
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



    <div class='shopping-cart'>

        <div class='column-labels'>
            <label class='product-image'>Image</label>
            <label class='product-details'>Product</label>
            <label class='product-price'>Price</label>
            <label class='product-quantity'>Quantity</label>
            <label class='product-removal pl-5'>Remove</label>
            <label class='product-line-price'>Total</label>
        </div>
        <div id="cart-data">
        </div>


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
                getCartData();
            }
        });
    }
</script>

<script>
    $(Document).ready(function() {
        function loadTable() {
            getCartData();
        }
        loadTable();

    });
    const getCartData = () => {

        $.ajax({
            url: "cart_data.php",
            type: "GET",
            success: function(data) {
                $("#cart-data").html(data);
            }
        });
    }
</script>