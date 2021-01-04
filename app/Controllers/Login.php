<?php namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data['title'] = 'Login';
        return view('/admin/v_login',$data);
    }

    public function registrasiAdmin()
    {
        $data['title'] = "Registrasi";
        return view('/admin/v_registrasi', $data);
    }

    public function registrasiUser()
    {
        $data['title'] = "Registrasi";
        return view('/pelanggan/v_registerUser', $data);
    }

    public function loginUser()
    {
        $data['title'] = 'Login User';
        return view('pelanggan/v_loginUser',$data);
    }
}