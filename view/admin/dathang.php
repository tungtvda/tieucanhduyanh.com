<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_dathang($data)
{
    $ft=new FastTemplate(DIR.'/view/admin/templates');
    $ft->define('header','header.tpl');
    $ft->define('body','body.tpl');
    $ft->define('footer','footer.tpl');
    //
    $ft->assign('TAB1-CLASS',isset($data['tab1_class'])?$data['tab1_class']:'');
    $ft->assign('TAB2-CLASS',isset($data['tab2_class'])?$data['tab2_class']:'');
    $ft->assign('USER-NAME',isset($data['username'])?$data['username']:'');
    $ft->assign('NOTIFICATION-CONTENT',isset($data['notififation_content'])?$data['notififation_content']:'');
    $ft->assign('TABLE-HEADER',showTableHeader());
    $ft->assign('PAGING',showPaging($data['count_paging'],20,$data['page']));
    $ft->assign('TABLE-BODY',showTableBody($data['table_body']));
    $ft->assign('TABLE-NAME','dathang');
    $ft->assign('CONTENT-BOX-LEFT',isset($data['content_box_left'])?$data['content_box_left']:'');
    $ft->assign('CONTENT-BOX-RIGHT',isset($data['content_box_right'])?$data['content_box_right']:' ');
    $ft->assign('NOTIFICATION',isset($data['notification'])?$data['notification']:' ');
    $ft->assign('SITE-NAME',isset($data['sitename'])?$data['sitename']:SITE_NAME);
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>Id</th><th>Tên</th><th>Email</th><th>Điện Thoại</th><th>TrangThai</th><th>Created</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->Id."\"/></td>";
        $TableBody.="<td>".$obj->Id."</td>";
        $TableBody.="<td>".$obj->Name."</td>";
        $TableBody.="<td>".$obj->Email."</td>";
        $TableBody.="<td>".$obj->Phone."</td>";
        $TableBody.="<td>".$obj->TrangThai."</td>";
        $TableBody.="<td>".$obj->Created."</td>";
        $TableBody.="<td><a href=\"?action=edit&Id=".$obj->Id."\" title=\"Edit\"><img src=\"".SITE_NAME."/view/admin/Themes/images/pencil.png\" alt=\"Edit\"></a>";
        $TableBody.="<a href=\"?action=delete&Id=".$obj->Id."\" title=\"Delete\" onClick=\"return confirm('Bạn có chắc chắc muốn xóa?')\"><img src=\"".SITE_NAME."/view/admin/Themes/images/cross.png\" alt=\"Delete\"></a> ";
        if($obj->TrangThai==0)
        {
            $TableBody.="<a href=\"".SITE_NAME."/controller/admin/giohang.php?Id_chung=".$obj->Id_chung."\" title=\"Edit\"><img style='height:20px; width:30px' src=\"".SITE_NAME."/view/admin/Themes/images/view.png\" alt=\"Edit\"></a>";
        }
        $TableBody.="</td>";
        $TableBody.="</tr>";
    }
    return $TableBody;
}
//
function showFrom($form,$ListKey=array())
{
    $str_from='';
    $str_from.='<p><label>Id_chung</label><input class="text-input small-input" type="text"  name="Id_chung" value="'.(($form!=false)?$form->Id_chung:'').'" /></p>';
    $str_from.='<p><label>Tên</label><input class="text-input small-input" type="text"  name="Name" value="'.(($form!=false)?$form->Name:'').'" /></p>';
    $str_from.='<p><label>Email</label><input class="text-input small-input" type="text"  name="Email" value="'.(($form!=false)?$form->Email:'').'" /></p>';
    $str_from.='<p><label>Điện Thoại</label><input class="text-input small-input" type="text"  name="Phone" value="'.(($form!=false)?$form->Phone:'').'" /></p>';
    $str_from.='<p><label>Địa chỉ</label><input class="text-input small-input" type="text"  name="Address" value="'.(($form!=false)?$form->Address:'').'" /></p>';
    $str_from.='<p><label>TrangThai</label><input  type="checkbox"  name="TrangThai" value="1" '.(($form!=false)?(($form->TrangThai=='1')?'checked':''):'').' /></p>';
    $str_from.='<p><label>Nội dung</label><textarea name="NoiDung">'.(($form!=false)?$form->NoiDung:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'NoiDung\'); </script></p>';
    $str_from.='<p><label>Created</label><input class="text-input small-input" type="text"  name="Created" value="'.(($form!=false)?$form->Created:'').'" /></p>';
    return $str_from;
}
