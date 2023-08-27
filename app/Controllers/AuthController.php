<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use App\Models\AuthModel;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class AuthController extends BaseController
{
    protected $AuthModel;
    public function __construct()
    {
        helper('form');
        $this->AuthModel = new AuthModel();
    }
    public function login()
    {
        $data = array(
            'title' => 'Login',
            'menu' => 'log-in'
        );
        return view('login/login', $data);
    }
    function cek_login()
    {
        if ($this->validate([
            'name_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
        ])) {
            $user_name = $this->request->getPost('name_user');
            $password = md5($this->request->getPost('password'));
            $cek = $this->AuthModel->cek_login($user_name, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('username', $cek['user_name']);
                session()->set('password', $cek['password']);
                session()->set('access', $cek['access']);
                if (session()->get('access') == 'Administrasi') {
                    return redirect()->to(base_url('/dashboard'));
                } elseif (session()->get('access') == 'user') {
                    return redirect()->to(base_url('/dashboarduser'));
                } else {
                    session()->setFlashdata('pesan2', 'Login gagal! Username atau Password Salah');
                    return redirect()->to(base_url('AuthController/login'));
                }
            } else {
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('AuthController/login'));
            }
        }
    }
    function logout()
    {
        session()->remove('log');
        session()->remove('access');
        session()->setFlashdata('pesan', 'logout success..!');
        return redirect()->to(base_url('AuthController/login'));
    }
}
