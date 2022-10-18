<?php
  session_start();
    if(  !isset( $_SESSION['is_logged_in']  )){
      header('Location: login_screen.php');
  }   

  //connect and check connection to database
  try{
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=techblog3', 'root', '');
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e){
      die("ERROR: Could not connect to database. " . $e->getMessage());
  }

  //Data validation
  $title = $_POST['title'] ?? null;
  $author = $_POST['author'] ?? null;
  $category = $_POST['category'] ?? null;
  $content = $_POST['content'] ?? null;
  $error = 0;
  $error_message = '';

  if($_SERVER["REQUEST_METHOD"] === "POST") {

    $photo = basename($_FILES["fileToUpload"]["name"]) ?? null;

    if(strlen(trim( $title) ) < 1  ){
      $error_message .= 'Title is required.<br />';
      $error = 1;
    }

    if(strlen(trim( $author) ) < 1  ){
      $error_message .= 'Author is required.<br />';
      $error = 1;
    }

    if(strlen(trim( $category) ) < 1  ){
      $error_message .= 'Category is required.<br />';
      $error = 1;
    }

    if(strlen(trim( $content) ) < 1  ){
      $error_message .= 'Content is required.<br />';
      $error = 1;
    }

    if(empty($error_message)) {

    $data = "INSERT INTO new_article (title, author, category, photo, content)VALUES ( :title, :author , :category , :photo, :content )";
      if($statement = $pdo->prepare($data)){

      $statement->bindValue(':title', $title);
      $statement->bindValue(':author', $author);
      $statement->bindValue(':category', $category);
      $statement->bindValue(':photo', $photo);
      $statement->bindValue(':content', $content);
      $statement->execute();

      header("Location: landing_page.php");
      }
    }
   }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create new article - TechBlog</title>
  <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/new_article.css">
  <!--JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!--Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
  <!--Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e5c2e63fe0.js" crossorigin="anonymous"></script>
</head>
<body>
  <!--error message-->
  <?php if($error == 1): ?>
    <div class="">
      <div class="alert alert-danger" role="alert">
        <strong class="">Attention!</strong>
          <p class=""><?php echo $error_message; ?></p>
      </div>
    </div>
  <?php endif; ?>

  <!--header-->
  <header class="p-2">
    <!--navigation bar-->
      <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="landing_page.php">TechBlog</a>
          <!--responsive-->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span></button>
          <!-- -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="navbar-nav ms-auto">
                <a class="nav-link" href="landing_page.php">Home</a>
                <a class="nav-link" href="#">Profile</a><!--maybe after login redirect into this page, then there is the link for new article once user is logged in, if user wants to write then he/she can just click that-->
                <a class="nav-link" href="landing_page.php">Blog</a>
                <a class="nav-link" href="logout.php">Logout</a>
              </div>
            </div>
      </div>
      </nav>
  </header>

    <!-----main----->
    <!-----new article form----->
    <div class="container">
      <div class="row mb-2">
      <h3 class="fw-bold">New Article</h3>
      <form action="/action_page.php"><!--what is this action page hmm, better remove it?-->
        <p><span class="error">&#42; required field</span></p>
      </form>

    <!-----title----->
    <div class="col-md-8">
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        <div class="mt-3 <?php echo ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $title) ) == 0 ? 'has_error' : ''  ); ?>">
          <label for="title"><span class="text-danger">&#42;</span> Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Your Headline" value="<?php echo $title; ?>">
        </div>

    <!-----author----->
        <div class="mt-3 <?php echo ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $author) ) == 0 ? 'has_error' : ''  ); ?>">
          <label for="author"><span class="text-danger">&#42;</span> Author</label>
          <input type="text" class="form-control" id="author" name="author" placeholder="Name" value="<?php echo $author; ?>">
        </div>

    <!-----category----->
        <div class="mt-3 <?php echo ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $category) ) == 0 ? 'has_error' : ''  ); ?>">
          <label for="category"><span class="text-danger">&#42;</span> Category</label>
          <select class="form-select" id="category" name="category" placeholder="Choose..." value="<?php echo $category; ?>">
              <option selected>Choose...</option>
              <option value="Programming">Programming</option>
              <option value="Web Development">Web Development</option>
              <option value="UI/UX Design">UI/UX Design</option>
              <option value="Mechatronics">Mechatronics</option>
              <option value="Game Development">Game Development</option>
              <option value="Machine Learning">Machine Learning</option>
              <option value="Cloud Computing">Cloud Computing</option>
              <option value="Blockchain">Blockchain</option>
              <option value="Internet Of Things">IOT</option>
              <option value="Technology Updates">Technology Updates</option>
          </select>
        </div>

    <!-----photo----->
          <div class="mt-3">
            <form action="./uploadPhoto.php" method="post" enctype="multipart/form-data">
              <label for="fileToUpload">Upload Photo</label><br>
              <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
          </div>

          <div class="error">
            <?php 
            if($_SERVER["REQUEST_METHOD"] === "POST") {
              if($error == 0){
                include 'uploadPhoto.php'; 
              }
            }
            ?>
          </div>


    <!-----content----->
        <div class="mt-3 <?php echo ( $_SERVER['REQUEST_METHOD'] == 'POST' && strlen(trim( $content) ) == 0 ? 'has_error' : ''  ); ?>">
          <label for="content"><span class="text-danger">&#42;</span> Content</label>
          <textarea name="content" id="content" maxlength="1000" class="form-control" placeholder="Type here..." value="<?php echo $content; ?>"></textarea> 
        </div>

    <!-----submit----->
        <div class="form-row pt-4">
          <input type="submit" value="Post" class="btn btn-primary btn-lg">
        </div>
    </form>
  </div>

    <!--this should be dynamic-->
    <div class="col-md-4 d-flex justify-content-center align-items-center">
      <div class="card" style="width: 20rem;">
      <img src="images/user_profile.jpg" class="card-img-top align-items-center" alt="user profile" id="user_profile">
      <div class="card-body">
        <h5 class="card-title text-center fw-bold">Username</h5>
        <p class="card-text text-center mt-3"><b>BIO</b><br> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
      </div>
      <div class="card-body d-flex justify-content-center align-items-center">
        <a href="#" class="card-link">Edit Profile</a>
        <a href="#" class="card-link">Contact Information</a>
      </div>
    </div>
  </div>
  </div>
</div>

    <!-----footer----->
    <div class="container">
    <footer class="blog-footer">
      <div class="d-lg-flex justify-content-lg-between border-top pt-3 pb-4 mt-4 align-items-center">
        <ul class="social-icons list-unstyled w-100 w-sm-auto d-flex align-items-center justify-content-center mb-1">
          <li class="mx-2 px-1"><a aria-label="Facebook" href="#"><i class="fab fa-facebook-square fa-lg"></i></a></li>
          <li class="mx-2 px-1"><a aria-label="Instagram" href="#"><i class="fab fa-instagram fa-lg"></i></a></li>
          <li class="mx-2 px-1"><a aria-label="Twitter" href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
          <li class="mx-2 px-1"><a aria-label="Youtube" href="#"><i class="fab fa-youtube fa-lg"></i></a></li>
          <li class="mx-2 px-1"><a aria-label="GitHub" href="#"><i class="fab fa-github fa-lg"></i></a></li>
        </ul>
      </div>
      <p class="text-center">Copyright &copy; 2022<br/>
        <a href="#" class="btt">Back to top</a>
      </p>
    </footer>
    </div>
  </body>
</html>