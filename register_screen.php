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

<?php 
//declare variables
  $first_name = $_POST['first_name'] ?? null;
  $last_name = $_POST['last_name'] ?? null;
  $birth_date = $_POST['birth_date'] ?? null;
  $gender = $_POST['gender'] ?? null;
  $address = $_POST['address'] ?? null;
  $user_name = $_POST['user_name'] ?? null;
  $email = $_POST['email'] ?? null;
  $password = $_POST['password'] ?? null;
  $confirm_password = $_POST['confirm_password'] ?? null;
  $short_bio = $_POST['short_bio'] ?? null;
  $error = 0;
  $password_error = 0;
  $error_message = '';

  include_once 'register_submit.php';

?>
<!--registration form-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up an Account - TechBlog</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/register.css">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!--Font-->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <!--error message-->
    <?php if($error == 1): ?>
      <div class="">
        <div class="alert alert-danger" role="alert">
          <strong class="">Attention!</strong>
            <p class=""><?php echo $error_message; ?></p>
        </div>
      </div>
    <?php endif; ?>

  <div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-5">
      <div class="row align-items-center pt-4 pb-3">
  
  <!----register form----> 
  <!--------Name-------->
  <form id="signup_form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <h1 class="mb-1">TechBlog</h1>
    <p class="text-center fw-bold">Create an account to stay updated. It's quick and easy!</p>
    <p class="text-center text-danger fw-bold">Fields having * is required.</p>
    <div class="row mt-3">
      <h3 class="border-bottom border-primary">Personal Information</h3>
      <div class="col <?php echo ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $first_name) ) == 0 ? 'has_error' : ''  ); ?>">
        <label for="first_name"><span class="text-danger fw-bold">&#42;</span> First Name</label>
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" value="<?php echo $first_name; ?>">
      </div>
      <div class="col <?php echo ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $last_name) ) == 0 ? 'has_error' : ''  ); ?>">
        <label for="last_name"><span class="text-danger fw-bold">&#42;</span> Last Name</label>
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="<?php echo $last_name; ?>">
      </div>
    </div>

    <!--------Birthdate-------->
    <div class="row mt-3">
      <div class="col">
        <label for="birth_date">Birthdate</label>
          <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="MM/DD/YYYY">
      </div>
    </div>
    <br>

    <!--------Gender-------->
    <div class="form-group">
      <span class="pe-5">Gender: </span>
        <label class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="male" >
            <span class="form-check-label"> Male </span>
        </label>

      <span class="pe-5"></span>
        <label class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="female">
            <span class="form-check-label"> Female</span>
        </label>
    </div>
              
    <!--------Address-------->
    <div class="row mt-3">
      <div class="mb-4">
        <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
      </div>
    </div>

    <h3 class="border-bottom border-primary mb-4">Account Information</h3>
    <!--------Username-------->
    <div class="col <?php echo ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $user_name) ) == 0 ? 'has_error' : ''  ); ?>">
      <label for="user_name"><span class="text-danger fw-bold">*</span> Username</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter a username" value="<?php echo $user_name; ?>">
        </div>
    </div>

    <!--------Email-------->
    <div class="col <?php echo ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $email) ) == 0 ? 'has_error' : ''  ); ?>">
      <label for="email"><span class="text-danger fw-bold">*</span> Email</label>
        <div class="input-group mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $email; ?>">
        </div>
    </div>

    <!--------Password-------->
    <div class="row mt-3">
      <div class="col <?php echo ( ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $password) ) == 0  ) || $password_error == 1 ? 'has_error' : ''  ); ?>">
        <label for="password"><span class="text-danger fw-bold">*</span> Password </label>
          <input type="password" class="form-control" id="password" name="password" placeholder="********">
            <small id="passwordHelpBlock" class="form-text text-muted">Must have atleast 8-20 characters.
            </small>
      </div>
                
      <div class="col <?php echo ( ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $confirm_password) ) == 0 ) || $password_error == 1  ? 'has_error' : ''  ); ?>">
        <label for="confirm_password"><span class="text-danger fw-bold">*</span> Confirm Password</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="********">
      </div>
    </div>

    <!--------Upload-------->
    <div class="row mt-3">
      <div class="col">
        <div class="mb-3">
          <form action="./uploadPhoto.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Profile picture:</label><br>
            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
        </div>
      </div>
    </div>

    <div class="error">
      <?php if($_SERVER["REQUEST_METHOD"] === "POST"){

     //upload file
      if($error == 0){
        include_once 'uploadPhoto.php'; 
      }
    }
    ?>
    </div>

    <!--------Short Bio-------->
    <div class="row mt-3">
      <div class="col">
        <label for="short_bio">Bio</label>
          <textarea name="short_bio" id="short_bio" maxlength="300" class="form-control" rows="3" placeholder="Add short bio to tell people more about yourself."></textarea> 
      </div>
    </div>

    <!--------Terms-------->
    <div class="row mt-3">
      <div class="col">
        <label for="agree">
          <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> /> I agree with the
            <a href="#" title="terms and privacy">Terms & Privacy</a></label>
              <small><?= $errors['agree'] ?? '' ?></small>
      </div>
    </div>

    <!--------Sign Up button-------->
    <div class="form-row text-center py-4">
      <input type="submit" value="Sign up" class="btn btn-primary btn-lg"></input>
    </div>

    <!--------Sign In-------->
    <div class="container signin text-center">
      <p>Already have an account? <a href="login_screen.php">Sign in</a>.</p>
    </div>
  </form>

          </div>
    </div>
  </div>

  <?php $_SESSION['registration_success']='1'; ?>
</body>
</html>