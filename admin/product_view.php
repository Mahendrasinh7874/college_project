<?php
include 'header.php';
include 'config.php';

$product_id = $_GET['product_id'];

//$conn = $conn = mysqli_connect("localhost", "root", "", "cms") or die(mysqli_connect_error());

$sql = "SELECT product.product_id, product.product_title,product.product_description, product.price, brands.brand_title, category.category_name,product.image
FROM product
INNER JOIN brands ON product.product_brand_id = brands.brand_id
INNER JOIN category ON product.product_category_id = category.cate_id
WHERE product.product_id = $product_id";


$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $output = '

<div class=" mr-3 mt-3" style="width: 82%; height: 500px; margin: auto;">
<table class="table table-striped" width="75% cellspacing="0" cellpadding="10px"> 
                    <tr> 
</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row["product_id"];
        $output .= "<tr><h3>Product Id :&nbsp;{$row["product_id"]}</h3></tr>
                    <a href='update_product.php?product_id=$product_id'><input type='submit' class='btn btn-primary' value='Update'>&nbsp;&nbsp;
                    <a onclick=\"return confirmDelete();\" href='delete_product.php?product_id=" . $row["product_id"] . "' ><input class='btn btn-danger' type='submit' value='Delete'></a><br><br>
                    <tr><th>Product Title</th><td>{$row["product_title"]}</td>
                    <tr><th>Category</th><td>{$row["category_name"]}</td></tr>
                    <tr><th>Brand</th><td>{$row["brand_title"]}</td></tr>
                    <tr><th>Product Price</th><td>{$row["price"]}</td></tr>
                    <tr><th>Description</th><td>{$row["product_description"]}</td></tr>
                    <tr><th>Image</th><td>    <a href='uploads/$row[image]' onclick='previewImage(event)'><img width='200' height='150' src='uploads/$row[image]' class='' alt='$row[product_title]'></a></td></tr>
                   </tr>";
    }
    $output .= '</table></div>';
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h3> not found </h3>";
}


?>


<style>
    .modal {
        left: 24%;
        top: 10%;
        width: 50%;
        position: absolute;
        margin: auto;
    }

    .close {
        /* position: relative;
        right: 50%; */
    }
</style>

<div id="preview-modal" class="modal w-50 m-auto" style="display: none">
    <button onclick="closePreview()" class="close btn"><i class="fa fa-window-close"></i></button>
    <img id="preview-image" src="" alt="">
</div>

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

<script>
    function previewImage(event) {
        event.preventDefault();
        const imagePath = event.currentTarget.getAttribute('href');
        const previewImageEl = document.getElementById('preview-image');
        previewImageEl.setAttribute('src', imagePath);
        const previewModalEl = document.getElementById('preview-modal');
        previewModalEl.style.display = 'block';
    }

    function closePreview() {
        const previewModalEl = document.getElementById('preview-modal');
        previewModalEl.style.display = 'none';
    }
</script>