<?php
include 'database.php';
session_start();
$_POST['save'];
extract($_POST);
	$sender_email= $_SESSION["Email"];
    $mail = $rmail;
    $query = $conn->prepare("Select * From users where Email=?");
    $query->execute(array($mail));
    if($query->rowCount()){
        
	$query2 = $conn->prepare("insert into messagetable(message, receiveremail, sender) values (?,?,?) ");
	if($query2->execute(array($message,$rmail,$sender_email)) === TRUE){		  
		echo shell_exec("python C:/xampp/htdocs/web-sec-project/stego.py $mail $sender_email"); 
		
		echo "Message sent successfully";
		$query3 = $conn->prepare("delete from messagetable where receiveremail=?");
		$query3->execute(array($mail));
		
		header("Refresh: 2; url=HomePage.php"); 
		
		
	}else{
		echo "Error!! ";
	}
    }
    else{
	
	
    echo "email is not found";
}
 ?>