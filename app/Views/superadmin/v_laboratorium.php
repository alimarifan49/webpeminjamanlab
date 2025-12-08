<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laboratorium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Daftar Laboratorium</h2>

    <a href="<?= base_url('superadmin') ?>" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

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
                            <td><?= esc($lab['admin_id'] ?? '-') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p class="text-muted">Belum ada laboratorium yang terdaftar.</p>
    <?php endif; ?>
</div>

</body>
</html>
