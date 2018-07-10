<?
include "_inc_session.php";
if ($_GET['tbl'] == 'exceed_ecom_products_sort')
{
	deleteRecord('exceed_ecom_products_sort', 'catID='.$_GET['cat']);
	$idsArr =  explode(',' , str_replace(' ', '', $_GET['order']));
	for ($i= 0; $i < sizeof($idsArr); $i++)
	{
		mysql_query("INSERT INTO exceed_ecom_products_sort VALUES ('".$_GET['cat']."', '".$idsArr[$i]."' , '".$i."')");
	}
	
	
}
else
{

	$idsArr =  explode(',' , str_replace(' ', '', $_GET['order']));
	if ($p != '1000000001')
	{
		$p = max(1, $_GET['p']);
		$orderAdd = (($p-1)*20);
	}
	
	for ($i= 0; $i < sizeof($idsArr); $i++)
	{
	$ordArr[$i] = $i+1+$orderAdd ;
	}
	saveOrders($_GET['tbl'], $ordArr, $idsArr);
}
?>