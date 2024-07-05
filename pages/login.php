<?php
require_once __DIR__ . "../config/boot.php";

if (check_auth()) {
    header('Location: /');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-auth</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <h1 class="mb-5">Login</h1>
        </div>
        <?php flash() ?>
        <div class="row">
            <form method="post" action="../auth/do_login.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" id="password" name="password" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="../index.php" class="btn btn-outline-primary">Register</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>