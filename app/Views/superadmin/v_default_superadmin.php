
<?= $this->extend('superadmin/v_dashboard') ?>

<?= $this->section('content') ?>
<div class="card p-4 shadow-sm">
    <h2>Selamat datang, SuperAdmin!</h2>
    <p>Pilih menu di bawah untuk mengelola laboratorium, admin lab, dan melihat riwayat peminjaman.</p>

    <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">

        <div class="col d-flex">
            <div class="card text-center p-3 h-100 w-100">
                <h5>Laboratorium</h5>
                <p>Lihat semua laboratorium yang tersedia</p>
                <a href="<?= base_url('superadmin/laboratorium') ?>" 
                   class="btn btn-primary btn-sm mt-auto">
                    Lihat Laboratorium
                </a>
            </div>
        </div>

        <div class="col d-flex">
            <div class="card text-center p-3 h-100 w-100">
                <h5>Admin Lab</h5>
                <p>Kelola akun admin laboratorium</p>
                <a href="<?= base_url('superadmin/adminlab') ?>" 
                   class="btn btn-primary btn-sm mt-auto">
                    Lihat Admin
                </a>
            </div>
        </div>

        <div class="col d-flex">
            <div class="card text-center p-3 h-100 w-100">
                <h5>Tambah Admin</h5>
                <p>Tambahkan akun admin baru</p>
                <a href="<?= base_url('superadmin/tambahAdmin') ?>" 
                   class="btn btn-success btn-sm mt-auto">
                    Tambah Admin
                </a>
            </div>
        </div>

        <div class="col d-flex">
            <div class="card text-center p-3 h-100 w-100">
                <h5>Riwayat</h5>
                <p>Lihat semua peminjaman dan total pemasukan</p>
                <a href="<?= base_url('superadmin/riwayat') ?>" 
                   class="btn btn-warning btn-sm mt-auto">
                    Lihat Riwayat
                </a>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>