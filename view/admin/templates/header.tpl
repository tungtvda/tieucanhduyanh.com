<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>		 
		<title>admin Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="{SITE-NAME}/view/admin/Themes/css/reset.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="{SITE-NAME}/view/admin/Themes/css/style.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="{SITE-NAME}/view/admin/Themes/css/invalid.css" type="text/css" media="screen"/>	
		<script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/simpla.jquery.configuration.js"></script>
		<script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/facebox.js"></script>
		<script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.datePicker.js"></script>
		<script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.date.js"></script>
        <script type="text/javascript">
            var sitename='{SITE-NAME}';
        </script>
        <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/ckeditor/ckeditor.js"></script>
		</head>
	<body><div id="body-wrapper">
		<div id="sidebar" class="hide1"><div id="sidebar-wrapper">			
			<h1 id="sidebar-title"><a href="#">admin Page</a></h1>
			<a href="#"><img id="logo" src="{SITE-NAME}/view/admin/Themes/images/logo.png" alt="Simpla admin logo"></a>
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile">{USER-NAME}</a><br/>
				<br/>
				<a target="_blank" href="{SITE-NAME}" title="view the Site">view the Site</a> | <a href="{SITE-NAME}/controller/admin/signout.php" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">
                <li>
                    <a href="{SITE-NAME}/controller/admin/admin.php" class="nav-top-item no-submenu">
                        Tài khoản quản trị
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/dathang.php" class="nav-top-item no-submenu">
                       Liên hệ đặt hàng
                    </a>
                </li>
                <!--<li>
                    <a href="#" class="nav-top-item">
                        Liên hệ đặt hàng
                    </a>
                    <ul style="display: none;">
                        <li><a href="{SITE-NAME}/controller/admin/categories.php">Đơn hàng đã thanh toán</a> </li>
                        <li><a href="{SITE-NAME}/controller/admin/type.php">Loại</a> </li>
                    </ul>
                </li>-->
                <li>
                    <a href="{SITE-NAME}/controller/admin/config.php" class="nav-top-item no-submenu">
                        Cấu hình & giới thiệu
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/danhmuc.php" class="nav-top-item no-submenu">
                      Danh mục sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/sanpham.php" class="nav-top-item no-submenu">
                        Sản phẩm
                    </a>
                </li>

                <li>
                    <a href="{SITE-NAME}/controller/admin/slide.php" class="nav-top-item no-submenu">
                        Slide ảnh
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/tintuc.php" class="nav-top-item no-submenu">
                        Tin tức
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/doitac.php" class="nav-top-item no-submenu">
                        Đối tác
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/mangxahoi.php" class="nav-top-item no-submenu">
                        Mạng xã hội
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/quangcao.php" class="nav-top-item no-submenu">
                        Quảng cáo left
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/quangcao_top.php" class="nav-top-item no-submenu">
                        Quảng cáo trên banner
                    </a>
                </li>
                <li>
                    <a href="{SITE-NAME}/controller/admin/menu.php" class="nav-top-item no-submenu">
                        Menu
                    </a>
                </li>
			</ul><!-- End #main-nav -->
			
			
			
		</div></div><!-- End #sidebar -->