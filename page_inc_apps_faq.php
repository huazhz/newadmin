<?
$faqItem = getDetails('exceed_apps_faq', 'status=1 and id='.$appID);
if ($faqItem[0] > 0)
{
?>
<div class="faq-item">
	<div class="faq-q" onclick="$('.faq-a').slideUp();$('#faq-<?=$faqItem[0]?>').slideDown();"><span>Q.</span> <?=unFormatData($faqItem['question'])?></div>
	<div class="faq-a" id="faq-<?=$faqItem[0]?>"><?=unFormatData($faqItem['answer'])?></div>
</div>
<?
}
?>