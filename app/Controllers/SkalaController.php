<?php

namespace App\Controllers;

use App\Models\SkalaModel;
use App\Models\KriteriaModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SkalaController extends BaseController
{
    protected $skalaModel;
    protected $kriteriaModel;

    public function __construct()
    {
        $this->skalaModel = new SkalaModel();
        $this->kriteriaModel = new KriteriaModel();
    }

    public function index()
    {
        $data = [
            'skala' => $this->skalaModel
                ->select('skala.*, kriteria.namakriteria')
                ->join('kriteria', 'kriteria.id = skala.idkriteria')
                ->findAll(),
            'kriteria' => $this->kriteriaModel->findAll() 
        ];

        echo view('master');
        echo view('skala', $data);
    }

    public function create()
    {
        $this->skalaModel->save([
            'idkriteria' => $this->request->getPost('idkriteria'),
            'value' => $this->request->getPost('value'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/skala');
    }

    public function update($id)
    {
        $this->skalaModel->update($id, [
            // 'idkriteria' => $this->request->getPost('idkriteria'),
            'value' => $this->request->getPost('value'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/skala');
    }

    public function delete($id)
    {
        $this->skalaModel->delete($id);
        return redirect()->to('/skala');
    }
}
