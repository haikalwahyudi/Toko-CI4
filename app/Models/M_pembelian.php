<?php namespace App\Models;

use CodeIgniter\Model;

class M_pembelian extends Model
{
    protected $table = 'pembelian';
    public function ambilData($id_pembelian = false)
    {
        if($id_pembelian === false){
            return $this->findAll();
        }
        return $this->getWhere(['id_pembelian' => $id_pembelian]);
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