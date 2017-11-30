<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if (!defined('SITE_NAME')) {
    require_once '../../config.php';
}

require_once DIR . '/controller/default/public.php';
require_once DIR.'/common/redict.php';
$data['config'] = config_getByTop(1, '', '');
$data['slide'] = slide_getByTop('', '', 'Id desc');
$data['mangxahoi'] = mangxahoi_getByTop('', '', 'Id desc');
$data['quangcao_top'] = quangcao_top_getByTop('', '', 'Id desc');
$data['danhmuc'] = danhmuc_getByTop('', '', 'Id desc');
$data['sanpham_moi'] = sanpham_getByTop('', 'TrangThai=1', 'Id desc');
$data['sanpham_noibat'] = sanpham_getByTop('', 'TrangThai=2', 'Id desc');
$data['quangcao_left'] = quangcao_getByTop('', '', 'Id desc');


$data['menu'] = menu_getByTop('', 'Id=4', 'Id desc');
$data['doitac'] = doitac_getByTop('', '', 'Id desc');
if (isset($_GET['Id'])) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $kt) {
            if ($kt['id'] == $_GET['Id']) {
                $kiemtra = 1;
                $linkdh = SITE_NAME . '/gio-hang.html';

            } else {

            }
        }
    }
    $linksp = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    if (isset($kiemtra)) {
        echo "<script>alert('Sản phẩm đã có trong giỏ hàng, bạn vui lòng vào giỏi hàng cập nhật lại số lượng')</script>";
        echo "<script>window.location.href='$linkdh'</script>";
    } else {
        $soluong =1;
        $id = $_GET['Id'];
        if ($soluong == 0) {
            $soluong = 1;
        }
        if ($soluong == 0) {
            if ($soluong == 0) {
                echo "<script>alert('Số lượng phải lớn hơn 0')</script>";
                echo "<script>window.location.href='$linksp'</script>";
            }
        } else {
            $data['kiemtra'] = sanpham_getById($id);
            if (count($data['kiemtra']) > 0) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                    $newitem = array();

                }
                $newitem['id'] = $id;
                $newitem['soluong'] = $soluong;
                array_push($_SESSION['cart'], $newitem);
                redict(SITE_NAME.'/gio-hang.html');

            } else {
                redict(SITE_NAME);
            }
        }
    }
}
if (isset($_POST['dathang'])) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $kt) {
            if ($kt['id'] == $_POST['Idsanpham']) {
                $kiemtra = 1;
                $linkdh = SITE_NAME . '/gio-hang.html';

            } else {

            }
        }
    }
    $linksp = $_POST['Linksanpham'];
    if (isset($kiemtra)) {
        echo "<script>alert('Sản phẩm đã có trong giỏ hàng, bạn vui lòng vào giỏi hàng cập nhật lại số lượng')</script>";
        echo "<script>window.location.href='$linkdh'</script>";
    } else {
        $soluong = $_POST['SoLuong'];
        $id = $_POST['Idsanpham'];
        if ($soluong == 0) {
            $soluong = 1;
        }
        if ($soluong == 0) {
            if ($soluong == 0) {
                echo "<script>alert('Số lượng phải lớn hơn 0')</script>";
                echo "<script>window.location.href='$linksp'</script>";
            }
        } else {
            $data['kiemtra'] = sanpham_getById($id);
            if (count($data['kiemtra']) > 0) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                    $newitem = array();

                }
                $newitem['id'] = $id;
                $newitem['soluong'] = $soluong;
                array_push($_SESSION['cart'], $newitem);

            } else {
                redict(SITE_NAME);
            }
        }
    }
}
if (isset($_POST['xoagiohang'])) {
    if (!isset($_SESSION['cart'])) {
        echo "<script>alert('Bạn không có sản phẩm nào trong giỏ hàng')</script>";
        $link_web = SITE_NAME;
        echo "<script>window.location.href='$link_web';</script>";
    }
    unset($_SESSION['cart']);
    echo "<script>alert('Bạn đã xóa giỏ hàng')</script>";
    $link_web = SITE_NAME;
    echo "<script>window.location.href='$link_web';</script>";
}

