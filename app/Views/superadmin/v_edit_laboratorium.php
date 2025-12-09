<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Edit Laboratorium</h2>

<form action="<?= base_url('superadmin/updateLaboratorium/' . $laboratorium['id']) ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Nama Laboratorium</label>
        <input type="text" name="nama_lab" class="form-control" value="<?= esc($laboratorium['nama_lab']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="<?= esc($laboratorium['lokasi']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Harga Sewa</label>
        <input type="number" name="harga_sewa" class="form-control" value="<?= esc($laboratorium['harga_sewa']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tipe Laboratorium</label>
        <select name="tipe" class="form-select" required>
            <option value="kimia" <?= $laboratorium['tipe'] == 'kimia' ? 'selected' : '' ?>>Kimia</option>
            <option value="biologi" <?= $laboratorium['tipe'] == 'biologi' ? 'selected' : '' ?>>Biologi</option>
            <option value="komputer" <?= $laboratorium['tipe'] == 'komputer' ? 'selected' : '' ?>>Komputer</option>
            <option value="fisika" <?= $laboratorium['tipe'] == 'fisika' ? 'selected' : '' ?>>Fisika</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Admin Lab</label>
        <select name="admin_id" class="form-select" required>
            <?php foreach($adminList as $admin): ?>
                <option value="<?= $admin['id'] ?>" <?= $laboratorium['admin_id'] == $admin['id'] ? 'selected' : '' ?>>
                    <?= esc($admin['nama'].' | '.$admin['nim']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="<?= base_url('superadmin/laboratorium') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
