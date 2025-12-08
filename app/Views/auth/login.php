<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – Peminjaman Lab</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: #f3f4f6;
        }
        .login-card {
            max-width: 420px;
            margin: 5% auto;
            padding: 30px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .title {
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="text-center mb-4 title">Login Peminjaman Lab</h3>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">NIM / Email</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM atau Email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>

        <div class="text-center mt-3">
            <a href="<?= base_url('forgot-password') ?>" class="text-decoration-none">
                Lupa sandi?
            </a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
