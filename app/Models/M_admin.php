<?php namespace App\Models;

use CodeIgniter\Model;


class M_admin extends Model
{
    protected $table = 'produk';
    public function ambilData($tabel)
    {
        return $this->findAll();
    }
}