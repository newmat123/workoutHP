<?php
  //starter session
  session_start();

  //opretter de forskellige arrays til senere brug.
  $name1 = array();
  $names = array();
  $reps = array();
  $kg = array();
  $date = array();

  //får fat i brugerens unikke id
  $userid = $_SESSION['id'];

  //opretter forbindelse til databasen
  $db = mysqli_connect('localhost', 'root', '', 'workouthp');

  //søger efter alt userens data i databasen sorteret efter date.
  $getdata_query = "SELECT * FROM progressdata WHERE userid='$userid' order by date ASC";
  $result = mysqli_query($db, $getdata_query);

  //gemmer al dataen i de forskellige arrays.
  while ($row = $result->fetch_assoc()) {
    array_push($names, $row['exercisename']);
    array_push($reps, $row['reps']);
    array_push($kg, $row['kg']);
    array_push($date, $row['date']);
  }

  //lukker forbindelsen igen.
  $db->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>workoutHp - User page</title>
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

    //henter alle øvelses navnene og laver det til en array.
    var name = <?php echo json_encode($names); ?>;
    var exNames = name.split(',');

    //henter den resterende data fra bagend til front end.
    var reps = <?php echo json_encode($reps); ?>;
    var kg = <?php echo json_encode($kg); ?>;
    var date = <?php echo json_encode($date); ?>;

    //en array af alle den øvelses navne der er.
    var allExNames = ['Barbell Deadlift','Seated Cable Rows','Barbell Curl','Hammer Curls','Lying cable flyes','Lying Machine Chest Press','Cable Triceps Rope Pushdowns','Skullcrushers','Barbell Curl','Cable Triceps Rope Pushdowns','Hammer Curls','Skullcrushers'];

    //for hver øvelse:
    for (var i = 0; i < allExNames.length; i++) {

      //bruges til at holde styr på hvor den relevante data er i de forskellige arrays
      var indexArr = [];

      //finder de relevante index og gemmer dem.
      for (var j = 0; j < exNames.length; j++) {
        if(allExNames[i] == exNames[j]){
          indexArr.push(j);
        }
      }

      //de endelige datasæt, som kun kommer til at indeholde den relevante data for hver øvelse
      var dataSetReps = [];
      var dataSetKg = [];
      var dataSetDate = [];

      //smider den relevante  data i.
      for (var k = 0; k < indexArr.length; k++) {
        dataSetReps.push(reps[indexArr[k]]);
        dataSetKg.push(kg[indexArr[k]]);
        dataSetDate.push(date[indexArr[k]]);
      }

      //dette er fra https://www.chartjs.org/
      var ctx = document.getElementById(i).getContext('2d');

      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: dataSetDate, //datoerne
          datasets: [{
            label: 'reps',
            data: dataSetReps, //dataset 1

            borderColor: [
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
            },
            {
              label: 'kg',
              data: dataSetKg, //dataset 2

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
  //inkludere scriptet optionScript.php (bruges til log ud knappen).
  include_once 'optionScript.php';
 ?>
