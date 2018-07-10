<?
if ($pageContentTitle == '') $pageContentTitle = 'Page Contents';
?>
<div class="col-lg-12">
				<div class="box box-success">
                <div class="box-header with-border">
                  <i class="fa fa-file-text"></i>
                  <h3 class="box-title"><?=$pageContentTitle?></h3>
                </div>
                <div class="box-body">
                <textarea id="contents" name="contents" rows="10" cols="80"><?=unFormatData($mypage[2])?></textarea>
                </div>
              </div>
</div>              