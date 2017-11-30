<?php
require_once '../../config.php';
require_once DIR.'/model/giohangService.php';
require_once DIR.'/view/admin/giohang.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new giohang();
            $new_obj->Id=$_GET["Id"];
            giohang_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/giohang.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=giohang_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/giohang.php');
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
            $List_giohang=giohang_getByAll();
            foreach($List_giohang as $giohang)
            {
                if(isset($_GET["check_".$giohang->Id])) giohang_delete($giohang);
            }
            header('Location: '.SITE_NAME.'/controller/admin/giohang.php');
        }
    }
    if(isset($_POST["Id_chung"])&&isset($_POST["Name"])&&isset($_POST["Img"])&&isset($_POST["Soluong"])&&isset($_POST["DonGia"])&&isset($_POST["ThanhTien"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Id_chung']))
       $array['Id_chung']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['Img']))
       $array['Img']='0';
       if(!isset($array['Soluong']))
       $array['Soluong']='0';
       if(!isset($array['DonGia']))
       $array['DonGia']='0';
       if(!isset($array['ThanhTien']))
       $array['ThanhTien']='0';
      $new_obj=new giohang($array);
        if($insert)
        {
            giohang_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/giohang.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            giohang_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/giohang.php');
        }
    }
    if(isset($_GET['Id_chung']))
    {
        $id='Id_chung='.'"'.$_GET['Id_chung'].'"';
        $data['Id_chung']=$_GET['Id_chung'];
    }
    else
    {
        $id="";
        $data['Id_chung']="";
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=giohang_count($id);
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=giohang_getByPagingReplace($data['page'],20,'Id DESC',$id);
    // gọi phương thức trong tầng view để hiển thị
    view_giohang($data);
}
else
{
     header('location: '.SITE_NAME);
}
