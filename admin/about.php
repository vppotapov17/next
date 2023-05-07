<?php
    include "../connect_db.php";

    $about = '';
    $mission = '';
    $where = '';
    $address = '';
    $time = '';
    $email = '';
    $phone = '';

    $sql = 'SELECT * FROM contact';
    $result = mysqli_query($link, $sql);

    while ($row = mysqli_fetch_array($result)){
        if ($row['name'] == 'about') $about = $row['value'];
        else if ($row['name'] == 'mission') $mission = $row['value'];
        else if ($row['name'] == 'where') $where = $row['value'];
        else if ($row['name'] == 'address') $address = $row['value'];
        else if ($row['name'] == 'time') $time = $row['value'];
        else if ($row['name'] == 'email') $email = $row['value'];
        else if ($row['name'] == 'phone') $phone = $row['value'];
    }
?>
<html>
    <head>
        <title>О нас</title>
        <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Каталог товаров</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="../style-jenodej.css">
            <link rel="stylesheet" href="../style-about.css">
    </head>
    <body>
 
        <?php
            include 'header.php';
        ?>

        <div style="padding: 20px">
            <center>
                <h2 ><img src="../img/odejda.jpg" width="400px" height="400px"></h2>
            </center>
            <h1 align="center" style="color:rgba(26, 25, 25, 0.836)"><b>О нас</b></h1>
            <form action="update_about.php" method="get">
                <input type="hidden" value="about" name="type">
                <textarea rows="5" name="value" style="width: 100%; font-size: 20px; padding: 10px;"><?php echo $about ?></textarea>
                <button>Изменить</button>
            </form>
            <h1 align="center" style="color:rgba(26, 25, 25, 0.836)"><b>Наша миссия</b></h1> 
            <p1 style="font-size: 20px;">
                <form action="update_about.php" method="get">
                    <input type="hidden" value="mission" name="type">
                    <textarea rows="5" name="value" style="width: 100%; font-size: 20px; padding: 10px;"><?php echo $mission ?></textarea>
                    <button>Изменить</button>
                </form>
                <h1 align="center" style="color:rgba(26, 25, 25, 0.836)"><b>Где нас найти</b></h1>
                    <form action="update_about.php" method="get">
                        <input type="hidden" value="where" name="type">
                        <textarea rows="5" name="value" style="width: 100%; font-size: 20px; padding: 10px;"><?php echo $where ?></textarea>
                        <button>Изменить</button>
                    </form>
                <center>
                    <h2 ><img src="../img/karta.jpg" width="1500px"></h2>
                </center>
            </p1> 
        </div>
     <div class="wrapper">
        <h3 style="text-align:center;">Контакты</h3>
    
        <div class="ico-wrap"> <i class="fa fa-map-marker ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Наш фактический адрес:</h4>
            <div class="aio-icon-description">
                <form action="update_about.php" method="get">
                    <input type="hidden" value="address" name="type">
                    <textarea rows="2" name="value" style="width: 100%; font-size: 14px; padding: 10px;"><?php echo $address ?></textarea>
                    <button style="font-size: 13px">Изменить</button>
                </form>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2000.3336307983495!2d30.381946516381834!3d59.91001018186574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631d28339339d%3A0x208e70b1adab8cb4!2z0JzQtdC70YzQvdC40YfQvdCw0Y8g0YPQuy4sIDIyLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywgMTkyMDE5!5e0!3m2!1sru!2sru!4v1650914904104!5m2!1sru!2sru" width="500" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <span class="clearfix"></span>
    
        <div class="ico-wrap"> <i class="fa fa-clock-o ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Время работы офиса и склада:</h4>
            <div class="aio-icon-description">
                <form action="update_about.php" method="get">
                    <input type="hidden" value="time" name="type">
                    <textarea rows="2" name="value" style="width: 100%; font-size: 14px; padding: 10px;"><?php echo $time ?></textarea>
                    <button style="font-size: 13px">Изменить</button>
                </form>
            </div>
        </div>

        <span class="clearfix"></span>
    
        <div class="ico-wrap">
            <i class="fa fa-envelope ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Электронная почта:</h4>
            <div class="aio-icon-description">
                <form action="update_about.php" method="get">
                    <input type="hidden" value="email" name="type">
                    <textarea rows="2" name="value" style="width: 100%; font-size: 14px; padding: 10px;"><?php echo $email ?></textarea>
                    <button style="font-size: 13px">Изменить</button>
                </form>
            </div>
        </div>
    
        <span class="clearfix"></span>
    
        <div class="ico-wrap">
            <i class="fa fa-phone ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Наши Телефоны:</h4>
            <div class="aio-icon-description">
                <form action="update_about.php" method="get">
                    <input type="hidden" value="phone" name="type">
                    <textarea rows="2" name="value" style="width: 100%; font-size: 14px; padding: 10px;"><?php echo $phone ?></textarea>
                    <button style="font-size: 13px">Изменить</button>
                </form>
            </div>
    
        <span class="clearfix"></span>
    
    </div>
    
    <?php
        include 'footer.php';
    ?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</div>
</body>
</html>
