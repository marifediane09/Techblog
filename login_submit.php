<?php
	session_start();

	//connect and check connection to database
  	try{
    	$pdo = new PDO('mysql:host=localhost;port=3306;dbname=techblog3', 'root', '');
    	// Set the PDO error mode to exception
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  	} catch(PDOException $e){
      	die("ERROR: Could not connect to database. " . $e->getMessage());
  	}

  	//check if login_submit is set
	if(isset($_POST['login_submit'])){

		$email = $_POST['email'];
		$password = $_POST['password'];


		//select all data from user_info
		$statement = $pdo->prepare('SELECT * FROM `user_info` WHERE `user_info`.`email` = :email AND `password` = :password');
		$statement->bindValue(':email', $email);
		$statement->bindValue(':password', md5($password));
		$statement->execute();
		$user = $statement->fetchAll(PDO::FETCH_ASSOC);

		$users['row_count'] = $statement->rowCount(); // returns 1 if successsful else 0 on failure

		if ($users['row_count'] == 1){
			//echo 'pass found';
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			$_SESSION['is_logged_in'] = 1;

			header("Location: new_article.php");
		}
		/*if ($user['email'] == $email){
			if ($user['password'] == md5($password)){
				echo 'pass found';
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['is_logged_in'] = 1;

				header("Location: new_article.php");
		}
	} */
	else {
		header("Location: ./login_screen.php?error");
	}
}

?>
