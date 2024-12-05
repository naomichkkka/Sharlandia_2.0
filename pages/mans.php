<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мужчинам</title>
    <link rel="stylesheet" href="../styles/mans.css">
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
                <li><a href="#">О нас</a></li>
                <li><a href="#">Доставка и оплата</a></li>
                <li><a href="#">Частые вопросы</a></li>
                <li><a href="#">Отзывы</a></li>
                <li><a href="/pages/signup.html" class="login-btn">Войти</a></li>
            </ul>
        </nav>
    </header>

    <br><br>
    <h1>Мужчинам</h1>
    <br><br>

    <div class="photo-container">
        
    <?php
    include('../korzina.php');
    $db_table = 'catalog_balloons_mans'; // Имя Таблицы БД
    $mysqli = mysqli_connect("127.127.126.50", "root", "111351", 'sharlandia');

    $query="SELECT * FROM catalog_balloons_mans";
    $result=mysqli_query($mysqli, $query);
    ?>
    </div>

</body>
</html>
