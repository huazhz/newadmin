<?
$host="localhost";
$userName="imedecs_imedecs2";
$passWord='.4)*fAH4kLFM';
$dbName="imedecs_imedecs2";

//$userName="wilmadde_dbmanag";
//$passWord='2f4X!Z@ao%4Z';
//$dbName="wilmadde_exceed";
$db=@mysql_connect($host,$userName,$passWord);
mysql_select_db($dbName);

if (function_exists("date_default_timezone_set"))
date_default_timezone_set("America/New_York"); 

error_reporting(1);

$sitePath = 'http://imedecs.tk/imedecswebsite/';
$domainName = 'http://imedecs.tk/imedecswebsite/';

?>