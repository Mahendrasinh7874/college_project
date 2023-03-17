<?php
include './common.php';
?>


<main>

    <!--Main layout-->
    <div class="container">
        <div class="row">

            <!--Sidebar-->
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">

                <div class="widget-wrapper">
                    <h4>Categories:</h4>
                    <br>
                    <div class="list-group" style="background-color: #f4f4f4;">
                        <a href="#" class="list-group-item active">Woman</a>
                        <a href="#" class="list-group-item">Man</a>
                        <a href="#" class="list-group-item">Shoes</a>
                        <a href="#" class="list-group-item">T-shirt</a>
                        <a href="#" class="list-group-item">Jewellery</a>
                    </div>
                </div>



            </div>
            <!--/.Sidebar-->

            <!--Main column-->
            <div class="col-lg-8">

                <!--First row-->
                <div class="row wow fadeIn" data-wow-delay="0.4s">
                    <div class="col-lg-12">
                        <div class="divider-new">
                            <h2 class="h2-responsive">What's new?</h2>
                        </div>


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
                                    <img src="http://mdbootstrap.com/img//Photos/Slides/img%20(107).jpg" alt="First slide">
                                    <div class="carousel-caption">
                                        <h4>New collection</h4>
                                        <br>
                                    </div>
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img src="http://mdbootstrap.com/img//Photos/Slides/img%20(109).jpg" alt="Second slide">
                                    <div class="carousel-caption">
                                        <h4>Get discount!</h4>
                                        <br>
                                    </div>
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img src="http://mdbootstrap.com/img//Photos/Slides/img%20(36).jpg" alt="Third slide">
                                    <div class="carousel-caption">
                                        <h4>Only now for $10</h4>
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
                <!--/.First row-->
                <br>
                <hr class="extra-margins">

                <!--Second row-->
                <div class="row">
                    <!--First columnn-->
                    <div class="col-lg-4">
                        <!--Card-->
                        <div class="card  wow fadeIn" data-wow-delay="0.2s">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(32).jpg" class="img-fluid" alt="">
                                <a href="#">
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-block">
                                <!--Title-->
                                <h4 class="card-title">Watches</h4>
                                <!--Text-->
                                <p class="card-text">It's never too late or too early to get a watch!</p>
                                <a href="#" class="btn btn-default">Buy now for <strong>$10</strong></a>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--First columnn-->

                    <!--Second columnn-->
                    <div class="col-lg-4">
                        <!--Card-->
                        <div class="card  wow fadeIn" data-wow-delay="0.4s">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(38).jpg" class="img-fluid" alt="">
                                <a href="#">
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-block">
                                <!--Title-->
                                <h4 class="card-title">Bags</h4>
                                <!--Text-->
                                <p class="card-text">When you really need to carry extra stuff</p>
                                <a href="#" class="btn btn-default">Buy now for <strong>$30</strong></a>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--Second columnn-->

                    <!--Third columnn-->
                    <div class="col-lg-4">
                        <!--Card-->
                        <div class="card  wow fadeIn" data-wow-delay="0.6s">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(1).jpg" class="img-fluid" alt="">
                                <a href="#">
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-block">
                                <!--Title-->
                                <h4 class="card-title">Shoes</h4>
                                <!--Text-->
                                <p class="card-text">You might carry it in some comfortable shoes.</p>
                                <a href="#" class="btn btn-default">Buy now for <strong>20$</strong></a>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--Third columnn-->
                </div>
                <!--/.Second row-->

            </div>
            <!--/.Main column-->

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