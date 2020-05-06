<?php
  //starter session
  session_start();

  //gemmer den pushede data i session. se planing.php
  $_SESSION['day'] = $_POST['data'];
  $_SESSION['date'] = $_POST['data1'];

?>
