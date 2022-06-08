<?php

  require 'database.php';

  $message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = "INSERT INTO `users` (`email`, `password`, `name`, `tel`) VALUES (:email, :password, :name, :tel);";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email', $_POST['email']);
		$stmt->bindParam(':name', $_POST['name']);
		$stmt->bindParam(':tel', $_POST['tel']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password);
	
		if ($stmt->execute()) {
			$message = 'Usuario Creado correctamente';
		} else {
		  $message = 'Lo sentimos ocurrio un error creando tu cuenta';
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

	<?php if(!empty($message)): ?>
		<script type="text/javascript"> alert("<?= $message; ?>"); window.location="login.php"; </script>
	<?php endif; ?>

	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/logimg.png">
		</div>
		<div class="login-content">
			<form action="register.php" method ="post" name="addForm">
				<img src="img/iconStep.png">
				<h2 class="title">Register</h2>

				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-solid fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5> Full Name</h5>
           		   		<input type="text" class="input" name="name" required="required">
           		   </div>
           		</div>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-solid fa-phone"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Telephone</h5>
           		   		<input type="number" class="input" name="tel" required="required">
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input" name="email" required="required">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required="required">
            	   </div>
            	</div>
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="password" class="input" name="cpassword" required="required">
            	   </div>
            	</div>
            	<input type="submit" name="register" class="btn" value="Register" onclick="validarform();">
                <a href="login.php">Are you register? Login</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
