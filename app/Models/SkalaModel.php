<?php

namespace App\Models;

use CodeIgniter\Model;

class SkalaModel extends Model
{
    protected $table = 'skala';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idkriteria', 'value', 'keterangan'];

    public function count() {
        return $this->countAll();
    }
}
