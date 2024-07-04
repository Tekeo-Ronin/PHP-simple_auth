<?php

// ініціалізуємо сесію
session_start();

function pdo() : PDO
{
  static $pdo;

  if(!$pdo) {
    $config = include __DIR__.'/config.php';

    // підключаємо бд
    $dsn = 'mysql:dbname='.$config['db_name'].':host='.$config['db_host'];
    $pdo = new PDO ($dsn, $config['db_user'], $config['db_pass']);
    $pdo = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  return $pdo;
}

