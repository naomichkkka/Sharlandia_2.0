<?php
session_start();
require_once('pages/woman.php');
use woman;
echo woman\$query1;
$db_host = "127.127.126.50";
$db_user = "root";
$db_password = "111351";
$db_base = 'sharlandia';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if (isset($_GET['add_to_cart'])) {
    $product_name = $_GET['add_to_cart'];
    $product_price = $_GET['price'];
    if (isset($_SESSION['cart'][$product_name])) {
        $_SESSION['cart'][$product_name]['quantity']++;
    } else {
        $_SESSION['cart'][$product_name] = ['quantity' => 1, 'price' => $product_price];
    }
    header("Location: index.php");
    exit;
}
$query = "SELECT * FROM catalog_balloons";
$query2 = "SELECT * FROM catalog_balloons_mans";
$mysqli = mysqli_connect("127.127.126.50", "root", "111351", 'sharlandia');
$result = mysqli_query($mysqli, $query1);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (isset($row['id']) && isset($row['price'])) {
            echo   '<div class="card">
                        <a href="../index.php?add_to_cart=' . urlencode($row['id']) . '&price=' . urlencode($row['price']) . '"><img src="/assets/images/catalog_balloons/' . $row['picture'] . '" class="card-img" alt="Добавить в корзину"></a>
                        <div class="card-title">' . $row['id'] . '</div>
                        <div class="card-price">' . $row['price'] . ' руб.</div>
                    </div>';
        } else {
            echo 'Ошибка: ключ "NAME" или "PRICE" не найден в массиве данных.';
        }
    }
    mysqli_free_result($result);
} else {
    echo "Ошибка выполнения запроса: " . mysqli_error($mysqli);
}

mysqli_close($mysqli);
