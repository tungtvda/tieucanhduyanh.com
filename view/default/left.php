<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function view_left($data = array())
{
    $asign = array();
    $asign['danhmuc_left'] = print_item('danhmuc_left', $data['danhmuc']);
    $asign['sanphammoi'] = "";
    $asign['sanphammoi1'] = print_item('sanpham_moi', $data['sanpham_moi']);
    $asign['sanpham_noibat'] = print_item('sanpham_noibat', $data['sanpham_noibat']);
    $asign['quangcao_left'] = print_item('quangcao_left', $data['quangcao_left']);

    print_template($asign, 'left');
}