<?php
require 'includes/makingarray.php';
session_start();
if(!isset($_SESSION['id']))
{
header('Location:index.php');
}
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$larray=array();
$dirname=$id.$name;
?>


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
	<div class="container-fluid">
		<div class="row" style="margin-top: 60px;height:350px;padding-top:30px;background-image: url('images/men.jpg');background-repeat: no-repeat;background-size: cover;">
			<div class="col-xs-4 pic">
			<?php 
			$imgdir =$dirname ."/images";
			if(is_dir($imgdir) && file_exists($imgdir."/pp.jpg"))
			{

			?>
			<img src="<?php echo $imgdir.'/pp.jpg';?>" height="240" width="190"><br><br>
			<button class="btn btn-warning" onclick="removepic('<?php echo $imgdir; ?>');">Remove Pic</button>
			<?php }
			else {
			?>
				<form action="uploadimg.php" method="POST" enctype="multipart/form-data">
				<br><br>
				<div class="form-group">
				<label>Upload Profile Picture</label>
				<input type="file" class="form-control" name="profilepic" accept="image/*">

				</div>
				<div class="form-group">
				<button type="submit" class="btn btn-primary" name="submit">Upload</button>
				</div>
				</form>
				<?php } ?>
			</div>
			<div class="col-xs-2" >
			<span style="color: white!important;">Hi, <?php echo $name; ?></span>
			</div>
		</div>
		<div class="row" style="margin-top: 100px;">
			<div class="col-xs-offset-1 col-xs-5" style="border-right: 1px solid #cac6c6;">
			<div class="row">
			<div class="col-xs-12">
			<span>Question's you have asked (Click on Question to go to its page)</span>
			</div>
			</div><br><br>
			<?php 
			$quesarray=array();
			$quesarray=arraytransform($dirname."/questions.txt");
			$count=0;
			foreach($quesarray as $array){
				$count++;

			?>
			<div class="row intro">
			<div class="col-xs-12">
			<strong><a href="quespage.php?qid=<?php echo $array['qid']; ?>" style="text-decoration: none;color:#337ab7 !important;">	<?php echo $count.". "; echo $array['question']; ?></a></strong>
			</div>
			</div>
			<?php } 
			echo "<strong class='intro'>Total Question's asked: ".$count."</strong>" ;
			?>
			</div>
			<div class="col-xs-offset-1 col-xs-5">
			<div class="row">
			<div class="col-xs-12">
			<span>Answers you have given (Click on Answer to go to its page)</span>
			</div>
			</div><br><br>
			<?php 
			$ansarray=array();
			$ansarray=arraytransform($dirname."/answers.txt");
			$count1=0;

			foreach($ansarray as $arr){
				$count1++;

			?>
			<div class="row intro">
			<div class="col-xs-12">
			<a href="quespage.php?qid=<?php echo $arr['qid']; ?>" style="text-decoration: none;color:#607D8B  !important;">	<?php echo $count1.". "; echo $arr['answer']; ?></a><br>
			<button class="btn btn-info" style="margin-top: 20px;">upvotes: <?php echo $arr['upvotes']; ?> </button>
			</div>
			</div>
			<?php } 
			echo "<strong class='intro'>Total Answer's Given: ".$count1."</strong>" ;
			?>
			</div>
		</div>
	</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/logout.js"></script>	
<script>
	function removepic(dir){
	
			var xh =new XMLHttpRequest();
			xh.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200)
				{
					console.log(this.responseText);
					location.reload();
				}
			}
			xh.open("GET","removeimg.php?dirname=" + dir);
			xh.send();
	}
</script>
</body>
</html>
