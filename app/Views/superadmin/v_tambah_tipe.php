<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>

<h3>Tambah Tipe Laboratorium</h3>

<form action="<?= base_url('superadmin/simpanTipe') ?>" method="post">
    <div class="mb-3">
        <label>Nama Tipe Laboratorium</label>
        <input type="text" name="nama_tipe" class="form-control" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="<?= base_url('superadmin/tipeLab') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
