<?php
ini_set('display_errors', 0);
session_start();
if(isset($_SESSION['myname'])){
  unset($_SESSION['myname']);
}

if(isset($_SESSION['myid'])){
  unset($_SESSION['myid']);
}

if(isset($_SESSION['myrank'])){
  unset($_SESSION['myrank']);
}

header("Location: login.php");

?>
