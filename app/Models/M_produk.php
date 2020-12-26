<?php namespace App\Models;

use CodeIgniter\Model;

class M_Produk extends Model
{
    protected $table = 'produk';
    public function ambilData($id_produk = false)
    {
        if($id_produk === false){
            return $this->findAll();
        }
        return $this->getWhere(['id_produk' => $id_produk]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_produk' => $id]);
    }
    public function ubah($data, $id)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_produk', $id);
        return $ubah->update($data);
    }
}