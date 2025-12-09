<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>
<h2 class="mb-4">Daftar Laboratorium</h2>

<a href="<?= base_url('superadmin') ?>" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
<a class="btn btn-primary mb-3" href="<?= base_url('superadmin/tambahLaboratorium') ?>">Tambah Laboratorium</a>
<a href="<?= base_url('superadmin/exportExcel') ?>" class="btn btn-success mb-3">Export Excel</a>
<a href="<?= base_url('superadmin/exportPDF') ?>" class="btn btn-danger mb-3">Export PDF</a>




<?php if (!empty($laboratorium) && is_array($laboratorium)) : ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Laboratorium</th>
                    <th>Lokasi</th>
                    <th>Harga Sewa</th>
                    <th>Tipe</th>
                    <th>Admin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($laboratorium as $lab) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= esc($lab['nama_lab']) ?></td>
                        <td><?= esc($lab['lokasi']) ?></td>
                        <td>Rp <?= number_format($lab['harga_sewa'], 0, ',', '.') ?></td>
                        <td><?= esc($lab['tipe']) ?></td>
                        <td><?= esc($lab['admin_nama']) ?> | <?= esc($lab['admin_nim']) ?></td>
                        <td>
                            <!-- Tombol Edit Laboratorium + Admin -->
                            <a href="<?= base_url('superadmin/editLaboratorium/' . $lab['id']) ?>" 
                               class="btn btn-sm btn-info mb-1">Edit</a>

                            <!-- Tombol Ganti Admin -->
                            <a href="<?= base_url('superadmin/gantiAdmin/' . $lab['id']) ?>" 
                               class="btn btn-sm btn-warning mb-1">Ganti Admin</a>

                            <!-- Tombol Hapus -->
                            <a href="<?= base_url('superadmin/hapusLaboratorium/' . $lab['id']) ?>" 
                               class="btn btn-sm btn-danger mb-1"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus laboratorium ini?');">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <p class="text-muted">Belum ada laboratorium yang terdaftar.</p>
<?php endif; ?>
<?= $this->endSection() ?>
