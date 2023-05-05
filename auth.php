<?php
	include 'connect_db.php';
	session_start();

	$userEmail = $_POST['userEmail'];
	$userPass = $_POST['userPass'];

	if (isset($userEmail) && isset($userPass)){

		$successAuth = false;
		$sql = 'SELECT * FROM users WHERE email = "'.$userEmail.'"';

        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)){
			if(password_verify($userPass, $row['pass'])){
        		$_SESSION['userEmail'] = $userEmail;
        		$successAuth = true;

        		$sql1 = 'SELECT * FROM admins WHERE email = "'.$userEmail.'"';
				$result1 = mysqli_query($link, $sql1);

				while($row1 = mysqli_fetch_array($result1)){
					$_SESSION['admin'] = true;
				}		
        	}
        }

        if ($successAuth) header('Location: lk.php');	
	}

	
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style-auth.css">
		<title>Авторизация</title>
	</head>
	<body>
		<?php
			include 'header.php';
		?>		
		<section class="block">
			<div class="auth">
			<h2>Авторизация</h2>
			<form action="auth.php" method="post">
				<input placeholder="Адрес эл. почты" type="email" name="userEmail">
				<input placeholder="Пароль" type="password" name="userPass">
				<div id="message"></div>
				<button>ВОЙТИ</button>
				<a href="registration.php">Создать аккаунт</a>
			</form>
			</div>
		</section>
		

		<?php
			include 'footer.php';

			if (isset($successAuth) && !$successAuth){
	        	echo '
				<script type="text/javascript">
					var message = document.getElementById("message");
					message.innerHTML = "Неверные данные";
				</script>';
			}
		?>

	</body>
</html>