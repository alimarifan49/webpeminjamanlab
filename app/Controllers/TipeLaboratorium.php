<?php

namespace App\Controllers;

use App\Models\TipeLaboratoriumModel;

class TipeLaboratorium extends BaseController
{
    public function index()
    {
        $model = new TipeLaboratoriumModel();
        $data['tipeLabs'] = $model->findAll();
        return view('superadmin/v_tipe_laboratorium', $data);
    }

    public function simpan()
    {
        $model = new TipeLaboratoriumModel();
        $model->insert(['nama_tipe' => $this->request->getPost('nama_tipe')]);
        return redirect()->to(base_url('superadmin/tipeLaboratorium'));
    }

    public function update($id)
    {
        $model = new TipeLaboratoriumModel();
        $model->update($id, ['nama_tipe' => $this->request->getPost('nama_tipe')]);
        return redirect()->to(base_url('superadmin/tipeLaboratorium'));
    }

    public function hapus($id)
    {
        $model = new TipeLaboratoriumModel();
        $model->delete($id);
        return redirect()->to(base_url('superadmin/tipeLaboratorium'));
    }
}
