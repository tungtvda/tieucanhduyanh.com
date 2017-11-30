<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
require_once DIR.'/common/locdautiengviet.php';
function show_index($data = array())
{
    $asign = array();
    $asign['slide'] = print_item('slide', $data['slide']);
    $asign['danhmuc'] = "";
    if (count($data['danhmuc']) > 0) {
        foreach ($data['danhmuc'] as $dm) {
            $id_dm = 'DanhMucId=' . $dm->Id;
            $link_dm = link_danhmuc($dm);
            $data['sanpham_dm'] = sanpham_getByTop('', $id_dm, 'Id desc');
            if (count($data['sanpham_dm']) > 0) {
                $asign['danhmuc'] .= "<section class='section featured-product wow fadeInUp'>";
                $asign['danhmuc'] .= "<h3 class='section-title'><a href='" . $link_dm . "'>" . $dm->Name . "</a></h3>";
                $asign['danhmuc'] .= "<div class='owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs'>";

                foreach ($data['sanpham_dm'] as $sp) {
                    $link_sp = link_sanpham($sp);
                    if (strlen($sp->NoiDung) > 250) {
                        $ten1 = strip_tags($sp->NoiDung);

                        $ten = substr($ten1, 0, 250);
                        $noidung = substr($ten, 0, strrpos($ten, ' ')) . "...";

                    } else {
                        $noidung = strip_tags($sp->NoiDung);
                    }

                    $asign['danhmuc'] .= "<div class='item item-carousel'>";
                    $asign['danhmuc'] .= "<div class='products'>";

                    $asign['danhmuc'] .= "<div class='product'>";
                    $asign['danhmuc'] .= "<div class='product-image'>";
                    $asign['danhmuc'] .= "<div class='image'>";
                    $asign['danhmuc'] .= "<a href='".$link_sp."'><img src='".$sp->Img."' data-echo='".$sp->Img."'  alt='".$sp->Name."' title='".$sp->Name."'></a>";
                    $asign['danhmuc'] .= "</div>";


                    if($sp->TrangThai==1)
                    {
                        $asign['danhmuc'] .= "<div class='tag new'><span>New</span></div>";
                    }
                    else

                    {
                        if($sp->TrangThai==2)
                        {
                            $asign['danhmuc'] .= "<div class='tag hot'><span>Hot</span></div>";
                        }
                        else
                        {
                            $asign['danhmuc'] .= "<div ><span></span></div>";
                        }
                    }
                    $asign['danhmuc'] .= "</div>";

                    $asign['danhmuc'] .= "<div style='width: 93%' class='product-info text-left'>";
                    $asign['danhmuc'] .= "<h3 class='name'><a href='".$link_sp."'>" . $sp->Name . "</a></h3>";


                    $asign['danhmuc'] .= "<div class='description'></div>";
                    $asign['danhmuc'] .= "<div class='product-price'>";
                    $giamoi="";
                    if($sp->GiaMoi!='')
                    {
                        $giamoi = number_format($sp->GiaMoi, 0, ",", ".")." vnđ";
                    }
                    $giacu="";
                    if($sp->GiaCu!='')
                    {
                        $giacu = number_format($sp->GiaCu, 0, ",", ".")." vnđ";
                    }

                    $asign['danhmuc'] .= " <span style='font-size:12px' class='price'>".$giamoi."</span>";
                    if($sp->GiaCu!="")
                    {
                        $asign['danhmuc'] .= "<span style='font-size:12px' class='price-before-discount'>".$giacu."</span>";
                    }

                    $asign['danhmuc'] .= "</div>";

                    $asign['danhmuc'] .= "</div>";
                    $asign['danhmuc'] .= "<div class='cart clearfix animate-effect'>";
                    $asign['danhmuc'] .= " <div class='action'>";
                    $asign['danhmuc'] .= "<ul class='list-unstyled'>";
                    $asign['danhmuc'] .= "<li class='add-cart-button btn-group'>";
                    $asign['danhmuc'] .= "<button class='btn btn-primary icon' data-toggle='dropdown' type='button'>";
                    $asign['danhmuc'] .= "<i class='fa fa-shopping-cart'></i>";
                    $asign['danhmuc'] .= "</button>";
                    $link_dathang=link_dathang($sp);
                    $asign['danhmuc'] .= "<a href='".$link_dathang."' class='btn btn-primary' type='button'> Đặt hàng</a>";
                    $asign['danhmuc'] .= "</li>";
                    $asign['danhmuc'] .= "<li class='lnk wishlist'>";
                    $asign['danhmuc'] .= " <a class='add-to-cart' href='".$link_sp."' title='" . $sp->Name . "'>";
                    $asign['danhmuc'] .= "<i class='icon fa fa-heart'></i>";
                    $asign['danhmuc'] .= " </a>";
                    $asign['danhmuc'] .= "</li>";
                    $asign['danhmuc'] .= "<li class='lnk'>";
                    $asign['danhmuc'] .= "<a class='add-to-cart' href='".$link_sp."' title='" . $sp->Name . "'>";
                    $asign['danhmuc'] .= "<i class='fa fa-retweet'></i>";
                    $asign['danhmuc'] .= "</a>";
                    $asign['danhmuc'] .= "</li>";
                    $asign['danhmuc'] .= "</ul>";
                    $asign['danhmuc'] .= " </div>";
                    $asign['danhmuc'] .= "</div>";
                    $asign['danhmuc'] .= "</div>";

                    $asign['danhmuc'] .= " </div>";
                    $asign['danhmuc'] .= "</div>";


                }
                $asign['danhmuc'] .= "</div></section>";
            }


        }
    }
    print_template($asign, 'index');
}