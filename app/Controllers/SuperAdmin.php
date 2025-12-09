<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaboratoriumModel;
use App\Models\PeminjamanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use App\Models\TipeLaboratoriumModel;




class SuperAdmin extends BaseController
{
    protected $session;
    protected $userModel;
    protected $labModel;
    protected $peminjamanModel;

    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
        $this->labModel = new LaboratoriumModel();
        $this->peminjamanModel = new PeminjamanModel();
    }

    /**
     * Fungsi privat untuk cek login & role superadmin
     */
    private function checkLogin()
    {
        if (!$this->session->get('logged_in') || $this->session->get('role') !== 'superadmin') {
            // Redirect langsung ke halaman login jika tidak login atau bukan superadmin
            return redirect()->to(base_url('login'))->send();
        }
    }

    /**
     * Dashboard utama SuperAdmin
     */
    public function index()
    {
        $this->checkLogin();

        $data['nama'] = $this->session->get('nama') ?? 'SuperAdmin';

        return view('superadmin/v_default_superadmin', $data);
    }


    /**
     * Daftar laboratorium
     */
   public function laboratorium()
    {
        $laboratoriumModel = new LaboratoriumModel();

        // Ambil semua laboratorium beserta nama admin dan nama tipe lab
        $data['laboratorium'] = $laboratoriumModel->getLaboratoriumWithAdminAndTipe();

        return view('superadmin/v_laboratorium', $data);
    }

    
    // Hapus laboratorium
public function hapusLaboratorium($id)
{
    $laboratoriumModel = new \App\Models\LaboratoriumModel();

    // Pastikan data ada
    $lab = $laboratoriumModel->find($id);
    if ($lab) {
        $laboratoriumModel->delete($id);
        // Redirect kembali ke daftar laboratorium dengan pesan sukses
        return redirect()->to(base_url('superadmin/laboratorium'))
                         ->with('success', 'Laboratorium berhasil dihapus.');
    } else {
        return redirect()->to(base_url('superadmin/laboratorium'))
                         ->with('error', 'Laboratorium tidak ditemukan.');
    }
}

// Ganti Admin
public function gantiAdmin($id)
{
    $laboratoriumModel = new \App\Models\LaboratoriumModel();
    $userModel = new \App\Models\UserModel();

    // Ambil data lab
    $lab = $laboratoriumModel->find($id);
    if (!$lab) {
        return redirect()->to(base_url('superadmin/laboratorium'))
                         ->with('error', 'Laboratorium tidak ditemukan.');
    }

    // Jika form sudah disubmit
    if ($this->request->getMethod() === 'post') {
        $admin_id = $this->request->getPost('admin_id');
        $laboratoriumModel->update($id, ['admin_id' => $admin_id]);
        return redirect()->to(base_url('superadmin/laboratorium'))
                         ->with('success', 'Admin laboratorium berhasil diubah.');
    }

    // Jika belum submit, tampilkan form pilih admin
    $data['lab'] = $lab;
    $data['adminList'] = $userModel->where('role', 2)->findAll(); // role 2 = admin lab
    return view('superadmin/v_ganti_admin', $data);
}



// Halaman edit laboratorium
        public function editLaboratorium($id)
        {
            $laboratoriumModel = new LaboratoriumModel();
            $userModel = new UserModel();
            $tipeModel = new TipeLaboratoriumModel();

            // Ambil data laboratorium yang diedit
            $laboratorium = $laboratoriumModel->find($id);
            if (!$laboratorium) {
                return redirect()->to(base_url('superadmin/laboratorium'))
                                ->with('error', 'Laboratorium tidak ditemukan.');
            }

            // Ambil list admin untuk dropdown
            $adminList = $userModel->where('role', 2)->findAll();

            // Ambil list tipe laboratorium untuk dropdown
            $tipeList = $tipeModel->findAll();

            // Kirim data ke view
            return view('superadmin/v_edit_laboratorium', [
                'laboratorium' => $laboratorium,
                'adminList'    => $adminList,
                'tipeList'     => $tipeList
            ]);
        }
