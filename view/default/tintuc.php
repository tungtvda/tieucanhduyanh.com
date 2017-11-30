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

function show_tintuc($data = array())
{
    $asign = array();

    $asign['tintuc'] = print_item('tintuc', $data['tintuc']);
    $asign['PAGING']=showPagingAtLink($data['count'],$data['pagesize'],$data['current'],''.SITE_NAME.'/tin-tuc/');

    print_template($asign, 'tintuc');
}