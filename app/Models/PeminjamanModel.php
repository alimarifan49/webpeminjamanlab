<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table      = 'peminjaman';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'lab_id', 'tanggal_peminjaman',
        'jam_mulai', 'jam_selesai', 'status', 'total_harga_lab'
    ];

    // Contoh fungsi untuk mengambil riwayat peminjaman
    public function getRiwayat()
    {
        return $this->select('peminjaman.*, users.nama as user_nama, laboratorium.nama_lab')
                    ->join('users', 'users.id = peminjaman.user_id')
                    ->join('laboratorium', 'laboratorium.id = peminjaman.lab_id')
                    ->orderBy('tanggal_peminjaman', 'DESC')
                    ->findAll();
    }
}
