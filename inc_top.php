<?
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlStr = str_replace($sitePath, '', $actual_link);
$removeString = array('http://', 'https://', 'www.');
$urlStr = str_replace($removeString, '', $urlStr);
$customSEO = getDetails('exceed_custom_seo', "urlKey LIKE '%".$urlStr."'");
if ($customSEO[2] != '') $_SETTINGS['seo-title'] = $customSEO[2];
if ($customSEO[3] != '') $_SETTINGS['seo-keywords'] = $customSEO[3];
if ($customSEO[4] != '') $_SETTINGS['seo-desc'] = $customSEO[4]; 
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?=$sitePath?>favicon.ico" type="image/x-icon" />
<title><?=$_SETTINGS['seo-title']?></title>
<meta name="keywords"  content="<?=$_SETTINGS['seo-keywords']?>">
<meta name="description"  content="<?=$_SETTINGS['seo-desc']?>">  


<link rel="stylesheet" href="<?=$sitePath?>foundation/css/foundation.css">
<link rel="stylesheet" href="<?=$sitePath?>css/style.css">
<link rel="stylesheet" href="<?=$sitePath?>css/responsive.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Asap:400,500,700|NTR" rel="stylesheet">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="<?=$sitePath?>plugins/swiper/css/swiper.min.css">

<style><?=unFormatData($_SETTINGS['css-settings-all-website'])?></style>

<script src="<?=$sitePath?>js/jquery-2.1.4.min.js"></script> 
<script src="<?=$sitePath?>js/custom.js"></script> 
<!-- Swiper JS --> 
<script src="<?=$sitePath?>plugins/swiper/js/swiper.min.js"></script> 
<!-- Initialize Swiper --> 
<script>
    var swiper = new Swiper('.main-slider', {
       // pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 0,
        centeredSlides: true,
        //autoplay: 2500,
        autoplayDisableOnInteraction: false
    });
</script> 

<!-- Preloader --> 
<script type="text/javascript">
	//<![CDATA[
		$(window).on('load', function() { // makes sure the whole site is loaded 
			$('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
		})
	//]]>
</script>

<?=stripslashes($_SETTINGS['add-on-javascript-header'])?>

</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<header id="header">
  <div class="row">
    <div class="logo"><a href="<?=$sitePath?>"><img src="<?=$sitePath?>images/imadecs-logo.png" alt="iMadecs" /></a></div>
    <div id="slide-menu"> <i class="fa fa-times slide-menu-close hide-for-large" aria-hidden="true"></i>
      
        <? include "inc_main_menu.php"; ?>
      
      <div class="quick-links"> <a class="expert-portal" href="#"><em></em> Expert Portal</a> <a class="client-portal" href="#"><em></em> Client Portal</a> </div>
    </div>
  </div>
</header>
<div class="skip-header">
  <div class="row">
    <ul class="link">
      <li class="menu-bars"><i class="fa fa-bars hide-for-large" aria-hidden="true"></i></li>
      <li class="search"> <span class="search-input"> <em class="fa fa-times search-input-close hide-for-large" aria-hidden="true"></em>
        <input type="text" placeholder="Search"/>
        </span><i class="fa fa-search" aria-hidden="true"></i></li>
      <li class="joinus"> <a href="javascript:void(0);">Join Us</a>
        <div class="skip-form skip-header-dd"> <i class="fa fa-times skip-form-close hide-for-large" aria-hidden="true"></i>
          <header>Join us to receive <br>
            our latest news!</header>
          <input type="text" placeholder="First Name" />
          <input type="text" placeholder="Last Name" />
          <input type="email" placeholder="Email Address" />
          <input class="button primary" type="submit" value="SUBMIT" />
        </div>
      </li>
      <li class="email"><a href="tel:<?=unFormatData(nl2br($_SETTINGS['footer-contacts-phone']))?>"><i class="fa fa-phone" aria-hidden="true"></i> <span class="hide-for-small-only"><?=unFormatData(nl2br($_SETTINGS['footer-contacts-phone']))?></span> </a></li>
      <li class="phone"><a href="email:<?=unFormatData(nl2br($_SETTINGS['footer-contacts-email']))?>"><i class="fa fa-envelope" aria-hidden="true"></i> <span class="hide-for-small-only"><?=unFormatData(nl2br($_SETTINGS['footer-contacts-email']))?></span></a></li>
    </ul>
  </div>
</div>

<div id="wrapper">


 <?
			if ($navID == 1)
			include "inc_slider.php";
			?>