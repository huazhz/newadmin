<?
include "_inc_session.php";
$_ACTIVE['settings'] = $_ACTIVE['settings_nav'] = 'active';

include "_inc_top.php";
if (sizeof($_POST) > 0)
{
	$addObj['title'] = formatData($_POST['title']);
	$addObj['url'] = formatData($_POST['url']);
	$addObj['urlTarget'] = $_POST['urlTarget'];

	if ($_POST['id'] > 0)
	{
		updateRecord('exceed_navigation', $addObj, 'id='.$_POST['id']);
		$pageID = $_POST['id'];
		$saved = mysql_affected_rows ();
	}
	else
	{
		$addObj['status'] = 1;
		$addObj['order'] = getDefaultOrder('exceed_navigation');
		$saved = addRecord('exceed_navigation', $addObj);
		$pageID = $saved ;
	}

}

/*
$i = 1;
foreach($dpages as $k => $v)
{
	mysql_query("INSERT INTO exceed_navigation VALUES('".$i."', '".$v."', '".$i."', '1', '1', '".$k."', '_self');");
	$i++;
}

*/
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
                                           			 <label>Menu Title</label>
                                            			<input name="title" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                 
				                               
				                                <div class="col-xs-12 col-md-8">
				                                	<div class="form-group">
                                           			 <label>On Click URL</label>
                                            			<input type="text" id="url"  class="form-control page-selector" name="url">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-4">
				                                	<div class="form-group">
                                           			 <label>Target</label>
                                            			<select class="form-control" name="urlTarget">
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
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Menu Item');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Menu Item</a>
          <h1>
             Main Menu Navigation
            <small>Manage mainmen navigation links!</small>
          </h1>
        </section>
      <section class="content">
        <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                <div class="box-body">
                <ul class="list-unstyled sortable-list">
                  <?
						        $activeStatus[0] = 'inactive-record';
		                        $statusTitle = array('Show', 'Hide');
		                        $statusIcon = array('eye', 'eye-slash');
                        
						        $data = getAllData('exceed_navigation', '1 order by `order`');
						        if (sizeof($data) > 0)
						        {

						        for ($j = 0; $j < sizeof($data); $j++)
						        {
						        $delCond = 'delete from `exceed_navigation` where id='.$data[$j][0];
						        ?>
						         	<li class="<?=$activeStatus[$data[$j][4]]?> box box-info"  style="padding:10px;" id="<?=$data[$j][0]?>">
						        <div class="pull-right">
						    		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Alert','exceed_navigation', <?=$data[$j][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_navigation', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][4]]?> fa-fw"></i> <?=$statusTitle[$data[$j][4]]?></a>
								<?
								if ($data[$j][3] == 0)
								{
								?>
									<a href="javascript:;" onclick="deleteFunction('', <?=$data[$j][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
								<?
								}
								?>
								</div>
								
								<div class="sortable-heading"><strong><i class="fa fa-arrows-v"></i> <?=unFormatData($data[$j][1])?></strong>
								
								</div>
						        </li>
						        <?
						        }

						        }
						        ?>

                  </ul>
                </div>
              </div>          
  
                </div>
            </div>
        
        
  		</section>      </div>

<?
include "_inc_footer.php";
include "_inc_page_selector_list.php";

?>
<script type="text/javascript">
$(document).ready(function() {
        $('.sortable-list').sortable({
            handle: '.sortable-heading', 
            update: function(event, ui) {
                 	var newOrder = $(this).sortable('toArray').toString();
           			$.get('_saveorder_ajax.php', {tbl: 'exceed_navigation',order:newOrder});
            }
        });
    });
	
</script>
    
 
</body>
</html>    