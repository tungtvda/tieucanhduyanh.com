<?php
require_once DIR.'/view/default/public.php';
function view_footer($data=array())
{
    $asign=array();
    $asign['logo']=$data['config'][0]->Logo;
    $asign['Face']=$data['mangxahoi'][0]->Face;
    $asign['Feed']=$data['mangxahoi'][0]->Feed;
    $asign['Twitter']=$data['mangxahoi'][0]->Twitter;
    $asign['Google']=$data['mangxahoi'][0]->Google;
    $asign['Youtube']=$data['mangxahoi'][0]->Youtube;
    $asign['Name']=$data['config'][0]->Name;
    $asign['Address']=$data['config'][0]->Address;
    $asign['Phone']=$data['config'][0]->Phone;
    $asign['Email']=$data['config'][0]->Email;
    $asign['doitac'] = print_item('doitac', $data['doitac']);
    print_template($asign,'footer');
}