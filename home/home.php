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
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar"
                                   autocomplete="off"/>
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar"
                                   autocomplete="off"/>
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                   id="ace-settings-breadcrumbs" autocomplete="off"/>
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off"/>
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

            <div class="page-header">
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <script src="js/Chart.js"></script>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="widget-box" id="widget-box-10">
                                <div class="widget-header widget-header-small">
                                    <h5 class="widget-title smaller">Sản lượng - doanh thu chuyền</h5>

                                    <div class="widget-toolbar no-border">
                                        <ul class="nav nav-tabs" id="myTab">

                                            <li class="active">
                                                <a data-toggle="tab" href="#1">Chuyền 1</a>
                                            </li>
                                          <?php
                                          for ($bien = 2; $bien <= 10; $bien++) {
                                            echo '<li>
																<a data-toggle="tab" href="#' . $bien . '">Chuyền ' . $bien . '</a>
															</li>';
                                          }
                                          ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="widget-body">

                                    <div class="widget-main padding-6">
                                        <div class="widget-box transparent" id="recent-box">
                                            <div class="tab-content padding-8">
                                              <?php
                                              for ($line = 1; $line <= 10; $line++) {
                                                echo '<div id="' . $line . '" class="tab-pane';
                                                if ($line == 1) {
                                                  echo ' active">';
                                                } else {
                                                  echo '">';
                                                }
                                                echo '<canvas id="myChart' . $line . '"  height="150"></canvas>';
                                                $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                $week = date('Y-m-d', strtotime("-8 days"));
                                                $query = "SELECT sum(sanluong),ngay,mahang FROM sanluong WHERE ngay >= '$week' AND bophan = '$line' GROUP BY ngay ORDER BY ngay";
                                                $result = mysqli_query($conn, $query) or die(mysql_error());
                                                $i = 0;
                                                $chuyen1 = array();
                                                $doanhthu1 = array();
                                                $ngay1 = array();
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                  $chuyen1[$i] = $row['sum(sanluong)'];
                                                  $timestamp = strtotime($row['ngay']);
                                                  $ngay1[$i] = date("d", $timestamp);
                                                  $mahang = $row['mahang'];
                                                  $query4 = "SELECT * FROM donhang WHERE id = '$mahang'";
                                                  $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                  $row4 = mysqli_fetch_assoc($result4);
                                                  $mahang = $row4['mahanggoc'];
                                                  $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                  $query3 = "SELECT * FROM donhanggoc WHERE id = '" . $mahang . "'";
                                                  $result3 = mysqli_query($conn, $query3) or die(mysql_error());
                                                  $row3 = mysqli_fetch_assoc($result3);
                                                  $doanhthu1[$i] = strval(number_format($row['sum(sanluong)'] * $row3['dongiachuyen'] / 1000000, 2));
                                                  $i = $i + 1;
                                                }

                                                $chuyen = json_encode($chuyen1);
                                                $ngay = json_encode($ngay1);
                                                $doanhthu = json_encode($doanhthu1);
                                                echo '
														<script>
														var ctx = document.getElementById("myChart' . $line . '").getContext("2d");
														var myChart' . $line . ' = new Chart(ctx, {
															type: "bar",
															data: {
																labels: ' . $ngay . ',
																datasets: [{
																	label: "Sản lượng(đơn vị: chiếc)",
																	data: ' . $chuyen . ',
																	backgroundColor: ("rgba(51, 255, 51, 0.5)"),
																	borderColor: ("rgba(51, 255, 51, 0.5)"),
																	borderWidth: 0,
																	yAxisID: "A",
																},{
																label: "Doanh thu(đơn vị: triệu đồng)",
																	data: ' . $doanhthu . ',
																	 backgroundColor:"rgba(51, 51, 255, 0.9)",
																	 borderColor:"rgba(51, 51, 255, 1)",
																	borderWidth: 1,
																	type:"line",
																	yAxisID: "B",
																	fill: false,
																	order:2,
																}]
															},
															 options: {
															scales: {
															  yAxes: [{
																id: "A",
																type: "linear",
																position: "left",
															  }, {
																id: "B",
																type: "linear",
																position: "right",
															  }]
															}
														  }
														});
														</script>
														';

                                                $query5 = "SELECT * FROM sanluong WHERE bophan = '$line' ORDER BY ngay DESC";
                                                $result5 = mysqli_query($conn, $query5) or die(mysql_error());
                                                $row5 = mysqli_fetch_array($result5);
                                                $mahang = $row5['mahang'];
                                                $query6 = "SELECT * FROM donhang WHERE id = '$mahang'";
                                                $result6 = mysqli_query($conn, $query6) or die(mysql_error());
                                                $row6 = mysqli_fetch_array($result6);
                                                $mahang = $row6['mahang'];
                                                echo '<b>Mã hàng đang làm: ' . $mahang . '</b>';
                                                echo '</div>';
                                              }
                                              ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="widget-box transparent" id="recent-box">
                                <div class="widget-body">
                                    <div class="widget-main padding-4">
                                        <div class="tab-content padding-8">
                                            <div id="thongke" class="tab-pane active">
                                                <table id="dynamic-table"
                                                       class="table table-striped table-bordered table-hover">
                                                    <h4 class="smaller lighter green">
                                                        <i class="ace-icon fa fa-list"></i>
                                                        Theo dõi lịch xuất
                                                    </h4>
                                                    <thead>
                                                    <tr>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Số lượng</th>
                                                        <th>Đã ra chuyền</th>
                                                        <th>Tỉ lệ hoàn thành</th>
                                                        <th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                            Ngày xuất hàng
                                                        </th>
                                                        <th>Dự kiến xuất chậm</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php
                                                    include_once './config/config.php';
                                                    $username = $_SESSION['username'];
                                                    $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                    $query = "SELECT * FROM donhanggoc WHERE trangthai = 0 ORDER BY ngayxuat";
                                                    $result = mysqli_query($conn, $query) or die(mysql_error());
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                      $mahang = $row['id'];
                                                      $query2 = "SELECT * FROM donhang WHERE mahanggoc = '$mahang' AND trangthai = 0";
                                                      $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                                      while ($row2 = mysqli_fetch_array($result2)) {
                                                        echo '<tr>';
                                                        echo '<td>';
                                                        echo $row2['mahang'];
                                                        echo '</td>';
                                                        echo '<td>';
                                                        echo number_format($row2['soluong'], 0);
                                                        echo '</td>';
                                                        echo '<td>';
                                                        $idhang = $row2['id'];
                                                        $query3 = "SELECT sum(sanluong) FROM sanluong WHERE mahang = '$idhang'";
                                                        $result3 = mysqli_query($conn, $query3) or die(mysql_error());
                                                        $row3 = mysqli_fetch_assoc($result3);
                                                        $tongsanluong = $row3['sum(sanluong)'];
                                                        echo number_format($tongsanluong, 0);
                                                        echo '</td>';
                                                        echo '<td>';
                                                        $tile = number_format($tongsanluong / $row2['soluong'] * 100, 0);
                                                        echo '
																	<div class="pull-right easy-pie-chart percentage" data-size="35" data-color="#ECCB71" data-percent="' . $tile . '">
																		<span class="percent">' . $tile . '</span>%
																	</div>';
                                                        echo '</td>';
                                                        echo '<td>';
                                                        echo $row2['ngayxuat'];
                                                        echo '</td>';
                                                        echo '<td>';
                                                        $query3 = "SELECT sum(sanluong) FROM sanluong WHERE mahang = '$idhang' GROUP BY ngay DESC";
                                                        $result3 = mysqli_query($conn, $query3) or die(mysql_error());
                                                        $numrow3 = mysqli_num_rows($result3);
                                                        $row3 = mysqli_fetch_assoc($result3);
                                                        if ($numrow3 > 0) {
                                                          $sanluongngay = $row3['sum(sanluong)'];
                                                        } else {
                                                          $sanluongngay = 1;
                                                        }
                                                        if ($sanluongngay < 1) {
                                                          $sanluongngay = 1;
                                                        }
                                                        echo 'Sản lượng ngày: ' . $sanluongngay;
                                                        $conlai = ($row['soluong'] - $tongsanluong) / $sanluongngay;
                                                        if ($conlai < 0) {
                                                          $conlai = 0;
                                                        }
                                                        $ngayxuat = strtotime($row['ngayxuat']);
                                                        $now = time();
                                                        $denngayxuat = $ngayxuat - $now;
                                                        $denngayxuat = round($denngayxuat / (60 * 60 * 24));
                                                        $conlai = $conlai - $denngayxuat;

                                                        echo '<br>Dự kiến chậm xuất ';
                                                        if ($conlai > 0) {
                                                          echo '<b>';
                                                        }
                                                        echo number_format($conlai, 0) . ' ngày';
                                                        if ($conlai > 0) {
                                                          echo '</b>';
                                                        }
                                                        echo '</td>';
                                                        echo '</tr>';
                                                      }
                                                    }
                                                    ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->


                    </div>
                </div><!-- /.row -->

                <div class="hr hr32 hr-dotted"></div>
                <div class="row" style="margin-top: 110px; position: relative">
                    <div class="col-sm-6">
                        <div class="widget-box transparent" id="recent-box">
                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div class="tab-content padding-8">
                                        <div id="thongke" class="tab-pane active">
                                            <h4 class="smaller lighter green">
                                                <i class="ace-icon fa fa-list"></i>
                                                Đơn hàng gần đây
                                            </h4>
                                            <table id="dynamic-table"
                                                   class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Khách hàng</th>
                                                    <th>Số lượng</th>
                                                    <th class="hidden-480">Sản lượng đã làm</th>
                                                    <th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                        Ngày xuất hàng
                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                include_once './config/config.php';
                                                $username = $_SESSION['username'];
                                                $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                                $query = "SELECT * FROM donhanggoc";
                                                $result = mysqli_query($conn, $query) or die(mysql_error());
                                                $tongcn = mysqli_num_rows($result);
                                                $query = "SELECT * FROM donhang WHERE trangthai = 0 ORDER BY id DESC LIMIT 10";
                                                $result = mysqli_query($conn, $query) or die(mysql_error());
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                  echo '<tr>';
                                                  echo '<td>';
                                                  $mahang = $row['id'];
                                                  $mahanggoc = $row['mahanggoc'];
                                                  echo $row['mahang'];
                                                  $query6 = "SELECT * FROM donhanggoc WHERE id = '" . $mahanggoc . "'";
                                                  $result6 = mysqli_query($conn, $query6) or die(mysql_error());
                                                  $row6 = mysqli_fetch_assoc($result6);
                                                  $khachhang = $row6['khachhang'];
                                                  echo '</td>';
                                                  echo '<td>';
                                                  $query4 = "SELECT * FROM khachhang WHERE id = '" . $khachhang . "'";
                                                  $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                  while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    $khachhang = $row4['makhachhang'];
                                                  }
                                                  echo $khachhang;
                                                  echo '</td>';
                                                  echo '<td>';
                                                  echo number_format($row['soluong'], 0);
                                                  echo '</td>';
                                                  echo '<td>';
                                                  $query4 = "SELECT sum(sanluong) FROM sanluong WHERE mahang = '" . $mahang . "'";
                                                  $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                  $row4 = mysqli_fetch_assoc($result4);
                                                  $rachuyen = $row4['sum(sanluong)'];
                                                  echo number_format($rachuyen, 0);
                                                  echo '</td>';
                                                  echo '<td>';
                                                  echo $row['ngayxuat'];
                                                  echo '</td>';
                                                  echo '</tr>';
                                                }
                                                ?>

                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.widget-box -->
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <div class="widget-box transparent" id="recent-box">
                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div class="tab-content padding-8">
                                        <div id="thongke" class="tab-pane active">
                                            <h4 class="smaller lighter green">
                                                <i class="ace-icon fa fa-list"></i>
                                                Thống kê doanh thu chuyền tháng này
                                            </h4>
                                            <table id="dynamic-table"
                                                   class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Bộ phận</th>
                                                    <th>Mã hàng</th>
                                                    <th>Doanh thu</th>
                                                    <th>Lũy kế</th>

                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                include_once './config/config.php';
                                                $today = date('Y-m-d');
                                                $year = date("Y", strtotime($today));
                                                $month = date("m", strtotime($today));
                                                $month = str_pad($month, 2, '0', STR_PAD_LEFT);
                                                $dauthang = date("$year-$month-01");
                                                $cuoithang = date("$year-$month-31");
                                                $query = "SELECT count(bophan),mahang,bophan FROM sanluong WHERE ngay >='$dauthang' AND ngay <='$cuoithang'  GROUP BY bophan ORDER BY bophan";
                                                $result = mysqli_query($conn, $query) or die(mysql_error());
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                  echo '<tr>';
                                                  echo '<td>';
                                                  $bophan = $row['bophan'];
                                                  echo $row['bophan'];
                                                  echo '</td>';
                                                  $query2 = "SELECT sum(sanluong),mahang,bophan FROM sanluong WHERE ngay >='$dauthang' AND ngay <='$cuoithang'  AND bophan ='$bophan' GROUP BY mahang";
                                                  $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                                  $doanhthu = 0;
                                                  $tenmahang = '';
                                                  $doanhthuma = '';
                                                  while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    $sanluong = $row2['sum(sanluong)'];
                                                    $mahang = $row2['mahang'];
                                                    $query3 = "SELECT * FROM donhang WHERE id ='$mahang'";
                                                    $result3 = mysqli_query($conn, $query3) or die(mysql_error());
                                                    $row3 = mysqli_fetch_assoc($result3);
                                                    $mahanggoc = $row3['mahanggoc'];
                                                    if ($tenmahang == '') {
                                                      $tenmahang = $row3['mahang'];
                                                    } else {
                                                      $tenmahang = $tenmahang . '<br>' . $row3['mahang'];
                                                    }
                                                    $query4 = "SELECT * FROM donhanggoc WHERE id ='$mahanggoc'";
                                                    $result4 = mysqli_query($conn, $query4) or die(mysql_error());
                                                    $row4 = mysqli_fetch_assoc($result4);
                                                    $dongiachuyen = $row4['dongiachuyen'];
                                                    $tamtinh = number_format($sanluong * $dongiachuyen, 0);
                                                    if ($doanhthuma == '') {
                                                      $doanhthuma = $tamtinh;
                                                    } else {
                                                      $doanhthuma = $doanhthuma . '<br>' . $tamtinh;
                                                    }
                                                    $doanhthu = $doanhthu + $sanluong * $dongiachuyen;

                                                  }

                                                  echo '<td>';
                                                  echo $tenmahang;
                                                  echo '</td>';
                                                  echo '<td>';
                                                  echo $doanhthuma;
                                                  echo '</td>';
                                                  echo '<td>';
                                                  echo number_format($doanhthu, 0);
                                                  echo '</td>';
                                                  echo '</tr>';
                                                }
                                                ?>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->