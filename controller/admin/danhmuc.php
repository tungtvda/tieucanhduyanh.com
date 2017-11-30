<?php
require_once '../../config.php';
require_once DIR.'/model/danhmucService.php';
require_once DIR.'/view/admin/danhmuc.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new danhmuc();
            $new_obj->Id=$_GET["Id"];
            danhmuc_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=danhmuc_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/danhmuc.php');
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
            $List_danhmuc=danhmuc_getByAll();
            foreach($List_danhmuc as $danhmuc)
            {
                if(isset($_GET["check_".$danhmuc->Id])) danhmuc_delete($danhmuc);
            }
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc.php');
        }
    }
    if(isset($_POST["Name"])&&isset($_POST["position"])&&isset($_POST["Title"])&&isset($_POST["Keyword"])&&isset($_POST["Description"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['position']))
       $array['position']='0';
       if(!isset($array['Title']))
       $array['Title']='0';
       if(!isset($array['Keyword']))
       $array['Keyword']='0';
       if(!isset($array['Description']))
       $array['Description']='0';
      $new_obj=new danhmuc($array);
        if($insert)
        {
            danhmuc_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            danhmuc_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=danhmuc_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=danhmuc_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_danhmuc($data);
}
else
{
     header('location: '.SITE_NAME);
}
