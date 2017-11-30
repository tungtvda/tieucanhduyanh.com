<link rel="stylesheet" href="{SITE-NAME}/view/default/themes/css/tab.css">
<script>
    $(document).ready(function () {
        $("#slide_small1").click(function () {

            $(".an1").show();
            $(".an2").hide();
            $(".an3").hide();
            $(".an4").hide();
        })
        $("#slide_small2").click(function () {

            $(".an1").hide();
            $(".an2").show();
            $(".an3").hide();
            $(".an4").hide();
        })
        $("#slide_small3").click(function () {

            $(".an1").hide();
            $(".an2").hide();
            $(".an3").show();
            $(".an4").hide();
        })
        $("#slide_small4").click(function () {

            $(".an1").hide();
            $(".an2").hide();
            $(".an3").hide();
            $(".an4").show();
        })
    });

</script>

<div class="col-md-9">
<div class="row  wow fadeInUp animated" style="visibility: visible; -webkit-animation: fadeInUp;">
    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
        <div class="product-item-holder size-big single-product-gallery small-gallery">

            <div id="owl-single-product" class="owl-carousel owl-theme"
                 style="opacity: 1; display: block; height: 360px">
                <div class="owl-wrapper-outer">
                    <div class="owl-wrapper" style="width: 6048px; left: 0px; display: block;">
                        <div class="owl-item " style="width: 336px;">
                            <div class="single-product-gallery-item an1" id="slide1">
                                <a data-lightbox="image-1" data-title="{Name}" href="{Img2}">
                                    <img class="img-responsive" alt="{Name}" src="{Img2}">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item " style="width: 336px;">
                            <div class="single-product-gallery-item an2" id="slide2">
                                <a data-lightbox="image-1" data-title="{Name}" href="{Img3}">
                                    <img class="img-responsive" alt="{Name}" src="{Img3}">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item an3" style="width: 336px;">
                            <div class="single-product-gallery-item" id="slide2">
                                <a data-lightbox="image-1" data-title="{Name}" href="{Img4}">
                                    <img class="img-responsive" alt="{Name}" src="{Img4}">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item an4" style="width: 336px;">
                            <div class="single-product-gallery-item" id="slide2">
                                <a data-lightbox="image-1" data-title="{Name}" href="{Img5}">
                                    <img class="img-responsive" alt="{Name}" src="{Img5}">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="owl-controls clickable">
                    <div class="owl-pagination">
                        <div class="owl-page active"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                    </div>
                </div>
            </div>
            <!-- /.single-product-slider -->


            <div class="single-product-gallery-thumbs gallery-thumbs">

                <div id="owl-single-product-thumbnails" class="owl-carousel owl-theme"
                     style="opacity: 1; display: block;">
                    <div>
                        <div style="width: 1512px; left: 0px; display: block;">
                            <div class="owl-item" style="width: 84px;float: left">
                                <div class="item">
                                    <a id="slide_small1"
                                       href="javascript:void()">
                                        <img class="img-responsive" width="85" alt=""
                                             src="{Img2}">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 84px;">
                                <div class="item">
                                    <a id="slide_small2"
                                       href="javascript:void()">
                                        <img class="img-responsive" width="85" alt=""
                                             src="{Img3}">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 84px;">
                                <div class="item">
                                    <a id="slide_small3"
                                       href="javascript:void()">
                                        <img class="img-responsive" width="85" alt=""
                                             src="{Img4}">
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 84px;">
                                <div class="item">
                                    <a id="slide_small4"
                                       href="javascript:void()">
                                        <img class="img-responsive" width="85" alt=""
                                             src="{Img5}">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="owl-controls clickable">
                        <div class="owl-pagination">
                            <div class="owl-page active"><span class=""></span></div>
                            <div class="owl-page"><span class=""></span></div>
                            <div class="owl-page"><span class=""></span></div>
                        </div>
                    </div>
                </div>
                <!-- /#owl-single-product-thumbnails -->


            </div>
            <!-- /.gallery-thumbs -->

        </div>
        <!-- /.single-product-gallery -->
    </div>
    <!-- /.gallery-holder -->
    <div class="col-sm-6 col-md-7 product-info-block">
        <div class="product-info">
            <h1 style="font-size: 20px" class="name">{Name}</h1>


            <!-- /.rating-reviews -->

            <div class="price-container info-container ">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="stock-box">
                            <span style="font-size: 16px;color: #666666;padding: 0px;font-weight: normal;line-height: 18px;"
                                  class="label">Trạng thái:</span>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="stock-box">
                            <span style="color: red" class="value">{TrangThai}</span>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.stock-container -->

            <div style="text-align: justify" class="price-container info-container ">
                {MoTaNgan}
            </div>
            <!-- /.description-container -->

            <div class="price-container info-container ">
                <div class="row">


                    <div class="col-sm-9">
                        <div class="price-box">
                            <span style="font-size: 20px;font-weight: 700;color: #46aad7;margin-right: 10px"
                                  class="price">{GiaMoi}</span>
                            <span style="text-decoration: line-through;font-size: 16px;color: #aaa;"
                                  class="price-strike">{GiaCu}</span>
                        </div>
                    </div>


                </div>
                <!-- /.row -->
            </div>
            <!-- /.price-container -->

            <div class="price-container info-container ">
                <div class="row">
                    <div class="col-sm-7">
                        <form method="post" action="{SITE-NAME}/gio-hang.html">
                            <input name="SoLuong"
                                   style="    width: 60px;height: 33px;border-radius: 4px; border: 1px solid;padding-left: 10px;; margin-right: 10px"
                                   type="number" value="1" min="1">
                            <input type="submit" class="btn btn-primary" name="dathang" value="Đặt hàng">
                            <!--<a href="{Link_dh}" class="btn btn-primary">
                        <i class="fa fa-shopping-cart inner-right-vs"></i> Đặt hàng</a>-->
                            <input hidden="hidden" type="text" value="{Id}" name="Idsanpham">
                            <input hidden="hidden" type="text" value="{Link_sp}" name="Linksanpham">
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.quantity-container -->

            <div class="price-container info-container ">
                <div class="addthis_native_toolbox"></div>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript"
                        src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-538d523363c2ee15"></script>
            </div>


        </div>
        <!-- /.product-info -->
    </div>
    <!-- /.col-sm-7 -->
