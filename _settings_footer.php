<?
include "_inc_session.php";
$_ACTIVE['settings'] = $_ACTIVE['settings_footer'] = 'active';
include "_inc_top.php";
include "../shared_code/fontAwsomeIcons.php";

if (sizeof($_POST) > 0)
{
	$_POST['footer-sitemap'] = json_encode($_POST['footer-sitemap']);
	$_POST['footer-resources'] = json_encode($_POST['footer-resources']);
	$_POST['footer-brands'] = json_encode($_POST['footer-brands']);
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".addslashes($v)."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".addslashes($v)."'";
		mysql_query ($mysqlQuery); 
		
	}
	$saved = 1;
}
$data = getAllData('exceed_settings_vals', '1');
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = stripslashes($data[$i][1]);
}
$_SETTINGS['footer-sitemap'] = json_decode(stripslashes($_SETTINGS['footer-sitemap']), true);
$_SETTINGS['footer-resources'] = json_decode(stripslashes($_SETTINGS['footer-resources']), true);
$_SETTINGS['footer-brands'] = json_decode(stripslashes($_SETTINGS['footer-brands']), true);
?>


                            
                            


<div class="content-wrapper">
        <section class="content-header">
          <h1>
            Footer Settings
            <small></small>
          </h1>
        </section>
        <section class="content">
        <form method="post">
        <div class="row">
			<div class="col-md-6">
				<div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Site Map <br><small>Manage sitemap links</small></h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
	                </div>
	                <div class="box-body">
	                <div class="form-group">
                      <label> Title</label>
                      <input type="text" class="form-control" name="footer-sitemap-title"  value="<?=unFormatData($_SETTINGS['footer-sitemap-title'])?>">
                    </div>
	                 <table class="table table-bordered table-add-on-focus">
	                 <thead>
	                 <tr>
                      <th colspan="2"><button type="button" id="footer-sitemap-tr-21" class="pull-right btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Link</button></th>
                    </tr>
                    <tr>
                      <th width="40%">Display Text</th>
                      <th>Page URL</th>
                    </tr>
                    </thead>
                    <tbody>
	                <?
	                for ($i = 0; $i <= 20; $i++)
	                {
	                ?>
	                <tr class="table-add-on-row-<?=$i?>" id="footer-sitemap-tr-<?=$i?>">
                      <td>	<input type="text" name="footer-sitemap[text][<?=$i?>]"  value="<?=$_SETTINGS['footer-sitemap']['text'][$i]?>" class="form-control" placeholder="Display Text"></td>
                      <td>	<input id="footer-sitemap-url-<?=$i?>" type="text" name="footer-sitemap[url][<?=$i?>]"  value="<?=$_SETTINGS['footer-sitemap']['url'][$i]?>" class="form-control page-selector" placeholder="Page URL"></td>
                    </tr>
	                <?
	                }
	                ?>
	                </tbody>
	                
	                </table>
	               		
	                </div>
	                
	            </div>
        	</div>
        	<div class="col-md-6">
				<div class="box box-success">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Footer Contact Us <br><small>Enter contact information</small></h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
	                </div>
	                <div class="box-body">
	                 <div class="form-group">
                      <label> Title</label>
                      <input type="text" class="form-control" name="footer-contacts-title"  value="<?=unFormatData($_SETTINGS['footer-contacts-title'])?>">
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
                    	<div class="form-group">
	                      <label>Address</label>
	                      <textarea class="form-control" rows="3" name="footer-contacts-address"><?=unFormatData($_SETTINGS['footer-contacts-address'])?></textarea>
	                    </div>
                    	</div>
                    	<div class="col-md-6">
                    	<div class="form-group">
	                      <label>Email</label>
	                      <textarea class="form-control" rows="3" name="footer-contacts-email"><?=unFormatData($_SETTINGS['footer-contacts-email'])?></textarea>
	                    </div>
                    	</div>
                    	<div class="col-md-6">
                    	<div class="form-group">
	                      <label>Phone</label>
	                      <textarea class="form-control" rows="3" name="footer-contacts-phone"><?=unFormatData($_SETTINGS['footer-contacts-phone'])?></textarea>
	                    </div>
                    	</div>
                    	<div class="col-md-6">
                    	<div class="form-group">
	                      <label>Fax</label>
	                      <textarea class="form-control" rows="3" name="footer-contacts-fax"><?=unFormatData($_SETTINGS['footer-contacts-fax'])?></textarea>
	                    </div>
                    	</div>
                    </div>
                    
                    
	               		
	                </div>
	                
	            </div>
	           
        	</div>
        	</div>
        	
        	
        	<div class="row">
			<div class="col-md-6">
				<div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Resources Links <br><small>Manage resources links</small></h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
	                </div>
	                <div class="box-body">
	                 <div class="form-group">
                      <label> Title</label>
                      <input type="text" class="form-control" name="footer-resources-title"  value="<?=unFormatData($_SETTINGS['footer-resources-title'])?>">
                    </div>
	                 <table class="table table-bordered table-add-on-focus">
	                 <thead>
	                 <tr>
                      <th colspan="2"><button type="button" id="footer-resources-tr-21" class="pull-right btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Link</button></th>
                    </tr>
                    <tr>
                      <th width="40%">Display Text</th>
                      <th>Page URL</th>
                    </tr>
                    </thead>
                    <tbody>
	                <?
	                for ($i = 0; $i <= 20; $i++)
	                {
	                ?>
	                <tr class="table-add-on-row-<?=$i?>" id="footer-resources-tr-<?=$i?>">
                      <td>	<input type="text" name="footer-resources[text][<?=$i?>]"  value="<?=$_SETTINGS['footer-resources']['text'][$i]?>" class="form-control" placeholder="Display Text"></td>
                      <td>	<input id="footer-resources-url-<?=$i?>" type="text" name="footer-resources[url][<?=$i?>]"  value="<?=$_SETTINGS['footer-resources']['url'][$i]?>" class="form-control page-selector" placeholder="Page URL"></td>
                    </tr>
	                <?
	                }
	                ?>
	                </tbody>
	                
	                </table>
	               		
	                </div>
	                
	            </div>
        	</div>
        	<div class="col-md-6">
				<div class="box box-success">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Footer Brands <br><small>Enter brands information</small></h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
	                </div>
	                <div class="box-body">
	                 <div class="form-group">
                      <label> Title</label>
                      <input type="text" class="form-control" name="footer-brands-title"  value="<?=unFormatData($_SETTINGS['footer-brands-title'])?>">
                    </div>
                    <div class="form-group">
	                      <label>Description</label>
	                      <textarea class="form-control" rows="3" name="footer-brands-desc"><?=unFormatData($_SETTINGS['footer-brands-desc'])?></textarea>
	                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                    	<table class="table table-bordered table-add-on-focus">
	                 <thead>
	                 <tr>
                      <th colspan="2"><button type="button" id="footer-brands-tr-21" class="pull-right btn btn-sm btn-success"><i class="fa fa-plus"></i> Add 
						Brand</button></th>
                    </tr>
                    <tr>
                      <th width="50%">Brand Name / URL</th>
                      <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
	                <?
	                for ($i = 0; $i <= 20; $i++)
	                {
	                ?>
	                <tr class="table-add-on-row-<?=$i?>" id="footer-brands-tr-<?=$i?>">
                      <td>
                      <input type="text" name="footer-brands[text][<?=$i?>]"  value="<?=$_SETTINGS['footer-brands']['text'][$i]?>" class="form-control" placeholder="Brand Name">
                      <input style="margin-top:5px;" id="footer-brands-url-<?=$i?>" type="text" name="footer-brands[url][<?=$i?>]"  value="<?=$_SETTINGS['footer-brands']['url'][$i]?>" class="form-control page-selector" placeholder="Page URL">
                      
                      </td>
                      <td>
                      <textarea  name="footer-brands[text2][<?=$i?>]" class="form-control" rows="3" placeholder="Brand Description"><?=$_SETTINGS['footer-brands']['text2'][$i]?></textarea>
                      </td>
                    </tr>
	                <?
	                }
	                ?>
	                </tbody>
	                
	                </table>
                    	                    	</div>
                    </div>
                    
                    
	               		
	                </div>
	                
	            </div>
	           
        	</div>
        	</div>
        	<div class="row">
        	

        	<div class="col-md-12">
				<div class="box box-primary">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Footer Copyrights</h3>
	                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div></div>
                  <div class="box-body">
                  <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <textarea class="form-control" rows="4" name="footer-copyright-left" id="footer-copyright-left"><?=unFormatData($_SETTINGS['footer-copyright-left'])?></textarea>
                    </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <textarea class="form-control" rows="4" name="footer-copyright-center" id="footer-copyright-center"><?=unFormatData($_SETTINGS['footer-copyright-center'])?></textarea>
                    </div>
                     </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <textarea class="form-control" rows="4" name="footer-copyright-right" id="footer-copyright-right"><?=unFormatData($_SETTINGS['footer-copyright-right'])?></textarea>
                    </div>
	            </div> </div>

	                </div>
	            </div>
	            </div>

        	</div>
        <div class="row">
        	<div class="col-md-6">
        	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save </button>
        	</div>
        </div>
        </form>
  		</section>
</div>
<script>
</script>      
<?
include "_inc_footer.php";
include "_inc_page_selector_list.php";
include "_inc_font_awsome_icons_list.php";

?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {


		 CKEDITOR.replace('footer-copyright-left', {
		 	height: '100',
        	toolbar: [[ 'Source','-', 'Bold', 'Italic','Underline','JustifyLeft','JustifyCenter','JustifyRight', 'Link', 'Unlink','Image' ]]
        });
		 CKEDITOR.replace('footer-copyright-right', {
        	height: '100',
        	toolbar: [[ 'Source','-', 'Bold', 'Italic','Underline','JustifyLeft','JustifyCenter','JustifyRight', 'Link', 'Unlink','Image' ]]
        });
		 CKEDITOR.replace('footer-copyright-center', {
        	height: '100',
        	toolbar: [[ 'Source','-', 'Bold', 'Italic','Underline','JustifyLeft','JustifyCenter','JustifyRight', 'Link', 'Unlink','Image' ]]
        });
 
      });

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


</body></html>