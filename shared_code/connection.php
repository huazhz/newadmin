	<?
$host="localhost";
$userName="root";
$passWord='';
$dbName="newadmin";

//$userName="wilmadde_dbmanag";
//$passWord='2f4X!Z@ao%4Z';
//$dbName="wilmadde_exceed";
@$db=mysql_pconnect($host,$userName,$passWord);
mysql_select_db($dbName);

if (function_exists("date_default_timezone_set"))
date_default_timezone_set("America/New_York"); 

//error_reporting(1);

$sitePath = 'http://localhost:8080/newadmin/';
$domainName = 'http://localhost:8080/newadmin';

?>