<?php


include 'header.php';
include 'jquery.php';
include './config.php';

?>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row w-50 m-auto">
        <div class="col-lg-12">
            <div class="ibox">

                <div class="ibox-content">


                    <?php
                    $fdate = $_POST['fromdate'];
                    $tdate = $_POST['todate'];
                    $rtype = $_POST['requesttype'];

                    ?>

                    <?php if ($rtype == 'mtwise') {
                        $month1 = strtotime($fdate);
                        $month2 = strtotime($tdate);
                        $m1 = date("F", $month1);
                        $m2 = date("F", $month2);
                        $y1 = date("Y", $month1);
                        $y2 = date("Y", $month2);
                    ?>
                        <h4 class="header-title m-t-0 m-b-30 my-5">Sales Report Month Wise and Year Wise</h4>
                        <!-- <h4 align="center" style="color:blue">Sales Report from <?php echo $m1 . "-" . $y1; ?> to <?php echo $m2 . "-" . $y2; ?></h4> -->
                        <hr />
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Month / Year </th>
                                    <th>Sales</th>
                                </tr>
                            </thead>
                            <?php
                            $fstatus = 'Food Delivered';
                            $sql = "SELECT COUNT(*) as total_sales
                            FROM orders
                            WHERE order_date >= '2023-01-01' AND order_date <= '2023-03-31'";
                            $ret = mysqli_query($conn, $sql);
                            // $data = mysqli_fetch_assoc($ret);
                            // print_r($data);
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {

                            ?>


                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo date("M Y", strtotime($fdate)) ?></td>
                                    
                                    <td><?php echo  $row['total_sales']; ?></td>

                                </tr>
                            <?php
                                // $ftotal += $total;
                                $cnt++;
                            } ?>

                            <tr>
                                <td colspan="2" align="center">Total </td>
                                <!-- <td><?php echo $ftotal; ?></td> -->



                            </tr>

                        </table>
                    <?php } else {
                        $year1 = strtotime($fdate);
                        $year2 = strtotime($tdate);
                        $y1 = date("Y", $year1);
                        $y2 = date("Y", $year2);
                        $fstatus = 'Food Delivered';
                    ?>
                        <h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
                        <h4 align="center" style="color:blue">Sales Report from <?php echo $y1; ?> to <?php echo $y2; ?></h4>
                        <hr />
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th> Year </th>
                                    <th>Sales</th>
                                </tr>
                            </thead>
                            <?php
                            $ret = mysqli_query($con, "select year(OrderTime) as lyear,sum(ItemPrice*tblorders.FoodQty) as totalitmprice from tblorders join tblorderaddresses on tblorderaddresses.Ordernumber=tblorders.OrderNumber join tblfood on tblfood.ID=tblorders.FoodId where year(tblorderaddresses.OrderTime) between '$fdate' and '$tdate' and tblorderaddresses.OrderFinalStatus='$fstatus' group by lyear");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {

                            ?>

                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['lyear']; ?></td>
                                    <td><?php echo $data['total_sales']; ?></td>

                                </tr>
                            <?php
                                $ftotal += $total;
                                $cnt++;
                            } ?>

                            <tr>
                                <td colspan="2" align="center">Total </td>
                                <td><?php echo $ftotal; ?></td>



                            </tr>

                        </table>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
</div>



<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>