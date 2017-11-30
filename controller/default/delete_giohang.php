<?php

require_once '../../config.php';
require_once '../../common/redict.php';
$id=$_GET['Id'];
if(is_numeric($_GET['Id']))
{
    unset($_SESSION['cart'][$id]);
    redict(SITE_NAME.'/gio-hang.html');
}
else
{
    redict(SITE_NAME);
}
?>