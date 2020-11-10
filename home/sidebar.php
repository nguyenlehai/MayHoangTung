<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

  <?php
  $name = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
  ?>
    <ul class="nav nav-list">
        <li>
            <a href="index.php">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Bàn làm việc </span>
            </a>

            <b class="arrow"></b>
        </li>


      <?php
      $link = array(
          'quanlycongnhan.php',
          'themcongnhan.php',
          'quanlybophan.php'
      );
      if (in_array($name, $link)) {
        echo '<li class="active open">';
      } else {
        echo '<li>';
      }

      ?>
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-desktop"></i>
            <span class="menu-text">
								Quản lý Công nhân
							</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li <?php if ($name == 'quanlycongnhan.php') echo ' class="active"' ?>>
                <a href="quanlycongnhan.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Quản lý công nhân
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'themcongnhan.php') echo ' class="active"' ?>>
                <a href="themcongnhan.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Thêm công nhân
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'quanlybophan.php') echo ' class="active"' ?>>
                <a href="quanlybophan.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Quản lý bộ phận
                </a>

                <b class="arrow"></b>

            </li>
        </ul>
        </li>

      <?php
      $link = array(
          'quanlykhachhang.php',
          'quanlydonhang.php',
          'quanlydonhanggoc.php',
          'quanlyhangxuat.php'
      );
      if (in_array($name, $link)) {
        echo '<li class="active open">';
      } else {
        echo '<li>';
      }

      ?>
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-list-alt"></i>
            <span class="menu-text">
								Quản lý đơn hàng
							</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li <?php if ($name == 'quanlykhachhang.php') echo ' class="active"' ?>>
                <a href="quanlykhachhang.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Quản lý khách hàng
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'quanlydonhang.php') echo ' class="active"' ?>>
                <a href="quanlydonhang.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Quản lý tách đơn hàng
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'quanlydonhanggoc.php') echo ' class="active"' ?>>
                <a href="quanlydonhanggoc.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Quản lý đơn hàng gốc
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'quanlyhangxuat.php') echo ' class="active"' ?>>
                <a href="quanlyhangxuat.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Quản lý xuất hàng
                </a>

                <b class="arrow"></b>

            </li>
        </ul>

        </li>

      <?php
      $link = array(
          'nhapsanluong.php',
          'quanlysanluong.php',
          'tonghopsanluong.php'
      );
      if (in_array($name, $link)) {
        echo '<li class="active open">';
      } else {
        echo '<li>';
      }

      ?>
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-calendar"></i>
            <span class="menu-text">
								Quản lý sản lượng
							</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li <?php if ($name == 'nhapsanluong.php') echo ' class="active"' ?>>
                <a href="nhapsanluong.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Nhập sản lượng
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'quanlysanluong.php') echo ' class="active"' ?>>
                <a href="quanlysanluong.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Báo cáo sản lượng
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'tonghopsanluong.php') echo ' class="active"' ?>>
                <a href="tonghopsanluong.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Tổng hợp sản lượng tháng
                </a>

                <b class="arrow"></b>

            </li>
        </ul>

        </li>
      <?php
      $link = array(
          'nhapsanluongcongnhan.php',
          'nhapdongia.php',
          'nhapchamcong.php',
          'chotsanluong.php',
          'candoisanluong.php',
          'gopmatinhluong.php',
          'nhapbaocom.php',
          'bangluongsanpham.php'

      );
      if (in_array($name, $link)) {
        echo '<li class="active open">';
      } else {
        echo '<li>';
      }

      ?>
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text">
								Quản lý tính lương
							</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li <?php if ($name == 'nhapsanluongcongnhan.php') echo ' class="active"' ?>>
                <a href="nhapsanluongcongnhan.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Nhập sản lượng công nhân
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'nhapdongia.php') echo ' class="active"' ?>>
                <a href="nhapdongia.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Nhập đơn giá
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'nhapchamcong.php') echo ' class="active"' ?>>
                <a href="nhapchamcong.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Nhập bảng chấm công
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'chotsanluong.php') echo ' class="active"' ?>>
                <a href="chotsanluong.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Chốt sản lượng tháng
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'candoisanluong.php') echo ' class="active"' ?>>
                <a href="candoisanluong.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kiểm tra cân đối sản lượng
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'gopmatinhluong.php') echo ' class="active"' ?>>
                <a href="gopmatinhluong.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Gộp mã tính lương
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'nhapbaocom.php') echo ' class="active"' ?>>
                <a href="nhapbaocom.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Báo cơm trưa
                </a>

                <b class="arrow"></b>

            </li>
            <li <?php if ($name == 'bangluongsanpham.php') echo ' class="active"' ?>>
                <a href="bangluongsanpham.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Bảng lương sản phẩm
                </a>

                <b class="arrow"></b>

            </li>
        </ul>

        </li>

      <?php
      $link = array(
          'theodoicongno.php',
          'quatrinhbaohiem.php',
          'mucdongbaohiem.php'
      );
      if (in_array($name, $link)) {
        echo '<li class="active open">';
      } else {
        echo '<li>';
      }

      ?>
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-o"></i>
            <span class="menu-text">
							Quản lí kế toán
							</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li <?php if ($name == 'theodoicongno.php') echo ' class="active"' ?>>
                <a href="theodoicongno.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Theo dõi công nợ
                </a>
                <b class="arrow"></b>
            </li>
            <li <?php if ($name == 'quatrinhbaohiem.php') echo ' class="active"' ?>>
                <a href="quatrinhbaohiem.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Danh sách đóng bảo hiểm
                </a>
                <b class="arrow"></b>
            </li>
            <li <?php if ($name == 'mucdongbaohiem.php') echo ' class="active"' ?>>
                <a href="mucdongbaohiem.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Mức đóng bảo hiểm
                </a>
                <b class="arrow"></b>
            </li>
        </ul>

        </li>
      <?php
      $link = array(
          'theodoidoanhthu.php',
          'theodoiphieuchi.php',
          'kiemtramahang.php'
      );
      if (in_array($name, $link)) {
        echo '<li class="active open">';
      } else {
        echo '<li>';
      }

      ?>
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-list"></i>
            <span class="menu-text">
								Quản lý chung
							</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li <?php if ($name == 'theodoidoanhthu.php') echo ' class="active"' ?>>
                <a href="theodoidoanhthu.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Theo dõi doanh thu
                </a>
                <b class="arrow"></b>
            </li>
            <li <?php if ($name == 'theodoiphieuchi.php') echo ' class="active"' ?>>
                <a href="theodoiphieuchi.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Theo dõi chi phí
                </a>
                <b class="arrow"></b>
            </li>
            <li <?php if ($name == 'kiemtramahang.php') echo ' class="active"' ?>>
                <a href="kiemtramahang.php">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kiểm tra mã hàng
                </a>
                <b class="arrow"></b>
            </li>
        </ul>

        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
           data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>