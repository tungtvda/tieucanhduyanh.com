<?php
require_once DIR.'/model/giohang.php';
require_once DIR.'/model/sqlconnection.php';
//
function giohang_Get($command)
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
                $new_obj=new giohang($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'giohang');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new giohang($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function giohang_getById($Id)
{
    return giohang_Get('select * from giohang where Id='.$Id);
}
//
function giohang_getByAll()
{
    return giohang_Get('select * from giohang');
}
//
function giohang_getByTop($top,$where,$order)
{
    return giohang_Get("select * from giohang ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function giohang_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return giohang_Get("SELECT * FROM  giohang ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function giohang_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return giohang_Get("SELECT giohang.Id, giohang.Id_chung, giohang.Name, giohang.Img, giohang.Soluong, giohang.DonGia, giohang.ThanhTien FROM  giohang ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function giohang_insert($obj)
{
    return exe_query("insert into giohang (Id_chung,Name,Img,Soluong,DonGia,ThanhTien) values ('$obj->Id_chung','$obj->Name','$obj->Img','$obj->Soluong','$obj->DonGia','$obj->ThanhTien')",'giohang');
}
//
function giohang_update($obj)
{
    return exe_query("update giohang set Id_chung='$obj->Id_chung',Name='$obj->Name',Img='$obj->Img',Soluong='$obj->Soluong',DonGia='$obj->DonGia',ThanhTien='$obj->ThanhTien' where Id=$obj->Id",'giohang');
}
//
function giohang_delete($obj)
{
    return exe_query('delete from giohang where Id='.$obj->Id,'giohang');
}
//
function giohang_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from giohang '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
