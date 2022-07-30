<?php
include "access.php";
access(2);
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Low Risk Page</title>
    <link rel="stylesheet" href="style-pages.css">
</head>

<body>

  <div class="page-text">
      <h1>This is the  <span>Low Risk Page</span></h1>
      <h2> Welcome, <?php echo $_SESSION['myname'];?></h2>
  </div>
</body>
</html>
