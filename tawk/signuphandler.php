<?php
require 'includes/makingarray.php';
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']))
	{ 
		$larray=array();$f=0;
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		
	$name=str_replace(",","",$name);
	$name=str_replace("(","",$name);
	$name=str_replace(")","",$name);

	$email=str_replace(",","",$email);
	$email=str_replace("(","",$email);
	$email=str_replace(")","",$email);

	$password=str_replace(",","",$password);
	$password=str_replace("(","",$password);
	$password=str_replace(")","",$password);
	
		$return=validate($name,$email,$password);
		if($return!='ok')
		{
			
		}
		else
			{ $password =md5($password);
				//$input='name='.$name.','.'email='.$email.','.'password='.$password.',)';
				$file="accounts.txt";
				$larray=arraytransform($file);
					$id=sizeof($larray)+1;
					$input="id=".$id.','.'name='.$name.','.'email='.$email.','.'password='.$password.',)';
					foreach ($larray as $temp) {
						if($temp['email']==$email)
						{
							$f=1;break;
						}
					}
					if(!$f)
					{
						$handle=fopen("accounts.txt","a");
						fwrite($handle,$input);
						$return ="Thank You For Registering";
					}
					else {
						$return= "Email Already Exists";
					}
				}
				echo $return;
			}

			function validate($name,$email,$password)
			{  
				if($name=='' || $email=='' || $password=='' )
				{
					return 'Please Fill All Fields';
				}
				else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
					return 'Invalid Email Id Format';
				}
				return 'ok';
			}

?>