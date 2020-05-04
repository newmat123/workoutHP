<?php
session_start();


$errors = array();

// connect til databasen
$db = mysqli_connect('localhost', 'root', '', 'workouthp');

// registrer bruger
if (isset($_POST['RegisterB'])) {
  // modtager alle vadier fra de forskellige inputfields
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['cPassword']);

  //tjekker om felterne er tomme og om de to passwords er ens
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
  }

  // tjekker om brugernavnet er taget
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    array_push($errors, "Username already exists");
  }

  // er der ingen fejl. smider vi de nye oplysninger ind i databasen.
  if (count($errors) == 0) {
  	$password = md5($password_1);//crypterer password før det bliver gemt på databasen

  	$query = "INSERT INTO users (username, password)
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);

    // skaffer det passende id til den nye bruger
    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    $_SESSION['id'] = $user['id'];
  	$_SESSION['username'] = $username;

  	header('location: index.php');
  }
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

      <form action="register.php" method="post" class="login">
        <div class="loginHolder">
          <input type="text" required="required" name="username" value="" placeholder="Enter Username" class="DataHolder">
          <br>
          <input type="password" required="required" name="password" value="" placeholder="Enter password" class="DataHolder">
          <br>
          <input type="password" required="required" name="cPassword" value="" placeholder="Confirm password" class="DataHolder">
          <br>
          <button id="RegisterB" type="submit" name="RegisterB" class="goB">Register</button>
          <a href="login.php">Use existing user</a>
        </div>
      </form>

    </div>
  </body>
</html>
