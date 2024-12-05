<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Девушкам</title>
    <link rel="stylesheet" href="../styles/woman.css">
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
    <h1>Девушкам</h1>
    <br><br>

    <div class="photo-container">
    
    <?php
    namespace woman;
    include('../korzina.php');
    $db_table = 'catalog_balloons'; // Имя Таблицы БД
    $query1="SELECT * FROM catalog_balloons";
    ?>
    </div>

</body>
</html>


<!-- foreach ($result as $row) 
    {
        echo '<div class="photo-item">
                <img src="/assets/images/catalog_balloons/'.$row['picture'].'" alt="Картинка">
                <p class="price">'.$row['price'].' руб.</p>
              </div>';
    }
     -->