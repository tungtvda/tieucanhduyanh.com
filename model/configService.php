<?php
require_once DIR.'/model/config.php';
require_once DIR.'/model/sqlconnection.php';
//
function config_Get($command)
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
                $new_obj=new config($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'config');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new config($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function config_getById($Id)
{
    return config_Get('select * from config where Id='.$Id);
}
//
function config_getByAll()
{
    return config_Get('select * from config');
}
//
function config_getByTop($top,$where,$order)
{
    return config_Get("select * from config ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function config_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return config_Get("SELECT * FROM  config ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function config_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return config_Get("SELECT config.Id, config.Title, config.Keywords, config.Description, config.Logo, config.Icon, config.Name, config.Address, config.Phone, config.Email, config.Website, config.Skype, config.Yahoo, config.facebook, config.NoiDung FROM  config ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function config_insert($obj)
{
    return exe_query("insert into config (Title,Keywords,Description,Logo,Icon,Name,Address,Phone,Email,Website,Skype,Yahoo,facebook,NoiDung) values ('$obj->Title','$obj->Keywords','$obj->Description','$obj->Logo','$obj->Icon','$obj->Name','$obj->Address','$obj->Phone','$obj->Email','$obj->Website','$obj->Skype','$obj->Yahoo','$obj->facebook','$obj->NoiDung')",'config');
}
//
function config_update($obj)
{
    return exe_query("update config set Title='$obj->Title',Keywords='$obj->Keywords',Description='$obj->Description',Logo='$obj->Logo',Icon='$obj->Icon',Name='$obj->Name',Address='$obj->Address',Phone='$obj->Phone',Email='$obj->Email',Website='$obj->Website',Skype='$obj->Skype',Yahoo='$obj->Yahoo',facebook='$obj->facebook',NoiDung='$obj->NoiDung' where Id=$obj->Id",'config');
}
//
function config_delete($obj)
{
    return exe_query('delete from config where Id='.$obj->Id,'config');
}
//
function config_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from config '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
