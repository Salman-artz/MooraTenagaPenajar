<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MooraModel;

class MooraController extends BaseController
{
    protected $mooraModel;

    public function __construct()
    {
        $this->mooraModel = new MooraModel();
    }

    public function index()
    {
        $matriksNormalisasi = $this->mooraModel->getNormalisasi();
        $optimalisasi = $this->mooraModel->getOptimalisasi();
        $nilaiYi = $this->mooraModel->getNilaiYi();
        $ranking = $this->mooraModel->getRanking();

        $data = [
            'matriks_normalisasi' => $this->groupByPengajar($matriksNormalisasi, 'C_normalisasi'),
            'optimalisasi' => $this->groupByPengajar($optimalisasi, 'C_optimalisasi'),
            'nilai_yi' => $nilaiYi,
            'ranking' => $ranking,
        ];

        echo view('master');
        echo view('moora', $data);
    }

    private function groupByPengajar($data, $prefix){
    $grouped = [];
    foreach ($data as $row) {
        $grouped[$row['idpengajar']]['nama'] = $row['nama'];
        $kodeKriteria = str_replace($prefix, '', $row['kodekriteria']);
        $grouped[$row['idpengajar']][$kodeKriteria] = $row['value'];
    }
    return $grouped;
}
}
