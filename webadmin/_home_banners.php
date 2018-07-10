<?


include "_inc_session.php";


$_ACTIVE['home'] = $_ACTIVE['home_banners'] = 'active';





include "_inc_top.php";


if ($_POST['save-slider-settings'] > 0)


{


	unset($_POST['save-slider-settings']);


	


	foreach ($_POST as $k =>  $v)


	{


		$mysqlQuery  = "INSERT INTO `exceed_settings_vals` (`var`, `val`) VALUES ('".$k."','".$v."')";


		$mysqlQuery .= "ON DUPLICATE KEY UPDATE `val` = '".$v."'";


		mysql_query($mysqlQuery); 


		


	}


	$saved = 1;


}


else if (sizeof($_POST) > 0)


{





	$addObj['title'] = formatData($_POST['title']);


	$addObj['description'] = formatData($_POST['description']);


	$addObj['extraDescription'] = formatData($_POST['extraDescription']);


	


	


	$addObj['section'] = 'mainbanner';	


	$addObj['linkURL'] = formatData($_POST['linkURL']);


	$addObj['linkTarget'] = formatData($_POST['linkTarget']);


	$addObj['urlTitle'] = formatData($_POST['urlTitle']);


	$addObj['extraURL'] = formatData($_POST['extraURL']);


	$addObj['extraURLTarget'] = formatData($_POST['extraURLTarget']);





	if ($_FILES['photo']['tmp_name'] != '')


	{


		$addObj['photourl'] = "uploads/".md5(time()).".jpg";


		$addObj['orginalurl'] = "uploads/orginal_".md5(time()).".jpg";


		if ($_POST['id'] > 0)


		{


			$oldphotoa = getDetails('exceed_photos', 'id='.$_POST['id']);


			@unlink('../'.$oldphotoa[3]);


			@unlink('../'.$oldphotoa[4]);


			@unlink('../'.$oldphotoa[5]);


		}


	}


	


	


	if ($_POST['id'] > 0)


	{


		updateRecord('exceed_photos', $addObj, "id=".$_POST['id']);


		$photoID = $_POST['id'];


	}


	else


	{


		$addObj['order'] = getDefaultOrder('exceed_photos');


		$photoID = addRecord('exceed_photos', $addObj);


	}


	


	if ($_FILES['photo']['tmp_name'] != '')


	{


		$targetFileName = '../'.$addObj['orginalurl'];


		$photoFileName = '../'.$addObj['photourl'];


		


		move_uploaded_file($_FILES['photo']['tmp_name'],$targetFileName);


		


		corp_img($targetFileName,$photoFileName ,1680,700, $_FILES['photo']['name']);


	}		


		


    if ($_FILES['bannerlogo']['tmp_name'] != '')


	{


	    $targetLogo = "../uploads/banner_logo_".$photoID.".jpg";


		//$photoLogo = "../uploads/banner_logo_croped_".$photoID.".jpg";


	    move_uploaded_file($_FILES['bannerlogo']['tmp_name'],$targetLogo);


		//corp_img($targetLogo,$photoLogo ,100,100, $_FILES['bannerlogo']['name']);


	


	}





}


$data = getAllData('exceed_settings_vals', '1');


for ($i = 0; $i < sizeof($data); $i++)


{


	$_SETTINGS[$data[$i][0]] = unFormatData($data[$i][1]);


}


?>
<!-- Modal -->

