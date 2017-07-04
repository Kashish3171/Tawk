<?php
require 'includes/makingarray.php';
session_start();
if(!isset($_SESSION['id']))
{
header('Location:index.php');
}
$qid=$_GET['qid'];
$file="feedques.txt";
$result=array();$question="";
$result=arraytransform($file);
foreach($result as $r)
{
	if($r['qid']==$qid)
	{
		$question=$r['question'];
		break;
	}
}
?>
<!doctype html>
<html lang="en-US" charset="UTF-8">
<head>

	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Adamina' rel='stylesheet'>

	<link href='https://fonts.googleapis.com/css?family=Alike Angular' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Tawk</title>

</head>
<body style="font-family: Alike Angular !important;">
	<nav class="navbar navbar-inverse">
		<div class="contaienr-fluid">
			<div class="navbar-header" style="padding-top: 5px;">
				<a class="navbar-brand" href="home.php" style="font-family:Sofia !important;font-size: 30px;">Tawk
				</a>
			</div>
		</div>
		<ul class="nav navbar-nav navbar-right">

			<li class=""><a href="home.php">Feed</a></li>
			<li><a href="myaccount.php">My Account</a></li>
			<li><a href="#" class="logout">Logout</a></li>
		</ul>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 cont">
				<div class="row intro">

					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-12">
							<strong><?php  echo $question; ?></strong>
							</div>
						</div></div></div>

						<?php 
						$ansarr=array();$upvoteid=0;
						$ansarr=arraytransform("feedans.txt");
						foreach($ansarr as $arr)
							{ if($arr['qid']==$qid)
						{$upvoteid=$arr['aid'];
						?>
						<div class="row" style="border-bottom:1px solid #cac6c6;">
							<div class="col-xs-12">
							<h4><?php echo $arr['answer']; ?><h4>

					<button class="btn btn-primary pull-left">upvotes: <?php echo $arr['upvotes']; ?> </button>
						<button class="btn btn-warning" style="margin-left: 30px;margin-top: -10px;" onclick="upvote(<?php echo $upvoteid;?>);" style="margin-bottom:20px;">upvote</button>

							</div>
						</div>
						<?php }} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script >
		function upvote (uid)
{
		var xp=new XMLHttpRequest();
		xp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200)
			{	
				alert(this.responseText);
	//document.getElementById('ans' + qid).style.display="none";
		//window.location.reload();
			}
		}
		xp.open("GET","upvotehandler.php?aid="+uid);
		xp.send();

}

	</script>
	<script src="js/logout.js"></script>
	</body>
	</html>