<?php
require_once '../../config.php';
require_once DIR.'/model/slideService.php';
require_once DIR.'/view/admin/slide.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new slide();
            $new_obj->Id=$_GET["Id"];
            slide_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/slide.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=slide_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/slide.php');
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
            $List_slide=slide_getByAll();
            foreach($List_slide as $slide)
            {
                if(isset($_GET["check_".$slide->Id])) slide_delete($slide);
            }
            header('Location: '.SITE_NAME.'/controller/admin/slide.php');
        }
    }
    if(isset($_POST["Name"])&&isset($_POST["Img"])&&isset($_POST["Link"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['Img']))
       $array['Img']='0';
       if(!isset($array['Link']))
       $array['Link']='0';
      $new_obj=new slide($array);
        if($insert)
        {
            slide_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/slide.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            slide_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/slide.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=slide_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=slide_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_slide($data);
}
else
{
     header('location: '.SITE_NAME);
}
