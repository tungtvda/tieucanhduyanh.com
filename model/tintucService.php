<?php
require_once DIR.'/model/tintuc.php';
require_once DIR.'/model/sqlconnection.php';
//
function tintuc_Get($command)
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
                $new_obj=new tintuc($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'tintuc');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new tintuc($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function tintuc_getById($Id)
{
    return tintuc_Get('select * from tintuc where Id='.$Id);
}
//
function tintuc_getByAll()
{
    return tintuc_Get('select * from tintuc');
}
//
function tintuc_getByTop($top,$where,$order)
{
    return tintuc_Get("select * from tintuc ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function tintuc_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return tintuc_Get("SELECT * FROM  tintuc ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tintuc_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return tintuc_Get("SELECT tintuc.Id, tintuc.Name, tintuc.Img, tintuc.View, tintuc.NoiDung, tintuc.Title, tintuc.Keyword, tintuc.Description, tintuc.Created FROM  tintuc ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tintuc_insert($obj)
{
    return exe_query("insert into tintuc (Name,Img,View,NoiDung,Title,Keyword,Description,Created) values ('$obj->Name','$obj->Img','$obj->View','$obj->NoiDung','$obj->Title','$obj->Keyword','$obj->Description','$obj->Created')",'tintuc');
}
//
function tintuc_update($obj)
{
    return exe_query("update tintuc set Name='$obj->Name',Img='$obj->Img',View='$obj->View',NoiDung='$obj->NoiDung',Title='$obj->Title',Keyword='$obj->Keyword',Description='$obj->Description',Created='$obj->Created' where Id=$obj->Id",'tintuc');
}
//
function tintuc_delete($obj)
{
    return exe_query('delete from tintuc where Id='.$obj->Id,'tintuc');
}
//
function tintuc_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from tintuc '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
function tintuc_update_view($Id)
{
    return exe_query("update tintuc set View=View +1  where Id=".$Id,'');
}
