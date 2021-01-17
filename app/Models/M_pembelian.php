<?php namespace App\Models;

use CodeIgniter\Model;

class M_pembelian extends Model
{
    protected $table = 'pembelian';
    public function ambilData($id_pembelian = false)
    {
        if($id_pembelian === false){
            // return $this->findAll();
            return $this->db->table($this->table)
            ->join('invoice','invoice.id_invoice = pembelian.id_invoice')
            ->join('produk','produk.id_produk = pembelian.id_produk')
            ->join('ongkir','ongkir.id_ongkir = pembelian.id_ongkir')
            ->get()->getResultArray();
        }
        return $this->getWhere(['id_pembelian' => $id_pembelian]);
    }

    public function ambilIdInvoice($idInvoice)
    {
        return $this->db->table('invoice')
        ->getWhere(['id_invoice' => $idInvoice]);
    }

    public function ambilIdPembelian($idInvoice)
    {
        return $this->db->table('pembelian')
        ->join('produk','produk.id_produk = pembelian.id_produk')
        ->join('ongkir','ongkir.id_ongkir = pembelian.id_ongkir')
        ->getWhere(['id_invoice' => $idInvoice]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id_pembelian)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_pembelian' => $id_pembelian]);
    }
    public function ubah($data, $id_pembelian)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_pembelian', $id_pembelian);
        return $ubah->update($data);
    }
}