<?php
	if(isset($_GET["ques"]))
	{	session_start();
		$ques=$_GET["ques"];

	$ques=str_replace(",","",$ques);
	$ques=str_replace("(","",$ques);
	$ques=str_replace(")","",$ques);
		$anon=$_GET["anon"];
		$userid =$_SESSION['id'];
		$username=$_SESSION['name'];
		$userdir=$userid.$username;
		$quesfilepath=$userdir."/questions.txt";	
			$qid=rand(1,10000);


		$putques="qid=".$qid.","."question=".$ques.",)";
		$putques=trim($putques);
		
		if(!is_dir($userdir))
		{
			mkdir($userdir);
		}
		
		file_put_contents($quesfilepath,$putques,FILE_APPEND);
		file_put_contents("feedques.txt",$putques,FILE_APPEND);
		

	}

?>