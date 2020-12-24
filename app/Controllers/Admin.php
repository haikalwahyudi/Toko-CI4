<?php namespace App\Controllers;

// use CodeIgniter\controller;
// use App\Models\M_admin;

class Admin extends BaseController
{
//===================== Halaman Menu ========================
    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('admin/v_home', $data);
    }

    public function produk()
    {
        $data = [
            'title' => 'Produk'
        ];

        return view('admin/v_produk', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'title' => 'Tambah Data Produk'
        ];
        return view('admin/tambah/v_tproduk',$data);
    }

    public function editProduk()
    {
        $data = [
            'title' => 'Ubah Data Produk'
        ];
        return view('admin/ubah/v_eproduk',$data);
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