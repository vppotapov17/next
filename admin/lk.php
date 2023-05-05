<?php
	session_start();
	if (isset($_GET['logout']) && $_GET['logout'] == 1){
		$_SESSION['userEmail'] = null;
		$_SESSION['admin'] = false;
	}

	if (!isset($_SESSION['userEmail'])){
		header('Location: ../auth.php ');
	}
	include '../connect_db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Администратор</title>
	<link rel="stylesheet" type="text/css" href="style-lk.css">
</head>
<body>
	<?php
		include 'header.php';
	?>
	<section class="profile">
		<div class="left">
			<img src="../img/profile.png" width="160px">
			<?php 
				$sql3 = 'SELECT * FROM users WHERE email = "'.$_SESSION['userEmail'].'"';
		    	$result3 = mysqli_query($link, $sql3);

		    	while($row3 = mysqli_fetch_array($result3)){
		    		echo '<div class="name">'.$row3['name'].' '.$row3['surname'].' (Администратор)</div>';
		    	}
			?>
		</div>
		<div class="right">
			<div class="button"><a href="lk.php?logout=1">Выйти</a></div>
		</div>
	</section>

	<section class="addItem">
		<h3>Добавить товар</h3>
		<form action="add_item.php" enctype="multipart/form-data" method="post">
			<div class="category">Категория
				<select name="category">
					<?php
						$sql = 'SELECT * FROM categories';
						$result = mysqli_query($link, $sql);

						while($row = mysqli_fetch_array($result)){
							$section;
							if ($row['section'] == 'man') $section = 'Мужчинам';
							else if ($row['section'] == 'woman') $section = 'Женщинам';
							else if ($row['section'] == 'girl') $section = 'Девочкам';
							else if ($row['section'] == 'boy') $section = 'Мальчикам';

							echo '<option value="'.$row['id'].'">'.$section.' | '.$row['name'].'</option>';
						}
					?>
					
				</select>
			</div>
			<div class="brand">Бренд<input type="text" name="brand" required></div>
			<div class="name">Наименование<input type="text" name="name" required></div>
			<div class="description"><div>Описание</div><textarea rows="5" cols="40" name="description"></textarea></div>
			<div class="price">Стоимость<input type="text" name="price"></div>
			<div class="image">Изображение<input type="file" name="itemImage"></div>

			<button>Добавить</button>
		</form>
	</section>

	<section class="myOrders">
		<div class="title">Мои заказы</div>
		<?php
			$userEmail = $_SESSION['userEmail'];
			$sql = 'SELECT * FROM orders WHERE userEmail = "'.$userEmail.'"';
			$result = mysqli_query($link, $sql);

		    
		    while ($row = mysqli_fetch_array($result))
		    {
		    	$orderId = $row['id'];

		    	$sql1 = 'SELECT * FROM orderItems WHERE orderId = "'.$orderId.'"';
		    	$result1 = mysqli_query($link, $sql1);

		    	$itemsContent = "";

		    	while($row1 = mysqli_fetch_array($result1)){
		    		$itemId = $row1['itemId'];

		    		$sql2 = 'SELECT * FROM items WHERE id = "'.$itemId.'"';
		    		$result2 = mysqli_query($link, $sql2);

		    		while($row2 = mysqli_fetch_array($result2)){
		    			$itemsContent = $itemsContent.'
		    				<div class="item">
								<img src="../'.$row2['picture'].'" width="170px">
								<div class="info">
									<div class="top">
										<div class="brand">'.$row2['brand'].'</div>
										<div class="name">'.$row2['name'].'</div>
									</div>
									<div class="bottom">
										<div class="price">'.$row2['price'].' ₽</div>
									</div>
									
								</div>
							</div>
		    			';			    		
		    		}
		    	}

		    	$content = '
		    	<div class="order">
					<div class="header">
						<div class="number">Заказ №'.$orderId.'</div>
						<div class="date">от '.$row['dateTime'].'</div>
					</div>
					<div class="items">
						<div class="title">Товары в заказе</div>
						'.$itemsContent.'
					</div>
					<div class="totalPrice">
						<div class="text">Сумма заказа</div>
						<div class="value">'.$row['price'].' ₽</div>
					</div>
				</div>
		    	';

		    	echo $content;
		    }
		?>
		
	</section>

	<?php
		include 'footer.php';
	?>
</body>
</html>