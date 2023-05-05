<?php
	include 'connect_db.php';
	session_start();

	$email = $_POST['userEmail'];
	$pass = $_POST['userPass'];
	$name = $_POST['userName'];
	$surname = $_POST['userSurname'];

	$hash = password_hash($pass, PASSWORD_BCRYPT);

	if (isset($email) && isset($pass) && isset($name) && isset($surname))
	{
		$sql = 'INSERT INTO `users` (`email`, `pass`, `name`, `surname`) VALUES("'.$email.'", "'.$hash.'", "'.$name.'", "'.$surname.'")';
        $result = mysqli_query($link, $sql);

        if ($result){
        	$_SESSION['userEmail'] = $email;
        	header('Location: lk.php');
        }
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style-registration.css">
		<title>Регистрация</title>
	</head>
	<body>
		<?php
			include 'header.php';
		?>		
		<section class="block">
			<div class="auth">
			<h2>Регистрация</h2>
				<form action="registration.php" method="post">
					<input placeholder="Имя" type="text" name="userName">
					<input placeholder="Фамилия" type="text" name="userSurname">
					<input placeholder="Адрес эл. почты" type="email" name="userEmail">
					<input placeholder="Пароль" type="password" name="userPass">
					<input placeholder="Повторите пароль" type="password">
					<button>ЗАРЕГИСТРИРОВАТЬСЯ</button>
					<a href="auth.php">Уже есть аккаунт?</a>
				</form>
			</div>
		</section>
		

		<?php
			include 'footer.php';
		?>
	</body>
</html>