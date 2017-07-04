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
<?php
if(isset($_FILES['profilepic']))
{	echo '<script>console.log("shit");</script>';
	$picname=$_FILES['profilepic']['name'];
	$size=$_FILES['profilepic']['size'];
	$type=$_FILES['profilepic']['type'];
	$tmp_name=$_FILES['profilepic']['tmp_name'];
	if($size>2097152)
	{
		echo '<script>alert("file must be less then 2 MB in size");</script>';
	}
	else
	{
		
		if(!is_dir($dirname))
		{
			mkdir($dirname);
		}
		chmod($dirname,700);
		$imgdir=$dirname."/images";
		if(!is_dir($imgdir))
		{
			mkdir($imgdir);
		}
		chmod($imgdir, 700);
		$loc=$imgdir.$picname;
		$pic="pp.jpg";
		move_uploaded_file($tmp_name,$imgdir."/".$pic);
	}
	header("location:myaccount.php");
}
?>
