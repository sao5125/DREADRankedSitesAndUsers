
<?php
ini_set('display_errors', 0);
include 'includes.php';
session_start();//start current logging session
$error = "";

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(!$DB=new PDO("mysql:host=localhost;dbname=access_db","root","")){
      die("Unable to reach Database");
    }

    $arr['email'] = $_POST['email'];
    $arr['password'] = hash('sha1',$_POST['password']);

    $query = "select * from users where email= :email && password= :password limit 1";
    $stm = $DB->prepare($query);

    if($stm){
      $success = $stm->execute($arr);

      if($success){
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        if(is_array($data) && count($data) > 0){
          $_SESSION['myid'] = $data[0]['user_id'];
          $_SESSION['myname'] = $data[0]['name'];
          $_SESSION['myrank'] = $data[0]['rank'];
        } else {
          $error = "incorrect username or password";

          if($arr['email'] == "critical@example.com"){
            $log = "WARNING: Critical Account Access !";
            logger($log);
            send_email_user(10,'Account');
          }
          if($arr['email'] == "highrisk@example.com"){
            $log = "WARNING: High Risk Account Access !";
            logger($log);
            send_email_user(7,'Account');
          }

        }
      }

      if($error == ""){
        header("Location: index.php");
        die;
      }
  }
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-header" style="font-size: 2rem;">Login</p>
      <?php
    if($error != ""){
      echo "<br><span style='color:red; text-align:left'>$error</span><br><br>";
    }
  ?>
			<div class="input">
				<input type="text" placeholder="Email" name="email" required>
			</div>
			<div class="input">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-signup">Don't have an account? <a href="signup.php">Signup Here</a>.</p>
		</form>
	</div>
</body>
</html>
