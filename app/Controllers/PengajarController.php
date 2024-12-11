<?php

namespace App\Controllers;

use App\Models\PengajarModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PengajarController extends BaseController
{
    protected $pengajarModel;

    public function __construct()
    {
        $this->pengajarModel = new PengajarModel();
    }

    public function index()
    {
        $data['datapengajar'] = $this->pengajarModel->orderBy('id', 'ASC')->findAll();
        echo view('master');
        echo view('pengajar', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->pengajarModel->save($data);
        return redirect()->to('/pengajar');
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->pengajarModel->update($id, $data);
        return redirect()->to('/pengajar');
    }

    public function delete($id)
    {
        $this->pengajarModel->delete($id);
        return redirect()->to('/pengajar');
    }
}
