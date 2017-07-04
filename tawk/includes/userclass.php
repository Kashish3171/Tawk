<?php
class userclass{
	public function  __construct($id,$name){
		session_start();
		$_SESSION['id']=$id;
		$_SESSION['name']=$name;
	}
}
?>