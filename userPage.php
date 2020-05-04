

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>workoutHp - Login</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <div class="header">
      <img src="imges\Casper__Nicklas.png" alt="">
    </div>

    <div class="topnav" id="topnav1">

      <a href="index.php">
        <div class="option">
          Home
        </div>
      </a>

      <div class="option" onclick="logout()" id="login">
        <img src="imges\login_img.png" alt="" id="img">
        Logout
      </div>

    </div>


    <div class="column">

      <div class="chart_area">
        <div class="chart_div">

        </div>
      </div>

    </div>
  </body>
</html>

<?php
  include_once 'optionScript.php';
 ?>
