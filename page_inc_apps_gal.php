<?
$gallery = getDetails('exceed_gallery_cats', 'status=1 and id='.$appID);

if ($gallery[0] > 0)
{
	$thumbPhoto = "uploads/gallery_img_thumb".$gallery[0].".jpg";
	if(!file_exists($thumbPhoto))
	$thumbPhoto = getTitle('exceed_photos','thumburl', "sectionEID=".$gallery[0]." and `section`='gallery' order by `order` limit 0,1");
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	$urlVariables['gallery'] = $gallery[0];
	$inlineGallery = 1;
	include "page_inc_apps_gal_detail.php";
	echo '<br><BR>';
}
?>