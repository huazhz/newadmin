<?
include "_inc_session.php";

$navDetails = getDetails('exceed_navigation', "url='".$_GET['nav']."'"); 


if ($navDetails[0] < 0) exit();
$_ACTIVE['pages'] = $_ACTIVE['pages_'.$navDetails[0]] = 'active';
$customHeader = '<link rel="stylesheet" href="plugins/multiselect/bootstrap-multiselect.css" type="text/css">';


include "_inc_top.php";

if ($customPageLable[$navDetails[0]] == '') $customPageLable[$navDetails[0]] = 'Page';



if (sizeof($_POST) > 0)
{
	
	$addObj['title'] = formatData($_POST['title']);
	$addObj['contents'] = formatData($_POST['contents']);
	$addObj['pageURL'] = formatData($_POST['pageURL']);
	$addObj['status'] = $_POST['status'];
	$addObj['pagestyle'] = $_POST['pagestyle'];

	$addObj['navigation'] = $navDetails[0];
	$addObj['url'] = formatData($_POST['url']);
	$addObj['urltarget'] = $_GET['urltarget'];
	$addObj['seo_title'] = formatData($_POST['seo_title']);
	$addObj['seo_keywords'] = formatData($_POST['seo_keywords']);
	$addObj['seo_desc'] = formatData($_POST['seo_desc']);

	$addObj['sidehtmlcontents'] = formatData($_POST['sidehtmlcontents']);
	$addObj['innerbannerid'] = $_POST['innerbannerid'];
	
	
	$addObj['sidenavpages'] = json_encode($_POST['pageapps']);
	
	$pageapps[0] = $_POST['appsBeforeContents'];
	$pageapps[1] = $_POST['appsAfterContents'];

	
	$addObj['pageapps'] = json_encode($pageapps);

	$pageapps2[0] = $_POST['appsBeforeSideContents'];
	$pageapps2[1] = $_POST['appsAfterSideContents'];
	$addObj['sidenavpages'] = json_encode($pageapps2);
		

	if ($_POST['id'] > 0)
	{
		updateRecord('exceed_pages', $addObj, 'id='.$_POST['id']);
		$pageID = $_POST['id'];
		$saved = mysql_affected_rows ();
	}
	else
	{
		if ($addObj['pageURL'] == '') $addObj['pageURL'] = formatSEOTxt($addObj['title']).time();
		$addObj['order'] = getDefaultOrder('exceed_pages');
		$saved = addRecord('exceed_pages', $addObj);
		$pageID = $saved ;
	}
	
	
	echo '<script>document.location.href="_pages_frm.php?id='.$pageID.'&saved='.$saved.'&nav='.$_GET['nav'].'&c='.$_GET['c'].'";</script>';
}


if ($_GET['id'] > 0)
{
		$addNewTitle = 'Edit';
		$mypage = getDetails('exceed_pages', 'id='.$_GET['id']);
		
		$pagesAppsArr = json_encode($mypage['pageapps'], true);
		$pagesSideNav = json_encode($mypage['sidenavpages'], true);
		
		$pageTilte = ' ('.$mypage[1].')';
		
		$extendedVals = getAllData('exceed_pages_extendedvalues', "pageID=".$mypage[0]);
		for ($i = 0; $i < sizeof($extendedVals); $i++)
		{
			$_extendedPageVars[$extendedVals[$i][2]] = $extendedVals[$i][3];
			if (is_numeric($extendedVals[$i][3]))
			$slctdEXV[$extendedVals[$i][2]][$extendedVals[$i][3]] = 'selected';	
		}
		
}
else
{
		$addNewTitle = 'Add New ';
}


