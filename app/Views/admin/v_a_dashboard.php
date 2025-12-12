<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('content') ?>

<div class="text-center">
    <h2>Selamat datang, <?= esc($nama) ?>!</h2>
    <p>Anda sedang berada di Dashboard Admin Laboratorium.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Peminjaman Pending</h5>
                <p>0 data</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Jadwal Hari Ini</h5>
                <p>-</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Peminjaman Bulan Ini</h5>
                <p>0 data</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
