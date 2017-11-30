<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_config($data)
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
    $ft->assign('TABLE-NAME','config');
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
    return '<th>Tiêu đề</th><th>Logo</th><th>Icon</th><th>Tên</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->Id."\"/></td>";
        $TableBody.="<td>".$obj->Title."</td>";
        $TableBody.="<td><img src=\"".$obj->Logo."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td><img src=\"".$obj->Icon."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->Name."</td>";
        $TableBody.="<td><a href=\"?action=edit&Id=".$obj->Id."\" title=\"Edit\"><img src=\"".SITE_NAME."/view/admin/Themes/images/pencil.png\" alt=\"Edit\"></a>";
        $TableBody.="<a href=\"?action=delete&Id=".$obj->Id."\" title=\"Delete\" onClick=\"return confirm('Bạn có chắc chắc muốn xóa?')\"><img src=\"".SITE_NAME."/view/admin/Themes/images/cross.png\" alt=\"Delete\"></a> ";
        $TableBody.="</td>";
        $TableBody.="</tr>";
    }
    return $TableBody;
}
//
function showFrom($form,$ListKey=array())
{
    $str_from='';
    $str_from.='<p><label>Tiêu đề</label><input class="text-input small-input" type="text"  name="Title" value="'.(($form!=false)?$form->Title:'').'" /></p>';
    $str_from.='<p><label>Keywords</label><input class="text-input small-input" type="text"  name="Keywords" value="'.(($form!=false)?$form->Keywords:'').'" /></p>';
    $str_from.='<p><label>Mô tả</label><textarea name="Description">'.(($form!=false)?$form->Description:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'Description\'); </script></p>';
    $str_from.='<p><label>Logo</label><input class="text-input small-input" type="text"  name="Logo" value="'.(($form!=false)?$form->Logo:'').'"/><a class="button" onclick="openKcEditor(\'Logo\');">Upload ảnh</a></p>';
    $str_from.='<p><label>Icon</label><input class="text-input small-input" type="text"  name="Icon" value="'.(($form!=false)?$form->Icon:'').'"/><a class="button" onclick="openKcEditor(\'Icon\');">Upload ảnh</a></p>';
    $str_from.='<p><label>Tên</label><input class="text-input small-input" type="text"  name="Name" value="'.(($form!=false)?$form->Name:'').'" /></p>';
    $str_from.='<p><label>Địa chỉ</label><input class="text-input small-input" type="text"  name="Address" value="'.(($form!=false)?$form->Address:'').'" /></p>';
    $str_from.='<p><label>Điện Thoại</label><input class="text-input small-input" type="text"  name="Phone" value="'.(($form!=false)?$form->Phone:'').'" /></p>';
    $str_from.='<p><label>Email</label><input class="text-input small-input" type="text"  name="Email" value="'.(($form!=false)?$form->Email:'').'" /></p>';
    $str_from.='<p><label>Website</label><input class="text-input small-input" type="text"  name="Website" value="'.(($form!=false)?$form->Website:'').'" /></p>';
    $str_from.='<p><label>Skype</label><input class="text-input small-input" type="text"  name="Skype" value="'.(($form!=false)?$form->Skype:'').'" /></p>';
    $str_from.='<p><label>Yahoo</label><input class="text-input small-input" type="text"  name="Yahoo" value="'.(($form!=false)?$form->Yahoo:'').'" /></p>';
    $str_from.='<p><label>facebook</label><input class="text-input small-input" type="text"  name="facebook" value="'.(($form!=false)?$form->facebook:'').'" /></p>';
    $str_from.='<p><label>Nội dung</label><textarea name="NoiDung">'.(($form!=false)?$form->NoiDung:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'NoiDung\'); </script></p>';
    return $str_from;
}
