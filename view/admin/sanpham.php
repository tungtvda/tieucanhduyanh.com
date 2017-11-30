<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_sanpham($data)
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
    $ft->assign('TABLE-NAME','sanpham');
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
    return '<th>Id</th><th>DanhMucId</th><th>Tên</th><th>Img</th><th>Soluong</th><th>TrangThai</th><th>GiaCu</th><th>GiaMoi</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->Id."\"/></td>";
        $TableBody.="<td>".$obj->Id."</td>";
        $TableBody.="<td>".$obj->DanhMucId."</td>";
        $TableBody.="<td>".$obj->Name."</td>";
        $TableBody.="<td><img src=\"".$obj->Img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->Soluong."</td>";
        $TableBody.="<td>".$obj->TrangThai."</td>";
        $TableBody.="<td>".$obj->GiaCu."</td>";
        $TableBody.="<td>".$obj->GiaMoi."</td>";
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
    $str_from.='<p><label>DanhMucId</label>';
    $str_from.='<select name="DanhMucId">';
    if(isset($ListKey['DanhMucId']))
    {
        foreach($ListKey['DanhMucId'] as $key)
        {
            $str_from.='<option value="'.$key->Id.'" '.(($form!=false)?(($form->DanhMucId==$key->Id)?'selected':''):'').'>'.$key->Name.'</option>';
        }
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>Tên</label><input class="text-input small-input" type="text"  name="Name" value="'.(($form!=false)?$form->Name:'').'" /></p>';
    $str_from.='<p><label>Img</label><input class="text-input small-input" type="text"  name="Img" value="'.(($form!=false)?$form->Img:'').'"/><a class="button" onclick="openKcEditor(\'Img\');">Upload ảnh</a></p>';
    $str_from.='<p><label>Img2</label><input class="text-input small-input" type="text"  name="Img2" value="'.(($form!=false)?$form->Img2:'').'"/><a class="button" onclick="openKcEditor(\'Img2\');">Upload ảnh</a></p>';
    $str_from.='<p><label>Img3</label><input class="text-input small-input" type="text"  name="Img3" value="'.(($form!=false)?$form->Img3:'').'"/><a class="button" onclick="openKcEditor(\'Img3\');">Upload ảnh</a></p>';
    $str_from.='<p><label>Img4</label><input class="text-input small-input" type="text"  name="Img4" value="'.(($form!=false)?$form->Img4:'').'"/><a class="button" onclick="openKcEditor(\'Img4\');">Upload ảnh</a></p>';
    $str_from.='<p><label>Img5</label><input class="text-input small-input" type="text"  name="Img5" value="'.(($form!=false)?$form->Img5:'').'"/><a class="button" onclick="openKcEditor(\'Img5\');">Upload ảnh</a></p>';
    $str_from.='<p><label>Soluong</label>';
    $str_from.='<select name="Soluong">';
    if(isset($ListKey['Soluong']))
    {
        foreach($ListKey['Soluong'] as $key)
        {
            $str_from.='<option value="'.$key->Id.'" '.(($form!=false)?(($form->Soluong==$key->Id)?'selected':''):'').'>'.$key->Name.'</option>';
        }
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>TrangThai</label>';
    $str_from.='<select name="TrangThai">';
    if(isset($ListKey['TrangThai']))
    {
        foreach($ListKey['TrangThai'] as $key)
        {
            $str_from.='<option value="'.$key->Id.'" '.(($form!=false)?(($form->TrangThai==$key->Id)?'selected':''):'').'>'.$key->Name.'</option>';
        }
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>GiaCu</label><input class="text-input small-input" type="text"  name="GiaCu" value="'.(($form!=false)?$form->GiaCu:'').'" /></p>';
    $str_from.='<p><label>GiaMoi</label><input class="text-input small-input" type="text"  name="GiaMoi" value="'.(($form!=false)?$form->GiaMoi:'').'" /></p>';
    $str_from.='<p><label>MoTaNgan</label><textarea name="MoTaNgan">'.(($form!=false)?$form->MoTaNgan:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'MoTaNgan\'); </script></p>';
    $str_from.='<p><label>Nội dung</label><textarea name="NoiDung">'.(($form!=false)?$form->NoiDung:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'NoiDung\'); </script></p>';
    $str_from.='<p hidden><label>Thongso</label><textarea name="Thongso">'.(($form!=false)?$form->Thongso:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'Thongso\'); </script></p>';
    $str_from.='<p><label>Tiêu đề</label><input class="text-input small-input" type="text"  name="Title" value="'.(($form!=false)?$form->Title:'').'" /></p>';
    $str_from.='<p><label>Keyword</label><input class="text-input small-input" type="text"  name="Keyword" value="'.(($form!=false)?$form->Keyword:'').'" /></p>';
    $str_from.='<p><label>Mô tả</label><input class="text-input small-input" type="text"  name="Description" value="'.(($form!=false)?$form->Description:'').'" /></p>';
    return $str_from;
}
