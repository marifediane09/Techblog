<!--landing_screen-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>TechBlog - Home</title>
	<!--CSS Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/landing_page.css">
	<!--JS Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <!--Icons-->
  <script src="https://kit.fontawesome.com/e5c2e63fe0.js" crossorigin="anonymous"></script>
</head>
<body>
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
	        			<a class="nav-link active" aria-current="page" href="#">Home</a>
	        			<a class="nav-link" href="#About">About</a>
	        			<a class="nav-link" href="#Whats_new">What's New?</a>
	        			<a class="nav-link" href="#">Subscribe</a>
                <a class="btn btn-primary" href="register_screen.php">Sign Up</a>
      				</div>
    				</div>
    	</div>
			</nav>
  </header>

  <!--main-->
	<main>
  	<div class="p-4 p-md-5 mb-4 text-white rounded bg-dark" id="main">
      <div class="container">
    	<div class="col-md-6 px-0">
      	<h1 class="display-4 fw-bold">TechEvent for Programmers 2022!</h1>
      	<p class="lead my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      	<p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
      </div>
    	</div>
  	</div>

  <div class="container">
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Programming</strong>
          <h3 class="mb-0">Featured</h3>
          <div class="mb-1 text-muted">April 2022</div>
          <p class="card-text mb-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://images.unsplash.com/photo-1631624215749-b10b3dd7bca7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" width="200" height="250">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Web Design</strong>
          <h3 class="mb-0">Featured</h3>
          <div class="mb-1 text-muted">April 2022</div>
          <p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" width="200" height="250">
        </div>
      </div>
    </div>
  </div>
</div>
    
    <!--articles-->
    <article class="blog-post">
      <div class="container">
        <div class="row">
          <div class="col-md-8">

    <!--articles here-->
    <?php include 'updated_articles.php'; ?>
    </div>

  <div class="col-md-4">
      <aside style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fw-bold" id="About">About</h4>
          <p class="mb-0">TechBlog is a blog created by a group of IT students which aims to share valuable information related to technology.</p>
        </div>

        <div class="p-4">
          <h4 class="fw-bold">Most Popular</h4>
            <div class="list-unstyled lh-lg" id="popular_link">
              <a href="#">TechEvent for Programmers 2022!</a><br>
              <a href="#">Programming Competition Season 2</a><br>
              <a href="#">On-The-Job Trainings</a><br>
              <a href="#">Mechatronics Webinar</a><br>
            </div>
        </div>

        <div class="p-4">
          <h4 class="fw-bold">Categories</h4>
            <div class="list-unstyled lh-lg" id="categories">
              <a href="#">Programming</a>&nbsp;&nbsp;
              <a href="#">Web Development</a><br>
              <a href="#">UI/UX Design</a>&nbsp;&nbsp;
              <a href="#">Mechatronics</a><br>
              <a href="#">Game Development</a><br>
              <a href="#">Machine Learning</a><br>
              <a href="#">Cloud Computing</a><br>
              <a href="#">Blockchain</a><br>
              <a href="#">Internet of Things</a><br>
              <a href="#">Technology Updates</a><br>
            </div>
        </div>
      </aside>
    </div>
    </div>
  </div>
  </article>

  <!--new articles-->
  <article>
    <div class="container">
      <br>
      <h2 class="text-center" id="Whats_new">What's New?</h2>
      <br>
      <div class="row row-cols-3">
        <div class="col">
          <div class="d-flex justify-content-center">
          <div class="card" style="width: 20rem;">
            <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="Codes">
            <div class="card-body">
              <a href="#" class="stretched-link"></a>
              <h5 class="card-title fw-bold">Best programming languages to learn as a beginner</h5>
              <!--<p class="card-text">Lorem ipsum...</p>-->
            </div>
          </div>
        </div>
      </div>

    <div class="col">
      <div class="d-flex justify-content-center">
      <div class="card" style="width: 20rem;">
        <img src="https://images.unsplash.com/photo-1485827404703-89b55fcc595e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="A white robot looking at you">
        <div class="card-body">
          <a href="#" class="stretched-link"></a>
          <h5 class="card-title fw-bold">Learn robotics online and get a certificate for free</h5>
        </div>
      </div>
    </div>
    </div>

    <div class="col">
      <div class="d-flex justify-content-center">
      <div class="card" style="width: 20rem;">
        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="Working people inside an office">
        <div class="card-body">
          <a href="#" class="stretched-link"></a>
          <h5 class="card-title fw-bold">How the IT industry continue to grow</h5>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</article>
<br>
</main>

  <!--footer-->
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