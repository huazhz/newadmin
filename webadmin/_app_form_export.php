<?
include "_inc_session.php";
$formPage = getDetails('exceed_pages','id='.$_GET['id']);

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=".formatSEOTxt($formPage[1]).".xls"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

$entries = getAllData('exceed_pages_forms_entries', 'pageID='.$formPage[0]);
$frmData = json_decode(unFormatData($entries[0][2]), true);
?>
<h1><?=unFormatData($formPage[1])?></h1>
<?
if (sizeof($entries) == 0)
{
echo '<p>No Entries!</p>';
}
else
{
?>
<table border="1">
	<thead>
		<tr>
			<th>IP</th>
			<th>Date</th>
			<?
			foreach($frmData as $k => $v)
			{
			?>
			<th><?=unFormatData($k)?></th>
			<?
			}
			?>
		</tr>
	</thead>
	<tbody>
	<?
	for ($i = 0; $i < sizeof($entries); $i++)
	{
	?>
	<tr>
	<td><?=$entries[$i][3]?></td>
	<td><?=date("m/d/Y h:i A", $entries[$i][4])?></td>
	<?
		$frmData = json_decode(unFormatData($entries[$i][2]), true);
		foreach($frmData as $k => $v)
		{
		?>
		<td><?=unFormatData($v)?></td>
		<?
		}
	echo '</tr>';
	}
	?>
	</tbody>
</table>
<?
}
?>