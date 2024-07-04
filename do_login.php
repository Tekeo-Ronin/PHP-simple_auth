<?php

require_once __DIR__ . "/boot.php";

$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");
$stmt->execute(['username' => $_POST['username']]);

if (!$stmt->rowCount()) {
    flash('User with this name dont exist');
    header('Location: login.php');
    die;
}

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// перевіряємо пароль
if (password_verify($_POST['password'], $user['password'])) {
    // перевіряємо чи не треба використовувати новіший алгоритм
    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = pdo()->prepare('UPDATE `users` SET `password` = :password WHERE `username` = :username');
        $stmt->execute([
            'username' => $_POST['username'],
            'password' => $newHash,
        ]);
    }
    $_SESSION['user_id'] = $user['id'];
    header('Location: /');
    die;
}

flash('Password is wrong');
header('Location: login.php');