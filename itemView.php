<?php 
    session_start();
    if ($_SESSION['admin'] == true) header('Location: admin/itemView.php?id='.$_GET['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style-itemView.css">
        <?php
            include 'connect_db.php';
    
            $sql = 'SELECT * FROM items WHERE id = "'.$_GET['id'].'"';

            $result = mysqli_query($link, $sql);

             while ($row = mysqli_fetch_array($result)){
                echo '<title>'.$row['name'].' '.$row['brand'].'</title>';
                $content = '
                    <img src="'.$row['picture'].'" width="400px">
                    <div class="info">
                        <div class="brand">'.$row['brand'].'</div>
                        <div class="name">'.$row['name'].'</div>
                        <div class="price">'.$row['price'].' ₽</div>
                        <div class="description">'.$row['description'].'</div>
                        <a href="cart.php?id='.$row['id'].'">ДОБАВИТЬ В КОРЗИНУ</a>
                    </div>
                ';
                
             }
        ?>
    </head> 
    <body>
        
        <?php
            include 'header.php';
        ?>

        <section class="view">
            <?php
                echo $content;
            ?>
        </section>

        <?php
            include 'footer.php';
        ?>
    </body>
</html>
