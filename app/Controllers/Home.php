<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\PengajarModel;
use App\Models\skalaModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->pengajarModel = new PengajarModel();
        $this->skalaModel = new SkalaModel();
    }
    public function index()
    {
        $data['jumlahkriteria'] = $this->kriteriaModel->count();
        $data['jumlahskala'] = $this->skalaModel->count();
        $data['jumlahpengajar'] = $this->pengajarModel->count();
        echo view('master');
        echo view('dashboard', $data);
    }
}
