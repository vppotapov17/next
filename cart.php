<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Корзина</title>
        <link rel="stylesheet" href="style-cart.css">
        <?php
            include 'connect_db.php';
            $items = $_SESSION['cartItems'];

            $itemId = $_GET['id'];
            if (isset($itemId)){
                $items[$itemId] = '1';

                $_SESSION['cartItems'] = $items;
            }

        ?>
    </head> 
    <body>
        <?php
            include 'header.php';
        ?>

        <section class="cartItems">
            <h2>Корзина</h2>
            <div class="items">

                <?php 
                    $cartItems = $_SESSION['cartItems'];

                    if (isset($cartItems)){
                        foreach(array_keys($cartItems) as $itemId){
                            $sql = 'SELECT * FROM items WHERE id = "'.$itemId.'"';

                            $result = mysqli_query($link, $sql);

                            while ($row = mysqli_fetch_array($result)){
                                $content = '
                                     <div class="item">
                                        <div class="info">
                                            <div class="description">
                                                <img src="'.$row['picture'].'" width="190px">
                                                <div class="header">
                                                    <div class="block1">
                                                        <div class="brand">'.$row['brand'].'</div>
                                                        <div class="name">'.$row['name'].'</div>
                                                    </div>
                                                    <div class="buy">
                                                        <div class="button"><a href="oplata.php?a[0]='.$row['id'].'">КУПИТЬ</a></div>
                                                        <div class="price">'.$row['price'].' ₽</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                       
                                    </div>    
                                    <hr>    
                                ';

                                echo $content;
                            }
                        }
                    }
                ?>

            </div>
        </section>

        <section class="confirm">
            
            <?php 
               if (isset($_SESSION['cartItems'])){ $items = array_keys($_SESSION['cartItems']);
                   $sum = 0;
                   $href = "oplata.php?";
                   $index = 0;
                   foreach($items as $item){
                       $sql = 'SELECT * FROM items WHERE id = "'.$item.'"';

                       $result = mysqli_query($link, $sql);

                       while ($row = mysqli_fetch_array($result)){
                           $sum += $row['price'];
                           $href = $href.'a['.$index.']='.$row['id'].'&';
                       }

                       $index++;
                   }

                   $href = substr($href, 0, -1);

                   echo '<div class="sum">Итого: '.$sum.' ₽</div>';
                   echo '
                       <div class="button">
                           <a href="'.$href.'">ОФОРМИТЬ ЗАКАЗ</a>
                       </div>
                   ';
               }
            ?>

            
                        
        </section>
        <?php
            include 'footer.php';
        ?>
        

    </body>
</html>