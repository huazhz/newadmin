<?
include "_inc_session.php";
$_ACTIVE['settings'] = $_ACTIVE['settings_cseo'] = 'active';
include "_inc_top.php";
if ($_POST['urlKey'] != '')
{
	$_POST['urlKey'] = str_replace($sitePath,'',$_POST['urlKey']);
	if ($_POST['id']  > 0)
	{
		updateRecord('exceed_custom_seo', $_POST, 'id='.$_POST['id']);
		$smsg = mysql_affected_rows ();
	}
	else
	{
		$smsg = addRecord('exceed_custom_seo', $_POST);
	
	}
}
?>
<!-- Modal -->
                            <div class="modal fade" id="adminsform" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form method="post" role="form"  enctype="multipart/form-data" onsubmit="return checkFrm(this)">
                                <input name="id" type="hidden" class="form-control">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
											 <div class="row">
				                                <div class="col-xs-12 col-md-12">
				                                	<div class="form-group"  id="urlKey">
								                    	<label>Page URL</label>
									                    <div class="input-group">
										                    <span class="input-group-addon"><?=$sitePath?></span>
										                    <input type="text" id="urlKeyxxx" name="urlKey"  class="form-control page-selector"  placeholder="URL of page you want to custom meta tags for">
									                  	</div>
								                  	</div>
				                                </div>
				                                
				                                 <div class="col-xs-12 col-md-12" id="file-upload-fold">
				                                	<div class="form-group">
								                      <label>Meta Tag Title</label>
								                      <input type="text" class="form-control" name="seo_title"  value="<?=unFormatData($mypage[9])?>">
								                    </div>
								                    <div class="form-group">
								                      <label>Meta Tag Description</label>
								                      <textarea class="form-control" rows="2" name="seo_desc"><?=unFormatData($mypage[11])?></textarea>
								                    </div>
								                    <div class="form-group">
								                      <label>Meta Tag Keywords</label>
								                      <textarea class="form-control" rows="2" name="seo_keywords"><?=unFormatData($mypage[10])?></textarea>
								                    </div>
				                                </div>
				                                				                                
				                            </div>
									
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
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
                		<a href="javascript:;" onclick="return addForm('adminsform', 'Add Custom Meta Tags');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success" style="float:right;"><i class="fa fa-plus fa-x1"></i> Add Custom Meta Tags</a>

          <h1>
            Custom SEO Settings
            <small>Custom Meta Tags to any page of your website, just copy page url.</small>
          </h1>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                <?
                if ($smsg > 0)
                {
                ?>
                <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Data has beed saved!
                            </div>
                <?
                }
                ?>
			    <div class="box">
                
                <div class="box-body  table-responsive">
                  <table id="data-tbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Page URL</th>
                        <th>Meta Title</th>
                        <th width="190"> </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?
                                    $trClass = array('odd', 'even');
                                    
                                    $data = getAllData('exceed_custom_seo', '1 order by id desc');
                                    for ($i = 0; $i < sizeof($data); $i++)
                                    {
                                    $delCond = 'delete from exceed_custom_seo where id='.$data[$i][0];
                                    ?>
                                         <tr id="data<?=$data[$i][0]?>" class="<?=($i%2)?>">
                                            <td><a href="<?=$sitePath?><?=$data[$i][1]?>" target="_blank"><?=$sitePath?><?=$data[$i][1]?></a></td>
                                            <td><?=unFormatData($data[$i][2])?></td>
                                            <td style="text-align:right;">
                                            <a href="javascript:;" onclick="return editForm('adminsform', 'Edit Meta Tags','exceed_custom_seo', <?=$data[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                                        		<a href="javascript:;" onclick="deleteFunction('data', <?=$data[$i][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
                                            </td>
                                        </tr>
                                	<?
                                	}
                                	?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>          
  
                </div>
            </div>
        </section>
        
      </div>
<?
include "_inc_footer.php";
include "_inc_page_selector_list.php";

?>
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 	<script>
    $(document).ready(function() {
    	var aoColumns = [
        null,
        null,
	        { "bSortable": false }
	    ];
	    $('#data-tbl').dataTable({"aoColumns": aoColumns});;
    });


	function checkFrm(frm)
	{
		if (frm.urlKey.value == '')
		{
			$('#urlKey').addClass('has-error');
			$('input', $('#urlKey')).focus();
			return false;
		}
		else
		{
			return true;
		}
	}
</script>

</body>
</html>    