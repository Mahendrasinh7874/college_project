<?php
include 'admin/config.php';
session_start();

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

        $output .=  '
        <a href="product_detail.php?product_id=' . $row['product_id'] . '"">
        <div class="col-md-4 mb-4">
        <div class="trend-item" style="position: relative">
            <img style="width:150px;height:150px;" src="' . (!empty($row['image']) ? './admin/uploads/' . $row['image'] : '') . '" alt="best product" class="hoverable  m-auto" />
            
            <a data-toggle="tooltip" data-placement="top" title="Add to Wishlist" href="add_wishlist.php?product_id=' . $row['product_id'] . '" class="wistlist-image" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                <i class="fa-regular fa-heart " style="font-size:20px;"></i>
            </a>
            <div class="trend-item-content">
                <h4>' . (!empty($row['product_title']) ? $row['product_title'] : '') . '</h4>
                <!-- <h5>' . (!empty($row['category_name']) ? $row['category_name'] : '') . '</h5> -->
                <h4>' . (!empty($row['price']) ? '₹ ' . $row['price'] : '') . '</h4>
                <div class="stars">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                </div>
                <a href="add_to_cart.php?product_id=' . $row['product_id'] . '" class="chevron-icon btn custom-btn btn-block">
                    <!-- <i class="fas fa-shopping-cart"></i>  -->
                    Add to Cart
                </a>
            </div>
        </div>
    </div>
    </a>
';
    }
} else {
    $_SESSION['not_found'] = 'not_found';
}
//mysqli_close($conn);
echo $output;
