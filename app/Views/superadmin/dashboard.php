<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SuperAdmin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card p-4 shadow-sm">
        <h1 class="mb-3">Selamat datang, SuperAdmin!</h1>
        <p>Ini dashboard Anda.</p>
        
        <?php
        $password = '123';
        $hash = password_hash($password, PASSWORD_DEFAULT);
        ?>
        <p><strong>Password:</strong> <?= $password ?></p>
        <p><strong>Hash:</strong> <?= $hash ?></p>

        <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
    </div>
</div>
</body>
</html>
