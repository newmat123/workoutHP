<?php
  session_start();

  $name1 = array();
  $names = array();
  $reps = array();
  $kg = array();
  $date = array();

  $userid = $_SESSION['id'];

  $db = mysqli_connect('localhost', 'root', '', 'workouthp');


  $getdata_query = "SELECT * FROM progressdata WHERE userid='$userid' order by date ASC";
  $result = mysqli_query($db, $getdata_query);

  while ($row = $result->fetch_assoc()) {
    array_push($names, $row['exercisename']);
    array_push($reps, $row['reps']);
    array_push($kg, $row['kg']);
    array_push($date, $row['date']);
  }

  $db->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>workoutHp - Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
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
            <canvas id="0" width="2000" height="500" class="myChart"></canvas>

          </div>


          <div class="boxes">
            <div class="numberName">
              2: Seated Cable Rows
            </div>

            <img src="imges\PlaningIMGS\row.png" alt="" class="dataIMg">
            <canvas id="1" width="2000" height="500" class="myChart"></canvas>

          </div>


          <div class="boxes">
            <div class="numberName">
              3: Barbell Curl
            </div>

            <img src="imges\PlaningIMGS\bb-curl.png" alt="" class="dataIMg">
            <canvas id="2" width="2000" height="500" class="myChart"></canvas>

          </div>


          <div class="boxes">
            <div class="numberName">
              4: Hammer Curls
            </div>

            <img src="imges\PlaningIMGS\Hammer.png" alt="" class="dataIMg">
            <canvas id="3" width="2000" height="500" class="myChart"></canvas>

          </div>


          <div class="boxes">
            <div class="numberName">
              1: Lying cable flyes
            </div>

            <img src="imges\PlaningIMGS\Cable+Fly.png" alt="" class="dataIMg">
            <canvas id="4" width="2000" height="500" class="myChart"></canvas>

          </div>


          <div class="boxes">
            <div class="numberName">
              2: Lying Machine Chest Press
            </div>

            <img src="imges\PlaningIMGS\Lying+Machine+Chest+Press.png" alt="" class="dataIMg">
            <canvas id="5" width="2000" height="500" class="myChart"></canvas>

          </div>


          <div class="boxes">
            <div class="numberName">
              3: Cable Triceps Rope Pushdowns
            </div>

            <img src="imges\PlaningIMGS\Cable+Triceps+Rope+Pushdowns.png" alt="" class="dataIMg">
            <canvas id="6" width="2000" height="500" class="myChart"></canvas>

          </div>


          <div class="boxes">
            <div class="numberName">
              4: Skullcrushers
            </div>

            <img src="imges\PlaningIMGS\skull.png" alt="" class="dataIMg">
            <canvas id="7" width="2000" height="500" class="myChart"></canvas>

          </div>

        </div>
      </div>

    </div>

    <script>

    var name = <?php echo json_encode($names); ?>;
    var exNames = name.split(',');

    var reps = <?php echo json_encode($reps); ?>;
    var kg = <?php echo json_encode($kg); ?>;
    var date = <?php echo json_encode($date); ?>;


    var allExNames = ['Barbell Deadlift','Seated Cable Rows','Barbell Curl','Hammer Curls','Lying cable flyes','Lying Machine Chest Press','Cable Triceps Rope Pushdowns','Skullcrushers','Barbell Curl','Cable Triceps Rope Pushdowns','Hammer Curls','Skullcrushers'];

    for (var i = 0; i < allExNames.length; i++) {

      var indexArr = [];

      for (var j = 0; j < exNames.length; j++) {
        if(allExNames[i] == exNames[j]){
          indexArr.push(j);
        }
      }

      var dataSetReps = [];
      var dataSetKg = [];
      var dataSetDate = [];

      for (var k = 0; k < indexArr.length; k++) {
        dataSetReps.push(reps[indexArr[k]]);
        dataSetKg.push(kg[indexArr[k]]);
        dataSetDate.push(date[indexArr[k]]);
      }


      console.log(indexArr);

      var ctx = document.getElementById(i).getContext('2d');

      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: dataSetDate,
          datasets: [{
            label: 'reps',
            data: dataSetReps,

            borderColor: [
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
            },
            {
              label: 'kg',
              data: dataSetKg,

              borderColor: [
                  'rgba(255, 99, 132, 1)'
              ],
              borderWidth: 1
            }
          ]
        }
      });
    }



    </script>

  </body>
</html>

<?php
  include_once 'optionScript.php';
 ?>
