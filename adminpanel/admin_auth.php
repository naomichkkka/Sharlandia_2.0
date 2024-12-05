<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аутенфикация</title>
</head>
<body>

<?php
session_start(); 

if (isset($_POST['user']) && isset($_POST['pasword'])) {
 
    $user = $_POST['user'];
    $pasword = $_POST['pasword'];


    $db_host = "127.127.126.50"; 
    $db_user = "root"; 
    $db_password = "111351"; 
    $db_base = 'sharlandia'; 
    $db_table = 'users'; 

    $mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_base);

 
    if ($mysqli->connect_error) {
        die("Ошибка подключения: " . $mysqli->connect_error);
    }

 
    $mysqli->set_charset("utf8");

    
    $query = $mysqli->prepare("SELECT `password`, role_id FROM $db_table WHERE user = ?");
    $query->bind_param("s", $user);
    $query->execute();
    $query->bind_result($hashed_password_from_db, $role_id);
    $query->fetch();
    $query->close();

  
    if ($hashed_password_from_db && password_verify($pasword, $hashed_password_from_db)) {
      
        if ($role_id == 2) { 
            echo "Добро пожаловать, администратор!";
            header('Location: https://sharlandia.local/adminpanel/admin_panel.php');
        }

        $_SESSION['user'] = $user;
        $_SESSION['role_id'] = $role_id;

        
        exit();
    } else {
   
        echo 'Неправильный логин или пароль';
    }

    $mysqli->close();
}
?>
</body>
</html>