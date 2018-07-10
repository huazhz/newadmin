				<div class="box box-danger collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Custom CSS - For Designer / Developer Only </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                	<?
                	$_SETTINGS['css-settings-'.$settingsSuffix] = str_replace('"', "'", $_SETTINGS['css-settings-'.$settingsSuffix]);
                	?>
                		<textarea  class="code-container" name="css-settings-<?=$settingsSuffix?>"><?=unFormatData($_SETTINGS['css-settings-'.$settingsSuffix])?></textarea>   
                </div>
              </div>
              <br>