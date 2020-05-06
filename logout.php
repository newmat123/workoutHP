<?php
  //starter session.
  session_start();

  //fjerner id og username.
  unset($_SESSION['id']);
  unset($_SESSION['username']);

  //sletter session.
  session_destroy();

  //viderstiller til startsiden.
  header('location: index.php');

?>
