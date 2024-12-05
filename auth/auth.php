<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_login.css">
    <title>Вход</title>
</head>
<body>
    <?php
if (isset($_POST['user']) && isset($_POST['password'])) {
    // Переменные с формы
    $user = $_POST['user'];
    $password = $_POST['password'];

  
    $db_host = "127.127.126.50"; 
    $db_user = "root"; // Логин БД
    $db_password = "111351"; // Пароль БД
    $db_base = 'sharlandia'; // Имя БД
    $db_table = 'users'; // Имя Таблицы БД
    $mysqli = mysqli_connect("127.127.126.50", "root", "111351", 'sharlandia');

    // Подключение к базе данных
    $con = new mysqli($db_host, $db_user, $db_password, $db_base);

    // Проверка соединения
    if ($con->connect_error) {
        die("Ошибка подключения: " . $con->connect_error);
    }

    // Устанавливаем корректную кодировку
    $con->set_charset("utf8");

    // Подготовка SQL-запроса для получения хеша пароля
    $query = $con->prepare("SELECT `password` FROM $db_table WHERE user = ?");
    $query->bind_param("s", $user);
    $query->execute();
    $query->bind_result($hashed_password_from_db);
    $query->fetch();
    $query->close();

    // Проверка пароля
    if ($hashed_password_from_db && password_verify($password, $hashed_password_from_db)) {
        // Пароль верный, перенаправляем пользователя
        header('Location: https://sharlandia.local/index.php'); 
        exit();
    } else {
        // Неверный пароль или пользователь не найден
        echo 'Неправильный логин или пароль';
    }

    // Закрываем соединение
    $con->close();
}
    ?>
</body>
</html>
