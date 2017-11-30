<?php
require_once DIR.'/model/soluong.php';
require_once DIR.'/model/sqlconnection.php';
//
function soluong_Get($command)
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
                $new_obj=new soluong($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'soluong');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new soluong($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function soluong_getById($Id)
{
    return soluong_Get('select * from soluong where Id='.$Id);
}
//
function soluong_getByAll()
{
    return soluong_Get('select * from soluong');
}
//
function soluong_getByTop($top,$where,$order)
{
    return soluong_Get("select * from soluong ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function soluong_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return soluong_Get("SELECT * FROM  soluong ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function soluong_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return soluong_Get("SELECT soluong.Id, soluong.Name FROM  soluong ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function soluong_insert($obj)
{
    return exe_query("insert into soluong (Name) values ('$obj->Name')",'soluong');
}
//
function soluong_update($obj)
{
    return exe_query("update soluong set Name='$obj->Name' where Id=$obj->Id",'soluong');
}
//
function soluong_delete($obj)
{
    return exe_query('delete from soluong where Id='.$obj->Id,'soluong');
}
//
function soluong_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from soluong '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
