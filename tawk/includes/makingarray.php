<?php

 $smallarray=array();
 $largearray=array();
function arraytransform($file)
{ 	global $largearray;
	$largearray=array();
	$handle =fopen($file, "a");
	$readedfile=file_get_contents($file);
	$readarray=explode(')', $readedfile);
	for($i=0;$i<(sizeof($readarray)-1);$i++)
	{	$readedstring=$readarray[$i];
	makingarray($readedstring);
	}
	return $largearray;
}

function makingarray($readedstring)
{ 
global  $smallarray;
global $largearray;
$keyindex= strpos($readedstring,"=");
$key = substr($readedstring,0,$keyindex);
	//echo $key;echo "<br>";
$readedstring=substr($readedstring,$keyindex+1);
$valueindex=strpos($readedstring,",");
$value= substr($readedstring,0,$valueindex);
$readedstring=substr($readedstring,$valueindex+1);
	//echo $value;echo "<br>";

$smallarray[$key]=$value;
	//print_r($smallarray);
	//echo "<br>";

if(strlen($readedstring)==0)
	{array_push($largearray,$smallarray);
		$smallarray=array();
	}
	else {
		makingarray($readedstring);
	}
}


?>