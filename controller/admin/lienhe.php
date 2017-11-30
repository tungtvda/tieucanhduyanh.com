<?php
require_once '../../config.php';
require_once DIR.'/model/lienheService.php';
require_once DIR.'/view/admin/lienhe.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new lienhe();
            $new_obj->Id=$_GET["Id"];
            lienhe_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/lienhe.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=lienhe_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/lienhe.php');
        }
        else
        {
            $data['tab1_class']='default-tab current';
        }
    }
    else
    {
        $data['tab1_class']='default-tab current';
    }
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_lienhe=lienhe_getByAll();
            foreach($List_lienhe as $lienhe)
            {
                if(isset($_GET["check_".$lienhe->Id])) lienhe_delete($lienhe);
            }
            header('Location: '.SITE_NAME.'/controller/admin/lienhe.php');
        }
    }
    if(isset($_POST["Name_kh"])&&isset($_POST["Name_sp"])&&isset($_POST["Price"])&&isset($_POST["Address"])&&isset($_POST["Phone"])&&isset($_POST["Email"])&&isset($_POST["TieuDe"])&&isset($_POST["NoiDung"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Name_kh']))
       $array['Name_kh']='0';
       if(!isset($array['Name_sp']))
       $array['Name_sp']='0';
       if(!isset($array['Price']))
       $array['Price']='0';
       if(!isset($array['Address']))
       $array['Address']='0';
       if(!isset($array['Phone']))
       $array['Phone']='0';
       if(!isset($array['Email']))
       $array['Email']='0';
       if(!isset($array['TieuDe']))
       $array['TieuDe']='0';
       if(!isset($array['NoiDung']))
       $array['NoiDung']='0';
      $new_obj=new lienhe($array);
        if($insert)
        {
            lienhe_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/lienhe.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            lienhe_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/lienhe.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=lienhe_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=lienhe_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_lienhe($data);
}
else
{
     header('location: '.SITE_NAME);
}
