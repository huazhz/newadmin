<?
include "_inc_session.php";
$_ACTIVE['home'] = $_ACTIVE['home_slider'] = 'active';
include "_inc_top.php";
if ($_POST['save-slider-settings'] > 0)
{
	unset($_POST['save-slider-settings']);
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".$v."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".$v."'";
		mysql_query($mysqlQuery); 
		
	}
	$saved = 1;
}
$data = getAllData('exceed_settings_vals', '1');
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = unFormatData($data[$i][1]);
}
if ($_POST['save-image'] > 0)
{
	$addObj['title'] = formatData($_POST['title']);
	$addObj['description'] = formatData($_POST['description']);
	$addObj['extraDescription'] = formatData($_POST['extraDescription']);
	$addObj['urlTitle'] = formatData($_POST['urlTitle']);
	$addObj['extraUrlTitle'] = formatData($_POST['extraUrlTitle']);
	
	$addObj['order'] = getDefaultOrder('exceed_photos');
	$addObj['section'] = 'slider';
	$addObj['sectionEID'] = $_POST['sectionEID'];
	
	$addObj['linkURL'] = formatData($_POST['linkURL']);
	$addObj['linkTarget'] = $_POST['linkTarget'];

	$addObj['extraURL'] = formatData($_POST['extraURL']);
	$addObj['extraURLTarget'] = $_POST['extraURLTarget'];
	
	if ($_FILES['photo']['tmp_name'] != '')
	{
		$addObj['photourl'] = "uploads/".md5(time()).".jpg";
		$addObj['thumburl'] = "uploads/thmub_".md5(time()).".jpg";
		$addObj['orginalurl'] = "uploads/orginal_".md5(time()).".jpg";
		if ($_POST['id'] > 0)
		{
			$oldphotoa = getDetails('exceed_photos', 'id='.$_POST['id']);
			@unlink('../'.$oldphotoa[3]);
			@unlink('../'.$oldphotoa[4]);
			@unlink('../'.$oldphotoa[5]);
			
		}
	}
	
	
	if ($_POST['id'] > 0)
	{
		updateRecord('exceed_photos', $addObj, "id=".$_POST['id']);
		$photoID = $_POST['id'];
	}
	else
	{
		$photoID = addRecord('exceed_photos', $addObj);
	}
	
	if ($_FILES['photo']['tmp_name'] != '')
	{
		$targetFileName = '../'.$addObj['orginalurl'];
		$photoFileName = '../'.$addObj['photourl'];
		$thumbFileName  = '../'.$addObj['thumburl'];
		
		move_uploaded_file($_FILES['photo']['tmp_name'],$targetFileName);
		
		corp_img($targetFileName,$thumbFileName,300,130, $_FILES['photo']['name']);
		corp_img($targetFileName,$photoFileName ,1600,700, $_FILES['photo']['name']);
		resizeToSpecificSize($photoFileName , 1600,700);
	}
}
?>
					<!-- Modal -->
                            <div class="modal fade" id="adminsform" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form method="post" role="form"  enctype="multipart/form-data">
                                <input name="id" type="hidden" class="form-control">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
											 <div class="row">
				                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>Big Title</label>
                                            			<input name="title" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>Second Title</label>
                                            			<input name="description" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                 <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Description Text</label>
                                           			 <textarea name="extraDescription" rows="4" class="form-control"></textarea>
                                        			</div>
				                                </div>
				                                 <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>Select Photo </label>
                                            			<input type="file" name="photo">
                                        			</div>
				                                </div>
				                                 <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>Align Text Caption To </label>
                                            			<select class="form-control" name="sectionEID">
									                        <option value="0">Left</option>
									                        <option value="1">Center</option>
									                        <option value="2">Right</option>
									                      </select>
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                           			 <label>Button 1 -  Title</label>
                                            			<input name="urlTitle" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>URL</label>
                                            			<input type="text"  class="form-control" name="linkURL" placeholder="http://">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                           			 <label>Target</label>
                                            			<select class="form-control" name="linkTarget">
									                        <option value="_self">Same Window</option>
									                        <option value="_blank">New Window</option>
									                      </select>
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                           			 <label>Button 2 -  Title</label>
                                            			<input name="extraUrlTitle" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>URL</label>
                                            			<input type="text"  class="form-control" name="extraURL" placeholder="http://">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                           			 <label>Target</label>
                                            			<select class="form-control" name="extraURLTarget">
									                        <option value="_self">Same Window</option>
									                        <option value="_blank">New Window</option>
									                      </select>
                                        			</div>
				                                </div>

				                                
				                                
				                                
				                                
				                                
				                              			                                
				                            </div>
									
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="save-image" value="1">Save</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
									</form>                               
								 </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->





      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Home Page Slider 
            <small>Manage Header Slider and Photos</small>
          </h1>
        </section>
        <section class="content">
	    <div class="row">
		<form method="post" role="form">
		<input type="hidden" name="save-slider-settings" value="1">
            <div class="col-lg-12">
              <div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Slider Settings</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                <?
                if ($saved > 0)
                {
                ?>
                			<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Setting has been saved!
                            </div>
                <?
                }
                ?>
                      <div class="row">
	                    <div class="col-md-2">
	                     <strong>Transition Effect </strong>
	                    </div>
	                    <div class="col-md-3">
	                     <select class="form-control" name="slider-effect">
	                        <?
								$transEffects = array('random','sliceDown','sliceDownLeft','sliceUp','sliceUpLeft','sliceUpDown','sliceUpDownLeft','fold','fade','slideInRight','slideInLeft','boxRandom','boxRain','boxRainReverse','boxRainGrow','boxRainGrowReverse');
							$slctdTrans[$_SETTINGS['slider-effect']]='selected';
							for($i = 0; $i < sizeof($transEffects); $i++)
							{
								echo '<option value="'.$transEffects[$i].'" '.$slctdTrans[$transEffects[$i]].'>'.$transEffects[$i].'</option>';
							}
							?>
	                     </select>
	                    </div>
	                    <div class="col-md-2">
	                       <strong>Transition Duration</strong>
	                    </div>
	                    <div class="col-md-3">
	                       <div class="input-group">
		                   <input type="text" name="slider-time"  value="<?=unFormatData($_SETTINGS['slider-time'])?>" class="form-control">
	                  	   <span class="input-group-addon">Seconds</span>
	                  	   </div>
	                    </div>
	                    <div class="col-md-2">
	                     <button type="submit" class="btn btn-primary">Save</button>
	                    </div>
	                  </div>
                 </div>
              </div>
            </div>
           </form>
          </div>      
       
        <div class="row">
         <form method="post">
                    <div class="col-md-12">
              <div class="box box-default">
                 <div class="box-header with-border">
                  <h3 class="box-title">Slider Photos</h3>
                  <?
                  $photos = getAllData('exceed_photos', "`section`='slider' order by `order`");
                  //if (sizeof($photos) < 6)
                 // {
                  ?>
                  <div class="box-tools pull-right">
                  	<a href="javascript:;" onclick="return addForm('adminsform', 'Add New Photo');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Upload New File</a>
                  </div>
                  <?
                //  }
                  ?>
                </div>
                <div class="box-body">
                <?
                if ($photoID > 0)
                {
                ?>
                			<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Photo has been added!.
                            </div>
                <?
                }
                ?>
                
                 <div class="row">
                        <?
                        
                        $activeStatus[0] = 'inactive-record';
                        $statusTitle = array('Show', 'Hide');
                        $statusIcon = array('eye', 'eye-slash');
                        
                        ?>
                         <ul class="sortable-list list-unstyled">
                         <?
                         for ($i = 0; $i < sizeof($photos); $i++)
                         {
                         $delCond = 'delete from `exceed_photos` where id='.$photos[$i][0];
                         ?>
                         <div class="col-xs-12 col-md-4 col-lg-4 <?=$activeStatus[$photos[$i][11]]?>" id="<?=$photos[$i][0]?>">
						    <li class=" panel panel-default " >
						    	<div class="sortable-heading panel-body" style="min-height:150px;background:url(../<?=$photos[$i][4]?>) center top no-repeat;background-size:cover;"></div>
						    <div class="panel-footer">
						    		<a href="javascript:;" onclick="return cropImg('cropImg','../<?=$photos[$i][5]?>','../<?=$photos[$i][3]?>', '<?=$photos[$i][10]?>','1600x700');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop</a>
						    		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Slide','exceed_photos', <?=$photos[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                                <a href="javascript:;" onclick="swapStatus(<?=$photos[$i][0]?>, 'exceed_photos', $(this));" class="btn btn-sm   btn-info"><i class="fa fa-<?=$statusIcon[$photos[$i][11]]?> fa-fw"></i> <?=$statusTitle[$photos[$i][11]]?></a>
                                	<a href="javascript:;" onclick="deleteFunction('', <?=$photos[$i][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm   btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
						    </div>
						    </li>
						   </div>
					     <?
					     }
					     ?>
						 
						</ul>   
                </div>
                </div>
              </div>
            </div>
        </form></div>
        </section>
      </div>
<?
include "_inc_footer.php";
include "_inc_crop_img.php";

?>
<script type="text/javascript">
      $(function () {
        $('.sortable-list').sortable({
            handle: '.sortable-heading', 
            update: function(event, ui) {
                 	var newOrder = $(this).sortable('toArray').toString();
           			$.get('_saveorder_ajax.php', {tbl: 'exceed_photos', order:newOrder});
            }
        });
    });
</script>
</body>
</html>    