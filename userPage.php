<?php
  session_start();

  $userid = $_SESSION['id'];

  $db = mysqli_connect('localhost', 'root', '', 'workouthp');

  $check_query = "SELECT * FROM progressdata WHERE userid='$userid'";
  $result = mysqli_query($db, $check_query);
  $user = mysqli_fetch_assoc($result);

  //echo $user['reps'];

  $db->close();
?>

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

        <div class="days" id="fredag">

          <div class="boxes">

            <div class="numberName">
              1: Barbell Deadlift
            </div>

            <img src="imges\PlaningIMGS\Barbell+Deadlifts.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              2: Seated Cable Rows
            </div>

            <img src="imges\PlaningIMGS\row.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              3: Barbell Curl
            </div>

            <img src="imges\PlaningIMGS\bb-curl.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              4: Hammer Curls
            </div>

            <img src="imges\PlaningIMGS\Hammer.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              1: Lying cable flyes
            </div>

            <img src="imges\PlaningIMGS\Cable+Fly.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              2: Lying Machine Chest Press
            </div>

            <img src="imges\PlaningIMGS\Lying+Machine+Chest+Press.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              3: Cable Triceps Rope Pushdowns
            </div>

            <img src="imges\PlaningIMGS\Cable+Triceps+Rope+Pushdowns.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              4: Skullcrushers
            </div>

            <img src="imges\PlaningIMGS\skull.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              1: Barbell Curl
            </div>

            <img src="imges\PlaningIMGS\bb-curl.png" alt="" class="dataIMg">

          </div>

          <div class="boxes">
            <div class="numberName">
              2: Cable Triceps Rope Pushdowns
            </div>

            <img src="imges\PlaningIMGS\Cable+Triceps+Rope+Pushdowns.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              3: Hammer Curls
            </div>

            <img src="imges\PlaningIMGS\Hammer.png" alt="" class="dataIMg">

          </div>


          <div class="boxes">
            <div class="numberName">
              4: Skullcrushers
            </div>

            <img src="imges\PlaningIMGS\skull.png" alt="" class="dataIMg">

          </div>
        </div>
      </div>

    </div>
  </body>
</html>

<?php
  include_once 'optionScript.php';
 ?>
