<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratoriumModel extends Model
{
    protected $table      = 'laboratorium';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lab', 'lokasi', 'harga_sewa', 'tipe', 'admin_id'];
}
