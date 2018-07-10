				<div class="panel box box-danger custom-collaps-tab">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a  data-toggle="collapse" data-parent="#accordion" href="#photo<?=$photoData[0]?>" aria-expanded="false" class="collapsed">
                           <?=$customPageLable[$navDetails[0]]?> <?=$photoData[0]?> <i class="fa"></i>
                          </a>
                        </h4>
                        
                      </div>
                      <div id="photo<?=$photoData[0]?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
		                  	
		                  	<div class="row">
		                  	<div class="col-xs-6">
                		   	<div class="form-group">
                                           			 <label>Photo 
                                           			 <?
													if ($photoData[1] != '') echo '('.$photoData[1].')';	
													?>
													</label>
                                            			<input type="file" name="<?=$photoData[0]?>">
                                        			</div>
                			</div>
		                  	
		                  	
		                    <?
		                    $newsImg = "../uploads/page_".strtolower($photoData[0])."_".$mypage[0].".jpg";
		                    if (file_exists($newsImg))
		                    {
		                    ?>
		                    <div class="col-xs-6" id="img_<?=$photoData[0]?>_container">
							<img src="<?=$newsImg?>" height="85" style="margin-bottom:8px;"><br>
								<a href="javascript:;" onclick="deleteFile('img_<?=$photoData[0]?>_container', '', '<?=$newsImg?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
								
							<?
							if ($photoData[1] != '')
							{
							?>
								<a href="javascript:;" onclick="return cropImg('cropImg','<?=str_replace('.jpg', '_original.jpg',  $newsImg)?>','<?=$newsImg?>', '0|0|100|100','<?=$photoData[1]?>');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop</a>
							<?
							}
							?>
			                </div>
		                    <?
		                    }
		                    ?>
	                    
	                    
                	</div>
		                </div>
                      </div>
                    </div>




                
