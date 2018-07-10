<?
include "_inc_session.php";
include "_inc_top_iframe.php";
if (sizeof($_POST) > 0)
{

	$addObj['title'] = formatData($_POST['title']);
	$addObj['description'] = formatData($_POST['description']);
	$addObj['extraDescription'] = formatData($_POST['extraDescription']);
	
	
	$addObj['section'] = $_GET['s'];	
	$addObj['linkURL'] = formatData($_POST['linkURL']);
	$addObj['linkTarget'] = formatData($_POST['linkTarget']);
	$addObj['urlTitle'] = formatData($_POST['urlTitle']);
	$addObj['extraURL'] = formatData($_POST['extraURL']);
	$addObj['extraURLTarget'] = formatData($_POST['extraURLTarget']);

	if ($_FILES['photo']['tmp_name'] != '')
	{
		$addObj['photourl'] = "uploads/".md5(time()).".jpg";
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
		$addObj['order'] = getDefaultOrder('exceed_photos');
		$photoID = addRecord('exceed_photos', $addObj);
	}
	
	if ($_FILES['photo']['tmp_name'] != '')
	{
		$targetFileName = '../'.$addObj['orginalurl'];
		$photoFileName = '../'.$addObj['photourl'];
		
		move_uploaded_file($_FILES['photo']['tmp_name'],$targetFileName);
		
		corp_img($targetFileName,$photoFileName ,150,150, $_FILES['photo']['name']);
	}		
		
}
$data = getAllData('exceed_settings_vals', '1');
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = unFormatData($data[$i][1]);
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
											  <div class="col-xs-12 col-md-5">
				                                	<div class="form-group">
                                           			 <label>Logo <small>(150 x 150)</small></label>
                                            			<input type="file" name="photo">
                                        			</div>
				                                </div>
                                                         
				                                <div class="col-xs-12 col-md-7">
				                                	<div class="form-group">
                                           			 <label>Alt Tag </label>
                                            			<input name="title" class="form-control">
                                        			</div>
				                                </div>
				                               
				                               
				                                                                          
				                               
				                                <div class="col-xs-12 col-md-9">
				                                	<div class="form-group">
                                           			 <label>On Click URL</label>
                                            			<input type="text" id="linkURL"  class="form-control page-selector" name="linkURL">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                           			 <label>URL Target</label>
                                            			 <select name="linkTarget" class="form-control">
                                           			 <option value="_self">Same Window</option>
                                           			 <option  value="_blank">New Window</option>
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
      
          
          

                  <div class="row">
                  <div class="col-xs-12 " style="height:60px;">
                                 	<a href="javascript:;" style="float:right;" onclick="return addForm('adminsform', 'Add New <?=$_GET['t']?>');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New <?=$_GET['t']?></a>
</div>
                  </div>
                  <div class="row">
                        <?
                        
                        $activeStatus[0] = 'inactive-record';
                        $statusTitle = array('Show', 'Hide');
                        $statusIcon = array('eye', 'eye-slash');
                        
                        ?>
                         <ul class="sortable-list list-unstyled">
                         <?
                         $photos = getAllData('exceed_photos', "`section`='".$_GET['s']."' order by `order`");
                         for ($i = 0; $i < sizeof($photos); $i++)
                         {
                         $delCond = 'delete from `exceed_photos` where id='.$photos[$i][0];
                         ?>
                         <div class="col-xs-6 col-md-3 <?=$activeStatus[$photos[$i][11]]?>" id="<?=$photos[$i][0]?>" >
						    <li class=" panel panel-default " >
						    	<div class="sortable-heading panel-body" style="position:relative;min-height:150px;background:url(../<?=$photos[$i][3]?>) center top no-repeat;background-size:contain">
						    <?
						    $bannerLogo = "../uploads/banner_logo_".$photos[$i][0].".jpg";
						    if (file_exists($bannerLogo)) 
						    {
						    ?>
						    	<div style="position:absolute;left:0px;bottom:0px;background:rgba(0,0,0,0.5);" id="file<?=$photos[$i][0]?>"><a href="javascript:;" style="position:absolute;bottom:5px;left:5px;" onclick="deleteFile('<?=$photos[$i][0]?>', '', '<?=$bannerLogo?>')" class="btn btn-sm   btn-danger"><i class="fa fa-trash fa-fw"></i> </a><img src="<?=$bannerLogo?>"></div>
						    <?
						    }
						    ?>
						    	
						    </div>
						    <div class="panel-footer">
						    		<a href="javascript:;" onclick="return cropImg('cropImg','../<?=$photos[$i][5]?>','../<?=$photos[$i][3]?>', '0|0|100|100','150x150');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i data-toggle="tooltip" title="Crop Image"  class="fa fa-crop fa-fw"></i></a>
						    		<a href="javascript:;"  onclick="return editForm('adminsform', 'Edit Photo','exceed_photos', <?=$photos[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i data-toggle="tooltip" title="Edit" class="fa fa-pencil fa-fw"></i></a>
                                <a href="javascript:;" data-toggle="tooltip" title="<?=$statusTitle[$photos[$i][11]]?>"  onclick="swapStatus(<?=$photos[$i][0]?>, 'exceed_photos', $(this));" class="btn btn-sm   btn-info"><i class="fa fa-<?=$statusIcon[$photos[$i][11]]?> fa-fw"></i> </a>
                                	<a href="javascript:;" data-toggle="tooltip" title="Delete Banner"  onclick="deleteFunction('', <?=$photos[$i][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm   btn-danger"><i class="fa fa-trash fa-fw"></i> </a>
                                	<a href="_copy_record.php?data=<?=encodeRequest('_home_banners.php|exceed_photos|'.$photos[$i][0])?>" onclick="return confirm('are you sure to duplicate this banner?');" data-toggle="tooltip" title="Duplicate Banner" class="btn btn-sm   btn-primary"><i class="fa fa-copy fa-fw"></i> </a>
						    </div>
						    </li>
						   </div>
					     <?
					     }
					     ?>
						 
						</ul>   
                </div>

                  
<?
include "_inc_footer_iframe.php";
include "_inc_crop_img.php";
include "_inc_img_viewer.php";
include "_inc_page_selector_list.php";
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

      
      $(document).ready(function() {
        $('.sortable-list').sortable({
            handle: '.sortable-heading', 
            update: function(event, ui) {
                 	var newOrder = $(this).sortable('toArray').toString();
           			$.get('_saveorder_ajax.php', {tbl: 'exceed_photos',order:newOrder});
            }
        });
    });
      
     
</script>      
 
</body>
</html>    