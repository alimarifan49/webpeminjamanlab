<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>

<h2>Daftar Tipe Laboratorium</h2>

<form action="<?= base_url('superadmin/tipeLaboratorium/simpan') ?>" method="post">
    <input type="text" name="nama_tipe" placeholder="Nama Tipe" required>
    <button type="submit">Tambah</button>
</form>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Tipe</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($tipeLabs as $tipe): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= esc($tipe['nama_tipe']) ?></td>
            <td>
                <a href="<?= base_url('superadmin/tipeLaboratorium/update/'.$tipe['id']) ?>">Edit</a>
                <a href="<?= base_url('superadmin/tipeLaboratorium/hapus/'.$tipe['id']) ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
