<?php

session_start();
require_once 'connect.php';

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$adres = $_POST['adres'];
$login = $_POST['login'];
$birth = $_POST['birth'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$check_login = mysqli_query($connect, "SELECT * FROM `pacient` WHERE `Email` = '$login'");
if (mysqli_num_rows($check_login) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой логин уже существует",
        "fields" => ['login']
    ];

    echo json_encode($response);
    die();
}

$error_fields = [];

if ($password === '') {
    $error_fields[] = 'password';
}

if ($FirstName === '') {
    $error_fields[] = 'FirstName';
}

if ($LastName === '') {
    $error_fields[] = 'LastName';
}
if ($adres === '') {
    $error_fields[] = 'adres';
}
if ($birth === '') {
    $error_fields[] = 'birth';
}
if ($login === '' || !filter_var($login, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'login';
}

if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

if ($password === $password_confirm) {


    mysqli_query($connect, "INSERT INTO `pacient` (`id_pacienta`, `Surname`, `Name`, `DateBirth`, `Adres`, `Email`, `Password`) VALUES (NULL, '$LastName','$FirstName','$birth','$adres','$login','$password')");

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    echo json_encode($response);


} else {
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают",
    ];
    echo json_encode($response);
}

?>