<div class="modal fade" id="adminsform" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Caption Alignment </label>
                <select name="extraURLTarget" class="form-control">
                  <option value="right">Right</option>
                  <option  value="center">Center</option>
                  <option  value="left">Left</option>
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-md-8">
              <div class="form-group">
                <label>Title </label>
                <input name="title" class="form-control">
              </div>
            </div>
            <div class="col-xs-12 col-md-12">
              <div class="form-group">
                <label>Description</label>
                <input name="description" class="form-control">
              </div>
            </div>
            <div class="col-xs-12 col-md-12">
              <div class="form-group">
                <label>Photo <small>(1680 x 700)</small></label>
                <input type="file" name="photo">
              </div>
            </div>
            <div class="col-xs-12 col-md-4">
              <div class="form-group">
                <label>Read More Button Text</label>
                <input name="urlTitle" class="form-control">
              </div>
            </div>
            <div class="col-xs-12 col-md-5">
              <div class="form-group">
                <label>Read More Button URL</label>
                <input type="text" id="linkURL"  class="form-control page-selector" name="linkURL">
              </div>
            </div>
            <div class="col-xs-12 col-md-3">
              <div class="form-group">
                <label>URL Target</label>
                <select name="linkTarget" class="form-control">
                  <option value="_self">Same Window</option>
                  <option  value="_blank">New Window</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="save-image" value="1">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="content-wrapper">
  <section class="content-header"> <a href="javascript:;"  style="float:right;" onclick="return addForm('adminsform', 'Add New Photo');" data-toggle="modal" data-target="#adminsform"  class="btn btn-success"><i class="fa fa-plus fa-x1"></i> Add New Photo</a>
    <h1> Home Page Banners <small>Manage all photos of banner!</small> </h1>
  </section>
  <section class="content">
    <div class="row">
      <form method="post" role="form" enctype="multipart/form-data">
        <input type="hidden" name="save-slider-settings" value="1">
        <div class="col-lg-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Settings</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <?


                if ($saved > 0)


                {


                ?>
              <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Setting has been saved! </div>
              <?


                }


                ?>
              <div class="row">
                <div class="col-md-2" style="padding-top:7px;"> <strong>Slider Effect</strong> </div>
                <div class="col-md-2">
                  <select class="form-control" name="home-banner-effect">
                    <?


								$transEffects = array('random','sliceDown','sliceDownLeft','sliceUp','sliceUpLeft','sliceUpDown','sliceUpDownLeft','fold','fade','slideInRight','slideInLeft','boxRandom','boxRain','boxRainReverse','boxRainGrow','boxRainGrowReverse');


							$slctdTrans[$_SETTINGS['home-banner-effect']]='selected';


							for($i = 0; $i < sizeof($transEffects); $i++)


							{


								echo '<option value="'.$transEffects[$i].'" '.$slctdTrans[$transEffects[$i]].'>'.$transEffects[$i].'</option>';


							}


							?>
                  </select>
                </div>
                <div class="col-md-2"> &nbsp; &nbsp; &nbsp; </div>
                <div class="col-md-2" style="padding-top:7px;"> <strong>Rotating Duration</strong> </div>
                <div class="col-md-2">
                  <div class="input-group">
                    <input type="text" name="home-banner-time"  value="<?=unFormatData($_SETTINGS['home-banner-time'])?>" class="form-control">
                    <span class="input-group-addon">Seconds</span> </div>
                </div>
                <div class="col-md-1"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
                <div class="col-md-1">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Banners</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <?


                        


                        $activeStatus[0] = 'inactive-record';


                        $statusTitle = array('Show', 'Hide');


                        $statusIcon = array('eye', 'eye-slash');


                        


                        ?>
              <ul class="sortable-list list-unstyled">
                <?


                         $photos = getAllData('exceed_photos', "`section`='mainbanner' order by `order`");


                         for ($i = 0; $i < sizeof($photos); $i++)


                         {


                         $delCond = 'delete from `exceed_photos` where id='.$photos[$i][0];


                         ?>
                <div class="col-xs-12 col-md-4 col-lg-4 <?=$activeStatus[$photos[$i][11]]?>" id="<?=$photos[$i][0]?>" >
                  <li class=" panel panel-default " >
                    <div class="sortable-heading panel-body" style="position:relative;min-height:150px;background:url(../<?=$photos[$i][3]?>) center top no-repeat;background-size:contain">
                      <?


						    $bannerLogo = "../uploads/banner_logo_".$photos[$i][0].".jpg";


						    if (file_exists($bannerLogo)) 


						    {


						    ?>
                      <div style="position:absolute;left:0px;bottom:0px;background:rgba(0,0,0,0.5);" id="file<?=$photos[$i][0]?>"><a href="javascript:;" style="position:absolute;bottom:5px;left:5px;" onclick="deleteFile('<?=$photos[$i][0]?>', '', '<?=$bannerLogo?>')" class="btn btn-sm   btn-danger"><i class="fa fa-trash fa-fw"></i> </a><img src="<?=$bannerLogo?>"></div>
                      <?


						    }


						    ?>
                    </div>
                    <div class="panel-footer">
					 <a href="javascript:;" onclick="return cropImg('cropImg','../<?=$photos[$i][5]?>','../<?=$photos[$i][3]?>', '0|0|100|100','1680x700');" data-toggle="modal" data-target="#cropImg" class="btn btn-sm btn-success"><i data-toggle="tooltip" title="Crop Image"  class="fa fa-crop fa-fw"></i></a> 
					 <a href="javascript:;"  onclick="return editForm('adminsform', 'Edit Photo','exceed_photos', <?=$photos[$i][0]?>);" data-toggle="modal" data-target="#adminsform" class="btn btn-sm btn-warning"><i data-toggle="tooltip" title="Edit" class="fa fa-pencil fa-fw"></i></a> 
					 <a href="javascript:;" data-toggle="tooltip" title="<?=$statusTitle[$photos[$i][11]]?>"  onclick="swapStatus(<?=$photos[$i][0]?>, 'exceed_photos', $(this));" class="btn btn-sm   btn-info"><i class="fa fa-<?=$statusIcon[$photos[$i][11]]?> fa-fw"></i> </a> 
					 
					 
					 <a href="javascript:;" data-toggle="tooltip" title="Delete Banner"  onclick="deleteFunction('', <?=$photos[$i][0]?>, '<?=encodeRequest($delCond)?>');" class="btn btn-sm   btn-danger"><i class="fa fa-trash fa-fw"></i> </a> 
					 
					 
					 <a href="_copy_record.php?data=<?=encodeRequest('_home_banners.php|exceed_photos|'.$photos[$i][0])?>" onclick="return confirm('are you sure to duplicate this banner?');" data-toggle="tooltip" title="Duplicate Banner" class="btn btn-sm   btn-primary"><i class="fa fa-copy fa-fw"></i> </a> </div>
                  </li>
                </div>
                <?


					     }


					     ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?


include "_inc_footer.php";


include "_inc_crop_img.php";


include "_inc_img_viewer.php";


include "_inc_page_selector_list.php";











?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

      $(document).ready(function() {


        $('.sortable-list').sortable({


            handle: '.sortable-heading', 


            update: function(event, ui) {


                 	var newOrder = $(this).sortable('toArray').toString();


           			$.get('_saveorder_ajax.php', {tbl: 'exceed_photos',order:newOrder});


            }


        });


    });


      


     


</script>
</body></html>