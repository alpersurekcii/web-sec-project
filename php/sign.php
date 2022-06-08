<?php
include 'database.php';
extract($_POST);
if(isset($_POST['save'])){
	$hashed = hash("sha512", $pass);
	$query = $conn->prepare("Select * From users where Email = ?");
	$query->execute(array($email));
	if($query->rowCount()){
		echo "Your email address exist. Please try different address.";
		header("Refresh: 3; url=sign.html");
	}else{
		$query = $conn->prepare("INSERT INTO users (Name, Surname, Email, Password ) VALUES (?, ?, ?, ?)");
		if($query->execute(array($first_name,$last_name,$email,$hashed)) === TRUE){
			echo "Record created successfully";
			header("Refresh: 2; url=login.php");
		}else{
			echo "Error!! ";
		}	
	}
	

}

?>