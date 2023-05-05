<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = '';
            $section = $_GET['section'];

            if ($section == 'woman') $title = 'Женская одежда';
            else if ($section == 'man') $title = 'Мужская одежда';
            else if ($section == 'girl') $title = 'Одежда для девочек';
            else if ($section == 'boy') $title = 'Одежда для мальчиков';

            echo '<title>'.$title.'</title>'
        ?>
        <link rel="stylesheet" href="style-categories.css">
        <?php
            include 'connect_db.php';
        ?>
    </head> 
    <body>
        
        <?php
            include 'header.php';
        ?>

        <section class="categories">
            <?php
                echo '<h2>'.$title.'</h2>';
            ?>
            
            <div class="items">

                <?php
                     $sql = 'SELECT * FROM categories WHERE section = "'.$section.'"';

                     $result = mysqli_query($link, $sql);
    
                     while ($row = mysqli_fetch_array($result)){
                        $content = '
                            <a href="itemList.php?categoryId='.$row['id'].'" class="item">
                                <img src="'.$row['picture'].'" width="180px">
                                <div class="text">'.$row['name'].'</div>
                            </a>
                        ';
                        
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
