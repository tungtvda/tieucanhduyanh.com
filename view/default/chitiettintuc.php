<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_chitiettintuc($data = array())
{
    $asign = array();

    $asign['tintuckhac'] = print_item('tintuckhac', $data['tintuckhac']);
    $asign['Link_tintuc'] =link_tintuc($data['chitiettintuc'][0]);
    $asign['NoiDung'] = $data['chitiettintuc'][0]->NoiDung;
    $asign['Name'] = $data['chitiettintuc'][0]->Name;
    $asign['Img'] = $data['chitiettintuc'][0]->Img;
    $asign['View'] = $data['chitiettintuc'][0]->View;

    $asign['Created'] = date_format(date_create($data['chitiettintuc'][0]->Created), 'd-m-Y');




    print_template($asign, 'chitiettintuc');
}