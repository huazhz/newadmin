<?

session_start();

include_once ("../shared_code/connection.php");

include_once ("../shared_code/get.php");

include_once ("../shared_code/dml.php");

include_once ("../shared_code/formatFunctions.php");

include_once ("../shared_code/encoding.php");

include_once ("../shared_code/imageprocess.php");



if ($_SESSION['exceedAdmin'][0] <= 0)

{

	//include "_inc_loginfrm.php";

	//exit();

}



// this configrations will be managed in future from exceed webmaster



$homePageWidgets['home_banners'] = 'Main Banner Images';

//$homePageWidgets['home_alerts'] = ' Alerts Bar';



$homePageWidgets['home_services'] = 'Featured Services';

$homePageWidgets['home_contents'] = 'WYSIWYG Area 1';

$homePageWidgets['home_products'] = 'Featured Products';

$homePageWidgets['home_quality'] = 'Commitment to Quality';

$homePageWidgets['home_contents1'] = 'WYSIWYG Area 2';

$homePageWidgets['home_newsletter_subs'] = 'Newsletter Subscribers';



$avaialbleWigets['widget_banners'] = 'Inner Pages Banner';







$avaialbleApps['app_news'] = 'News & Updates';

$avaialbleApps['app_photos'] = 'Photo Galleries';

$avaialbleApps['app_vides'] = 'Videos Library';

$avaialbleApps['app_faq'] = 'F.A.Q <small><em>(Frequently Asked Questions)</em></small>';

$avaialbleApps['app_team_members'] = 'Team Members <small><em>(Staff Members)</em></small>';

$avaialbleApps['app_testimonials'] = 'Clients Testimonial Message';

$avaialbleApps['app_forms'] = 'Forms Entry';





?>