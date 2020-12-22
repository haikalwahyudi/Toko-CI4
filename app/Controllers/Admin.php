<?php namespace App\Controllers;

// use CodeIgniter\controller;
// use App\Models\M_admin;

class Admin extends BaseController
{
//========= Halaman Menu ==========
    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('admin/v_home', $data);
    }
    public function kategori()
    {
        $data['title'] = 'Kategori';
        return view('admin/v_kategori', $data);
    }
    
    public function ongkir()
    {
        $data['title'] = 'Ongkir';
        return view('admin/v_ongkir', $data);
    }

    public function produk()
    {
        $data = [
            'title' => 'Produk'
        ];

        return view('admin/v_produk', $data);
    }

    public function admin()
    {
        $data = [
            'title' => 'Admin'
        ];

        return view('admin/v_admin', $data);
    }

    public function pelanggan()
    {
        $data = [
            'title' => 'Pelanggan'
        ];

        return view('admin/v_pelanggan', $data);
    }
}