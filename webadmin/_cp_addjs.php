<?
include "_inc_session.php";
$_ACTIVE['cp'] = $_ACTIVE['cp_addjs'] = 'active';
include "_inc_top.php";

if (sizeof($_POST) > 0)
{
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".addslashes($v)."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".addslashes($v)."'";
		mysql_query($mysqlQuery); 
		//echo($mysqlQuery); 
	}
	$saved = 1;
}
$data = getAllData('exceed_settings_vals', "var LIKE 'add-on-javascript-%'");
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = unFormatData($data[$i][1]);
}

?>
      <div class="content-wrapper">
        <section class="content-header">
        
          <h1>
            Add Java Script Code
            <small>Use this to add javascript code for google analytics, or any widget you want.</small>
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
                <div class="box-header with-border">
	                  <h3 class="box-title">Header - Javascript <small> script add before &lt;/head&gt;</small></h3>
	                </div>
                <div class="box-body">
                    <div class="form-group">
                      <textarea class="code-container" rows="4" name="add-on-javascript-header" style="height:300px;"><?=stripslashes($_SETTINGS['add-on-javascript-header'])?></textarea>
                    </div>
                </div>
              </div>
              <div class="box box-default">
                <div class="box-header with-border">
	                  <h3 class="box-title">Footer - Javascript <small> script add before &lt;/body&gt;</small></h3>
	                </div>
                <div class="box-body">
                    <div class="form-group">
                      <textarea class="code-container" rows="4" name="add-on-javascript-footer" style="height:300px;"><?=stripslashes($_SETTINGS['add-on-javascript-footer'])?></textarea>
                    </div>
                </div>
                
              </div>
            </div>
        </div>
       <div class="row">
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save </button>
                </div></div>
        
        </form></section>
      </div>
<?
include "_inc_footer.php";
?>
</body>
</html>    