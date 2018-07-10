<?
$cmspages = array();
foreach($pagesNav as $k => $v)
{
	$navP = getAllData('exceed_pages', 'navigation='.$k.' order by `order`');
	for ($i = 0; $i < sizeof($navP); $i++)
	{
		$cmspages[$navP[$i]['pageURL']] = '<span class="pull-right">'.$v.'</span>'.$navP[$i]['title'];
	}
}
?>
					<!-- Modal -->
                            <div class="modal fade" id="selectMultiplePages" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                             <form method="post"> 
 <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <div class="pull-right" style="max-width:200px;margin-right:15px;">
							                    <div class="input-group">
								                    <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
								                    	<input type="text" id="xpages-keyword-selector" class="form-control" placeholder="search.." onkeydown="xsearhc4page($(this).val())">
							                  	</div>
                                            </div>
                                            <h4 class="modal-title">Select Page <small>&nbsp;&nbsp;&nbsp; select page to apply</small></h4>
                                        </div>
                                        <div class="modal-body">
                                        	<div class="nav-tabs-custom">
							                <ul class="nav nav-tabs pull-right">
							                  <li><a href="#xpages-list-4" data-toggle="tab">Products</a></li>
							                  <li><a href="#xpages-list-3" data-toggle="tab">Categories</a></li>
							                  <li><a href="#xpages-list-2" data-toggle="tab">CMS Pages</a></li>
							                      <li class="active"><a href="#xpages-list-1" data-toggle="tab">Defined Pages</a></li>
							                  <li class="pull-left header"><i class="fa fa-inbox"></i> Pages List</li>
							                </ul>
							                <div class="tab-content no-padding">
							                  		<div class="tab-pane active" id="xpages-list-1" style="position: relative; height: 300px;overflow:auto;">
							                  		<div class="btn btn-success page-list-selector"><input type="checkbox" name="applyto[]" id="checkbox-all-pages" value="all-pages"> <b>All Pages - No Need To Select Another Pages</b></div>

							                  	<?
							                  	foreach ($dpages as $k => $v)
							                  	{
							                  	?>
							                  		<div class="btn btn-default page-list-selector"><input type="checkbox" name="applyto[]" id="checkbox-<?=str_replace('/', '-', $k)?>" value="<?=$k?>"> <b><?=$v?></b></div>
							                  	<?
							                  	}
							                  	?>	
							                  	</div>
							                  		<div class="tab-pane" id="xpages-list-2" style="position: relative; height: 300px;overflow:auto;">
							                  	<?
							                  	foreach ($cmspages as $k => $v)
							                  	{
							                  	?>
							                  		<div class="btn btn-default page-list-selector"><input type="checkbox" name="applyto[]" id="checkbox-<?=$k?>" value="<?=$k?>"> <b><?=$v?></b></div>
							                  	<?
							                  	}
							                  	?>	
							                  	</div>
							                  	  <div class="tab-pane" id="xpages-list-3" style="position: relative; height: 300px;overflow:auto;">
							                  	<?
							                  	$cats = getCategories(-1, '|---');
							                  	for ($i = 0; $i < sizeof($cats); $i++)
							                  	{
							                  	?>
							                  		<div class="btn btn-default page-list-selector"><input type="checkbox" name="applyto[]" id="checkbox-<?=$cats[$i][0]?>" value="<?=$cats[$i][0]?>"> <b><?=unFormatData($cats[$i]['title'])?></b></div>
							                  	<?
							                  	}
							                  	?>	
							                  	</div>
							                  	  <div class="tab-pane" id="xpages-list-4" style="position: relative; height: 300px;overflow:auto;">
							                  	<?
							                  	$products = getAllData('exceed_ecom_products', "status=1 and pageURL!='' order by `title`");
							                  	for ($i = 0; $i < sizeof($products); $i++)
							                  	{
							                  	?>
							                  		<div class="btn btn-default page-list-selector"><input type="checkbox" name="applyto[]" id="checkbox-<?=$products[$i][0]?>" value="<?=$products[$i][0]?>"> <b><?=unFormatData($products[$i]['title'])?></b></div>
							                  	<?
							                  	}
							                  	?>	
							                  	</div>


							                </div>
							              </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                        <input type="hidden" name="applyToID" id="applyToID" value="">
                                        	<button type="submit" name="saveApplyTo" value="1" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
								 </div>
								 </form>
                            </div>

<script>
function xsearhc4page(keyword)
{
	if(keyword != '')
	{
		$('.page-list-selector').hide();
		$('.page-list-selector:contains("'+keyword+'")').show();
	}
	else
	{
		$('.page-list-selector').show();
	}
}

function checkSelectedBox(id, slctdboxs)
{
	//alert(slctdboxs);
	$('#applyToID').val(id);
	$('input[type=checkbox]').prop("checked", false);

	var allboxs = slctdboxs.split(',');
	for (var i=0; i < allboxs.length; i++)
	{
		allboxs[i] =allboxs[i].replace('/', '-');
		$('#checkbox-'+allboxs[i]).prop('checked', true);
		
	}
}
</script>