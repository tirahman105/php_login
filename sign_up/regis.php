<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RegistrationS</title>

  <?php include 'links/links.php' ?>
</head>
<body>


<?php
include 'dbcon.php';
 if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  $emailquery = "select * from registration where email='$email' ";
  $query = mysqli_query($con,$emailquery);
  $emailcount = mysqli_num_rows($query);

  if($emailcount>0){
    echo "Email already exists";
  }else{
    if($password === $cpassword){


      $insertquery = "insert into registration(username, email, mobile, password, cpassword) values('$username','$email','$mobile','$pass','$cpass')";

      $iquery = mysqli_query($con, $insertquery);

      if($iquery){
  ?>
    <script>
      alert("Data Inserted Successful")
    </script>
  <?php
}else{
  ?>
    <script>
      alert("No Connection")
    </script>
  <?php
}

    }else{
      ?>
    <script>
      alert("Password are not matching")
    </script>
  <?php
    }
  }
 }

?>
<div class="container">
  <div class="card-bg-light">
  	<article class="card-body-mx-auto" style="max-width: 400px;">
  		
  		<h4 class="card-title mt-3 text-center"> Create Account </h4>
  		<p class="text-center"> Get Started with your free account</p>
  	<!-- 	<p>
  			<a href="" class="btn btn-block btn-gmail"> <i class="fab fa-google"></i> Login Via Gmail</a>
  			<a href="" class="btn btn-block btn-gmail"> <i class="fab fa-facebook"></i> Login Via Facebook</a>
  		</p> -->

  		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
  			<div class="form-group input-group">
  				<div class="input-group-prepend">
  					<span class="input-group-text"> <i class="fa fa-user"></i></span>
  				</div>
  				<input name="username" class="form-control" placeholder="Full name" type="text" required>
  			</div>

  			<div class="form-group input-group">
  				<div class="input-group-prepend">
  					<span class="input-group-text"> <i class="fa fa-envelope"></i></span>
  				</div>
  				<input name="email" class="form-control" placeholder="Email address" type="email" required>
  			</div>

  			<div class="form-group input-group">
  				<div class="input-group-prepend">
  					<span class="input-group-text"> <i class="fa fa-phone"></i></span>
  				</div>
  				<input name="mobile" class="form-control" placeholder="Phone number" type="number" required>
  			</div>

  			<div class="form-group input-group">
  				<div class="input-group-prepend">
  					<span class="input-group-text"> <i class="fa fa-lock"></i></span>
  				</div>
  				<input name="password" class="form-control" placeholder="Create password" type="password" required>
  			</div>

  			<div class="form-group input-group">
  				<div class="input-group-prepend">
  					<span class="input-group-text"> <i class="fa fa-lock"></i></span>
  				</div>
  				<input name="cpassword" class="form-control" placeholder="Repeat password" type="password" required>
  			</div>

  			<div class="form-group">
  				<button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
  			</div>

  			<p class="text-center"> Have an account? <a href="login.php">Log In</a></p>

  		</form>
  		
  	</article>
  </div>
</div>

</body>
</html>