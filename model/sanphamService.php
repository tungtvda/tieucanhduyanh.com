<?php
require_once DIR.'/model/sanpham.php';
require_once DIR.'/model/sqlconnection.php';
//
function sanpham_Get($command)
{
            $array_result=array();
    $key=md5($command);
    if(CACHE)
    {
        $mycache=ConnectCache();
        $cachecommand=$mycache->get($key);
        if($cachecommand)
        {
            $array_result=$cachecommand;
        }
        else
        {
          $result=mysqli_query(ConnectSql(),$command);
            if($result!=false)while($row=mysqli_fetch_array($result))
            {
                $new_obj=new sanpham($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'sanpham');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new sanpham($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function sanpham_getById($Id)
{
    return sanpham_Get('select * from sanpham where Id='.$Id);
}
//
function sanpham_getByAll()
{
    return sanpham_Get('select * from sanpham');
}
//
function sanpham_getByTop($top,$where,$order)
{
    return sanpham_Get("select * from sanpham ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function sanpham_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return sanpham_Get("SELECT * FROM  sanpham ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function sanpham_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return sanpham_Get("SELECT sanpham.Id, danhmuc.Name as DanhMucId, sanpham.Name, sanpham.Img, sanpham.Img2, sanpham.Img3, sanpham.Img4, sanpham.Img5, soluong.Name as Soluong, trangthai.Name as TrangThai, sanpham.GiaCu, sanpham.GiaMoi, sanpham.MoTaNgan, sanpham.NoiDung, sanpham.Thongso, sanpham.Title, sanpham.Keyword, sanpham.Description FROM  sanpham, danhmuc, soluong, trangthai where danhmuc.Id=sanpham.DanhMucId and soluong.Id=sanpham.Soluong and trangthai.Id=sanpham.TrangThai  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function sanpham_insert($obj)
{
    return exe_query("insert into sanpham (DanhMucId,Name,Img,Img2,Img3,Img4,Img5,Soluong,TrangThai,GiaCu,GiaMoi,MoTaNgan,NoiDung,Thongso,Title,Keyword,Description) values ('$obj->DanhMucId','$obj->Name','$obj->Img','$obj->Img2','$obj->Img3','$obj->Img4','$obj->Img5','$obj->Soluong','$obj->TrangThai','$obj->GiaCu','$obj->GiaMoi','$obj->MoTaNgan','$obj->NoiDung','$obj->Thongso','$obj->Title','$obj->Keyword','$obj->Description')",'sanpham');
}
//
function sanpham_update($obj)
{
    return exe_query("update sanpham set DanhMucId='$obj->DanhMucId',Name='$obj->Name',Img='$obj->Img',Img2='$obj->Img2',Img3='$obj->Img3',Img4='$obj->Img4',Img5='$obj->Img5',Soluong='$obj->Soluong',TrangThai='$obj->TrangThai',GiaCu='$obj->GiaCu',GiaMoi='$obj->GiaMoi',MoTaNgan='$obj->MoTaNgan',NoiDung='$obj->NoiDung',Thongso='$obj->Thongso',Title='$obj->Title',Keyword='$obj->Keyword',Description='$obj->Description' where Id=$obj->Id",'sanpham');
}
//
function sanpham_delete($obj)
{
    return exe_query('delete from sanpham where Id='.$obj->Id,'sanpham');
}
//
function sanpham_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from sanpham '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
