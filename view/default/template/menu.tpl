
<body class="cnt-home">

<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

<!-- ============================================== TOP MENU ============================================== -->

<!-- ============================================== TOP MENU : END ============================================== -->
<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="{SITE-NAME}">

                        <img style="width:70%" src="{logo}" alt="{ten}">

                    </a>
                </div><!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                <div class="contact-row">
                    <div class="phone inline">
                        <i class="icon fa fa-phone"></i><a style="color: red" href="tel:{phone}">{phone}</a>
                    </div>
                    <div class="phone inline">
                        <i class="icon fa fa-envelope"></i>
                        <a href="mailto:{email}">{email}</a>
                    </div>
                    <div class="contact inline">
                        <i class="icon fa fa-shopping-cart"></i>
                        <a href="{SITE-NAME}/gio-hang.html">{count_giohang} sản phẩm</a>

                    </div>
                </div><!-- /.contact-row -->
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">
                    <form action="{SITE-NAME}/tim-kiem" method="get">
                        <div class="control-group">

                            <ul class="categories-filter animate-dropdown">
                                <li class="dropdown">

                                    <a class="dropdown-toggle"  data-toggle="dropdown" href="">Danh mục <b class="caret"></b></a>

                                    <ul class="dropdown-menu" role="menu" >
                                        {danhmuc_tk}

                                    </ul>
                                </li>
                            </ul>

                            <input name="giatri" class="search-field" placeholder="Nhập từ khóa tìm kiếm..." />


                            <a class="search-button" href="javascript:void()" ></a>

                        </div>
                    </form>
                </div><!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <a href="{link_qc}"><img style="width: 100%" src="{anh_qc}" alt="{name_qc}" title="{name_qc}"></a>
                <div class="dropdown dropdown-cart">

                    <!--<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="total-price-basket">
                                <span class="lbl">cart -</span>
					<span class="total-price">
						<span class="sign">$</span>
						<span class="value">600.00</span>
					</span>
                            </div>
                            <div class="basket">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </div>
                            <div class="basket-item-count"><span class="count">2</span></div>

                        </div>
                    </a>-->
                    <ul class="dropdown-menu">
                        <li>
                            <div class="cart-item product-summary">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="image">
                                            <a href="indexbd17.html?page=detail"><img src="assets/images/cart.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">

                                        <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                                        <div class="price">$600.00</div>
                                    </div>
                                    <div class="col-xs-1 action">
                                        <a href="#"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div><!-- /.cart-item -->
                            <div class="clearfix"></div>
                            <hr>

                            <div class="clearfix cart-total">
                                <div class="pull-right">

                                    <span class="text">Sub Total :</span><span class='price'>$600.00</span>

                                </div>
                                <div class="clearfix"></div>

                                <a href="index994a.html?page=checkout" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                            </div><!-- /.cart-total-->


                        </li>
                    </ul><!-- /.dropdown-menu-->
                </div><!-- /.dropdown-cart -->

                <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
        </div><!-- /.row -->

    </div><!-- /.container -->

</div><!-- /.main-header -->

<!-- ============================================== NAVBAR ============================================== -->
<div class="header-nav animate-dropdown">
<div class="container">
<div class="yamm navbar navbar-default" role="navigation">
<div class="navbar-header">
    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>
<div class="nav-bg-class">
<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
<div class="nav-outer">
<ul class="nav navbar-nav">
<li class="{trangchu} dropdown yamm-fw">
    <a href="{SITE-NAME}" data-hover="dropdown" class="dropdown-toggle" >Trang chủ</a>

</li>
    <li class="{gioithieu}" >
        <a href="{SITE-NAME}/gioi-thieu.html"  >giới thiệu</a>
    </li>
<li class="dropdown yamm {danhmuc_menu}">
    <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Danh mục sản phẩm
        <span class="menu-label hot-menu hidden-xs">hot</span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <div class="yamm-content">
                <div class="row">
                    <div class='col-sm-12'>
                        <div  >

                            <ul class="links">
                                {danhmuc}


                            </ul>
                        </div><!-- /.col -->


                    </div>
                </div><!-- /.row -->
            </div><!-- /.yamm-content -->					</li>
    </ul>
</li>


    <li class="{tintuc}" >
        <a href="{SITE-NAME}/tin-tuc/"  >Tin tức</a>
    </li>
    <li class="{lienhe}" >
        <a href="{SITE-NAME}/lien-he.html"  >Liên hệ</a>
    </li>

</ul><!-- /.navbar-nav -->
<div class="clearfix"></div>
</div><!-- /.nav-outer -->
</div><!-- /.navbar-collapse -->


</div><!-- /.nav-bg-class -->
</div><!-- /.navbar-default -->
</div><!-- /.container-class -->

</div><!-- /.header-nav -->
<!-- ============================================== NAVBAR : END ============================================== -->

</header>