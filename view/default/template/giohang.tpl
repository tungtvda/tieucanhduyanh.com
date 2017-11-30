<style>
    .body-content .my-wishlist-page .my-wishlist table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        border: 1px solid rgb(221, 221, 221);
        padding: 10px;
    }
</style>
<script src="{SITE-NAME}/view/default/themes/js/jquery-1.11.1.min.js"></script>
<div class="col-md-9">
    <div class="table-responsive" data-example-id="bordered-table">
        <form action="" method="post">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th style="text-align: center"><i class="fa fa-remove"></i></th>
            </tr>
            </thead>
            <tbody>
            {sanpham}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td><span style="font-weight: bold">Tổng tiền</span></td>
                <td><span style="font-weight: bold; color: rgb(109, 4, 4)">{tongtien}</span></td>
                <td></td>
            </tr>

            </tbody>
        </table>
    </div>
    <script>
        function confirmSubmit()
        {
            var agree=confirm("Bạn chắc chắn xóa sản phẩm trong giỏ hàng);
            if (agree)
                return true ;
            else
                return false ;
        }
    </script>
    <div class="bs-example" data-example-id="form-inline-with-input-group">

        <a class="btn btn-primary" style="background-color: rgb(68, 150, 210); float: right" href="{SITE-NAME}">Tiếp tục mua hàng</a>
        <button name="capnhatgh" style="background-color: rgb(68, 150, 210); float: right; margin-right: 10px" type="submit" class="btn btn-primary">Cập
            nhật
        </button>

        </form>
        <form action="" method="post">
        <button style="background-color: red;" type="submit" name="xoagiohang" class="btn btn-primary">Xóa giỏ hàng</button>

        </form>

    </div>
    <div class="clearfix filters-container m-t-10">
        <div class="row">
            <div class="col col-sm-6 col-md-7">
                <div class="filter-tabs">
                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                        <li class="active"><a style="font-size: 20px" data-toggle="tab" href="javascript:void()"><i
                                        class="icon fa fa-th-list"></i>Thông tin đặt hàng</a></li>
                    </ul>
                </div>
                <!-- /.filter-tabs --></div>
            <!-- /.col --></div>
        <!-- /.row --></div>
    <div class="bs-example" data-example-id="form-inline-with-input-group">
        <form action="" method="post">
            <div class="col-md-12 contact-title"></div>
            <div class="col-md-4 ">
                <div class="form-group"><label class="info-title" for="exampleInputName">Tên khách hàng
                        <span style="color: red">*</span></label><input required type="text" name="Name_kh"
                                                     class="form-control unicase-form-control text-input"
                                                     id="exampleInputName" placeholder="Tên..."></div>
            </div>
            <div class="col-md-4">
                <div class="form-group"><label class="info-title"
                                               for="exampleInputEmail1">Email<span style="color: red">*</span></label><input name="Email_kh"
                                                                                                          type="email" required
                                                                                                          class="form-control unicase-form-control text-input"
                                                                                                          id="exampleInputEmail1"
                                                                                                          placeholder="Email...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group"><label class="info-title" for="exampleInputTitle">Số điện thoại
                        <span style="color: red">*</span></label><input type="number" required name="Phone_kh"
                                                     class="form-control unicase-form-control text-input"
                                                     id="exampleInputTitle" placeholder="Số điện thoại..."></div>
            </div>

            <div class="col-md-12">
                <div class="form-group"><label class="info-title" for="exampleInputTitle">Địa chỉ </label><input
                            type="text" name="Address_kh" class="form-control unicase-form-control text-input"
                            id="exampleInputTitle" placeholder="Địa chỉ..."></div>
            </div>
            <div class="col-md-12">
                <div class="form-group"><label class="info-title" for="exampleInputComments">Nội dung
                        </label><textarea name="Yeucau_kh" class="form-control unicase-form-control"
                                                        id="exampleInputComments"></textarea></div>
            </div>
            <div class="col-md-12 outer-bottom-small m-t-20"><input style="background-color: rgb(68, 150, 210)" type="submit" name="luudonhangs"
                                                                    class="btn-upper btn btn-primary "
                                                                    value="Đặt hàng"></div>
        </form>
    </div>
</div>

