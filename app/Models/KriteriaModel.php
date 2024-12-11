<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kodekriteria', 'namakriteria', 'jenis', 'bobot'];

    public function count() {
        return $this->countAll();
    }

}
