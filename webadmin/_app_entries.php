<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_forms'] = 'active';
include "_inc_top.php";
?>
<div class="content-wrapper">
        <section class="content-header">          
          <?
          if ($_GET['id'] > 0)
          {
          ?>
          <a href="_app_form_export.php?id=<?=$_GET['id']?>"  style="float:right;" class="btn btn-success"><i class="fa fa-download fa-x1"></i> Export Entries</a>
          <?
          }
          
          
          
                  			$slctdPRN[$_GET['id']] = 'selected';
                  			?>
		                    <select class="btn" style="float:right;margin-right:10px;width:300px;" onchange="document.location.href='_app_entries.php?id='+$(this).val()">
		                    <option value="">Choose  Form</option>
		                    <?
		                    $forms = getAllData('exceed_pages', 'navigation=10007 order by `order` desc');
		                    for ($i = 0; $i < sizeof($forms); $i++)
		                    {
		                    ?>
	                        <option value="<?=$forms[$i][0]?>" <?=$slctdPRN[$forms[$i][0]]?>><?=$forms[$i][1]?></option>
	                        <?
	                        }
	                        ?>
	                       
	                      	</select>
	                      
	                      
          <h1>
           From Entries
          </h1>
        </section>
        <section class="content">
        <div class="row">
                <div class="col-lg-12">
			    <div class="box">
                <div class="box-body  table-responsive">
                  <table id="data-tbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Form</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>IP</th>
                        <th width="250"> </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?
                                    $trClass = array('odd', 'even');
                                    if ($_GET['id'] > 0)
                                    $data = getAllData('exceed_pages_forms_entries', 'pageID='.$_GET['id'].' order by `id` desc');
                                    else
                                    $data = getAllData('exceed_pages_forms_entries', '1 order by `id` desc');

                                    for ($i = 0; $i < sizeof($data); $i++)
                                    {
                                    $delCond = 'delete from exceed_pages_forms_entries where id='.$data[$i][0];
                                    ?>
                                         <tr id="<?=$data[$i][0]?>" class="<?=($i%2)?> <?=$activeStatus[$data[$i]['status']]?>">
                                            <td><?=$data[$i][0]?></td>
                                            <td><?=$pageTitle[$data[$i]['pageID']]?></td>
                                            <td><?=unFormatData($data[$i]['email'])?></td>
                                            <td><?=date("m/d/Y h:i: A", $data[$i]['postDate'])?></td>
                                            <td><?=$data[$i]['ip']?></td>
                                            <td style="text-align:right;">
                                            <a href="javascript:;" onclick="return msgShow(<?=$data[$i][0]?>)" data-toggle="modal" data-target="#msgview" class="btn btn-sm btn-warning"><i class="fa fa-envelope fa-fw"></i> View </a>
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
        
        
  		</section>
</div>

									<div class="modal fade" id="msgview" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form method="post" role="form"  enctype="multipart/form-data">
                                <input name="id" type="hidden" class="form-control">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">View Entry..</h4>
                                        </div>
                                        <div class="modal-body" id="messageBody">
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
									</form>                               
								 </div>
                            	</div>


<script>
</script>      
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
        null,
        null,
	        { "bSortable": false }
	    ];
	    $('#data-tbl').dataTable({"aoColumns": aoColumns});;
    });
    
function msgShow(msgID)
{
    $.get("_edit_ajax.php", {  getfrmEntry: msgID},
		function(data){
		$('#messageBody').html(data);
	});

}      
    </script>
</body>
</html>            