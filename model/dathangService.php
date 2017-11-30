<?php
require_once DIR.'/model/dathang.php';
require_once DIR.'/model/sqlconnection.php';
//
function dathang_Get($command)
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
                $new_obj=new dathang($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'dathang');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new dathang($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function dathang_getById($Id)
{
    return dathang_Get('select * from dathang where Id='.$Id);
}
//
function dathang_getByAll()
{
    return dathang_Get('select * from dathang');
}
//
function dathang_getByTop($top,$where,$order)
{
    return dathang_Get("select * from dathang ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function dathang_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return dathang_Get("SELECT * FROM  dathang ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dathang_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return dathang_Get("SELECT dathang.Id, dathang.Id_chung, dathang.Name, dathang.Email, dathang.Phone, dathang.Address, dathang.TrangThai, dathang.NoiDung, dathang.Created FROM  dathang ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dathang_insert($obj)
{
    return exe_query("insert into dathang (Id_chung,Name,Email,Phone,Address,TrangThai,NoiDung,Created) values ('$obj->Id_chung','$obj->Name','$obj->Email','$obj->Phone','$obj->Address','$obj->TrangThai','$obj->NoiDung','$obj->Created')",'dathang');
}
//
function dathang_update($obj)
{
    return exe_query("update dathang set Id_chung='$obj->Id_chung',Name='$obj->Name',Email='$obj->Email',Phone='$obj->Phone',Address='$obj->Address',TrangThai='$obj->TrangThai',NoiDung='$obj->NoiDung',Created='$obj->Created' where Id=$obj->Id",'dathang');
}
//
function dathang_delete($obj)
{
    return exe_query('delete from dathang where Id='.$obj->Id,'dathang');
}
//
function dathang_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from dathang '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
