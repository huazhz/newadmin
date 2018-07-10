<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_forms'] = 'active';

include "_inc_top.php";

//mysql_query("UPDATE exceed_pages SET `locked`=1 WHERE id in (55, 164)");

?>

      <div class="content-wrapper">
        <section class="content-header">
               	<a href="_app_form.php"  style="float:right;" class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Form</a>
          <h1>
            Form Entries
            <small>Check all form entries.</small>
          </h1>
        </section>
      <section class="content">
         
          <div class="row">
                <div class="col-lg-12">
			    
                  <?
						        $activeStatus[0] = 'inactive-record';
		                        $statusTitle = array('Show', 'Hide');
		                        $statusIcon = array('eye', 'eye-slash');
                        
						        $data = getAllData('exceed_pages', '`locked`=1 and navigation=10007 order by `order` desc');
						        if (sizeof($data) > 0)
						        {
						        
						        ?>
						        <ul class="list-unstyled">
						        <?
						        for ($j = 0; $j < sizeof($data); $j++)
						        {
						        ?>
						        
						        <li class="<?=$activeStatus[$data[$j][3]]?> box box-danger"  style="padding:10px;" id="<?=$data[$j][0]?>">
						        	<div class="pull-right">
						            <a href="_app_entries.php?id=<?=$data[$j][0];?>" class="btn btn-sm btn-success"><i class="fa fa-file fa-fw"></i> From Entries</a>
									<a href="_app_form.php?id=<?=$data[$j][0];?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>

									</div>
									<div><strong><?=unFormatData($data[$j][1])?></strong></div>
								
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
         
        <div class="row">
                <div class="col-lg-12">
			    
                  <?
                        
						        $data = getAllData('exceed_pages', '`locked`=0 and navigation=10007 order by `order` desc');
						        if (sizeof($data) > 0)
						        {
						        
						        ?>
						        <ul class="list-unstyled">
						        <?
						        for ($j = 0; $j < sizeof($data); $j++)
						        {
 $delCond = 'delete from `exceed_pages` where id='.$data[$j][0];
						        ?>
						        
						        	<li class="<?=$activeStatus[$data[$j][3]]?> box box-info"  style="padding:10px;" id="<?=$data[$j][0]?>">
						        <div class="pull-right">
						            <a href="_app_entries.php?id=<?=$data[$j][0];?>" class="btn btn-sm btn-success"><i class="fa fa-file fa-fw"></i> From Entries</a>
								    <a href="_copy_record.php?data=<?=encodeRequest('_app_forms.php|exceed_pages|'.$data[$j][0])?>" onclick="return confirm('are you sure to duplicate this form?');"class="btn btn-sm   btn-primary"><i class="fa fa-copy fa-fw"></i> Duplicate</a>
								    <a href="_app_form.php?id=<?=$data[$j][0];?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                                	<a href="javascript:;" onclick="deleteFunction('', <?=$data[$j][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>

								</div>
									<div><strong><?=unFormatData($data[$j][1])?></strong></div>
								
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
        
        
  		</section>      </div>

<?
include "_inc_footer.php";
?>
    
 
</body>
</html>    