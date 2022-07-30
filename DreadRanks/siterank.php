<?php
include 'includes.php';
/*
  Critical = Tier 10
  High Risk = Tier 7
  Moderate Risk = Tier 4
  Low Risk = Tier 2
  No Risk = Tier 0

*/
function site_rank($sr){
  if($sr == 10){
    $log = "WARNING! Invalid Access to Critical page!\n";
    logger($log);
    send_email_user($sr,'Site');
  }
  if($sr == 7){
    $log = "WARNING! Invalid Access to High Risk page!\n";
    logger($log);
    send_email_user($sr,'Site');
  }


}

?>
