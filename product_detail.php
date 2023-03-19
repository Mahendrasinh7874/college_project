<?php include 'common.php';

include 'admin/config.php';

$product_id = $_GET['product_id'];
$sql = "select * from product where product_id='{$product_id}'";


$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($result);

?>


<div class="container my-5">
    <div class="row row-sm">
        <div class="col-md-6 _boxzoom">

            <div class="picZoomer ">
                <img class="w-100"  src='./admin/uploads/<?php echo $data['image'] ?>' alt='<?php echo $data['product_title'] ?>' alt="">
                <!-- <img class="my_img" src="https://s.fotorama.io/1.jpg" alt=""> -->


            </div>
        </div>
        <div class="col-md-6">
            <div class="_product-detail-content">
                <p class="_p-name"><?= $data['product_title'] ?></p>
                <div class="_p-price-box">
                    <div class="p-list">
                        <span> M.R.P. : <i class="fa fa-inr"></i> <del> 1399 </del> </span>
                        <span class="price"> <i class="fa fa-inr"></i> <?= $data['price'] ?> </span>
                    </div>
                    <div class="_p-add-cart">

                    </div>
                    <div class="_p-features">
                        <!-- <span> <?= $data['product_description'] ?> -->
                        <span> Description About this product:- </span>
                        Solid color polyester/linen full blackout thick sunscreen floor curtain
                        Type: General Pleat
                        Applicable Window Type: Flat Window
                        Format: Rope
                        Opening and Closing Method: Left and Right Biparting Open
                        Processing Accessories Cost: Included
                        Installation Type: Built-in
                        Function: High Shading(70%-90%)
                        Material: Polyester / Cotton
                        Style: Classic
                        Pattern: Embroidered
                        Location: Window
                        Technics: Woven
                        Use: Home, Hotel, Hospital, Cafe, Office
                        Feature: Blackout, Insulated, Flame Retardant
                        Place of Origin: India
                        Name: Curtain
                        Usage: Window Decoration
                        Keywords: Ready Made Blackout Curtain
                    </div>
                    <form action="" method="post" accept-charset="utf-8">
                        <ul class="spe_ul"></ul>
                        <div class="_p-qty-and-cart">
                            <div class="_p-add-cart">
                                <!-- <button class="btn-theme btn buy-btn" tabindex="0">
                                    <i class="fa fa-shopping-cart"></i> Buy Now
                                </button> -->
                                <!-- <a href="add_to_cart.php?product_id=<?php echo $data['product_id']; ?>" class="btn-theme btn btn-success" tabindex="0">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a> -->
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