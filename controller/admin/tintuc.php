<?php
require_once '../../config.php';
require_once DIR.'/model/tintucService.php';
require_once DIR.'/view/admin/tintuc.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new tintuc();
            $new_obj->Id=$_GET["Id"];
            tintuc_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/tintuc.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=tintuc_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/tintuc.php');
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
            $List_tintuc=tintuc_getByAll();
            foreach($List_tintuc as $tintuc)
            {
                if(isset($_GET["check_".$tintuc->Id])) tintuc_delete($tintuc);
            }
            header('Location: '.SITE_NAME.'/controller/admin/tintuc.php');
        }
    }
    if(isset($_POST["Name"])&&isset($_POST["Img"])&&isset($_POST["View"])&&isset($_POST["NoiDung"])&&isset($_POST["Title"])&&isset($_POST["Keyword"])&&isset($_POST["Description"])&&isset($_POST["Created"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['Img']))
       $array['Img']='0';
       if(!isset($array['View']))
       $array['View']='0';
       if(!isset($array['NoiDung']))
       $array['NoiDung']='0';
       if(!isset($array['Title']))
       $array['Title']='0';
       if(!isset($array['Keyword']))
       $array['Keyword']='0';
       if(!isset($array['Description']))
       $array['Description']='0';
       if(!isset($array['Created']))
       $array['Created']='0';
      $new_obj=new tintuc($array);
        if($insert)
        {
            $new_obj->Created=date(DATETIME_FORMAT);
            tintuc_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/tintuc.php');
        }
        else
        {
            $new_obj->Created=date(DATETIME_FORMAT);
            $new_obj->Id=$_GET["Id"];
            tintuc_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/tintuc.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=tintuc_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=tintuc_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_tintuc($data);
}
else
{
     header('location: '.SITE_NAME);
}
