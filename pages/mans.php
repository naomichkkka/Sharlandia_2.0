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
    $db_host = "127.127.126.50"; 
    $db_user = "root"; // Логин БД
    $db_password = "111351"; // Пароль БД
    $db_base = 'sharlandia'; // Имя БД
    $db_table = 'catalog_balloons_mans'; // Имя Таблицы БД
    $mysqli = mysqli_connect("127.127.126.50", "root", "111351", 'sharlandia');

    $query="SELECT * FROM catalog_balloons_mans";
    $result=mysqli_query($mysqli, $query);
    foreach ($result as $row) 
    {
        echo '<div class="photo-item">
                <img src="/assets/images/catalog_balloons_mans/'.$row['picture'].'" alt="Картинка">
                <p class="price">'.$row['price'].' руб.</p>
              </div>';
    }
    ?>
    </div>

</body>
</html>
