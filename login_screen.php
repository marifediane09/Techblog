<?php
  //connect and check connection to database
  try{
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=techblog3', 'root', '');
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e){
      die("ERROR: Could not connect to database. " . $e->getMessage());
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login to your Account - TechBlog</title>
  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/login.css">
	<!--Bootstrap JS-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Font-->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
	<!----login form---->
	<div class="container">
		<div class="row d-flex justify-content-center align-items-center">
    		<div class="col-md-5">
      		<div class="row align-items-center pt-5 pb-5">
            <!-- error message -->
            <?php if(isset($_GET['error'])): ?>
            <p class="alertmsg">Login Failed: Wrong email or password</p>
            <?php endif; ?>
            <!-- -->
					<form id="login_form" method="post" action="login_submit.php">
    				<h1 class="text-center">TechBlog</h1>
    					<p class="text-center fw-bold" id="note">Login to your account.</p>
    				    <div class="input-group form-group pt-4">
							   <div class="input-group-prepend">
								    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
							   </div>
							   <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
  						<div class="input-group form-group">
							 <div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-lock"></i></span>
							 </div>
							 <input type="password" class="form-control" id="password" name="password" placeholder="Password">
						  </div>
  		
  						<div class="form-check mb-3">
    						<label class="form-check-label">
      							<input class="form-check-input" type="checkbox" name="remember"> Remember me
    						</label><?php echo str_repeat("&nbsp;", 16); ?>
    						<a href="#" class="forgot_pass">Forgot Password?</a>
    					</div>

    					<div class="text-center pt-5">
      						<input type="submit" value="Log In" class="btn btn-primary btn-lg" name="login_submit">
    					</div>
    					<div class="text-center pt-4">Don't have an account? <a href="register_screen.php">Sign up.</a></div>
  					</form>
  				</div>
    		</div>
    	</div>
	</div>
</body>
</html>