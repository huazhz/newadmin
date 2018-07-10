<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_vides'] = 'active';

include "_inc_top.php";
if (sizeof($_POST) > 0)
{

	$addObj['title'] = formatData($_POST['title']);
	$addObj['description'] = formatData($_POST['description']);
	$addObj['type'] = 'videos';
	
	if ($_POST['id'] > 0)
		{
			updateRecord('exceed_gallery_cats', $addObj, 'id='.$_POST['id']);
			$pageID = $_POST['id'];
			$saved = mysql_affected_rows ();
		}
		else if ($_POST['title'] != '')
		{
			$addObj['status'] = 1;
			$addObj['order'] = getDefaultOrder('exceed_gallery_cats');
			$saved = addRecord('exceed_gallery_cats', $addObj);
			$pageID = $saved ;
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
                                           			 <label>Description</label>
                                           			 	<textarea name="description" id="description" rows="3" class="form-control"></textarea>
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
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Gallery');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Gallery</a>
          <h1>
            Video Galleries
            <small>Manage video galleries, after you create the gallery you can add youtube videos to that gallery.</small>
          </h1>
        </section>
      <section class="content">
         
        <div class="row">
                <div class="col-lg-12">
			    
                  <?
						        $activeStatus[0] = 'inactive-record';
		                        $statusTitle = array('Show', 'Hide');
		                        $statusIcon = array('eye', 'eye-slash');
                        
						        $data = getAllData('exceed_gallery_cats', 'type="videos" order by `order`');
						        if (sizeof($data) > 0)
						        {
						        ?>
						        <ul class="list-unstyled sortable-list">
						        <?
						        for ($j = 0; $j < sizeof($data); $j++)
						        {
 								$delCond = 'delete from `exceed_gallery_cats` where id='.$data[$j][0];
						        ?>
						        
						        	<li class="<?=$activeStatus[$data[$j][3]]?> box box-info"  style="padding:10px;min-height:130px;height:auto;" id="<?=$data[$j][0]?>">
						        <div class="pull-right">
						            <a href="_app_videos_list.php?id=<?=$data[$j][0];?>" class="btn btn-sm btn-primary"><i class="fa fa-photo fa-fw"></i> Manage Videos</a>
							 		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Gallery','exceed_gallery_cats', <?=$data[$j][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_gallery_cats', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][3]]?> fa-fw"></i> <?=$statusTitle[$data[$j][3]]?></a>
								
                                	<a href="javascript:;" onclick="deleteFunction('', <?=$data[$j][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
								
								</div>
									<div class="sortable-heading"><strong><i class="fa fa-arrows-v"></i><img src="<?=$imgPhoto?>" style="float:left;margin-right:10px;height:100px;"> <?=unFormatData($data[$j][1])?></strong><br>
								<div style="max-width:600px;"><?=unFormatData(substrBYwords($data[$j][4],20))?>..</div>
								
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
?>
<script type="text/javascript">
      $(document).ready(function() {
        $('.sortable-list').sortable({
            handle: '.sortable-heading', 
            update: function(event, ui) {
                 	var newOrder = $(this).sortable('toArray').toString();
           			$.get('_saveorder_ajax.php', {tbl: 'exceed_gallery_cats',order:newOrder});
            }
        });
    });
      
     
</script>      
 
</body>
</html>    