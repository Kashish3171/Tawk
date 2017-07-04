<?php
require 'includes/makingarray.php';

$printstatement="";
$tempvar=0;
if(isset($_GET['qid']) && !empty($_GET['ans']))
{ session_start();
	$qid= $_GET['qid'];
	$qid=trim($qid);
	$answer= $_GET['ans'];
	$answer=str_replace(",","",$answer);
	$answer=str_replace("(","",$answer);
	$answer=str_replace(")","",$answer);
	$aid=rand(1,10000);
	$upvotes=0;

	$putans="qid=".$qid.","."aid=".$aid.","."answer=".$answer.","."upvotes=".$upvotes.",)";
	$putans=trim($putans);
	
	$userid =$_SESSION['id'];
	$username=$_SESSION['name'];
	$userdir=$userid.$username;
	$ansfilepath=$userdir."/answers.txt";
	if(!is_dir($userdir))
		{
			mkdir($userdir);
		}
	$larray=array();
	$larray=arraytransform($ansfilepath);
	//print_r($larray);
	for($i=0;$i<sizeof($larray);$i++) {
		
		
		if($larray[$i]['qid']==$qid)
		{ $tempvar=1;
			$printstatement= "You have already answered this question.";
			//exit();
		}
	
	}

	if(!$tempvar)
	{
		$handle =fopen($ansfilepath, "a");
	fwrite($handle,$putans);
	fclose($handle);
	$handle=fopen("feedans.txt","a");
	fwrite($handle,$putans);
	fclose($handle);
	$printstatement= "Your answer is successfully submitted";
}
	echo $printstatement;
}	

?>