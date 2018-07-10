<?
function getIconByCode($code)
{
   $icon = '';
  // echo "x=".$code;
   global $fontAwsomeIcon;
   foreach($fontAwsomeIcon as $k => $v)
   {
     if ($code == $v )
     {
      $icon = $k;
      break;
     }
   }
   return $icon;
}


function viewRateStars($rate)
{
	for ($i = 0; $i < round($rate); $i++)
	{
		$res .= '<i class="fa fa-star" aria-hidden="true"></i>';
	}
	if (round($rate) < $rate)
	$res .= '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
	
	for ($i=ceil($rate); $i < 5; $i++)
	{
		$res .= '<i class="fa fa-star-o" aria-hidden="true"></i>';	
	}
	return $res;
}

$fontAwsomeIcon['houzz'] = "f27c";
$fontAwsomeIcon['glass'] = "f000";
$fontAwsomeIcon['music'] = "f001";
$fontAwsomeIcon['search'] = "f002";
$fontAwsomeIcon['envelope-o'] = "f003";
$fontAwsomeIcon['heart'] = "f004";
$fontAwsomeIcon['star'] = "f005";
$fontAwsomeIcon['star-o'] = "f006";
$fontAwsomeIcon['user'] = "f007";
$fontAwsomeIcon['film'] = "f008";
$fontAwsomeIcon['th-large'] = "f009";
$fontAwsomeIcon['th'] = "f00a";
$fontAwsomeIcon['th-list'] = "f00b";
$fontAwsomeIcon['check'] = "f00c";
$fontAwsomeIcon['remove'] = $fontAwsomeIcon['close'] = $fontAwsomeIcon['times'] = "f00d";
$fontAwsomeIcon['search-plus'] = "f00e";
$fontAwsomeIcon['search-minus'] = "f010";
$fontAwsomeIcon['power-off'] = "f011";
$fontAwsomeIcon['signal'] = "f012";
$fontAwsomeIcon['gear'] = $fontAwsomeIcon['cog'] = "f013";
$fontAwsomeIcon['trash-o'] = "f014";
$fontAwsomeIcon['home'] = "f015";
$fontAwsomeIcon['file-o'] = "f016";
$fontAwsomeIcon['clock-o'] = "f017";
$fontAwsomeIcon['road'] = "f018";
$fontAwsomeIcon['download'] = "f019";
$fontAwsomeIcon['arrow-circle-o-down'] = "f01a";
$fontAwsomeIcon['arrow-circle-o-up'] = "f01b";
$fontAwsomeIcon['inbox'] = "f01c";
$fontAwsomeIcon['play-circle-o'] = "f01d";
$fontAwsomeIcon['rotate-right'] = $fontAwsomeIcon['repeat'] = "f01e";
$fontAwsomeIcon['refresh'] = "f021";
$fontAwsomeIcon['list-alt'] = "f022";
$fontAwsomeIcon['lock'] = "f023";
$fontAwsomeIcon['flag'] = "f024";
$fontAwsomeIcon['headphones'] = "f025";
$fontAwsomeIcon['volume-off'] = "f026";
$fontAwsomeIcon['volume-down'] = "f027";
$fontAwsomeIcon['volume-up'] = "f028";
$fontAwsomeIcon['qrcode'] = "f029";
$fontAwsomeIcon['barcode'] = "f02a";
$fontAwsomeIcon['tag'] = "f02b";
$fontAwsomeIcon['tags'] = "f02c";
$fontAwsomeIcon['book'] = "f02d";
$fontAwsomeIcon['bookmark'] = "f02e";
$fontAwsomeIcon['print'] = "f02f";
$fontAwsomeIcon['camera'] = "f030";
$fontAwsomeIcon['font'] = "f031";
$fontAwsomeIcon['bold'] = "f032";
$fontAwsomeIcon['italic'] = "f033";
$fontAwsomeIcon['text-height'] = "f034";
$fontAwsomeIcon['text-width'] = "f035";
$fontAwsomeIcon['align-left'] = "f036";
$fontAwsomeIcon['align-center'] = "f037";
$fontAwsomeIcon['align-right'] = "f038";
$fontAwsomeIcon['align-justify'] = "f039";
$fontAwsomeIcon['list'] = "f03a";
$fontAwsomeIcon['dedent'] = $fontAwsomeIcon['outdent'] = "f03b";
$fontAwsomeIcon['indent'] = "f03c";
$fontAwsomeIcon['video-camera'] = "f03d";
$fontAwsomeIcon['photo'] = $fontAwsomeIcon['image'] = $fontAwsomeIcon['picture-o'] = "f03e";
$fontAwsomeIcon['pencil'] = "f040";
$fontAwsomeIcon['map-marker'] = "f041";
$fontAwsomeIcon['adjust'] = "f042";
$fontAwsomeIcon['tint'] = "f043";
$fontAwsomeIcon['edit'] = $fontAwsomeIcon['pencil-square-o'] = "f044";
$fontAwsomeIcon['share-square-o'] = "f045";
$fontAwsomeIcon['check-square-o'] = "f046";
$fontAwsomeIcon['arrows'] = "f047";
$fontAwsomeIcon['step-backward'] = "f048";
$fontAwsomeIcon['fast-backward'] = "f049";
$fontAwsomeIcon['backward'] = "f04a";
$fontAwsomeIcon['play'] = "f04b";
$fontAwsomeIcon['pause'] = "f04c";
$fontAwsomeIcon['stop'] = "f04d";
$fontAwsomeIcon['forward'] = "f04e";
$fontAwsomeIcon['fast-forward'] = "f050";
$fontAwsomeIcon['step-forward'] = "f051";
$fontAwsomeIcon['eject'] = "f052";
$fontAwsomeIcon['chevron-left'] = "f053";
$fontAwsomeIcon['chevron-right'] = "f054";
$fontAwsomeIcon['plus-circle'] = "f055";
$fontAwsomeIcon['minus-circle'] = "f056";
$fontAwsomeIcon['times-circle'] = "f057";
$fontAwsomeIcon['check-circle'] = "f058";
$fontAwsomeIcon['question-circle'] = "f059";
$fontAwsomeIcon['info-circle'] = "f05a";
$fontAwsomeIcon['crosshairs'] = "f05b";
$fontAwsomeIcon['times-circle-o'] = "f05c";
$fontAwsomeIcon['check-circle-o'] = "f05d";
$fontAwsomeIcon['ban'] = "f05e";
$fontAwsomeIcon['arrow-left'] = "f060";
$fontAwsomeIcon['arrow-right'] = "f061";
$fontAwsomeIcon['arrow-up'] = "f062";
$fontAwsomeIcon['arrow-down'] = "f063";
$fontAwsomeIcon['mail-forward'] = $fontAwsomeIcon['share'] = "f064";
$fontAwsomeIcon['expand'] = "f065";
$fontAwsomeIcon['compress'] = "f066";
$fontAwsomeIcon['plus'] = "f067";
$fontAwsomeIcon['minus'] = "f068";
$fontAwsomeIcon['asterisk'] = "f069";
$fontAwsomeIcon['exclamation-circle'] = "f06a";
$fontAwsomeIcon['gift'] = "f06b";
$fontAwsomeIcon['leaf'] = "f06c";
$fontAwsomeIcon['fire'] = "f06d";
$fontAwsomeIcon['eye'] = "f06e";
$fontAwsomeIcon['eye-slash'] = "f070";
$fontAwsomeIcon['warning'] = $fontAwsomeIcon['exclamation-triangle'] = "f071";
$fontAwsomeIcon['plane'] = "f072";
$fontAwsomeIcon['calendar'] = "f073";
$fontAwsomeIcon['random'] = "f074";
$fontAwsomeIcon['comment'] = "f075";
$fontAwsomeIcon['magnet'] = "f076";
$fontAwsomeIcon['chevron-up'] = "f077";
$fontAwsomeIcon['chevron-down'] = "f078";
$fontAwsomeIcon['retweet'] = "f079";
$fontAwsomeIcon['shopping-cart'] = "f07a";
$fontAwsomeIcon['folder'] = "f07b";
$fontAwsomeIcon['folder-open'] = "f07c";
$fontAwsomeIcon['arrows-v'] = "f07d";
$fontAwsomeIcon['arrows-h'] = "f07e";
$fontAwsomeIcon['bar-chart-o'] = $fontAwsomeIcon['bar-chart'] = "f080";
$fontAwsomeIcon['twitter-square'] = "f081";
$fontAwsomeIcon['facebook-square'] = "f082";
$fontAwsomeIcon['camera-retro'] = "f083";
$fontAwsomeIcon['key'] = "f084";
$fontAwsomeIcon['gears'] = $fontAwsomeIcon['cogs'] = "f085";
$fontAwsomeIcon['comments'] = "f086";
$fontAwsomeIcon['thumbs-o-up'] = "f087";
$fontAwsomeIcon['thumbs-o-down'] = "f088";
$fontAwsomeIcon['star-half'] = "f089";
$fontAwsomeIcon['heart-o'] = "f08a";
$fontAwsomeIcon['sign-out'] = "f08b";
$fontAwsomeIcon['linkedin-square'] = "f08c";
$fontAwsomeIcon['thumb-tack'] = "f08d";
$fontAwsomeIcon['external-link'] = "f08e";
$fontAwsomeIcon['sign-in'] = "f090";
$fontAwsomeIcon['trophy'] = "f091";
$fontAwsomeIcon['github-square'] = "f092";
$fontAwsomeIcon['upload'] = "f093";
$fontAwsomeIcon['lemon-o'] = "f094";
$fontAwsomeIcon['phone'] = "f095";
$fontAwsomeIcon['square-o'] = "f096";
$fontAwsomeIcon['bookmark-o'] = "f097";
$fontAwsomeIcon['phone-square'] = "f098";
$fontAwsomeIcon['twitter'] = "f099";
$fontAwsomeIcon['facebook-f'] = $fontAwsomeIcon['facebook'] = "f09a";
$fontAwsomeIcon['github'] = "f09b";
$fontAwsomeIcon['unlock'] = "f09c";
$fontAwsomeIcon['credit-card'] = "f09d";
$fontAwsomeIcon['rss'] = "f09e";
$fontAwsomeIcon['hdd-o'] = "f0a0";
$fontAwsomeIcon['bullhorn'] = "f0a1";
$fontAwsomeIcon['bell'] = "f0f3";
$fontAwsomeIcon['certificate'] = "f0a3";
$fontAwsomeIcon['hand-o-right'] = "f0a4";
$fontAwsomeIcon['hand-o-left'] = "f0a5";
$fontAwsomeIcon['hand-o-up'] = "f0a6";
$fontAwsomeIcon['hand-o-down'] = "f0a7";
$fontAwsomeIcon['arrow-circle-left'] = "f0a8";
$fontAwsomeIcon['arrow-circle-right'] = "f0a9";
$fontAwsomeIcon['arrow-circle-up'] = "f0aa";
$fontAwsomeIcon['arrow-circle-down'] = "f0ab";
$fontAwsomeIcon['globe'] = "f0ac";
$fontAwsomeIcon['wrench'] = "f0ad";
$fontAwsomeIcon['tasks'] = "f0ae";
$fontAwsomeIcon['filter'] = "f0b0";
$fontAwsomeIcon['briefcase'] = "f0b1";
$fontAwsomeIcon['arrows-alt'] = "f0b2";
$fontAwsomeIcon['group'] = $fontAwsomeIcon['users'] = "f0c0";
$fontAwsomeIcon['chain'] = $fontAwsomeIcon['link'] = "f0c1";
$fontAwsomeIcon['cloud'] = "f0c2";
$fontAwsomeIcon['flask'] = "f0c3";
$fontAwsomeIcon['cut'] = $fontAwsomeIcon['scissors'] = "f0c4";
$fontAwsomeIcon['copy'] = $fontAwsomeIcon['files-o'] = "f0c5";
$fontAwsomeIcon['paperclip'] = "f0c6";
$fontAwsomeIcon['save'] = $fontAwsomeIcon['floppy-o'] = "f0c7";
$fontAwsomeIcon['square'] = "f0c8";
$fontAwsomeIcon['navicon'] = $fontAwsomeIcon['reorder'] = $fontAwsomeIcon['bars'] = "f0c9";
$fontAwsomeIcon['list-ul'] = "f0ca";
$fontAwsomeIcon['list-ol'] = "f0cb";
$fontAwsomeIcon['strikethrough'] = "f0cc";
$fontAwsomeIcon['underline'] = "f0cd";
$fontAwsomeIcon['table'] = "f0ce";
$fontAwsomeIcon['magic'] = "f0d0";
$fontAwsomeIcon['truck'] = "f0d1";
$fontAwsomeIcon['pinterest'] = "f0d2";
$fontAwsomeIcon['pinterest-square'] = "f0d3";
$fontAwsomeIcon['google-plus-square'] = "f0d4";
$fontAwsomeIcon['google-plus'] = "f0d5";
$fontAwsomeIcon['money'] = "f0d6";
$fontAwsomeIcon['caret-down'] = "f0d7";
$fontAwsomeIcon['caret-up'] = "f0d8";
$fontAwsomeIcon['caret-left'] = "f0d9";
$fontAwsomeIcon['caret-right'] = "f0da";
$fontAwsomeIcon['columns'] = "f0db";
$fontAwsomeIcon['unsorted'] = $fontAwsomeIcon['sort'] = "f0dc";
$fontAwsomeIcon['sort-down'] = $fontAwsomeIcon['sort-desc'] = "f0dd";
$fontAwsomeIcon['sort-up'] = $fontAwsomeIcon['sort-asc'] = "f0de";
$fontAwsomeIcon['envelope'] = "f0e0";
$fontAwsomeIcon['linkedin'] = "f0e1";
$fontAwsomeIcon['rotate-left'] = $fontAwsomeIcon['undo'] = "f0e2";
$fontAwsomeIcon['legal'] = $fontAwsomeIcon['gavel'] = "f0e3";
$fontAwsomeIcon['dashboard'] = $fontAwsomeIcon['tachometer'] = "f0e4";
$fontAwsomeIcon['comment-o'] = "f0e5";
$fontAwsomeIcon['comments-o'] = "f0e6";
$fontAwsomeIcon['flash'] = $fontAwsomeIcon['bolt'] = "f0e7";
$fontAwsomeIcon['sitemap'] = "f0e8";
$fontAwsomeIcon['umbrella'] = "f0e9";
$fontAwsomeIcon['paste'] = $fontAwsomeIcon['clipboard'] = "f0ea";
$fontAwsomeIcon['lightbulb-o'] = "f0eb";
$fontAwsomeIcon['exchange'] = "f0ec";
$fontAwsomeIcon['cloud-download'] = "f0ed";
$fontAwsomeIcon['cloud-upload'] = "f0ee";
$fontAwsomeIcon['user-md'] = "f0f0";
$fontAwsomeIcon['stethoscope'] = "f0f1";
$fontAwsomeIcon['suitcase'] = "f0f2";
$fontAwsomeIcon['bell-o'] = "f0a2";
$fontAwsomeIcon['coffee'] = "f0f4";
$fontAwsomeIcon['cutlery'] = "f0f5";
$fontAwsomeIcon['file-text-o'] = "f0f6";
$fontAwsomeIcon['building-o'] = "f0f7";
$fontAwsomeIcon['hospital-o'] = "f0f8";
$fontAwsomeIcon['ambulance'] = "f0f9";
$fontAwsomeIcon['medkit'] = "f0fa";
$fontAwsomeIcon['fighter-jet'] = "f0fb";
$fontAwsomeIcon['beer'] = "f0fc";
$fontAwsomeIcon['h-square'] = "f0fd";
$fontAwsomeIcon['plus-square'] = "f0fe";
$fontAwsomeIcon['angle-double-left'] = "f100";
$fontAwsomeIcon['angle-double-right'] = "f101";
$fontAwsomeIcon['angle-double-up'] = "f102";
$fontAwsomeIcon['angle-double-down'] = "f103";
$fontAwsomeIcon['angle-left'] = "f104";
$fontAwsomeIcon['angle-right'] = "f105";
$fontAwsomeIcon['angle-up'] = "f106";
$fontAwsomeIcon['angle-down'] = "f107";
$fontAwsomeIcon['desktop'] = "f108";
$fontAwsomeIcon['laptop'] = "f109";
$fontAwsomeIcon['tablet'] = "f10a";
$fontAwsomeIcon['mobile-phone'] = $fontAwsomeIcon['mobile'] = "f10b";
$fontAwsomeIcon['circle-o'] = "f10c";
$fontAwsomeIcon['quote-left'] = "f10d";
$fontAwsomeIcon['quote-right'] = "f10e";
$fontAwsomeIcon['spinner'] = "f110";
$fontAwsomeIcon['circle'] = "f111";
$fontAwsomeIcon['mail-reply'] = $fontAwsomeIcon['reply'] = "f112";
$fontAwsomeIcon['github-alt'] = "f113";
$fontAwsomeIcon['folder-o'] = "f114";
$fontAwsomeIcon['folder-open-o'] = "f115";
$fontAwsomeIcon['smile-o'] = "f118";
$fontAwsomeIcon['frown-o'] = "f119";
$fontAwsomeIcon['meh-o'] = "f11a";
$fontAwsomeIcon['gamepad'] = "f11b";
$fontAwsomeIcon['keyboard-o'] = "f11c";
$fontAwsomeIcon['flag-o'] = "f11d";
$fontAwsomeIcon['flag-checkered'] = "f11e";
$fontAwsomeIcon['terminal'] = "f120";
$fontAwsomeIcon['code'] = "f121";
$fontAwsomeIcon['mail-reply-all'] = $fontAwsomeIcon['reply-all'] = "f122";
$fontAwsomeIcon['star-half-empty'] = $fontAwsomeIcon['star-half-full'] = $fontAwsomeIcon['star-half-o'] = "f123";
$fontAwsomeIcon['location-arrow'] = "f124";
$fontAwsomeIcon['crop'] = "f125";
$fontAwsomeIcon['code-fork'] = "f126";
$fontAwsomeIcon['unlink'] = $fontAwsomeIcon['chain-broken'] = "f127";
$fontAwsomeIcon['question'] = "f128";
$fontAwsomeIcon['info'] = "f129";
$fontAwsomeIcon['exclamation'] = "f12a";
$fontAwsomeIcon['superscript'] = "f12b";
$fontAwsomeIcon['subscript'] = "f12c";
$fontAwsomeIcon['eraser'] = "f12d";
$fontAwsomeIcon['puzzle-piece'] = "f12e";
$fontAwsomeIcon['microphone'] = "f130";
$fontAwsomeIcon['microphone-slash'] = "f131";
$fontAwsomeIcon['shield'] = "f132";
$fontAwsomeIcon['calendar-o'] = "f133";
$fontAwsomeIcon['fire-extinguisher'] = "f134";
$fontAwsomeIcon['rocket'] = "f135";
$fontAwsomeIcon['maxcdn'] = "f136";
$fontAwsomeIcon['chevron-circle-left'] = "f137";
$fontAwsomeIcon['chevron-circle-right'] = "f138";
$fontAwsomeIcon['chevron-circle-up'] = "f139";
$fontAwsomeIcon['chevron-circle-down'] = "f13a";
$fontAwsomeIcon['html5'] = "f13b";
$fontAwsomeIcon['css3'] = "f13c";
$fontAwsomeIcon['anchor'] = "f13d";
$fontAwsomeIcon['unlock-alt'] = "f13e";
$fontAwsomeIcon['bullseye'] = "f140";
$fontAwsomeIcon['ellipsis-h'] = "f141";
$fontAwsomeIcon['ellipsis-v'] = "f142";
$fontAwsomeIcon['rss-square'] = "f143";
$fontAwsomeIcon['play-circle'] = "f144";
$fontAwsomeIcon['ticket'] = "f145";
$fontAwsomeIcon['minus-square'] = "f146";
$fontAwsomeIcon['minus-square-o'] = "f147";
$fontAwsomeIcon['level-up'] = "f148";
$fontAwsomeIcon['level-down'] = "f149";
$fontAwsomeIcon['check-square'] = "f14a";
$fontAwsomeIcon['pencil-square'] = "f14b";
$fontAwsomeIcon['external-link-square'] = "f14c";
$fontAwsomeIcon['share-square'] = "f14d";
$fontAwsomeIcon['compass'] = "f14e";
$fontAwsomeIcon['toggle-down'] = $fontAwsomeIcon['caret-square-o-down'] = "f150";
$fontAwsomeIcon['toggle-up'] = $fontAwsomeIcon['caret-square-o-up'] = "f151";
$fontAwsomeIcon['toggle-right'] = $fontAwsomeIcon['caret-square-o-right'] = "f152";
$fontAwsomeIcon['euro'] = $fontAwsomeIcon['eur'] = "f153";
$fontAwsomeIcon['gbp'] = "f154";
$fontAwsomeIcon['dollar'] = $fontAwsomeIcon['usd'] = "f155";
$fontAwsomeIcon['rupee'] = $fontAwsomeIcon['inr'] = "f156";
$fontAwsomeIcon['cny'] = $fontAwsomeIcon['rmb'] = $fontAwsomeIcon['yen'] = $fontAwsomeIcon['jpy'] = "f157";
$fontAwsomeIcon['ruble'] = $fontAwsomeIcon['rouble'] = $fontAwsomeIcon['rub'] = "f158";
$fontAwsomeIcon['won'] = $fontAwsomeIcon['krw'] = "f159";
$fontAwsomeIcon['bitcoin'] = $fontAwsomeIcon['btc'] = "f15a";
$fontAwsomeIcon['file'] = "f15b";
$fontAwsomeIcon['file-text'] = "f15c";
$fontAwsomeIcon['sort-alpha-asc'] = "f15d";
$fontAwsomeIcon['sort-alpha-desc'] = "f15e";
$fontAwsomeIcon['sort-amount-asc'] = "f160";
$fontAwsomeIcon['sort-amount-desc'] = "f161";
$fontAwsomeIcon['sort-numeric-asc'] = "f162";
$fontAwsomeIcon['sort-numeric-desc'] = "f163";
$fontAwsomeIcon['thumbs-up'] = "f164";
$fontAwsomeIcon['thumbs-down'] = "f165";
$fontAwsomeIcon['youtube-square'] = "f166";
$fontAwsomeIcon['youtube'] = "f167";
$fontAwsomeIcon['xing'] = "f168";
$fontAwsomeIcon['xing-square'] = "f169";
$fontAwsomeIcon['youtube-play'] = "f16a";
$fontAwsomeIcon['dropbox'] = "f16b";
$fontAwsomeIcon['stack-overflow'] = "f16c";
$fontAwsomeIcon['instagram'] = "f16d";
$fontAwsomeIcon['flickr'] = "f16e";
$fontAwsomeIcon['adn'] = "f170";
$fontAwsomeIcon['bitbucket'] = "f171";
$fontAwsomeIcon['bitbucket-square'] = "f172";
$fontAwsomeIcon['tumblr'] = "f173";
$fontAwsomeIcon['tumblr-square'] = "f174";
$fontAwsomeIcon['long-arrow-down'] = "f175";
$fontAwsomeIcon['long-arrow-up'] = "f176";
$fontAwsomeIcon['long-arrow-left'] = "f177";
$fontAwsomeIcon['long-arrow-right'] = "f178";
$fontAwsomeIcon['apple'] = "f179";
$fontAwsomeIcon['windows'] = "f17a";
$fontAwsomeIcon['android'] = "f17b";
$fontAwsomeIcon['linux'] = "f17c";
$fontAwsomeIcon['dribbble'] = "f17d";
$fontAwsomeIcon['skype'] = "f17e";
$fontAwsomeIcon['foursquare'] = "f180";
$fontAwsomeIcon['trello'] = "f181";
$fontAwsomeIcon['female'] = "f182";
$fontAwsomeIcon['male'] = "f183";
$fontAwsomeIcon['gittip'] = $fontAwsomeIcon['gratipay'] = "f184";
$fontAwsomeIcon['sun-o'] = "f185";
$fontAwsomeIcon['moon-o'] = "f186";
$fontAwsomeIcon['archive'] = "f187";
$fontAwsomeIcon['bug'] = "f188";
$fontAwsomeIcon['vk'] = "f189";
$fontAwsomeIcon['weibo'] = "f18a";
$fontAwsomeIcon['renren'] = "f18b";
$fontAwsomeIcon['pagelines'] = "f18c";
$fontAwsomeIcon['stack-exchange'] = "f18d";
$fontAwsomeIcon['arrow-circle-o-right'] = "f18e";
$fontAwsomeIcon['arrow-circle-o-left'] = "f190";
$fontAwsomeIcon['toggle-left'] = $fontAwsomeIcon['caret-square-o-left'] = "f191";
$fontAwsomeIcon['dot-circle-o'] = "f192";
$fontAwsomeIcon['wheelchair'] = "f193";
$fontAwsomeIcon['vimeo-square'] = "f194";
$fontAwsomeIcon['turkish-lira'] = $fontAwsomeIcon['try'] = "f195";
$fontAwsomeIcon['plus-square-o'] = "f196";
$fontAwsomeIcon['space-shuttle'] = "f197";
$fontAwsomeIcon['slack'] = "f198";
$fontAwsomeIcon['envelope-square'] = "f199";
$fontAwsomeIcon['wordpress'] = "f19a";
$fontAwsomeIcon['openid'] = "f19b";
$fontAwsomeIcon['institution'] = $fontAwsomeIcon['bank'] = $fontAwsomeIcon['university'] = "f19c";
$fontAwsomeIcon['mortar-board'] = $fontAwsomeIcon['graduation-cap'] = "f19d";
$fontAwsomeIcon['yahoo'] = "f19e";
$fontAwsomeIcon['google'] = "f1a0";
$fontAwsomeIcon['reddit'] = "f1a1";
$fontAwsomeIcon['reddit-square'] = "f1a2";
$fontAwsomeIcon['stumbleupon-circle'] = "f1a3";
$fontAwsomeIcon['stumbleupon'] = "f1a4";
$fontAwsomeIcon['delicious'] = "f1a5";
$fontAwsomeIcon['digg'] = "f1a6";
$fontAwsomeIcon['pied-piper'] = "f1a7";
$fontAwsomeIcon['pied-piper-alt'] = "f1a8";
$fontAwsomeIcon['drupal'] = "f1a9";
$fontAwsomeIcon['joomla'] = "f1aa";
$fontAwsomeIcon['language'] = "f1ab";
$fontAwsomeIcon['fax'] = "f1ac";
$fontAwsomeIcon['building'] = "f1ad";
$fontAwsomeIcon['child'] = "f1ae";
$fontAwsomeIcon['paw'] = "f1b0";
$fontAwsomeIcon['spoon'] = "f1b1";
$fontAwsomeIcon['cube'] = "f1b2";
$fontAwsomeIcon['cubes'] = "f1b3";
$fontAwsomeIcon['behance'] = "f1b4";
$fontAwsomeIcon['behance-square'] = "f1b5";
$fontAwsomeIcon['steam'] = "f1b6";
$fontAwsomeIcon['steam-square'] = "f1b7";
$fontAwsomeIcon['recycle'] = "f1b8";
$fontAwsomeIcon['automobile'] = $fontAwsomeIcon['car'] = "f1b9";
$fontAwsomeIcon['cab'] = $fontAwsomeIcon['taxi'] = "f1ba";
$fontAwsomeIcon['tree'] = "f1bb";
$fontAwsomeIcon['spotify'] = "f1bc";
$fontAwsomeIcon['deviantart'] = "f1bd";
$fontAwsomeIcon['soundcloud'] = "f1be";
$fontAwsomeIcon['database'] = "f1c0";
$fontAwsomeIcon['file-pdf-o'] = "f1c1";
$fontAwsomeIcon['file-word-o'] = "f1c2";
$fontAwsomeIcon['file-excel-o'] = "f1c3";
$fontAwsomeIcon['file-powerpoint-o'] = "f1c4";
$fontAwsomeIcon['file-photo-o'] = $fontAwsomeIcon['file-picture-o'] = $fontAwsomeIcon['file-image-o'] = "f1c5";
$fontAwsomeIcon['file-zip-o'] = $fontAwsomeIcon['file-archive-o'] = "f1c6";
$fontAwsomeIcon['file-sound-o'] = $fontAwsomeIcon['file-audio-o'] = "f1c7";
$fontAwsomeIcon['file-movie-o'] = $fontAwsomeIcon['file-video-o'] = "f1c8";
$fontAwsomeIcon['file-code-o'] = "f1c9";
$fontAwsomeIcon['vine'] = "f1ca";
$fontAwsomeIcon['codepen'] = "f1cb";
$fontAwsomeIcon['jsfiddle'] = "f1cc";
$fontAwsomeIcon['life-bouy'] = $fontAwsomeIcon['life-buoy'] = $fontAwsomeIcon['life-saver'] = $fontAwsomeIcon['support'] = $fontAwsomeIcon['life-ring'] = "f1cd";
$fontAwsomeIcon['circle-o-notch'] = "f1ce";
$fontAwsomeIcon['ra'] = $fontAwsomeIcon['rebel'] = "f1d0";
$fontAwsomeIcon['ge'] = $fontAwsomeIcon['empire'] = "f1d1";
$fontAwsomeIcon['git-square'] = "f1d2";
$fontAwsomeIcon['git'] = "f1d3";
$fontAwsomeIcon['hacker-news'] = "f1d4";
$fontAwsomeIcon['tencent-weibo'] = "f1d5";
$fontAwsomeIcon['qq'] = "f1d6";
$fontAwsomeIcon['wechat'] = $fontAwsomeIcon['weixin'] = "f1d7";
$fontAwsomeIcon['send'] = $fontAwsomeIcon['paper-plane'] = "f1d8";
$fontAwsomeIcon['send-o'] = $fontAwsomeIcon['paper-plane-o'] = "f1d9";
$fontAwsomeIcon['history'] = "f1da";
$fontAwsomeIcon['genderless'] = $fontAwsomeIcon['circle-thin'] = "f1db";
$fontAwsomeIcon['header'] = "f1dc";
$fontAwsomeIcon['paragraph'] = "f1dd";
$fontAwsomeIcon['sliders'] = "f1de";
$fontAwsomeIcon['share-alt'] = "f1e0";
$fontAwsomeIcon['share-alt-square'] = "f1e1";
$fontAwsomeIcon['bomb'] = "f1e2";
$fontAwsomeIcon['soccer-ball-o'] = $fontAwsomeIcon['futbol-o'] = "f1e3";
$fontAwsomeIcon['tty'] = "f1e4";
$fontAwsomeIcon['binoculars'] = "f1e5";
$fontAwsomeIcon['plug'] = "f1e6";
$fontAwsomeIcon['slideshare'] = "f1e7";
$fontAwsomeIcon['twitch'] = "f1e8";
$fontAwsomeIcon['yelp'] = "f1e9";
$fontAwsomeIcon['newspaper-o'] = "f1ea";
$fontAwsomeIcon['wifi'] = "f1eb";
$fontAwsomeIcon['calculator'] = "f1ec";
$fontAwsomeIcon['paypal'] = "f1ed";
$fontAwsomeIcon['google-wallet'] = "f1ee";
$fontAwsomeIcon['cc-visa'] = "f1f0";
$fontAwsomeIcon['cc-mastercard'] = "f1f1";
$fontAwsomeIcon['cc-discover'] = "f1f2";
$fontAwsomeIcon['cc-amex'] = "f1f3";
$fontAwsomeIcon['cc-paypal'] = "f1f4";
$fontAwsomeIcon['cc-stripe'] = "f1f5";
$fontAwsomeIcon['bell-slash'] = "f1f6";
$fontAwsomeIcon['bell-slash-o'] = "f1f7";
$fontAwsomeIcon['trash'] = "f1f8";
$fontAwsomeIcon['copyright'] = "f1f9";
$fontAwsomeIcon['at'] = "f1fa";
$fontAwsomeIcon['eyedropper'] = "f1fb";
$fontAwsomeIcon['paint-brush'] = "f1fc";
$fontAwsomeIcon['birthday-cake'] = "f1fd";
$fontAwsomeIcon['area-chart'] = "f1fe";
$fontAwsomeIcon['pie-chart'] = "f200";
$fontAwsomeIcon['line-chart'] = "f201";
$fontAwsomeIcon['lastfm'] = "f202";
$fontAwsomeIcon['lastfm-square'] = "f203";
$fontAwsomeIcon['toggle-off'] = "f204";
$fontAwsomeIcon['toggle-on'] = "f205";
$fontAwsomeIcon['bicycle'] = "f206";
$fontAwsomeIcon['bus'] = "f207";
$fontAwsomeIcon['ioxhost'] = "f208";
$fontAwsomeIcon['angellist'] = "f209";
$fontAwsomeIcon['cc'] = "f20a";
$fontAwsomeIcon['shekel'] = $fontAwsomeIcon['sheqel'] = $fontAwsomeIcon['ils'] = "f20b";
$fontAwsomeIcon['meanpath'] = "f20c";
$fontAwsomeIcon['buysellads'] = "f20d";
$fontAwsomeIcon['connectdevelop'] = "f20e";
$fontAwsomeIcon['dashcube'] = "f210";
$fontAwsomeIcon['forumbee'] = "f211";
$fontAwsomeIcon['leanpub'] = "f212";
$fontAwsomeIcon['sellsy'] = "f213";
$fontAwsomeIcon['shirtsinbulk'] = "f214";
$fontAwsomeIcon['simplybuilt'] = "f215";
$fontAwsomeIcon['skyatlas'] = "f216";
$fontAwsomeIcon['cart-plus'] = "f217";
$fontAwsomeIcon['cart-arrow-down'] = "f218";
$fontAwsomeIcon['diamond'] = "f219";
$fontAwsomeIcon['ship'] = "f21a";
$fontAwsomeIcon['user-secret'] = "f21b";
$fontAwsomeIcon['motorcycle'] = "f21c";
$fontAwsomeIcon['street-view'] = "f21d";
$fontAwsomeIcon['heartbeat'] = "f21e";
$fontAwsomeIcon['venus'] = "f221";
$fontAwsomeIcon['mars'] = "f222";
$fontAwsomeIcon['mercury'] = "f223";
$fontAwsomeIcon['transgender'] = "f224";
$fontAwsomeIcon['transgender-alt'] = "f225";
$fontAwsomeIcon['venus-double'] = "f226";
$fontAwsomeIcon['mars-double'] = "f227";
$fontAwsomeIcon['venus-mars'] = "f228";
$fontAwsomeIcon['mars-stroke'] = "f229";
$fontAwsomeIcon['mars-stroke-v'] = "f22a";
$fontAwsomeIcon['mars-stroke-h'] = "f22b";
$fontAwsomeIcon['neuter'] = "f22c";
$fontAwsomeIcon['facebook-official'] = "f230";
$fontAwsomeIcon['pinterest-p'] = "f231";
$fontAwsomeIcon['whatsapp'] = "f232";
$fontAwsomeIcon['server'] = "f233";
$fontAwsomeIcon['user-plus'] = "f234";
$fontAwsomeIcon['user-times'] = "f235";
$fontAwsomeIcon['hotel'] = $fontAwsomeIcon['bed'] = "f236";
$fontAwsomeIcon['viacoin'] = "f237";
$fontAwsomeIcon['train'] = "f238";
$fontAwsomeIcon['subway'] = "f239";
$fontAwsomeIcon['medium'] = "f23a";

?>