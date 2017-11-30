<?php
require_once DIR . '/view/default/public.php';
function view_slide($data = array())
{
    $asign = array();
    $asign['slide'] = print_item('slide', $data['slide']);



    print_template($asign, 'slide');
}