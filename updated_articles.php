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
  <style>
    .author-link, .tag-link{
      text-decoration: none;
    }

    .display_image{
      height: 300px;
      width: 500px;
      display: block;
      margin: 0px auto;
    }

    #content, .align {
      padding: 0px 40px;
    }

  </style>
</head>
<body>

  <?php 
  //select data from new article table
  $select = $pdo->prepare('SELECT * FROM `new_article`');
  $select->execute();
  //fetch all data and put to variable new_articles
  $new_articles = $select->fetchAll(PDO::FETCH_ASSOC);

  foreach ($new_articles as $key => $data) {
    echo '<h2 class="align">'.$data['title']. '</h2>';
    echo '<span class="align">Uploaded by: '.'<a href="#" class="author-link">'. $data['author']. '</a></span><br>';
    echo '<span class="align">Tag(s): '. '<a href="#" class="tag-link">'.$data['category']. '</a></span><br><br>';
    if ($data['photo'] != null){
      $imageURL = './uploads/'.$data['photo'];
      echo "<img src= '$imageURL' class='display_image'>" . '<br><br>';
    } else {
      echo '<span></span>';
    }
    echo '<p class="text-justify" id="content">'.$data['content']. '</p>';
  }

?>

</body>
</html>