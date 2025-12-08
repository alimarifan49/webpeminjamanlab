<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SuperAdmin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SuperAdmin Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('superadmin/laboratorium') ?>">Daftar Laboratorium</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('superadmin/adminlab') ?>">Daftar Admin Lab</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('superadmin/tambahAdmin') ?>">Tambah Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('superadmin/riwayat') ?>">Riwayat Peminjaman</a></li>
            </ul>
            <span class="navbar-text me-3">
                Selamat datang, <?= esc($nama) ?>!
            </span>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card p-4 shadow-sm">
        <h2>Selamat datang, SuperAdmin!</h2>
        <p>Pilih menu di bawah untuk mengelola laboratorium, admin lab, dan melihat riwayat peminjaman.</p>

        <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
            <div class="col d-flex">
                <div class="card text-center p-3 h-100 w-100">
                    <h5>Laboratorium</h5>
                    <p>Lihat semua laboratorium yang tersedia</p>
                    <a href="<?= base_url('superadmin/laboratorium') ?>" class="btn btn-primary btn-sm mt-auto">Lihat Laboratorium</a>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card text-center p-3 h-100 w-100">
                    <h5>Admin Lab</h5>
                    <p>Kelola akun admin laboratorium</p>
                    <a href="<?= base_url('superadmin/adminlab') ?>" class="btn btn-primary btn-sm mt-auto">Lihat Admin</a>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card text-center p-3 h-100 w-100">
                    <h5>Tambah Admin</h5>
                    <p>Tambahkan akun admin baru</p>
                    <a href="<?= base_url('superadmin/tambahAdmin') ?>" class="btn btn-success btn-sm mt-auto">Tambah Admin</a>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card text-center p-3 h-100 w-100">
                    <h5>Riwayat</h5>
                    <p>Lihat semua peminjaman dan total pemasukan</p>
                    <a href="<?= base_url('superadmin/riwayat') ?>" class="btn btn-warning btn-sm mt-auto">Lihat Riwayat</a>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>
</div>

</body>
</html>
