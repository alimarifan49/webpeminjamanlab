<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','lab_id','tanggal_peminjaman','jam_mulai','jam_selesai','status','total_harga_lab'];
}
