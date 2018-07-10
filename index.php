<?
include "inc_session.php";
if ($_GET['page'] == 'index.html' or $_GET['page'] == 'home' or $_GET['page'] == 'index.php'  or $_GET['page'] == 'index')
{
	include "page_home.php";
}
else
{
	//short urls
	if ($_GET['page'] != '')
	$target = getTitle('exceed_pages', 'url', "navigation=777 and title='".$_GET['page']."'");
	if ($target != '')
	{
	header("Location: ".$target);
	exit();
	}
	
	$arrayToBeReplace = array('.html');
	$currentPage = str_replace($arrayToBeReplace, '', $_GET['page']);
	if ($currentPage == '') $currentPage = 'home';
	$icludePage = "page_".$currentPage.".php";
	
	if (!file_exists($icludePage)) 
	{
		$_GET['var'] = $currentPage; 
		$icludePage = "page_cmspage.php";	
	}
	
	include $icludePage;
}
?>
