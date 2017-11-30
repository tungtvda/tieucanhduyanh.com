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

function show_danhmuc($data = array())
{
    $asign = array();
    $ten=  $asign['name_danhmuc']=$data['namdanhmuc'][0]->Name;
    $asign['danhmucsanpham'] = print_item('danhmucsanpham', $data['sanpham_dm']);
    $asign['PAGING']=showPagingAtLink($data['count'],$data['pagesize'],$data['current'],''.SITE_NAME.'/danh-muc/'.$_GET['Id'].'/'.LocDau($ten).'/');

    print_template($asign, 'danhmuc');
}