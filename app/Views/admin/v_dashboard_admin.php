<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .dashboard-card {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h1 {
            font-weight: 600;
        }
        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="dashboard-card text-center">
    <h1>Selamat datang, <?= esc($nama) ?>!</h1>
    <p>Ini dashboard Admin.</p>

    <a href="<?= base_url('logout') ?>" class="btn btn-danger logout-btn">Logout</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
