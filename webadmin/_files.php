<?
include "_inc_session.php";
if ($_FILES['photo']['tmp_name'] != '')
	{

		$fileName = basename($_FILES['photo']['name']);
		$temp = explode('.', $fileName);

		$fileExt  = $temp[sizeof($temp)-1];
		$filePath = "../uploads/".md5(mktime()).".".$fileExt;
		$i=0;
		$tempfilePath = $filePath; 
		while (file_exists($filePath))
		{
			$filePath = str_replace('.'.$fileExt, '_'.$i.'.'.$fileExt, $tempfilePath);
			$i++;
		}

		$fileName = str_replace("../uploads/", '', $filePath);
		$fileObj['title'] = formatData($_POST['title']);
		if ($fileObj['title'] == '') $fileObj['title'] = $_FILES['photo']['name'];
		$fileObj['file'] = $fileName;
		$fileObj['type'] = $fileExt ;

		move_uploaded_file($_FILES['photo']['tmp_name'],"$filePath");
		$smsg = addRecord('exceed_files', $fileObj);

	}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Browse Upload Center</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />    
    <link href="../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />   
    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="css/black.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="wrapper">
		<section class="content">
		<div class="row">
		<form method="post" role="form"  enctype="multipart/form-data">
            <div class="col-lg-12">
              <div class="box box-default box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-upload"></i>
                  <h3 class="box-title">Upload New <?=$_GET['t']?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                      <div class="row">
	                    <div class="col-md-3">
	                     <input type="file" name="photo">
	                    </div>
	                    <div class="col-md-7">
	                      <input type="text" class="form-control" name="title" placeholder="Enter <?=$_GET['t']?> Title">
	                    </div>
	                    <div class="col-md-2">
	                     <button type="submit" class="btn btn-primary">Upload</button>
	                    </div>
	                  </div>
                 </div>
              </div>
            </div>
           </form>
          </div>
          <br>
          <div class="row" id="files">
          	<div class="col-lg-12">
          	<input class="search form-control " placeholder="Search by file title.." />
          	<br>
			</div>
                        <?                        
                        if ($_GET['t'] == 'Image') $cond = "LOWER(`type`) IN ('jpg', 'png', 'gif', 'bmp', 'jpeg')";
                        else  $cond = "1";
                        
                        $files = getAllData('exceed_files', $cond." order by id desc");
                        ?>
                         <ul class="list list-unstyled">
                         <?
                         if ($_GET['t'] == 'Image')
                         {
	                         for ($i = 0; $i < sizeof($files); $i++)
	                         {
	                         ?>
	                         <div class="col-xs-12 col-md-4 col-lg-3">
							    <li class=" panel panel-default">
							    	<div class="panel-body" style="min-height:150px;background:url(../uploads/<?=$files[$i][2]?>) center top no-repeat;background-size:cover;"></div>
							    <div class="panel-footer"><?=$files[$i][1]?>&nbsp;
	                                <a href="javascript:;" onclick="selectFile('<?=$files[$i][2]?>');" class="btn btn-sm pull-right btn-success"><i class="fa fa-check fa-fw"></i> Select</a>
							    </div>
							    </li>
							   </div>
						     <?
						     }
                         }
                         else
                         {
                         
	                         for ($i = 0; $i < sizeof($files); $i++)
	                         {
	                         ?>
	                         <div class="col-xs-12 col-md-6">
							    <li class=" panel panel-default">
							    	<div class="panel-body">
							    	<img src="exts/<?=$files[$i][3]?>.png" style="float:left;margin-right:10px;">
							    	<?=$files[$i][1]?>
							    	</div>
							    <div class="panel-footer">&nbsp;
	                                <a href="javascript:;" onclick="selectFile('<?=$files[$i][2]?>');" class="btn btn-sm pull-right btn-success"><i class="fa fa-check fa-fw"></i> Select</a>
							    </div>
							    </li>
							   </div>
						     <?
						     }
                         }
                         
                         
                         
					     ?>
						 
						</ul>   
                </div>
		</section>
	</div>
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="http://listjs.com/no-cdn/list.js"></script>
    <script src="plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
			CkEditorImageBrowser.init();
	</script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
      function selectFile(url)
      {
     	 window.opener.CKEDITOR.tools.callFunction(<?=$_GET['CKEditorFuncNum']?>, '<?=$sitePath?>uploads/'+url);
		 window.close();
      }
      
    var SortOptions = {
  		valueNames: [ 'panel-footer' ]
	};
	
	var userList = new List('files', SortOptions);  
    </script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="js/app.min.js" type="text/javascript"></script>
    <script src="js/exceed-admin.js" type="text/javascript"></script>
	
  </body>
</html>
