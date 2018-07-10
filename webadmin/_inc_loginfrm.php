<?
if ($_POST['username'] != '' and $_POST['password'] != '')
{
		$userObj = getDetails('exceed_admins', "`email`='".trim(strtolower($_POST['username']))."' and `password`='".encodeRequest($_POST['password'])."' and `status`=1");
	if ($userObj[0] > 0)
	{
	$xuserObj['lastlogindate'] = time();
	updateRecord('exceed_admins', $xuserObj, "id=".$userObj[0]);

	$_SESSION['exceedAdmin'] = $userObj;
	header("Location: ".$_POST['url']);
	exit();
	}
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>eXceedCMS | Wilmad LabGlass</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <link href="../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />   
    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="css/black.min.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>Wilmad LabGlass</b> <br>eXceed CMS
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Please sign in to manage your website</p>
        <form method="post" onsubmit="return checkFrm(this)">
        <input type="hidden" name="url" value="<?=$_SERVER['REQUEST_URI']?>">
        <?
          	if ($_POST['username'] != '' and $_POST['password'] != '')
          	{
			?>
					<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Login Failed!</h4>
                    We are unable to verify your account!
                  </div>
			<?          	
          	}
          	?>
          <div class="form-group has-feedback" id="username">
          	
            <input name="username" type="text" class="form-control" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope  form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback"  id="password">
            <input name="password" type="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <div class="col-xs-8">    
            <a href="javascript:;"  onclick="resetpass();" class="pull-right">Forget Password?</a>                        
            </div>
            
          </div>
        </form>
      </div> 
      	<div style="text-align:center;"><br>
          <b>Powered by </b> <a href="http://exceedcms.com" target="_blank">exceedcms v2.0</a>
        </div>
      </div>
		     
   
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
	<script>
	function checkFrm(frm)
	{
		if (frm.username.value == '')
		{
			$('#username').addClass('has-error');
			return false;
		}
		else if (frm.password.value == '')
		{
			$('#username').removeClass('has-error');
			$('#password').addClass('has-error');
			return false;
		}
		else
		{
			return true;
		}
	}
	function resetpass()
	{
	var name=prompt("Please enter your email address!");
	if (name!=null && name!="")
	{	  
		$.get("_rpass.php", {un: name}, function(data) {
			if (data != '')
			alert("Your password had been sent to: \r\n" + data);
			else
			alert("This email is not exists or had been disabled!");
		});
	} 
	}
	</script>    
  </body>
</html>