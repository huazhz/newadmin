<?
$videoGallery = getDetails('exceed_gallery_cats', "type='videos' and status=1  and id=".$appID);
if ($videoGallery[0] > 0)
{
?>
<div class="home-tip">
<h3  style="text-align:center"><?=unFormatData($videoGallery[1])?></h3>
        <div style="text-align:center">
       	<?=unFormatData($videoGallery[4])?>
        </div>
        <br>
	<div class="row">
    	
        <?
        //print_r($urlVariables);
        
        if ($urlVariables['video-gallery'] > 0)
        	$videos = getAllData('exceed_photos', "sectionEID=".$appID." and status=1 and `section`='videos' order by `order`");
        else
         	$videos = getAllData('exceed_photos', "sectionEID=".$appID." and status=1 and `section`='videos' order by `order`");
       
        for ($i = 0; $i < sizeof($videos); $i++)
        {
        $youtubID = getYoutubeIDfromURL($videos[$i][2]);
        $photo = 'https://i.ytimg.com/vi/'.$youtubID.'/mqdefault.jpg';

        ?>
        <div class="medium-4 columns" style="float:left;">
                    <div class="video-thumb"   onclick="playYoutTubeVideo('<?=$youtubID?>')">
	                    <img src="<?=$photo?>" width="100%" alt="<?=$videos[$i][1]?>"/>
	                    <span><?=unFormatData($videos[$i][1])?>
	                    	<a href="javascript:;"><i class="fa fa-angle-right" aria-hidden="true"></i> Watch Video</a>
	                    </span>
                    </div>
        </div>
        <?
        }
       	?>
       	</div>
       	<?
       	/*
		$totalVideos = countDataPages('exceed_photos', "sectionEID=".$appID." and status=1 and `section`='videos'", 1);
        if ($totalVideos > 3 and $urlVariables['video-gallery'] <= 0) 
        {
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>
                <div class="email1"><br><a href="<?=$actual_link?>?video-gallery=<?=$appID?>" style="text-align:center;">
                <i class="fa fa-angle-right" aria-hidden="true"></i> View All (<?=sizeof($videos)?>)
				</a></div>
				
			
        <?
        }
        */
        ?>
        


        
    
</div>
<?
include "page_inc_apps_video_player.php";
}
?>