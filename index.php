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

        #loader {
            position: fixed;
            z-index: 999;
            top: 0;

            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            /* background-color: red; */
        }

        .loader-icon {
            display: inline-block;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 6px solid #000;
            border-color: #000 transparent #000 transparent;
            animation: loader 1.2s linear infinite;
        }

        @keyframes loader {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <!--Main layout-->


    <div class="row wow fadeIn p-0 m-0" data-wow-delay="0.4s">
        <div id="loader">
            <div class="loader-icon"></div>
        </div>
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
                        <img src="./css/images/7901636.jpg" height="600" alt="First slide">
                        <div class="carousel-caption">
                            <h4>New collection</h4>
                            <br>
                        </div>
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                        <img src="./css/images/7995902.jpg" height="600" alt="Second slide">
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
    <div class="container mt-5" style="margin-top:30px;">
        <div class="raw" id="">
            <form class="form-inline">
                <div class="form-group  col-md-12">
                    <i class="fas fa-search pl-3" style="position: absolute"></i>
                    <input id="search" class="form-control form-control-navbar pl-5" style="width:100%; " type="search" placeholder="Search...." aria-label="Search">
                </div>
            </form>
        </div>
    </div>
    <div class="container my-4 py-4">
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

                                <?php }
                                } ?>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-9">
                        <div class="card" style="min-height: 450px;">
                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-4">
                                        <h4>
                                            Products
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row" id="table-data">

                                </div>





                            </div>
                        </div>


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
<!-- <?php

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

        ?> -->

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

// 
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

<script>
    jQuery(window).on('load', function() {

        $('#loader').fadeOut('slow', function() {
            $(this).remove();
        });

    });
    // window.addEventListener("load", function() {
    //     // alert('loaded');

    //     // console.log('first');

    //     var loader = document.getElementById("loader");
    //     console.log(loader);
    //     loader.style.display = "block";
    //     setTimeout(() => {
    //         loader.style.display = "none";

    //     }, 1000);
    // });
</script>