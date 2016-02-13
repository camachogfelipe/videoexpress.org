<?php
  $ts = $_GET['ts'];
  session_start();
  // store to test if they *were* logged in
  unset($_SESSION['valid_user']);
  session_destroy();
  if($ts == 1) header("Location: http://mail.redlibreriacristiana.org");
  else header("Location: ../");
?>
