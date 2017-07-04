<?php
if(isset($_POST['email'])){
require 'includes/makingarray.php';
include_once 'includes/userclass.php';
$larray=array();$f=0;

$readarray=array();
$email=$_POST['email'];
//echo $email;echo "<br>";
$password=md5($_POST['password']);
//echo $password;echo "<br>";
$file="accounts.txt";
$larray=arraytransform($file);
	
	//echo "<br>";
	foreach($larray as $entry)
	{
		if($entry['email']===$email && $entry['password']===$password)
		{	$f=1;
			$user=new userclass($entry['id'],$entry['name']);
			header("Location:home.php");

		}

	}
	if(!$f)
	{
		header("Location:index.php?error");
	}
}
	?>

<!DOCTYPE html>
<html lang="en-US" charset="UTF-8">
<head>

<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Tawk</title>

</head>
<body class="loginbody">
	<section class="container-fluid" style="padding: 0;margin:0;">
		<div class="row">
			<div class="col-xs-12">
				<div class="heads text-center">
					<h1>Tawk</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<h2>Login</h2>
			</div>	
		</div><br><br>
		<div class="row">
			<div class="col-xs-offset-4 col-xs-4 logincol">
			<form method="POST" action="">
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<button type="sumbmit" class="btn btn-primary" name="login">Login</button>
				</div>
				</form>
				<div class="row">
			<div class=" col-xs-12">
				<span style="color:white;font-family:verdana !important;">Don't have a account yet please <a href="signup.php" style="color:yellow !important;">sign up!</a></span>
			</div>
		</div>
			</div>	
		</div>
		
	</section>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--<script src="js/style.js"></script>-->
<script type="text/javascript">
	if(window.location.href=="http://localhost/quora/index.php?error")
	{
		alert('Invalid id or password');
	}
</script>
</html>