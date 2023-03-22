<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        display: none;
    }
</style>

<?php
include 'admin/config.php';
session_start();

$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';
// $product_id = $_GET['product_id'];



$sql = "SELECT product.*, category.category_name FROM product JOIN category ON product.product_category_id = category.cate_id";
if (isset($_POST['category'])) {
    $product_category_id = $_POST['category'];
    $sql .= " where category.category_name = '{$product_category_id}'";
}



//echo $sql;
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$output = "";
if ($result) {
    foreach ($result as $row) {
        $product_id = $row['product_id'];
        // wishlist 
        $check = "select * from wishlist where u_id='$u_id' and  product_id='$product_id'";
        $check_result = mysqli_query($conn, $check) or die(mysqli_error($conn));
        // print_r($check_result);

        $isWishlist = mysqli_num_rows($check_result) > 0 ? 'fa-solid fa-heart' : 'fa-regular fa-heart';
        // add to cart list
        $sql1 = "SELECT * FROM cart where u_id = $u_id and product_id = $product_id and qty != 0";
        $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
        $pqty = 0;
        foreach ($result1 as $row1) {
            $pqty = $row1['qty'];
        }
        $main = $pqty == 0 ? 'disabled' : '';
        $isExistCart = mysqli_num_rows($result1);

        $test = $pqty == 0 ? '' : '';

        $addToCart = $isExistCart > 0 ? '
                <div class="input-group mb-3 w-75 m-auto">
                <div class="input-group-prepend">
                <button class="input-group-text minus-btn" onclick="addCart(' . $product_id . ',' . true . ')" ' . $main  . '>-</button>
                </div>
                <input   value=' . $pqty . ' type="number" id=""  class=" text-center form-control get-value" aria-label="Amount (to the nearest dollar)"  min="0">
                <div class="input-g roup-append">
                <button class="input-group-text minus-btn" onclick="addCart(' . $product_id . ',' . false . ')">+</button>
                </div>
            </div>'

            :  '<button onclick="addCart(' . $product_id . ',' . false . ')" class="chevron-icon btn custom-btn btn-block">
            <!-- <i class="fas fa-shopping-cart"></i>  -->
            Add to Cart
            </button>';
        $output .=  '
        <a href="product_detail.php?product_id=' . $row['product_id'] . '"">
        <div class="col-md-4 mb-4">
        <div class="trend-item" style="position: relative">
            <img style="width:150px;height:150px;" src="' . (!empty($row['image']) ? './admin/uploads/' . $row['image'] : '') . '" alt="best product" class="hoverable  m-auto" />
            
            <a data-toggle="tooltip" data-placement="top" title="Add to Wishlist" href="add_wishlist.php?product_id=' . $row['product_id'] . '" class="wistlist-image" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                <i class=" ' . $isWishlist  . '" style="font-size:20px;"></i>
            </a>
            <div class="trend-item-content">
                <h4>' . (!empty($row['product_title']) ? $row['product_title'] : '') . '</h4>
                <!-- <h5>' . (!empty($row['category_name']) ? $row['category_name'] : '') . '</h5> -->
                <h4>' . (!empty($row['price']) ? '₹ ' . $row['price'] : '') . '</h4>
                ' . $addToCart . '
            </div>
        </div>
    </div>
</button>
';
    }
} else {
    $_SESSION['not_found'] = 'not_found';
}
//mysqli_close($conn);
echo $output;


?>