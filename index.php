<?php
include './common.php';
include 'admin/config.php';

?>



<main>

    <style>
        .custom-checkbox .custom-control-label::before {
            border-radius: 0.25rem;
            padding: 0;
            margin: 0 -23px !important;
        }

        .active {
            background-color: #dc9831 !important;
            border: none !important;
        }
    </style>
    <!--Main layout-->


    <div class="row wow fadeIn p-0 m-0" data-wow-delay="0.4s">
        <div class="col-lg-12 p-0">
            <!--Carousel Wrapper-->
            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                        <img src="./css/images/pexels-noah-erickson-404280.jpg" height="600" alt="First slide">
                        <div class="carousel-caption">
                            <h4>New collection</h4>
                            <br>
                        </div>
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                        <img src="./css/images/pexels-pixabay-159643.jpg" height="600" alt="Second slide">
                        <div class="carousel-caption">
                            <h4>Get discount!</h4>
                            <br>
                        </div>
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                        <img src="./css/images/pexels-olia-danilevich-4974912.jpg" height="600" alt="Third slide">
                        <div class="carousel-caption">
                            <h4>Buy now </h4>
                            <br>
                        </div>
                    </div>
                    <!--/Third slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>
    <div class="container my-5 py-4">
        <div class="row">

            <!--Sidebar-->
            <div class=" w-100">
                <div class="row mb-5">
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <div class="card-header">Categories</div>
                            <div class="list-group list-group-flush">
                                <a href="../college_project" class="list-group-item list-group-item-action for-active active">All</a>

                                <?php
                                $sql =  'SELECT * FROM category';
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) { ?>

                                        <button onclick="loadCategoryData('<?php echo $row['category_name']; ?>')" class=" list-group-item list-group-item-action for-active"><?= $row['category_name'] ?></button>
                                        <!-- <a href="#" class="list-group-item list-group-item-action for-active active">Laptops &amp; Notebooks (5)</a>
                                        <a href="#" class="list-group-item list-group-item-action for-active">&nbsp;&nbsp;&nbsp;- Macs (0)</a>
                                        <a href="#" class="list-group-item list-group-item-action for-active">&nbsp;&nbsp;&nbsp;- Windows (0)</a>
                                        <a href="#" class="list-group-item list-group-item-action for-active">Tablets (2)</a> -->
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <!-- <div class="card">
                            <div class="card-header">Filter</div>
                            <div class="card-body p-1">
                                <div class="card border-0 b-3">
                                    <div class="card-header p-2 bg-white" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false">
                                        <p class="m-0 h6">Brand</p>
                                    </div>
                                    <div class="card-body p-0 collapse show" id="collapseExample1">
                                        <ul class="list-group list-group-flush" style="height:200px;overflow:auto;">
                                            <li class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Google</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Microsoft</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                    <label class="custom-control-label" for="customCheck3">Apple</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">Samsung</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">Amazon</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>
                                            <li class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                    <label class="custom-control-label" for="customCheck6">Asus</label>

                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>

                                            <li class="list-group-item p-2 d-flex justify-content-between align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label" for="customCheck7">Sony</label>
                                                </div>
                                                <span class="badge badge-secondary badge-pill">14</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-block btn-primary">Filter</button>
                            </div>
                        </div>
                     -->

                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Sort By:</span>
                                            </div>
                                            <select class="form-control" id="" name="">
                                                <option value="">Default</option>
                                                <option value="">Name (A - Z)</option>
                                                <option value="">Name (Z - A)</option>
                                                <option value="">Price (Low &gt; High)</option>
                                                <option value="">Price (High &gt; Low)</option>
                                                <option value="">Rating (Highest)</option>
                                                <option value="">Rating (Lowest)</option>
                                                <option value="">Model (A - Z)</option>
                                                <option value="">Model (Z - A)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Show:</span>
                                            </div>
                                            <select class="form-control" id="" name="">
                                                <option value="">15</option>
                                                <option value="">25</option>
                                                <option value="">50</option>
                                                <option value="">75</option>
                                                <option value="">100</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row" id="table-data">
                                </div>

                                <?php
                                if (isset($_SESSION['not-found'])) {
                                    echo '<h2>Not Found</h2>';
                                }
                                ?>

                            </div>
                        </div>
                        <!-- <div class="card-footer p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="pagination m-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-right mb-0 mt-1">Showing 1 to 12 of 12 (1 Pages)</p>
                                </div>
                            </div>
                        </div>
                     -->

                    </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row"></div>


            <!--/.Sidebar-->

            <!--Main column-->
            <!-- <div class="col-lg-12"> -->

            <!--First row-->
            <!-- <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s"> -->

            <!-- <div class="widget-wrapper"> -->



            <!-- </div> -->
            <!-- </div> -->
            <!--/.First row-->


        </div>
    </div>
    <!--/.Main layout-->

</main>

<!--Footer-->
<?php include './common/footer.php'; ?>

<!--/.Footer-->

<script>
    new WOW().init();
</script>
<script>
    const listItems = document.querySelectorAll('.for-active');

    listItems.forEach(item => {
        item.addEventListener('click', () => {
            listItems.forEach(item => {
                item.classList.remove('active');
            });
            item.classList.add('active');
        });
    });
</script>

<script>

</script>
<?php

if (isset($_SESSION['not_login'])) {
    echo '<script>
        Toastify({
          text: "Please Register or Login to Add This Product!!",
          duration: 3000,
          destination: "https://github.com/apvarun/toastify-js",
          newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "linear-gradient(to right, #b00020, #ff8b8e)",

        },
        onClick: function() {} // Callback after click
        }).showToast();
      </script>';
}
unset($_SESSION['not_login']);

