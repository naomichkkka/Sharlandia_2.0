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
        if (isset($_POST['user']) && isset($_POST['password'])){
            // Переменные с формы
            $user = $_POST['user'];
            $password = $_POST['password'];
            $pass = password_hash($password,PASSWORD_BCRYPT);
          
            if (password_verify($pasword, $pass)) { 
                // Password is correct! // Log the user in here. 
                } 
                else { // Invalid password 
                }
           
            $db_host = "127.127.126.50"; 
            $db_user = "root"; // Логин БД
            $db_password = "111351"; // Пароль БД
            $db_base = 'sharlandia'; // Имя БД
            $db_table = 'users'; // Имя Таблицы БД
            $mysqli = mysqli_connect("127.127.126.50", "root", "111351", 'sharlandia');
        
          
            try {
                // Подключение к базе данных
                $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
                // Устанавливаем корректную кодировку
                $db->exec("set names utf8");
                // Собираем данные для запроса
                $data = array( 'user' => $user, 'password' => $pass ); 
                // Подготавливаем SQL-запрос
                $query = $db->prepare("INSERT INTO $db_table (user, password) values (:user, :password)");
                // Выполняем запрос с данными
                $query->execute($data);
                if ($query == true) {
                    echo '<p class="success-message">Успешно!</p>';
                }                
            } catch (PDOException $e) {
                // Если есть ошибка соединения или выполнения запроса, выводим её
                print "Ошибка, некорректный пароль или логин!: " . $e->getMessage() . "<br/>";
            }
          }
    ?>
</body>
</html>