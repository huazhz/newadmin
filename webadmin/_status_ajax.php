<?
include "_inc_session.php";
swapStatus($_GET['tbl'], "id=".$_GET['id']);
if($_GET['tbl']=='exceed_ecom_products'){
	$catID = getTitle('exceed_ecom_products','mainCat', 'id='.$_GET['id'],0);
	if($catID > 0){
		countProductsinside($catID);
	}
}
echo getTitle($_GET['tbl'],'status', "id=".$_GET['id']);
?>