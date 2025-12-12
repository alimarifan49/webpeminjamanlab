<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Tambah Admin Laboratorium</h2>

<div class="card">
    <div class="card-header">
        <strong>Form Tambah Admin</strong>
    </div>
    <div class="card-body">

        <form action="<?= base_url('superadmin/tambahAdmin') ?>" method="post">

            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>

            <div class="mb-3">
                <label>Semester</label>
                <input type="text" name="semester" class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('superadmin/adminlab') ?>" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>

<?= $this->endSection() ?>