?>
<?php

if (isset($_SESSION['not-loggedin'])) {
    echo '<script>
        Toastify({
          text: "Please Register or Login to  This Product!!",
          duration: 3000,
          destination: "https://github.com/apvarun/toastify-js",
          newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "linear-gradient(to right, #b00020, #ff8b8e)",

        },
        onClick: function() {} // Callback after click
        }).showToast();
      </script>';
}
unset($_SESSION['not-loggedin']);

?>

<?php

if (isset($_SESSION['already_wishlist'])) {
    echo '<script>
        Toastify({
            text: "This product is already in your wishlist!",
            duration: 3000,
          destination: "https://github.com/apvarun/toastify-js",
          newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "linear-gradient(to right, #f8d700, #f5a623)",

        },
        onClick: function() {} // Callback after click
        }).showToast();
      </script>';
    unset($_SESSION['already_wishlist']);
}

?>

<?php

if (isset($_SESSION['success_wishlist'])) {
    echo '<script>
        Toastify({
            text: "Product has been added to your wishlist!",
            duration: 3000,
          destination: "https://github.com/apvarun/toastify-js",
          newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",

        },
        onClick: function() {} // Callback after click
        }).showToast();
      </script>';
}
unset($_SESSION['success_wishlist']);



if (isset($_SESSION['exits_cart'])) {
    echo '<script>
        Toastify({
            text: "This product is already in your Cart!",
            duration: 3000,
          destination: "https://github.com/apvarun/toastify-js",
          newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "linear-gradient(to right, #f8d700, #f5a623)",

        },
        onClick: function() {} // Callback after click
        }).showToast();
      </script>';
}
unset($_SESSION['exits_cart']);


if (isset($_SESSION['success_cart'])) {
    echo '<script>
        Toastify({
            text: "Product has been added to your Cart!",
            duration: 3000,
          destination: "https://github.com/apvarun/toastify-js",
          newWindow: true,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",

        },
        onClick: function() {} // Callback after click
        }).showToast();
      </script>';
}
unset($_SESSION['success_cart']);

?>


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
            }
        });
    }
</script>

<script>
    function loadCategoryData(category) {
        console.log(category, 'jsjd')
        // var search_term = $(this).val();
        // console.log(search_  term);
        // alert('called')
        $.ajax({
            url: "product_view.php",
            type: "POST",
            data: {
                category: category
            },
            success: function(data) {
                if (data.trim() !== '') { // check if data is not empty
                    $("#table-data").html(data);
                } else {
                    $("#table-data").html('<h2 style="text-align:center;">No data found.</h2>');
                }
            },
            error: function() {
                $("#table-data").html('<p>Error loading data.</p>');
            }
        });
    }
</script>