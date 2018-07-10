			<div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-list-alt"></i>
                  <h3 class="box-title"><?=$customPageLable[$navDetails[0]]?> Details</h3>
                  <div class="box-tools pull-right">
                  <?
          	if ($mypage[3] != '') 
          	echo '<il><a href="../'.$mypage[3].'" class="btn btn-sm btn-success" style="float:left" target="_blank"><i class="fa fa-external-link"></i> Preview Page</a></li>';
          	?>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  	<div class="form-group"  id="title">
                  	<div class="row">
                  		<div class="col-xs-12">
                  			<label><?=$customPageLable[$navDetails[0]]?> Title</label>
                      			<input type="text" class="form-control" value="<?=unFormatData($mypage[1])?>" name="title" placeholder="Enter page title">
                  		</div>
                  	</div>
                    </div>
                    <div class="form-group">
                    	<label>Page URL </label>
	                    <div class="input-group">
		                    <span class="input-group-addon"><?=$sitePath?></span>
		                    	<input type="text" name="pageURL"  value="<?=unFormatData($mypage[3])?>" class="form-control" placeholder="Page URL should be unique in system">
	                  	</div>
                  	</div>
                  	
                  	<div class="form-group">
                      <label>Redirect this page to external link</label>
                      <div class="row">
	                    <div class="col-xs-8">
	                      <input type="text"  value="<?=unFormatData($mypage[7])?>" class="form-control" name="url" placeholder="http://">
	                    </div>
	                    <div class="col-xs-4">
	                    <?
	                    $slctdUT[$mypage[8]] = 'selected';
	                    ?>
	                      <select class="form-control" name="urltarget">
	                        <option value="_self" <?=$slctdUT['_self']?>>Same Window</option>
	                        <option value="_blank" <?=$slctdUT['_blank']?>>New Window</option>
	                      </select>
	                    </div>
	                  </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                    <div class="col-xs-6">
                      								<label><?=$customPageLable[$navDetails[0]]?> Status</label>
                      								<div class="radio">
                                            		<?
                                            		$slctdST[$mypage[4]] = 'checked';
                                            		$statusArr = array('In-Active', 'Active');
                                            		for ($i=1; $i >=0; $i--)
                                            		{
                                            		?>
                                            		<label class="radio-inline">
                                            			<input type="radio" name="status" <?=$slctdST[$i]?> value="<?=$i?>"> <?=$statusArr[$i]?>
                                            		</label>
                                            		<?
                                            		}
                                            		?>
                                            		</div>
                    </div>
                    <div class="col-xs-6">
                      								<label>Page Style</label>
                      								<div class="radio">
                                            		<?
                                            		$slctdSTx[$mypage[17]] = 'checked';
                                            		$statusArrx = array('Side Nav Page', 'Full Width Page');
                                            		for ($i=0; $i <= 1; $i++)
                                            		{
                                            		?>
                                            		<label class="radio-inline">
                                            			<input type="radio" name="pagestyle" <?=$slctdSTx[$i]?> value="<?=$i?>"> <?=$statusArrx[$i]?>
                                            		</label>
                                            		<?
                                            		}
                                            		?>
                                            		</div>
                    </div>
                    </div>
                    </div>
                </div>
              </div>