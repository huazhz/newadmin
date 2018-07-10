<?
    	$activePage[$pageDetails[0]] = ' class="active"';
    	for ($i = 0; $i < sizeof($pages); $i++)
    	{
    	?>
		<li <?=$activePage[$pages[$i][0]]?>><a href="<?=$sitePath?><?=$pages[$i][3]?>"><?=unFormatData($pages[$i][1])?></a>	</li>
		<?
		}
		?>