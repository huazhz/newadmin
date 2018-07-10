<?
$cmspages = array();
?>
					<!-- Modal -->
                            <div class="modal fade" id="PageListSelector" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <div class="pull-right" style="max-width:200px;margin-right:15px;">
							                    <div class="input-group">
								                    <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
								                    	<input type="text" id="pages-keyword-selector" class="form-control" placeholder="search.." onkeydown="searhc4page($(this).val())">
							                  	</div>
                                            </div>
                                            <h4 class="modal-title">Select Page <small>&nbsp;&nbsp;&nbsp; click on page title to select</small></h4>
                                        </div>
                                        <div class="modal-body">
                                        	<div class="nav-tabs-custom">
							                <ul class="nav nav-tabs pull-right">
							                  <li><a href="#pages-list-2" data-toggle="tab">Sub Pages</a></li>
							                      <li class="active"><a href="#pages-list-1" data-toggle="tab">Main Nav Pages</a></li>
							                  <li class="pull-left header"><i class="fa fa-inbox"></i> Pages List</li>
							                </ul>
							                <div class="tab-content no-padding">
							                  		<div class="tab-pane active" id="pages-list-1" style="position: relative; height: 300px;overflow:auto;">
							                  	<?
							                  	$pagesNav = getAllData('exceed_navigation', '1 order by `order`');
							                  	for ($i= 0; $i < sizeof($pagesNav); $i++)
							                  	{
							                  	?>
							                  		<div class="btn btn-default page-list-selector" onclick="selectPage('<?=$pagesNav[$i][5]?>')"><b><?=$pagesNav[$i][1]?></b><br><small><?=$sitePath?><?=$pagesNav[$i][5]?></small></div>
							                  	<?
							                  	}
							                  	?>	
							                  	</div>
							                  		<div class="tab-pane" id="pages-list-2" style="position: relative; height: 300px;overflow:auto;">
							                  	<?
							                  	for ($i= 0; $i < sizeof($pagesNav); $i++)
							                  	{
							                  	$navP = getAllData('exceed_pages', 'navigation > 1 and navigation='.$pagesNav[$i][0].' order by `order`');
							                  	for ($j = 0; $j < sizeof($navP); $j++)
							                  	{
							                  	?>
							                  		<div class="btn btn-default page-list-selector" onclick="selectPage('<?=$navP[$j]['pageURL']?>')"><b><span class="pull-right"><?=$pagesNav[$i][1]?></span><?=$navP[$j]['title']?></b><br><small><?=$sitePath?><?=$navP[$j]['pageURL']?></small></div>
							                  	<?
							                  	}
							                  	}
							                  	?>	
							                  	</div>

							                </div>
							              </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                        	<button type="button" class="btn btn-primary" onclick="addSpeficURL()" data-dismiss="modal">Add Another URL</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
								 </div>
                            </div>

<script>
var senderxObj = '';
$(document).ready(function() {
	
	 $('.page-selector').focus(function(){
	 	$('#PageListSelector').modal('show');
	 	senderxObj = $(this).attr('id');
	 });
	 
});

function searhc4page(keyword)
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

function addSpeficURL()
{
	var url = prompt('Enter full url...');
	selectPage(url);
}

function selectPage(iconCode)
{
	$('#'+senderxObj).val(iconCode);
	$('#pages-keyword-selector').val('');
	$('.page-list-selector').show();
	$('#PageListSelector').modal('hide');
}
</script>