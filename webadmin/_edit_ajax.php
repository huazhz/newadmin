<?
include "_inc_session.php";
if ($_GET['op'] == 'LoadFloorPlans')
{
	$data = getAllData('exceed_pages', "navigation=10009 and sidenavpages='".$_GET['c']."' order by `order`");
	$res = '<option value=""> -- Select -- </option>';
	for ($i = 0; $i < sizeof($data); $i++)
	{
		$res .= '<option value="'.$data[$i][0].'">'.$data[$i][1].'</option>';
	}
	echo $res;
	exit();
}
if ($_GET['tbl'] != '' and $_GET['id'] > 0)
{
	$dataObj = getDetails($_GET['tbl'], 'id='.$_GET['id']);
	if (sizeof($dataObj) > 0)
	{
	foreach($dataObj as $k => $v)
	{
		if (!is_numeric($k)) 
		{
		$res[$k] = $v;
		}
	}
	}
	
}

if ($_GET['tbl'] == 'exceed_admins')
{
	$res['password'] = decodeRequest($res['password']);
}
else if ($_GET['tbl'] == 'exceed_pages_home_listings')
{
	$dataObj = getDetails('exceed_pages', 'id='.$_GET['id']);
	if (sizeof($dataObj) > 0)
	{
	foreach($dataObj as $k => $v)
	{
		if (!is_numeric($k)) 
		{
		$res[$k] = $v;
		}
	}
	}
	
	
	$temp = explode(',' , $res['contents']);
	$res['contents1'] = $temp[0];
	$res['contents2'] = $temp[1];
	$res['contents3'] = $temp[2];
	$res['contents4'] = $temp[3];
	$res['contents5'] = $temp[4];

	$temp = explode(',' , $res['seo_keywords']);
	$res['seo_keywords1'] = $temp[0];
	$res['seo_keywords2'] = $temp[1];
	$res['seo_keywords3'] = $temp[2];
	$res['seo_keywords4'] = $temp[3];
	$res['seo_keywords5'] = $temp[4];	
	
}
else if ($_GET['tbl'] == 'exceed_ecom_discounts')
{
	$res['startDate'] = date("m/d/Y", $res['startDate']);
	$res['endDate'] = date("m/d/Y", $res['endDate']);
}
else if ($_GET['tbl'] == 'settings_menu')
{
	$res['title0'] = $res['title'];
	$res['title1'] = getTxtByLang('settings_menu', 1, 'title', $res['id']);
}
else if ($_GET['tbl'] == 'agents')
{
	$res['fname0'] = $res['fname'];
	$res['fname1'] = getTxtByLang('agents', 1, 'fname', $res['id']);
}
else if ($_GET['tbl'] == 'pages')
{
	$res['title0'] = $res['title'];
	$res['title1'] = getTxtByLang('pages', 1, 'title', $res['id']);
	
	$res['contents0'] = $res['contents'];
	$res['contents1'] = getTxtByLang('pages', 1, 'contents', $res['id']);

}
else if ($_GET['tbl'] == 'properties_types')
{
	$res['title0'] = $res['title'];
	$res['title1'] = getTxtByLang('properties_types', 1, 'title', $res['id']);
}

if ($_GET['query'] != '')
{
	$queryTxt = decodeRequest($_GET['query']);
	if (strpos($queryTxt, 'exceed_photos') !== false) {
		$temp = explode('id=', $queryTxt);
		$photo = getDetails('exceed_photos', 'id='.$temp[1]);
		if ($photo[0] > 0)
		{
			@unlink('../'.$photo[3]);
			@unlink('../'.$photo[4]);
			@unlink('../'.$photo[5]);
		}
	}
	
	if (strpos($queryTxt, 'exceed_pages') !== false) {
		$temp = explode('id=', $queryTxt);
		$targetPhoto = "../uploads/page_img_".$temp[1].".jpg";
		$thumbPhoto = "../uploads/page_img_thumb".$temp[1].".jpg";
		
		@unlink('../'.$targetPhoto);
		@unlink('../'.$thumbPhoto);
		
	}
	
	mysql_query($queryTxt);
	$catID = getTitle('exceed_ecom_products','mainCat', 'id='.$_GET['id'],0);
	if($catID > 0){
		countProductsinside($catID);
	}
}


