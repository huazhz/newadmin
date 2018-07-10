<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_news'] = 'active';
include "_inc_top.php";
?>
<div class="content-wrapper">
        <section class="content-header">
        <a href="_app_news_frm.php"  class="btn btn-success" style="float:right;"><i class="fa fa-plus fa-x1"></i> Add News</a>
          <h1>
           News & Updates Center
            <small>News / Updates / Trade Shows / Conferences / Exhibitions</small>
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
                        <th width="100">Date</th> 
                        <th>Title</th>
                        <th width="250"> </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?
                                    $trClass = array('odd', 'even');
                                    $statusArr = array('In-Active', 'Active');
                                    $activeStatus[0] = 'inactive-record';
			                        $statusTitle = array('Show', 'Hide');
			                        $statusIcon = array('eye', 'eye-slash');
                                    
                                    $data = getAllData('exceed_news', '`type`=1 order by date desc');
                                    for ($i = 0; $i < sizeof($data); $i++)
                                    {
                                    $delCond = 'delete from exceed_news where id='.$data[$i][0];
                                    ?>
                                         <tr id="<?=$data[$i][0]?>" class="<?=($i%2)?> <?=$activeStatus[$data[$i][7]]?>">
                                            <td><?=date("Y-m-d", $data[$i][2])?></td>
                                            <td>
                                            <a target="_blank" href="<?=$sitePath?>news/<?=unFormatData($data[$i]['pageURL'])?>">
                                            <b><?=$data[$i][5]?></b> <?=$data[$i][1]?>
                                            </a>
                                            </td>
                                            <td style="text-align:right;">
                                            <a href="javascript:;" onclick="swapStatus(<?=$data[$i][0]?>, 'exceed_news', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$i][7]]?> fa-fw"></i> <?=$statusTitle[$data[$i][7]]?></a>
                                            <a href="_app_news_frm.php?id=<?=$data[$i][0]?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
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
	        { "bSortable": false }
	    ];
	    $('#data-tbl').dataTable({"aoColumns": aoColumns});;
    });
    </script>
</body>
</html>            