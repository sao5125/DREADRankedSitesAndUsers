<?php
include "access.php";
access(7);
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>High Risk Page</title>
    <link rel="stylesheet" href="style-pages.css">
</head>

<body>

  <div class="page-text">
      <h1>This is the  <span>High Risk Page</span></h1>
      <h2> Welcome, <?php echo $_SESSION['myname'];?></h2>
  </div>
</body>
</html>
