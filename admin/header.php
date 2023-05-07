<head>
    <style>

        *{
            font-family: 'Segoe UI';
        }
        .logo1 {
                position: center;
                margin: 65px 100 100 100px;
                z-index: 1000;
            }
            @-webkit-keyframes swing {
            20% {
                -webkit-transform: rotate3d(0, 0, 1, 15deg);
                transform: rotate3d(0, 0, 1, 15deg);
            }
                
            40% {
                -webkit-transform: rotate3d(0, 0, 1, -10deg);
                transform: rotate3d(0, 0, 1, -10deg);
            }
                
            60% {
                -webkit-transform: rotate3d(0, 0, 1, 5deg);
                transform: rotate3d(0, 0, 1, 5deg);
            }
                
            80% {
                -webkit-transform: rotate3d(0, 0, 1, -5deg);
                transform: rotate3d(0, 0, 1, -5deg);
            }
                
            100% {
                -webkit-transform: rotate3d(0, 0, 1, 0deg);
                transform: rotate3d(0, 0, 1, 0deg);
            }
            }
                
            @keyframes swing {
            20% {
                -webkit-transform: rotate3d(0, 0, 1, 15deg);
                -ms-transform: rotate3d(0, 0, 1, 15deg);
                transform: rotate3d(0, 0, 1, 15deg);
            }
                
            40% {
                -webkit-transform: rotate3d(0, 0, 1, -10deg);
                -ms-transform: rotate3d(0, 0, 1, -10deg);
                transform: rotate3d(0, 0, 1, -10deg);
            }
                
            60% {
                -webkit-transform: rotate3d(0, 0, 1, 5deg);
                -ms-transform: rotate3d(0, 0, 1, 5deg);
                transform: rotate3d(0, 0, 1, 5deg);
            }
                
            80% {
                -webkit-transform: rotate3d(0, 0, 1, -5deg);
                -ms-transform: rotate3d(0, 0, 1, -5deg);
                transform: rotate3d(0, 0, 1, -5deg);
            }
                
            100% {
                -webkit-transform: rotate3d(0, 0, 1, 0deg);
                -ms-transform: rotate3d(0, 0, 1, 0deg);
                transform: rotate3d(0, 0, 1, 0deg);
            }
            }
                
            .swing1:hover {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
                -webkit-transform-origin: top center;
                -ms-transform-origin: top center;
                transform-origin: top center;
                -webkit-animation-name: swing;
                animation-name: swing;
            }   
            
            header, nav{
                display: flex;
                flex-direction: row;
                background-color: hsla(36, 90%, 81%, 0.616); /*фон одежды*/
                justify-content: space-between;
                align-items: center;
                margin-left: 10%;
                margin-right: 15%;
            }

            nav a{
                text-decoration: none;
            }

            header{
                margin-top: 1%;
                border-radius: 10px;
            }

            .nav > ul > li {
                display:inline-block; /* переопределение в строчно-блочный */
            }
            .nav > ul > li.active a{
                background: #000000;
                color: #c20b0b;
            }
            .nav > ul > li > a {
                display: block;
                text-transform: uppercase;
                padding: 0.5em 1em;
                color: rgb(3, 3, 3);
                -webkit-transition: 0.9s; /* плавный переход */
                -moz-transition: 0.9s;
                -o-transition: 0.9s;
                transition: 0.9s;
            }
            .nav > ul > li > a:hover {
                color: rgba(0, 0, 0, 0.671);
                background: #ffffff;
            } 
    </style>
</head>
<header>
    <div id="header">
        <div class="logo1">
            <a href="../index.php">
                <img src="../img/logo.png" class="swing1" width="220px" height="120px">
            </a>
        </div>
    </div>
    <nav>
        <div class="nav">
            <ul>                 
                <li><a href="../cart.php">КОРЗИНА</a></li>
                <li><a href="lk.php">Личный кабинет</a></li>
                <li><a href="about.php">О КОМПАНИИ</a></li>
            </ul>   

        </div>
    </nav>
</header>     