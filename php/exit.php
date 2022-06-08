<?php
 
session_start();
 
 
session_destroy();
 
echo "You are logged out. You are being redirected to the Home Page...";
 
header("Refresh: 2; url=login.php");
 
?>