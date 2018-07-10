<link rel="stylesheet" type="text/css" media="all" href="<?=$sitePath?>plugins/lightbox/css/styles.css">
<link rel="stylesheet" type="text/css" media="all" href="<?=$sitePath?>plugins/lightbox/css/magnific-popup.css">
<?
	$galleryDetails = getDetails('exceed_gallery_cats', 'status=1 and id='.$urlVariables['gallery']);
	$photos = getAllData('exceed_photos', "status=1 and sectionEID=".$galleryDetails[0]." and `section`='gallery' order by `order`");
	if ($showSideNav == 1)
	{
	if ($inlineGallery <= 0)
	{
	?>
	<div class="row">
	<div class="medium-12 columns">
    	<h1><?=unFormatData($galleryDetails[1])?></h1>
    </div>
    </div>
    <div class="row">
	<div class="large-8 medium-7 columns mob-right">
		<?=unFormatData($galleryDetails[4])?>
    <?
    }
    else
    {
    ?>
    <div class="row">
	<div class="large-8 medium-7 columns mob-right">
    <?
    }
    
	
	
		if ($galleryDetails[4] != '') echo '<br><br>';    	
    	?>
			<ul class="row" id="portfolio">
			<?
			
        	for ($i = 0; $i < sizeof($photos); $i++)
            {
        	?>
        	<li class=" large-3 medium-4 small-12 columns">
           <a href="<?=$sitePath?><?=$photos[$i][5]?>" title="<?=$photos[$i][1]?>"><img src="<?=$sitePath?><?=$photos[$i][4]?>"></a>
            </li>
        	<?
        	}
			?> 
			</ul>
		
	</div>
	<div class="large-4 medium-5 columns">
		<?
    	$indexApp = 0;
    	include "page_inc_sideapps.php";
    	echo unFormatData($pageDetails['sidehtmlcontents']);
    	$indexApp = 1;
    	include "page_inc_sideapps.php";
    	?>
    	
	</div>
	</div>
	<?
	}
	else
	{
	?>
	<div class="row">
	<div class="medium-12 columns">
		<?
		if ($inlineGallery <= 0)
		{
		?>
		<h1><?=unFormatData($galleryDetails[1])?></h1>
    	<div style="text-align:center;"><?=unFormatData($galleryDetails[4])?></div>
		<?
		}
		?>
    	
    	<?
		if ($galleryDetails[4] != '') echo '<br><br>';    	
    	?>
    	
    		<ul class="row" id="portfolio">
			<?
			$braclestsArr = array('(', ')');
			$bracletsTags = array('<br><span>(', ')</span>');
			
        	for ($i = 0; $i < sizeof($photos); $i++)
            {
        	?>
        	<li class="large-3 medium-4 small-12 columns">
            <a href="<?=$sitePath?><?=$photos[$i][5]?>" title="<?=$photos[$i][1]?>"><img src="<?=$sitePath?><?=$photos[$i][4]?>">
            </a><?=str_replace($braclestsArr, $bracletsTags, $photos[$i][1])?>
            
            </li>
        	<?
        	}
			?> 
			</ul>
    	
    </div>
    </div>
    <?
    }

?>
		<script type="text/javascript" src="<?=$sitePath?>plugins/lightbox/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript">
		$(function(){
		$('#portfolio').magnificPopup({
		delegate: 'a',
		type: 'image',
		image: {
		cursor: null,
		titleSrc: 'title'
		},
		gallery: {
		enabled: true,
		preload: [0,1], // Will preload 0 - before current, and 1 after the current image
		navigateByImgClick: true
		}
		});
		
		
		
		});
		
		
		</script>
