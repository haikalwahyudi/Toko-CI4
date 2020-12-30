<?php namespace App\Controllers;

//use CodeIgniter\controller;
// use App\Models\M_admin;
use App\Models\M_produk;
use App\Models\M_kategori;
use App\Models\M_ongkir;
use App\Models\M_admin;
use App\Models\M_pelanggan;
use App\Models\M_pembelian;

class Admin extends BaseController
{
    // Construct
    protected $M_produk;
    protected $M_kategori;
    protected $M_ongkir;
    protected $M_admin;
    protected $M_pelanggan;
    protected $M_pembelian;

    public function __construct(){
        $this->M_produk = new M_produk();
        $this->M_kategori = new M_kategori();
        $this->M_ongkir = new M_ongkir();
        $this->M_admin = new M_admin();
        $this->M_pelanggan = new M_pelanggan();
        $this->M_pembelian = new M_pembelian();
    }
//===================== Halaman Menu ========================
    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('admin/v_home', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail',
            'detail' => $this->M_produk->ambilData($id)->getRow()
        ];
        return view('admin/v_detailadmin',$data);
    }

    public function produk()
    {
        $data = [
            'title' => 'Produk',
            'data' => $this->M_produk->ambilData()
        ];

        return view('admin/v_produk', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'title' => 'Tambah Data Produk',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tambah/v_tproduk',$data);
    }

    public function simpanProduk()
    {
        if(!$this->validate([
            'namaProduk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Produk Harus diisi.'
                ]
                ],
            'id_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id Kategori Harus diisi.'
                ]
            ],
            'harga_beli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Beli Harus diisi.'
                ]
            ],
            'harga_jual' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Jual Harus diisi.'
                ]
            ],
            'berat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berat Harus diisi.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar, max 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])){
            // $validation = \config\services::validation();
            // return redirect()->to('/admin/tambahProduk')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/tambahProduk')->withInput();
        }
        $filegambar = $this->request->getFile('gambar');

        //cek gambar
        if($filegambar->getError() == 4){
            $namagambar = 'default.jpg';
        }else{
            //random nama gambar
            $namagambar = $filegambar->getRandomName();
    
            //pindah ke folder img
            $filegambar->move('img',$namagambar);
        }


        $this->M_produk->simpan([
            'nama_produk' => $this->request->getVar('namaProduk'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'berat' => $this->request->getVar('berat'),
            'foto_produk' => $namagambar,
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);
        session()->setFlashdata('berhasil','Data Berhasil Disimpan');
        return redirect()->to('/admin/tambahProduk');
    }

    public function hapus($id)
    {
        $gambar = $this->M_produk->ambilData($id)->getRow();

        if($gambar->foto_produk != "default.jpg"){
            //Hapus data beserta file gambar
            unlink('img/'. $gambar->foto_produk);
        }
        $this->M_produk->hapus($id);
        session()->setFlashdata('hapus','Data Berhasil Dihapus');
        return redirect()->to('/admin/produk');
    }

    public function editProduk($id_produk)
    {
        $data = [
            'title' => 'Ubah Data Produk',
            'getProduk' => $this->M_produk->ambilData($id_produk)->getRow(),
            'validation' => \Config\Services::validation()
        ];
        
        return view('admin/ubah/v_eproduk',$data);
    }
    public function editProdukAksi()
    {
        if(!$this->validate([
            'namaProduk'    => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Nama produk harus diisi'
                ]
                ],
            'harga_beli'    => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Harga beli harus diisi'
                ]
                ],
            'harga_jual'    => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Harga Jual Harus diisi.'
                ]
            ],
            'berat'         => [
                'rules'     => 'required',
                'errors'    => [
                    'required' => 'Berat Harus diisi.'
                ]
            ],
            'gambar'        => [
                'rules'     => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors'    => [
                    'max_size'  => 'Ukuran gambar terlalu besar, max 1MB.',
                    'is_image'   => 'Yang anda pilih bukan gambar.',
                    'mime_in'  => 'Fromat gambar harus jpg,jpeg, atau png.',
                ]
            ]
        ])){
            return redirect()->to('/admin/editProduk/'.$this->request->getVar('id_produk'))->withInput();
        }

        $id = $this->request->getvar('id_produk');
        $cariId = $this->M_produk->ambilData($id)->getRow();

        $gambar = $this->request->getFile('gambar');

        if($gambar->getError() == 4){
            $gambarLama = $this->request->getVar('gambarLama');
            $namagambar = $gambarLama;
        }else{
            $namagambar = $gambar->getRandomName();
            $gambar->move('img', $namagambar);
            if($cariId->foto_produk != "default.jpg"){
                unlink('img/'. $this->request->getVar('gambarLama'));
            }
        }

        $id_produk = $this->request->getPost('id_produk');
        $this->M_produk->ubah([
            'nama_produk' => $this->request->getVar('namaProduk'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'harga_beli' => $this->request->getVar('harga_beli'),
            'harga_jual' => $this->request->getVar('harga_jual'),
            'berat' => $this->request->getVar('berat'),
            'foto_produk' => $namagambar,
            'deskripsi' => $this->request->getVar('deskripsi')
        ],$id_produk);
        session()->setFlashdata('ubah','Data Berhasil Diubah');
        return redirect()->to('/admin/produk');
    }

    public function pembelian()
    {
        $data = [
            'title'         => 'Pembelian',
            'getPembelian'  => $this->M_pembelian->ambilData()
        ];
        return view('admin/v_pembelian',$data);
    }

    public function hapusPembelian($id_pembelian)
    {
        $this->M_pembelian->hapus($id_pembelian);
        session()->setFlashdata('hapus','Pembelian dibatalkan');
        return redirect()->to('/admin/pembelian');
    }
    
    public function admin()
    {
        $data = [
            'title'         => 'Admin',
            'getAdmin'      => $this->M_admin->ambilData()
        ];
        return view('admin/v_admin', $data);
    }

    public function tambahAdmin()
    {
        $data = [
            'title'         => 'Tambah Data Admin',
            'validation'    => \Config\Services::validation()
        ];
        return view('admin/tambah/v_tadmin', $data);
    }

    public function tambahAdminAksi()
    {
        if(!$this->validate([
            'namaAdmin'      => [
                'rules'      => 'required',
                'errors'     =>   [
                    'required'  => 'Nama admin harus diisi'
                ]
            ],
            'username'      => [
                'rules'     => 'required',
                'errors'    =>   [
                    'required'  => 'Username harus diisi'
                ]
            ],
            'password'      => [
                'rules'     => 'required',
                'errors'    =>   [
                    'required'  => 'Password harus diisi'
                ]
            ],
        ])){
            return redirect()->to('/admin/tambahAdmin')->withInput();
        }

        $this->M_admin->simpan([
            'nama'      => $this->request->getVar('namaAdmin'),
            'username'  => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password')
        ]);
        session()->setFlashdata('sukses', 'Data berhasil disimpan');
        return redirect()->to('/admin/tambahAdmin');
    }

    public function ubahAdmin($id_admin)
    {
        $data = [
            'title'         => 'Ubah Data Admin',
            'getAdmin'      => $this->M_admin->ambilData($id_admin)->getRow(),
            'validation'    => \Config\Services::validation()
        ];
        return view('admin/ubah/v_eadmin', $data);
    }

    public function ubahAdminAksi()
    {
        if(!$this->validate([
            'namaAdmin'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Nama admin harus diisi.'
                ]
            ],
            'username'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Username harus diisi.'
                ]
            ],
            'password'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Password harus diisi.'
                ]
            ],
        ])){
            return redirect()->to('/admin/ubahAdmin/'.$this->request->getVar('id_admin'))->withInput();
        }

        $id_admin = $this->request->getVar('id_admin');
        $this->M_admin->ubah([
            'nama'      => $this->request->getVar('namaAdmin'),
            'username'  => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password')
        ], $id_admin);
        session()->setFlashdata('sukses', 'Data berhasil diubah.');
        return redirect()->to('/admin/admin');
    }

    public function hapusAdmin($id_admin)
    {
        $this->M_admin->hapus($id_admin);
        session()->setFlashdata('hapus','Data berhasil dihapus.');
        return redirect()->to('/admin/admin');
    }
    
    public function pelanggan()
    {
        $data = [
            'title'         => 'Pelanggan',
            'getPelanggan'  => $this->M_pelanggan->ambilData()
        ];
        return view('admin/v_pelanggan', $data);
    }

    public function ubahPelanggan($id_pelanggan)
    {
        $data = [
            'title'         => 'Ubah Data Pelanggan',
            'getPelanggan'  => $this->M_pelanggan->ambilData($id_pelanggan)->getRow(),
            'validation'    => \Config\Services::validation()
        ];
        return view('/admin/ubah/v_epelanggan', $data);
    }

    public function ubahPelangganAksi()
    {
        if(!$this->validate([
            "nama_pelanggan"    => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Nama harus diisi.'
                ]
            ],
            "email_pelanggan"   => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Email harus diisi.'
                ]
            ],
            "password_pelanggan"=> [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Password harus diisi.'
                ]
            ],
            "telpon_pelanggan"  => [
                'rules'         => 'required',
                'errors'        => [
                    'required'  => 'Nomor telpon harus diisi.'
                ]
            ]
        ])){
            return redirect()->to('/admin/ubahPelanggan/'.$this->request->getVar('id_pelanggan'))->withInput();
        }

        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $this->M_pelanggan->ubah([
            'nama_pelanggan'    => $this->request->getVar('nama_pelanggan'),
            'email_pelanggan'   => $this->request->getVar('email_pelanggan'),
            'password_pelanggan'=> $this->request->getVar('password_pelanggan'),
            'telpon_pelanggan'  => $this->request->getVar('telpon_pelanggan')
        ], $id_pelanggan);

        session()->setFlashdata('sukses','Data berhasil disimpan');
        return redirect()->to('/admin/pelanggan');
    }

    public function hapusPelanggan($id_pelanggan)
    {
        $this->M_pelanggan->hapus($id_pelanggan);
        session()->setFlashdata('hapus', 'Data berhasil dihapus');
        return redirect()->to('/admin/pelanggan');
    }

    public function kategori()
    {
        $data = [
            'title'         => 'Kategori',
            'getKategori'   => $this->M_kategori->ambilData()
        ];
        return view('admin/v_kategori', $data);
    }

    public function tambahKategori()
    {
        $data = [
            'title'     => 'Tambah Data Kategori',
            'validate'  => \Config\Services::validation()
        ];
        return view('admin/tambah/v_tkategori', $data);
    }

    public function tambahKategoriAksi()
    {
        if(!$this->validate([
            'kategori'      => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Kategori harus diisi.'
                ]
            ]
        ])){
            return redirect()->to('/admin/tambahKategori')->withInput();
        }

        $this->M_kategori->simpan([
            'kategori'  => $this->request->getVar('kategori')
        ]);
        session()->setFlashdata('sukses','Data Berhasil Ditambah');
        return redirect()->to('/admin/kategori');
    }

    public function ubahKategori($id_kategori)
    {
        $data = [
            'title'         => 'Ubah Data Kategori',
            'kategori'      => $this->M_kategori->ambilData($id_kategori)->getRow(),
            'validation'    => \config\services::validation()
        ];
        return view('admin/ubah/v_ekategori', $data);
    }

    public function ubahKategoriAksi()
    {
        if(!$this->validate([
            'kategori'      => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Kategori harus diisi.'
                ]
            ]
        ])){
            return redirect()->to('/admin/ubahkategori/'. $this->request->getVar('id_kategori'))->withInput();
        }

        $id_kategori = $this->request->getVar('id_kategori');
        $this->M_kategori->ubah([
            'kategori'  => $this->request->getVar('kategori')
        ], $id_kategori);
        session()->setFlashdata('sukses','Data berhasil diubah');
        return redirect()->to('/admin/kategori');
    }

    public function hapusKategori($id_kategori)
    {
        $this->M_kategori->hapus($id_kategori);
        session()->setFlashdata('hapus','Data berhasil dihapus');
        return redirect()->to('/admin/kategori');
    }
    
    public function ongkir()
    {
        $data = [
            'title'         => 'Ongkir',
            'getOngkir'     => $this->M_ongkir->ambilData()
        ];
        return view('admin/v_ongkir', $data);
    }

    public function tambahOngkir()
    {
        $data = [
            'title'         => 'Tambah Data Ongkir',
            'validation'    => \config\services::validation()
        ];
        return view('admin/tambah/v_tongkir', $data);
    }

    public function tambahOngkirAksi()
    {
        //validasi
        if(!$this->validate([
            'nama_kota'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Nama Kota harus diisi.'
                ]
                ],
            'tarif'         => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Tarif harus diisi.'
                ]
                ]
        ])){
            return redirect()->to('/admin/tambahOngkir')->withInput();
        }

        $this->M_ongkir->simpan([
            'nama_kota'     => $this->request->getVar('nama_kota'),
            'tarif'         => $this->request->getVar('tarif')
        ]);
        session()->setFlashdata('sukses','Data berhasil disimpan');
        return redirect()->to('/admin/tambahOngkir');
    }

    public function ubahOngkir($id_ongkir)
    {
        $data = [
            'title'         => 'Ubah Data Ongkir',
            'validation'    => \config\services::validation(),
            'getOngkir'     => $this->M_ongkir->ambilData($id_ongkir)->getRow()
        ];
        return view('admin/ubah/v_eongkir', $data);
    }

    public function ubahOngkirAksi()
    {
        if(!$this->validate([
            'nama_kota'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'   => "Nama kota harus diisi."
                ]
            ],
            'tarif'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'   => "Tarif harus diisi."
                ]
            ],
        ])){
            return redirect()->to('/admin/ubahOngkir/'.$this->request->getVar('id_ongkir'))->withInput();
        }
        $id_ongkir = $this->request->getVar('id_ongkir');
        $this->M_ongkir->ubah([
            'nama_kota'     => $this->request->getVar('nama_kota'),
            'tarif'         => $this->request->getVar('tarif')
        ], $id_ongkir);
        session()->setFlashdata('sukses', 'Data berhasil disimpan');
        return redirect()->to('/admin/ongkir');
    }

    public function hapusOngkir($id_ongkir)
    {
        $this->M_ongkir->hapus($id_ongkir);
        session()->setFlashdata('hapus','Data berhasil dihapus');
        return redirect()->to('/admin/ongkir');
    }
}