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




        $data['current']=isset($_GET['page'])?$_GET['page']:'1';
        $data['pagesize']=5;
        $data['count']=tintuc_count('');
        $data['tintuc']=tintuc_getByPaging($data['current'],$data['pagesize'],'Id DESC','');


$data['menu']=menu_getByTop('','Id=2','Id desc');
$data['doitac']=doitac_getByTop('','','Id desc');


$title=($data['menu'][0]->Title)?$data['menu'][0]->Title:'Điện thoại Hàn Quốc';
$description=($data['menu'][0]->Description)?$data['menu'][0]->Description:'Điện thoại Hàn Quốc';
$keywords=($data['menu'][0]->Keyword)?$data['menu'][0]->Keyword:'Điện thoại Hàn Quốc';
show_header($title,$description,$keywords,$data);
show_menu($data,'tintuc');

show_left($data);
//show_slide($data);
show_tintuc($data);
show_footer($data);
