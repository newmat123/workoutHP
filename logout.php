<?php

  unset($_SESSION['id']);
  unset($_SESSION['username']);
  session_destroy();

  header('location: index.php');

?>
