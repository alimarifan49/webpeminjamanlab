<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Daftar Admin Laboratorium</h2>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!-- Filter & Search -->
<!-- Search saja (hilangkan dropdown filter) -->
<form method="get" class="mb-3 d-flex gap-2">
    <input type="text" name="search" value="<?= esc($search ?? '') ?>"
           class="form-control" placeholder="Cari di semua field (nim, nama, email, alamat, semester)">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?= base_url('superadmin/adminlab') ?>" class="btn btn-secondary">Reset</a>
</form>


        <strong>Daftar Admin</strong>

        <!-- Tombol Tambah Admin -->
        <a href="<?= base_url('superadmin/tambahAdmin') ?>" class="btn btn-primary btn-sm">
            + Tambah Admin
        </a>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Semester</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($admins)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($admins as $admin) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($admin['nim']) ?></td>
                            <td><?= esc($admin['nama']) ?></td>
                            <td><?= esc($admin['email']) ?></td>
                            <td><?= esc($admin['alamat']) ?></td>
                            <td><?= esc($admin['semester']) ?></td>
                            <td>
                                <a href="<?= base_url('superadmin/editadmin/' . $admin['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('superadmin/deleteadmin/' . $admin['id']) ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus admin ini?');">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data admin.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
     <div class="mt-3">
    <?= $pager->links() ?>
    </div>



    </div>
</div>

<?= $this->endSection() ?>
