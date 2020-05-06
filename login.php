<?php
  //starter session
  session_start();

  //Checker om brugeren har klikket på login knappen.
  if (isset($_POST['loginB'])) {

    //Opret database forbindelse.
    $db = new mysqli('localhost', 'root', '', 'workouthp');

    //Hent brugernavn og password fra input-felterne.
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //Finder bruger ved hjælp af $username.
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = $db->query($sql);

    if($result){
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

          //cryptere det givne password og tjækker om det stemmer over ens.
          $password = md5($password);

          //tjekker om $password er correkt.
          if ($password === $row['password']){

            //gemmer id og brugernavn i session.
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            //Lukker databaseforbindelse.
            $db->close();

            //Viderstiller til startsiden.
            header('location: index.php');
            exit(0);
          }
          else {
            //besked hvis adgangskoden ikke passer.
            echo "<script type='text/javascript'>alert('Password does not match');</script>";
          }
        }
      }
      else{
        //besked hvis brugernavnet ikke passer.
        echo "<script type='text/javascript'>alert('Username is invalid');</script>";
      }
    }
    //Lukker databaseforbindelse.
    $db->close();
  }
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

    </div>

    <div class="column">

      <form action="login.php" method="post" class="login">
        <div class="loginHolder">


          <input type="text" required="required" name="username" value="" placeholder="Enter Username" class="DataHolder">
          <br>
          <input type="password" required="required" name="password" value="" placeholder="Enter password" class="DataHolder">
          <br>
          <button id="loginB" type="submit" name="loginB" class="goB">Login</button>


          <button class="goB"><a href="register.php">Register a new user</a></button>

        </div>
      </form>

    </div>

  </body>
</html>
