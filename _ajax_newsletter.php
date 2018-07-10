<?
include "inc_session.php";


if ($_GET['fn'] != '' and $_GET['ln'] != '' and $_GET['ea'] != '')
{
	$frmObj = getDetails('exceed_pages', 'id=25');
	$frmSettingsArr = json_decode($frmObj['sidenavpages'], true);

	$newFrmEntry['pageID'] = $frmObj[0];
	$newFrmEntry['ip'] = $_SERVER["REMOTE_ADDR"];
	$newFrmEntry['postDate'] = time();
	$newFrmEntry['email'] = formatData($_GET['ea']);

	$formArr['First Name'] = $_GET['fn'];
	$formArr['Last Name'] = $_GET['ln'];
	$formArr['Email'] = $_GET['ea'];
	$newFrmEntry['formData'] = formatData(json_encode($formArr));
	$enteryID = addRecord('exceed_pages_forms_entries', $newFrmEntry);
	
	echo $frmSettingsArr['thankMsg'];
	
		$confirmMessage = '<h2>'.$frmObj[1].' - New Form Entry#'.$enteryID.'</h2>';
		$confirmMessage .= '<table border="0"><tr><th nowrap style="text-align:left">Date</th><td>'.date("m/d/Y h:i A", $newFrmEntry['postDate']).'</td></tr>';
		foreach($formArr as $k => $v)
		{
		if (is_array($v)) $v = implode('<br>', $v);
		$confirmMessage .= '<tr><th nowrap style="text-align:left">'.unFormatData($k).'</th><td>'.unFormatData($v).'</td></tr>';
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
		
		$mail->Subject = $frmObj[1].' - New Form Entry#'.$enteryID;
			
		$mail->msgHTML($confirmMessage);
		$mail->send();
		
		
		if ($newFrmEntry['email'] != '' and $frmSettingsArr['notifycustomer'] == 1)
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

}

?>