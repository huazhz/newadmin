<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_testimonials'] = 'active';

include "_inc_top.php";



if (sizeof($_POST) > 0)
{

		$addObj['title'] = formatData($_POST['title']);
		$addObj['contents'] = formatData($_POST['contents']);
		$addObj['seo_title'] = formatData($_POST['seo_title']);
		
	
	
	
		if ($_POST['id'] > 0)
		{
			updateRecord('exceed_pages', $addObj, 'id='.$_POST['id']);
			$pageID = $_POST['id'];
			$saved = mysql_affected_rows ();
		}
		else if ($_POST['contents'] != '')
		{
			$addObj['order'] = getMinOrder('exceed_pages');
			$addObj['navigation'] = 10004;
			$addObj['pageURL'] = 'testimonials'.time();
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
			corp_img($targetPhoto,$thumbPhoto,200,200, $_FILES['photo1']['name']);
		}
		
		

}
	?>
					<!-- Modal -->
                            <div class="modal fade" id="adminsform" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                           			 <label>Title </label>
                                            			<input name="title" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Photo <small>(200 x 200)</small></label>
                                            			<input type="file" name="photo1">
                                        			</div>
				                                </div>
				                                
				                                 <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Testimonial Message</label>
                                           			 	<textarea name="contents" data-ckeditor="1" id="contents" rows="3" class="form-control"></textarea>
                                        			</div>
				                                </div>
				                               	 <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Message Footer </label>
                                            			<input name="seo_title" class="form-control">
                                            			
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
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Testimonial Message');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Testimonial Message</a>
          <h1>
           Testimonial Messages
            <small>Manage all client's testimonail messages!</small>
          </h1>
        </section>
      <section class="content">
               <div class="row">
                <div class="col-lg-12">
			    
                  <?
						        $activeStatus[0] = 'inactive-record';
		                        $statusTitle = array('Show', 'Hide');
		                        $statusIcon = array('eye', 'eye-slash');
                        
						        $data = getAllData('exceed_pages', 'navigation=10004 order by `order`');
						        if (sizeof($data) > 0)
						        {
						        ?>
						        <ul class="list-unstyled sortable-list">
						        <?
						        for ($j = 0; $j < sizeof($data); $j++)
						        {
						        $delCond = 'delete from `exceed_pages` where id='.$data[$j][0];
						        $imgPhoto = "../uploads/page_img_thumb".$data[$j][0].".jpg";						        
						        $oimgPhoto = "../uploads/page_img_".$data[$j][0].".jpg";
						        ?>
						        <li class="<?=$activeStatus[$data[$j][4]]?> box box-info"  style="padding:10px;min-height:130px;height:auto;" id="<?=$data[$j][0]?>">
						        <div class="pull-right">
						        <a href="_copy_record.php?data=<?=encodeRequest('_app_testimonials.php|exceed_pages|'.$data[$j][0])?>" onclick="return confirm('are you sure to duplicate this message?');"class="btn btn-sm   btn-primary"><i class="fa fa-copy fa-fw"></i> Duplicate</a>
						        	<a href="javascript:;" onclick="return cropImg('cropImg','<?=$oimgPhoto?>','<?=$imgPhoto?>', '0|0|100|100','200x200');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop Image</a>
							 		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Message','exceed_pages', <?=$data[$j][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_pages', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][4]]?> fa-fw"></i> <?=$statusTitle[$data[$j][4]]?></a>
								
                                	<a href="javascript:;" onclick="deleteFunction('', <?=$data[$j][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
								
								</div>
								<div class="sortable-heading"><strong><i class="fa fa-arrows-v"></i><img src="<?=$imgPhoto?>" style="float:left;margin-right:10px;height:100px;"> <?=unFormatData($data[$j][1])?> By <?=unFormatData($data[$j][9])?> </strong><br>
								<div style="max-width:600px;"><?=unFormatData(substrBYwords($data[$j][2],20))?>..</div>
								
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
        
        
  		</section>      </div>

<?
include "_inc_footer.php";
include "_inc_crop_img.php";
include "_inc_img_viewer.php";



?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {
        CKEDITOR.replace('contents', {
        	toolbar: [[ 'Bold', 'Italic','Underline','Strike', '-','NumberedList','BulletedList','-','Blockquote',
		'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-', 'Link','Unlink','FontSize','TextColor']]
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