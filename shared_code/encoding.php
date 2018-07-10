<?
function encodeRequest($string)
{
	$hex='';
	$string = 'ABC'.$string.'CDE';
    for ($i=0; $i < strlen($string); $i++)
    {
        $hex .= dechex(ord($string[$i]));
    }
    return $hex;
}

function decodeRequest($hex)
{
    $string='';
    
    for ($i=0; $i < strlen($hex)-1; $i+=2)
    {
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    $string = str_replace('ABC', '',$string);
    $string = str_replace('CDE', '',$string);
    
    return $string;
}
?>