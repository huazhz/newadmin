<?
include "_inc_session.php";
$_ACTIVE['settings'] = $_ACTIVE['settings_curl'] = 'active';

include "_inc_top.php";
if (sizeof($_POST) > 0)
{
		$addObj['title'] = formatData($_POST['title']);
		$addObj['url'] = formatData($_POST['url']);
		
		if ($_POST['id'] > 0)
		{
			updateRecord('exceed_pages', $addObj, 'id='.$_POST['id']);
			$pageID = $_POST['id'];
			$saved = mysql_affected_rows ();
		}
		else if ($_POST['title'] != '')
		{
			$addObj['order'] = getDefaultOrder('exceed_pages');
			$addObj['navigation'] = 777;
			$addObj['pageURL'] = 'redirecurl'.time();
			$saved = addRecord('exceed_pages', $addObj);
			$pageID = $saved ;
		}
}
?>
					<!-- Modal -->
                            <div class="modal fade" id="adminsform" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form method="post" role="form"  enctype="multipart/form-data">
                                <input name="id" type="hidden"  class="form-control">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Modal title</h4>
                                        </div>
                                        <div class="modal-body">

											  <div class="form-group">
							                    	<label>Custom Short URL </label>
								                    <div class="input-group">
									                    <span class="input-group-addon"><?=$sitePath?></span>
									                    <input type="text" name="title" class="form-control">
								                  	</div>
							                  	</div>
											 <div class="form-group">
							                    	<label>Redirect This Short URL to .. </label>
									                    
									                    <input type="text" name="url" placeholder="http://..." class="form-control">
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
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Custom Short URL');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Custom Short URL</a>
          <h1>
            Custom Short URL
            <small>Create short url and point it to specific page </small>
          </h1>
        </section>
      <section class="content">
         <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                 
                <div class="box-body  table-responsive">
                    <?
                if ($saved > 0)
                {
                ?>
                			<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                url has been saved!
                            </div>
                <?
                }
                ?>  
                  <table id="data-tbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>URL</th>
                        <th>Target</th>
                        <th width="190"> </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?
                                    $trClass = array('odd', 'even');
                                    
                                     $data = getAllData('exceed_pages', 'navigation=777 order by `order`');
                                    for ($i = 0; $i < sizeof($data); $i++)
                                    {

                                    
                                    $delCond = 'delete from exceed_pages where id='.$data[$i][0];
                                    ?>
                                         <tr id="<?=$data[$i][0]?>" class="<?=($i%2)?>">
                                            <td><a href="<?=$sitePath?><?=$data[$i][1]?>" target="_blank"><?=$sitePath?><?=$data[$i][1]?></a></td>
                                            <td><a href="<?=$data[$i]['url']?>" target="_blank"><?=$data[$i]['url']?></a></td>

                                            <td style="text-align:right;">
													<a href="javascript:;" onclick="return editForm('adminsform', 'Edit URL','exceed_pages', <?=$data[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                                					<a href="javascript:;" onclick="deleteFunction('', <?=$data[$i][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
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
        
        
  		</section>      </div>

<?
include "_inc_footer.php";
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
        $('#data-tbl').dataTable({"aoColumns": aoColumns});
    });

    </script>

 
</body>
</html>    