<?php
include 'header.php';
include 'config.php';

$product_id = $_GET['product_id'];

//$conn = $conn = mysqli_connect("localhost", "root", "", "cms") or die(mysqli_connect_error());

$sql = "SELECT product.product_id, product.product_title, product.price, brands.brand_title, category.category_name,product.image
FROM product
INNER JOIN brands ON product.product_brand_id = brands.brand_id
INNER JOIN category ON product.product_category_id = category.cate_id;";


$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $output = '

<div class=" mr-3 mt-3" style="width: 82%; height: 500px; margin: auto;">
<table class="table table-striped" width="100% cellspacing="0" cellpadding="10px"> 
                    <tr>
                  
                 
</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row["product_id"];
        $output .= "<tr><h3>User Id :&nbsp;{$row["product_id"]}</h3></tr>
                    <a href='update_user.php?product_id=$product_id'><input type='submit' class='btn btn-primary' value='Update'>&nbsp;&nbsp;
                    <a onclick=\"return confirmDelete();\" href='delete_product.php?product_id=" . $row["product_id"] . "' ><input class='btn btn-danger' type='submit' value='Delete'></a><br><br>
                    <tr><th>Product Title</th><td>{$row["product_title"]}</td>
                    <tr><th>Category</th><td>{$row["category_name"]}</td></tr>
                    <tr><th>Brand</th><td>{$row["brand_title"]}</td></tr>
                    <tr><th>Product Price</th><td>{$row["price"]}</td></tr>
                    <tr><th>Image</th><td><img width='150' height='100' src=uploads/$row[image] class='rounded-circle' alt='$row[product_title]'></td></tr>
                   </tr>";
    }
    $output .= '</table></div>';
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h3> not found </h3>";
}

?>

<script>
    const confirmDelete = () => {
        // console.log("delete");
        if (confirm("Are you sure you want to delete this user?")) {
            return true;
        } else {
            return false;
        }
    }
</script>