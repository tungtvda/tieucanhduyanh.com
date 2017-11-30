<?php
require_once DIR.'/model/quangcao_top.php';
require_once DIR.'/model/sqlconnection.php';
//
function quangcao_top_Get($command)
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
                $new_obj=new quangcao_top($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'quangcao_top');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new quangcao_top($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function quangcao_top_getById($Id)
{
    return quangcao_top_Get('select * from quangcao_top where Id='.$Id);
}
//
function quangcao_top_getByAll()
{
    return quangcao_top_Get('select * from quangcao_top');
}
//
function quangcao_top_getByTop($top,$where,$order)
{
    return quangcao_top_Get("select * from quangcao_top ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function quangcao_top_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return quangcao_top_Get("SELECT * FROM  quangcao_top ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function quangcao_top_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return quangcao_top_Get("SELECT quangcao_top.Id, quangcao_top.Name, quangcao_top.Img, quangcao_top.Link_web FROM  quangcao_top ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function quangcao_top_insert($obj)
{
    return exe_query("insert into quangcao_top (Name,Img,Link_web) values ('$obj->Name','$obj->Img','$obj->Link_web')",'quangcao_top');
}
//
function quangcao_top_update($obj)
{
    return exe_query("update quangcao_top set Name='$obj->Name',Img='$obj->Img',Link_web='$obj->Link_web' where Id=$obj->Id",'quangcao_top');
}
//
function quangcao_top_delete($obj)
{
    return exe_query('delete from quangcao_top where Id='.$obj->Id,'quangcao_top');
}
//
function quangcao_top_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from quangcao_top '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
