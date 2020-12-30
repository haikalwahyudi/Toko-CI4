<?php namespace App\Controllers;

class Pelanggan extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Pelanggan'
        ];
        return view('/pelanggan/v_pelanggan',$data);
    }
}