<?php

namespace App\Controllers;

use App\Models\KriteriaModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KriteriaController extends BaseController
{
    protected $kriteriaModel;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
    }

    public function index()
    {
        $data['kriteria'] = $this->kriteriaModel->findAll();
        
        echo view('master');
        echo view('kriteria', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->kriteriaModel->save($data);
        return redirect()->to('/kriteria');
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->kriteriaModel->update($id, $data);
        return redirect()->to('/kriteria');
    }

    public function delete($id)
    {
        $this->kriteriaModel->delete($id);
        return redirect()->to('/kriteria');
    }
}
