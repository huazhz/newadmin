<?
include "_inc_session.php";
$_ACTIVE['home'] = $_ACTIVE['home_categories'] = 'active';
$customHeader = '<link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>';

include "_inc_top.php";
if (sizeof($_POST) > 0)
{
	if($_POST['homeWidget']==1){
		
		$addObj['title'] = formatData($_POST['title']);
		$addObj['contents'] = formatData($_POST['contents']);
		
		$addObj['url'] = formatData($_POST['url']);
		$addObj['urltarget'] = $_POST['urltarget'];
	
		$addObj['seo_title'] = $_POST['urlLabel']; //url Label
		
		if ($_POST['id'] > 0)
		{
			updateRecord('exceed_pages', $addObj, 'id='.$_POST['id']);
			$pageID = $_POST['id'];
			$saved = mysql_affected_rows ();
		}
		else if ($_POST['contents'] != '')
		{
			$addObj['order'] = getDefaultOrder('exceed_pages');
			$addObj['navigation'] = 104;
			$addObj['pageURL'] = 'banner'.time();
			$saved = addRecord('exceed_pages', $addObj);
			$pageID = $saved ;
		}
			if ($_FILES['photo1']['tmp_name'] != '')
		{
			$targetPhoto = "../uploads/widget_img_".$pageID.".jpg";
			$thumbPhoto = "../uploads/widget_img_thumb".$pageID.".jpg";
			@unlink($targetPhoto);
			@unlink($thumbPhoto);
			move_uploaded_file($_FILES['photo1']['tmp_name'],$targetPhoto);
			corp_img($targetPhoto,$thumbPhoto,350,340, $_FILES['photo1']['name']);
		}
		
	}else if($_POST['homeWidgetOptions']==1){
		$addOptObj['title'] = formatData($_POST['title']);
		$addOptObj['contents'] = formatData($_POST['contents']);
		$addOptObj['seo_title'] = $_POST['seo_title'];     //BG Option
		$addOptObj['seo_keywords'] = $_POST['seo_keywords'];   //BG Color
		$addOptObj['seo_desc'] = $_POST['urlText'];     //URL Text
		$addOptObj['url'] = $_POST['url'];   //URL
		$addOptObj['urltarget'] = $_POST['urltarget'];     //URL Label
		
		if ($_POST['catID'] > 0)
		{
			$catID = $_POST['catID'];
			updateRecord('exceed_pages', $addOptObj, 'id='.$catID);
			$saved = mysql_affected_rows ();
		}
	
		if ($_FILES['bgphoto']['tmp_name'] != '')
		{
			$BGtargetPhoto = "../uploads/page_bg_".$catID.".jpg";
			$BGthumbPhoto = "../uploads/page_bg_croped_".$catID.".jpg";
			@unlink($BGtargetPhoto);
			@unlink($BGthumbPhoto);
			move_uploaded_file($_FILES['bgphoto']['tmp_name'],$BGtargetPhoto);
			corp_img($BGtargetPhoto,$BGthumbPhoto,1680,600, $_FILES['bgphoto']['name']);
		}
		
	}

}
$data = getDetails('exceed_pages','id=1');
$_CHECKED[$data['seo_title']] = 'checked="checked"';
$_SLECTED[$data['urltarget']] = 'selected="selected"';
if($data['seo_title']==''){
	$_CHECKED[0] = 'checked="checked"';
	$data['seo_keywords'] ='#fff';
}

