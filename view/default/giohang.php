<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR.'/common/paging.php';
require_once DIR . '/common/cls_fast_template.php';
require_once DIR.'/common/locdautiengviet.php';

function show_giohang($data = array())
{
    $asign = array();
    $asign['sanpham']='';
    if (isset($_SESSION['cart'])) {
        if (count($_SESSION['cart']) > 0) {
            $tongtien = 0;
            $dem = 0;
            foreach ($_SESSION['cart'] as $sp=>$giatri) {
                $thanhtien = 1;
                $sl = $giatri['soluong'];
                $id = $giatri['id'];
                $data['ttsanpham'] = sanpham_getById($id);

                $img = $data['ttsanpham'][0]->Img;
                $link_sanpham = link_sanpham($data['ttsanpham'][0]);
                if ($data['ttsanpham'][0]->GiaMoi !== "") {
                    $gia = number_format($data['ttsanpham'][0]->GiaMoi, 0, ",", ".") . " vnđ";
                    $thanhtien = $data['ttsanpham'][0]->GiaMoi * $sl;
                    $thanhtien_dd = number_format($thanhtien, 0, ",", ".") . " vnđ";
                    $tongtien = $tongtien + $thanhtien;
                } else {
                    $gia = "";
                }
                $asign['tongtien'] = number_format($tongtien, 0, ",", ".") . " vnđ";
                $link_xoa = SITE_NAME . '/xoa-gio-hang/' . $sp;


                $asign['sanpham'] .= ' <tr >';
                $dem2 = $dem + 1;
                $name = $data['ttsanpham'][0]->Name;
                $asign['sanpham'].='
                 <tr>
                <th scope="row">'.$dem2.'</th>
                <td><a href="'.$link_sanpham.'">'.$name.'</a></td>
                <td style="text-align: center"><a href="'.$link_sanpham.'"><img
                            src="'.$img.'"
                            width="50"></a></td>
                <td><input name="SoLuong[' . $dem . ']" style="width: 60px;padding-left: 10px;" min="1" type="number" value="' . $sl . '"></td>
                <td>'.$gia.'</td>
                <td>'.$thanhtien_dd.'</td>
                <td  style="text-align: center;"><a onclick="return confirmSubmit()" href="' . $link_xoa . '" style="color: red"><i class="fa fa-trash-o"></i></a></td>
            </tr>
                ';
                $asign['sanpham'] .= '<input hidden type="text" name="Id['.$dem.']" value='.$id.'>';
                $dem = $dem + 1;
            }
        }

    } else {
        $asign['sanpham'] = "Bạn chưa có sản phẩm trong giỏ hàng";
    }
    print_template($asign, 'giohang');
}