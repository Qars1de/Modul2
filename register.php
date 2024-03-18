<?php
    session_start();
    if (isset($_SESSION['users'])) {
        header('Location: profile.php');
        exit;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<?php include 'header.php'; ?>

    <form>
        <label>Имя</label>
        <input type="text" name="FirstName" placeholder="Введите имя">
        <label>Фамилия</label>
        <input type = "text" name="LastName" placeholder = "Введите фамилию">
        <label>Дата рождения</label>
        <input type = "date" name="birth" placeholder = "Введите дату рождения">
        <label>Адрес</label>
        <input type = "text" name="adres" placeholder = "Введите адрес">
        <label>Почта</label>
        <input type="email" name="login" placeholder="Введите адрес своей почты">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="avt.php">авторизируйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum.</p>
    </form>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>