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
	<div class="container">
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 cont">
				<div class="row intro">

					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-12">
						 Hi, <?php echo $name; ?> 
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
						<strong data-toggle="modal" data-target="#ask" style="cursor: pointer;">Have a question ?</strong>
							</div>
						</div>

					</div>
				</div>
				<?php
					$larray=array();
					$rarray=array();
					$file="feedques.txt";
					$file1="feedans.txt";

					$larray=arraytransform($file);
					$larray=array_reverse($larray);
					$rarray=arraytransform($file1);
					//print_r($largearray);
					foreach ($larray as $array)
					{ // print_r($largearray);
						
				?>
					<div class="row intro">

					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-12">
						<strong>
					<a href="quespage.php?qid=<?php echo $array['qid']; ?>" style="text-decoration: none;color:#337ab7 !important;">	<?php echo $array['question']; ?></a>
						<button type="button" class="btn btn-info pull-right" onclick="answer(<?php echo $array['qid']; ?>);">
							Answer
						</button>
						</strong>
						<div class="form-group" id="<?php echo 'ans'.$array['qid'];?>" style="display: none;margin-top: 20px;">
							<form id="<?php echo 'form'.$array['qid'];?>" action="#">
							<textarea class="form-control" rows="8" placeholder="Please answer the question">
								
							</textarea><br>
							<button id="<?php echo 'btn'.$array['qid'];?>" type="button" Class="btn btn-primary">Submit</button>
							</form>
						</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
						<h4>

						<?php  $upvote=0;$maxupvote="";$upvoteid=0;
						foreach($rarray as $array1)
						{  //print_r($array1);
							 if($array['qid']==$array1['qid'] && $array1['upvotes']>=$upvote)
								{	$upvote=$array1['upvotes'];
									$upvoteid=$array1['aid'];
									$maxupvote = $array1['answer'];}}
									echo $maxupvote; ?>
									<br></h4>
							
							<?php if($maxupvote){ ?>
					<button class="btn btn-primary pull-left">upvotes: <?php echo $upvote; ?> </button>

						
						<button class="btn btn-warning" onclick="upvote(<?php echo $upvoteid;?>);" style="margin-left: 30px;">upvote</button> <?php } ?>
							</div>
						</div>

					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<div class="modal fade" role="dialog" id="ask">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header ">

        <a  class="close qclose" data-dismiss="modal">&times;</a>
			<strong class="modal-title">What is your question?</strong>	
				</div>
				<form  id="askform" >
				<div class="modal-body">
					<div class="form-group">
						<label>Your Question</label>
						<textarea type="text" class="form-control" rows="8"  name="ques">
							</textarea> 
						
					</div>
				</div>
				<div class="modal-footer">
				<div class="checkbox" style="float:left;">
  <label><input type="checkbox" value="" name="anon">Ask anonmously</label>
</div>
					<button type="button" class="btn btn-primary askbtn">Ask</button>

				</div></form>
			</div>
		</div>
	</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>

	document.getElementsByClassName('askbtn')[0].addEventListener('click',function(){
	//console.log(' i m in');
var form = document.getElementById('askform');
//console.log(form);
var ques =form.elements[0].value;
var anon=form.elements[1].checked;

var xy= new XMLHttpRequest();
xy.onreadystatechange=function(){
	if(this.readyState==4 && this.status==200)
	{	console.log('here');
		console.log(this.responseText);
		$('.qclose').trigger('click');
		window.location.reload();
	}
}

xy.open("GET","quehandler.php?ques=" + ques + "&anon=" + anon);
xy.send();
});

//calling the ans box

function answer(qid)
{ console.log('we r here' + qid);

	document.getElementById('ans' + qid).style.display="block";
	document.getElementById('btn'+qid).addEventListener('click',function(){
		var form=document.getElementById('form'+qid);
		var ans=form.elements[0].value;
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200)
			{	
				alert(this.responseText);
	document.getElementById('ans' + qid).style.display="none";
		//window.location.reload();
			}
		}
		xmlhttp.open("GET","anshandler.php?qid="+qid+"&ans="+ans);
		xmlhttp.send();
	
	});

}

function upvote (uid)
{
		var xp=new XMLHttpRequest();
		xp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200)
			{	
				alert(this.responseText);
				window.location.reload();
	//document.getElementById('ans' + qid).style.display="none";
		//window.location.reload();
			}
		}
		xp.open("GET","upvotehandler.php?aid="+uid);
		xp.send();

}
</script>
<script src="js/logout.js"></script></body>
</html>