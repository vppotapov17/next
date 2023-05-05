<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style-itemView.css">
        <?php
            include '../connect_db.php';

            $sql = 'SELECT * FROM items WHERE id = "'.$_GET['id'].'"';

            $result = mysqli_query($link, $sql);

             while ($row = mysqli_fetch_array($result)){
                echo '<title>'.$row['name'].' '.$row['brand'].'</title>';
                $content = '
                    <img src="../'.$row['picture'].'" width="400px">
                    <form class="info" action="update_item.php">
                        <input type="hidden" name="id" value="'.$_GET['id'].'">
                        <textarea class="brand" name="brand">'.$row['brand'].'</textarea>
                        <textarea class="name" name="name">'.$row['name'].'</textarea>
                        <p><textarea class="price" name="price">'.$row['price'].' </textarea>₽</p>
                        <textarea class="description" name="description">'.$row['description'].'</textarea>
                        <div class="buttons">
                            <a href="../cart.php?id='.$row['id'].'">В корзину</a>
                            <a href="delete_item.php?id='.$row['id'].'">Удалить товар</a>
                            <button>Изменить</button>
                        </buttons>
                    </form>
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
            include '../footer.php';
        ?>
    </body>
</html>
