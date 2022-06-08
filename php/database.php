 <?php
 
	try {
$conn = new PDO("mysql:hostname=localhost:8080; dbname=web-sec-project; charset=utf8", "root", "Alper389938.");

}catch(PDOException $exe){
echo $exe->getMessage();}			
 
 /*
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-learning-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}*/
?> 