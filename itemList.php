<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style-itemlist.css">
        <?php
            include 'connect_db.php';

            $categoryId = $_GET['categoryId'];
            $title;

            $sql = 'SELECT * FROM categories WHERE id = "'.$categoryId.'"';

            $result = mysqli_query($link, $sql);

            while ($row = mysqli_fetch_array($result)){
                $title = $row['name'];
            }
            
            echo '<title>'.$title.'</title>';
        ?>

    </head> 
    <body>
        
        <?php
            include 'header.php';
        ?>

        <section class="list">
           
            <?php 
                echo '<h2>'.$title.'</h2>';
            ?>

            <div class="items">
                
                <?php
                    $sql = 'SELECT * FROM items WHERE categoryId = "'.$categoryId.'"';

                    $result = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_array($result)){
                        $title = $row['name'];
                        
                        $href = 'itemView.php?id='.$row['id'];
                        $content = '
                        <div class="item">
                            <a href="'.$href.'"><img src="'.$row['picture'].'" width="170px"></a>
                            <div class="brand">'.$row['brand'].'</div>
                            <div class="name">'.$row['name'].'</div>
                            <div class="buy">
                                <a href="cart.php?id='.$row['id'].'">В КОРЗИНУ</a>
                                <div class="price">'.$row['price'].' ₽</div>
                            </div>
                        </div>';

                        echo $content;
                    }
                ?>
            </div>
  
        </section>

        <?php
            include 'footer.php';
        ?>
    </body>
</html>
