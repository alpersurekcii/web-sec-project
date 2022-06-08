<?php

session_start();


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
  <style>
    .vertical-menu {
      width: 200px;
      /* Set a width if you like */
    }

    .vertical-menu a {
      background-color: rgb(238, 238, 238);
      /* Grey background color */
      color: black;
      /* Black text color */
      display: block;
      /* Make the links appear below each other */
      padding: 12px;
      /* Add some padding */
      text-decoration: none;
      /* Remove underline from links */
    }

    .vertical-menu a:hover {
      background-color: rgb(146, 86, 86);
      /* Dark grey background on mouse-over */
    }

    .vertical-menu a.active {
      background-color: rgb(129, 82, 82);
      /* Add a green color to the "active/current" link */
      color: white;
    }
  </style>

  <title>Sec-Project</title>
</head>

<body>

  <div style="height: 100px; width: auto; background-color: gray; padding-top: 20px;">
    <img src="../site-logo.png" style="height: 80px; width: 100px;" />
    <p class="h2" style="position: absolute; left:280px; top: 25px;"> SEND SECRET MESSAGE</p>
    <p style="position: absolute; left: 90%; height:25px; width:auto; top:25px; background-color: white;">
      <?php echo "" . $_SESSION['First_Name'] . " " . $_SESSION['Last_Name'];
      ?>
    </p>
    <a href="./exit.php"> <button style="position: absolute; top:55px; left: 90%; background-color: white;">Sign Out</button> </a>
  </div>



  <div class="vertical-menu">
    <a href="HomePage.php"><i class="fas fa-home"></i> MainPage</a>
    <a href="sendMessage.php"><i class="fas fa-message"></i>Send Message</a>
    <a href="../listmessage.php"><i class="fas fa-comments"></i>List Message</a>
    <a href="#"><i class="fas fa-comments"></i>About</a>
     

  </div>


  <div class="form-group" style="height: 300px; width: 800px; position: absolute; left: 40%; top: 30%; ">

    <h3 style="background-color:white; padding-top: 5%; padding-bottom: 3%;">Message Send and List</h3>
    <div class="form-group">
      <a href='./sendMessage.php'> <button type="button" class="btn btn-primary btn-lg ">Send Message</button></br></br></a>
    </div>

    <a href='../listmessage.php'> <button type="button" class="btn btn-primary btn-lg btn-block">Show Message</button> </a>

  </div>



</body>

</html>