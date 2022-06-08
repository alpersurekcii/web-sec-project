<?php
if(isset($_POST['g-recaptcha-response'])){

	$secretkey= '6LfTjW4eAAAAANCZsILv8BJPmBz4FZ4LWcV1GdZ7';
	$ip= $_SERVER['REMOTE_ADDR'];
	$response = $_POST['g-recaptcha-response'];
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$ip";
	$fire = file_get_contents($url);
	echo $fire;	
	$var = json_decode($fire, true);
	echo $var['success'];
//	$cntrl = $fire->{"success"};
if( $var['success'] == true){
include 'database.php';
session_start();
$_POST['login'];
extract($_POST);
$hashed = hash("sha512", $pass);
	$query = $conn->prepare("SELECT * FROM users where Email=? and Password=?");
	$query->execute(array($email,$hashed));
	if($query->rowCount()){
	$data = $query->fetchAll();
	foreach($data as $row){
		
		$_SESSION["ID"] = $row['ID'];
        $_SESSION["Email"]=$row['Email'];
        $_SESSION["First_Name"]=$row['Name'];
        $_SESSION["Last_Name"]=$row['Surname']; 
		//$_SESSION["Yetki"]=$row['authority'];
        header("Location: HomePage.php"); 
		} 
	
	}else {
			echo "Invalid Email ID/Password";
		}
	}
}
	
?>