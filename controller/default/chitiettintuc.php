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

if(isset($_GET['Id']))
{
    if(is_numeric($_GET['Id']))
    {
        tintuc_update_view($_GET['Id']);
        $data['chitiettintuc']=tintuc_getById($_GET['Id']);
        $id='Id!='.$_GET['Id'];
        $data['tintuckhac']=tintuc_getByTop('',$id,'Id desc');



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


$title=($data['chitiettintuc'][0]->Title)?$data['chitiettintuc'][0]->Title:'Điện thoại Hàn Quốc';
$description=($data['chitiettintuc'][0]->Description)?$data['chitiettintuc'][0]->Description:'Điện thoại Hàn Quốc';
$keywords=($data['chitiettintuc'][0]->Keyword)?$data['chitiettintuc'][0]->Keyword:'Điện thoại Hàn Quốc';
show_header($title,$description,$keywords,$data);
show_menu($data,'tintuc');

show_left($data);
//show_slide($data);
show_chitiettintuc($data);
show_footer($data);
