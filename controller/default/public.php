<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 11/20/14
 * Time: 11:00 AM
 */

$array_files=scandir(DIR.'/model');
foreach ($array_files as $filename) {
    $path = DIR.'/model/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
//
$array_files=scandir(DIR.'/view/default');
foreach ($array_files as $filename) {
    $path = DIR.'/view/default/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
function show_header($title,$description,$keyword,$data1=array())
{
    $data=array();
    $data['Title']=$title;
    $data['Description']=$description;
    $data['Keyword']=$keyword;
    $data['config']=$data1['config'];
    view_header($data);
}

function  show_slide($data1=array())
{
    $data=array();
//    $data['slide']=$data1['slide'];
    view_slide($data);
}

function  show_left($data1=array())
{


    $data=array();
    $data['danhmuc']=$data1['danhmuc'];
    $data['sanpham_moi']=$data1['sanpham_moi'];
    $data['sanpham_noibat']=$data1['sanpham_noibat'];
    $data['quangcao_left']=$data1['quangcao_left'];
    view_left($data);
}
function show_menu($data1=array(),$active='trangchu')
{
    $data=array();
    $data['active']=$active;
    $data['config']=$data1['config'];
    $data['danhmuc']=$data1['danhmuc'];
    $data['quangcao_top']=$data1['quangcao_top'];
    view_menu($data);
}
function show_footer($data1=array())
{
    $data=array();
    $data['mangxahoi']=$data1['mangxahoi'];
    $data['doitac']=$data1['doitac'];
    $data['config']=$data1['config'];
    view_footer($data);
}

