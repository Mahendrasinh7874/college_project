<?php


include 'header.php';
include 'jquery.php';

?>

<div class=" w-50 my-4 mx-auto wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">

                <div class="ibox-content">

                    <h4 class="header-title m-t-0 m-b-30">Between Dates Sales Reports</h4>
                    <form name="bwdatesreport" class="my-5" action="sales-reports-detailed.php" method="post">
                        <div class="form-group row">


                            <label for="example-text-input" class="col-2 col-form-label">From Date</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="fromdate" name="fromdate" required="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">To Date</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="todate" name="todate" required="true">
                            </div>
                        </div>
                    


                        <div class="form-group row">

                            <div class="col-10">
                                <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Submit</button></p>

                            </div>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>

</div>



<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>