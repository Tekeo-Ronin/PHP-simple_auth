<?php

require_once __DIR__ . "/boot.php";

// перевірка на існування користувача

$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");
$stmt->execute(['username' => $_POST['username']]);
if ($stmt->rowCount() > 0) {
    flash('User is exist');
    header('Location: /'); // вертаємось на форму реєстрації
    die; // зупинка скрипта
}

$stmt = pdo()->prepare('INSERT INTO `users` (`username`, `password`) VALUES (:username, :password)');
$stmt->execute([
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
]);

header('Location: login.php');
