<?
$navDetails = getDetails('exceed_navigation', "url='".$_GET['var']."'"); 
if ($navDetails[0] > 0)
{
	$pages = getAllData('exceed_pages', 'status=1 and  navigation='.$navDetails[0].' order by `order`');
	$pageDetails = $pages[0];
}
else
{
	$pageDetails = getDetails('exceed_pages', "status=1 and pageURL='".$_GET['var']."'"); 
	if ($pageDetails[0] > 0)
	{
		if ($pageDetails[7] != '')
		{
			header ("Location: ".$pageDetails[7]);
			exit();
		}
		if ($pageDetails[6] > 0) // this is NOT landing page
		{
			$navDetails = getDetails('exceed_navigation', "id='".$pageDetails[6]."'");
			$pages = getAllData('exceed_pages', 'status=1 and  navigation='.$navDetails[0].' order by `order`');
		}
		 
	}
	else
	{
		header ("Location: ".$sitePath."404");
		exit();
		
	}
}



if ($pageDetails[9] != '') $_SETTINGS['seo-title'] = $pageDetails[9];
if ($pageDetails[10] != '') $_SETTINGS['seo-keywords'] = $pageDetails[10];
if ($pageDetails[11] != '') $_SETTINGS['seo-desc'] = $pageDetails[11]; 

$navID= $navDetails[0];
$headerStyle = 'class="inner"';
include "inc_top.php";

if ($pageDetails['pagestyle'] == 0) //side nav
{
?>
<div class="container">
            <div class="row innerpage">
                <!-- Left Sidebar -->
                <div class="small-12 medium-3 large-3 columns">
                    <!--<h3 class="purple"><?=unFormatData($navDetails[1])?></h3>-->
                    <ul class="vertical menu">
                    <?
                    include "inc_side_pages.php";
                    ?>
                    </ul>
                    <div>
                    <?
					$sidenavpageArr = json_decode($pageDetails['sidenavpages'], true);
					if (sizeof($sidenavpageArr) > 0)
					{
						if ($sidenavpageArr[0] != '' or $sidenavpageArr[1] != '' ) $showSideNav= 1;
					}
					if ($pageDetails['sidehtmlcontents']  != '') $showSideNav = 1;
                    
			    	$indexApp = 0;
			    	include "page_inc_sideapps.php";
			    	echo unFormatData($pageDetails['sidehtmlcontents']);
			    	$indexApp = 1;
			    	include "page_inc_sideapps.php";
			    	?>
			    	</div>
                    
                </div>
                <!-- End Left Sidebar -->
                <!-- Main Container -->
                <div class="small-12 medium-9 large-9 columns inner-copy-text">
                <h3 class="blue"><?=unFormatData($pageDetails[1])?></h3>


<?
}
else
{
?>
<div class="container">
            <div class="row innerpage">
                <!-- Main Container -->
                <?
                if (sizeof($pages) > 1)
                {
                ?>
                <div class="small-12 large-12 column">
                    <h3 class="purple text-center"><?=unFormatData($navDetails[1])?></h3>
                    <ul class="vertical medium-horizontal menu">
                    <?
                    include "inc_side_pages.php";
                    ?>
                    </ul>
                </div>
                <?
                }
                else 
                	$titleCenter = 'style="text-align:center;"';
                ?>
                <div class="small-12 large-12 column inner-copy-text">
                 <h3 class="blue" <?=$titleCenter?>><?=unFormatData($pageDetails[1])?></h3>
<?
}
?>


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
		
		

	
	if ($urlVariables['gallery'] > 0)
	{
		include "page_inc_apps_gal_detail.php";
	}
	else
	{
		$indexApp = 0;
    	include "page_inc_apps.php";
    	echo unFormatData($pageDetails[2]);
    	$indexApp = 1;
    	include "page_inc_apps.php";
	}
	?>

			</div>
      </div>
</div>
<br><BR>
<?
include "inc_home_newsletter.php";
?>
<script>
$( document ).ready(function() {

	$('li', $('.menu')).click(function(){
		$('li', $('.menu')).removeClass('active');
		$(this).addClass('active');
	});
	
	$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        //return false;
      }
    }
  });
	
});
</script>
<?	
include "inc_footer.php"; 
?>