<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['widget_banners'] = 'active';
include "_inc_top.php";

if (sizeof($_POST) > 0)
{

	$addObj['title'] = formatData($_POST['title']);	
	
	$addObj['section'] = 'innerbanners';	

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
		
		corp_img($targetFileName,$photoFileName ,1680,300, $_FILES['photo']['name']);
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
				                                <div class="col-xs-12 col-md-8">
				                                	<div class="form-group">
                                           			 <label>Title </label>
                                            			<input name="title" class="form-control">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Photo <small>(1680 x 300)</small></label>
                                            			<input type="file" name="photo">
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
            Inner Page Banners
            <small>Manage all inner page banners.</small>
          </h1>
        </section>
      <section class="content">
      
          
          
        <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                 <div class="box-header with-border">
                  <h3 class="box-title">Banners</h3>
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
                         $photos = getAllData('exceed_photos', "`section`='innerbanners' order by `order`");
                         for ($i = 0; $i < sizeof($photos); $i++)
                         {
                         $delCond = 'delete from `exceed_photos` where id='.$photos[$i][0];
                         ?>
                         <div class="col-xs-12 col-md-4 col-lg-4 <?=$activeStatus[$photos[$i][11]]?>" id="<?=$photos[$i][0]?>" >
						    <li class=" panel panel-default " >
						    	<div class="sortable-heading panel-body" style="position:relative;min-height:120px;background:url(../<?=$photos[$i][3]?>) center center  no-repeat;background-size:cover">
						    <span style="display:inline-block;padding:10px;background:rgba(255,255,255,0.8);"><?=$photos[$i][1]?></span>
						    	
						    </div>
						    <div class="panel-footer">
						    		<a href="javascript:;" onclick="return cropImg('cropImg','../<?=$photos[$i][5]?>','../<?=$photos[$i][3]?>', '0|0|350|60','1680x300');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i data-toggle="tooltip" title="Crop Image"  class="fa fa-crop fa-fw"></i></a>
						    		<a href="javascript:;"  onclick="return editForm('adminsform', 'Edit Photo','exceed_photos', <?=$photos[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i data-toggle="tooltip" title="Edit" class="fa fa-pencil fa-fw"></i></a>
                                <a href="javascript:;" data-toggle="tooltip" title="<?=$statusTitle[$photos[$i][11]]?>"  onclick="swapStatus(<?=$photos[$i][0]?>, 'exceed_photos', $(this));" class="btn btn-sm   btn-info"><i class="fa fa-<?=$statusIcon[$photos[$i][11]]?> fa-fw"></i> </a>
                                	<a href="javascript:;" data-toggle="tooltip" title="Delete Banner"  onclick="deleteFunction('', <?=$photos[$i][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm   btn-danger"><i class="fa fa-trash fa-fw"></i> </a>
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
        
        
  		</section>      </div>

<?
include "_inc_footer.php";
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