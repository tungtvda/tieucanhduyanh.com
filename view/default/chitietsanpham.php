<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_chitietsanpham($data = array())
{
    $asign = array();
//    $sdt=$asign['sdt']=$data['config'][0]->Phone;
//    $asign['name_dm']=$data['namdanhmuc'][0]->Name;
//
//
    $asign['danhmucsanpham'] = print_item('danhmucsanpham', $data['sanphamkhac']);

    $asign['Link_sp'] =link_sanpham($data['sanphamchitiet'][0]);
    $asign['Link_dh'] =link_dathang($data['sanphamchitiet'][0]);
    $asign['NoiDung'] = $data['sanphamchitiet'][0]->NoiDung;
    $asign['Name'] = $data['sanphamchitiet'][0]->Name;
    $asign['Id'] = $data['sanphamchitiet'][0]->Id;
    $asign['TrangThai'] = $data['sanphamchitiet'][0]->TrangThai;
    if($asign['TrangThai']==1)
    {
        $asign['TrangThai'] ="Còn hàng";
    }
    else
    {
        $asign['TrangThai'] ="Hết hàng";
    }
    $asign['MoTaNgan'] = $data['sanphamchitiet'][0]->MoTaNgan;
    $asign['Thongso'] = $data['sanphamchitiet'][0]->Thongso;
    $asign['Img'] = $data['sanphamchitiet'][0]->Img;
    $asign['Img2'] = $data['sanphamchitiet'][0]->Img2;
    $asign['Img3'] = $data['sanphamchitiet'][0]->Img3;
    $asign['Img4'] = $data['sanphamchitiet'][0]->Img4;
    $asign['Img5'] = $data['sanphamchitiet'][0]->Img5;
    if($data['sanphamchitiet'][0]->GiaMoi!=0)
    {
        $asign['GiaMoi'] = number_format($data['sanphamchitiet'][0]->GiaMoi, 0, ",", ".")." vnđ";
    }
    else
    {
        $asign['GiaMoi']="";
    }
    if($data['sanphamchitiet'][0]->GiaCu!='')
    {
        $asign['GiaCu'] = number_format($data['sanphamchitiet'][0]->GiaCu, 0, ",", ".")." vnđ";
    }
    else
    {
        $asign['GiaCu']="";
    }

    print_template($asign, 'chitietsanpham');
}