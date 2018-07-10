<?
include "_inc_session.php";
$_ACTIVE['home'] = $_ACTIVE['home_alerts'] = 'active';
$customHeader = '<link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>';

include "_inc_top.php";
if (sizeof($_POST) > 0)
{
	$addObj['title'] = formatData($_POST['title']);
	$addObj['contents'] = formatData($_POST['contents']);
	
	$addObj['url'] = formatData($_POST['url']);
	$addObj['urltarget'] = $_POST['urltarget'];

	$addObj['seo_title'] = formatData($_POST['seo_title']); //color
	$addObj['seo_keywords'] = formatData($_POST['seo_keywords']); //fontcolor


	if ($_POST['id'] > 0)
	{
		updateRecord('exceed_pages', $addObj, 'id='.$_POST['id']);
		$pageID = $_POST['id'];
		$saved = mysql_affected_rows ();
	}
	else
	{
		$addObj['order'] = getDefaultOrder('exceed_pages');
		$addObj['navigation'] = 10002;
		$addObj['pageURL'] = 'alret'.time();
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
                                           			 <label>Title <small>(just for admin)</small></label>
                                            			<input name="title" class="form-control">
                                            			
                                        			</div>
				                                </div>
				                                 <div class="col-xs-12 col-md-12">
				                                	<div class="form-group">
                                           			 <label>Alert Message</label>
                                           			 		<textarea name="contents" id="contents" data-ckeditor="1" rows="3" class="form-control"></textarea>
                                        			</div>
				                                </div>
				                               
				                                <div class="col-xs-12 col-md-6">
				                                	<div class="form-group">
                                           			 <label>On Click URL</label>
                                            			<input type="text" id="url"  class="form-control page-selector" name="url">
                                        			</div>
				                                </div>
				                                <div class="col-xs-12 col-md-3">
				                                	<div class="form-group">
                                           			 <label>Target</label>
                                            			<select class="form-control" name="urltarget">
									                        <option value="_self">Same Window</option>
									                        <option value="_blank">New Window</option>
									                      </select>
                                        			</div>
				                                </div>
				                                <div class="col-xs-6">
				                                	<div class="form-group">
                                           			 <label>Font Color</label>
                                            			<div class="input-group my-colorpicker">
									                      <input type="text" name="seo_keywords" class="form-control"/>
									                      <div class="input-group-addon">
									                        <i id="seo_keywords_colorpicker"></i>
									                      </div>
									                    </div>
                                        			</div>
				                                </div>
				                                <div class="col-xs-6">
				                                	<div class="form-group">
                                           			 <label>Background Color</label>
                                            			
                                            			<div class="input-group my-colorpicker">
									                      <input type="text" name="seo_title" class="form-control"/>
									                      <div class="input-group-addon">
									                        <i id="seo_title_colorpicker"></i>
									                      </div>
									                    </div>
                                        			</div>
				                                </div>
				                            </div>
									
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="save-image" value="1">Save</button>
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
               	<a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Alert');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Alert</a>
          <h1>
            Alert Area
            <small>Manage website header alerts!</small>
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
                        
						        $data = getAllData('exceed_pages', 'navigation=10002 order by `order`');
						        if (sizeof($data) > 0)
						        {

						        for ($j = 0; $j < sizeof($data); $j++)
						        {
						        $delCond = 'delete from `exceed_pages` where id='.$data[$j][0];
						        ?>
						        	<div class="<?=$activeStatus[$data[$j][4]]?> "  style="padding:0px;border:2px solid #eee;margin-bottom:20px;" id="<?=$data[$j][0]?>">
						        	<div class="pull-right" style="background:#fff;padding:11px;">
						    			<a href="_copy_record.php?data=<?=encodeRequest('_home_alerts.php|exceed_pages|'.$data[$j][0])?>" onclick="return confirm('are you sure to duplicate this message?');"class="btn btn-sm   btn-primary"><i class="fa fa-copy fa-fw"></i> Duplicate</a>
						    		<a href="javascript:;" onclick="return editForm('adminsform', 'Edit Alert','exceed_pages', <?=$data[$j][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i class="fa fa-pencil fa-fw"></i> Edit</a>
									<a href="javascript:;" onclick="swapStatus(<?=$data[$j][0]?>, 'exceed_pages', $(this));" class="btn btn-sm btn-info"><i class="fa fa-<?=$statusIcon[$data[$j][4]]?> fa-fw"></i> <?=$statusTitle[$data[$j][4]]?></a>
									<a href="javascript:;" onclick="deleteFunction('', <?=$data[$j][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>
								</div>
								<div class="alert" style="background:<?=$data[$j]['seo_title']?>;color:<?=$data[$j]['seo_keywords']?>;margin-bottom:0px;"><strong> <?=unFormatData($data[$j][1])?></strong>
								</div>
								
						        </div>
						        <?
						        }

						        }
						        ?>

                  
                </div>
              </div>          
  
                </div>
            </div>
        
        
  		</section>      </div>

<?
include "_inc_footer.php";
include "_inc_page_selector_list.php";


?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
      $(function () {
        $(".my-colorpicker").colorpicker();
        CKEDITOR.replace('contents', {height: 100,
        	toolbar: [[ 'Source','Bold', 'Italic','Underline', 'JustifyLeft','JustifyCenter','JustifyRight','Font','FontSize']]
        });
      });
</script>      
 
</body>
</html>    