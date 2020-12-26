<?php namespace App\Controllers;

//use CodeIgniter\controller;
// use App\Models\M_admin;
use App\Models\M_produk;

class Admin extends BaseController
{
    // Construct
    protected $M_produk;
    public function __construct(){
        $this->M_produk = new M_produk();
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
            // 'validation' => \Config\Services::validation(),
            'getProduk' => $this->M_produk->ambilData($id_produk)->getRow()
        ];
        return view('admin/ubah/v_eproduk',$data);
    }
    public function editProdukAksi()
    {
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

        $id_produk = $this->request->getVar('id_produk');
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
            'title' => 'Pembelian'
        ];
        return view('admin/v_pembelian',$data);
    }
    
    public function admin()
    {
        $data = [
            'title' => 'Admin'
        ];
        return view('admin/v_admin', $data);
    }

    public function tambahAdmin()
    {
        $data = [
            'title' => 'Tambah Data Admin'
        ];
        return view('admin/tambah/v_tadmin', $data);
    }

    public function ubahAdmin()
    {
        $data = [
            'title' => 'Ubah Data Admin'
        ];
        return view('admin/ubah/v_eadmin', $data);
    }
    
    public function pelanggan()
    {
        $data = [
            'title' => 'Pelanggan'
        ];
        return view('admin/v_pelanggan', $data);
    }

    public function kategori()
    {
        $data['title'] = 'Kategori';
        return view('admin/v_kategori', $data);
    }

    public function tambahKategori()
    {
        $data = [
            'title' => 'Tambah Data Kategori'
        ];
        return view('admin/tambah/v_tkategori', $data);
    }

    public function ubahKategori()
    {
        $data = [
            'title' => 'Ubah Data Kategori'
        ];
        return view('admin/ubah/v_ekategori', $data);
    }
    
    public function ongkir()
    {
        $data['title'] = 'Ongkir';
        return view('admin/v_ongkir', $data);
    }

    public function tambahOngkir()
    {
        $data = [
            'title' => 'Tambah Data Ongkir'
        ];
        return view('admin/tambah/v_tongkir', $data);
    }

    public function ubahOngkir()
    {
        $data = [
            'title' => 'Ubah Data Ongkir'
        ];
        return view('admin/ubah/v_eongkir', $data);
    }
}