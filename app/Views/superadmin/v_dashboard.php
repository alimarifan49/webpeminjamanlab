<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SuperAdmin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="<?= base_url('superadmin') ?>">SuperAdmin</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <!-- MENU TANPA AJAX -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('superadmin') ?>">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('superadmin/laboratorium') ?>">Laboratorium</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('superadmin/adminlab') ?>">Admin Lab</a>
                </li>

              
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('superadmin/riwayat') ?>">Riwayat</a>
                </li>

            </ul>

            <div class="d-flex">
                <span class="text-white me-3">Role: SuperAdmin</span>
                <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm">Logout</a>
            </div>

        </div>
    </div>
</nav>

<!-- AREA KONTEN -->
<div class="container mt-5">
    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