if ($_GET['checkCouponCode'] != '')
{
echo unFormatData(getTitle('exceed_ecom_discounts', 'id', "id!='".$_GET['id']."' and couponCode='".checkCouponCode."'"));
exit();
}
else if ($_GET['getSchdule'] != '')
{
echo unFormatData(getTitle('witn_shows', 'scheduleDatesAndTime', "id='".$_GET['getSchdule']."'"));
exit();
}
else if ($_GET['getfrmEntry'] != '')
{
	$entry = getDetails('exceed_pages_forms_entries', 'id='.$_GET['getfrmEntry']);
	?>
	<table class="table table-striped">
	<tr><th width="10%" nowrap>Page / From</th><td><?=unFormatData(getTitle('exceed_pages','title', 'id='.$entry[1]))?></td></tr>
	<tr><th nowrap>IP</th><td><a href="http://www.ip2location.com/<?=$entry[3]?>" target="_blank"><?=$entry[3]?></a></td></tr>
	<tr><th nowrap>Date</th><td><?=date("m/d/Y h:i A", $entry[4])?></td></tr>
	<?
	$frmData = json_decode(unFormatData($entry[2]), true);
	foreach($frmData as $k => $v)
	{
	if (is_array($v)) $v = implode('<br>', $v);
	if (!filter_var($v, FILTER_VALIDATE_URL) === false) 
    	$v = '<A HREF="'.$v.'" TARGET="_BLANK">View Link</A>';
	?>
	<tr><th nowrap><?=unFormatData($k)?></th><td><?=unFormatData($v)?></td></tr>
	<?
	}
	?>
	</table>
	<?
	exit();
	
}
else if ($_GET['getReviewMsg'] != '')
{
	$entry = getDetails('exceed_ecom_customers_reviews', 'id='.$_GET['getReviewMsg']);
	?>
	<table class="table table-striped">
	<tr><th width="10%" nowrap>Name</th><td><?=$entry[2]?></td></tr>
	<tr><th width="10%" nowrap>Email</th><td><?=$entry[3]?></td></tr>
	<tr><th nowrap>IP</th><td><a href="http://www.ip2location.com/<?=$entry[3]?>" target="_blank"><?=$entry[5]?></a></td></tr>
	<tr><th nowrap>Date</th><td><?=date("m/d/Y h:i A", $entry[4])?></td></tr>
	<tr><th nowrap>Product</th><td>
	<a target="_blank" href="_inventory_items_form.php?id=<?=$entry[6]?>">
                                            <?=getTitle('exceed_ecom_products', 'title', 'id='.$entry[6])?>
                                            </a>
	</td></tr>
		<tr><th width="10%" nowrap>Rate </th><td><?=$entry[8]?> / 5.0</td></tr>
		<tr><th width="10%" nowrap>Message </th><td><?=unFormatData($entry[7])?></td></tr>
	</table>
	<?
	exit();
}
else if ($_GET['getViewMsg'] != '')
{
echo unFormatData(getTitle('witn_comments', 'comment', "id='".$_GET['getViewMsg']."'"));
mysql_query("UPDATE witn_comments SET `read`=1 WHERE id=".$_GET['getViewMsg']);
exit();
}
if ($_GET['unlinkfile'] != '')
{
	$tempFiles = explode(',' , $_GET['unlinkfile']);
	for ($i = 0; $i < sizeof($tempFiles); $i++)
	{
	@unlink($tempFiles[$i]);
	}
}


echo json_encode($res);
?>