</div>
<!-- /.row -->


<div class="product-tabs inner-bottom-xs  wow fadeInUp animated"
     style="visibility: visible; -webkit-animation: fadeInUp;">
    <div class="row">
        <div style="margin-left: 0px" class="col-sm-3 tabs">
            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                <li class="active"><a data-toggle="tab" href="#description">CHI TIẾT</a></li>
                <!--<li hidden class=""><a data-toggle="tab" href="#review">THÔNG SỐ KỸ THUẬT</a></li>-->
                <!--<li class=""><a data-toggle="tab" href="#tags">TAGS</a></li>-->
            </ul>
            <!-- /.nav-tabs #product-tabs -->
        </div>
        <div style="width: 100%" class="col-sm-9">

            <div class="tab-content">

                <div id="description" class="tab-pane active">
                    <div class="product-tab">
                        <p class="text">
                            {NoiDung}
                        </p>
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div hidden id="review" class="tab-pane">
                    <div class="product-tab">

                        <div class="product-reviews">
                            {Thongso}
                        </div>
                        <!-- /.product-reviews -->

                    </div>
                    <!-- /.product-tab -->
                </div>
                <!-- /.tab-pane -->

                <div class="fb-comments" data-href="{Link_sp}" data-width="100%" data-numposts="1"
                     data-colorscheme="light"></div>

            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<div class="clearfix filters-container m-t-10">
    <div class="row">
        <div style="width: 100%" class="col col-sm-6 col-md-2">
            <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active">
                        <a data-toggle="tab" href="javascript:void()"><i class="icon fa fa-th-list"></i>SẢN PHẨM CÙNG
                            DANH MỤC</a>
                    </li>

                </ul>
            </div>
            <!-- /.filter-tabs -->
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->
</div>
<div class="row">

    {danhmucsanpham}

</div>
</div>
