<?
function strFrmat($string)
{
	$string = addslashes(stripslashes($string));	
    $string = trim($string);
    return $string;
}

function addRecord($table, $record, $printquery = 0)
{
	$k = 0;
	foreach($record as $key => $val) 
	{ 
		if (trim($val) != 'Array')
		{
		$FIELDS[$k] = "`".$key."`";	
		$VALUES[$k] = "'".strFrmat($val)."'";	
		$k++;
		}
    }	
    
	$txtFIELDS= implode (',' , $FIELDS);
	$txtVALUES= implode (',' , $VALUES);
	
	$query = "insert into ".$table." (".$txtFIELDS.") values (".$txtVALUES.")";
    $result = mysql_query($query);
    if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  
    if ($result)
    return mysql_insert_id();
    else return 0;
}

function updateRecord($table, $record, $cond, $printquery = 0)
{
	$k = 0;
	foreach($record as $key => $val) 
	{ 
		$UPARR[$k] = "`".$key."` = '".strFrmat($val)."'";
		$k++;	
    }	
    $UPTXT = implode (',' , $UPARR);
    $query = "update ".$table." set ".$UPTXT." where ".$cond;
    if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";      
    mysql_query($query);   
}

function deleteRecord($table, $cond, $printquery = 0)
{
  $query="delete from ".$table." where ".$cond;
  if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";        
  mysql_query($query);
}

function saveOrders($table, $ordArr, $idsArr, $printquery = 0)
{
	for ($i=0; $i < sizeof($idsArr); $i++)
	{
	    $query="update ".$table." set `order`='".$ordArr[$i]."' where id='".$idsArr[$i]."'";
	    mysql_query($query);	    
	}
  	if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";        
	
}

function swapStatus($table, $cond, $printquery = 0)
{
  $query="update ".$table." set status=abs(status-1) where ".$cond;
  if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";          
  mysql_query($query);
}

?>
