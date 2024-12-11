<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    protected $table = 'pengajar';  
    protected $primaryKey = 'id';  
    protected $allowedFields = ['nama'];

    public function count() {
        return $this->countAll();
    }
    
}
