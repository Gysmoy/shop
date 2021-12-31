<?php
if (strpos($_SERVER['PHP_SELF'], 'assets') !== false) {
    header('location: ../../');
    die();
}
$idPage = $_GET['page'];
$id = uniqid();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/page-style.css?v=<?php echo $id; ?>">
    <style id="styles">
        :root {
            --mainColor: #000000;
            --contrast: #ffffff;
            --header-nameColor: #ffffff;
            --header-shadow: rgba(0, 0, 0, 1);
            --main-price-background: rgba(255, 255, 255, .150);
            --main-price-color: #fff;
        }
    </style>
</head>
<<<<<<< HEAD
<body page="<?php echo $idPage;?>">
<header>
    <div id="realtime">00:00:00</div>
    <img id="logo" src="assets/img/loading.gif" alt="">
    <h1 id="name"> </h1>
    <select id="container-select">
    </select>
</header>
<main data-background="">
    <h1 id="container-title"> </h1>
    <div id="container">
       
        
    </div>
</main>
<footer>
    <div class="socials">
        <ul>
            <li><a href="#" class="social fa fa-facebook"></a></li>
            <li><a href="#" class="social fa fa-whatsapp"></a></li>
            <li><a href="#" class="social fa fa-instagram"></a></li>
            <li><a href="#" class="social fa fa-snapchat-ghost"></a></li>
        </ul>
    </div>
    <div class="copyright">
        <ul>
            <li>Copyright © <a href="./">Mozo en línea</a></li>
            <li>Versión 3.0.1</li>
            <li>Diseñado por <a href="#">GK Business</a></li>
        </ul>
    </div>
</footer>
<script type="text/javascript" src="assets/js/fontawesome.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/moment.min.js"></script>
<script type="text/javascript" src="assets/js/getGeneralData.js?v=<?php echo $id;?>"></script>
<script type="text/javascript" src="assets/js/changeContainer.js?v=<?php echo $id;?>"></script>
=======

<body page="<?php echo $idPage; ?>">
    <header>
        <div id="realtime">00:00:00</div>
        <img id="logo" src="assets/img/loading.gif" alt="">
        <h1 id="name"> </h1>
        <select id="container-select">
        </select>
    </header>
    <main data-background="">
        <h1 id="container-title"> </h1>
        <div id="container">
            <table class="dish">
                <tr>
                    <td width="100%" height="100%"></td>
                    <td>
                        <i class="icon fa fa-cart-plus"></i>
                        <fieldset class="price">
                            <legend class="type">Menú</legend>
                            12.50
                        </fieldset>
                        <fieldset class="price">
                            <legend class="type">Carta</legend>
                            15.00
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p class="name">Chaufa con alitas fritas y limón</p>
                    </td>
                </tr>
            </table>
            <table class="dish">
                <tr>
                    <td width="100%" height="100%"></td>
                    <td>
                        <i class="icon fa fa-cart-plus"></i>
                        <fieldset class="price">
                            <legend class="type">Menú</legend>
                            12.50
                        </fieldset>
                        <fieldset class="price">
                            <legend class="type">Carta</legend>
                            15.00
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p class="name">Chaufa con alitas fritas y limón</p>
                    </td>
                </tr>
            </table>
            <table class="dish">
                <tr>
                    <td width="100%" height="100%"></td>
                    <td>
                        <i class="icon fa fa-cart-plus"></i>
                        <fieldset class="price">
                            <legend class="type">Menú</legend>
                            12.50
                        </fieldset>
                        <fieldset class="price">
                            <legend class="type">Carta</legend>
                            15.00
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p class="name">Chaufa con alitas fritas y limón y salchichas de extra</p>
                    </td>
                </tr>
            </table>
            <table class="dish">
                <tr>
                    <td width="100%" height="100%"></td>
                    <td>
                        <i class="icon fa fa-cart-plus"></i>
                        <fieldset class="price">
                            <legend class="type">Menú</legend>
                            12.50
                        </fieldset>
                        <fieldset class="price">
                            <legend class="type">Carta</legend>
                            15.00
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p class="name">Chaufa con alitas fritas y limón extra con doble papa</p>
                    </td>
                </tr>
            </table>

        </div>
    </main>
    <footer>
        <div class="socials">
            <ul>
                <li><a href="#" class="social fa fa-facebook"></a></li>
                <li><a href="#" class="social fa fa-whatsapp"></a></li>
                <li><a href="#" class="social fa fa-instagram"></a></li>
                <li><a href="#" class="social fa fa-snapchat-ghost"></a></li>
            </ul>
        </div>
        <div class="copyright">
            <ul>
                <li>Copyright © <a href="./">Mozo en línea</a></li>
                <li>Versión 3.0.1</li>
                <li>Diseñado por <a href="#">GK Business</a></li>
            </ul>
        </div>
    </footer>
    <script type="text/javascript" src="assets/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/getGeneralData.js?v=<?php echo $id; ?>"></script>
    <script type="text/javascript" src="assets/js/changeContainer.js?v=<?php echo $id; ?>"></script>
>>>>>>> c80f7242c61e62c95463e0bb4b7b20a5b15f4b18
</body>

</html>