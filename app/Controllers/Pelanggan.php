<?php namespace App\Controllers;

use App\Models\M_pelanggan;
use App\Models\M_produk;
use App\Models\M_ongkir;
use App\Models\M_pembelian;
use App\Models\M_invoice;

class Pelanggan extends BaseController
{
    protected $M_pelanggan;
    protected $M_ongkir;
    protected $M_produk;
    protected $M_pembelian;
    protected $M_invoice;

    public function __construct()
    {
        $this->M_pelanggan = new M_pelanggan();
        $this->M_produk = new M_produk();
        $this->M_ongkir = new M_ongkir();
        $this->M_pembelian = new M_pembelian();
        $this->M_invoice = new M_invoice();
        
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

        public function checkout()
        {
            $data = [
                'title'     => 'Checkout',
                'cart'      => \Config\Services::cart(),
                'getOngkir' => $this->M_ongkir->ambilData(),
                'validation'    => \Config\Services::validation()
            ];
            return view('/pelanggan/v_checkout', $data);
        }

        public function addCheckout()
        {
            if(!$this->validate([
                'nama'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Nama harus diisi'
                    ]
                ],
                'telpon'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'No telpon harus diisi'
                    ]
                ],
                'ongkir'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Ongkir harus diisi'
                    ]
                ],
                'alamat'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Alamat harus diisi'
                    ]
                ]
            ])){
                return redirect()->to(base_url('/pelanggan/checkout'))->withInput();
            }
            //Invoice
            $this->M_invoice->simpan([
                'nama_pem'      => $this->request->getVar('nama'),
                'telpon'        => $this->request->getVar('telpon'),
                'telpon'        => $this->request->getVar('telpon'),
                'tgl_beli'      => date('Y-m-d H:i:s'),
                'batas_bayar'   => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'),
                                    date('m'), date('d') + 2, date('Y'))),
                'alamat'        => $this->request->getVar('alamat'),
                'aksi'        => 0
            ]);
                //mengambil id invoice terakhir
                $id_invoice = $this->M_invoice->insertID();

            $cart = \Config\Services::cart();
            foreach($cart->contents() as $value){
                $this->M_pembelian->simpan([
                    'id_invoice'      => $id_invoice,
                    'id_produk'      => $value['id'],
                    'tgl_pembelian'      => date('Y-m-d'),
                    'harga'      => $value['price'],
                    'jumlah'      => $value['qty'],
                    'id_ongkir'      => $this->request->getVar('ongkir'),
                    'total_pembelian'      => $value['subtotal']
                ]);
            }
            session()->setFlashdata('sukses','Pembelian Berhasil');
            return redirect()->to(base_url('/pelanggan/berhasil'));
        }
    }