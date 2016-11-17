<?php
session_start();
 
if (isset($_POST["submit"])){
	$username = $_POST["username"];
	$password = $_POST["password"];

	//if username is not equal to empty and as well password is not equal to empty
	if($username!= "" AND $password!= "") {
		$usernameset="haris";
         $passwordset="haris";

		if($username == $usernameset AND $password == $passwordset){
			
			$_SESSION['users']=$username;
			header("location: create.php");
		}else{
			header("location: index.php?id=error&v=Incorrect Username and Password");
		}
		
	
	}else{
		header("location: index.php?id=error&v=All Fields Must be Filled");
}
	


}else{
	header("location: index.php?id=error&v=Please Login to your account");
}





/*if(isset($_POST['sumbit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];

	if($username!="" AND $password!=""){
		if($username==$usernameset AND $password==$passwordset){
			$_SESSION["username"]=$username;
			header("location: create.php");
		}
		else {
			header("location: index.php?id=error&v=incorrect password");
		}}
	else {
		header("location: index.php?id=error&v=all field must be filled ");
	}}
	else {
		header("location: index.php?id=error&v=login first");
	
	
}

*/




?>