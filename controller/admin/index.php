<?php
require_once '../../config.php';
require_once DIR.'/view/admin/index.php';
require_once DIR.'/common/messenger.php';
$data=array();
if(isset($_SESSION["Admin"]))
{
    view_index($data);
}
else
{
    header('location: '.SITE_NAME.'/login');
}