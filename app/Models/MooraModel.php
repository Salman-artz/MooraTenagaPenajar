<?php

namespace App\Models;

use CodeIgniter\Model;

class MooraModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect(); 
    }

    public function getNormalisasi()
    {
        $query = "SELECT * FROM normalisasi";
        return $this->db->query($query)->getResultArray();
    }

    public function getOptimalisasi()
    {
        $query = "SELECT * FROM optimalisasi";
        return $this->db->query($query)->getResultArray();
    }

    public function getNilaiYi()
    {
        $query = "SELECT * FROM nilaiyi";
        return $this->db->query($query)->getResultArray();
    }

    public function getRanking()
    {
        $query = "SELECT * FROM ranking";
        return $this->db->query($query)->getResultArray();
    }
    }
    

