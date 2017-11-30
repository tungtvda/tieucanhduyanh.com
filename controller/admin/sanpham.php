<?php
require_once '../../config.php';
require_once DIR.'/model/sanphamService.php';
require_once DIR.'/model/danhmucService.php';
require_once DIR.'/model/soluongService.php';
require_once DIR.'/model/trangthaiService.php';
require_once DIR.'/view/admin/sanpham.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new sanpham();
            $new_obj->Id=$_GET["Id"];
            sanpham_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/sanpham.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=sanpham_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/sanpham.php');
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
    $data['listfkey']['DanhMucId']=danhmuc_getByAll();
    $data['listfkey']['Soluong']=soluong_getByAll();
    $data['listfkey']['TrangThai']=trangthai_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_sanpham=sanpham_getByAll();
            foreach($List_sanpham as $sanpham)
            {
                if(isset($_GET["check_".$sanpham->Id])) sanpham_delete($sanpham);
            }
            header('Location: '.SITE_NAME.'/controller/admin/sanpham.php');
        }
    }
    if(isset($_POST["DanhMucId"])&&isset($_POST["Name"])&&isset($_POST["Img"])&&isset($_POST["Img2"])&&isset($_POST["Img3"])&&isset($_POST["Img4"])&&isset($_POST["Img5"])&&isset($_POST["Soluong"])&&isset($_POST["TrangThai"])&&isset($_POST["GiaCu"])&&isset($_POST["GiaMoi"])&&isset($_POST["MoTaNgan"])&&isset($_POST["NoiDung"])&&isset($_POST["Thongso"])&&isset($_POST["Title"])&&isset($_POST["Keyword"])&&isset($_POST["Description"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['DanhMucId']))
       $array['DanhMucId']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['Img']))
       $array['Img']='0';
       if(!isset($array['Img2']))
       $array['Img2']='0';
       if(!isset($array['Img3']))
       $array['Img3']='0';
       if(!isset($array['Img4']))
       $array['Img4']='0';
       if(!isset($array['Img5']))
       $array['Img5']='0';
       if(!isset($array['Soluong']))
       $array['Soluong']='0';
       if(!isset($array['TrangThai']))
       $array['TrangThai']='0';
       if(!isset($array['GiaCu']))
       $array['GiaCu']='0';
       if(!isset($array['GiaMoi']))
       $array['GiaMoi']='0';
       if(!isset($array['MoTaNgan']))
       $array['MoTaNgan']='0';
       if(!isset($array['NoiDung']))
       $array['NoiDung']='0';
       if(!isset($array['Thongso']))
       $array['Thongso']='0';
       if(!isset($array['Title']))
       $array['Title']='0';
       if(!isset($array['Keyword']))
       $array['Keyword']='0';
       if(!isset($array['Description']))
       $array['Description']='0';
      $new_obj=new sanpham($array);
        if($insert)
        {
            sanpham_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/sanpham.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            sanpham_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/sanpham.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=sanpham_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=sanpham_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_sanpham($data);
}
else
{
     header('location: '.SITE_NAME);
}
