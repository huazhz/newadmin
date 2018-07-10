<?
$videoDetails = getDetails('exceed_photos' , 'id='.$appID.' and status=1');
if ($videoDetails[0] > 0)
{
	$youtubID = getYoutubeIDfromURL($videoDetails[2]);
    $photo = 'https://i.ytimg.com/vi/'.$youtubID.'/hqdefault.jpg';
?>
<div class="design-video">
<div class="fotorama" data-width="100%">
  <a href="http://youtube.com/watch?v=<?=$youtubID?>"><?=unFormatData($videoDetails[1])?></a>
</div>
</div>
<?
}
?>