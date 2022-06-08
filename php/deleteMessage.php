<?php

include 'database.php';

extract($_POST);

$filen1 = $_POST['filen'];
$dirimage = "images/".$filen;
$query3 = $conn->prepare("delete from imagetable where dirimage=?");
		$query3->execute(array($dirimage));
$trmdir = "c:/xampp/htdocs/web-sec-project/images/".$filen;
if(unlink($trmdir)){
//echo shell_exec("del $trmdir"); 
echo "Message deleted successfully";     
header("Refresh: 2; url=../listmessage.php"); 
}else{
    echo "Something was bad";
}
?>