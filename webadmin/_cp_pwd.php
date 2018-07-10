<?
include "_inc_session.php";
$_ACTIVE['cp'] = $_ACTIVE['cp_pwd'] = 'active';
include "_inc_top.php";
?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Change Your Password
          </h1>
        </section>
        <section class="content">
        <div class="row">
		<div class="col-md-4">		
		<?
		$coldPass = getTitle ('exceed_admins' , 'password', 'id='.$_SESSION['witnAdmin'][0]);
		//echo decodeRequest($coldPass);
		if ($_POST['cpwd']  !=  decodeRequest($coldPass) and $_POST['cpwd'] != '')
		{
		?>
				<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    Invalid Current Password!
                </div>
		<?
		}
		else if ( $_POST['cpwd'] != '')
		{
			$xuserObj['password'] = encodeRequest($_POST['npwd']);
			updateRecord('exceed_admins', $xuserObj, "id=".$_SESSION['witnAdmin'][0]);
				?>
				<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Done!</h4>
                    Password has been changed successfuly!
                </div>
		<?
		}
		?>		
		
            <form role="form" onsubmit="return checkFrm(this)" method="post">
                  <div class="box-body">
                    <div class="form-group"  id="cpwd">
                      <label>Enter Current Password</label>
                      <input type="password" class="form-control" name="cpwd">
                    </div>
                    <div class="form-group"  id="npwd">
                      <label>Enter New Password</label>
                      <input type="password" class="form-control" name="npwd">
                    </div>
                    <div class="form-group"  id="cnpwd">
                      <label>Confirm Your New Password</label>
                      <input type="password" class="form-control" name="cnpwd">
                    </div>
                    <div class="form-group">
                      <label>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </label>
                    </div>
                  </div><!-- /.box-body -->

                  <div>
                    
                  </div>
                </form>
			</div>
		</div>                
        </section>
      </div>
<script>
	function checkFrm(frm)
	{
		if (frm.cpwd.value == '')
		{
			$('#cpwd').addClass('has-error');
			return false;
		}
		else if (frm.npwd.value == '')
		{
			$('#cpwd').removeClass('has-error');
			$('#npwd').addClass('has-error');
			return false;
		}
		else if (frm.npwd.value != frm.cnpwd.value)
		{
			$('#cnpwd').addClass('has-error');
			$('#npwd').addClass('has-error');
			return false;
		}
		else
		{
			return true;
		}
	}
</script>      
<?
include "_inc_footer.php";
?>

  </body>
</html>    