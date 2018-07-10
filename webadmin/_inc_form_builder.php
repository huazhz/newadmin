<div class="content">
<div class="build-wrap"></div>
<div class="render-wrap"></div>
</div>
<?
	$replacetohtml1 = array('&quot;', '&gt;', '&lt;', '\n', '&amp;');
	$replacetohtml2 = array('', '>', '<', '', '&');


?>


<input type="hidden" id="formSavedData" name="formSavedData" value='<?=unFormatData(str_replace($replacetohtml1,$replacetohtml2, $mypage["formJson"]))?>'>
<?
$customFooterScripts = '
<script src="../formBuilder/js/form-builder.min.js"></script>
<script src="../formBuilder/js/wale.js"></script>
';
?>