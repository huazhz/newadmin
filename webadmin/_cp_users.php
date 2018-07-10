<?
include "_inc_session.php";
$_ACTIVE['cp'] = $_ACTIVE['cp_users'] = 'active';
include "_inc_top.php";
$statusArr = array('In-Active', 'Active');

if ($_POST['email'] != '')
{
	$_POST['password'] = encodeRequest($_POST['password']);
	if ($_POST['id']  > 0)
	{
		updateRecord('exceed_admins', $_POST, 'id='.$_POST['id']);
		$smsg = mysql_affected_rows ();
	}
	else
	{
		$_POST['createddate'] = time();
		$smsg = addRecord('exceed_admins', $_POST);
	
	}
}
?>
                            <div class="modal fade" id="adminsform" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form method="post" role="form">
                                <input name="id" type="hidden" class="form-control">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">
											 <div class="row">
				                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>Email Address</label>
                                            			<input name="email" class="form-control">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-6">
				                                 <div class="form-group">
                                            		<label>Password</label>
                                            		<input name="password" type="password" class="form-control">
                                        			</div>
				                                </div>
				                                
				                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>Display Name</label>
                                            			<input name="fname" class="form-control">
                                        			</div>
				                                </div>				                                
				                                <div class="col-xs-12 col-md-6">
				                                 <div class="form-group">
                                            		<label>Status</label>
                                            		 <div class="radio">
                                            		<?
                                            		for ($i=0; $i < sizeof($statusArr); $i++)
                                            		{
                                            		?>
                                            		<label class="radio-inline">
                                            			<input type="radio" name="status" id="status<?=$i?>" value="<?=$i?>"> <?=$statusArr[$i]?>
                                            		</label>
                                            		<?
                                            		}
                                            		?>
                                            		</div>
                                              
                                            		
                                            		
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
        		<a href="javascript:;" onclick="return addForm('adminsform', 'Add New User');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success" style="float:right;"><i class="fa fa-plus fa-x1"></i> Add New User</a>
          <h1>
           Webadmin Users
            <small>Manage users who can manage Wale Website</small>
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
                                User has been saved!
                            </div>
                <?
                }
                ?>
			    <div class="box">
               
                <div class="box-body  table-responsive">
                  <table id="data-tbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>User</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?
                                    $trClass = array('odd', 'even');
                                    $data = getAllData('exceed_admins', 'id > 1 order by fname');
                                    for ($i = 0; $i < sizeof($data); $i++)
                                    {
                                    $delCond = 'delete from exceed_admins where id > 1 and id='.$data[$i][0];
                                    ?>
                                         <tr id="user<?=$data[$i][0]?>" class="<?=($i%2)?>">
                                            <td><b><?=$data[$i][1]?></b><br><?=$data[$i][2]?></td>
                                            <td><?=$statusArr[$data[$i][5]]?></td>
                                            <td><?if ($data[$i][7] > 0) echo date("m/d/Y h:i A", $data[$i][7]);else echo 'never logged in';?></td>
                                            <td style="text-align:right;">
                                            <a href="javascript:;"  data-toggle="modal" data-target="#permissions" class="btn btn-sm btn-primary"><i class="fa fa-user fa-fw"></i> Custom Permissions</a> 
                                            <a href="javascript:;" onclick="return editForm('adminsform', 'Edit User','exceed_admins', <?=$data[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                                        		<a href="javascript:;" onclick="deleteFunction('user', <?=$data[$i][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
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
        null,
	        { "bSortable": false }
	    ];
	    $('#data-tbl').dataTable({"aoColumns": aoColumns});;
    });
    </script>
    
  </body>
</html>    