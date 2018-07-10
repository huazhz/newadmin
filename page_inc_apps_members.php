<?
$member = getDetails('exceed_pages', 'status=1 and id='.$appID);
if ($member[0] > 0)
{
$firstName = explode(' ' , $member['title']);
?>

    <div class="row">

	<div class="large-3 medium-4 columns">
    <div class="box-img"><img src="uploads/page_img_thumb<?=$member[0]?>.jpg" alt="<?=$member[1]?>"></div>
    </div>
	<div class="large-9 medium-8 columns">
    	<h3><?=unFormatData($member['title'])?> | <span><?=unFormatData($member['seo_title'])?></span></h3>
    	<?=unFormatData($member['contents'])?>
<div class="email5"><a href="mailto:<?=unFormatData($member['seo_keywords'])?>"><i class="fa fa-angle-right" aria-hidden="true"></i> Email <?=$firstName[0]?></a></div>
    </div>
    
</div>
<?
}
?>