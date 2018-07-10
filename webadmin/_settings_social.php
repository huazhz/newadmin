<?
include "_inc_session.php";
$_ACTIVE['gear'] = $_ACTIVE['social_settings'] = 'active';
include "_inc_top.php";
if (sizeof($_POST) > 0)
{
	foreach ($_POST as $k =>  $v)
	{
		$mysqlQuery  = "INSERT INTO `witn_settings_vals` (`var`, `val`) VALUES ('".$k."','".formatData($v)."')";
		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".addslashes($v)."'";
		mysql_query($mysqlQuery); 
		
	}
	$saved = 1;
}
$data = getAllData('witn_settings_vals', '1');
for ($i = 0; $i < sizeof($data); $i++)
{
	$_SETTINGS[$data[$i][0]] = stripslashes($data[$i][1]);
}

?>
<div class="content-wrapper">
        <section class="content-header">
          <h1>
            Social Media Settings
            <small></small>
          </h1>
        </section>
        <section class="content">
        <form method="post">
        <div class="row">
			<div class="col-md-6">
				<div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title">[WITN] Header / Footer Social Links</h3>
	                </div>
	                <div class="box-body">
	               		<div class="form-group">
		                    <div class="input-group">
			                    <span class="input-group-addon"><i class="fa fa-facebook fa-fw"></i></span>
			                    	<input type="text" name="fb-url"  value="<?=unFormatData($_SETTINGS['fb-url'])?>" class="form-control" placeholder="http://www.facebook.com/">
		                  	</div>
                  		</div>
						<div class="form-group">
		                    <div class="input-group">
			                    <span class="input-group-addon"><i class="fa fa-twitter fa-fw"></i></span>
			                    	<input type="text" name="tw-url"  value="<?=unFormatData($_SETTINGS['tw-url'])?>" class="form-control" placeholder="http://www.twitter.com/">
		                  	</div>
                  		</div>
                  		<div class="form-group">
		                    <div class="input-group">
			                    <span class="input-group-addon"><i class="fa fa-youtube fa-fw"></i></span>
			                    	<input type="text" name="yt-url"  value="<?=unFormatData($_SETTINGS['yt-url'])?>" class="form-control" placeholder="http://www.youtube.com/">
		                  	</div>
                  		</div>
	                </div>
	            </div>
        	</div>
        	<div class="col-md-6">
				<div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title">[City Council] Header / Footer Social Links</h3>
	                </div>
	                <div class="box-body">
	               		<div class="form-group">
		                    <div class="input-group">
			                    <span class="input-group-addon"><i class="fa fa-facebook fa-fw"></i></span>
			                    	<input type="text" name="cow-fb-url"  value="<?=unFormatData($_SETTINGS['cow-fb-url'])?>" class="form-control" placeholder="http://www.facebook.com/">
		                  	</div>
                  		</div>
						<div class="form-group">
		                    <div class="input-group">
			                    <span class="input-group-addon"><i class="fa fa-twitter fa-fw"></i></span>
			                    	<input type="text" name="cow-tw-url"  value="<?=unFormatData($_SETTINGS['cow-tw-url'])?>" class="form-control" placeholder="http://www.twitter.com/">
		                  	</div>
                  		</div>
                  		<!--
                  		<div class="form-group">
		                    <div class="input-group">
			                    <span class="input-group-addon"><i class="fa fa-vimeo-square fa-fw"></i></span>
			                    	<input type="text" name="cow-yt-url"  value="<?=unFormatData($_SETTINGS['cow-yt-url'])?>" class="form-control" placeholder="http://www.vimeo.com/">
		                  	</div>
                  		</div>
                  		-->
	                </div>
	            </div>
        	</div>

        </div>
        <div class="row">
        	<div class="col-md-6">
				<div class="box box-warning">
	                <div class="box-header with-border">
	                  <h3 class="box-title">WITN Socail Feed</h3>
	                </div>
	                <div class="box-body">
	                <div class="form-group">
                      <label>Facebook Feed Box</label>
                      <textarea class="form-control" rows="5" placeholder="paste code provided by facebook developer" name="fb-witn-feed"><?=$_SETTINGS['fb-witn-feed']?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Twitter Feed Box</label>
                      <textarea class="form-control" rows="5" placeholder="paste code provided by twitter developer" name="tw-witn-feed"><?=$_SETTINGS['tw-witn-feed']?></textarea>
                    </div>
	                </div>
	            </div>
        	</div>
        	<div class="col-md-6">
				<div class="box box-danger">
	                <div class="box-header with-border">
	                  <h3 class="box-title">City Council Socail Feed</h3>
	                </div>
	                <div class="box-body">
	                <div class="form-group">
                      <label>Facebook Feed Box</label>
                      <textarea class="form-control" rows="5" placeholder="paste code provided by facebook developer" name="fb-council-feed"><?=$_SETTINGS['fb-council-feed']?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Twitter Feed Box</label>
                      <textarea class="form-control" rows="5" placeholder="paste code provided by twitter developer" name="tw-council-feed"><?=$_SETTINGS['tw-council-feed']?></textarea>
                    </div>
	                </div>
	            </div>
        	</div>
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
?>
</body>
</html>