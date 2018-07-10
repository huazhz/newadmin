<?
if ($_POST['save-widget'] == 1)
{
		$addObj['title'] = formatData($_POST['title']);
		$addObj['contents'] = formatData($_POST['contents']);
		$addObj['url'] = formatData($_POST['url']);
		$addObj['urltarget'] = $_POST['urltarget'];
		$addObj['seo_title'] = $_POST['seo_title']; //url Label

	if ($_POST['id'] > 0)
	{
		updateRecord('exceed_pages', $addObj, 'id='.$_POST['id']);
		$pageID = $_POST['id'];
		$saved = mysql_affected_rows ();
	}
	else
	{
		$addObj['order'] = getDefaultOrder('exceed_pages');
		$addObj['navigation'] = $widgetID;
		$addObj['pageURL'] = 'resoruces-footer-'.time();
		$saved = addRecord('exceed_pages', $addObj);
		$pageID = $saved ;
	}
	
	if ($_FILES['photo1']['tmp_name'] != '')
	{
		$targetPhoto = "../uploads/page_img_".$pageID.".jpg";
		$thumbPhoto = "../uploads/page_img_thumb".$pageID.".jpg";
		@unlink($targetPhoto);
		@unlink($thumbPhoto);
		move_uploaded_file($_FILES['photo1']['tmp_name'],$targetPhoto);
		corp_img($targetPhoto,$thumbPhoto,350,340, $_FILES['photo1']['name']);
	}
	

}
?>
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
											 <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Photo <small>(350 x 340)</small></label>
                                            			<input type="file" name="photo1" class="form-control">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Title </label>
                                            			<input name="title" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                
				                                 <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Description</label>
                                           			 <textarea name="contents" rows="3" class="form-control"></textarea>
                                        			</div>
				                                </div>
				                               
				                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>URL Label</label>
                                            			<input type="text" id="urlText"  class="form-control" name="seo_title">
                                        			</div>
				                                </div>
                                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>URL</label>
                                            			<input type="text" id="url"  class="form-control page-selector" name="url">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-4">
				                                	<div class="form-group">
                                           			 <label>Target</label>
                                            			<select class="form-control" name="urltarget">
									                        <option value="_self">Same Window</option>
									                        <option value="_blank">New Window</option>
									                      </select>
                                        			</div>
				                                </div>
				                                
				                                
				                            </div>
									
                                        	</div>
                                        	
                                        	
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="save-widget" value="1">Save</button>
                                        </div>
                                    </div>
									</form>                               
								 </div>
                            </div>


<div class="box box-primary">
	                <div class="box-header with-border">
	                <a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New <?=$widgetTitle?>');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New <?=$widgetTitle?></a>

	                  <h3 class="box-title"><?=$widgetTitle?> Widget</h3>
	                  </div>
                  <div class="box-body">
                   <ul class="list-unstyled sortable-list">
                 <?
						        $activeStatus[0] = 'inactive-record';
		                        $statusTitle = array('Show', 'Hide');
		                        $statusIcon = array('eye', 'eye-slash');
                        
						        $data = getAllData('exceed_pages', 'navigation='.$widgetID.' order by `order`');
						        if (sizeof($data) > 0)
						        {

						        for ($j = 0; $j < sizeof($data); $j++)
						        {
						        $targetPhoto = "../uploads/page_img_".$data[$j][0].".jpg";
								$thumbPhoto = "../uploads/page_img_thumb".$data[$j][0].".jpg";

						        
						        $delCond = 'delete from `exceed_pages` where id='.$data[$j][0];
						        $data[$j]['urltarget']  = str_replace('"', '', json_encode($data[$j]['urltarget']));
						        ?>
						        <li class="<?=$activeStatus[$data[$j][4]]?> box box-info"  style="padding:10px;" id="<?=$data[$j][0]?>">
						        <div class="pull-right">
						        <a href="_copy_record.php?data=<?=encodeRequest($widgetParentURL.'|exceed_pages|'.$data[$j][0])?>" onclick="return confirm('are you sure to duplicate this banner?');"class="btn btn-sm   btn-primary"><i class="fa fa-copy fa-fw"></i> Duplicate</a>
						        	<a href="javascript:;" class="btn btn-sm btn-warning" onclick="viewImage('<?=$thumbPhoto?>');"><i class="fa fa-search-plus"></i> View </a>
						    		<a href="javascript:;" onclick="return cropImg('cropImg','<?=$targetPhoto?>','<?=$thumbPhoto?>', '0|0|100|100','350x340');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop</a>
							 		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit ','exceed_pages', <?=$data[$j][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_pages', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][4]]?> fa-fw"></i> <?=$statusTitle[$data[$j][4]]?></a>
                                	<a href="javascript:;" onclick="deleteFunction('', <?=$data[$j][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
								</div>
								<div class="sortable-heading"> <i class="fa fa-arrows-v"></i> <strong><?=unFormatData($data[$j]['title'])?> </strong>
								
								</div>
						        </li>
						        
						        
						        
						        <?
						        }

						        }
						        ?>
	</ul>			
</div>
	                
	            </div>