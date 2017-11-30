<?php
require_once DIR.'/view/default/public.php';
function view_menu($data=array())
{
    $asign=array();


    $asign['trangchu']=($data['active']=='trangchu')?'active':'';
    $asign['gioithieu']=($data['active']=='gioithieu')?'active':'';
    $asign['danhmuc_menu']=($data['active']=='danhmuc_menu')?'active':'';
    $asign['tintuc']=($data['active']=='tintuc')?'active':'';
    $asign['lienhe']=($data['active']=='lienhe')?'active':'';

    $asign['logo']=$data['config'][0]->Logo;
    $asign['ten']=$data['config'][0]->Name;
    $asign['phone']=$data['config'][0]->Phone;
    $asign['email']=$data['config'][0]->Email;

    $asign['name_qc']=$data['quangcao_top'][0]->Name;
    $asign['anh_qc']=$data['quangcao_top'][0]->Img;
    $asign['link_qc']=$data['quangcao_top'][0]->Link_web;

    $asign['danhmuc'] = print_item('danhmuc', $data['danhmuc']);
    $asign['danhmuc_tk'] = print_item('danhmuc_tk', $data['danhmuc']);
    $asign['count_giohang']=0;
    if(isset($_SESSION['cart'])){
        $asign['count_giohang']=count($_SESSION['cart']);
    }
    print_template($asign,'menu');
}