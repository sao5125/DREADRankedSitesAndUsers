<?php
ini_set('display_errors', 0);

include 'siterank.php';
session_start();

function access($rank){
  if(isset($_SESSION["ACCESS"]) && !$_SESSION["ACCESS"][$rank]){
    site_rank($rank);
    header("Location: denied.php");
    die;
  }

}

$_SESSION["ACCESS"][10] = isset($_SESSION['myrank']) && ($_SESSION['myrank'] == 10);
$_SESSION["ACCESS"][7] = isset($_SESSION['myrank']) && ($_SESSION['myrank'] >= 7);
$_SESSION["ACCESS"][4] = isset($_SESSION['myrank']) && ($_SESSION['myrank'] >= 4);
$_SESSION["ACCESS"][2] = isset($_SESSION['myrank']) && ($_SESSION['myrank'] >= 2);
$_SESSION["ACCESS"][0] = isset($_SESSION['myrank']) && ($_SESSION['myrank'] >= 0);


?>
