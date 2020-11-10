<!DOCTYPE html>
<html lang="en">
<?php
$permission = array("1", "2", "3", "4");
include('config/config.php') ?>
<?php include('head.php') ?>
<body class="no-skin">
<?php include('navbar.php') ?>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    </script>
  <?php include('sidebar.php') ?>


    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>

                    <div class="ace-settings-box clearfix" id="ace-settings-box">
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                       id="ace-settings-navbar" autocomplete="off"/>
                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                       id="ace-settings-sidebar" autocomplete="off"/>
                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                       id="ace-settings-breadcrumbs" autocomplete="off"/>
                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"
                                       autocomplete="off"/>
                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                       id="ace-settings-add-container" autocomplete="off"/>
                                <label class="lbl" for="ace-settings-add-container">
                                    Inside
                                    <b>.container</b>
                                </label>
                            </div>
                        </div><!-- /.pull-left -->

                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover"
                                       autocomplete="off"/>
                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact"
                                       autocomplete="off"/>
                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight"
                                       autocomplete="off"/>
                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                            </div>
                        </div><!-- /.pull-left -->
                    </div><!-- /.ace-settings-box -->
                </div><!-- /.ace-settings-container -->
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="header smaller lighter blue">Kiểm tra cân đối sản lượng</h3>
                                <table>
                                    <tr>
                                        <td>
                                            <form class="form-horizontal" role="form" name="chonchuyen"
                                                  action="./candoisanluong.php" onsubmit="return validateForm()"
                                                  method="get">
                                                <select name="mahang" cclass="col-sm-3 control-label no-padding-right"
                                                        title="Lọc theo bộ phận" required>
                                                  <?php
                                                  $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                  $query2 = "SELECT * FROM donhanggoc ORDER BY id DESC limit 10";
                                                  $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                                  while ($rows2 = mysqli_fetch_array($result2)) {
                                                    echo '<option value="' . $rows2['id'];
                                                    if (isset ($_GET['mahang'])) {
                                                      $mahang = $_GET['mahang'];
                                                    } else {
                                                      $mahang = 0;
                                                    }
                                                    if ($rows2['id'] == $mahang) {
                                                      echo '" selected="selected';
                                                    }
                                                    echo '">' . $rows2['mahang'] . '</option>';
                                                  }

                                                  ?></select>

                                                <select name="bophan" cclass="col-sm-3 control-label no-padding-right"
                                                        title="Lọc theo bộ phận" required>
                                                  <?php
                                                  $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                  $query2 = "SELECT * FROM bophan ORDER BY id";
                                                  $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                                  echo '<option value="all">Tất cả</option>';
                                                  while ($rows2 = mysqli_fetch_array($result2)) {
                                                    echo '<option value="' . $rows2['id'];
                                                    if (isset ($_GET['bophan'])) {
                                                      $bophan = $_GET['bophan'];
                                                    } else {
                                                      $bophan = 0;
                                                    }
                                                    if ($rows2['id'] == $bophan) {
                                                      echo '" selected="selected';
                                                    }
                                                    echo '">' . $rows2['bophan'] . '</option>';
                                                  }

                                                  ?></select>
                                              <?php
                                              $today = date('Y-m-d');
                                              $year = date("Y", strtotime($today));
                                              $month = date("m", strtotime($today));
                                              if ($month == 1) {
                                                $monthn = 12;
                                                $yearn = $year - 1;
                                              } else {
                                                $yearn = $year;
                                                $monthn = $month - 1;
                                                $monthn = str_pad($monthn, 2, '0', STR_PAD_LEFT);
                                              }
                                              echo '<input type="date" required="required" name="ngay" value="' . $yearn . '-' . $monthn . '-01" class="small">';
                                              ?>
                                                <button>
                                                    Lọc dữ liệu
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                </table>

                                <button id="btnExport" onclick="fnExcelReport();">Xuất ra excel</button>
                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>
                                <div>
                                    <h6><b> Thông tin tổng hợp đơn hàng </b></h6>
                                    <table id="dynamic-table" name="tonghop"
                                           class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Bộ phận</th>
                                            <th>Mã hàng</th>
                                            <th>Chốt tính lương</th>
                                            <th>Sản lượng đã may</th>
                                            <th>Tổng đơn hàng</th>
                                            <th>Lượng hàng đã xuất</th>
                                            <th>Lưu ý</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        include_once './config/config.php';
                                        $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                        if (isset($_GET['mahang'])) {
                                          $mahang = $_GET['mahang'];
                                          $bophan = $_GET['bophan'];
                                          $ngay = $_GET['ngay'];
                                          $today = $ngay;
                                          $year = date("Y", strtotime($today));
                                          $month = date("m", strtotime($today));
                                          $dauthang = date("$year-$month-01");
                                          $cuoithang = date("$year-$month-30");
                                          $query10 = "SELECT * FROM gopmatinhluong WHERE mahanggoc ='$mahang'";
                                          $result10 = mysqli_query($conn, $query10) or die(mysql_error());
                                          $kiemtragop = mysqli_num_rows($result10);
                                          if ($kiemtragop < 2) {
                                            $query = "SELECT bophan,mahang,count(bophan) FROM sanluongcongnhan WHERE mahang = '$mahang' AND bophan ='$bophan' AND ngaythang ='$ngay' GROUP BY bophan";
                                            $result = mysqli_query($conn, $query) or die(mysql_error());
                                            while ($row = mysqli_fetch_assoc($result)) {
                                              echo '<tr>';
                                              echo '<td>';
                                              $ktbophan = $row['bophan'];
                                              $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                              $query2 = "SELECT * FROM bophan WHERE id = '" . $ktbophan . "'";
                                              $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                              while ($row2 = mysqli_fetch_assoc($result2)) {
                                                $tenbophan = $row2['bophan'];
                                                echo $tenbophan;
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              $mahang = $row['mahang'];
                                              $query2 = "SELECT * FROM donhanggoc WHERE id = '" . $mahang . "'";
                                              $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                              while ($row2 = mysqli_fetch_assoc($result2)) {
                                                $tenmahang = $row2['mahang'];
                                                $soluongdonhang = $row2['soluong'];
                                                echo $tenmahang;
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              if ($bophan == 'all') {

                                                $query3 = "SELECT sum(sanluong) FROM chotsanluong WHERE mahang ='$mahang' AND ngay ='$ngay'";

                                              } else {

                                                $query3 = "SELECT sum(sanluong) FROM chotsanluong WHERE bophan = '" . $bophan . "' AND mahang ='$mahang' AND ngay ='$ngay'";

                                              }
                                              $result3 = mysqli_query($conn, $query3) or die(mysql_error());
                                              while ($row3 = mysqli_fetch_assoc($result3)) {
                                                $sanluong = $row3['sum(sanluong)'];
                                                echo number_format($sanluong, 0);
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              if ($bophan == 'all') {

                                                $query4 = "SELECT sum(sanluong) FROM sanluong WHERE mahang IN (SELECT id FROM donhang WHERE mahanggoc ='$mahang') AND ngay ='$ngay'";

                                              } else {

                                                $query4 = "SELECT sum(sanluong) FROM sanluong WHERE bophan = '" . $bophan . "' AND mahang IN (SELECT id FROM donhang WHERE mahanggoc ='$mahang') AND ngay ='$ngay'";
                                              }
                                              $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                              while ($row4 = mysqli_fetch_assoc($result4)) {
                                                $sanluongdamay = $row4['sum(sanluong)'];
                                                echo number_format($sanluongdamay, 0);
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              echo number_format($soluongdonhang, 0);
                                              echo '</td>';
                                              echo '<td>';
                                              $query5 = "SELECT sum(soluong) FROM xuathang WHERE mahang ='$mahang'";
                                              $result5 = mysqli_query($conn, $query5) or die(mysql_error());
                                              while ($row5 = mysqli_fetch_assoc($result5)) {
                                                $sanluongdaxuat = $row5['sum(soluong)'];
                                                echo number_format($sanluongdaxuat, 0);
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              if ($sanluong > $sanluongdamay) {
                                                echo '<span class="label label-sm label-warning">Sản lượng báo vượt quá sản lượng may</span>';
                                              }
                                              echo '</td>';

                                              echo '</tr>';
                                            }
                                          } else {


                                            $query = "SELECT bophan,mahang,count(bophan) FROM sanluongcongnhan WHERE mahang IN (SELECT mahanggop FROM gopmatinhluong WHERE mahanggoc ='$mahang') AND ngaythang ='$ngay' AND bophan = '$bophan' GROUP BY bophan";
                                            $result = mysqli_query($conn, $query) or die(mysql_error());
                                            while ($row = mysqli_fetch_assoc($result)) {
                                              echo '<tr>';
                                              echo '<td>';
                                              $ktbophan = $row['bophan'];
                                              $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                              $query2 = "SELECT * FROM bophan WHERE id = '" . $ktbophan . "'";
                                              $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                              while ($row2 = mysqli_fetch_assoc($result2)) {
                                                $tenbophan = $row2['bophan'];
                                                echo $tenbophan;
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              $mahang = $row['mahang'];
                                              $query2 = "SELECT * FROM donhanggoc WHERE id IN (SELECT mahanggop FROM gopmatinhluong WHERE mahanggoc ='$mahang')";
                                              $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                              while ($row2 = mysqli_fetch_assoc($result2)) {
                                                $tenmahang = $row2['mahang'];
                                                $soluongdonhang = $row2['soluong'];
                                                echo $tenmahang . ' ';
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              if ($bophan == 'all') {

                                                $query3 = "SELECT sum(sanluong) FROM chotsanluong WHERE mahang IN (SELECT id FROM donhang WHERE mahanggoc IN (SELECT mahanggop FROM gopmatinhluong WHERE mahanggoc ='$mahang')) AND ngay ='$ngay'";

                                              } else {

                                                $query3 = "SELECT sum(sanluong) FROM chotsanluong WHERE bophan = '" . $bophan . "' AND mahang IN (SELECT id FROM donhang WHERE mahanggoc IN (SELECT mahanggop FROM gopmatinhluong WHERE mahanggoc ='$mahang')) AND ngay ='$ngay'";

                                              }
                                              $result3 = mysqli_query($conn, $query3) or die(mysql_error());
                                              while ($row3 = mysqli_fetch_assoc($result3)) {
                                                $sanluong = $row3['sum(sanluong)'];
                                                echo number_format($sanluong, 0);
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              if ($bophan == 'all') {

                                                $query4 = "SELECT sum(sanluong) FROM sanluong WHERE mahang IN (SELECT id FROM donhang WHERE mahanggoc IN (SELECT mahanggop FROM gopmatinhluong WHERE mahanggoc ='$mahang')) AND ngay >= '$dauthang' AND ngay <= '$cuoithang'";

                                              } else {

                                                $query4 = "SELECT sum(sanluong) FROM sanluong WHERE bophan = '" . $bophan . "' AND mahang IN (SELECT id FROM donhang WHERE mahanggoc IN (SELECT mahanggop FROM gopmatinhluong WHERE mahanggoc ='$mahang')) AND ngay >= '$dauthang' AND ngay <= '$cuoithang'";
                                              }
                                              $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                              while ($row4 = mysqli_fetch_assoc($result4)) {
                                                $sanluongdamay = $row4['sum(sanluong)'];
                                                echo number_format($sanluongdamay, 0);
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              echo number_format($soluongdonhang, 0);
                                              echo '</td>';
                                              echo '<td>';
                                              $query5 = "SELECT sum(soluong) FROM xuathang WHERE mahang ='$mahang'";
                                              $result5 = mysqli_query($conn, $query5) or die(mysql_error());
                                              while ($row5 = mysqli_fetch_assoc($result5)) {
                                                $sanluongdaxuat = $row5['sum(soluong)'];
                                                echo number_format($sanluongdaxuat, 0);
                                              }
                                              echo '</td>';
                                              echo '<td>';
                                              if ($sanluong > $sanluongdamay) {
                                                echo '<span class="label label-sm label-warning">Sản lượng báo vượt quá sản lượng may</span>';
                                              }
                                              echo '</td>';

                                              echo '</tr>';
                                            }


                                          }
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                  <?php
                                  if (isset($_GET['mahang'])) {
                                    $mahang = $_GET['mahang'];
                                    $bophan = $_GET['bophan'];
                                    $ngay = $_GET['ngay'];
                                    $month = date("m", strtotime($ngay));
                                    $year = date("Y", strtotime($ngay));
                                    echo '<h6><b> Cân đối mã hàng' . $tenmahang . ' chuyền ' . $bophan . ' tháng ' . $month . '-' . $year;
                                  } ?> </b> </h6>
                                    <table id="dynamic-table" name="tonghop"
                                           class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Mã công đoạn</th>
                                            <th>Số lượng báo</th>
                                            <th>Số lượng chốt</th>
                                            <th>Cảnh báo</th>
                                            <th>Kiểm tra</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        include_once './config/config.php';
                                        $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                        if (isset($_GET['mahang'])) {
                                          $mahang = $_GET['mahang'];
                                          $bophan = $_GET['bophan'];
                                          $ngay = $_GET['ngay'];
                                          if ($bophan == 'all') {
                                            $query = "SELECT congdoan,sum(sanluong) FROM sanluongcongnhan WHERE mahang ='$mahang' AND ngaythang = '$ngay'  GROUP BY congdoan";

                                          } else {

                                            $query = "SELECT congdoan,sum(sanluong) FROM sanluongcongnhan WHERE bophan ='$bophan' AND mahang ='$mahang' AND ngaythang = '$ngay'  GROUP BY congdoan";
                                          }
                                          $result = mysqli_query($conn, $query) or die(mysql_error());
                                          while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>';
                                            echo '<td>';
                                            $macongdoan = $row['congdoan'];
                                            echo $macongdoan;
                                            echo '</td>';
                                            echo '<td>';
                                            $soluong = $row['sum(sanluong)'];
                                            echo number_format($soluong, 0);
                                            echo '</td>';
                                            echo '<td>';
                                            if ($bophan == 'all') {

                                              $query3 = "SELECT sum(sanluong) FROM chotsanluong WHERE ngay ='$ngay' AND mahang ='$mahang'";

                                            } else {

                                              $query3 = "SELECT sum(sanluong) FROM chotsanluong WHERE bophan = '" . $bophan . "' AND ngay ='$ngay' AND mahang ='$mahang'";
                                            }
                                            $result3 = mysqli_query($conn, $query3) or die(mysql_error());
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                              $sanluong = $row3['sum(sanluong)'];
                                              echo number_format($sanluong, 0);
                                            }
                                            echo '</td>';
                                            echo '<td class="hidden-480">';
                                            if ($soluong > $sanluong) {
                                              echo '<span class="label label-sm label-warning">Vượt quá</span>';
                                            } else {
                                              echo 'Ok';
                                            }
                                            echo '</td>';

                                            echo '<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="chitietcandoicongdoan.php?mcd='; ?>
                                            <?php
                                            echo $macongdoan;
                                            echo '&mahang=' . $mahang . '&bophan=' . $bophan . '&ngay=' . $ngay . '">
																<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
															</div>
														</td>';
                                            echo '</tr>';


                                          }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <button id="btnExport" onclick="fnExcelReport();"> Xuất ra excel</button>
                                </div>
                            </div>


                        </div>
                        <iframe id="txtArea1" style="display:none"></iframe>
                        <ul class="pagination pull-center no-margin">
                          <?php
                          if ($month == 1) {
                            $monthn = 12;
                            $yearn = $year - 1;
                          } else {
                            $monthn = $month - 1;
                            $yearn = $year;
                          }
                          echo '<li class="active"><a href="tonghopsanluong.php?y=' . $yearn . '&m=' . $monthn . '">Tháng trước</a>';
                          ?>
                          <?php
                          if ($month == 12) {
                            $monthn = 1;
                            $yearn = year + 1;
                          } else {
                            $monthn = $month + 1;
                            $yearn = $year;
                          }
                          echo '  <li class="active"><a href="tonghopsanluong.php?y=' . $yearn . '&m=' . $monthn . '">Tháng kế tiếp</a>';
                          ?>
                        </ul>


                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


  <?php include('footer.php') ?>


    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/jquery.sparkline.index.min.js"></script>
<script src="assets/js/jquery.flot.min.js"></script>
<script src="assets/js/jquery.flot.pie.min.js"></script>
<script src="assets/js/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script type="text/javascript">
    function fnExcelReport() {
        var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange;
        var j = 0;
        tab = document.getElementById('dynamic-table'); // id of table

        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text = tab_text + "</table>";
        tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
        tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
        tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
        {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else                 //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

        return (sa);
    }
</script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        $('.easy-pie-chart.percentage').each(function () {
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size / 10),
                animate: ace.vars['old_ie'] ? false : 1000,
                size: size
            });
        })

        $('.sparkline').each(function () {
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html',
                {
                    tagValuesAttribute: 'data-values',
                    type: 'bar',
                    barColor: barColor,
                    chartRangeMin: $(this).data('min') || 0
                });
        });


        //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
        //but sometimes it brings up errors with normal resize event handlers
        $.resize.throttleWindow = false;

        var placeholder = $('#piechart-placeholder').css({'width': '90%', 'min-height': '150px'});
        var data = [
            {label: "social networks", data: 38.7, color: "#68BC31"},
            {label: "search engines", data: 24.5, color: "#2091CF"},
            {label: "ad campaigns", data: 8.2, color: "#AF4E96"},
            {label: "direct traffic", data: 18.6, color: "#DA5430"},
            {label: "other", data: 10, color: "#FEE074"}
        ]

        function drawPieChart(placeholder, data, position) {
            $.plot(placeholder, data, {
                series: {
                    pie: {
                        show: true,
                        tilt: 0.8,
                        highlight: {
                            opacity: 0.25
                        },
                        stroke: {
                            color: '#fff',
                            width: 2
                        },
                        startAngle: 2
                    }
                },
                legend: {
                    show: true,
                    position: position || "ne",
                    labelBoxBorderColor: null,
                    margin: [-30, 15]
                }
                ,
                grid: {
                    hoverable: true,
                    clickable: true
                }
            })
        }

        drawPieChart(placeholder, data);

        /**
         we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
         so that's not needed actually.
         */
        placeholder.data('chart', data);
        placeholder.data('draw', drawPieChart);


        //pie chart tooltip example
        var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
        var previousPoint = null;

        placeholder.on('plothover', function (event, pos, item) {
            if (item) {
                if (previousPoint != item.seriesIndex) {
                    previousPoint = item.seriesIndex;
                    var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                    $tooltip.show().children(0).text(tip);
                }
                $tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
            } else {
                $tooltip.hide();
                previousPoint = null;
            }

        });

        /////////////////////////////////////
        $(document).one('ajaxloadstart.page', function (e) {
            $tooltip.remove();
        });


        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
        }

        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d2.push([i, Math.cos(i)]);
        }

        var d3 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.2) {
            d3.push([i, Math.tan(i)]);
        }


        var sales_charts = $('#sales-charts').css({'width': '100%', 'height': '220px'});
        $.plot("#sales-charts", [
            {label: "Domains", data: d1},
            {label: "Hosting", data: d2},
            {label: "Services", data: d3}
        ], {
            hoverable: true,
            shadowSize: 0,
            series: {
                lines: {show: true},
                points: {show: true}
            },
            xaxis: {
                tickLength: 0
            },
            yaxis: {
                ticks: 10,
                min: -2,
                max: 2,
                tickDecimals: 3
            },
            grid: {
                backgroundColor: {colors: ["#fff", "#fff"]},
                borderWidth: 1,
                borderColor: '#555'
            }
        });


        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }


        $('.dialogs,.comments').ace_scroll({
            size: 300
        });


        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if (ace.vars['touch'] && ace.vars['android']) {
            $('#tasks').on('touchstart', function (e) {
                var li = $(e.target).closest('#tasks li');
                if (li.length == 0) return;
                var label = li.find('label.inline').get(0);
                if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
            });
        }

        $('#tasks').sortable({
                opacity: 0.8,
                revert: true,
                forceHelperSize: true,
                placeholder: 'draggable-placeholder',
                forcePlaceholderSize: true,
                tolerance: 'pointer',
                stop: function (event, ui) {
                    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                    $(ui.item).css('z-index', 'auto');
                }
            }
        );
        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function () {
            if (this.checked) $(this).closest('li').addClass('selected');
            else $(this).closest('li').removeClass('selected');
        });


        //show the dropdowns on top or bottom depending on window height and menu position
        $('#task-tab .dropdown-hover').on('mouseenter', function (e) {
            var offset = $(this).offset();

            var $w = $(window)
            if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                $(this).addClass('dropup');
            else $(this).removeClass('dropup');
        });

    })
</script>
</body>
</html>
