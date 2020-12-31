<?php namespace App\Controllers;

use App\Models\M_pelanggan;
use App\Models\M_produk;

class Pelanggan extends BaseController
{
    protected $M_pelanggan;
    protected $M_produk;

    public function __construct()
    {
        $this->M_pelanggan = new M_pelanggan();
        $this->M_produk = new M_produk();
    }

    public function index()
    {
        $data = [
            'title'             => 'Pelanggan',
            'getProduk'         => $this->M_produk->ambilData()
        ];
        return view('/pelanggan/v_pelanggan',$data);
    }
}