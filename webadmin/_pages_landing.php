<?
include "_inc_session.php";
$_ACTIVE['pages'] = $_ACTIVE['pages_landing'] = 'active';
include "_inc_top.php";
?>
<div class="content-wrapper">
        <section class="content-header">
        <a href="_pages_landing_frm.php"  class="btn btn-success" style="float:right;"><i class="fa fa-plus fa-x1"></i> Add New Page</a>
          <h1>
            Landing Pages
            <small>You can create landing page and use it by page's URL</small>
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
                        <th width="200">Page Title</th>
                        <th>URL</th>
                        <th width="100">Status</th>
                        <th width="180"> </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?
                                    $trClass = array('odd', 'even');
                                    $statusArr = $statusTitle = array('In-Active', 'Active');
                                    $activeStatus[0] = 'inactive-record';
			                       // $statusTitle = array('Show', 'Hide');
			                        $statusIcon = array('eye', 'eye-slash');
                                    
                                    $data = getAllData('exceed_pages', 'navigation=-1 order by id desc');
                                    for ($i = 0; $i < sizeof($data); $i++)
                                    {
                                    $delCond = 'delete from exceed_pages where locked=0 and id='.$data[$i][0];
                                    ?>
                                         <tr id="page<?=$data[$i][0]?>" class="<?=($i%2)?> <?=$activeStatus[$data[$i][4]]?>">
                                            <td><?=$data[$i][1]?></td>
                                            <td>
                                            <textarea style="width:99%;cursor:copy;" onclick="this.focus();this.select()" class="form-control" rows="1" readonly="true"><?=$sitePath?><?=$data[$i][3]?></textarea>
                                            </td>
                                            <td>	<a href="javascript:;" onclick="swapPStatus(<?=$data[$i][0]?>, 'exceed_pages', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$i][4]]?> fa-fw"></i> <?=$statusTitle[$data[$i][4]]?></a></td>
                                            <td style="text-align:right;">
                                            <a href="_pages_landing_frm.php?id=<?=$data[$i][0]?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                                            <?
                                            if ($data[$i][5] != 1) //locked page
                                            {
                                            ?>
                                            	<a href="javascript:;" onclick="deleteFunction('page', <?=$data[$i][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
											<?
											}
											?>
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
	        { "bSortable": false }
	    ];
	    $('#data-tbl').dataTable({"aoColumns": aoColumns});;
    });
    function swapPStatus(id, tbl, btnObj)
	{
		$.get("_status_ajax.php", {tbl: tbl, id: id},
		function(newstatus){
		//alert(newstatus );
			if (newstatus == 1) 
			{
			$('#page'+id).removeClass('inactive-record');
			btnObj.html('<i class="fa fa-eye-slash fa-fw"></i> Active');
			}
			else 
			{
			$('#page'+id).addClass('inactive-record');
			btnObj.html('<i class="fa fa-eye fa-fw"></i> In-Active');
			}
		});
	}

    </script>

</body>
</html>            