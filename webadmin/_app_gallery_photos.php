<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_photos'] = 'active';

include "_inc_top.php";




if ($_POST['save-image']==1)
{
	if ($_POST['id'] > 0)
	{
		$addObj['title'] = formatData($_POST['title']);
		updateRecord('exceed_photos', $addObj, "id=".$_POST['id']);
	}
	
	for ($j=0; $j < sizeof($_FILES['photo']['name']); $j++)
	{

		$addObj['title'] = formatData($_POST['title']);
		
		$addObj['section'] = 'gallery';	
		$addObj['sectionEID'] = $_POST['gID'];
	
		if ($_FILES['photo']['tmp_name'][$j] != '')
		{
			$addObj['photourl'] = "uploads/".md5(time())."_".$j.".jpg";
			$addObj['orginalurl'] = str_replace('.jpg', '_orginal.jpg', $addObj['photourl']);
			$addObj['thumburl'] = str_replace('.jpg', '_thumb.jpg', $addObj['photourl']);

			if ($_POST['id'] > 0)
			{
				$oldphotoa = getDetails('exceed_photos', 'id='.$_POST['id']);
				@unlink('../'.$oldphotoa[3]);
				@unlink('../'.$oldphotoa[4]);
				@unlink('../'.$oldphotoa[5]);
				
			}
			
			$targetFileName = '../'.$addObj['orginalurl'];
			$photoFileName = '../'.$addObj['photourl'];
			$thumbFileName = '../'.$addObj['thumburl'];
			
			move_uploaded_file($_FILES['photo']['tmp_name'][$j],$targetFileName);
			corp_img($targetFileName,$photoFileName ,800,600, $_FILES['photo']['name'][$j]);
			corp_img($targetFileName,$thumbFileName ,400,300, $_FILES['photo']['name'][$j]);
		
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
		
		}
	}
}
$data = getDetails('exceed_gallery_cats','id='.$_GET['id']);
?>
					<!-- Modal -->
                            <div class="modal fade" id="adminsform" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form method="post" role="form"  enctype="multipart/form-data">
                                <input name="id" type="hidden" class="form-control">
                                <input name="gID" type="hidden" value="<?=$data[0];?>">
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
                                           			 <label>Photo (s)</label>
                                            			<input type="file" name="photo[]" multiple>
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
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Photo');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Photo</a>
          <h1>
            Photo Gallery > <?=getTitle('exceed_gallery_cats', 'title', 'id='.$_GET['id'])?>
            <small>Manage photos!</small>
          </h1>
        </section>
      <section class="content">

        <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                 <div class="box-header with-border">
                  <h3 class="box-title">Photos</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  
                  <div class="row">
                        <?
                        
                        $activeStatus[0] = 'inactive-record';
                        $statusTitle = array('Show', 'Hide');
                        $statusIcon = array('eye', 'eye-slash');
                        
                        ?>
                         <ul class="sortable-list list-unstyled">
                         <?
                         $photos = getAllData('exceed_photos', "sectionEID=".$data[0]." and `section`='gallery' order by `order`");
                         for ($i = 0; $i < sizeof($photos); $i++)
                         {
                         $delCond = 'delete from `exceed_photos` where id='.$photos[$i][0];
                         ?>
                         <div class="col-xs-12 col-md-4 col-lg-3 <?=$activeStatus[$photos[$i][11]]?>" id="<?=$photos[$i][0]?>">
						    <li class=" panel panel-default " >
						    	<div class="sortable-heading panel-body" style="min-height:150px;background:url(../<?=$photos[$i][3]?>) center top no-repeat;background-size:contain"></div>
						    <div class="panel-footer">
						    		<a href="javascript:;" onclick="return cropImg('cropImg','../<?=$photos[$i][5]?>','../<?=$photos[$i][3]?>', '0|0|100|100','800x600');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop</a>
						    		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Photo','exceed_photos', <?=$photos[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
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
            </div>
    </section>      
  </div>

<?
include "_inc_footer.php";
include "_inc_crop_img.php";
include "_inc_img_viewer.php";

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