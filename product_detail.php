<?php include 'common.php'; ?>


<div class="container my-5">
    <div class="row row-sm">
        <div class="col-md-6 _boxzoom">

            <div class="picZoomer ">
                <img class="my_img" src="https://s.fotorama.io/1.jpg" alt="">

            </div>
        </div>
        <div class="col-md-6">
            <div class="_product-detail-content">
                <p class="_p-name"> Milton Bottle </p>
                <div class="_p-price-box">
                    <div class="p-list">
                        <span> M.R.P. : <i class="fa fa-inr"></i> <del> 1399 </del> </span>
                        <span class="price"> Rs. 699 </span>
                    </div>
                    <div class="_p-add-cart">
                        <div class="_p-qty">
                            <span>Add Quantity</span>
                            <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                            <input type="number" name="qty" id="number" value="1" />
                            <div class="value-button increase_" id="" value="Increase Value">+</div>
                        </div>
                    </div>
                    <div class="_p-features">
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
                                <button class="btn-theme btn buy-btn" tabindex="0">
                                    <i class="fa fa-shopping-cart"></i> Buy Now
                                </button>
                                <button class="btn-theme btn btn-success" tabindex="0">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </button>
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