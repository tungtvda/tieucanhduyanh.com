<?php
require_once DIR.'/model/lienhe.php';
require_once DIR.'/model/sqlconnection.php';
//
function lienhe_Get($command)
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
                $new_obj=new lienhe($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'lienhe');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new lienhe($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function lienhe_getById($Id)
{
    return lienhe_Get('select * from lienhe where Id='.$Id);
}
//
function lienhe_getByAll()
{
    return lienhe_Get('select * from lienhe');
}
//
function lienhe_getByTop($top,$where,$order)
{
    return lienhe_Get("select * from lienhe ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function lienhe_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return lienhe_Get("SELECT * FROM  lienhe ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function lienhe_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return lienhe_Get("SELECT lienhe.Id, lienhe.Name_kh, lienhe.Name_sp, lienhe.Price, lienhe.Address, lienhe.Phone, lienhe.Email, lienhe.TieuDe, lienhe.NoiDung FROM  lienhe ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function lienhe_insert($obj)
{
    return exe_query("insert into lienhe (Name_kh,Name_sp,Price,Address,Phone,Email,TieuDe,NoiDung) values ('$obj->Name_kh','$obj->Name_sp','$obj->Price','$obj->Address','$obj->Phone','$obj->Email','$obj->TieuDe','$obj->NoiDung')",'lienhe');
}
//
function lienhe_update($obj)
{
    return exe_query("update lienhe set Name_kh='$obj->Name_kh',Name_sp='$obj->Name_sp',Price='$obj->Price',Address='$obj->Address',Phone='$obj->Phone',Email='$obj->Email',TieuDe='$obj->TieuDe',NoiDung='$obj->NoiDung' where Id=$obj->Id",'lienhe');
}
//
function lienhe_delete($obj)
{
    return exe_query('delete from lienhe where Id='.$obj->Id,'lienhe');
}
//
function lienhe_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from lienhe '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
