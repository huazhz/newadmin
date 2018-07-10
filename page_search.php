<?
$temp = explode('?', $_SERVER['REQUEST_URI']);
$temp2 = explode('&', $temp[1]);
if (sizeof($temp2) > 0)
{
	for ($i = 0; $i < sizeof($temp2); $i++)
	{
		$varTemp = explode('=', $temp2[$i]);
		$urlVariables[$varTemp[0]] = $varTemp[1];
	}
}

$_SETTINGS['seo-title'] = 'Search for '.$urlVariables['key'];
include "inc_top.php";

$bannerPhoto = getDetails('exceed_photos', "`section`='innerbanners' order by `order` limit 0,1");
if (file_exists($bannerPhoto[3]))
{
?>
<div class="slider-main">
  <img src="<?=$sitePath?><?=$bannerPhoto[3]?>" alt="<?=$bannerPhoto[1]?>" width="100%">
</div>
<?
}
else echo '<br><BR>';	
?>

<div class="inner-sub">
	

	<div class="row">
	<div class="medium-6 columns">
    	<h1>Website Results </h1>
    	<?
    	if ($urlVariables['key'] != '')
    	{
	    	$cond = "navigation in (2,3,4,5,6,7) and status=1 ";
	    	$cond .= " and (title like '%".$urlVariables['key']."%' ";
	    	$cond .= " or contents like '%".$urlVariables['key']."%' ";
	    	$cond .= " or seo_title like '%".$urlVariables['key']."%' ";
	    	$cond .= " or seo_keywords like '%".$urlVariables['key']."%' ";
	    	$cond .= " or seo_desc like '%".$urlVariables['key']."%')";
	    	
	    	$search_pages = getAllData("exceed_pages", $cond." order by navigation,`order`");
	    	
			for ($i = 0; $i < sizeof($search_pages); $i++)
			{
			?>
			<div class="search-result">
			<a href="<?=$sitePath?><?=unFormatData($search_pages[$i]['pageURL'])?>"><strong><?=unFormatData($search_pages[$i]['title'])?></strong></a>	<br>
			<?=substrBYwords($search_pages[$i]['contents'], 25)?>.. <a href="<?=$sitePath?><?=unFormatData($search_pages[$i]['pageURL'])?>">Read More..</a>
			</div>			
			<?		
			}

    	}
    	
    	?>
    </div>
    <div class="medium-6 columns">
    	<h1>Blog Results </h1>
    	<?
    	if ($urlVariables['key'] != '')
    	{
	    	
	    	
	    	$cond = "status=1 ";
	    	$cond .= " and (title like '%".$urlVariables['key']."%' ";
	    	$cond .= " or author like '%".$urlVariables['key']."%' ";
	    	$cond .= " or `desc` like '%".$urlVariables['key']."%' ";
	    	$cond .= " or seo_title like '%".$urlVariables['key']."%' ";
	    	$cond .= " or seo_keywords like '%".$urlVariables['key']."%' ";
	    	$cond .= " or seo_description like '%".$urlVariables['key']."%')";
	    	
	    	$search_blogs = getAllData("exceed_blog_posts", $cond." order by `date` desc");
	    	
	    	for ($i = 0; $i < sizeof($search_blogs); $i++)
			{
			?>
			<div class="search-result">
			<a href="<?=$sitePath?><?=unFormatData($search_blogs[$i]['pageURL'])?>"><strong><?=unFormatData($search_blogs[$i]['title'])?></strong></a>	<br>
			<?=substrBYwords($search_blogs[$i]['desc'], 25)?>.. <a href="<?=$sitePath?><?=unFormatData($search_blogs[$i]['pageURL'])?>">Read More..</a>
			</div>			
			<?		
			}


    	}
    	
    	?>
    </div>
    </div>


   
</div>
<? include "inc_footer.php"; ?>