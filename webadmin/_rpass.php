<?
session_start();
include_once ("../shared_code/connection.php");
include_once ("../shared_code/get.php");
include_once ("../shared_code/encoding.php");

$res = getDetails('exceed_admins' , "status=1 and email='".$_GET['un']."'", 0);
if ($res[0] > 0)
{
		$message='<p dir="ltr"><font face="Tahoma" size="2"><b>Hello '.$res[1].'!</b></font></p>
				<p dir="ltr"><font face="Tahoma" size="2">You requested your password on 
				(<span lang="en-us"><a target="_blank" href="'.$sitePath.'webadmin/">'.$sitePath.'webadmin/</a></span>)<span lang="en-us">
				</span></font></p>
				<p dir="ltr"><font face="Tahoma" size="2">Password: '.decodeRequest($res[3]).'</font><br><br>Best Regards,<br>eXceedCMS</p>';				
	
	
		//echo $message;
	
		require '../shared_code/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSendmail();
		$from='no-reply@'.$domainName;		
		$mail->setFrom($from);
		$mail->addAddress($res[2]);
		$mail->Subject = 'eXceedCMS - Password Reminder';
		$mail->msgHTML($message);
		$mail->send();	
		
		echo $res[2];

}


?>