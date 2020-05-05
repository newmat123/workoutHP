<?php
  session_start();
  // connect til databasen

  $db = mysqli_connect('localhost', 'root', '', 'workouthp');


  if(isset($_POST['saveData'])){

    $userID = $_SESSION['id'];
    $day = $_SESSION['day'];
    $date = $_SESSION['date'];

    $exercisename = array();
    $reps = array();
    $kg = array();

    switch ($day) {

      case 1:
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname1']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname2']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname3']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname4']));

        array_push($reps, mysqli_real_escape_string($db, $_POST['reps1']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps2']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps3']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps4']));

        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt1']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt2']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt3']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt4']));
        break;

      case 3:
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname5']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname6']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname7']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname8']));

        array_push($reps, mysqli_real_escape_string($db, $_POST['reps5']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps6']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps7']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps8']));

        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt5']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt6']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt7']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt8']));
        break;

      case 5:
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname9']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname10']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname11']));
        array_push($exercisename, mysqli_real_escape_string($db, $_POST['exname12']));

        array_push($reps, mysqli_real_escape_string($db, $_POST['reps9']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps10']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps11']));
        array_push($reps, mysqli_real_escape_string($db, $_POST['reps12']));

        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt9']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt10']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt11']));
        array_push($kg, mysqli_real_escape_string($db, $_POST['vægt12']));
        break;

    }


/*
    $exercisename = mysqli_real_escape_string($db, $_POST['exname']);
    $reps = mysqli_real_escape_string($db, $_POST['reps']);
    $kg = mysqli_real_escape_string($db, $_POST['vægt']);
*/


    for ($i=0; $i < count($exercisename); $i++) {
      $query = "INSERT INTO progressdata (userid, date, kg, reps, exsercisename)
    			  VALUES('$userID', '$date', '$kg[i]', '$reps[i]', '$exercisename[i]')";
    	mysqli_query($db, $query);
    }


    header('location: index.php');

    $db->close();
  }
