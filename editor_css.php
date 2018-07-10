<?
include "inc_session.php";
header("Content-type: text/css");
?>
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700);
@import url(https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700);

body{  color: #000;background:#fff;margin:0px;    font-size: 18px; font-family: 'Source Sans Pro', sans-serif; font-weight: 300;line-height: 32px;}
p, td, div, span { line-height:140%;}
body, p, td, span {text-align:left; font-weight: 300;
    font-size: 18px;
    font-family: 'Source Sans Pro', sans-serif;
    line-height: 23px;}

.clear{ clear:both;}   

a:link, a:visited {text-align:left; color: #7d303a;text-decoration:none;}
a:hover {color: #7d303a;text-decoration: none;}

<?
if ($_GET['v'] != '')
	echo getTitle('exceed_settings_vals', '`val`', "`var`='".$_GET['v']."'");
else
{
	$cssAll = getAllData('exceed_settings_vals', "`var` like 'css-settings-%'");
	for ($i = 0; $i < sizeof($cssAll); $i++)
	{
		echo $cssAll[$i][1];
	}	
}
?>