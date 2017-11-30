<?php
require_once '../../config.php';
require_once DIR.'/model/dathangService.php';
require_once DIR.'/view/admin/dathang.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new dathang();
            $new_obj->Id=$_GET["Id"];
            dathang_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/dathang.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=dathang_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/dathang.php');
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
            $List_dathang=dathang_getByAll();
            foreach($List_dathang as $dathang)
            {
                if(isset($_GET["check_".$dathang->Id])) dathang_delete($dathang);
            }
            header('Location: '.SITE_NAME.'/controller/admin/dathang.php');
        }
    }
    if(isset($_POST["Id_chung"])&&isset($_POST["Name"])&&isset($_POST["Email"])&&isset($_POST["Phone"])&&isset($_POST["Address"])&&isset($_POST["NoiDung"])&&isset($_POST["Created"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Id_chung']))
       $array['Id_chung']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['Email']))
       $array['Email']='0';
       if(!isset($array['Phone']))
       $array['Phone']='0';
       if(!isset($array['Address']))
       $array['Address']='0';
       if(!isset($array['TrangThai']))
       $array['TrangThai']='0';
       if(!isset($array['NoiDung']))
       $array['NoiDung']='0';
       if(!isset($array['Created']))
       $array['Created']='0';
      $new_obj=new dathang($array);
        if($insert)
        {
            dathang_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/dathang.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            dathang_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/dathang.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=dathang_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=dathang_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_dathang($data);
}
else
{
     header('location: '.SITE_NAME);
}
