<?


include "_inc_session.php";


$data = decodeRequest($_GET['data']);


$vars = explode('|', $data);





$dataObj = getDetails($vars[1], 'id='.$vars[2]);


if (sizeof($dataObj) > 0)


{


	foreach($dataObj as $k => $v)


	{


		if (!is_numeric($k)) 


		{


			$newRecord[$k] = $v;


		}


	}


		


	if ($vars[1] == 'exceed_photos')


	{


		$newRecord['photourl'] = str_replace('.jpg', '_copy_'.time().'.jpg', $newRecord['photourl']);


		$newRecord['thumburl'] = str_replace('.jpg', '_copy_'.time().'.jpg', $newRecord['thumburl']);


		$newRecord['orginalurl'] = str_replace('.jpg', '_copy_'.time().'.jpg', $newRecord['orginalurl']);


		if($dataObj['photourl'] != '') copy('../'.$dataObj['photourl'],'../'.$newRecord['photourl']);


		if($dataObj['thumburl'] != '') copy('../'.$dataObj['thumburl'],'../'.$newRecord['thumburl']);


		if($dataObj['orginalurl'] != '') copy('../'.$dataObj['orginalurl'],'../'.$newRecord['orginalurl']);


			


	}


	else if ($vars[1] == 'exceed_pages')


	{


		$newRecord['pageURL'] = $newRecord['pageURL'].'-copy-'.time();


		$newRecord['title'] = '[copy] '.$newRecord['title'];


	}


		


	unset($newRecord['id']);


	$newID = addRecord($vars[1], $newRecord);


	


	if ($vars[1] == 'exceed_photos')


	{


		$customLogo = "../uploads/banner_logo_".$vars[2].".jpg";


		if(file_exists($customLogo))


		{


			$newLogo = "../uploads/banner_logo_".$newID.".jpg";


			copy($customLogo, $newLogo);


		}


	


	}


	if ($vars[1] == 'exceed_pages')


	{


		$targetPhoto = "../uploads/page_img_".$vars[2].".jpg";


		$thumbPhoto = "../uploads/page_img_thumb".$vars[2].".jpg";


		if(file_exists($targetPhoto))


		{


			$newTargetPhoto = "../uploads/page_img_".$newID.".jpg";


			copy($targetPhoto, $newTargetPhoto);


		}


		if(file_exists($thumbPhoto))


		{


			$newThumbPhoto = "../uploads/page_img_thumb".$newID.".jpg";


			copy($thumbPhoto, $newThumbPhoto);


		}


	}


		


}





echo '<script>document.location.href="'.$vars[0].'"</script>';





?>
