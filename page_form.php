<?
$_SETTINGS['seo-title'] = 'From Preview';

include "inc_top.php";
echo '<br><BR>';
?>
<div class="inner-sub">
	<div class="row">
	<div class="medium-12 columns">
    	<h1>Form Preview</h1>
    	<?
    	$frmObj = getDetails('exceed_pages', "id='".$_GET['var']."'"); 
    	include "inc_form.php";
    	?>
    </div>
    </div>
</div>
<? include "inc_footer.php"; ?>