				<div class="panel box box-danger custom-collaps-tab">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#pageApps" aria-expanded="false" class="collapsed">
                           Page Applications <i class="fa"></i>
                          </a>
                          
                        </h4>
                      </div>
                      <div id="pageApps" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
		                  	<div class="form-group">
		                    	<label>Applications Before Page Contents</label>
		                    	<?
		                    	$currentApps = json_decode($mypage['pageapps'], true);
		                    	//print_r($currentApps);
								foreach ($currentApps[0] as $k => $v)
								{
									$slctPagesApp[$v] = 'selected';	
								}
		                    	?>
		                    	<select multiple="multiple" id="appsBeforeContents" name="appsBeforeContents[]">
		                    		<optgroup label="News Room">
		                    		<?
		                    		$allNews = getAllData('exceed_news', '`type`=1 order by date desc');
									for ($i = 0; $i < sizeof($allFrms); $i++)
									{
										echo '<option value="news_'.$allNews[$i][0].'" '.$slctPagesApp['news_'.$allNews[$i][0]].'>'.unFormatData($allNews[$i][1]).'</option>';
									}
		                    		?>
		                    		</optgroup>
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
											echo '<option value="vid_'.$allAlbums[$i][0].'" '.$slctPagesApp['vid_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
										?>
		                    		</optgroup>
		                    		<optgroup label="Video Gallery">
		                    		
		                    			<?
										$allAlbums = getAllData('exceed_gallery_cats', "type='videos' and status=1 order by `order`");
										for ($i = 0; $i < sizeof($allAlbums); $i++)
										{
											echo '<option value="vidcat_'.$allAlbums[$i][0].'" '.$slctPagesApp['vidcat_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
										?>
		                    		</optgroup>
		                    		<optgroup label="Photo Gallery">
		                    		
		                    		<?
										$allAlbums = getAllData('exceed_gallery_cats', "type='gallery' and status=1 order by `order`");
										for ($i = 0; $i < sizeof($allAlbums); $i++)
										{
											echo '<option value="gal_'.$allAlbums[$i][0].'" '.$slctPagesApp['gal_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
								?>
		                    		</optgroup>
		                    		<optgroup label="Testimonials">
		                    		<?
									$allAlbums = getAllData('exceed_pages', 'navigation=10004 order by `order` desc');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="testimonials_'.$allAlbums[$i][0].'" '.$slctPagesApp['testimonials_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
		                    		<optgroup label="Team Members">
		                    		<?
									$allAlbums = getAllData('exceed_pages', 'navigation=10005 order by `order` desc');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="members_'.$allAlbums[$i][0].'" '.$slctPagesApp['members_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
		                    		
		                    		<optgroup label="F.A.Q">
		                    		<?
									$allAlbums = getAllData('exceed_apps_faq', 'status=1 order by `order`');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="faq_'.$allAlbums[$i][0].'" '.$slctPagesApp['faq_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
 
		                    	</select>
			                    
		                  	</div>
		                  	<div class="form-group">
		                    	<label>Applications After Page Contents</label>
			                    <select multiple="multiple" id="appsAfterContents" name="appsAfterContents[]">
		                    		<optgroup label="News Room">
		                    		<?
		                    		unset($slctPagesApp);
		                    		foreach ($currentApps[1] as $k => $v)
									{
										$slctPagesApp[$v] = 'selected';	
									}
									//print_r($slctPagesApp);
									
		                    		$allNews = getAllData('exceed_news', '`type`=1 order by date desc');
									for ($i = 0; $i < sizeof($allFrms); $i++)
									{
										echo '<option value="news_'.$allNews[$i][0].'" '.$slctPagesApp['news_'.$allNews[$i][0]].'>'.unFormatData($allNews[$i][1]).'</option>';
									}
		                    		?>
		                    		</optgroup>
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
											echo '<option value="vid_'.$allAlbums[$i][0].'" '.$slctPagesApp['vid_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
										?>
		                    		</optgroup>
		                    		<optgroup label="Video Gallery">
		                    		
		                    			<?
										$allAlbums = getAllData('exceed_gallery_cats', "type='videos' and status=1 order by `order`");
										for ($i = 0; $i < sizeof($allAlbums); $i++)
										{
											echo '<option value="vidcat_'.$allAlbums[$i][0].'" '.$slctPagesApp['vidcat_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
										?>
		                    		</optgroup>
		                    		
		                    		<optgroup label="Photo Gallery">
		                    		
		                    		<?
										$allAlbums = getAllData('exceed_gallery_cats', "type='gallery' and status=1 order by `order`");
										for ($i = 0; $i < sizeof($allAlbums); $i++)
										{
											echo '<option value="gal_'.$allAlbums[$i][0].'" '.$slctPagesApp['gal_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
										}								
								?>
		                    		</optgroup>
		                    		<optgroup label="Testimonials">
		                    		<?
									$allAlbums = getAllData('exceed_pages', 'navigation=10004 order by `order` desc');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="testimonials_'.$allAlbums[$i][0].'" '.$slctPagesApp['testimonials_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
		                    		<optgroup label="Team Members">
		                    		<?
									$allAlbums = getAllData('exceed_pages', 'navigation=10005 order by `order` desc');

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="members_'.$allAlbums[$i][0].'" '.$slctPagesApp['members_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
		                    		
		                    		<optgroup label="F.A.Q">
		                    		<?
									$allAlbums = getAllData('exceed_apps_faq', 'status=1 order by `order`',1);

									for ($i = 0; $i < sizeof($allAlbums); $i++)
									{
										echo '<option value="faq_'.$allAlbums[$i][0].'" '.$slctPagesApp['faq_'.$allAlbums[$i][0]].'>'.unFormatData($allAlbums[$i][1]).'</option>';
									}								
									?>
		                    		</optgroup>
 
		                    	</select>

		                  	</div>
		                  	
		                  	
		                  	
		                  	
		                  	
		                  	
		                  	
		                  	
		                  			                    </div>
		                </div>
                      </div>
<style>
#pageApps .btn-group, #pageApps .btn {width:100% !important;}
.multiselect-container {width:100%;}
</style>                                        
