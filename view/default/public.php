<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nguyenvietdinh
 * Date: 2/6/14
 * Time: 3:51 PM
 * To change this template use File | Settings | File Templates.
 */
require_once DIR.'/common/cls_fast_template.php';
require_once DIR.'/common/locdautiengviet.php';
function print_template($data=array(),$tem)
{
    $ft=new FastTemplate(DIR.'/view/default/template');
    $ft->define($tem,$tem.'.tpl');
    $ft->assign('SITE-NAME',SITE_NAME);
    if(count($data)>0)
    {
        $keys=array_keys($data);
        foreach($keys as $item)
        {
            $ft->assign($item,$data[$item]);
        }
    }
    print $ft->parse_and_return($tem);
}

function print_item($file,$ListItem,$LocDau=false,$LocDauAssign=false,$numberformat=false)
{
    if(count($ListItem)>0)
    {
        $array_var=get_object_vars($ListItem[0]);
        $var_name_array=array_keys($array_var);
        $result='';
        $ft=new FastTemplate(DIR.'/view/default/template/item');
        $ft->define('item',$file.'.tpl');
        $ft->assign('SITE-NAME',SITE_NAME);
        foreach($ListItem as $item)
        {

            foreach($var_name_array as $var)
            {
                if($LocDau!=false)
                {
                    if($LocDau==$var)
                    {
                        $ft->assign($LocDauAssign,LocDau($item->$var));
                    }
                }

                if($numberformat!=false)
                {
                    if($numberformat==$var)
                    {
                        $ft->assign($var,number_format($item->$var,0,'.','.'));
                    }
                    else
                    {
                        $ft->assign($var,$item->$var);
                    }
                }
                else
                {
                    $ft->assign($var,$item->$var);
                }
            }

            if(get_class($item)=='danhmuc')
            {
                $ft->assign('Link',link_danhmuc($item));

            }

            if(get_class($item)=='sanpham')
            {
                $ft->assign('Link',link_sanpham($item));
                $ft->assign('Link_dh',link_dathang($item));
                if (strlen($item->NoiDung) > 250) {
                    $ten1=strip_tags($item->NoiDung);

                    $ten = substr($ten1, 0, 250);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('NoiDung',$name);
                } else {
                    $ft->assign('NoiDung',strip_tags($item->NoiDung));
                }
                if($item->GiaCu!="")
                {

                    $ft->assign('an','');
                }
                else
                {
                    $ft->assign('an','hidden');
                }
                if($item->TrangThai==1)
                {

                    $ft->assign('trangthai','new');
                    $ft->assign('bieutuong','new');
                }
                else

                {
                    if($item->TrangThai==2)
                    {
                        $ft->assign('trangthai','hot');
                        $ft->assign('bieutuong','hot');
                    }
                    else
                    {
                        $ft->assign('trangthai','');
                        $ft->assign('bieutuong','');
                    }
                }
                $ft->assign('GiaMoi','');
                if($item->GiaMoi!='')
                {
                    $ft->assign('GiaMoi',number_format($item->GiaMoi, 0, ",", ".")." vnđ");
                }
                $ft->assign('Giacu','');
                if($item->GiaCu!='')
                {
                    $ft->assign('Giacu',number_format($item->GiaCu, 0, ",", ".")." vnđ");
                }
            }


            if(get_class($item)=='tintuc')
            {
                $ft->assign('Link',link_tintuc($item));

                if (strlen($item->NoiDung) > 400) {
                    $ten1=strip_tags($item->NoiDung);

                    $ten = substr($ten1, 0, 400);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('NoiDung',$name);
                } else {
                    $ft->assign('NoiDung',strip_tags($item->NoiDung));
                }
                $ft->assign('Created',date_format(date_create($item->Created), 'd-m-Y'));

            }
            $result.=$ft->parse_and_return('item');
        }
        return $result;
    }
    else
    {
        return '';
    }

}
function link_sanpham($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-'.$app->Id.'.html';
}

function link_danhmuc($app)
{
    return SITE_NAME.'/danh-muc/'.$app->Id.'/'.LocDau($app->Name).'/';
}
function link_dathang($app)
{
    return SITE_NAME.'/dat-hang/'.LocDau($app->Name).'-'.$app->Id.'.html';
}

function link_tintuc($app)
{
    return SITE_NAME.'/tin-tuc/'.LocDau($app->Name).'-'.$app->Id.'.html';
}



