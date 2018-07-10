				<div class="col-lg-12">
				<div class="panel box box-danger custom-collaps-tab">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" href="#pageApps2" aria-expanded="false" class="collapsed">
                           Side Navigation <i class="fa"></i>
                          </a>
                          
                        </h4>
                      </div>
                      <div id="pageApps2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
							<div class="row">
								<div class="col-md-8">
								<textarea id="sidehtmlcontents" name="sidehtmlcontents" rows="10" cols="80"><?=unFormatData($mypage['sidehtmlcontents'])?></textarea>
								</div>
								<div class="col-md-4">
									                  	<div class="form-group">
		                    	<label>Applications Before Side Contents</label>
		                    	<?
		                    	$currentApps = json_decode($mypage['sidenavpages'], true);
		                    	unset($slctPagesApp);
								foreach ($currentApps[0] as $k => $v)
								{
									$slctPagesApp[$v] = 'selected';	
								}
		                    	?>
		                    	<select multiple="multiple" id="appsBeforeSideContents" name="appsBeforeSideContents[]">
		                    		<optgroup label="Forms">
		                    		<?
		                    		$allFrms = getAllData('exceed_pages', 'navigation=10007 order by `order` desc');
									for ($i = 0; $i < sizeof($allFrms); $i++)
									{
										echo '<option value="form_'.$allFrms[$i][0].'" '.$slctPagesApp['form_'.$allFrms[$i][0]].'>'.unFormatData($allFrms[$i][1]).'</option>';
									}
		                    		?>
		                    		</optgroup>
		                    		<optgroup label="Single Video">
		                    		
		                    			<?
										$allAlbums = getAllData('exceed_photos', "section='videos'  order by `title`");
										for ($i = 0; $i < sizeof($allAlbums); $i++)
										{
											echo '<option value="sidevid_'.$allAlbums[$i][0].'" '.$slctPagesApp['sidevid_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
										?>
		                    		</optgroup>
		                    		
		                    		<optgroup label="Photo Gallery">
		                    		
		                    		<?
										$allAlbums = getAllData('exceed_gallery_cats', "type='gallery' and status=1 order by `order`");
										for ($i = 0; $i < sizeof($allAlbums); $i++)
										{
											echo '<option value="sidegal_'.$allAlbums[$i][0].'" '.$slctPagesApp['sidegal_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
								?>
		                    		</optgroup>
		                    		<optgroup label="Testimonials">
		                    		<?
									$allAlbums = getAllData('exceed_pages', 'navigation=10004 order by `order` desc');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="sidetestimonials_'.$allAlbums[$i][0].'" '.$slctPagesApp['sidetestimonials_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
		                    		<optgroup label="Team Members">
		                    		<?
									$allAlbums = getAllData('exceed_pages', 'navigation=10005 order by `order` desc');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="sidemembers_'.$allAlbums[$i][0].'" '.$slctPagesApp['sidemembers_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
		                    		
		                    		
 
		                    	</select>
			                    
		                  	</div>
		                  	<div class="form-group">
		                    	<label>Applications After Side Contents</label>
			                    <select multiple="multiple" id="appsAfterSideContents" name="appsAfterSideContents[]">
		                    		<optgroup label="Forms">
		                    		<?
		                    		unset($slctPagesApp);
		                    		foreach ($currentApps[1] as $k => $v)
									{
										$slctPagesApp[$v] = 'selected';	
									}
									//print_r($slctPagesApp);
								
		                    		$allFrms = getAllData('exceed_pages', 'navigation=10007 order by `order` desc');
									for ($i = 0; $i < sizeof($allFrms); $i++)
									{
										echo '<option value="form_'.$allFrms[$i][0].'" '.$slctPagesApp['form_'.$allFrms[$i][0]].'>'.unFormatData($allFrms[$i][1]).'</option>';
									}
		                    		?>
		                    		</optgroup>
		                    		<optgroup label="Single Video">
		                    		
		                    			<?
										$allAlbums = getAllData('exceed_photos', "section='videos'  order by `title`");
										for ($i = 0; $i < sizeof($allAlbums); $i++)
										{
											echo '<option value="sidevid_'.$allAlbums[$i][0].'" '.$slctPagesApp['sidevid_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
										?>
		                    		</optgroup>
		                    		
		                    		<optgroup label="Photo Gallery">
		                    		
		                    		<?
										$allAlbums = getAllData('exceed_gallery_cats', "type='gallery' and status=1 order by `order`");
										for ($i = 0; $i < sizeof($allAlbums); $i++)
										{
											echo '<option value="sidegal_'.$allAlbums[$i][0].'" '.$slctPagesApp['sidegal_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
								?>
		                    		</optgroup>
		                    		<optgroup label="Testimonials">
		                    		<?
									$allAlbums = getAllData('exceed_pages', 'navigation=10004 order by `order` desc');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="sidetestimonials_'.$allAlbums[$i][0].'" '.$slctPagesApp['sidetestimonials_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
		                    		<optgroup label="Team Members">
		                    		<?
									$allAlbums = getAllData('exceed_pages', 'navigation=10005 order by `order` desc');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="sidemembers_'.$allAlbums[$i][0].'" '.$slctPagesApp['sidemembers_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
		                    		
		                    	</select>

		                  	</div>

								</div>
							</div>
		                 </div>
		                </div>
                      </div>
                     </div> 
<style>
#pageApps2 .btn-group, #pageApps2 .btn {width:100% !important;}
</style>                                        
                      
