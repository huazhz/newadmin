<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_faq'] = 'active';

include "_inc_top.php";

if (sizeof($_POST) > 0)
{
		$addObj['question'] = formatData($_POST['question']);
		$addObj['answer'] = formatData($_POST['answer']);
	
		if ($_POST['id'] > 0)
		{
			updateRecord('exceed_apps_faq', $addObj, 'id='.$_POST['id']);
			$pageID = $_POST['id'];
			$saved = mysql_affected_rows ();
		}
		else if ($_POST['question'] != '')
		{
			$addObj['order'] = getDefaultOrder('exceed_apps_faq');
			$addObj['status'] = 1;
			$saved = addRecord('exceed_apps_faq', $addObj);
			$pageID = $saved ;
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
				                                <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Question </label>
                                            			<input name="question" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                               
				                                
				                                 <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Answer</label>
                                           			 	<textarea name="answer" data-ckeditor="1" id="answer" rows="3" class="form-control"></textarea>
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
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Question');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Question</a>
          <h1>
            Frequently Asked Questions (FAQ)
          </h1>
        </section>
      <section class="content">
       
        <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                <div class="box-body">
                  <?
						        $activeStatus[0] = 'inactive-record';
		                        $statusTitle = array('Show', 'Hide');
		                        $statusIcon = array('eye', 'eye-slash');
                        
						        $data = getAllData('exceed_apps_faq', '1 order by `order`');
						        if (sizeof($data) > 0)
						        {
						        ?>
						        <ul class="list-unstyled sortable-list">
						        <?
						        for ($j = 0; $j < sizeof($data); $j++)
						        {
						        $delCond = 'delete from `exceed_apps_faq` where id='.$data[$j][0];
						        ?>
						        <li class="<?=$activeStatus[$data[$j][3]]?> box box-info"  style="padding:10px;" id="<?=$data[$j][0]?>">
						        <div class="pull-right">
							 		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Question','exceed_apps_faq', <?=$data[$j][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_apps_faq', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][3]]?> fa-fw"></i> <?=$statusTitle[$data[$j][3]]?></a>
								
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
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {
        CKEDITOR.replace('answer', {
        	toolbar: [[ 'Bold', 'Italic','Underline','Strike', '-','NumberedList','BulletedList','-','Blockquote',
		'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-', 'Link','Unlink','FontSize','TextColor']]
        });
      });
      
      $(document).ready(function() {
        $('.sortable-list').sortable({
            handle: '.sortable-heading', 
            update: function(event, ui) {
                 	var newOrder = $(this).sortable('toArray').toString();
           			$.get('_saveorder_ajax.php', {tbl: 'exceed_apps_faq',order:newOrder});
            }
        });
    });
      
     
</script>      
 
</body>
</html>    