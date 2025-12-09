<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratoriumModel extends Model
{
    protected $table      = 'laboratorium';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lab', 'lokasi', 'harga_sewa', 'tipe', 'admin_id'];

    // Ambil semua laboratorium beserta data admin (nama + nim)
    public function getLaboratoriumWithAdmin()
    {
        return $this->select('laboratorium.*, users.nama as admin_nama, users.nim as admin_nim')
                    ->join('users', 'users.id = laboratorium.admin_id', 'left')
                    ->findAll();
    }

    // Opsional: ambil satu laboratorium beserta admin-nya
    public function getLaboratoriumById($id)
    {
        return $this->select('laboratorium.*, users.nama as admin_nama, users.nim as admin_nim')
                    ->join('users', 'users.id = laboratorium.admin_id', 'left')
                    ->where('laboratorium.id', $id)
                    ->first();
    }
}
