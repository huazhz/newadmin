<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>eXceedCMS | Wilmad LabGlass</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />    
    <link href="../fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />   
    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="css/black.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="plugins/multiselect/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
    <link href="colorbox/colorbox.css" rel="stylesheet" type="text/css" media="all" />
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <?=$customHeader?>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <div id="pageloader"></div>
  <body class="skin-black">
    <div class="wrapper">
      <header class="main-header">
        <a href="index.php" class="logo"><b>Wilmad LabGlass</b></a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            	<li>
            	<a href="<?=$sitePath?>" target="_blank" >
                  <i class="fa fa-search-plus-o"></i> Preview Live Website
                  </a>
            	</li>
            	<li>
            	<a href="http://www.exceedcms.com/#contact" target="_blank" >
                  <i class="fa fa-comments-o"></i> Contact eXceed Support
                  </a>
            	</li>
            	
            	
              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Welcome Back, <span class="hidden-xs"><?=$_SESSION['exceedAdmin'][1]?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <p>
                      <?=$_SESSION['exceedAdmin'][1]?>
                      <small><?=$_SESSION['exceedAdmin'][2]?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="_cp_pwd.php" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="_logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="<?=$_ACTIVE['settings']?> treeview">
              <a href="#"><i class="fa fa-gear"></i> <span>Website Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li class="<?=$_ACTIVE['settings_header']?>"><a href="_settings_header.php"><i class="fa fa-circle-o"></i>  Header Settings</a></li>
               <li class="<?=$_ACTIVE['settings_nav']?>"><a href="_settings_nav.php"><i class="fa fa-circle-o"></i>  Main Navigation Menu</a></li>
                <li class="<?=$_ACTIVE['settings_footer']?>"><a href="_settings_footer.php"><i class="fa fa-circle-o"></i>  Footer Settings</a></li>
                <li class="<?=$_ACTIVE['settings_seo']?>"><a href="_settings_seo.php"><i class="fa fa-circle-o"></i>  Default SEO Settings</a></li>
                <li class="<?=$_ACTIVE['settings_cseo']?>"><a href="_settings_cseo.php"><i class="fa fa-circle-o"></i>  Custom Page SEO</a></li>
                <li class="<?=$_ACTIVE['settings_curl']?>"><a href="_settings_curl.php"><i class="fa fa-circle-o"></i>  Custom Short URL</a></li>
                
              </ul>
            </li>
            
           <li class="<?=$_ACTIVE['home']?> treeview">
              <a href="#">
                <i class="fa fa-home"></i>
                <span>Website Home Page</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
			  <?
              foreach($homePageWidgets as $appeditURL => $appTitle)
              {
              ?>
              <li class="<?=$_ACTIVE[$appeditURL]?>"><a href="_<?=$appeditURL?>.php"><i class="fa fa-circle-o"></i> <?=$appTitle?> </a></li>
              <?
              }
              ?>               
              </ul>
            </li>
            <li class="<?=$_ACTIVE['pages']?> treeview">
              <a href="#">
                <i class="fa fa-file-text-o"></i>
                <span>Website Pages</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?
              $cmsPages = getAllData('exceed_navigation', '1 order by `order`');
              for ($i = 1; $i < sizeof($cmsPages); $i++)
              {
              ?>
              <li class="<?=$_ACTIVE['pages_'.$cmsPages[$i][0]]?>"><a href="_pages_list.php?nav=<?=$cmsPages[$i][5]?>"><i class="fa fa-circle-o"></i> <?=$cmsPages[$i][1]?></a></li>
              <?
              }
              ?>
              <li class="<?=$_ACTIVE['pages_landing']?>"><a href="_pages_landing.php"><i class="fa fa-circle-o"></i> Landing Pages</a></li>
              </ul>
            </li>
            
             <li class="<?=$_ACTIVE['app']?> treeview">
              <a href="#">
                <i class="fa fa-wrench"></i>
                <span>Widgets & Applications</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?
              
              /*
              foreach($avaialbleWigets as $appeditURL => $appTitle)
              {
              ?>
              <li class="<?=$_ACTIVE[$appeditURL]?>"><a href="_<?=$appeditURL?>.php"><i class="fa fa-circle-o"></i> <?=$appTitle?> </a></li>
              <?
              }
              
              ?>
              <div style="border-bottom:1px solid #444;height:0px"></div>
			  <?
			  */
              foreach($avaialbleApps as $appeditURL => $appTitle)
              {
              ?>
              <li class="<?=$_ACTIVE[$appeditURL]?>"><a href="_<?=$appeditURL?>.php"><i class="fa fa-circle-o"></i> <?=$appTitle?> </a></li>
              <?
              }
              ?>              
              </ul>
            </li>
           <!-- 
            <li class="<?=$_ACTIVE['blog']?> treeview">
              <a href="#">
                <i class="fa fa-newspaper-o"></i>
                <span>Blog</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?=$_ACTIVE['blog_settings']?>"><a href="_blog_settings.php"><i class="fa fa-circle-o"></i>Blog Settings</a></li>
                <li class="<?=$_ACTIVE['blog_cats']?>"><a href="_blog_cats.php"><i class="fa fa-circle-o"></i>Categories</a></li>
                <li class="<?=$_ACTIVE['blog_tags']?>"><a href="_blog_tags.php"><i class="fa fa-circle-o"></i>Tags (Labels or Keywords)</a></li>
                <li class="<?=$_ACTIVE['blog_posts']?>"><a href="_blog_posts.php"><i class="fa fa-circle-o"></i>Posts</a></li>
                <li class="<?=$_ACTIVE['blog_comments']?>"><a href="_blog_comments.php"><i class="fa fa-circle-o"></i>New Comments</a></li>
                <li class="<?=$_ACTIVE['blog_comments_archive']?>"><a href="_blog_comments_archive.php"><i class="fa fa-circle-o"></i>Comments Archive</a></li>
              </ul>
            </li>
            -->
            <li class="<?=$_ACTIVE['cp']?> treeview">
              <a href="#"><i class="fa fa-user-secret"></i> <span>Administrator Tools</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              		<li class="<?=$_ACTIVE['cp_files']?>"><a href="_cp_files.php"><i class="fa fa-circle-o"></i>  Upload Center</a></li>
              		<li class="<?=$_ACTIVE['cp_css']?>"><a href="_cp_css.php"><i class="fa fa-circle-o"></i>  Custom CSS File</a></li>
              		<li class="<?=$_ACTIVE['cp_addjs']?>"><a href="_cp_addjs.php"><i class="fa fa-circle-o"></i>  Add-on Scripts</a></li>
                <li class="<?=$_ACTIVE['cp_users']?>"><a href="_cp_users.php"><i class="fa fa-circle-o"></i>  Webadmin Users</a></li>
                <li class="<?=$_ACTIVE['cp_pwd']?>"><a href="_cp_pwd.php"><i class="fa fa-circle-o"></i>  Change Password</a></li>
                <li><a href="_logout.php"><i class="fa fa-circle-o"></i>  Logout</a></li>
              </ul>
            </li>
             
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>