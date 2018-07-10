<?
include "_inc_session.php";
$_ACTIVE['app'] = $_ACTIVE['app_news'] = 'active';
include "_inc_top.php";
if (sizeof($_POST) > 0)
{
	$addObj['title'] = formatData($_POST['title']);
	$addObj['contents'] = formatData($_POST['contents']);
	$addObj['typeTxt'] = formatData($_POST['typeTxt']);
	$addObj['pageURL'] = formatData($_POST['pageURL']);
	
	$addObj['seo_title'] = formatData($_POST['seo_title']);
	$addObj['seo_desc'] = formatData($_POST['seo_desc']);
	$addObj['seo_keywords'] = formatData($_POST['seo_keywords']);

	$addObj['date'] = getDate2Int($_POST['date']);

	$addObj['status'] = $_POST['status'];
	$addObj['type'] = 1;

	if ($_POST['id'] > 0)
	{
		updateRecord('exceed_news', $addObj, 'id='.$_POST['id']);
		$pageID = $_POST['id'];
		$saved = mysql_affected_rows ();
	}
	else
	{
		$saved = addRecord('exceed_news', $addObj);
		$pageID = $saved ;
	}
	
	if ($_FILES['photo']['tmp_name'] != '')
	{
			$targetFileName = "../uploads/news_".$pageID.".jpg";
			$photoFileName = "../uploads/news_thumb_".$pageID.".jpg";
			
			@unlink($targetFileName);
			@unlink($photoFileName);
			
			move_uploaded_file($_FILES['photo']['tmp_name'],$targetFileName);
			
			corp_img($targetFileName,$photoFileName ,400,300, $_FILES['photo']['name']);
	}	
	
	
	echo '<script>document.location.href="_app_news_frm.php?id='.$pageID.'&saved='.$saved.'";</script>';
}


if ($_GET['id'] > 0)
{
		$addNewTitle = 'Edit';
		$mypage = getDetails('exceed_news', 'type=1 and id='.$_GET['id']);
		$cdate  = date("m/d/Y", $mypage[2]);
		$pageTilte = ' ('.$mypage[1].')';
}
else
{
		$addNewTitle = 'Add';
}
?>
<div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?=$addNewTitle?>
            News
          </h1>
          <ol class="breadcrumb">
            <li>CMS Pages</li>
            <li><a href="_pages_news.php">Trade Shows & Conferences </a></li>
            <li class="active"><?=$addNewTitle?> </li>
          </ol>
        </section>
        <section class="content">
        		<?
                if ($_GET['saved'] > 0)
                {
                ?>
                <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Page has beed saved!
                            </div>
                <?
                }
                ?>
        <form method="post" onsubmit="return checkFrm(this)" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$mypage[0]?>">
        <div class="row">
            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-list-alt"></i>
                  <h3 class="box-title">Details</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                									
               		 <div class="row">
	                    <div class="col-xs-4">
							<div class="form-group">
		                      <label>Title Prefix <small><i>Optional</i></small></label>
		                      	<input type="text" class="form-control" value="<?=unFormatData($mypage[5])?>" name="typeTxt">
		                    </div>
	                    </div>
	                    <div class="col-xs-8">
                		   <div class="form-group"  id="title">
		                      <label>Title</label>
		                      	<input type="text" class="form-control" value="<?=unFormatData($mypage[1])?>" name="title">
		                    </div>
                		</div>
                		<div class="col-xs-12">
                		<div class="form-group" >
                    	<label>News Page URL</label>
	                    <div class="input-group">
		                    <span class="input-group-addon"><?=$sitePath?>news/</span>
		                    	<input type="text" name="pageURL"  value="<?=unFormatData($mypage['pageURL'])?>" class="form-control" placeholder="Page URL should be unique in system">
	                  	</div>
	                  	</div>
                  	</div>
                	</div>
                
                  	<div class="form-group" >
                      <label>Date</label>
		                    <div class="input-group">
		                      <div class="input-group-addon">
		                        <i class="fa fa-calendar"></i>
		                      </div>
		                      <input type="text" name="date"  value="<?=$cdate?>" class="date form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask/>
		                    </div>
                    </div>
                    <div class="row">
                    <?
                    $newsImg = "../uploads/news_thumb_".$mypage[0].".jpg";
                    $newsOImg = "../uploads/news_".$mypage[0].".jpg";
                    if (file_exists($newsImg))
                    {
                    ?>
                    <div class="col-xs-6" id="img_news_container">
					<img src="<?=$newsImg?>?d=<?=time()?>" height="85" style="margin-bottom:8px;"><br>
					<a href="javascript:;" onclick="deleteFile('img_news_container', '', '<?=$newsImg?>');" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Delete</a>		
	                <a href="javascript:;" onclick="return cropImg('cropImg','<?=$newsOImg?>','<?=$newsImg?>', '0|0|100|75','400x300');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i class="fa fa-crop fa-fw"></i> Crop</a>
	                </div>
                    <?
                    }
                    ?>
	                    
	                    <div class="col-xs-6">
                		   <div class="form-group">
                                           			 <label>Photo </label>
                                            			<input type="file" name="photo">
                                        			</div>
								                    <div class="form-group"  id="title">
								                      <label>Status</label>
                      								<div class="radio">
                                            		<?
                                            		$slctdST[$mypage[7]] = 'checked';
                                            		$statusArr = array('In-Active', 'Active');
                                            		for ($i=1; $i >=0; $i--)
                                            		{
                                            		?>
                                            		<label class="radio-inline">
                                            			<input type="radio" name="status" <?=$slctdST[$i]?> value="<?=$i?>"> <?=$statusArr[$i]?>
                                            		</label>
                                            		<?
                                            		}
                                            		?>
                                            		</div>
                    </div>
                		</div>
                	</div>
                    
                    
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <i class="fa fa-search-plus"></i>
                  <h3 class="box-title">SEO Settings</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                	
                  	<div class="form-group">
                      <label>Meta Tag Title</label>
                      <input type="text" class="form-control" name="seo_title"  value="<?=unFormatData($mypage[8])?>">
                    </div>
                    <div class="form-group">
                      <label>Meta Tag Description</label>
                      <textarea class="form-control" rows="3" name="seo_desc"><?=unFormatData($mypage[9])?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Meta Tag Keywords</label>
                      <textarea class="form-control" rows="3" name="seo_keywords"><?=unFormatData($mypage[10])?></textarea>
                    </div>
                </div>
              </div>
            </div>
          </div>
         <div class="row">
            <div class="col-lg-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <i class="fa fa-file-text"></i>
                  <h3 class="box-title">Contents</h3>
                </div>
                <div class="box-body">
                <textarea id="contents" name="contents" rows="10" cols="80"><?=unFormatData($mypage[3])?></textarea>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save News</button>
                </div>
              </div>
            </div>
            
          </div>    
          </form>     
  		</section>
</div>
    
<?
include "_inc_footer.php";
include "_inc_crop_img.php";

?>
<script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {
        CKEDITOR.replace('contents');
        $(".date").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});

      });
</script> 
<script>
	function checkFrm(frm)
	{
		if (frm.title.value == '')
		{
			$('#title').addClass('has-error');
			$('input', $('#title')).focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	

	
</script>
</body>
</html>