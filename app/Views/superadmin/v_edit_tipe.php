<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>

<h3>Edit Tipe Laboratorium</h3>

<form action="<?= base_url('superadmin/updateTipe/' . $tipe['id']) ?>" method="post">
    <div class="mb-3">
        <label>Nama Tipe</label>
        <input type="text" name="nama_tipe" class="form-control"
               value="<?= esc($tipe['nama_tipe']) ?>" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="<?= base_url('superadmin/tipeLab') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
