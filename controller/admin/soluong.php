<?php
require_once '../../config.php';
require_once DIR.'/model/soluongService.php';
require_once DIR.'/view/admin/soluong.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new soluong();
            $new_obj->Id=$_GET["Id"];
            soluong_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/soluong.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=soluong_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/soluong.php');
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
            $List_soluong=soluong_getByAll();
            foreach($List_soluong as $soluong)
            {
                if(isset($_GET["check_".$soluong->Id])) soluong_delete($soluong);
            }
            header('Location: '.SITE_NAME.'/controller/admin/soluong.php');
        }
    }
    if(isset($_POST["Name"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
      $new_obj=new soluong($array);
        if($insert)
        {
            soluong_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/soluong.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            soluong_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/soluong.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=soluong_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=soluong_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_soluong($data);
}
else
{
     header('location: '.SITE_NAME);
}
