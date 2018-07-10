<?
function emailize($str)
{
    $mail_pattern = "/([A-z0-9_-]+\@[A-z0-9_-]+\.)([A-z0-9\_\-\.]{1,}[A-z])/";

    $str = preg_replace($mail_pattern, '<a href="mailto:$1$2">$1$2</a>', $str);

    return $str;
}

function formatNumber($number)
{
	return number_format ($number , 2, '.',',');
}

function addsitepath($url, $sitepath = 'http://') {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = $sitepath. $url;
    }
    return $url;
}


function formatSEOTxt($txt)
{
	
	$txt= stripslashes($txt);
	$replaceChars1 = array ('&#243;', ' ','"', '&', "'", '/');
	$replaceChars2 = array ('o','-','', 'and', '', '');
	
	$txt = str_replace($replaceChars1 , $replaceChars2  , $txt);
	return strtolower(preg_replace("/[^a-zA-Z\-]+/", "", $txt));
}
function findHowLongDays($mktimeDate)
{
	$now = time();
	$diff = $now- $mktimeDate;
	$diff2M = round($diff / 60);
	if ($diff2M < 60) return $diff2M.' minutes';
	else
	{
		$diff2H = round($diff2M / 60);
		if ($diff2H <= 1) return '1 hour';
		else if ($diff2H < 24) return $diff2H.' hours';
		else
		{
			$diff2D = round($diff2H / 24);
			if ($diff2D <= 1) return '1 day';
			else if ($diff2D <= 30) return $diff2D.' days';
			else return 'more than 30 days';
		}	
	}
}

function findRemainingTime($date)
{
	$seconds =$date-time();
	$days = floor($seconds / 86400);
	$seconds %= 86400;
	
	$hours = floor($seconds / 3600);
	$seconds %= 3600;
	
	$minutes = floor($seconds / 60);

	if ($days > 1) $res = '<b>'.$days.'</b>Days ';
	else if ($days == 1) $res = '<b>'.$days.'</b>Day ';

	if ($hours > 1) $res .= '<b>'.$hours.'</b>Hours ';
	else if ($days == 1) $res .= '<b>'.$hours.'</b>Hour ';
	
	if ($minutes > 1) $res .= '<b>'.$minutes.'</b>Minutes ';
	else if ($minutes == 1) $res .= '<b>'.$minutes.'</b>Minute ';

	
	return $res;

}
function getYoutubeIDfromURL($url)
{
		// find the video id
		// links exmaples
		// http://www.youtube.com/watch?v=RarVtwbrjgY
		// http://www.youtube.com/watch?v=9z1LvtCdNZQ&feature=related 
		// http://youtu.be/9z1LvtCdNZQ
		
		$temp = explode ('youtu.be/', $url);
		if ($temp[1] != '') $id = $temp[1];
		else 
		{
			$temp = explode ('watch?v=', $url);
			$temp1 = explode ('&', $temp[1]);
			$id = $temp1[0];
		}
		
		return $id;
}
function substrBYwords($str, $numOfWords)
{
	// for HTML Code
	$str = nl2br($str);
	$replaceArr = array ('<br>', '<br />','<div>', '&nbsp;' , '<p>');
	
	$str = str_replace ($replaceArr , ' ' , $str);
	$str = strip_tags($str);
	
	$wordsArr = explode(' ' , $str);
	$totalWords = sizeof($wordsArr);
	for ($i = 0; $i < min($numOfWords, $totalWords); $i++)
	{
		$finalRes[$i] = stripslashes($wordsArr[$i]);
	}
	$strRes = implode (' ' , $finalRes);
	return $strRes;
	
}

function stripTxt($str, $striped)
{
    return str_replace($striped , '', $str);
}
function strip_only($str, $tags, $stripContent = false) { 
    $content = ''; 
    if(!is_array($tags)) { 
        $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : array($tags)); 
        if(end($tags) == '') array_pop($tags); 
    } 
    foreach($tags as $tag) { 
        if ($stripContent) 
             $content = '(.+</'.$tag.'[^>]*>|)'; 
         $str = preg_replace('#</?'.$tag.'[^>]*>'.$content.'#is', '', $str); 
    } 
    return $str; 
} 

function formatData($string)
{
    $string = trim($string);
    $string = addslashes($string);
    return $string;
}	

function unFormatData($string)
{
    $string = stripslashes($string);
    $string = strip_only($string, '<style>');
    $string = str_replace('../uploads/' , 'uploads/', $string);
    return $string;
}

function getDate2Int($date, $h = '0', $i = '0', $s = '0')
{
	$temp = explode ('/' , $date);
	$int = mktime ($h,$i,$s,$temp[0], $temp[1], $temp[2]);
	return $int;
}

function unBr($string){
    $string = stripslashes($string);
    $aa = explode("<br />",$string);
    $s= " "; 
    $string=implode($aa,$s);
    $aa = explode("<br>",$string);
    $s= " "; 
    $string=implode($aa,$s);
    return $string;
}
?>
