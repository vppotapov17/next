<head>
    <style>
        footer{
            
            width: 100%;/*на всю ширину*/
            padding: 20px 50px;/*поля для контента*/
            background: #1c1c1dce;/*цвет футера*/
            display: flex;
            justify-content: center;/*в центре по горизонтали*/
            align-items: center;/*в центре по вертикали*/
            flex-direction: column;
            margin-top: 100px;/*отступ сверху*/
        }
        footer .wave{
        position: absolute;/*абсолютное позиционирование*/
            top: -120px;
            left: 0;
            width: 100%;
            height: 100px;
            background: url(wave.png);/*картинка волны*/
            background-size: 1000px 100px;/*ширина и высота волны*/
        }
        .social,
        .menu{
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
            flex-wrap: wrap;/*разрешен перенос на новую строку*/
        }
        .social li,
        .menu li{
            list-style: none;/*удалить черные маркеры*/
        }
        .social li a {
            font-size: 2em;/*размер иконок*/
            color: rgb(255, 255, 255);/*цвет иконок*/
            margin: 0 10px;
            display: inline-block;/*отображать как строчно-блочный элемент*/
            transition: 0.5s;/*плавный переход*/
        }
        .menu li a {
            font-size: 1.0em;/*размер ссылок меню*/
            color: #fff;/*цвет ссылок меню*/
            opacity: 0.75;/*значение прозрачности*/
            margin: 0 15px;
            text-decoration: none;/*ссылка без подчеркивания*/
            display: inline-block;
        }
        .menu li a:hover {
            opacity: 1;
        }
        footer p {
            color: #fff;
            text-align: center;
            margin-top: 15px;
            font-size: 1.0em;
        }    

        * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        }


        ul {
        list-style: none;
        }

        .topmenu {
        background: white;
        }

        .topmenu a {
        text-decoration: none;
        display: block;
        transition: .4s ease-in-out;
        }

        .topmenu>li>a {
        padding: 20px;
        color: #767676;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
        font-family: 'Exo 2', sans-serif;
        }

        .topmenu li a:hover {
        color: #c0a97a;
        }

        .submenu li a {
        border-bottom: 1px solid #efefef;
        font-size: 12px;
        color: #484848;
        font-family: 'Kurale', serif;
        }

        @media(max-width: 599px) {
        .topmenu>li>a {
            padding: 15px 20px;
        }
        .submenu li a {
            padding: 10px 20px;
            margin: 0 20px;
        }
        }

        @media(min-width: 600px) {
        .topmenu {
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .topmenu>li {
            position: relative;
        }
        .topmenu>li:after {
            content: "";
            position: absolute;
            right: 0;
            width: 1px;
            height: 12px;
            background: #d2d2d2;
            top: 24px;
            box-shadow: 4px -2px 0 #d2d2d2;
            transform: rotate(30deg);
        }
        .topmenu>li:last-child:after {
            background: none;
            box-shadow: none;
        }
        .submenu {
            position: absolute;
            left: 50%;
            top: 100%;
            width: 210px;
            margin-left: -105px;
            background: #fafafa;
            border: 1px solid #ededed;
            z-index: 5;
            visibility: hidden;
            opacity: 0;
            transform: scale(.8);
            transition: .4s ease-in-out;
        }
        .topmenu>li:hover .submenu {
            visibility: visible;
            opacity: 1;
            transform: scale(1);
        }
        .submenu li a {
            text-align: center;
            padding: 10px 0;
            margin: 0 10px;
        }
        }
    </style>
</head>
<footer>
    <div class="waves">
        <div class="wave" id="wave1"></div>
    </div>
    <ul class="social">
        <li><a href="#"><ion-icon name="logo-VK"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-YouTube"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
    
    </ul>
    <ul class="menu">
        <li><a href="gl str.html">Home</a></li>
        <li><a href="onas.html">About</a></li>
        <li><a href="magazin.html">Shop</a></li>
        <li><a href="onas.html">Contact</a></li>
    </ul>
    <p>©2022 NEXT | All Rights Reserved</p>
</footer>