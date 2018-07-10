<?
include "_inc_session.php";
$_ACTIVE['settings'] = $_ACTIVE['settings_seo'] = 'active';
include "_inc_top.php";

if (sizeof($_POST) > 0)
{
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".$v."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".$v."'";
		mysql_query($mysqlQuery); 
		
	}
	$saved = 1;
}
$data = getAllData('exceed_settings_vals', '1');
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = unFormatData($data[$i][1]);
}

?>
      <div class="content-wrapper">
        <section class="content-header">
        
          <h1>
            SEO Settings
            <small>Default Meta Tags will used in home page and other pages which dose not have custom meta tags</small>
          </h1>
        </section>
        <section class="content">
        <form method="post">
        <?
                if ($saved > 0)
                {
                ?>
                			<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Settings has been saved!
                            </div>
                <?
                }
                ?>
        <div class="row">
                    <div class="col-md-12">
              <div class="box box-default">
                
                <div class="box-body">
                  	<div class="form-group">
                      <label>Meta Page Title</label>
                      <input type="text" class="form-control" name="seo-title"  value="<?=unFormatData($_SETTINGS['seo-title'])?>">
                    </div>
                    <div class="form-group">
                      <label>Meta Page Description</label>
                      <textarea class="form-control" rows="4" name="seo-desc"><?=unFormatData($_SETTINGS['seo-desc'])?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Meta Page Keywords</label>
                      <textarea class="form-control" rows="4" name="seo-keywords"><?=unFormatData($_SETTINGS['seo-keywords'])?></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save </button>
                </div>
              </div>
            </div>
        </div>
        </form></section>
      </div>
<?
include "_inc_footer.php";
?>
</body>
</html>    