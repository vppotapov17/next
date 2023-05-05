<?php
    session_start();
    include 'connect_db.php';
    if (!isset($_SESSION['userEmail'])) header("Location: lk.php");
    if (isset($_GET['successPayment'])){

        $a = $_GET['a'];
        $sql1 = 'SELECT * FROM orders';
        $result1 = mysqli_query($link, $sql1);

        $orderId = 1;
        while ($row = mysqli_fetch_array($result1))
        {
            $orderId++;
        }

        $userEmail = $_SESSION['userEmail'];
        $dateTime = date('Y-m-d H:i:s');
        $itemsArray = $_GET['a'];
        $totalPrice = 0;

        foreach($itemsArray as $itemId){
            $sql2 = 'SELECT * FROM items WHERE id = "'.$itemId.'"';
            $result2 = mysqli_query($link, $sql2);

            while($row = mysqli_fetch_array($result2)){
                $totalPrice += $row['price'];
            }
        }

        $sql3 = 'INSERT INTO `orders` (`id`, `userEmail`, `dateTime`, `price`) VALUES("'.$orderId.'", "'.$userEmail.'", "'.$dateTime.'", "'.$totalPrice.'")';
        $result3 = mysqli_query($link, $sql3);
        
        if ($result3){
            foreach ($a as $itemId){
                $itemPrice;
                $sql5 = 'SELECT * FROM items WHERE id = "'.$itemId.'"'; 
                $result5 = mysqli_query($link, $sql5);
                while($row = mysqli_fetch_array($result5)){
                    $itemPrice = $row['price'];
                }

                $sql4 = 'INSERT INTO `orderItems` (`itemId`, `orderId`, `price`) VALUES("'.$itemId.'", "'.$orderId.'", "'.$itemPrice.'")';
                $result4 = mysqli_query($link, $sql4);
                if ($result4) {
                    header('Location: lk.php');
                }
            }    
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ОПЛАТА</title>
        <html lang="en">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Каталог товаров</title>
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style-oplata.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    </head> 

    <body>
        <?php
            include 'header.php';
        ?>

        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="oplata.php">
                        <div class="col-50">
                            <h3>Платеж</h3>
                            <br>
                            <label for="cname">Имя на карте</label>
                            <input type="text" id="cname" name="cardname" placeholder="Иванов Андрей Сергеевич">
                            <label for="ccnum">Номер карты</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Срок</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="01/34">
                        
                       
                        <?php
                            $index = 0;
                            $totalPrice = 0;
                            $href = 'oplata.php?';

                            foreach($_GET['a'] as $item){
                                $sql = 'SELECT * FROM items WHERE id = "'.$item.'"';

                                $result = mysqli_query($link, $sql);

                                while ($row = mysqli_fetch_array($result)){
                                    $totalPrice += $row['price'];
                                    $href = $href.'a['.$index.']='.$row['id'].'&';
                                }

                                $index++;
                            }


                            $href = $href.'successPayment=1';
                            echo ' <div class="button"><a href="'.$href.'">Оплатить</a></div>';
                        ?>
                        
                            <hr>
                            <p>Сумма к оплате <span class="price" style="color:black">
                            <?php
                                echo '<b id="sum">'.$totalPrice.' ₽</b>';
                            ?>
                            </span></p>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
   
        <?php 
            include 'footer.php';
        ?>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>