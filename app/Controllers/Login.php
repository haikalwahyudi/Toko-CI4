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
// -------------------------------------- Login Admin --------------------------------------------
    public function index()
    {
        $data = [
            'title'     => 'Login',
            'validation'  => \Config\Services::validation()
        ];
        return view('/login/v_login',$data);
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('sukses','Berhasil Logout');
        return redirect()->to('/Login');
    }

// ------------------------------------------- Login Pelanggan ------------------------------------------------- 

    public function registrasiUser()
    {
        $data = [
            'title'         => 'Registrasi',
            'validation'    => \Config\Services::validation()
        ];
        return view('/login/v_registerUser', $data);
    }

    public function cekLoginPelanggan()
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
            return redirect()->to(base_url('/Login/loginUser'))->withInput();
        }
        $email      = $this->request->getVar('email');
        $password   = $this->request->getVar('password');

        //Cek login pelanggan
        $cek = $this->M_pelanggan->where('email_pelanggan', $email)->first();

        //cek login admin
        $cekAdm = $this->M_admin->where('email_admin', $email)->first();

        // dd($cek, $cekAdm);

        if($cek != null){
            //membuat data session
            $sesData = [
            'id_pelanggan'      => $cek['id_pelanggan'],
            'nama_pelanggan'    => $cek['nama_pelanggan'],
            'email_pelanggan'   => $cek['email_pelanggan'],
            'log_inp'           => TRUE,
            'level'             => $cek['level']
            ];

            //melakukan pengecekan
            if($cek)
            {
                if(password_verify($password, $cek['password_pelanggan'])){
                    session()->set($sesData);
                    return redirect()->to(base_url('/pelanggan'));
                }else{
                    session()->setFlashdata('gagal','Password anda salah');
                    return redirect()->to('/Login/loginUser')->withInput();
                }
            }else{
                session()->setFlashdata('gagal','Email anda salah');
                return redirect()->to('/Login/loginUser')->withInput();
            }
        }else{
            //membuat data session
            $sesData = [
                'id_admin'      => $cekAdm['id_admin'],
                'nama_admin'    => $cekAdm['nama_admin'],
                'email'         => $cekAdm['email_admin'],
                'log_in'        => TRUE,
                'level'         => $cekAdm['level']
            ];

            //melakukan pengecekan
            if($cekAdm)
            {
                if(password_verify($password, $cekAdm['password'])){
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
            'password_pelanggan'    => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'telpon_pelanggan'      => $this->request->getVar('telpon'),
            'level'                 => 'pelanggan'
        ]);
        session()->setFlashdata('sukses','Akun berhasil dibuat');
        return redirect()->to('/Login/registrasiUser');
    }
}