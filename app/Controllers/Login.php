<?php namespace App\Controllers;

use App\Models\M_admin;

class Login extends BaseController
{
    protected $M_admin;

    public function __construct()
    {
        $this->M_admin = new M_admin();
    }
// ======== Login Admin =========
    public function index()
    {
        $data['title'] = 'Login';
        return view('/admin/v_login',$data);
    }

    public function registrasiAdmin()
    {
        $data =[
            'title'         => 'Registrasi',
            'validation'    => \config\services::validation()
        ];
        return view('/admin/v_registrasi', $data);
    }

    public function registerAdminAksi()
    {
        if(!$this->validate([
            'nama_admin'    => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Nama tidak boleh kosong'
                ]
            ],
            'email'         => [
                'rules'     => 'required|valid_email|is_unique[admin.email_admin]',
                'errors'    => [
                    'required'      => 'Email tidak boleh kosong',
                    'is_unique'     => 'Email sudah terdaftar',
                    'valid_email'   => 'Email tidak valid'
                ]
            ],
            'password'      => [
                'rules'     => 'required|min_length[6]',
                'errors'    => [
                    'required'      => '{field} tidak boleh kosong',
                    'min_length'    => 'Tidak boleh kurang dari 6 karakter'
                ]
            ]
        ])){
            return redirect()->to('/Login/registrasiAdmin')->withInput();
        }
        $this->M_admin->simpan([
            'nama_admin'   => $this->request->getVar('nama_admin'),
            'email_admin'   => $this->request->getVar('email'),
            'password'    => $this->request->getVar('password'),
        ]);
        session()->setFlashdata('sukses','Akun berhasil dibuat');
        return redirect()->to('/Login/registrasiAdmin');
    }

// ========== Login Pelanggan ========== 
    public function registrasiUser()
    {
        $data['title'] = "Registrasi";
        return view('/pelanggan/v_registerUser', $data);
    }

    public function loginUser()
    {
        $data['title'] = 'Login User';
        return view('pelanggan/v_loginUser',$data);
    }
}