?>
<div class="content-wrapper">
        <section class="content-header">
        
          <h1>
            <?=$addNewTitle?>
            <?=$customPageLable[$navDetails[0]]?>
          </h1>
          
          <ol class="breadcrumb">
            <li>CMS Pages</li>
            <li><a href="_pages_list.php?nav=<?=$_GET['nav']?>"><?=$navDetails[1]?></a></li>
            <li class="active"><?=$addNewTitle?> <?=$customPageLable[$navDetails[0]]?></li>
            
          </ol>
          
        </section>
        <section class="content">
        		<?
                if ($_GET['saved'] > 0)
                {
                ?>
                <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?=$customPageLable[$navDetails[0]]?> has beed saved!
                            </div>
                <?
                }
                ?>
        <form method="post" onsubmit="return checkFrm(this)"   enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$mypage[0]?>">
        <div class="row">
            <div class="col-md-6">
            <?
            if ($customContentsNavBasicDetails[$navDetails[0]] != '')
            	include $customContentsNavBasicDetails[$navDetails[0]];
            else
            include "_cms_inc_page_basic_details.php";
            ?>
            </div>
            <div class="col-md-6 ">
            <?
            if ($customContentsNavMoreDetails[$navDetails[0]] != '')
            	include $customContentsNavMoreDetails[$navDetails[0]];
            else
            include "_cms_inc_page_more_details.php";
            ?>
            </div>
            <?
            if ($customContentsNav[$navDetails[0]] != '')
            	include $customContentsNav[$navDetails[0]];
            else
            {
            	include "_cms_inc_page_contents.php";
            	include "_cms_inc_page_side_nav.php";
            }	
            	
            ?>
       </div>

         <div class="row">
            <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save <?=$customPageLable[$navDetails[0]]?></button>
            </div>
          </div>      
          </form>     
  		</section>
</div>
    
<?
include "_inc_crop_img.php";

include "_inc_footer.php";
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {
        CKEDITOR.replace('contents');
        CKEDITOR.replace('sidehtmlcontents');
        <?=$additionalEditors?>
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

<script type="text/javascript" src="plugins/multiselect/bootstrap-multiselect.js"></script>

<script>
$(document).ready(function() {

  
   $('#appsBeforeContents').multiselect({
 	 		enableFiltering: true,
 	 		maxHeight: 300,
 	 		enableCollapsibleOptGroups: true,
            filterBehavior: 'both',
            buttonContainer: '<div id="appsBeforeContents-collapsed-container" />',
			onDropdownShown: function() {
                $('#appsBeforeContents-collapsed-container .caret-container').click();
            },
			onDropdownHidden: function() {
                $('#appsBeforeContents-collapsed-container .caret-container').click();
            }
  });
   $('#appsAfterContents').multiselect({
 	 		enableFiltering: true,
 	 		maxHeight: 300,
 	 		enableCollapsibleOptGroups: true,
            filterBehavior: 'both',
            buttonContainer: '<div id="appsAfterContents-collapsed-container" />',
			onDropdownShown: function() {
                $('#appsAfterContents-collapsed-container .caret-container').click();
            },
			onDropdownHidden: function() {
                $('#appsAfterContents-collapsed-container .caret-container').click();
            }
  });
  
   $('#appsBeforeSideContents').multiselect({
 	 		enableFiltering: true,
 	 		maxHeight: 300,
 	 		enableCollapsibleOptGroups: true,
            filterBehavior: 'both',
            buttonContainer: '<div id="appsBeforeSideContents-collapsed-container" />',
			onDropdownShown: function() {
                $('#appsBeforeSideContents-collapsed-container .caret-container').click();
            },
			onDropdownHidden: function() {
                $('#appsBeforeSideContents-collapsed-container .caret-container').click();
            }
  });
   $('#appsAfterSideContents').multiselect({
 	 		enableFiltering: true,
 	 		maxHeight: 300,
 	 		enableCollapsibleOptGroups: true,
            filterBehavior: 'both',
            buttonContainer: '<div id="appsAfterSideContents-collapsed-container" />',
			onDropdownShown: function() {
                $('#appsAfterSideContents-collapsed-container .caret-container').click();
            },
			onDropdownHidden: function() {
                $('#appsAfterSideContents-collapsed-container .caret-container').click();
            }
  });
  
  setTimeout("$('span.caret-container', $('.multiselect-item')).html();", 1000);

  
  
});


function loadFloorPlans(c)
{
		$.get("_edit_ajax.php", {  op:'LoadFloorPlans', c:  c},
			function(data){
			$('#community-floorplans').html(data);
		});
}

function checkAutoLocation()
{
	if ($('#addressGeo').val() == '')
	{
		var url = "https://maps.googleapis.com/maps/api/geocode/json?address="+encodeURIComponent($('#addressTxt').val())+"&key=AIzaSyASvN2fM2nhnlG7VLMd1UWxU8K-X185k3k";
		
		
		if (confirm('Do you like the system to try auto locate the address?\n if address is not 100% accurate you can update it in the next feild.'))
		{
			$('#addressGeo').val('Please wait..');
			$.getJSON(url, function (data) {
			$('#addressGeo').val(data.results[0].geometry.location.lat+','+data.results[0].geometry.location.lng);
			});
		}
	}
}


</script>


</body>
</html>