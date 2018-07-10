<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_vides'] = 'active';

include "_inc_top.php";
if ($_POST['save-image']==1)
{
	$addObj['title'] = formatData($_POST['title']);
	$addObj['description'] = formatData($_POST['description']);
	$addObj['order'] = getDefaultOrder('exceed_photos');
		
	$addObj['sectionEID'] = $_POST['gID'];

	
	if ($_POST['id'] > 0)
	{
		updateRecord('exceed_photos', $addObj, "id=".$_POST['id']);
		$photoID = $_POST['id'];
	}
	else
	{
		$addObj['section'] = 'videos';
		$photoID = addRecord('exceed_photos', $addObj);
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
                                           			 <label>YouTube URL </label>
                                            			<input name="description" class="form-control">
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
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Video');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Video</a>
          <h1>
            Video Gallery
            <small>Manage videos inside this galler (<?=unFormatData($data[1])?>)!</small>
          </h1>
        </section>
      <section class="content">
        
            
        <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                <div class="box-body">
                  
                  <div class="row">
                        <?
                        
                        $activeStatus[0] = 'inactive-record';
                        $statusTitle = array('Show', 'Hide');
                        $statusIcon = array('eye', 'eye-slash');
                        
                        ?>
                         <ul class="sortable-list list-unstyled">
                         <?
                         $photos = getAllData('exceed_photos', "sectionEID=".$data[0]." and `section`='videos' order by `order`");
                         for ($i = 0; $i < sizeof($photos); $i++)
                         {
                         $delCond = 'delete from `exceed_photos` where id ='.$photos[$i][0];

                         $youtubID = getYoutubeIDfromURL($photos[$i][2]);
                         $photo = 'https://i.ytimg.com/vi/'.$youtubID.'/mqdefault.jpg';
                         ?>
                         <div class="col-xs-12 col-md-4 col-lg-4 <?=$activeStatus[$photos[$i][11]]?>" id="<?=$photos[$i][0]?>">
						    <li class=" panel panel-default " >
						    	<div class="sortable-heading panel-body" style="min-height:150px;background:url(<?=$photo?>) center top no-repeat;background-size:contain"></div>
						    <div class="panel-footer">
						    		<a href="javascript:;" onclick="return playVid('https://www.youtube.com/embed/<?=$youtubID?>');" data-toggle="modal" data-target="#playVid" class="btn btn-sm btn-success"><i class="fa fa-play fa-fw"></i> Play Video</a>
						    		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Video','exceed_photos', <?=$photos[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
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
include "inc_video_player.php";

?>
<script type="text/javascript">

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