public function updateLaboratorium($id)
{
    $laboratoriumModel = new LaboratoriumModel();

  $data = [
    'nama_lab'   => $this->request->getPost('nama_lab'),
    'lokasi'     => $this->request->getPost('lokasi'),
    'harga_sewa' => $this->request->getPost('harga_sewa'),
    'tipe_id'    => $this->request->getPost('tipe_id'),
    'admin_id'   => $this->request->getPost('admin_id'),
];

$laboratoriumModel->update($id, $data);
return redirect()->to(base_url('superadmin/laboratorium'));
}

    /**
     * Daftar admin lab
     */
    public function adminlab()
    {
        $this->checkLogin();
        $data['admins'] = $this->userModel->where('role', 'admin')->findAll();
        return view('superadmin/v_adminlab', $data); // pastikan view ada
    }

    /**
     * Form tambah admin lab & proses simpan
     */
    public function tambahAdmin()
    {
        $this->checkLogin();

        if ($this->request->getMethod() === 'post') {
            $this->userModel->save([
                'nim'      => $this->request->getPost('nim'),
                'nama'     => $this->request->getPost('nama'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'     => 'admin'
            ]);

            return redirect()->to(base_url('superadmin/adminlab'));
        }

        return view('superadmin/v_tambah_admin'); // pastikan view ada
    }

    public function tambahLaboratorium()
    {
        $userModel = new UserModel();
        $tipeModel = new TipeLaboratoriumModel();

        // Ambil semua user yang role-nya admin lab (role = 2)
        $adminList = $userModel->where('role', 2)->findAll();

        // Ambil semua tipe laboratorium
        $tipeList = $tipeModel->findAll();

        // Kirim data ke view
        return view('superadmin/v_tambah_laboratorium', [
            'adminList' => $adminList,
            'tipeList'  => $tipeList
        ]);
    }

    public function simpanLaboratorium()
    {
        $laboratoriumModel = new LaboratoriumModel();

        $data = [
            'nama_lab'   => $this->request->getPost('nama_lab'),
            'lokasi'     => $this->request->getPost('lokasi'),
            'harga_sewa' => $this->request->getPost('harga_sewa'),
            'tipe_id'    => $this->request->getPost('tipe_id'), // <--- perhatikan
            'admin_id'   => $this->request->getPost('admin_id'),
        ];

        $laboratoriumModel->insert($data);

        return redirect()->to(base_url('superadmin/laboratorium'))
                        ->with('success', 'Laboratorium berhasil ditambahkan.');
    }




    /**
     * Riwayat peminjaman
     */
    public function riwayat()
    {
        $this->checkLogin();
        $data['riwayat'] = $this->peminjamanModel->getRiwayat(); // Pastikan fungsi getRiwayat ada di model
        return view('superadmin/v_riwayat', $data); // pastikan view ada
    }


        public function exportExcel()
    {
        $laboratoriumModel = new LaboratoriumModel();
        $labs = $laboratoriumModel->getLaboratoriumWithAdminAndTipe(); // method baru

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', '#')
            ->setCellValue('B1', 'Nama Laboratorium')
            ->setCellValue('C1', 'Lokasi')
            ->setCellValue('D1', 'Harga Sewa')
            ->setCellValue('E1', 'Tipe')
            ->setCellValue('F1', 'Admin');

        $row = 2;
        $i = 1;
        foreach ($labs as $lab) {
            $sheet->setCellValue('A'.$row, $i++)
                ->setCellValue('B'.$row, $lab['nama_lab'])
                ->setCellValue('C'.$row, $lab['lokasi'])
                ->setCellValue('D'.$row, $lab['harga_sewa'])
                ->setCellValue('E'.$row, $lab['nama_tipe']) // kolom tipe dari join tipe_laboratorium
                ->setCellValue('F'.$row, $lab['admin_nama'] . ' | ' . $lab['admin_nim']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        // Set header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Daftar_Laboratorium.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit; // pastikan eksekusi berhenti setelah output
    }

    public function exportPDF()
    {
        $laboratoriumModel = new LaboratoriumModel();
        $laboratorium = $laboratoriumModel->getLaboratoriumWithAdminAndTipe(); // method baru

        $admin = [
            'nama' => session()->get('nama') ?? 'SuperAdmin',
            'nim'  => session()->get('nim') ?? '000000'
        ];

        $data = [
            'laboratorium' => $laboratorium,
            'admin' => $admin
        ];

        $html = view('superadmin/pdf_laboratorium', $data);

        $dompdf = new Dompdf();
        // Ukuran Folio: width 612pt, height 936pt
        $dompdf->setPaper([0,0,612,936], 'portrait');
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('pdf_laboratorium.pdf', ['Attachment' => true]);
    }

}
