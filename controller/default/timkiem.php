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

if(isset($_GET['giatri']))
{
    $key=addslashes(strip_tags($_GET['giatri']));

    $dieukien="Name like '%".$key."%'";

    $data['sanpham_dm']=sanpham_getByTop('',$dieukien,'Id desc');
    $data['name']=$key;
//    $data['current']=isset($_GET['page'])?$_GET['page']:'1';
//    $data['pagesize']=5;
//    $data['count']=sanpham_count($dieukien);
//    $data['sanpham_dm']=sanpham_getByPaging($data['current'],$data['pagesize'],'Id DESC',$dieukien);


}
else
{
    redict(SITE_NAME);
}

$data['doitac']=doitac_getByTop('','','Id desc');


$title='Tìm kiếm';
$description=($data['config'][0]->Description)?$data['config'][0]->Description:'Điện thoại Hàn Quốc';
$keywords=($data['config'][0]->Keywords)?$data['config'][0]->Keywords:'Điện thoại Hàn Quốc';
show_header($title,$description,$keywords,$data);
show_menu($data,'');

show_left($data);
//show_slide($data);
show_timkiem($data);
show_footer($data);
