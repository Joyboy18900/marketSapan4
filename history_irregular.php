<!DOCTYPE html>
<html lang="en">

<?php 

require_once "check_login.php";
include_once "include/header.php"; 
include_once "bookingController.php";

$result = getBooking($conn);

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
                            <h4 class="mb"><i class="fa fa-angle-right"></i> ประวัติการจองพ่อค้าแม่ค้าขาจร</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">รหัสการจอง</th>
                                            <th class="text-center">วันที่จอง</th>
                                            <th class="text-center">ชื่อ-นามสกุล</th>
                                            <th class="text-center">โซน</th>
                                            <th class="text-center">ประเภท</th>
                                            <th class="text-center">ล็อค</th>
                                            <th class="text-center">ราคา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $value['booking_id']; ?></td>
                                            <td class="text-center"><?php echo date("d-m-Y", strtotime($value['booking_create_date']));?></td>
                                            <td class="text-center"><?php echo $value['irreg_fname'] . ' ' . $value['irreg_lname']; ?></td>
                                            <td class="text-center"><?php echo $value['log_name']; ?></td>
                                            <td class="text-center"><?php echo $value['log_type']; ?></td>
                                            <td class="text-center"><?php echo $value['log_detail_name']; ?></td>
                                            <td class="text-center"><?php echo number_format($value['booking_price']) . ' บาท'; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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