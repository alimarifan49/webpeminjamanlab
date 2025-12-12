<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('content') ?>

<h2>Peminjaman Laboratorium</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Lab ID</th>
            <th>Tanggal</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Status</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($peminjaman)): ?>
            <?php foreach ($peminjaman as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['user_id'] ?></td>
                    <td><?= $p['lab_id'] ?></td>
                    <td><?= $p['tanggal_peminjaman'] ?></td>
                    <td><?= $p['jam_mulai'] ?></td>
                    <td><?= $p['jam_selesai'] ?></td>
                    <td><?= $p['status'] ?></td>
                    <td><?= $p['total_harga_lab'] ?></td>
                    <td>
                        <?php if($p['status'] === 'pending'): ?>
                            <a href="<?= base_url('admin/peminjaman/setuju/'.$p['id']) ?>" class="btn btn-success btn-sm">Setuju</a>
                            <a href="<?= base_url('admin/peminjaman/tolak/'.$p['id']) ?>" class="btn btn-danger btn-sm">Tolak</a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">Belum ada peminjaman</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
