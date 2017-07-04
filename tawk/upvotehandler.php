<?php
require 'includes/makingarray.php';
if(isset($_GET['aid']))
{ $aid=$_GET['aid'];$upvote=0;$final="";
	$ans=array();$acc=array();
	$file="feedans.txt";$file1="accounts.txt";
	$ans=arraytransform($file);
	$checkaid=0;

	foreach ($ans as $first) {
		if($first['aid']==$aid)
		{		$checkaid=$first['aid'];
			$upvote=$first['upvotes']+1;
			$final=$final."qid=".$first['qid'].","."aid=".$first['aid'].","."answer=".$first['answer'].","."upvotes=".$upvote.",)";
		}
		else
		{
	$final=$final."qid=".$first['qid'].","."aid=".$first['aid'].","."answer=".$first['answer'].","."upvotes=".$first['upvotes'].",)";
		
	}}
	$update=fopen("feedans.txt","w");
	fwrite($update,$final);
	

	$tempaddr="";
	$acc=arraytransform($file1);

	foreach($acc as $w)

	{	$ansfinal="";$newvote=0;
		$tempaddr =$w['id'].$w['name'];
		
		$passfile=$tempaddr."/answers.txt";
		
		if(file_exists($passfile))
		{
		chmod($passfile, 700);
		$ansarray=arraytransform($passfile);
		
		foreach($ansarray as $indi)
		{
			if($indi['aid']==$checkaid)
			{
				$newvote=$indi['upvotes']+1;
		$ansfinal=$ansfinal."qid=".$indi['qid'].","."aid=".$indi['aid'].","."answer=".$indi['answer'].","."upvotes=".$newvote.",)";
			}
			else
			{
		$ansfinal=$ansfinal."qid=".$indi['qid'].","."aid=".$indi['aid'].","."answer=".$indi['answer'].","."upvotes=".$indi['upvotes'].",)";
			}

		}

	$newupdate=fopen($passfile,"w");
	fwrite($newupdate,$ansfinal);
	
	}

}
echo 'successfully upvoted';
}
?>