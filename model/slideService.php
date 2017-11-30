<?php
require_once DIR.'/model/slide.php';
require_once DIR.'/model/sqlconnection.php';
//
function slide_Get($command)
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
                $new_obj=new slide($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'slide');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new slide($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function slide_getById($Id)
{
    return slide_Get('select * from slide where Id='.$Id);
}
//
function slide_getByAll()
{
    return slide_Get('select * from slide');
}
//
function slide_getByTop($top,$where,$order)
{
    return slide_Get("select * from slide ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function slide_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return slide_Get("SELECT * FROM  slide ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function slide_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return slide_Get("SELECT slide.Id, slide.Name, slide.Img, slide.Link FROM  slide ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function slide_insert($obj)
{
    return exe_query("insert into slide (Name,Img,Link) values ('$obj->Name','$obj->Img','$obj->Link')",'slide');
}
//
function slide_update($obj)
{
    return exe_query("update slide set Name='$obj->Name',Img='$obj->Img',Link='$obj->Link' where Id=$obj->Id",'slide');
}
//
function slide_delete($obj)
{
    return exe_query('delete from slide where Id='.$obj->Id,'slide');
}
//
function slide_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from slide '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
