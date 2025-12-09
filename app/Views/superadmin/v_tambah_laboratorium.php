



<?= $this->extend('superadmin/v_dashboard') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Laboratorium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-4">Tambah Laboratorium</h3>

    <form action="<?= base_url('superadmin/simpanLaboratorium') ?>" method="post" id="formLab">

        <div class="mb-3">
            <label class="form-label">Nama Laboratorium</label>
            <input type="text" name="nama_lab" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Sewa</label>
            <input type="number" name="harga_sewa" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe Laboratorium</label>
                    <select name="tipe_id" class="form-select" required>
            <option value="">-- Pilih Tipe --</option>
            <?php foreach($tipeList as $tipe): ?>
                <option value="<?= $tipe['id'] ?>" 
                    <?= (isset($laboratorium['tipe_id']) && $laboratorium['tipe_id'] == $tipe['id']) ? 'selected' : '' ?>>
                    <?= esc($tipe['nama_tipe']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Admin Lab</label>

            <?php if (!empty($adminList)) : ?>
                <select name="admin_id" class="form-select">
                    <option value="">-- Pilih Admin Lab --</option>
                    <?php foreach ($adminList as $admin) : ?>
                        <option value="<?= $admin['id'] ?>">
                            <?= esc($admin['nama']) ?> | <?= esc($admin['nim']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php else : ?>
                <p class="text-danger">Tidak ada admin yang tersedia.</p>
            <?php endif; ?>

        </div>

        <!-- Tombol aksi -->
        <button type="submit" class="btn btn-success">Simpan</button>

        <a href="#" 
        class="btn btn-secondary load-page"
        data-url="<?= base_url('superadmin/laboratorium') ?>">
        Kembali
        </a>

    </form>

</div>

</body>
</html>
<?= $this->endSection() ?>