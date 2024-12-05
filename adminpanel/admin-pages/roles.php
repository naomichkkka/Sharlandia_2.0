<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление ролями</title>
    <link rel="stylesheet" href="../../styles/admincss.css">
</head>

<body>

    <h2>Управление ролями</h2>
    <p><a style="text-decoration:none" href="../admin_panel.php">Вернуться назад</a></p>
    <?php

    $db_host = "127.127.126.50";
    $db_user = "root";
    $db_password = "111351";
    $db_base = 'sharlandia';
    $db_table = 'users';


    $con = new mysqli($db_host, $db_user, $db_password, $db_base);


    if ($con->connect_error) {
        die("Ошибка подключения: " . $con->connect_error);
    }


    $con->set_charset("utf8");


    if (isset($_POST['role_name'])) {
        $role_name = $_POST['role_name'];


        if (!empty($role_name)) {
            // новая роль в бд
            $insert_query = $con->prepare("INSERT INTO roles (role_name) VALUES (?)");
            $insert_query->bind_param("s", $role_name);

            if ($insert_query->execute()) {
                echo "<p style='text-align:center; color: green;'>Роль '$role_name' успешно добавлена.</p>";
            } else {
                echo "<p style='text-align:center; color: red;'>Ошибка добавления роли: " . $insert_query->error . "</p>";
            }

            $insert_query->close();
        } else {
            echo "<p style='text-align:center; color: red;'>Название роли не может быть пустым.</p>";
        }
    }

    // получение всех ролей
    $sql = "SELECT id, role_name FROM roles";
    $result = $con->query($sql);


    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Role Name</th></tr>";


        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['role_name']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>Нет созданных ролей.</p>";
    }


    $con->close();
    ?>


    <form method="POST">
        <input type="text" name="role_name" placeholder="Введите название роли" required>
        <input type="submit" value="Добавить роль">
    </form>

</body>

</html>