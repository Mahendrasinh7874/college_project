<?php include 'common.php';

include 'admin/config.php';
$u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';


$product_id = $_GET['product_id'];
$sql = "select * from product where product_id='{$product_id}'";




$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($result);


$sql2 = "SELECT * from cart WHERE u_id=$u_id and product_id=$product_id and qty != 0";
$check_result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

$row = mysqli_fetch_assoc($check_result2);
?>


<div class="container my-5">
    <div class="row row-sm">
        <div class="col-md-6 _boxzoom">

            <div class="picZoomer  ">
                <img class="w-100" style="height:75%;" src='./admin/uploads/<?php echo $data['image'] ?>' alt='<?php echo $data['product_title'] ?>' alt="">
                <!-- <img class="my_img" src="https://s.fotorama.io/1.jpg" alt=""> -->


            </div>
        </div>
        <div class="col-md-6">
            <div class="_product-detail-content">
                <p class="_p-name"><?= $data['product_title'] ?></p>
                <div class="_p-price-box">
                    <div class="p-list">
                        <span class="price"> M.R.P. : <i class="fa fa-inr"></i> <?= $data['price'] ?> </span>
                    </div>
                    <div class="_p-add-cart">

                    </div>
                    <div class="_p-features">
                        <span> <?= $data['product_description'] ? $data['product_description'] : '' ?>
                    </div>
                    <form action="" method="post" accept-charset="utf-8">
                        <ul class="spe_ul"></ul>
                        <div class="_p-qty-and-cart">
                            <div class="_p-add-cart">

                            <?php
                            
                            ?>



                                <button class="btn-theme btn buy-btn" tabindex="0">
                                    <i class="fa fa-shopping-cart"></i> Buy Now
                                </button>

                                <?php

                                // $u_id = !empty($_SESSION['u_id']) ? $_SESSION['u_id'] : '0';

                                // print_r($row);
                                if ($row > 0) {
                                    echo  ' <a href="cart_view.php" class="btn-theme btn btn-success" tabindex="0">
                                    <i class="fa fa-shopping-cart"></i> Go to Cart
                                    </a>';
                                } else {
                                    if (!empty($_SESSION['u_id'])) {

                                        echo   ' <button type="button" onclick="addCart(' . $product_id . ')  "  class="btn-theme btn btn-success" >
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>';
                                    } else {
                                        echo   ' <a href="login.php"  "  class="btn-theme btn btn-success" >
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </a>';
                                    }
                                }

                                ?>

                                <input type="hidden" name="pid" value="18" />
                                <input type="hidden" name="price" value="850" />
                                <input type="hidden" name="url" value="" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include './common/footer.php'; ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var decreaseButtons = document.querySelectorAll(".decrease_");
        var increaseButtons = document.querySelectorAll(".increase_");

        for (var i = 0; i < decreaseButtons.length; i++) {
            decreaseButtons[i].addEventListener("click", function() {
                decreaseValue(this);
            });
        }

        for (var i = 0; i < increaseButtons.length; i++) {
            increaseButtons[i].addEventListener("click", function() {
                increaseValue(this);
            });
        }

        function increaseValue(_this) {
            console.log(_this.previousElementSibling.value);
            var value = parseInt(_this.previousElementSibling.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            _this.previousElementSibling.value = value;
        }

        function decreaseValue(_this) {
            var value = parseInt(_this.nextElementSibling.value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            _this.nextElementSibling.value = value;
        }
    });
</script>



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
                window.location.href = 'cart_view.php';

            }
        });
    }
</script>