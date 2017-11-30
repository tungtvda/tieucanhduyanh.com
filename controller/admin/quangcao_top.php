<?php
require_once '../../config.php';
require_once DIR.'/model/quangcao_topService.php';
require_once DIR.'/view/admin/quangcao_top.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new quangcao_top();
            $new_obj->Id=$_GET["Id"];
            quangcao_top_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/quangcao_top.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=quangcao_top_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/quangcao_top.php');
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
            $List_quangcao_top=quangcao_top_getByAll();
            foreach($List_quangcao_top as $quangcao_top)
            {
                if(isset($_GET["check_".$quangcao_top->Id])) quangcao_top_delete($quangcao_top);
            }
            header('Location: '.SITE_NAME.'/controller/admin/quangcao_top.php');
        }
    }
    if(isset($_POST["Name"])&&isset($_POST["Img"])&&isset($_POST["Link_web"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['Img']))
       $array['Img']='0';
       if(!isset($array['Link_web']))
       $array['Link_web']='0';
      $new_obj=new quangcao_top($array);
        if($insert)
        {
            quangcao_top_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/quangcao_top.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            quangcao_top_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/quangcao_top.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=quangcao_top_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=quangcao_top_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_quangcao_top($data);
}
else
{
     header('location: '.SITE_NAME);
}
