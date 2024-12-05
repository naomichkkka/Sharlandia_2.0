<?php
session_start();

if (isset($_POST['user']) && isset($_POST['password'])) {

    $user = $_POST['user'];
    $pasword = $_POST['password'];

    $db_host = "127.127.126.50"; 
            $db_user = "root"; // Логин БД
            $db_password = "111351"; // Пароль БД
            $db_base = 'sharlandia'; // Имя БД
            $db_table = 'users'; // Имя Таблицы БД
            $con = mysqli_connect("127.127.126.50", "root", "111351", 'sharlandia');


    if ($con->connect_error) {
        die("Ошибка подключения: " . $con->connect_error);
    }


    $con->set_charset("utf8");

    $query = $con->prepare("SELECT `password`, role_id FROM $db_table WHERE user = ?");
    $query->bind_param("s", $user);
    $query->execute();
    $query->bind_result($hashed_password_from_db, $role_id);
    $query->fetch();
    $query->close();


    if ($hashed_password_from_db && password_verify($pasword, $hashed_password_from_db)) {

        $_SESSION['username'] = $user;
        $_SESSION['role_id'] = $role_id;

        header('Location: https://sharlandia.local/index.php');
        echo "sasafw";
        exit();
    } else {

        echo 'Неправильный логин или пароль';
    }


    $con->close();
}
?>
</body>
</html>