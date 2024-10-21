<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KaryawanModel;

class DataController extends Controller
{
    public function index()
    {
 
        $karyawanModel = new KaryawanModel();
        $data['karyawan'] = $karyawanModel->findAll();

        return view('v_dataKaryawan', $data);
    }

    // public function create()
    // {
    //     return view('karyawan/create');
    // }

    public function store()
    {
        $karyawanModel = new KaryawanModel();

        $data = [
            'nama'      => $this->request->getPost('nama'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'gaji'      => $this->request->getPost('gaji')
        ];

        $karyawanModel->insert($data);

        return redirect()->to('/')->with('status', 'Data karyawan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karyawanModel = new KaryawanModel();
        $data['karyawan'] = $karyawanModel->find($id);

        return view('/', $data);
    }

    public function update($id)
    {
        $karyawanModel = new KaryawanModel();

        $data = [
            'nama'      => $this->request->getPost('nama'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'gaji'      => $this->request->getPost('gaji')
        ];

        $karyawanModel->update($id, $data);

        return redirect()->to('/')->with('status', 'Data karyawan berhasil diperbarui');
    }

    public function delete($id)
    {
        $karyawanModel = new KaryawanModel();
        $karyawanModel->delete($id);

        return redirect()->to('/')->with('status', 'Data karyawan berhasil dihapus');
    }
}
