<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Laboratorium</title>
    <style>
        body {
            font-family: "Courier New", monospace;
            font-size: 10pt;
        }
        table { 
            border-collapse: collapse; 
            width: 100%; 
            margin-bottom: 50px;
        }
        table, th, td { 
            border: 0.3px solid #555; /* versi paling tipis + warna mendekati hitam */
        }
        th, td { 
            padding: 5px; 
            text-align: left; 
        }
        th { 
            background-color: #ddd; 
        }
        .footer-right {
            float: right;
            text-align: center;
        }
        .footer-right p {
            margin: 2px;
        }
    </style>
</head>
<body>
    <h2>Daftar Laboratorium</h2>
    <table>
        <thead>
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
            <?php $i = 1; foreach ($laboratorium as $lab): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= esc($lab['nama_lab']) ?></td>
                <td><?= esc($lab['lokasi']) ?></td>
                <td>Rp <?= number_format($lab['harga_sewa'],0,',','.') ?></td>
                <td><?= esc($lab['nama_tipe']) ?></td>
                <td><?= esc($lab['admin_nama']) ?> | <?= esc($lab['admin_nim']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<div class="footer-right">
    <p>
        <?php 
        // Pastikan timezone tepat
        date_default_timezone_set('Asia/Jakarta');

        // Formatter tanggal Bahasa Indonesia
        $formatter = new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN,
            "EEEE, d MMMM yyyy"
        );

        echo $formatter->format(time());
        ?>
    </p>

    <p>Mengetahui</p>
    <br><br><br>

    <p>_________________________</p>
    <p><?= esc($admin['nama']) ?></p>
    <p><?= esc($admin['nim']) ?></p>
</div>

</body>
</html>
