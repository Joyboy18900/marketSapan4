<!DOCTYPE html>
<html lang="en">

<?php 

require_once "check_login.php";
include_once "include/header.php"; 

include_once "paymentController.php";

$result = reportPayment($conn);

if(isset($_GET["payment_role"]) && !empty($_GET["payment_role"])) {

    $result = reportPaymentByDateAndRole($conn, $_GET["payment_create_date"], $_GET["payment_role"]);
}

?>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <?php include_once "layout/top_navigation.php"; ?>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <?php include_once "layout/sidebar_menu.php"; ?>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!-- <h3><i class="fa fa-angle-right"></i> Form Components</h3> -->
                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> ?????????????????????????????????????????????????????????</h4>
                            <form class="form-horizontal style-form" method="GET" action="report_payment.php"
                                enctype="multipart/form-data">
                                <div class="form-group col-md-8">
                                    <label class="col-sm-2 col-md-2 control-label">???????????????</label>
                                    <div class="col-sm-5">
                                        <select name="payment_create_date" class="form-control" required>
                                            <option value="" selected disabled>?????????????????????????????????????????????</option>
                                            <option value="<?php echo date("Y") . "-01"; ?>">?????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-02"; ?>">?????????????????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-03"; ?>">?????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-04"; ?>">?????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-05"; ?>">????????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-06"; ?>">???????????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-07"; ?>">????????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-08"; ?>">????????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-09"; ?>">????????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-10"; ?>">?????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-11"; ?>">??????????????????????????? <?php echo date("Y"); ?></option>
                                            <option value="<?php echo date("Y") . "-12"; ?>">????????????????????? <?php echo date("Y"); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select name="payment_role" class="form-control" required>
                                            <option value="" selected disabled>??????????????????????????????????????????????????????????????????</option>
                                            <option value="1">????????????</option>
                                            <option value="2">?????????????????????</option>
                                            <option value="0">?????????????????????</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <div class="col-sm-10">
                                        <button type="submit" name="reportPayment" class="btn btn-success">???????????????</button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                    <!-- col-lg-12-->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-panel">

                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">?????????????????????????????????????????????????????????</h3>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>?????????????????????????????????????????????</th>
                                                    <th>???????????????????????????</th>
                                                    <th>???????????????????????????????????????????????????</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sumPrice = array();
                                                    foreach ($result as $key => $value) { 
                                                        array_push($sumPrice, $value["payment_price"]);
                                                ?>
                                                <tr>
                                                    <td><?php echo $value["payment_id"]; ?></td>
                                                    <td><?php echo number_format($value["payment_price"]) . ' ?????????'; ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($value["payment_create_date"]));?></td>
                                                </tr>
                                                <?php 
                                                    } 
                                                ?>
                                                <tr>
                                                    <td colspan="2" style="font-weight:bold !important">????????????????????? : </td>
                                                    <td><?php echo number_format(array_sum($sumPrice)) . ' ?????????'; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- col-lg-12-->
                </div>
            </section>
        </section>
        <!--main content end-->
        <!--footer start-->
        <?php include_once "layout/footer.php"; ?>
        <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <?php include_once "include/javascript.php"; ?>
</body>

</html>