if (isset($_POST['capnhatgh'])) {
    if (!isset($_SESSION['cart'])) {
        echo "<script>alert('Bạn không có sản phẩm nào trong giỏ hàng')</script>";
        $link_web = SITE_NAME;
        echo "<script>window.location.href='$link_web';</script>";
    }
    unset($_SESSION['cart']);
    $luong_ud = $_POST['SoLuong'];
    $id_ud = $_POST['Id'];
    $dem_ud = count($_POST['SoLuong']);
    $_SESSION['cart'] = array();
    $newitem = array();
    for ($i = 0; $i < $dem_ud; $i++) {
        if ($luong_ud[$i] == 0) {
            $soluong = 1;
        } else {
            $soluong = $luong_ud[$i];
        }
        $id = $id_ud[$i];
        $newitem['id'] = $id;
        $newitem['soluong'] = $soluong;
        array_push($_SESSION['cart'], $newitem);
    }
}
//$data['loi'] = "";
if (isset($_POST['luudonhangs'])) {
    if (!isset($_SESSION['cart'])) {
        echo "<script>alert('Bạn không có sản phẩm nào trong giỏ hàng')</script>";
        $link_web = SITE_NAME;
        echo "<script>window.location.href='$link_web';</script>";
    }
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        $ten = addslashes(strip_tags($_POST['Name_kh']));
        $email = addslashes(strip_tags($_POST['Email_kh']));
        $dienthoai = addslashes(strip_tags($_POST['Phone_kh']));
        $diachi = addslashes(strip_tags($_POST['Address_kh']));
        $noidung = addslashes(strip_tags($_POST['Yeucau_kh']));

        if ($ten == "" || $dienthoai == "" || $email == "" ) {
            echo "<script>alert('Qúy khách vui lòng nhập đầy đủ thông tin khách hàng')</script>";
        } else {
            $radom = rand(100, 100000000);
            $new = new dathang();
            $new->Name = $ten;
            $new->Email = $email;
            $new->Address = $diachi;
            $new->Phone = $dienthoai;
            $id_chung = $radom . '_' . $email;
            $new->Id_chung = $id_chung;
            $new->NoiDung = $noidung;
            $new->Created = date(DATETIME_FORMAT);
            dathang_insert($new);
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $car) {
                $thanhtien = 0;
                $id = $car['id'];
                $data['ttsanpham'] = sanpham_getById($id);
                $Img_truoc = $data['ttsanpham'][0]->Img;
                $name = $data['ttsanpham'][0]->Name;
                if ($data['ttsanpham'][0]->GiaMoi !== "") {
                    $gia = number_format($data['ttsanpham'][0]->GiaMoi, 0, ",", ".") . " vnđ";
                    $thanhtien = $data['ttsanpham'][0]->GiaMoi * $car['soluong'];
                } else {
                    $gia = "";
                    $thanhtien_dd = "";
                }
                $tongtien = $tongtien + $thanhtien;
                $new_gh = new giohang();
                $new_gh->Id_chung = $id_chung;
                $new_gh->Name = $name;
                $new_gh->Img = $Img_truoc;
                $new_gh->Soluong = $car['soluong'];
                $new_gh->DonGia = $gia;
                $new_gh->ThanhTien = $thanhtien;
                $link_sp = link_sanpham($data['ttsanpham'][0]);
                $tt_dd = number_format($thanhtien, 0, ",", ".") . " vnđ";
                giohang_insert($new_gh);
            }
            unset($_SESSION['cart']);
            echo "<script>alert('Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Xin cảm ơn!')</script>";
            $link_web = SITE_NAME;
            echo "<script>window.location.href='$link_web';</script>";
        }
    } else {
        echo "<script>alert('Bạn không có sản phẩm nào trong giỏ hàng')</script>";
        $link_web = SITE_NAME;
        echo "<script>window.location.href='$link_web';</script>";
    }
}

if (!isset($_SESSION['cart'])) {
    if ($_SESSION['kiemtra'] == 1) {
        echo "<script>alert('Bạn không có sản phẩm nào trong giỏ hàng')</script>";
    } else {
        if ($_SESSION['kiemtra'] == 2) {
            echo "<script>alert('You have no items in your shopping cart')</script>";
        } else {
            echo "<script>alert('귀하의 쇼핑 바구니에 항목이 없습니다')</script>";
        }
    }
    $link_web = SITE_NAME;
    echo "<script>window.location.href='$link_web';</script>";
}
if (count($_SESSION['cart']) == 0) {
    $link_web = SITE_NAME;
    echo "<script>window.location.href='$link_web';</script>";
}


$title = ($data['menu'][0]->Title) ? $data['menu'][0]->Title : 'Điện thoại Hàn Quốc';
$description = ($data['menu'][0]->Description) ? $data['menu'][0]->Description : 'Điện thoại Hàn Quốc';
$keywords = ($data['menu'][0]->Keyword) ? $data['menu'][0]->Keyword : 'Điện thoại Hàn Quốc';
show_header($title, $description, $keywords, $data);
show_menu($data, 'giohang');

show_left($data);
//show_slide($data);
show_giohang($data);
show_footer($data);
