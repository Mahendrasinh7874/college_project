<style>
    .remove-product {
        border: 0;
        padding: 4px 8px;
        background-color: #c66;
        text-decoration: none;
        font-family: var(--font-bold);
        color: white !important;
        font-size: 12px;
        cursor: pointer;
        border-radius: 3px;
    }

    .remove-product:hover {
        text-decoration: none !important;
    }

    .w-117 {
        width: 117px !important;
    }

    .mr-23 {
        margin-right: 23px;
    }

    .minu {
        height: 38px;
        border-radius: 4px;
    }
</style>


<?php
include './admin/config.php';
session_start();
$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';



$sql = "SELECT * FROM cart 
LEFT JOIN product ON cart.product_id = product.product_id 
LEFT JOIN category ON product.product_category_id = category.cate_id 
LEFT JOIN brands ON product.product_brand_id = brands.brand_id 
WHERE cart.u_id = $u_id";


$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$output = '';

if (mysqli_num_rows($result) > 0) {
    $totalPrice = 0;
    foreach ($result as $row) {


        $product_id = $row['product_id'];

        $sql1 = "SELECT * FROM cart where u_id = $u_id and product_id = $product_id";
        $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        $pqty = 0;

        foreach ($result1 as $row1) {
            $pqty = $row1['qty'];
        }
        $main = $pqty == 0 ? 'disabled' : '';
        $total = $pqty * $row['price'];
        $totalPrice += $row['price']  * $pqty;

        $output .= "

                <div class='product d-flex'>
                    <div class='product-image'>
                        <img src='admin/uploads/{$row['image']}'>
                    </div>
                    <div class='product-details'>
                        <div class='product-title'> {$row['product_title']}</div>
                        <p class='product-description'>{$row['product_description']}</p>
                    </div>
                    <div class='product-price'>{$row['price']}</div>

                    <div class='input-group mb-3  w-117 mr-23'>
                        <div class='input-group-prepend'>
    <button class='input-group-text minus-btn minu' onclick='addCart($product_id,true)' <?= $main ?>-</button>
    </div>
    <input value='$pqty' type='number' id='' class=' text-center form-control get-value' aria-label='Amount (to the nearest dollar)' min='0'>
    <div class='input-g roup-append'>
        <button class='input-group-text minus-btn' onclick='addCart($product_id)'>+</button>

    </div>
    </div>
    <div class='product-removal pl-5 mt-2'>
    
    <a href='delete_cart.php?cart_id={$row['cart_id']}' class='remove-product '>
        Remove
    </a>
</div>
<div class='product-line-price' style='height:38px !important;'>{$total}</div>
    </div>
    
    </div>


        
             </div>
      





</div>";
    }
    mysqli_close($conn);
    echo $output;
    echo "   <p class='text-right'>Total Amount : ₹ $totalPrice  </p>
        <div class='d-flex justify-content-between'>
        <button class='shopping'>Continue Shopping</button>
        <button class='checkout'>Checkout</button>";
} else {
    echo "<div class='text-center'><img src='./css/images/no-product-found.jpg' height='400'  width='400'> </div>";
}
