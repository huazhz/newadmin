				<div class="panel box box-danger custom-collaps-tab">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a  data-toggle="collapse" data-parent="#accordion" href="#SEOSettings" aria-expanded="false" class="collapsed">
                           SEO Settings  <i class="fa"></i>
                          </a>
                        </h4>
                        
                      </div>
                      <div id="SEOSettings" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
		                  	<div class="form-group">
		                      <label>Meta Page Title</label>
		                      <input type="text" class="form-control" name="seo_title"  value="<?=unFormatData($mypage[9])?>">
		                    </div>
		                    <div class="form-group">
		                      <label>Meta Page Description</label>
		                      <textarea class="form-control" rows="2" name="seo_desc"><?=unFormatData($mypage[11])?></textarea>
		                    </div>
		                    <div class="form-group">
		                      <label>Meta Page Keywords</label>
		                      <textarea class="form-control" rows="2" name="seo_keywords"><?=unFormatData($mypage[10])?></textarea>
		                    </div>
		                </div>
                      </div>
                    </div>




                
