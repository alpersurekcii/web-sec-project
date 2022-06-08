<?php

session_start();


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
  <style>
    .vertical-menu {
      width: 200px;
      /* Set a width if you like */
    }

    .lesson {
      padding: 100px;
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

  <title>E-Learning</title>
</head>

<body>

  <div style="height: 100px; width: auto; background-color: gray; padding-top: 30px;">
    <img src="../site-logo.png" style="height: 60px; width: 100px;" />
    <p class="h2" style="position: absolute; left:280px; top: 25px;"> SEND SECRET MESSAGE</p>
    <p style="position: absolute; left: 90%; height:25px; width:auto; top:25px; background-color: white;">
      <?php echo "" . $_SESSION['First_Name'] . " " . $_SESSION['Last_Name'];
      ?>
    </p>
    <a href="./exit.php"> <button style="position: absolute; top:55px; left: 90%; background-color: white;">Sign Out</button> </a>
  </div>



  <div class="vertical-menu">
    <a href="HomePage.php"><i class="fas fa-home"></i> MainPage</a>
    <a href="../listmessage.php"><i class="fas fa-book"></i>List Messages</a>
    <a href="#"><i class="fas fa-comments"></i>Communication</a>

  </div>

  <div style="height: 500px; width: 500px;  padding-left: 100px; position:absolute; top: 19%; left: 20%;  ">
    <form action="./sendMessageProcess.php" method="post" enctype="multipart/form-data">
      <label for="rmail">Recipient Username: </label><br>
      <input type="text" class="form-control" placeholder="username@example.com" id="rmail" name="rmail"><br><br>
      <label for="message">Message: </label><br>
      <textarea name="message" class="form-control" id="message" rows="10" cols="20">
</textarea><br><br>
      <input class="btn btn-primary" type="submit" name="save" value="Send Message">
    </form>

  </div>

</body>

</html>