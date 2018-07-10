				<div class="panel box box-danger custom-collaps-tab">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#innerBanner" aria-expanded="false" class="collapsed">
                           Header Banner  <i class="fa"></i>
                          </a>
                          
                        </h4>
                      </div>
                      <div id="innerBanner" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
		                  	<div class="form-group">
		                      <select size="1" name="innerbannerid" class="form-control">
                                <? 
                                $layoutBannerType[$mypage['innerbannerid']]='selected';
                               $pageBannerLayoutArry =  getAllData('exceed_photos', "`section`='innerbanners' order by `order`");
                                for ($i = 0; $i < sizeof($pageBannerLayoutArry); $i++)
                                {
                                ?>
                                <option value="<?=$pageBannerLayoutArry[$i][0]?>" <?=$layoutBannerType[$pageBannerLayoutArry[$i][0]]?> ><?=$pageBannerLayoutArry[$i][1]?></option>
                                <?
                                }
                                ?>
								</select>
		                    </div>
		                </div>
                      </div>
                    </div>