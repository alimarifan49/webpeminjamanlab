<?= $this->extend('superadmin/v_dashboard') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Daftar Laboratorium</h2>

<div class="mb-3">
    <a href="<?= base_url('superadmin') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
    <a href="<?= base_url('superadmin/tambahLaboratorium') ?>" class="btn btn-primary">Tambah Laboratorium</a>
    <a href="<?= base_url('superadmin/tipeLab') ?>" class="btn btn-info">Kelola Tipe Lab</a>

    <a href="<?= base_url('superadmin/exportExcel') ?>" class="btn btn-success">Export Excel</a>
    <a href="<?= base_url('superadmin/exportPDF') ?>" class="btn btn-danger">Export PDF</a>
</div>

<?php if (!empty($laboratorium) && is_array($laboratorium)) : ?>
    <div class="table-responsive">
        <input type="text" id="tableSearch" 
       class="form-control mb-3" 
       placeholder="Cari laboratorium...">
<form method="get" class="mb-3 d-flex align-items-center" style="gap:10px;">
    <label><strong>Tampilkan:</strong></label>

    <select name="perPage" onchange="this.form.submit()" class="form-select" style="width:150px;">
        <option value="10" <?= ($perPage == 10 ? 'selected' : '') ?>>10</option>
        <option value="20" <?= ($perPage == 20 ? 'selected' : '') ?>>20</option>
        <option value="30" <?= ($perPage == 30 ? 'selected' : '') ?>>30</option>
        <option value="all" <?= ($perPage == 'all' ? 'selected' : '') ?>>Semua</option>
    </select>
</form>

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
                        <td><?= esc($lab['nama_tipe']) ?></td> <!-- gunakan nama_tipe, bukan tipe_id -->
                        <td><?= esc($lab['admin_nama']) ?> | <?= esc($lab['admin_nim']) ?></td>
                        <td>
                            <a href="<?= base_url('superadmin/editLaboratorium/' . $lab['id']) ?>" 
                               class="btn btn-sm btn-info mb-1">Edit</a>
                            <a href="<?= base_url('superadmin/gantiAdmin/' . $lab['id']) ?>" 
                               class="btn btn-sm btn-warning mb-1">Ganti Admin</a>
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
        <?php if ($pager): ?>
    <div class="mt-3">
        <?= $pager->links() ?>
    </div>
<?php endif; ?>

    </div>
<?php else : ?>
    <p class="text-muted">Belum ada laboratorium yang terdaftar.</p>
<?php endif; ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const table = document.querySelector(".table");
    const headers = table.querySelectorAll("th");
    const tbody = table.querySelector("tbody");
    const searchInput = document.getElementById("tableSearch");
    let sortDirections = {};

    function updateRowNumbers() {
        let counter = 1;
        Array.from(tbody.querySelectorAll("tr")).forEach(row => {
            if (row.style.display !== "none") {
                row.children[0].innerText = counter++;
            } else {
                row.children[0].innerText = "";
            }
        });
    }

    function buildRowsData() {
        const rows = Array.from(tbody.querySelectorAll("tr"));
        return rows.map((row) => {
            const cells = Array.from(row.children).map(td => {
                const raw = td.innerText.trim();
                const textLower = raw.toLowerCase();
                let num = null;

                // parsing angka jika ada Rp atau angka lain
                let clean = raw.replace(/Rp/gi,'').replace(/\s/g,'').replace(/\./g,'').replace(/,/g,'.');
                if(clean !== '' && !isNaN(clean)) num = parseFloat(clean);

                return { rawText: raw, textLower: textLower, num: num };
            });
            return { element: row, cells: cells };
        });
    }

    function sortTable(columnIndex) {
        const rowsData = buildRowsData();
        const direction = sortDirections[columnIndex];

        if(columnIndex === 0){
            // kolom #: balik urutan saat klik
            rowsData.reverse();
        } else {
            rowsData.sort((a, b) => {
                const cellA = a.cells[columnIndex];
                const cellB = b.cells[columnIndex];

                if(cellA.num !== null && cellB.num !== null){
                    return (cellA.num - cellB.num) * direction;
                }
                return cellA.textLower.localeCompare(cellB.textLower) * direction;
            });
        }

        // append kembali baris ke tbody
        rowsData.forEach(rd => tbody.appendChild(rd.element));
        updateRowNumbers();
        sortDirections[columnIndex] *= -1;
    }

    headers.forEach((header, index) => {
        sortDirections[index] = 1;
        header.style.cursor = "pointer";
        header.addEventListener("click", () => sortTable(index));
    });

    searchInput.addEventListener("input", function() {
        const filter = this.value.toLowerCase().trim();
        Array.from(tbody.querySelectorAll("tr")).forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(filter) ? "" : "none";
        });
        updateRowNumbers();
    });

    updateRowNumbers(); // inisialisasi nomor urut
});

</script>



<?= $this->endSection() ?>
