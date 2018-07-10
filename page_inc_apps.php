<?
if ($urlVariables['community'] != '' and $pageDetails['pageURL'] == 'interested')
{
$commObj = getDetails('exceed_pages', "pageURL='".$urlVariables['community']."'"); 
$customAdmin = getTitle('exceed_pages_extendedvalues', 'varValue', "varName='notificationEmail' and pageID=".$commObj[0]);
}


$currentApps = json_decode($pageDetails['pageapps'], true);
//print_r($currentApps[$indexApp]);
for ($iapp = 0; $iapp < sizeof($currentApps[$indexApp]); $iapp++)
{
	$temp = explode('_' , $currentApps[$indexApp][$iapp]);
	$appID = $temp[1];
	include "page_inc_apps_".$temp[0].".php";
}
?>