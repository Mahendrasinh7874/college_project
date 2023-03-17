<!-- 301 × 148 px radio of product image -->

<?php

include './common.php';
?>

<section class="trend my-5">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="title">
        <h4>All Products</h4>
      </div>
      <select>
        <option value="">Default Shorting</option>
        <option value="">Short by price</option>
        <option value="">Short by popularity</option>
        <option value="">Short by rating</option>
        <option value="">Short by sale</option>
      </select>
    </div>

    <div class="trend-grid">
      <!-- item -->
      <div class="trend-item" style="position: relative">
        <img
          src="css/images/best-selling-1.png"
          class="hoverable"
          alt="best product"
        />
        <span
          class="wistlist-image"
          data-toggle="tooltip"
          data-placement="top"
          title="Add to Wishlist"
        >
          <!-- <i class="fa fa-heart" aria-hidden="true"></i> -->
          <i class="fa-regular fa-heart fa-2x"></i>
        </span>
        <div class="trend-item-content">
          <h4>Brown Sofa With Pillows</h4>
          <h4>$60.00</h4>
          <div class="stars">
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="far fa-star"></i></span>
          </div>
          <button class="chevron-icon btn custom-btn btn-block">
            <!-- <i class="fas fa-shopping-cart"></i>  -->
            Add to Cart
          </button>
        </div>
      </div>
      <!-- end of item -->
      <!-- item -->
      <div class="trend-item">
        <img src="css/images/best-selling-2.png" alt="best product" />
        <span
          class="wistlist-image"
          data-toggle="tooltip"
          data-placement="top"
          title="Add to Wishlist"
        >
          <!-- <i class="fa fa-heart" aria-hidden="true"></i> -->
          <i class="fa-regular fa-heart fa-2x"></i>
        </span>
        <div class="trend-item-content">
          <h4>Comfortable Pink Sofa</h4>
          <h4>$80.00</h4>
          <div class="stars">
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="far fa-star"></i></span>
          </div>
          <button class="chevron-icon btn custom-btn btn-block">
            <!-- <i class="fas fa-shopping-cart"></i>  -->
            Add to Cart
          </button>
        </div>
      </div>
      <!-- end of item -->
      <!-- item -->
      <div class="trend-item">
        <img src="css/images/best-selling-3.png" alt="best product" />
        <span
          class="wistlist-image"
          data-toggle="tooltip"
          data-placement="top"
          title="Add to Wishlist"
        >
          <!-- <i class="fa fa-heart" aria-hidden="true"></i> -->
          <i class="fa-regular fa-heart fa-2x"></i>
        </span>
        <div class="trend-item-content">
          <h4>Stylish Red Chair</h4>
          <h4>$30.00</h4>
          <div class="stars">
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="far fa-star"></i></span>
          </div>
          <button class="chevron-icon btn custom-btn btn-block">
            <!-- <i class="fas fa-shopping-cart"></i>  -->
            Add to Cart
          </button>
        </div>
      </div>
      <!-- end of item -->
    </div>
  </div>
</section>

<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
