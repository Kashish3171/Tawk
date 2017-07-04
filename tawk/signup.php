<!DOCTYPE html>
<html lang="en-US" charset="UTF-8">
<head>

<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Tawk</title>

</head>
<body  class="loginbody">
	<section class="container-fluid" style="padding: 0;margin:0;">
		
		<div class="output text-center" ></div>
		<div class="row" >
			
			<div class="col-xs-offset-4 col-xs-4 logincol">
			<div class="col-xs-12 text-center">
				<h4 style="color: white;font-family: verdana;">Sign up</h4>
			</div>	
				<form id="signupform" action="#">
					<div class="form-group">
						<label>Name</label>
						<input type="name" class="form-control" name="name">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-primary createaccount">Signup !</button>
					</div>
				</form>
			
			<div class="col-xs-12">
				<span style="color: white;">Already have a account please <a href="index.php" style="color:yellow !important;">Login!</a></span>
			</div>
			</div>
		</div>
		<div class="row">
			
		</div>
		<br><br>
	</section>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/style.js"></script>
</html>