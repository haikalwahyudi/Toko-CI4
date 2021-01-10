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
            'getProduk'         => $this->M_produk->ambilData(),
            'cart'              => \Config\Services::cart()
        ];
        return view('/pelanggan/v_pelanggan',$data);
    }
//------------------------------- Shopping Cart ----------------------------------------

    public function cek()
    {
        $cart = \Config\Services::cart();
        $respon = $cart->contents();
        echo "<pre>";
        print_r($respon);
        echo "</pre>";
    }
    
    public function addCart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getVar('id'),
            'qty'     => 1,
            'price'   => $this->request->getVar('price'),
            'name'    => $this->request->getVar('name'),
            'options' => array(
                'berat' => $this->request->getVar('berat'),
                'foto_produk' => $this->request->getVar('foto_produk')
                )
            ));
            session()->setFlashdata('sukses','Barang berhasil dimasukkan ke keranjang belanja');
            return redirect()->to(base_url('Pelanggan'));
    }

    public function addCartdetail()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getVar('id'),
            'qty'     => 1,
            'price'   => $this->request->getVar('price'),
            'name'    => $this->request->getVar('name'),
            'options' => array(
                'berat' => $this->request->getVar('berat'),
                'foto_produk' => $this->request->getVar('foto_produk')
                )
            ));
            session()->setFlashdata('sukses','Barang berhasil dimasukkan ke keranjang belanja');
            return redirect()->to(base_url('Pelanggan/detailker/'. $this->request->getVar('id')));
    }

    public function clear()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('/pelanggan/kbelanja'));
    }

    public function kbelanja()
    {
        $data = [
            'title'     => 'Keranjang Belanja',
            'cart'      => \Config\services::cart()
        ];
        return view('pelanggan/v_kbelanja', $data);
    }

    public function hapusKeranjangId($id)
    {
        $cart = \Config\Services::cart();
        $cart->remove($id);

        session()->setFlashdata('hapus','1 barang telah dihapus dari keranjang');
        return redirect()->to(base_url('pelanggan/kbelanja'));
    }

    public function updateCart()
    {
        $cart = \Config\services::cart();
        $i = 1;
        foreach($cart->contents() as $produk){
            $cart->update(array(
                'rowid'   => $produk['rowid'],
                'qty'     => $this->request->getVar('qty'. $i++),
                ));
            }
            session()->setFlashdata('sukses','Keranjang berhasil diupdate');
            return redirect()->to(base_url('/pelanggan/kbelanja'));
        }

        public function detailker($id)
        {
            $data = [
                'title'     => 'Detail Produk',
                'getProduk' => $this->M_produk->ambilData($id)->getRow(),
                'cart'      => \Config\services::cart()
            ];

            return view('/pelanggan/v_detailker',$data);
        }
    }