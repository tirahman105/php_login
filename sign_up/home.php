<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log in</title>
  <?php include 'links/links.php' ?>
</head>
<body>


<div class="container">
  <div class="hero" style ="background-color: black; color: white; text-align: center; padding-top: 25px; height: 300px;" >
    <h1>Welcome <?php echo  $_SESSION['username']; ?> </h1>
    <button class="btn btn-primary"><a style= "color: white;" href="logout.php">Log Out</a></button>

    
  </div>
  
</div>

</body>
</html>