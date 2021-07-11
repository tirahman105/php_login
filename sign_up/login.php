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

<?php
include 'dbcon.php';
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = " select * from registration where email='$email'";
  $query = mysqli_query($con,$email_search);

  $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        // $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];




        
        $pass_decode = password_verify($password, $email_pass['password']);

        if($pass_decode){
          echo "Login successful";
          ?>
            <script>
              location.replace("home.php");
            </script>

          <?php
      }else{
      // echo "Password incorrect";
        ?>
    <script>
      alert("Password incorrect")
    </script>
  <?php
      }
    }else{
      echo "Invalid Email";
}


}

?>
<div class="container">
  <div class="card-bg-light">
  	<article class="card-body-mx-auto" style="max-width: 400px;">
  		
  		<h4 class="card-title mt-3 text-center"> Log In </h4>
  		<p class="text-center"> Give your registered email and password</p>
  	<!-- 	<p>
  			<a href="" class="btn btn-block btn-gmail"> <i class="fab fa-google"></i> Login Via Gmail</a>
  			<a href="" class="btn btn-block btn-gmail"> <i class="fab fa-facebook"></i> Login Via Facebook</a>
  		</p> -->

  		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
  			

  			<div class="form-group input-group">
  				<div class="input-group-prepend">
  					<span class="input-group-text"> <i class="fa fa-envelope"></i></span>
  				</div>
  				<input name="email" class="form-control" placeholder="Email address" type="email" required>
  			</div>

  		

  			<div class="form-group input-group">
  				<div class="input-group-prepend">
  					<span class="input-group-text"> <i class="fa fa-lock"></i></span>
  				</div>
  				<input name="password" class="form-control" placeholder="Password" type="password" required>
  			</div>

  		

  			<div class="form-group">
  				<button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
  			</div>

  			<p class="text-center"> Don't Have an account? <a href="regis.php">Create Account</a></p>

  		</form>
  		
  	</article>
  </div>
</div>

</body>
</html>