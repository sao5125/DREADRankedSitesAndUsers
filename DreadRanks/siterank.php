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
  $log = "WARNING! Invalid Access to Site of Severity Rank: ". $sr;
  logger($log);
  if($sr >= 7){ //can be customized
    send_email_user($sr,'Site');
  }
}

?>
