<!-- 301 × 148 px radio of product image -->

<?php
include 'admin/config.php';

include './common.php';
?>

<section class="trend py-3">
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="title">
        <h4 style="font-weight:bold ;">All Products</h4>
      </div>
      <select>
        <option value="">Default Shorting</option>
        <option value="">Short by price</option>
        <option value="">Short by popularity</option>
        <option value="">Short by rating</option>
        <option value="">Short by sale</option>
      </select>
    </div>

    <div class="trend-grid row" style="grid-gap:0;">
      <?php
      $sql =  'SELECT * FROM product';
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <a href="product_detail.php">

            <div class="trend-item col-md-3 mr-3" style="position: relative ">
              <img style="width:150px;height:150px;" src="<?= !empty($row['image']) ? './admin/uploads/' . $row['image'] : '' ?>" alt="best product" class="hoverable  m-auto" />
              <a data-toggle="tooltip" data-placement="top" title="Add to Wishlist" href="add_wishlist.php?product_id=<?php echo $row['product_id']; ?>" class="wistlist-image" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                <i class="fa-regular fa-heart fa-2x" style="font-size:20px;"></i>
              </a>
              <div class="trend-item-content">
                <h4><?= !empty($row['product_title']) ? $row['product_title'] : '' ?></h4>
                <h4><?= !empty($row['price']) ? '₹ ' . $row['price'] : '' ?></h4>
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
          </a>
      <?php }
      } ?>
    </div>
  </div>
</section>
<?php include './common/footer.php'; ?>


<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>