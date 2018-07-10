<?
session_start();
include_once ("shared_code/connection.php");
include_once ("shared_code/get.php");
include_once ("shared_code/dml.php");
include_once ("shared_code/formatFunctions.php");
include_once ("shared_code/encoding.php");
include_once ("shared_code/imageprocess.php");
include_once ("shared_code/fontAwsomeIcons.php");

$data = getAllData('exceed_settings_vals', '1');
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = stripslashes($data[$i][1]);
}
$_SETTINGS['header-link'] = json_decode(stripslashes($_SETTINGS['header-link']), true);
$_SETTINGS['social-link'] = json_decode(stripslashes($_SETTINGS['social-link']), true);
?>