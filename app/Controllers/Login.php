<?php namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_pelanggan;
use App\Models\M_login;

class Login extends BaseController
{
    protected $M_admin;
    protected $M_pelanggan;
    //protected $M_login;

    public function __construct()
    {
        $this->M_admin = new M_admin();
        $this->M_pelanggan = new M_pelanggan();
        //$this->M_login = new M_login();
    }
// ======== Login Admin =========
    public function index()
    {
        $data = [
            'title'     => 'Login',
            'validate'  => \Config\Services::validation()
        ];
        return view('/admin/v_login',$data);
    }

    public function cekLoginAdmin()
    {
        if(!$this->validate([
            'email'         => [
                'label'     => 'E-mail',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Tidak Boleh Kosong'
                ]
            ],
            'password'      => [
                'label'     => 'Password',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Tidak Boleh Kosong'
                ]
            ]
        ])){
            return redirect()->to(base_url('/Login'))->withInput();
        }
        $email      = $this->request->getVar('email');
        $password   = $this->request->getVar('password');

        //Cek login
        $cek = $this->M_admin->where('email_admin', $email)->first();
        //dd($cek);

        //membuat data session
        $sesData = [
            'id_admin'      => $cek['id_admin'],
            'nama_admin'    => $cek['nama_admin'],
            'email'         => $cek['email_admin'],
            'log_in'        => TRUE
        ];

        //melakukan pengecekan
        if($cek)
        {
            if(password_verify($password, $cek['password'])){
                session()->set($sesData);
                return redirect()->to(base_url('/admin'));
            }else{
                session()->setFlashdata('gagal','Password anda salah');
                return redirect()->to('/Login/')->withInput();
            }
        }else{
            session()->setFlashdata('gagal','Email anda salah');
            return redirect()->to('/Login/')->withInput();
        }
    }

    public function logoutAdmin()
    {
        session()->destroy();
        return redirect()->to('/Login');
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
            'nama_admin'    => $this->request->getVar('nama_admin'),
            'email_admin'   => $this->request->getVar('email'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashdata('sukses','Akun berhasil dibuat');
        return redirect()->to('/Login/registrasiAdmin');
    }

// ========== Login Pelanggan ========== 
    public function registrasiUser()
    {
        $data = [
            'title'         => 'Registrasi',
            'validation'    => \Config\Services::validation()
        ];
        return view('/pelanggan/v_registerUser', $data);
    }

    public function registerUserAksi()
    {
        if(!$this->validate([
            'nama_user'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'     => 'Nama tidak boleh kosong'
                ]
            ],
            'email'         => [
                'rules'     => 'required|valid_email|is_unique[pelanggan.email_pelanggan]',
                'errors'    => [
                    'required'      => 'Email tidak boleh kosong',
                    'valid_email'   => 'Email tidak Valid',
                    'is_unique'     => 'Email sudah terdaftar'
                ]
            ],
            'password'      => [
                'rules'     => 'required|min_length[6]',
                'errors'    => [
                    'required'      => 'Password tidak boleh kosong',
                    'min_length'    => 'Password tidak boleh kurang dari 6 karakter'
                ]
            ],
            'telpon'        => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Nomor telpon tidak boleh kosong'
                ]
            ]
        ])){
            return redirect()->to('/Login/registrasiUser')->withInput();
        }

        $this->M_pelanggan->simpan([
            'nama_pelanggan'        => $this->request->getVar('nama_user'),
            'email_pelanggan'       => $this->request->getVar('email'),
            'password_pelanggan'    => $this->request->getVar('password'),
            'telpon_pelanggan'      => $this->request->getVar('telpon')
        ]);
        session()->setFlashdata('sukses','Akun berhasil dibuat');
        return redirect()->to('/Login/registrasiUser');
    }

    public function loginUser()
    {
        $data['title'] = 'Login User';
        return view('pelanggan/v_loginUser',$data);
    }
}