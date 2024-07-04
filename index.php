<?php
require_once __DIR__ . '/boot.php';

$user = null;

if (check_auth()) {
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container ">
        <?php if ($user) { ?>
            <h1>Welcome back, <?= htmlspecialchars($user['username']) ?>!</h1>

            <form action="do_logout.php" method="post" class="mt-5">
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>

        <?php } else { ?>
            <div class="row">
                <h1 class="mb-5">Registration</h1>
            </div>
            <?php flash() ?>
            <div class="row">
                <form action="do_register.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a class="btn btn-outline-primary" href="login.php">Login</a>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</body>

</html>