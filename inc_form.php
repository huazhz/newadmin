<?
$json = json_decode(unFormatData($frmObj["contents"]), true);
if (sizeof($json) > 0)
{
	$frmSettingsArr = json_decode($frmObj['sidenavpages'], true);
	
	$submitForm = true;
	
	if ($frmSettingsArr['captchs'] == 1)
	{
		$submitForm = false;
		include "inc_from_captcha.php";
		$secret = "6LfADRcUAAAAACgy_B02VrI3bAqpi73tPH-zbcuk";
		$response = null;
		$reCaptcha = new ReCaptcha($secret);
		
		// if submitted check response
		if ($_POST["g-recaptcha-response"])
		$response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
		$submitForm = $response->success;
		//print_r($response);
	}
	
	
	if ($submitForm and sizeof($_POST) > 0 ) 
	{
		$newFrmEntry['pageID'] = $frmObj[0];
		$newFrmEntry['ip'] = $_SERVER["REMOTE_ADDR"];
		$newFrmEntry['postDate'] = time();
		//print_r($_POST);
		if (sizeof($_POST) > 0)
		{
			foreach($json as $k => $v)
			{
				if ($v['name'] != '')
				{
					$formArr[$v['label']] = $_POST[$v['name']];
					
					if(filter_var($_POST[$v['name']], FILTER_VALIDATE_EMAIL)) 
					$newFrmEntry['email'] = $_POST[$v['name']];
					
					
					$allowed_mime_types = array('.au' => 'audio/basic',
									'.au' => 'audio/x-au',
									'.avi' => 'application/x-troff-msvideo',
									'.avi' => 'video/avi',
									'.avi' => 'video/msvideo',
									'.avi' => 'video/x-msvideo',
									'.avs' => 'video/avs-video',
									'.bm' => 'image/bmp',
									'.bmp' => 'image/bmp',
									'.bmp' => 'image/x-windows-bmp',
									'.doc' => 'application/msword',
									'.dot' => 'application/msword',
									'.dwf' => 'drawing/x-dwf (old)',
									'.dwf' => 'model/vnd.dwf',
									'.dwg' => 'application/acad',
									'.dwg' => 'image/vnd.dwg',
									'.dwg' => 'image/x-dwg',
									'.dxf' => 'image/vnd.dwg',
									'.dxf' => 'image/x-dwg',
									'.fif' => 'image/fif',
									'.fli' => 'video/fli',
									'.fli' => 'video/x-fli',
									'.flo' => 'image/florian',
									'.fmf' => 'video/x-atomic3d-feature',
									'.fpx' => 'image/vnd.fpx',
									'.fpx' => 'image/vnd.net-fpx',
									'.funk' => 'audio/make',
									'.g3' => 'image/g3fax',
									'.gif' => 'image/gif',
									'.gl' => 'video/gl',
									'.gl' => 'video/x-gl',
									'.gsd' => 'audio/x-gsm',
									'.gsm' => 'audio/x-gsm',
									'.ico' => 'image/x-icon',
									'.idc' => 'text/plain',
									'.ief' => 'image/ief',
									'.iefs' => 'image/ief',
									'.isu' => 'video/x-isvideo',
									'.it' => 'audio/it',
									'.jam' => 'audio/x-jam',
									'.jfif' => 'image/jpeg',
									'.jfif' => 'image/pjpeg',
									'.jfif-tbnl' => 'image/jpeg',
									'.jpe' => 'image/jpeg',
									'.jpe' => 'image/pjpeg',
									'.jpeg' => 'image/jpeg',
									'.jpeg' => 'image/pjpeg',
									'.jpg' => 'image/jpeg',
									'.jpg' => 'image/pjpeg',
									'.jps' => 'image/x-jps',
									'.jut' => 'image/jutvision',
									'.kar' => 'audio/midi',
									'.kar' => 'music/x-karaoke',
									'.la' => 'audio/nspaudio',
									'.la' => 'audio/x-nspaudio',
									'.lam' => 'audio/x-liveaudio',
									'.lma' => 'audio/nspaudio',
									'.lma' => 'audio/x-nspaudio',
									'.m1v' => 'video/mpeg',
									'.m2a' => 'audio/mpeg',
									'.m2v' => 'video/mpeg',
									'.m3u' => 'audio/x-mpequrl',
									'.mid' => 'audio/midi',
									'.mid' => 'audio/x-mid',
									'.mid' => 'audio/x-midi',
									'.mid' => 'music/crescendo',
									'.mid' => 'x-music/x-midi',
									'.midi' => 'audio/midi',
									'.midi' => 'audio/x-mid',
									'.midi' => 'audio/x-midi',
									'.midi' => 'music/crescendo',
									'.midi' => 'x-music/x-midi',
									'.mjf' => 'audio/x-vnd.audioexplosion.mjuicemediafile',
									'.mjpg' => 'video/x-motion-jpeg',
									'.mod' => 'audio/mod',
									'.mod' => 'audio/x-mod',
									'.moov' => 'video/quicktime',
									'.mov' => 'video/quicktime',
									'.movie' => 'video/x-sgi-movie',
									'.mp2' => 'audio/mpeg',
									'.mp2' => 'audio/x-mpeg',
									'.mp2' => 'video/mpeg',
									'.mp2' => 'video/x-mpeg',
									'.mp2' => 'video/x-mpeq2a',
									'.mp3' => 'audio/mpeg3',
									'.mp3' => 'audio/x-mpeg-3',
									'.mp3' => 'video/mpeg',
									'.mp3' => 'video/x-mpeg',
									'.mpa' => 'audio/mpeg',
									'.mpa' => 'video/mpeg',
									'.mpe' => 'video/mpeg',
									'.mpeg' => 'video/mpeg',
									'.mpg' => 'audio/mpeg',
									'.mpg' => 'video/mpeg',
									'.mpga' => 'audio/mpeg',
									'.mv' => 'video/x-sgi-movie',
									'.my' => 'audio/make',
									'.nap' => 'image/naplps',
									'.naplps' => 'image/naplps',
									'.nif' => 'image/x-niff',
									'.niff' => 'image/x-niff',
									'.pbm' => 'image/x-portable-bitmap',
									'.pct' => 'image/x-pict',
									'.pcx' => 'image/x-pcx',
									'.pdf' => 'application/pdf',
									'.pfunk' => 'audio/make',
									'.pgm' => 'image/x-portable-greymap',
									'.pic' => 'image/pict',
									'.pict' => 'image/pict',
									'.pm' => 'image/x-xpixmap',
									'.png' => 'image/png',
									'.pnm' => 'image/x-portable-anymap',
									'.pot' => 'application/mspowerpoint',
									'.pot' => 'application/vnd.ms-powerpoint',
									'.ppa' => 'application/vnd.ms-powerpoint',
									'.ppm' => 'image/x-portable-pixmap',
									'.pps' => 'application/mspowerpoint',
									'.pps' => 'application/vnd.ms-powerpoint',
									'.ppt' => 'application/mspowerpoint',
									'.ppt' => 'application/powerpoint',
									'.ppt' => 'application/vnd.ms-powerpoint',
									'.ppt' => 'application/x-mspowerpoint',
									'.ppz' => 'application/mspowerpoint',
									'.qcp' => 'audio/vnd.qcelp',
									'.qif' => 'image/x-quicktime',
									'.qt' => 'video/quicktime',
									'.qtc' => 'video/x-qtc',
									'.qti' => 'image/x-quicktime',
									'.qtif' => 'image/x-quicktime',
									'.ra' => 'audio/x-pn-realaudio',
									'.ra' => 'audio/x-pn-realaudio-plugin',
									'.ra' => 'audio/x-realaudio',
									'.ram' => 'audio/x-pn-realaudio',
									'.ras' => 'image/cmu-raster',
									'.ras' => 'image/x-cmu-raster',
									'.rast' => 'image/cmu-raster',
									'.rf' => 'image/vnd.rn-realflash',
									'.rgb' => 'image/x-rgb',
									'.rm' => 'application/vnd.rn-realmedia',
									'.rm' => 'audio/x-pn-realaudio',
									'.rmi' => 'audio/mid',
									'.rmm' => 'audio/x-pn-realaudio',
									'.rmp' => 'audio/x-pn-realaudio',
									'.rmp' => 'audio/x-pn-realaudio-plugin',
									'.rp' => 'image/vnd.rn-realpix',
									'.rpm' => 'audio/x-pn-realaudio-plugin',
									'.rtf' => 'application/rtf',
									'.rtf' => 'application/x-rtf',
									'.rtf' => 'text/richtext',
									'.rv' => 'video/vnd.rn-realvideo',
									'.s' => 'text/x-asm',
									'.s3m' => 'audio/s3m',
									'.scm' => 'video/x-scm',
									'.sid' => 'audio/x-psid',
									'.snd' => 'audio/basic',
									'.snd' => 'audio/x-adpcm',
									'.svf' => 'image/vnd.dwg',
									'.svf' => 'image/x-dwg',
									'.tif' => 'image/tiff',
									'.tif' => 'image/x-tiff',
									'.tiff' => 'image/tiff',
									'.tiff' => 'image/x-tiff',
									'.tsi' => 'audio/tsp-audio',
									'.tsp' => 'audio/tsplayer',
									'.turbot' => 'image/florian',
									'.vdo' => 'video/vdo',
									'.vew' => 'application/groupwise',
									'.viv' => 'video/vivo',
									'.viv' => 'video/vnd.vivo',
									'.vivo' => 'video/vivo',
									'.vivo' => 'video/vnd.vivo',
									'.voc' => 'audio/voc',
									'.voc' => 'audio/x-voc',
									'.vos' => 'video/vosaic',
									'.vox' => 'audio/voxware',
									'.vqe' => 'audio/x-twinvq-plugin',
									'.vqf' => 'audio/x-twinvq',
									'.vql' => 'audio/x-twinvq-plugin',
									'.w6w' => 'application/msword',
									'.wav' => 'audio/wav',
									'.wav' => 'audio/x-wav',
									'.wb1' => 'application/x-qpro',
									'.wbmp' => 'image/vnd.wap.wbmp',
									'.wiz' => 'application/msword',
									'.word' => 'application/msword',
									'.xbm' => 'image/x-xbitmap',
									'.xbm' => 'image/x-xbm',
									'.xbm' => 'image/xbm',
									'.xdr' => 'video/x-amt-demorun',
									'.xgz' => 'xgl/drawing',
									'.xif' => 'image/vnd.xiff',
									'.xl' => 'application/excel',
									'.xla' => 'application/excel',
									'.xla' => 'application/x-excel',
									'.xla' => 'application/x-msexcel',
									'.xlb' => 'application/excel',
									'.xlb' => 'application/vnd.ms-excel',
									'.xlb' => 'application/x-excel',
									'.xlc' => 'application/excel',
									'.xlc' => 'application/vnd.ms-excel',
									'.xlc' => 'application/x-excel',
									'.xld' => 'application/excel',
									'.xld' => 'application/x-excel',
									'.xlk' => 'application/excel',
									'.xlk' => 'application/x-excel',
									'.xll' => 'application/excel',
									'.xll' => 'application/vnd.ms-excel',
									'.xll' => 'application/x-excel',
									'.xlm' => 'application/excel',
									'.xlm' => 'application/vnd.ms-excel',
									'.xlm' => 'application/x-excel',
									'.xls' => 'application/excel',
									'.xls' => 'application/vnd.ms-excel',
									'.xls' => 'application/x-excel',
									'.xls' => 'application/x-msexcel',
									'.xlt' => 'application/excel',
									'.xlt' => 'application/x-excel',
									'.xlv' => 'application/excel',
									'.xlv' => 'application/x-excel',
									'.xlw' => 'application/excel',
									'.xlw' => 'application/vnd.ms-excel',
									'.xlw' => 'application/x-excel',
									'.xlw' => 'application/x-msexcel',
									'.xm' => 'audio/xm',
									'.xpm' => 'image/x-xpixmap',
									'.xpm' => 'image/xpm',
									'.x-png' => 'image/png',
									'.xsr' => 'video/x-amt-showrun',
									'.xwd' => 'image/x-xwd',
									'.xwd' => 'image/x-xwindowdump');
					
					
					if ($v['type'] == 'file')
					{
						if ($_FILES[$v['name']]['tmp_name'] != '')
						{
							if (is_array($_FILES[$v['name']]['tmp_name']))
							{
								for ($jj = 0; $jj < sizeof($_FILES[$v['name']]['tmp_name']); $jj++)
								{
									
									if (in_array($_FILES[$v['name']]["type"] ,$allowed_mime_types ))
									{
									$filePath = "formUploads/".md5(time())."_".$_FILES[$v['name']]['name'][$jj];
									move_uploaded_file($_FILES[$v['name']]['tmp_name'][$jj],"$filePath");
									$formArr[$v['label']] = $sitePath.$filePath;
									}
								}
							}
							else
							{
								if (in_array($_FILES[$v['name']]["type"] ,$allowed_mime_types ))
								{
									$filePath = "formUploads/".md5(time())."_".$_FILES[$v['name']]['name'];
									move_uploaded_file($_FILES[$v['name']]['tmp_name'],"$filePath");
									$formArr[$v['label']] = $sitePath.$filePath;
								}
							}
						}
					}
				}
			}
		}
		
		$newFrmEntry['formData'] = formatData(json_encode($formArr));
		$enteryID = addRecord('exceed_pages_forms_entries', $newFrmEntry);
		
		echo $frmSettingsArr['thankMsg'];
		
		
		$confirmMessage = '<h2>'.$frmObj[1].' - New Form Entry#'.$enteryID.'</h2>';
		$confirmMessage .= '<table border="0" width="100%"><tr><th width="30%" style="text-align:left">Date</th><td>'.date("m/d/Y h:i A", $newFrmEntry['postDate']).'</td></tr>';
		foreach($formArr as $k => $v)
		{
		if (is_array($v)) $v = implode('<br>', $v);
		$confirmMessage .= '<tr><th style="text-align:left">'.unFormatData($k).'</th><td>'.unFormatData($v).'</td></tr>';
		}
		$confirmMessage .= '</table>';
		
		require 'shared_code/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSendmail();
		$mail->CharSet  = 'UTF-8';
		$mail->setFrom('no-reply@'.$domainName);
		$admins = explode(',' , $frmSettingsArr['notification']);
		for ($i = 0; $i < sizeof($admins); $i++)
		{
			$mail->addAddress(trim($admins[$i]));
		}
		
		if ($customAdmin != '') //send this form to custom admin
		$mail->addAddress(trim($customAdmin));
		
			
		$mail->Subject = $frmObj[1].' - New Form Entry#'.$enteryID;
			
		$mail->msgHTML($confirmMessage);
		$mail->send();
		
		if ($newFrmEntry['email'] != '')
		{
			$mail->clearAllRecipients();
			$mail->addAddress(trim($newFrmEntry['email']));
			$confirmMessage = $frmSettingsArr['thankMsg'].$confirmMessage;
			$mail->Subject = 'Wilmad-LabGlass - Thank You!';
			
			if ($customAttachment != '')
			$mail->addAttachment($customAttachment, $customAttachmentName);				
			$mail->msgHTML($confirmMessage);
			$mail->send();
		}
		
		
		if ($customAction != '')
		{
			$redirectionURL = $customAction.'?';
			foreach($_POST as $k => $v)
			{
				$redirectionURL .= $k.'='.$v.'&';
			}
			?>
			<script>document.location.href="<?=$redirectionURL?>"</script>
			<?
		}
		
	}	
	
	
	if ($frmObj["pageapps"] != '') //javascript;
	{
	?>
	<script>
	function checForm<?=$frmObj[0]?>(frm)
	{
	<?=stripslashes($frmObj["pageapps"])?>
	}
	</script>
	
	<form method="post" enctype="multipart/form-data" onsubmit="return checForm<?=$frmObj[0]?>(this);">

	<?
	}
	else
	{
	?>
	<form method="post" enctype="multipart/form-data">
	<?
	}
	?>
	
	<div class="form-renders">
	<div id="form-render-<?=$frmObj[0]?>">
	</div>
	<?
	if ($frmSettingsArr['captchs'] == 1)
	{
	?>
	<div class="g-recaptcha" data-sitekey="6LfADRcUAAAAAMu3M_JnV-dx7nrtitRR6OehXL8r"></div>
	<?
	}
	?>
	<button type="submit" class="button bluebg">Submit </button>
	</div>
	</form>
	<?

				$replacetohtml1 = array('&quot;', '&gt;', '&lt;', '\n', '&amp;', "'");
				$replacetohtml2 = array('', '>', '<', '', '&', '&#8242;');

	

	?>
	
	<link rel="stylesheet" href="<?=$sitePath?>formBuilder/css/forms.css" />
	<script src="<?=$sitePath?>formBuilder/js/form-render.min.js"></script>
	<script>
	$('#form-render-<?=$frmObj[0]?>').formRender({dataType: 'json',formData: '<?=unFormatData(str_replace($replacetohtml1,$replacetohtml2, $frmObj["contents"]))?>'});
	</script>
	<style>
	<?=unFormatData($frmObj['sidehtmlcontents'])?>
	</style>
	<script src="<?=$sitePath?>js/jquery.mask.js"></script>
	<script>
	$(window).load(function(){
		$('input[type="tel"]').attr('placeholder', '###-###-####');
	     
	    
	    $("input.checkbox-group").click(function(){
	    	checkGroupRequired();
	    });
	});
	
	$(document).ready(function(){
		$('input[type="tel"]').focus(function(){
			$(this).mask("999-999-9999");
		});
	});
	
	function checkGroupRequired()
	{
		$cbx_group = $("input.checkbox-group");
		$cbx_group.prop('required', true);
		if($cbx_group.is(":checked")){
	  		$cbx_group.prop('required', false);
		}
		
		return true;
	}
	</script>
<?
}
?>