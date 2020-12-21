<?php namespace App\Controllers;

class Admin extends BaseController
{
//========= Halaman Menu ==========
    public function index()
    {
        return view('admin/v_home');
    }
    public function kategori()
    {
        return view('admin/v_kategori');
    }
}