?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
  </head>


  <body>

    <div class="header">
      <img src="imges\Casper__Nicklas.png" alt="">
    </div>



    <div class="topnav" id="topnav1">

      <div class="option" onclick="Home()">
        Home
      </div>

      <div class="option" onclick="showCategorys()">
        Exercise
      </div>

      <div class="option" onclick="Planing()">
        Planing
      </div>

      <div class="option" onclick="openlogin()" id="login">
        <img src="imges\login_img.png" alt="" id="img">
        Login
      </div>

    </div>



    <div class="topnav" id="categories">

    </div>



    <div class="column">
      <div id="Home">
        <div class="hometxt">
          <h1>This is a wep page, you can use to get in shape!</h1>
          <br>
          <p class="enders"></p>
          <p>
          You can use our exsersice labary to find the exsersice you wanna try.
          Just clik on the exsersice bottun, chose a catergory and you are all good to go.
          And if that iseent enough, use our pre bulid traning scesion, under planing,
          and use it to ceep track of your progretion.
          </p>
          <p class="enders"></p>
        </div>
      </div>

      <div id="root">

        <div class="container" id="scheduelContainer">
          <div class="scheduel">

            <form class="login" action="index.php" method="post">

              <div class="days" id="mandag">
                <div class="Day">Mandag</div>

                <div class="boxes">

                  <div class="numberName">
                    1: Barbell Deadlift
                  </div>

                  <p>
                    This is technically more than a back exercise—it hits the entire posterior chain from your calves to your upper traps—but it's the absolute best for overall backside development. Technique is uber-important with the deadlift, but once you nail it, you can progress to lifting monster weights that will recruit maximum muscle, release muscle-building hormones, and help you get big.
                  </p>

                  <img src="imges\PlaningIMGS\Barbell+Deadlifts.png" alt="" class="dataIMg">

                  <br>

                  <input type="hidden" name="exname1" value="Barbell Deadlift" class="inv">
                  <input type="number" name="vægt1" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps1" value="" placeholder="Reps" class="DataHolder">

                </div>


                <div class="boxes">
                  <div class="numberName">
                    2: Seated Cable Rows
                  </div>

                  <p>
                    Seated cable rows are a traditional upper-back exercise. Adding a pause for three seconds when the bar gets to your torso, however, can increase your gains. The pause keeps your scapular retractors working longer.
                  </p>

                  <img src="imges\PlaningIMGS\row.png" alt="" class="dataIMg">

                  <br>

                  <input type="hidden" name="exname2" value="Seated Cable Rows" class="inv">
                  <input type="number" name="vægt2" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps2" value="" placeholder="Reps" class="DataHolder">

                </div>


                <div class="boxes">
                  <div class="numberName">
                    3: Barbell Curl
                  </div>

                  <p>
                    The biceps curl can be performed a number of ways: standing with dumbbells (both hands curling or alternating), one arm resting on inner thigh as with the concentration curl, preacher curl variations and seated with dumbbells.
                  </p>

                  <img src="imges\PlaningIMGS\bb-curl.png" alt="" class="dataIMg">

                  <br>

                  <input type="hidden" name="exname3" value="Barbell Curl" class="inv">
                  <input type="number" name="vægt3" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps3" value="" placeholder="Reps" class="DataHolder">
                </div>


                <div class="boxes">
                  <div class="numberName">
                    4: Hammer Curls
                  </div>

                  <p>
                    The hammer curl, although not strictly a biceps exercise, will develop the brachialis, lending a greater degree of overall size to the biceps area. The brachialis, the strongest flexor of the elbow, runs along the side of the upper arm and comprises much of the lower biceps area.
                  </p>

                  <img src="imges\PlaningIMGS\Hammer.png" alt="" class="dataIMg">

                  <br>

                  <input type="hidden" name="exname4" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt4" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps4" value="" placeholder="Reps" class="DataHolder">
                </div>
              </div>

              <div class="days" id="onsdag">
                <div class="Day">Onsdag</div>
                <div class="boxes">
                  <div class="numberName">
                    1: Lying cable flyes
                  </div>

                  <p>
                    Place a flat bench between two low cable pulleys. Grasp the stirrup (handle) of each pulley and lie supine (on your back) between the two pulleys, with your arms extended out to your sides. Flex your elbows slightly, and internally rotate your shoulders so that your elbows point out to the sides.
                  </p>

                  <img src="imges\PlaningIMGS\Cable+Fly.png" alt="" class="dataIMg">

                  <br>
                  <input type="hidden" name="exname5" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt5" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps5" value="" placeholder="Reps" class="DataHolder">
                </div>


                <div class="boxes">
                  <div class="numberName">
                    2: Lying Machine Chest Press
                  </div>

                  <p>
                    The seated chest press machine is an upright version of the standard lying bench press machine. The arms, placed under a weight-bearing load, are pushed away from the chest and returned to starting position. The chest press helps build the pectoral muscles as well as the biceps, deltoids, and latissimus dorsi muscles.
                  </p>

                  <img src="imges\PlaningIMGS\Lying+Machine+Chest+Press.png" alt="" class="dataIMg">

                  <br>
                  <input type="hidden" name="exname6" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt6" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps6" value="" placeholder="Reps" class="DataHolder">
                </div>


                <div class="boxes">
                  <div class="numberName">
                    3: Cable Triceps Rope Pushdowns
                  </div>

                  <p>
                    This move zones in on your triceps – but only if you do it right. If you use too much weight, you’ll involve your back and shoulder muscles, defeating the purpose. If you can’t keep your shoulders down, lighten the load.
                  </p>

                  <img src="imges\PlaningIMGS\Cable+Triceps+Rope+Pushdowns.png" alt="" class="dataIMg">

                  <br>
                  <input type="hidden" name="exname7" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt7" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps7" value="" placeholder="Reps" class="DataHolder">
                </div>


                <div class="boxes">
                  <div class="numberName">
                    4: Skullcrushers
                  </div>

                  <p>
                    Whilst there are many variations of this move, they all have one thing in common: elbow extension. As the upper arms are locked in position, the long and lateral tricep heads are called into play. Increasing the angle of an incline bench will work your triceps long head, while doing the movement on a decline bench places more emphasis on the lateral triceps head.
                  </p>

                  <img src="imges\PlaningIMGS\skull.png" alt="" class="dataIMg">

                  <br>
                  <input type="hidden" name="exname8" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt8" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps8" value="" placeholder="Reps" class="DataHolder">
                </div>
              </div>

              <div class="days" id="fredag">
                <div class="Day">Fredag</div>
                <div class="boxes">
                  <div class="numberName">
                    1: Barbell Curl
                  </div>

                  <p>
                    The biceps curl can be performed a number of ways: standing with dumbbells (both hands curling or alternating), one arm resting on inner thigh as with the concentration curl, preacher curl variations and seated with dumbbells.
                  </p>

                  <img src="imges\PlaningIMGS\bb-curl.png" alt="" class="dataIMg">

                  <br>
                  <input type="hidden" name="exname9" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt9" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps9" value="" placeholder="Reps" class="DataHolder">
                </div>

                <div class="boxes">
                  <div class="numberName">
                    2: Cable Triceps Rope Pushdowns
                  </div>

                  <p>
                    This move zones in on your triceps – but only if you do it right. If you use too much weight, you’ll involve your back and shoulder muscles, defeating the purpose. If you can’t keep your shoulders down, lighten the load.
                  </p>

                  <img src="imges\PlaningIMGS\Cable+Triceps+Rope+Pushdowns.png" alt="" class="dataIMg">

                  <br>
                  <input type="hidden" name="exname10" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt10" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps10" value="" placeholder="Reps" class="DataHolder">
                </div>


                <div class="boxes">
                  <div class="numberName">
                    3: Hammer Curls
                  </div>

                  <p>
                    The hammer curl, although not strictly a biceps exercise, will develop the brachialis, lending a greater degree of overall size to the biceps area. The brachialis, the strongest flexor of the elbow, runs along the side of the upper arm and comprises much of the lower biceps area.
                  </p>

                  <img src="imges\PlaningIMGS\Hammer.png" alt="" class="dataIMg">

                  <br>
                  <input type="hidden" name="exname11" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt11" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps11" value="" placeholder="Reps" class="DataHolder">
                </div>


                <div class="boxes">
                  <div class="numberName">
                    4: Skullcrushers
                  </div>

                  <p>
                    Whilst there are many variations of this move, they all have one thing in common: elbow extension. As the upper arms are locked in position, the long and lateral tricep heads are called into play. Increasing the angle of an incline bench will work your triceps long head, while doing the movement on a decline bench places more emphasis on the lateral triceps head.
                  </p>

                  <img src="imges\PlaningIMGS\skull.png" alt="" class="dataIMg">

                  <br>
                  <input type="hidden" name="exname12" value="Hammer Curls" class="inv">
                  <input type="number" name="vægt12" value="" placeholder="Vægt i kg" class="DataHolder">
                  <input type="number" name="reps12" value="" placeholder="Reps" class="DataHolder">
                </div>
              </div>
              <button id="saveData" type="submit" name="saveData" class="goB">Save data</button>
            </form>
            <!--
              <button id="saveData" type="submit" name="saveData" class="goB">Save data</button>

              <div class="goB" onclick="Home()">
                Save data
              </div>
            </form>
              -->

          </div>
        </div>

      </div>
    </div>
  </body>
</html>


<?php
  include_once 'vars.php';
  include_once 'fetchDataScript.php';
  include_once 'procesData.php';
  include_once 'optionScript.php';
  include_once 'planing.php';
 ?>
