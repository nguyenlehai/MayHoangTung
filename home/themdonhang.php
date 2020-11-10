<!DOCTYPE html>
<html lang="en">
<?php
$permission = array("1", "3");
include('config/config.php') ?>
<?php include('head.php') ?>
<body class="no-skin">
<?php include('navbar.php') ?>
<div class="row">
    <div class="col-xs-12">
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>
          <?php include('sidebar.php'); ?>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>

                            <li>
                                <a href="#">Forms</a>
                            </li>
                            <li class="active">Form Elements</li>
                        </ul><!-- /.breadcrumb -->

                        <div class="nav-search" id="nav-search">
                            <form class="form-search">
								<span class="input-icon">
									<input type="text" autocomplete="off" placeholder="Search ..."
                                           class="nav-search-input" id="nav-search-input" autocomplete="off"/>
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                            </form>
                        </div><!-- /.nav-search -->
                    </div>

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
                                <form class="form-horizontal" role="form" name="themdonhang" action="./themdonhang.php"
                                      onsubmit="return validateForm()" method="post">
                                  <?php
                                  if (isset($_POST['mahang'])) {
                                    $mahang = $_POST['mahang'];
                                    $khachhang = $_POST['khachhang'];
                                    $soluong = $_POST['soluong'];
                                    $ngayvaochuyen = $_POST['ngayvaochuyen'];
                                    $ghichu = $_POST['ghichu'];
                                    $mota = $_POST['mota'];
                                    $dongia = $_POST['dongia'];
                                    $dongiachuyen = $_POST['dongiachuyen'];
                                    $ngayxuat = $_POST['ngayxuat'];
                                    $trangthai = $_POST['trangthai'];
                                    include_once './config/config.php';
                                    $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                    $query2 = "INSERT INTO donhang SET mahang = '$mahang' ,khachhang = '$khachhang' ,ngayvaochuyen='$ngayvaochuyen',dongia='$dongia',dongiachuyen='$dongiachuyen',soluong='$soluong'  ,ngayxuat='$ngayxuat',trangthai='$trangthai',mota='$mota',ghichu='$ghichu'";
                                    $result2 = mysqli_query($conn, $query2) or die(mysql_error());
                                    echo '<script type="text/javascript">
											alert("Thêm đơn hàng thành công");
											</script>';
                                  }
                                  ?>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Mã
                                            hàng</label>

                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" id="form-field-1-1" name="mahang"
                                                   placeholder="Mã hàng" class="col-xs-10 col-sm-5"/>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">
                                            Khách hàng</label>

                                        <div class="col-sm-9">
                                            <select id="khachhang" name="khachhang"
                                                    cclass="col-sm-3 control-label no-padding-right" data-size="5"
                                                    title="Chọn bộ phận" required>
                                              <?php
                                              include_once './config/config.php';
                                              $conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
                                              $query1 = "SELECT * FROM khachhang";
                                              $result1 = mysqli_query($conn, $query1) or die(mysql_error());
                                              while ($rows1 = mysqli_fetch_array($result1)) {
                                                echo '<option value="' . $rows1['id'] . '">' . $rows1['makhachhang'] . '</option>';
                                              }
                                              ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Số
                                            lượng</label>

                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" id="form-field-1-1" name="soluong"
                                                   placeholder="Số lượng" class="col-xs-10 col-sm-5"/>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Đơn
                                            giá</label>

                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" id="form-field-1-1" name="dongia"
                                                   placeholder="Đơn giá" class="col-xs-10 col-sm-5"/>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Đơn
                                            giá xuống chuyền</label>

                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" id="form-field-1-1"
                                                   name="dongiachuyen" placeholder="Đơn giá xuống chuyền"
                                                   class="col-xs-10 col-sm-5"/>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Mô
                                            tả</label>

                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" id="form-field-1-1" name="mota"
                                                   placeholder="Mô tả" class="col-xs-10 col-sm-5"/>
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
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ngày
                                            vào chuyền</label>

                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" id="form-field-1-1"
                                                   name="ngayvaochuyen" placeholder="2020-01-31"
                                                   class="col-xs-10 col-sm-5"/>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Ngày
                                            xuất</label>

                                        <div class="col-sm-9">
                                            <input type="text" autocomplete="off" id="form-field-1-1" name="ngayxuat"
                                                   placeholder="2020-01-31" class="col-xs-10 col-sm-5"/>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Trạng
                                            thái</label>
                                        <select id="khachhang" name="trangthai"
                                                cclass="col-sm-3 control-label no-padding-right" data-size="5"
                                                title="Chọn trạng thái" required>
                                            <option value="0">Đang làm</option>
                                            <option value="1">Đã xong</option>
                                        </select>
                                    </div>
                                    <div class="space-4"></div>

                                    <div class="col-sm-3 control-label no-padding-right">
                                        <button>
                                            Thêm đơn hàng
                                        </button>
                                    </div>

                                </form>
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
        <script>
            function validateForm() {
                var x = document.forms["themdonhang"]["mahang"].value;
                var y = document.forms["themdonhang"]["khachhang"].value;
                var a = document.forms["themdonhang"]["soluong"].value;
                var b = document.forms["themdonhang"]["dongia"].value;
                var c = document.forms["themdonhang"]["ngayxuat"].value;
                if (x == "" || x == null || y == "" || y == null || a == "" || a == null || b == "" || b == null || c == "" || c == null ||) {
                    alert("Vui lòng điền đủ thông tin đơn hàng");
                    return false;
                }
            }
        </script>
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
