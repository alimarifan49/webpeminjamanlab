<?php

namespace App\Models;

use CodeIgniter\Model;

class TipeLaboratoriumModel extends Model
{
    protected $table = 'tipe_laboratorium';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_tipe'];
}
