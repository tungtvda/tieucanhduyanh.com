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
$data['danhmuc']=danhmuc_getByTop('','','position asc');
$data['sanpham_moi']=sanpham_getByTop('','TrangThai=1','Id desc');
$data['sanpham_noibat']=sanpham_getByTop('','TrangThai=2','Id desc');
$data['quangcao_left']=quangcao_getByTop('','','Id desc');

$data['slide']=slide_getByTop('','','Id desc');


$data['doitac']=doitac_getByTop('','','Id desc');


$title=($data['config'][0]->Title)?$data['config'][0]->Title:'Điện thoại Hàn Quốc';
$description=($data['config'][0]->Description)?$data['config'][0]->Description:'Điện thoại Hàn Quốc';
$keywords=($data['config'][0]->Keywords)?$data['config'][0]->Keywords:'Điện thoại Hàn Quốc';
show_header($title,$description,$keywords,$data);
show_menu($data,'trangchu');

show_left($data);
//show_slide($data);
show_index($data);
show_footer($data);