?>
					<!-- Modal -->
                            <div class="modal fade" id="adminsform" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form method="post" role="form"  enctype="multipart/form-data">
                                <input name="id" type="hidden">
                                <input name="homeWidget" type="hidden" value="1">
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
                                            			<input type="text" id="urlText"  class="form-control page-selector" name="urlText">
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
                                            <button type="submit" class="btn btn-primary" name="save-image" value="1">Save</button>
                                        </div>
                                    </div>
									</form>                               
								 </div>
                            </div>

      <div class="content-wrapper">
        <section class="content-header">
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Category');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Category</a>
          <h1>
            Home Categories 
            <small>You can create home page widgets.</small>
          </h1>
        </section>
      <section class="content">
         <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                 <div class="box-header with-border">
                  <h3 class="box-title">Category Options</h3>
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
                ?> <form method="post" enctype="multipart/form-data">
                   <input name="homeWidgetOptions" type="hidden" value="1">
                   <input name="catID" type="hidden" value="<?=$data[0];?>">
                  <div class="row">
                     <div class="col-xs-12 col-md-6 col-lg-7">
                        <div class="form-group">
                             <label>Title </label>
                             <input name="title"  class="form-control" value="<?=unFormatData($data['title'])?>">
                        </div>
                        <label>Description (<small>Showed After Category Items</small>) </label>
                     	<textarea name="contents" id="contents" data-ckeditor="1" rows="3" class="form-control"><?=unFormatData($data['contents'])?></textarea> <br /><br />
                                              <div class="col-xs-12 col-md-4">
				                                	<div class="form-group">
                                           			 <label>Button URL Text</label>
                                            			<input type="text" class="form-control" value="<?=unFormatData($data['seo_desc'])?>" name="urlText">
                                        			</div>
				                                </div>
                                                <div class="col-xs-12 col-md-5">
				                                	<div class="form-group">
                                           			 <label>Button URL</label>
                                            			<input type="text" id="btnurl" class="form-control page-selector" value="<?=unFormatData($data['url'])?>" name="url">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                                    <label>Target</label>
                                            			<select class="form-control" name="urltarget">
									                        <option <?=$_SLECTED['_self'];?> value="_self">Same Window</option>
									                        <option <?=$_SLECTED['_blank'];?> value="_blank">New Window</option>
									                      </select>
                                        			</div>
				                                </div>
                         <div class="col-xs-12 col-md-12">
	                     	<button type="submit" class="btn btn-primary">Save</button> 
                         </div> 
                        
                     </div>
                      <div class="col-xs-12 col-md-6 col-lg-5">
                       <div class="col-xs-12 col-md-6 col-lg-12">
                      		<label>Background Option&nbsp;&nbsp;&nbsp;</label> 
                            <input type="radio" name="seo_title" <?=$_CHECKED[1];?> value="1"  />&nbsp;&nbsp;Image &nbsp;&nbsp;
                            <input type="radio" name="seo_title" <?=$_CHECKED[0];?> value="0"  />&nbsp;&nbsp;Color<br /><br />
                        </div> 
                        <div class="col-xs-12 col-md-6 col-lg-6">
                                <label>Background Color</label>
                               	<div class="input-group my-colorpicker">
                                  <input type="text" name="seo_keywords" class="form-control" value="<?=$data['seo_keywords']?>"/>
                                  <div class="input-group-addon">
                                    <i id="seo_keywords_colorpicker"></i>
                                  </div>
                                </div>
                          </div>
                        <div class="col-xs-12 col-md-6 col-lg-6">
                      	 <label>Background Image <small>(1680 x 600)</small></label>
                          <input type="file" name="bgphoto">
                          </div>
                         <div class="col-xs-12 col-md-6 col-lg-12">
                            <? $Photo = "../uploads/page_bg_croped_".$data[0].".jpg";
						     $originalPhoto = "../uploads/page_bg_".$data[0].".jpg";
						  if(file_exists($Photo)){
						   ?>
                          <div class=" panel panel-default " id="file<?=$data[0];?>">
						    	<div class="panel-body" style="min-height:120px;background:url(<?=$Photo?>) center top no-repeat;background-size:contain"></div>
						    <div class="panel-footer">
						    		<a href="javascript:;" onclick="return cropImg('cropImg','<?=$originalPhoto?>','<?=$Photo?>', '0|0|100|100','1680x600');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop</a>
                                	<a href="javascript:;" onclick="deleteFile('<?=$data[0];?>','', '<?=$originalPhoto;?>');" class="btn btn-sm   btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
						    </div>
						    </div>
                          <? } ?>
                          </div>
                           
                     </div>
                </div>
                 </form>

                  
                </div>
              </div>          
  
                </div>
            </div>
        <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                   <div class="box-header with-border">
                  <h3 class="box-title">Category Items</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <?
						        $activeStatus[0] = 'inactive-record';
		                        $statusTitle = array('Show', 'Hide');
		                        $statusIcon = array('eye', 'eye-slash');
                        
						        $data = getAllData('exceed_pages', 'navigation=104 order by `order`');
						        if (sizeof($data) > 0)
						        {
						        ?>
						        <ul class="list-unstyled sortable-list">
						        <?
						        for ($j = 0; $j < sizeof($data); $j++)
						        {
						        $delCond = 'delete from `exceed_pages` where id='.$data[$j][0];
						        $imgPhoto = "../uploads/widget_img_thumb".$data[$j][0].".jpg";						        
						        $oimgPhoto = "../uploads/widget_img_".$data[$j][0].".jpg";
						        ?>
						        <li class="<?=$activeStatus[$data[$j][4]]?> box box-info"  style="padding:10px;" id="<?=$data[$j][0]?>">
						        <div class="pull-right">
						        <a href="javascript:;" onclick="return cropImg('cropImg','<?=$oimgPhoto?>','<?=$imgPhoto?>', '0|0|100|100','410x210');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop Image</a>
							 		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Featured Category','exceed_pages', <?=$data[$j][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_pages', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][4]]?> fa-fw"></i> <?=$statusTitle[$data[$j][4]]?></a>
								
                                	<a href="javascript:;" onclick="deleteFunction('', <?=$data[$j][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
								
								</div>
								<div class="sortable-heading"><strong><i class="fa fa-arrows-v"></i> <?=unFormatData($data[$j][1])?></strong>
								
								</div>
						        </li>
						        <?
						        }
						        ?>
						        </ul>
						        <?
						       }
						        ?>

                  
                </div>
              </div>          
  
                </div>
            </div>
        
        
  		</section>      </div>

<?
include "_inc_footer.php";
include "_inc_page_selector_list.php";
include "_inc_crop_img.php";
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
	   $(".my-colorpicker").colorpicker();
        CKEDITOR.replace('contents', {height: 100,
        	toolbar: [[ 'Source','Bold', 'Italic','Underline','-', 'TextColor', 'FontSize']]
        });
      });
 $(document).ready(function() {
        $('.sortable-list').sortable({
            handle: '.sortable-heading', 
            update: function(event, ui) {
                 	var newOrder = $(this).sortable('toArray').toString();
           			$.get('_saveorder_ajax.php', {tbl: 'exceed_pages',order:newOrder});
            }
        });
    });
      
     
</script>      
 
</body>
</html>    