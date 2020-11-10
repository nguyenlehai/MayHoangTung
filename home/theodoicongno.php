<!DOCTYPE html>
<html lang="en">
<?php
$permission = array("1", "3", "5");
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
                            <h3 class="header smaller lighter blue">Quản lý công nợ</h3>
                            <table>
                                <tr>
                                    <td>
                                        <form class="form-horizontal" role="form" name="chonkhachhang"
                                              action="./theodoicongno.php" onsubmit="return validateForm()"
                                              method="get">
                                            <select name="khachhang" cclass="col-sm-3 control-label no-padding-right"
                                                    title="Lọc theo khách hàng" required>
                                              <?php
                                              $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                              $query2 = "SELECT * FROM khachhang ORDER BY id";
                                              $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                              while ($rows2 = mysqli_fetch_array($result2)) {
                                                echo '<option value="' . $rows2['id'] . '">' . $rows2['makhachhang'] . '</option>';
                                              }

                                              ?></select>
                                            <button>
                                                Lọc dữ liệu
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button onclick="window.location.href='theodoicongno.php'">
                                            Hiển thị tất cả
                                        </button>
                                    </td>
                                </tr>
                            </table>
                            <div class="col-xs-12">
                                <div class="col-sm-5">
                                    <div class="widget-box">
                                        <div class="clearfix">
                                            <div class="pull-right tableTools-container"></div>
                                        </div>
                                        <div>
                                            <h4> Công nợ khách hàng </h4>
                                            <table id="dynamic-table"
                                                   class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Ngày xuất</th>
                                                    <th>Khách hàng</th>
                                                    <th>Mã hàng</th>
                                                    <th>Số lượng</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                include_once './config/config.php';
                                                $username = $_SESSION['username'];
                                                $theodoi = 0;
                                                $luyke = 0;
                                                $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                $query = "SELECT * FROM xuathang";
                                                $result = mysqli_query($conn, $query) or die(mysql_error());
                                                $tongcn = mysqli_num_rows($result);
                                                $query2 = "SELECT * FROM phieuthu";
                                                $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                                $tongcn2 = mysqli_num_rows($result2);
                                                if ($tongcn < $tongcn2) {
                                                  $tongcn = $tongcn2;
                                                }
                                                if (isset($_GET['page'])) {
                                                  $hientai = $_GET['page'] - 1;
                                                } else {
                                                  $hientai = 0;
                                                }
                                                $limit = 20;
                                                $start = $hientai * $limit;
                                                $sopage = ceil($tongcn / $limit);
                                                $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                if (isset($_GET['khachhang'])) {
                                                  $khachhang = $_GET['khachhang'];
                                                  $query = "SELECT * FROM xuathang WHERE khachhang = $khachhang ORDER BY id LIMIT $start,$limit";
                                                } else {
                                                  $query = "SELECT * FROM xuathang ORDER BY id LIMIT $start,$limit";
                                                }
                                                $result = mysqli_query($conn, $query) or die(mysql_error());
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                  echo '<tr>';
                                                  echo '<td>';
                                                  echo $row['ngay'];
                                                  echo '</td>';
                                                  echo '<td>';
                                                  $khachhang = $row['khachhang'];
                                                  $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                  $query4 = "SELECT * FROM khachhang WHERE id = '" . $khachhang . "'";
                                                  $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                  while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    $khachhang = $row4['makhachhang'];
                                                  }
                                                  echo $khachhang;
                                                  echo '</td>';
                                                  echo '<td>';
                                                  $mahang = $row['mahang'];
                                                  $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                  $query4 = "SELECT * FROM donhanggoc WHERE id = '" . $mahang . "'";
                                                  $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                  while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    $mahang = $row4['mahang'];
                                                  }
                                                  echo substr($mahang, 0, 8);
                                                  echo '</td>';
                                                  echo '<td>';
                                                  echo number_format($row['soluong'], 0);
                                                  echo '</td>';
                                                  echo '<td>';
                                                  $mahang = $row['mahang'];
                                                  $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                  $query4 = "SELECT * FROM donhanggoc WHERE id = '" . $mahang . "'";
                                                  $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                  while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    $dongia = $row4['dongia'];
                                                  }
                                                  echo number_format($dongia, 0);
                                                  echo '</td>';
                                                  echo '<td>';
                                                  $thanhtien = $row['soluong'] * $dongia;
                                                  echo number_format($thanhtien, 0);
                                                  echo '</td>';
                                                  echo '</tr>';
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="widget-box">
                                        <div class="clearfix">
                                            <div class="pull-right tableTools-container"></div>
                                        </div>
                                        <div>
                                            <h4> Phiếu thu khách hàng </h4>
                                            <table id="dynamic-table2"
                                                   class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Ngày</th>
                                                    <th>Khách hàng</th>
                                                    <th>Số tiền</th>
                                                    <th class="hidden-480">Ghi chú</th>
                                                    <th class="hidden-480">Chỉnh sửa</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                include_once './config/config.php';
                                                $username = $_SESSION['username'];
                                                $luykethu = 0;
                                                if (isset($_GET['page'])) {
                                                  $hientai = $_GET['page'] - 1;
                                                } else {
                                                  $hientai = 0;
                                                }
                                                $start = $hientai * $limit;
                                                $sopage = ceil($tongcn / $limit);
                                                $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                if (isset($_GET['khachhang'])) {
                                                  $khachhang = $_GET['khachhang'];
                                                  $query = "SELECT * FROM phieuthu WHERE khachhang = '$khachhang' ORDER BY id LIMIT $start,$limit";
                                                } else {
                                                  $query = "SELECT * FROM phieuthu ORDER BY id LIMIT $start,$limit";
                                                }
                                                $result = mysqli_query($conn, $query) or die(mysql_error());
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                  echo '<tr>';
                                                  echo '<td>';
                                                  echo $row['ngay'];
                                                  echo '</td>';
                                                  echo '<td>';
                                                  $khachhang = $row['khachhang'];
                                                  $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                  $query4 = "SELECT * FROM khachhang WHERE id = '" . $khachhang . "'";
                                                  $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                  while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    $tenkhachhang = $row4['makhachhang'];
                                                  }
                                                  echo $tenkhachhang;
                                                  echo '</td>';
                                                  echo '<td>';
                                                  echo number_format($row['sotien'], 0);
                                                  echo '</td>';
                                                  echo '<td>';
                                                  echo $row['ghichu'];
                                                  echo '</td>';
                                                  echo '<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="edit_phieuthu.php?id='; ?>
                                                  <?php
                                                  echo $row['id'];
                                                  echo '">
																<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
															</div>
														</td>';

                                                  echo '</tr>';
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                            <table class="table table-striped table-bordered table-hover">
                                                <th><b>Tổng công nợ</b></th>
                                                <th><b>Tổng phiếu thu</b></th>
                                                <th><b>Tổng công nợ phải thu</b></th>
                                                <tr><?php
                                                  if (isset($_GET['khachhang'])) {
                                                    $khachhang = $_GET['khachhang'];
                                                    $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                    $query = "SELECT * FROM xuathang WHERE khachhang = '$khachhang' ORDER BY id";
                                                    $result = mysqli_query($conn, $query) or die(mysql_error());
                                                    $congno = 0;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                      $mahang = $row['mahang'];
                                                      $soluong = $row['soluong'];
                                                      $query4 = "SELECT * FROM donhanggoc WHERE id = '" . $mahang . "'";
                                                      $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                      $row4 = mysqli_fetch_assoc($result4);
                                                      $dongia = $row4['dongia'];
                                                      $congno = $congno + $soluong * $dongia;
                                                    }
                                                    echo '<td>';
                                                    echo number_format($congno, 0);
                                                    echo '</td>';
                                                    $query2 = "SELECT sum(sotien) FROM phieuthu WHERE khachhang = '$khachhang' ORDER BY id";
                                                    $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                                    $row2 = mysqli_fetch_assoc($result2);
                                                    $phieuthu = $row2['sum(sotien)'];
                                                    echo '<td>';
                                                    echo number_format($phieuthu, 0);
                                                    echo '</td>';
                                                    echo '<td>';
                                                    $conlai = $congno - $phieuthu;
                                                    echo number_format($conlai, 0);
                                                    echo '</td>';
                                                  } else {
                                                    $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                    $query = "SELECT * FROM xuathang ORDER BY id ";
                                                    $result = mysqli_query($conn, $query) or die(mysql_error());
                                                    $congno = 0;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                      $mahang = $row['mahang'];
                                                      $soluong = $row['soluong'];
                                                      $query4 = "SELECT * FROM donhanggoc WHERE id = '" . $mahang . "'";
                                                      $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                      while ($row4 = mysqli_fetch_assoc($result4)) {
                                                        $dongia = $row4['dongia'];
                                                        $congno = $congno + $soluong * $dongia;
                                                      }
                                                    }
                                                    echo '<td>';
                                                    echo number_format($congno, 0);
                                                    echo '</td>';
                                                    $query2 = "SELECT sum(sotien) FROM phieuthu ORDER BY id";
                                                    $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                                    $row2 = mysqli_fetch_assoc($result2);
                                                    $phieuthu = $row2['sum(sotien)'];
                                                    echo '<td>';
                                                    echo number_format($phieuthu, 0);
                                                    echo '</td>';
                                                    echo '<td>';
                                                    $conlai = $congno - $phieuthu;
                                                    echo number_format($conlai, 0);
                                                    echo '</td>';
                                                  }

                                                  $phaithu = $luyke - $luykethu; ?></b></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="pagination pull-center no-margin">
                          <?php
                          $i = 0;
                          while ($i < $sopage) {
                            $i = $i + 1;
                            echo '<li ';
                            if ($i == $hientai + 1) {
                              echo 'class="active"';
                            }
                            echo '><a href="theodoicongno.php?page=';
                            echo $i . '&khachhang=' . $khachhang . '">' . $i;
                            echo '</a>';
                          }
                          ?>
                        </ul>

                        <form class="form-horizontal" role="form" name="themphieuthu" action="./theodoicongno.php"
                              onsubmit="return validateForm()" method="post">
                          <?php
                          if (isset($_POST['khachhang'])) {
                            $khachhang = $_POST['khachhang'];
                            $ngay = $_POST['ngay'];
                            $sotien = $_POST['sotien'];
                            $ghichu = $_POST['ghichu'];
                            include_once './config/config.php';
                            $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                            $query2 = "INSERT INTO phieuthu (khachhang,ngay,sotien,ghichu) VALUES ('$khachhang','$ngay','$sotien','$ghichu')";
                            $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                            echo '<script type="text/javascript">
											alert("Thêm phieuthu thành công");
											window.location.href = "theodoicongno.php";
											</script>';
                          }
                          ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ngày</label>

                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" id="form-field-1-1" name="ngay"
                                           placeholder="2020-01-31" class="col-xs-10 col-sm-5"/>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Khách
                                    hàng</label>

                                <div class="col-sm-9">
                                    <select name="khachhang" cclass="col-sm-3 control-label no-padding-right"
                                            title="Khách hàng" required>
                                      <?php
                                      $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                      $query2 = "SELECT * FROM khachhang ORDER BY id";
                                      $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                      while ($rows2 = mysqli_fetch_array($result2)) {
                                        echo '<option value="' . $rows2['id'] . '">' . $rows2['makhachhang'] . '</option>';
                                      }

                                      ?></select>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Số
                                    tiền</label>

                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" id="form-field-1-1" name="sotien"
                                           placeholder="Số tiền" class="col-xs-10 col-sm-5"/>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ghi
                                    chú</label>

                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" id="form-field-1-1" name="ghichu"
                                           placeholder="Ghi chú" class="col-xs-10 col-sm-5"/>
                                </div>
                            </div>
                            <div

                            <div class="col-sm-3 control-label no-padding-right"
                            ">
                            <button>
                                Thêm phiếu thu
                            </button>
                    </div>
                    </form>


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