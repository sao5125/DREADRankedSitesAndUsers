<?php
ini_set('display_errors', '0');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



function logger($log){
  if(!file_exists('log.txt')){
    file_put_contents('log.txt', '');
  }

  $ip = $_SERVER['REMOTE_ADDR']; //client ip
  date_default_timezone_set('America/Chicago');
  $time = date('m/d/y h:iA',time());
  $user = '';
  if($_SESSION['myname']){
    $user .= ' by user : ' . $_SESSION['myname'];
  }
  $contents = file_get_contents('log.txt');
  $contents .= "$ip\t$time\t$log\t$user\r\n";
  file_put_contents('./log.txt',$contents);


}

function send_email_user($severity,$type){
  $from = 'researchemailt1@gmail.com';
  $from_name = 'System Monitor';
  $subject = 'Invalid ' . $type . ' Access!';
  $body = 'Invalid '.$type . ' Access of severity: '. $severity . ".\n" . 'Review Attached Logs.';
  $mail = new PHPMailer();  // create a new object
   $mail->IsSMTP(); // enable SMTP
   $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAuth = true;  // authentication enabled
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   $mail->Host = 
   $mail->Port =
   $mail->Username =
   $mail->Password =;
   $mail->SetFrom($from, $from_name);
   $mail->Subject = $subject;
   $mail->Body = $body;
   $mail->AddAddress('researchemailt1@gmail.com');
   $file_to_attach = './log.txt';

   $mail->AddAttachment( $file_to_attach , 'log.txt' );
   if(!$mail->Send()) {
       $error = 'Mail error: '.$mail->ErrorInfo;
       return false;
   } else {
       $error = 'Message sent!';
       return true;
   }


}

?>
