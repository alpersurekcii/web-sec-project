


<?php

extract($_POST);

$filen1 = $_POST['filen'];

$filen2 = 'c:/xampp/htdocs/web-sec-project/images/'.$filen1;
echo shell_exec("python C:/xampp/htdocs/web-sec-project/images/decode.py $filen2");



?>

<html>
<head>
</head>

<body>
<div id="center_button">
<br><br>
    <button onclick="location.href='../listmessage.php'">Back to Messages</button>
</div>
</body>
</html>