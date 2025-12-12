<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1; /* mendorong footer ke bawah */
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('admin') ?>">Admin Lab</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin') ?>">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/peminjaman') ?>">Peminjaman</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/jadwal') ?>">Jadwal</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/bahan') ?>">Bahan/Alat</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/riwayat') ?>">Riwayat</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/user') ?>">Kelola User</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/harga') ?>">Edit Harga</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/harga/riwayat') ?>">Riwayat Harga</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="<?= base_url('logout') ?>">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT WRAPPER (WAJIB AGAR FOOTER MENEMPEL BAWAH) -->
<div class="container mt-4 content-wrapper">
    <?= $this->renderSection('content') ?>
</div>

<!-- FOOTER (TANPA MARGIN SUPAYA MELEKAT BAWAH) -->
<footer class="bg-light text-center p-3">
    <small>© <?= date('Y') ?> Sistem Peminjaman Laboratorium</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
