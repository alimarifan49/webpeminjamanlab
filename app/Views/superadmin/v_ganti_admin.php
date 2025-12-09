<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>
<h2>Ganti Admin Laboratorium</h2>

<form action="<?= base_url('superadmin/gantiAdmin/' . $lab['id']) ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Nama Laboratorium</label>
        <input type="text" class="form-control" value="<?= esc($lab['nama_lab']) ?>" disabled>
    </div>

    <div class="mb-3">
        <label class="form-label">Pilih Admin Baru</label>
        <select name="admin_id" class="form-select" required>
            <option value="">-- Pilih Admin --</option>
            <?php foreach ($adminList as $admin): ?>
                <option value="<?= $admin['id'] ?>" <?= $lab['admin_id'] == $admin['id'] ? 'selected' : '' ?>>
                    <?= esc($admin['nama']) ?> | <?= esc($admin['nim']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('superadmin/laboratorium') ?>" class="btn btn-secondary">Batal</a>
</form>
<?= $this->endSection() ?>
