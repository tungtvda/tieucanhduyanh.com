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
function show_lienhe($data = array())
{
    $asign = array();



    print_template($asign, 'lienhe');
}