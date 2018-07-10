<?
if ($_SETTINGS['home-paragraph-status-welcome'] == 1)
{
?>

<div class="section" id="section-one">
    <div class="row">
      <div class="small-12 columns">
        <h1><?=unFormatData($_SETTINGS['home-paragraph-title-welcome'])?></h1>
        <p class="small"> <?=unFormatData($_SETTINGS['home-paragraph-contents-welcome'])?></p>
      </div>
    </div>
  </div>
  <!-- End One -->
<?
}
?>