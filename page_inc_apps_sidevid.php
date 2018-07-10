<?
$videoDetails = getDetails('exceed_photos' , 'id='.$appID.' and status=1');
if ($videoDetails[0] > 0)
{
	$youtubID = getYoutubeIDfromURL($videoDetails[2]);
    $photo = 'https://i.ytimg.com/vi/'.$youtubID.'/hqdefault.jpg';
?>
<div class="video-thumb"   onclick="playYoutTubeVideo('<?=$youtubID?>')">
	                    <img src="<?=$photo?>" width="100%" alt="<?=$videoDetails[1]?>"/>
	                    <span><?=unFormatData($videoDetails[1])?>
	                    	<a href="javascript:;"><i class="fa fa-angle-right" aria-hidden="true"></i> Watch Video</a>
	                    </span>
                    </div>
<?
}
?>