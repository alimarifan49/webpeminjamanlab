<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>

<h3>Daftar Tipe Laboratorium</h3>

<a href="<?= base_url('superadmin/laboratorium') ?>" class="btn btn-secondary mb-3">Kembali</a>
<a href="<?= base_url('superadmin/tambahTipe') ?>" class="btn btn-primary mb-3">Tambah Tipe</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nama Tipe</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($tipe as $t): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= esc($t['nama_tipe']) ?></td>
            <td>
                <a href="<?= base_url('superadmin/editTipe/' . $t['id']) ?>" class="btn btn-sm btn-info">
                    Edit
                </a>
                <a href="<?= base_url('superadmin/hapusTipe/' . $t['id']) ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Hapus tipe ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>
