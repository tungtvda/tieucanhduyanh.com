<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_lienhe($data)
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
    $ft->assign('TABLE-NAME','lienhe');
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
    return '<th>Id</th><th>Name_kh</th><th>Name_sp</th><th>Price</th><th>Điện Thoại</th><th>Email</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->Id."\"/></td>";
        $TableBody.="<td>".$obj->Id."</td>";
        $TableBody.="<td>".$obj->Name_kh."</td>";
        $TableBody.="<td>".$obj->Name_sp."</td>";
        $TableBody.="<td>".$obj->Price."</td>";
        $TableBody.="<td>".$obj->Phone."</td>";
        $TableBody.="<td>".$obj->Email."</td>";
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
    $str_from.='<p><label>Name_kh</label><input class="text-input small-input" type="text"  name="Name_kh" value="'.(($form!=false)?$form->Name_kh:'').'" /></p>';
    $str_from.='<p><label>Name_sp</label><input class="text-input small-input" type="text"  name="Name_sp" value="'.(($form!=false)?$form->Name_sp:'').'" /></p>';
    $str_from.='<p><label>Price</label><input class="text-input small-input" type="text"  name="Price" value="'.(($form!=false)?$form->Price:'').'" /></p>';
    $str_from.='<p><label>Địa chỉ</label><input class="text-input small-input" type="text"  name="Address" value="'.(($form!=false)?$form->Address:'').'" /></p>';
    $str_from.='<p><label>Điện Thoại</label><input class="text-input small-input" type="text"  name="Phone" value="'.(($form!=false)?$form->Phone:'').'" /></p>';
    $str_from.='<p><label>Email</label><input class="text-input small-input" type="text"  name="Email" value="'.(($form!=false)?$form->Email:'').'" /></p>';
    $str_from.='<p><label>Tiêu đề</label><input class="text-input small-input" type="text"  name="TieuDe" value="'.(($form!=false)?$form->TieuDe:'').'" /></p>';
    $str_from.='<p><label>Nội dung</label><textarea name="NoiDung">'.(($form!=false)?$form->NoiDung:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'NoiDung\'); </script></p>';
    return $str_from;
}
