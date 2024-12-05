<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ШарЛандия</title>
    <link rel="stylesheet" href="/styles/delivery.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../index.php">
            <img src="/assets/images/logo.png" alt="Логотип Шары Ландия">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="about_us.php">О нас</a></li>
                <li><a href="delivery.php">Доставка и оплата</a></li>
                <li><a href="#">Частые вопросы</a></li>
                <li><a href="#">Отзывы</a></li>
                <li><a href="/pages/signup.html" class="login-btn">Войти</a></li>
            </ul>
        </nav>
    </header>

    <?php
    $db_host = "127.127.126.50"; 
    $db_user = "root"; 
    $db_password = "111351"; 
    $db_base = 'sharlandia'; 
    $db_table = 'pictures'; 
    $mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_base);

    if ($mysqli) {
        $query = "SELECT * FROM pictures";
        $result = mysqli_query($mysqli, $query);
        foreach ($result as $row) {
            echo '<div class="banner">
                <img src="/assets/images/'.$row['picture'].'" class="banner1img" alt="Изображение">
            </div>';
        }
    } else {
        echo "Ошибка подключения к базе данных";
    }
    ?>

    <div class="title-text">
    <p>Оформление заказа:</p>
    </div>
    <div class="main-text">
        <p class ="text1">Заказ можно оставить на сайте, позвонить по телефону (ежедневно с 8:00 до 23:00) или написать сообщение в мессенджерах. 
            После поступления заказа, мы обязательно с вами свяжемся и все согласуем. Заказ считается принятым только после согласования. 
            Предварительные заказы выполняются в сроки и дату, которые указал заказчик.</p>
    </div>

    <div class="title-text">
    <p>Самовывоз:</p>
    </div>
    <div class="main-text">
        <p class ="text1">Самовывоз осуществляется в любое заранее согласованное время. 
            Вы можете забрать шарики самостоятельно с ул. Шумакова, 14. 
            Обязательно предварительно оформите заказ по телефону или на сайте и дождитесь подтверждения.</p>
    </div>

    <div class="title-text">
    <p>Стоимость доставки:</p>
    </div>
    <div class="main-text">
        <p class ="text1">Доставка осуществляется в любое заранее согласованное время. 
            Точную стоимость доставки можно уточнить у менеджера, назвав конкретный адрес и время доставки.
            Доставка заказов осуществляется к указанному вами времени, с интервалом +- 15 минут. 
            Мы всегда стараемся быть очень пунктуальными и доставить ваш заказ вовремя.</p>
    </div>

    <div class="title-text">
    <p>Оплата:</p>
    </div>
    <div class="main-text">
        <p class ="text1">Перевести предоплату можно на карту Сбербанка.
            Вторую часть оплаты после получения шаров можно перевести на карту или отдать наличными курьеру при получении.</p>
    </div>

    <div class="divider"></div>

    <footer>
    <div class="footer-container">
        <div class="footer-links">
            <h3>Навигация</h3>
            <ul>
                <li><a href="/index.php">Главная</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Услуги</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>
        <div class="footer-contact">
            <h3>Контакты</h3>
            <p>Email: sharik22@mail.ru</p>
            <p>Телефон: +7 (962) 814-2428</p>
        </div>
        <div class="footer-social">
            <h3>Социальные сети</h3>
            <ul>
                <li><a href="#">Telegram</a></li>
                <li><a href="#">VK</a></li>
                <li><a href="#">Instagram*</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2013-2024 ©Шар-Ландия. Все права защищены.</p>
    </div>
</footer>
</body>
</html>
