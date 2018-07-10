				<div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Background Settings</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                
                    <div class="row">
	                  
						<div class="col-xs-12 col-md-6 col-lg-2">
							<?
							$backgroundType[$_SETTINGS['background-type-'.$settingsSuffix]] = 'checked';
							?>
                      		<label>Background Type&nbsp;&nbsp;&nbsp;</label> <br>
                            <input type="radio" name="background-type-<?=$settingsSuffix?>" <?=$backgroundType[1];?> value="1">&nbsp;&nbsp;Image &nbsp;&nbsp;
                            <input type="radio" name="background-type-<?=$settingsSuffix?>" <?=$backgroundType[0];?> value="0">&nbsp;&nbsp;Color<br><br>
                        </div> 
                        <div class="col-xs-12 col-md-6 col-lg-2">
                                <label>Background Color</label>
                               	<div class="input-group my-colorpicker">
                                  <input type="text" name="background-color-<?=$settingsSuffix?>" class="form-control" value="<?=$_SETTINGS['background-color-'.$settingsSuffix]?>"/>
                                  <div class="input-group-addon">
                                    <i id="background-color-<?=$settingsSuffix?>_colorpicker"></i>
                                  </div>
                                </div>
                          </div>
                          <div class="col-xs-12 col-md-6 col-lg-2">
                      	 <label>Parallax Background </label>
                          	
                          	<?
							$backgroundParrallax[$_SETTINGS['background-parallax-'.$settingsSuffix]] = 'checked';
							?>
                      		<br>
                            <input type="radio" name="background-parallax-<?=$settingsSuffix?>" <?=$backgroundParrallax[1];?> value="1">&nbsp;&nbsp;Yes &nbsp;&nbsp;
                            <input type="radio" name="background-parallax-<?=$settingsSuffix?>" <?=$backgroundParrallax[0];?> value="0">&nbsp;&nbsp;No

                          </div>
                          <div class="col-xs-12 col-md-6 col-lg-3">
                      	 <label>Background Image (1600 x 800)</label>
                          	<input type="file" class="form-control" name="bgphoto">
                          	
        
                          </div>
                        
                          <div class="col-xs-12 col-md-6 col-lg-3">
                            <? 
                            $Photo = "../uploads/background-color-".$settingsSuffix.".jpg";
						    $originalPhoto = "../uploads/background-color-".$settingsSuffix."_orginal.jpg";
						    if(file_exists($Photo))
						    {
						    ?>
                          	<div id="img_news_container2">
                                	<a href="javascript:;" class="btn btn-sm btn-warning" onclick="viewImage('<?=$Photo?>');"><i class="fa fa-search-plus"></i> View </a>
						    		<a href="javascript:;" onclick="return cropImg('cropImg','<?=$originalPhoto?>','<?=$Photo?>', '0|0|100|100','1600x800');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop</a>
                                	<a href="javascript:;" onclick="deleteFile2('img_news_container2','<?=$Photo;?>');" class="btn btn-sm   btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
						    </div>
                          	<?
                          	}
                          	?>
                          </div>

					</div>
                 </div>
              </div>
              