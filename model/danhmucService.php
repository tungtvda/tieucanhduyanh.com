<?php
require_once DIR.'/model/danhmuc.php';
require_once DIR.'/model/sqlconnection.php';
//
function danhmuc_Get($command)
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
                $new_obj=new danhmuc($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'danhmuc');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new danhmuc($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function danhmuc_getById($Id)
{
    return danhmuc_Get('select * from danhmuc where Id='.$Id);
}
//
function danhmuc_getByAll()
{
    return danhmuc_Get('select * from danhmuc');
}
//
function danhmuc_getByTop($top,$where,$order)
{
    return danhmuc_Get("select * from danhmuc ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function danhmuc_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_Get("SELECT * FROM  danhmuc ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_Get("SELECT danhmuc.Id, danhmuc.Name, danhmuc.position, danhmuc.Title, danhmuc.Keyword, danhmuc.Description FROM  danhmuc ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_insert($obj)
{
    return exe_query("insert into danhmuc (Name,position,Title,Keyword,Description) values ('$obj->Name','$obj->position','$obj->Title','$obj->Keyword','$obj->Description')",'danhmuc');
}
//
function danhmuc_update($obj)
{
    return exe_query("update danhmuc set Name='$obj->Name',position='$obj->position',Title='$obj->Title',Keyword='$obj->Keyword',Description='$obj->Description' where Id=$obj->Id",'danhmuc');
}
//
function danhmuc_delete($obj)
{
    return exe_query('delete from danhmuc where Id='.$obj->Id,'danhmuc');
}
//
function danhmuc_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from danhmuc '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
