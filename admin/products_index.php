<?php
include 'header.php';
include 'config.php';
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

<div class=" mr-3 mt-3" style="width: 82%; height: 500px; margin: auto">
    <div class="row ml-2 mt-2 mr-2">
        <div class="col-md-8">
            <a href="add_product.php">
                <input type="submit" value="Add Product" class="btn btn-info">
            </a>
        </div>
        
    </div>
    <?php
    // $sql = "SELECT * FROM product";
    $sql = "SELECT product.product_id, product.product_title, product.price, brands.brand_title, category.category_name,product.image
    FROM product
    INNER JOIN brands ON product.product_brand_id = brands.brand_id
    INNER JOIN category ON product.product_category_id = category.cate_id;";
    $result = mysqli_query($conn, $sql);
    $count = 0;


    if (mysqli_num_rows($result) > 0) {

        echo ' <table class="table my-4">';
        echo ' <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product Title</th>
        <th scope="col">Category</th>
        <th scope="col">Brand</th>
        <th scope="col">Product Price</th>
        <th scope="col">Product Image</th>
        <th scope="col">Operations</th>
    </tr>
</thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
            echo ' <tr>';
            echo "<td>$count</td>";
            echo "<td>" . $row['product_title'] . "</td>";
            echo "<td>" . $row['category_name'] . "</td>";
            echo "<td>" . $row['brand_title'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>    <a href='uploads/$row[image]' target='_blank' ><img width='100' height='100' src='uploads/$row[image]' class='' alt='$row[product_title]'></a></td>";

            echo '<td><a href="product_view.php?product_id=' . $row['product_id'] . '"  type="button" class="btn btn-primary mx-1">View</a>
        <a  href="update_product.php?product_id=' . $row['product_id'] . '" type="button" class="btn btn-success mx-1">Update</a>
        <a type="button" href="delete_product.php?product_id=' . $row['product_id'] . '" onclick="return confirmDelete();" class="btn btn-danger mx-1">Delete</a>  </td>';
            echo "</tr>";
        }
        echo '</tbody>';
        echo "</table>";
    } else {
        echo ' <table class=" bordered text-center table my-4">';
        echo '<tbody>';
        echo ' <tr >';
        echo "<td class='my-5'><h2 class='my-5'>Not Found</h2></td>";
        echo '</tbody>';
        echo "</table>";
    }

    ?>

    </tr>

    </tbody>
    </table>

    <div id="preview-modal" class="modal w-50 m-auto" style="display: none">
        <button onclick="closePreview()" class="close btn"><i class="fa fa-window-close"></i></button>
        <img id="preview-image" src="" alt="">
    </div>
</div>

<script>
    const confirmDelete = () => {
        console.log("delete");
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="plugins/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="plugins/moment/moment.min.js"></script> -->
<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</div>