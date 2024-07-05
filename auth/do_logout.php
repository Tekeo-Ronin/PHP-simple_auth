<?php

require_once __DIR__ . '../config/boot.php';

$_SESSION['user_id'] = null;
header('Location: /');