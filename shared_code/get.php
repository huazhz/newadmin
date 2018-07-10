<?
function getByQuery($query, $printquery = 0)
{
    if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  
    
    $result=mysql_query($query);
    if ($result) 
    {
    $num=mysql_num_rows($result);   
    for ($i=0; $i<$num; $i++)
     {
      $row=mysql_fetch_array($result);
      $s[$i]=$row; 
     } 
    }
    return $s;
}
function getAllData($table, $cond, $printquery = 0)
{
    $query="select * from ".$table." where ".$cond;
    if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  
    
    $result=mysql_query($query);
    if ($result) 
    {
    $num=mysql_num_rows($result);   
    for ($i=0; $i<$num; $i++)
     {
      $row=mysql_fetch_array($result);
      $s[$i]=$row; 
     } 
    }
    return $s;
}

function getDataByPages($table, $cond, $page, $rpp, $printquery = 0)
{
    if ($page != 1000000001)
    {
    $start=($page-1)* $rpp;  
    $query="select *  from ".$table." where ".$cond." limit ".$start.", ".$rpp;
    }
    else
    $query="select *  from ".$table." where ".$cond;
   
    if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  
    
	$result=mysql_query($query);
    if ($result) 
    {
    $num=mysql_num_rows($result);   
    for ($i=0; $i<$num; $i++)
     {
      $row=mysql_fetch_array($result);
      $s[$i]=$row; 
     } 
    }
    return $s;
}

function countDataPages($table, $cond, $rpp, $printquery = 0)
{
    $query="select count(id) from ".$table." where ".$cond;
    if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  
    
    $result=mysql_query($query);
    if ($result)
    {
    $row=mysql_fetch_array($result);
    return ceil($row[0]/$rpp);
    }
}

function getDefaultOrder($table, $cond = 1, $printquery = 0)
{
  $query="select max(`order`) from ".$table." where ".$cond;
  if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  

  $result=mysql_query($query);
  if ($result)
   {
    $res=mysql_fetch_array($result);
    return ($res[0]+1);
   }
}
function getMinOrder($table, $cond = 1, $printquery = 0)
{
  $query="select min(`order`) from ".$table." where ".$cond;
  if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  

  $result=mysql_query($query);
  if ($result)
   {
    $res=mysql_fetch_array($result);
    return ($res[0]-1);
   }
}
function getDetails($table, $cond, $printquery = 0)
{
  $query="select * from ".$table." where ".$cond;
  if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  

  $result=mysql_query($query);
  if ($result)
   {
    $res=mysql_fetch_array($result);
    return $res;
   }
}

function getTitle($table, $title, $cond, $printquery = 0)
{
  $bannedArr = array('title', 'name', 'table', 'order');
  if (in_array($title, $bannedArr))
  $title = "`".$title."`";
  
  $query="select ".$title." from ".$table." where ".$cond;
  if ($printquery == 1) echo "<hr> <b>QUERY :</b> <br> ".$query."<hr>";  
  
  $result=mysql_query($query);
  if ($result)
   {
    $res=mysql_fetch_array($result);
    return $res[0];
   }
}

?>
