<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/controller/default/public.php';
$data['config']=config_getByTop(1,'','');
$data['slide']=slide_getByTop('','','Id desc');
$data['mangxahoi']=mangxahoi_getByTop('','','Id desc');
$data['quangcao_top']=quangcao_top_getByTop('','','Id desc');
$data['danhmuc']=danhmuc_getByTop('','','Id desc');
$data['sanpham_moi']=sanpham_getByTop('','TrangThai=1','Id desc');
$data['sanpham_noibat']=sanpham_getByTop('','TrangThai=2','Id desc');
$data['quangcao_left']=quangcao_getByTop('','','Id desc');

$data['menu']=menu_getByTop('','Id=3','Id desc');


$data['doitac']=doitac_getByTop('','','Id desc');


$title=($data['menu'][0]->Title)?$data['menu'][0]->Title:'?i?n tho?i Hàn Qu?c';
$description=($data['menu'][0]->Description)?$data['menu'][0]->Description:'?i?n tho?i Hàn Qu?c';
$keywords=($data['menu'][0]->Keyword)?$data['menu'][0]->Keyword:'?i?n tho?i Hàn Qu?c';
show_header($title,$description,$keywords,$data);
show_menu($data,'lienhe');

show_left($data);
//show_slide($data);
show_lienhe($data);
show_footer($data);

if(isset($_POST['guilienhe']))
{
    $ten=addslashes(strip_tags($_POST['Name_kh']));

    $email=addslashes(strip_tags($_POST['Email']));
    $dienthoai=addslashes(strip_tags($_POST['Phone']));
    $tieude=addslashes(strip_tags($_POST['TieuDe']));
    $diachi=addslashes(strip_tags($_POST['Address']));
    $noidung=addslashes(strip_tags($_POST['NoiDung']));
    if($ten==""||$email==""||$dienthoai==""||$noidung==""||$diachi=="")
    {
        echo "<script>alert('Quý khách vui lòng điền đầy đủ thông tin liên hệ')</script>";
    }
    else
    {

        $new = new lienhe();
        if(isset($_GET['Id']))
        {
            $data['sp']=sanpham_getById($_GET['Id']);
            $new->Name_sp=$data['sp'][0]->Name;
            $new->Price=$data['sp'][0]->GiaMoi;
        }


        $new->Name_kh=$ten;
        $new->Email=$email;
        $new->Address=$diachi;
        $new->TieuDe=$tieude;
        $new->Phone=$dienthoai;
        $new->NoiDung=$noidung;
        lienhe_insert($new);

        $link_web=SITE_NAME;

        echo "<script>alert('Quý khách đã gửi liên hệ thành công')</script>";
        echo "<script>window.location.href='$link_web';</script>";

    }
}
