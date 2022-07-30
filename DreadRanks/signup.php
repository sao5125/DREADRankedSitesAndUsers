<?php

$error = "";
function create_userid(){

  $length = rand(4,20);
  $number = "";
  for($i=0;$i<$length;$i++){

    $new_rand = rand(0,9);

    $number = $number . $new_rand; //add a new random number from 0 to 9
  }

  return $number;
}

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(!$DB=new PDO("mysql:host=localhost;dbname=access_db","root","")){
      die("Unable to reach Database");
    }

    //save to database
    $arr['user_id'] = create_userid();
    $condition = true;
    //check for existing user id
    while($condition)
    {
      $query = "select id from users where user_id = :user_id limit 1"; //query for user id
      $stm = $DB->prepare($query); //statement that prepares $query
      if($stm){
        $success = $stm->execute($arr);
        if ($succcess) {
          $data = $stm->fetchAll(PDO::FETCH_ASSOC);
          if(is_array($data) && count($data) > 0){
            $arr['user_id'] = create_userid();
            continue;
          }
        }

      }
      $condition = false;
    }

    $arr['name'] = $_POST['name'];
    $arr['email'] = $_POST['email'];
    $arr['password'] = hash('sha1',$_POST['password']);
    $arr['rank'] = 0; //default rank of lowest privlege

    $query = "insert into users (user_id,name,email,password,rank) values (:user_id,:name,:email,:password,:rank)";
    $stm = $DB->prepare($query);
    if($stm){
      $success = $stm->execute($arr);
      if(!$success){
        $error = "could not save to database";
      }
      if($error == ""){

        header("Location: login.php");
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

</head>
<body>
  <div class="container">
    <form action="" method="POST" class="signup-email">
      <p class="signup-header" style="font-size: 2rem;">Register</p>
      <div class="input">
        <input type="text" placeholder="Name" name="name" required>
      </div>
      <div class="input">
        <input type="text" placeholder="Email" name="email" required>
      </div>
      <div class="input">
        <input type="password" placeholder="Password" name="password" required>
      </div>
      <div class="input">
        <input type="password" placeholder="Confirm Password" name="confirmpassword" required>
      </div>
      <div class="input">
        <button name="submit" class="btn">Register</button>
      </div>
      <p class="login-redirect">Already have an account? <a href="login.php">Login Here</a>.</p>
    </form>
  </div>
</body>
</html>
