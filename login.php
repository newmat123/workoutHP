
<?php
  $conection = new mysqli('localhost', 'root', '', 'WorkoutHP');

  $userName = 'mig';
  $password = '1';

  $sql = 'SELECT * FROM users where username = "$userName" LIMIT 1';

  $result = $conection-> query($sql);

  if ($result){
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($password = $row['password']){
          //login
          $_SESSION['id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
        }
      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>


  <body>

    <div class="header">
      <img src="imges\Casper__Nicklas.png" alt="">
    </div>

    <div class="topnav" id="topnav1">

    </div>


    <div class="column">
      <div class="loginHolder">
        <input type="username" name="username" value="" placeholder="User name" class="DataHolder">
        <br>
        <input type="password" name="password" value="" placeholder="Password" class="DataHolder">
        <div id="loginB" onclick="x" class="goB">
          Cuntinue
        </div>

      </div>
    </div>

  </body>

</html>
