<?php

session_start();


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./jquery.redirect.js"></script>
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

  <div style="height: 100px; width: auto; background-color: gray; padding-top: 30px;">
    <img src="site-logo.png" style="height: 60px; width: 100px;" />
    <p class="h2" style="position: absolute; left:280px; top: 25px;"> SEND SECRET MESSAGE</p>
    <p style="position: absolute; left: 90%; height:25px; width:auto; top:25px; background-color: white;">
      <?php echo "" . $_SESSION['First_Name'] . " " . $_SESSION['Last_Name'];
      ?>
    </p>
    <a href="./php/exit.php"> <button style="position: absolute; top:55px; left: 90%; background-color: white;">Sign Out</button> </a>
  </div>



  <div class="vertical-menu">
    <a href="./php/HomePage.php"><i class="fas fa-home"></i> MainPage</a>
    <a href="./php/sendMessage.php"><i class="fas fa-book"></i>Send Message</a>  
    <a href="#"><i class="fas fa-comments"></i>About</a>
     

  </div>


  <div class="form-group" style="height: 300px; width: 600px; position: absolute; left: 20%; top: 20%; ">
    <p class="h3">Message Box</p>
    <?php

    include './php/database.php';
    $mail = $_SESSION['Email'];
    $query = $conn->prepare("SELECT * FROM imagetable where email= ?");
    $query->execute(array($mail));
    if ($query->rowCount()) {
      $data = $query->fetchAll();
      echo "<table id='decodetable' class='table table-striped table-hover table-bordered table-dark'>";
      foreach ($data as $row) {
        $id = $row['email'];
        $isim = $row['dirimage'];
        $sender = $row['sender'];
        $date_time = $row['dateandtime'];

        echo "
                <tr>

                
                    <td scope='col'>From: $sender</td>
                    
                    <td scope='col'><img src='$isim' width='50%' height='50%' </td>
                    
                    <td scope='col'> Date and Time: $date_time</td>
                    <td><input type='button' value='Delete' onclick='deleteRow(this)'> </td>
                    <td> <input type='button' value='Show' onclick='showMessage(this)'></td>
                </tr>
                
				";
      }
      echo "</table>";
    } else {
      echo "Messages Not Found..";
    }

    ?>
  </div>

  <script>
    function deleteRow(r){
      var a = r.parentNode.parentNode.rowIndex;
      

      var table = document.getElementById('decodetable');
    var row;
    var nameofmsg;
    for (var i = 0; i < table.rows.length; i++) {
      table.rows[i].onclick = function() {
        //rIndex = this.rowIndex;

        var le = this.cells[1].innerHTML

        var dy = le.split('/').join(',').split('"').join(',').split(',');
        document.getElementById("decodetable").deleteRow(a);
        nameoffile = dy[2];
        $.redirect('./php/deleteMessage.php', {'filen': nameoffile});
       
      };

    }

    }

    function showMessage(r){
    var table = document.getElementById('decodetable');
    var row;
    var nameofmsg;
    for (var i = 0; i < table.rows.length; i++) {
      table.rows[i].onclick = function() {
        //rIndex = this.rowIndex;

        var le = this.cells[1].innerHTML

        var dy = le.split('/').join(',').split('"').join(',').split(',');

        nameoffile = dy[2];
        $.redirect('./php/decodeprocess.php', {'filen': nameoffile});
       
      };

    }
  }
  </script>

</body>

</html>