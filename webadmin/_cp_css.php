<?
include "_inc_session.php";
$_ACTIVE['cp'] = $_ACTIVE['cp_css'] = 'active';
include "_inc_top.php";

if (sizeof($_POST) > 0)
{
	$_POST['css-settings-all-website'] = str_replace("'", '"', $_POST['css-settings-all-website']);
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".$v."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".$v."'";
		mysql_query($mysqlQuery); 
	}
	$saved = 1;
}
$data = getAllData('exceed_settings_vals', "var='css-settings-all-website'");
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = unFormatData($data[$i][1]);
}

$_SETTINGS['css-settings-all-website'] = str_replace('"', "'", $_SETTINGS['css-settings-all-website']);
?>
      <div class="content-wrapper">
        <section class="content-header">
        
          <h1>
            Custom Style By CSS
            <small>You may custom some css for your website style!</small>
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
                      <textarea class="code-container" rows="4" name="css-settings-all-website" style="height:500px;"><?=unFormatData($_SETTINGS['css-settings-all-website'])?></textarea>
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