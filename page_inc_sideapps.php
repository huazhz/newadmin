<?
$currentApps = json_decode($pageDetails['sidenavpages'], true);
//print_r($currentApps[$indexApp]);
for ($iapp = 0; $iapp < sizeof($currentApps[$indexApp]); $iapp++)
{
	$temp = explode('_' , $currentApps[$indexApp][$iapp]);
	$appID = $temp[1];
	include "page_inc_apps_".$temp[0].".php";
	if ($temp[0] == 'sidevid') $includeVideoPlayer = 1;
}
if ($includeVideoPlayer == 1)
{
include "page_inc_apps_video_player.php";
}
?>