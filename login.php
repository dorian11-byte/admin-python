<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /index1.php');
  }

  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if ($results > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /index1.php");
    } else {
      $message = 'Sorry, those credentials dont match';
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Web-STEP</title>
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/logimg.png">
		</div>
		<div class="login-content">
			<form action="login.php" method="post">
				<img src="img/iconStep.png">
				<h2 class="title">Welcome User</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input" name="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
				<?php if(!empty($message)): ?>
      					<p style="color: red;"> <?= $message ?></p>
    				<?php endif; ?>
            	<input type="submit" class="btn" value="Login">
                <a href="register.php">Are you not register? Register</a>
				<a href="../landing/index.html" style="color: blue;;">Back to home...</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>