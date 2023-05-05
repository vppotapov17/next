<?php
   session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Главная страница</title>
        <link rel="stylesheet" href="style-index.css">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head> 
    <body>
        
        <?php
            include 'header.php';
        ?>

        <section class="menu">
            <nav>
                <ul class="topmenu">
                    <li><a href="categories.php?section=woman">Женщинам</a></li>
                    <li><a href="categories.php?section=man">Мужчинам</a></li>
                    <li><a href="categories.php?section=girl">Девочкам</a></li>
                    <li><a href="categories.php?section=boy">Мальчикам</a></li>
                </ul>
            </nav>
        </section>


        <section class="section">
            <div class="wrap">
                <p> <font size="5"> Лучшие предложения на одежду, солнцезащитные очки и аксессуары в акции «Лето без границ»! Скидки до 70% уже на www.next.ru.Только сегодня при покупке от 2999 бесплатная ДОСТАВКА</font></p>
                <h2><a href="categories.php?section=woman"><img src="img/foto3.png" width="400px" height="400px"></a></h2> 
            </div>
        </section>

        <section class="model">
            <div class=" model1">
                <h1 align="center" style="color:rgba(73, 69, 69, 0.836)">Рекомендации</h1>
                <div class="items">
                    <?php 
                        include 'connect_db.php';
                        $sql = 'SELECT * FROM items';
                        $result = mysqli_query($link, $sql);

                        $items = 0;

                        while ($row = mysqli_fetch_array($result)){
                            if (rand(0,8) == 1 && $items < 5){
                                $items++;

                                $content = '
                                    <div class="item">
                                        <a href="itemView.php?id='.$row['id'].'"><img src="'.$row['picture'].'" width="170px"></a>
                                        <div class="brand">'.$row['brand'].'</div>
                                        <div class="name">'.$row['name'].'</div>
                                        <div class="buy">
                                            <a href="cart.php?id='.$row['id'].'">В КОРЗИНУ</a>
                                            <div class="price">'.$row['price'].' ₽</div>
                                        </div>
                                    </div>
                                ';

                                echo $content;
                            }

                        }
                    ?>
                    
                </div>

            </div>
        </section>
            
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
