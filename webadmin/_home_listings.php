<?
include "_inc_session.php";
$_ACTIVE['home'] = $_ACTIVE['home_listings'] = 'active';
$customHeader = '<link href="plugins/select2/select2.css" rel="stylesheet" type="text/css" />';

include "_inc_top.php";
if (sizeof($_POST) > 0)
{
		$addObj['title'] = formatData($_POST['title']);
		$addObj['seo_title'] = formatData($_POST['seo_title']); 
			$addObj['contents'] = $_POST['contents1'].','.$_POST['contents2'].','.$_POST['contents3'].','.$_POST['contents4'].','.$_POST['contents5'];
			$addObj['seo_keywords'] = $_POST['seo_keywords1'].','.$_POST['seo_keywords2'].','.$_POST['seo_keywords3'].','.$_POST['seo_keywords4'].','.$_POST['seo_keywords5'];

		
		if ($_POST['id'] > 0)
		{
			updateRecord('exceed_pages', $addObj, 'id='.$_POST['id']);
			$pageID = $_POST['id'];
			$saved = mysql_affected_rows ();
		}
		else 
		{
			$addObj['order'] = getDefaultOrder('exceed_pages');
			$addObj['navigation'] = 107;
			$addObj['pageURL'] = 'homelistings'.time();
			$saved = addRecord('exceed_pages', $addObj);
			$pageID = $saved ;
		}

}
	

?>
					<!-- Modal -->
                            <div class="modal fade" id="adminsform" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                           			 <label>Title </label>
                                            			<input name="title" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-4">
				                                	<div class="form-group">
                                           			 <label>Group Of ..</label>
                                           			 <select name="seo_title" onchange="$('.listing-mods').hide();$('.lisiting-'+$(this).val()).show();" class="form-control">
                                           			 	<option value=""></option>
                                           			 	<option value="categories">Categories</option>
                                           			 	<option value="products">Products</option>
                                           			 </select>
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 ">
				                                <div class="row">
				                                <?
				                                $cats = getCategories(-1, '---');
				                                for ($j = 1; $j <= 5; $j++)
				                                {
				                                ?>
				                                 <div class="col-xs-12 col-md-6 listing-mods lisiting-categories">
				                                	<div class="form-group">
                                           			 <label>Category <?=$j?></label>
                                           			 		<select name="contents<?=$j?>" class="form-control searchable-selector" style="width:100%;">
                                           			 		<option></option>
                                           			 	<?
                                           			 	for ($i = 0; $i < sizeof($cats); $i++)
									                    {
									                    ?>
								                        	<option value="<?=$cats[$i][0]?>"><?=unFormatData($cats[$i][1])?></option>
								                        <?
								                        }
                                           			 	?>
                                           			 	</select>
                                        			</div>
				                                </div>
				                               <?
				                               }
				                               ?>
				                               <?
				                               $products = getAllData('exceed_ecom_products', '1 order by `title`');
				                               for ($j = 1; $j <= 5; $j++)
				                               {
				                               ?>
				                                 <div class="col-xs-12 col-md-6 listing-mods lisiting-products">
				                                	<div class="form-group">
                                           			 <label>Product <?=$j?></label>
                                           			  		<select name="seo_keywords<?=$j?>" class="form-control searchable-selector" style="width:100%;">
                                           			  	<option></option>
                                           			  	<?
                                           			 	for ($i = 0; $i < sizeof($products); $i++)
									                    {
									                    ?>
								                        	<option value="<?=$products[$i][0]?>"><?=unFormatData($products[$i]['title'])?></option>
								                        <?
								                        }
                                           			 	?>
                                           			  	</select>
                                        			</div>
				                                </div>
				                               <?
				                               }
				                               ?>
				                               </div></div>
				                               				                                
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
               	<a href="javascript:;"  style="float:right;" onclick="	return addForm('adminsform', 'Create Featured Listing');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Create Featured Listing</a>
          <h1>
            Featured Lisitings
            <small>You can create featured listings from group of 5 products or group of 5 categories.</small>
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
                        
						        $data = getAllData('exceed_pages', 'navigation=107 order by `order`');
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
							 		<a href="javascript:;" onclick="$('.lisiting-<?=$data[$j][9]?>').show();	selectProducts();return editForm('adminsform', 'Edit Featured Category','exceed_pages_home_listings', <?=$data[$j][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_pages', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][4]]?> fa-fw"></i> <?=$statusTitle[$data[$j][4]]?></a>
								
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
<script src="plugins/select2/select2.full.js" type="text/javascript"></script>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
        $('.sortable-list').sortable({
            handle: '.sortable-heading', 
            update: function(event, ui) {
                var newOrder = $(this).sortable('toArray').toString();
           		$.get('_saveorder_ajax.php', {tbl: 'exceed_pages',order:newOrder});
            }
        });
        
        $('.searchable-selector').select2(); 
    });


function selectProducts()
{
	$('#pageloader').fadeIn();
	setTimeout("$('.searchable-selector').select2(); $('#pageloader').fadeOut();", 1500);
}      
	
</script>      
 
</body>
</html>    