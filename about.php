<?php
    include "connect_db.php";

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
        <link rel="stylesheet" href="style-jenodej.css">
        <link rel="stylesheet" href="style-about.css">
    </head> 
    <body>
 
        <?php
            include 'header.php';
        ?>

        <div>
            <center>
                <h2 ><img src="img/odejda.jpg" width="400px" height="400px"></h2>
            </center>
            <h1 align="center" style="color:rgba(26, 25, 25, 0.836)"><b>О нас</b></h1>
            <p style="font-size: 20px;"> 
                <?php echo $mission ?>
            </p>
            <h1 align="center" style="color:rgba(26, 25, 25, 0.836)"><b>Наша миссия</b></h1> 
            <p1 style="font-size: 20px;"> 
                Next гордится тем, что предлагает большой ассортимент трендовых нарядов для женщин и девушек. Next внимательно следит за тенденциями мира мода, чтобы модницы Next  шли в ногу с модой, грамотно обновляя свой гардероб. Что бы Вы не искали - платья бохо, графические принты, ажурные блузы или ультра-яркие купальники, Next  - станет идеальным универсальным магазином для современной и экономной модницы, предлагая широкий ассортимент качественной одежды по демократичным ценам.
                <h1 align="center" style="color:rgba(26, 25, 25, 0.836)"><b>Где нас найти</b></h1> 
                    <?php echo $where ?>
                <center>
                    <h2 ><img src="img/karta.jpg" width="1500px"></h2>
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
                <?php echo $address ?>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2000.3336307983495!2d30.381946516381834!3d59.91001018186574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631d28339339d%3A0x208e70b1adab8cb4!2z0JzQtdC70YzQvdC40YfQvdCw0Y8g0YPQuy4sIDIyLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywgMTkyMDE5!5e0!3m2!1sru!2sru!4v1650914904104!5m2!1sru!2sru" width="500" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <span class="clearfix"></span>
    
        <div class="ico-wrap"> <i class="fa fa-clock-o ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Время работы офиса и склада:</h4>
            <div class="aio-icon-description">
                <?php
                    echo $time;
                ?>
            </div>
        </div>

        <span class="clearfix"></span>
    
        <div class="ico-wrap">
            <i class="fa fa-envelope ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Электронная почта:</h4>
            <div class="aio-icon-description">
                <?php
                    echo $email;
                ?>
            </div>
        </div>
    
        <span class="clearfix"></span>
    
        <div class="ico-wrap">
            <i class="fa fa-phone ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Наши Телефоны:</h4>
            <div class="aio-icon-description">
                <?php
                    echo $phone;
                ?>
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
