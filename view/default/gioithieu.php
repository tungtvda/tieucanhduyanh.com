<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
require_once DIR.'/common/locdautiengviet.php';
function show_gioithieu($data = array())
{
    $asign = array();

    $asign['noidung']=$data['config'][0]->NoiDung;

    print_template($asign, 'gioithieu');
}