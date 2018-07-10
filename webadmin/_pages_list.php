<?
include "_inc_session.php";
$navDetails = getDetails('exceed_navigation', "url='".$_GET['nav']."'"); 
if ($navDetails[0] < 0) exit();
$_ACTIVE['pages'] = $_ACTIVE['pages_'.$navDetails[0]] = 'active';
include "_inc_top.php";

if ($customPageLable[$navDetails[0]] == '') $customPageLable[$navDetails[0]] = 'Page';


?>
<div class="content-wrapper">
        <section class="content-header">
        <a href="_pages_frm.php?nav=<?=$_GET['nav']?>"  class="btn btn-success" style="float:right;"><i class="fa fa-plus fa-x1"></i> Add New <?=$customPageLable[$navDetails[0]]?></a>
          <h1>
            <?=$navDetails[1]?>
            <small>Add unlimited pages under this navigation</small>
          </h1>
        </section>
        <section class="content">
        <div class="row">
                <div class="col-lg-12">
                <?
                //if ($navDetails[0] == 3 or $navDetails[0] == 2)
               // include "_pages_inc_nav_settings.php";
                ?>
			    <div class="box">
                <div class="box-body">
                  <?
						        $activeStatus[0] = 'inactive-record';
		                        $statusTitle = array('Show', 'Hide');
		                        $statusIcon = array('eye', 'eye-slash');
                        		
						        $data = getAllData('exceed_pages', 'navigation='.$navDetails[0].' order by `order`');
						        if (sizeof($data) > 0)
						        {
						        ?>
						        <ul class="list-unstyled sortable-list">
						        <?
						        for ($j = 0; $j < sizeof($data); $j++)
						        {
						        $delCond = 'delete from `exceed_pages` where id='.$data[$j][0];
						        ?>
						        <li class="<?=$activeStatus[$data[$j][4]]?> box box-info"  style="padding:10px;" id="<?=$data[$j][0]?>">
						        <div class="pull-right">
						        	<a href="_copy_record.php?data=<?=encodeRequest('_pages_list.php?nav='.$_GET['nav'].'|exceed_pages|'.$data[$j][0])?>" onclick="return confirm('are you sure to duplicate this page?');"class="btn btn-sm   btn-primary"><i class="fa fa-copy fa-fw"></i> Duplicate</a>
							 		
							 		
							 		
							 		<a href="_pages_frm.php?nav=<?=$_GET['nav']?>&id=<?=$data[$j][0]?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_pages', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][4]]?> fa-fw"></i> <?=$statusTitle[$data[$j][4]]?></a>
                                	<a href="javascript:;" onclick="deleteFunction('', <?=$data[$j][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
								</div>
								<div class="sortable-heading"><strong><i class="fa fa-arrows-v"></i> <?=unFormatData($data[$j][1])?></strong>
									<br><small><a href="<?=$sitePath?><?=$data[$j][3]?>" target="_blank"><?=$sitePath?><?=$data[$j][3]?></a></small>
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
        
        
  		</section>
</div>
<script>
</script>      
<?
include "_inc_footer.php";
echo $customEditorsHere;
?>
 	<script>
    $(document).ready(function() {
        $('.sortable-list').sortable({
            handle: '.sortable-heading', 
            update: function(event, ui) {
                 	var newOrder = $(this).sortable('toArray').toString();
           			$.get('_saveorder_ajax.php', {tbl: 'exceed_pages',order:newOrder});
            }
        });
    });
    </script>

</body>
</html>            