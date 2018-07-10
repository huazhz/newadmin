<?
include "_inc_session.php";
$_ACTIVE['pages'] = $_ACTIVE['pages_landing'] = 'active';
$customHeader = '<link rel="stylesheet" href="plugins/multiselect/bootstrap-multiselect.css" type="text/css">';


include "_inc_top.php";




if (sizeof($_POST) > 0)
{
	
	$addObj['title'] = formatData($_POST['title']);
	$addObj['contents'] = formatData($_POST['contents']);
	$addObj['pageURL'] = formatData($_POST['pageURL']);
	$addObj['status'] = $_POST['status'];

	$addObj['navigation'] = -1;
	$addObj['url'] = formatData($_POST['url']);
	$addObj['urltarget'] = $_POST['urltarget'];
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
	
	echo '<script>document.location.href="_pages_landing_frm.php?id='.$pageID.'&saved='.$saved.'&nav='.$_GET['nav'].'";</script>';
}


if ($_GET['id'] > 0)
{
		$addNewTitle = 'Edit';
		$mypage = getDetails('exceed_pages', 'id='.$_GET['id']);
		
		$pagesAppsArr = json_encode($mypage['pageapps'], true);
		$pagesSideNav = json_encode($mypage['sidenavpages'], true);
		
		$pageTilte = ' ('.$mypage[1].')';
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
            Page
          </h1>
          
          <ol class="breadcrumb">
            <li>CMS Pages</li>
            <li><a href="_pages_landing.php">Landing Pages</a></li>
            <li class="active"><?=$addNewTitle?> Page </li>
            
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
        <form method="post" onsubmit="return checkFrm(this)">
        <input type="hidden" name="id" value="<?=$mypage[0]?>">
        <div class="row">
            <div class="col-md-6">
            <?
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
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Save Page</button>
            </div>
          </div>      
          </form>     
  		</section>
</div>
    
<?
include "_inc_footer.php";
?>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
      $(function () {
        CKEDITOR.replace('contents');
        CKEDITOR.replace('sidehtmlcontents');
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
            filterBehavior: 'both'
  });
   $('#appsAfterContents').multiselect({
 	 		enableFiltering: true,
 	 		maxHeight: 300,
 	 		enableCollapsibleOptGroups: true,
            filterBehavior: 'both'
  });
  
   $('#appsBeforeSideContents').multiselect({
 	 		enableFiltering: true,
 	 		maxHeight: 300,
 	 		enableCollapsibleOptGroups: true,
            filterBehavior: 'both'
  });
   $('#appsAfterSideContents').multiselect({
 	 		enableFiltering: true,
 	 		maxHeight: 300,
 	 		enableCollapsibleOptGroups: true,
            filterBehavior: 'both'
  });
  
  setTimeout("$('span.caret-container', $('.multiselect-item')).html();", 1000);

  
  
});

</script>


</body>
</html>