<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratoriumModel extends Model
{
    protected $table      = 'laboratorium';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lab', 'lokasi', 'harga_sewa', 'tipe_id', 'admin_id'];

    /**
     * Ambil semua laboratorium beserta data admin dan tipe lab
     *
     * @return array
     */
    public function getLaboratoriumWithAdminAndTipe()
    {
        return $this->select('
                    laboratorium.id,
                    laboratorium.nama_lab,
                    laboratorium.lokasi,
                    laboratorium.harga_sewa,
                    laboratorium.tipe_id,
                    laboratorium.admin_id,
                    users.nama as admin_nama,
                    users.nim as admin_nim,
                    tipe_laboratorium.nama_tipe
                ')
                ->join('users', 'users.id = laboratorium.admin_id', 'left')
                ->join('tipe_laboratorium', 'tipe_laboratorium.id = laboratorium.tipe_id', 'left')
                ->findAll();
    }

    /**
     * Ambil satu laboratorium beserta data admin dan tipe
     *
     * @param int $id
     * @return array|null
     */
    public function getLaboratoriumById($id)
    {
        return $this->select('
                    laboratorium.id,
                    laboratorium.nama_lab,
                    laboratorium.lokasi,
                    laboratorium.harga_sewa,
                    laboratorium.tipe_id,
                    laboratorium.admin_id,
                    users.nama as admin_nama,
                    users.nim as admin_nim,
                    tipe_laboratorium.nama_tipe
                ')
                ->join('users', 'users.id = laboratorium.admin_id', 'left')
                ->join('tipe_laboratorium', 'tipe_laboratorium.id = laboratorium.tipe_id', 'left')
                ->where('laboratorium.id', $id)
                ->first();
    }

    /**
     * Ambil list laboratorium untuk export Excel/PDF
     *
     * @return array
     */
    public function getLaboratoriumForExport()
    {
        return $this->select('
                    laboratorium.nama_lab,
                    laboratorium.lokasi,
                    laboratorium.harga_sewa,
                    tipe_laboratorium.nama_tipe as tipe,
                    users.nama as admin_nama,
                    users.nim as admin_nim
                ')
                ->join('users', 'users.id = laboratorium.admin_id', 'left')
                ->join('tipe_laboratorium', 'tipe_laboratorium.id = laboratorium.tipe_id', 'left')
                ->findAll();
    }
}
