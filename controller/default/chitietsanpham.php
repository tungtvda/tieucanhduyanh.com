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
require_once DIR.'/common/redict.php';
$data['config']=config_getByTop(1,'','');
$data['slide']=slide_getByTop('','','Id desc');
$data['mangxahoi']=mangxahoi_getByTop('','','Id desc');
$data['quangcao_top']=quangcao_top_getByTop('','','Id desc');
$data['danhmuc']=danhmuc_getByTop('','','Id desc');
$data['sanpham_moi']=sanpham_getByTop('','TrangThai=1','Id desc');
$data['sanpham_noibat']=sanpham_getByTop('','TrangThai=2','Id desc');
$data['quangcao_left']=quangcao_getByTop('','','Id desc');

if(isset($_GET['Id']))
{
    if(is_numeric($_GET['Id']))
    {
        $data['sanphamchitiet']=sanpham_getById($_GET['Id']);
        $id=$data['sanphamchitiet'][0]->DanhMucId;
        $data['namdanhmuc']=danhmuc_getById($id);
        $id_khac="DanhMucId=".$id." and Id !=".$_GET['Id'];
        $data['sanphamkhac']=sanpham_getByTop('',$id_khac,'Id desc');

    }
    else
    {
        redict(SITE_NAME);
    }
}
else
{
    redict(SITE_NAME);
}



$data['doitac']=doitac_getByTop('','','Id desc');


$title=($data['sanphamchitiet'][0]->Title)?$data['sanphamchitiet'][0]->Title:'Điện thoại Hàn Quốc';
$description=($data['sanphamchitiet'][0]->Description)?$data['sanphamchitiet'][0]->Description:'Điện thoại Hàn Quốc';
$keywords=($data['sanphamchitiet'][0]->Keyword)?$data['sanphamchitiet'][0]->Keyword:'Điện thoại Hàn Quốc';
show_header($title,$description,$keywords,$data);
show_menu($data,'danhmuc_menu');

show_left($data);
//show_slide($data);
show_chitietsanpham($data);
show_footer($data);
