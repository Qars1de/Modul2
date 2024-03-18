<?php
session_start();
if (!$_SESSION['users']) {
    header('Location: avt.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href = "css/profile.css">
</head>
<body>


<?php include 'header.php'; ?>



    <main>
    <section>
        <div class = "profile_grid">
            <div>
            <p style="margin: 10px 0; font-size: 18px;">Фамилия: <?= $_SESSION['users']['full_name'] ?></p>
            <p style="margin: 10px 0; font-size: 18px;">Имя: <?= $_SESSION['users']['FirstName'] ?></p>
            <p style = "margin: 10px 0; font-size: 18px;">Логин: <a class = "mail" href="#"> <?= $_SESSION['users']['login'] ?></p>
                <button class = "button">
                    <a class = "text" href="vendor/logout.php">Выход</a>
                </button>
            </div>
        </div>
    </section>
    </main>
</body>
</html>