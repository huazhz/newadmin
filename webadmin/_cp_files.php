<?
include "_inc_session.php";
$_ACTIVE['cp'] = $_ACTIVE['cp_files'] = 'active';
include "_inc_top.php";
	if ($_POST['id']  > 0)
	{
		$addObj['title'] = formatData($_POST['title']);
		updateRecord('exceed_files', $addObj, 'id='.$_POST['id']);
		$smsg = mysql_affected_rows ();
	}
	else if (sizeof($_FILES['ufile']['tmp_name']) > 0)
	{

		for ($j=0; $j < sizeof($_FILES['ufile']['name']); $j++)
		{
		
			$fileName = basename($_FILES['ufile']['name'][$j]);
			$temp = explode('.', $fileName);
	
			$fileExt  = $temp[sizeof($temp)-1];
			$filePath = "../uploads/".md5($_FILES['ufile']['name'][$j]).".".$fileExt;
			$i=0;
			$tempfilePath = $filePath; 
			while (file_exists($filePath))
			{
				$filePath = str_replace('.'.$fileExt, '_'.$i.'.'.$fileExt, $tempfilePath);
				$i++;
			}
	
			$fileName = str_replace("../uploads/", '', $filePath);
			$fileObj['title'] = formatData($_FILES['ufile']['name'][$j]);
			$fileObj['file'] = $fileName;
			$fileObj['type'] = $fileExt ;
			
			move_uploaded_file($_FILES['ufile']['tmp_name'][$j],"$filePath");
			$smsg = addRecord('exceed_files', $fileObj);
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
				                                 <div class="col-xs-12 col-md-12" id="file-upload-fold">
				                                	<div class="form-group">
                                           			 <label>Select File </label>
                                            			<input type="file" name="ufile[]" multiple>
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
        		<a href="javascript:;" onclick="return addFile();" data-toggle="modal" data-target="#adminsform"  class="btn btn-success" style="float:right;"><i class="fa fa-plus fa-x1"></i> Upload New File</a>
          <h1>
            Upload Center
            <small>You can upload your files and use it by copying file's URL</small>
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
                                File has beed saved!
                            </div>
                <?
                }
                ?>
			    <div class="box">
                
                <div class="box-body  table-responsive">
                  <table id="data-tbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="40">Type</th>
                        <th width="220">File Name</th>
                        <th>URL</th>
                        <th width="190"> </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?
                                    $trClass = array('odd', 'even');
                                    
                                    $data = getAllData('exceed_files', '1 order by id desc');
                                    for ($i = 0; $i < sizeof($data); $i++)
                                    {
                                    $extIcon = 'exts/'.$data[$i][3].'.png';
									if (!file_exists($extIcon )) $extIcon= 'exts/file.png';

                                    
                                    $delCond = 'delete from exceed_files where id='.$data[$i][0];
                                    ?>
                                         <tr id="file<?=$data[$i][0]?>" class="<?=($i%2)?>">
                                            <td><img src="<?=$extIcon?>" border="0"></td>
                                            <td><?=$data[$i][1]?></td>
                                            <td>
                                            <textarea style="width:99%;cursor:copy;" onclick="this.focus();this.select()" class="form-control" rows="1" readonly="true"><?=$sitePath?>uploads/<?=$data[$i][2]?></textarea>
                                            </td>
                                            <td style="text-align:right;">
                                        		<a href="javascript:;" onclick="deleteFile(<?=$data[$i][0]?>, '<?=encodeRequest($delCond)?>', '../uploads/<?=$data[$i][2]?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
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
?>
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

 	<script>
    $(document).ready(function() {
    
    	var aoColumns = [
        null,
        null,
	        { "bSortable": false },
	        { "bSortable": false }
	    ];
        $('#data-tbl').dataTable({"aoColumns": aoColumns});
    });
    
    
    function editFile(id)
    {
	    $('#file-upload-fold').hide();
	    editForm('adminsform', 'Edit File','exceed_files', id);
    }
    
    function addFile()
    {
	    $('#file-upload-fold').show();
	    addForm('adminsform', 'Upload New File')
    }
    
    
    </script>
    
  </body>
</html>        
