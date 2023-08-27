<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('log') != true){
            session()->setFlashdata('pesan2', 'Anda belum login. silahkan login terlebih dahulu!');
            return redirect()->to(base_url('AuthController/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('log') == true){
            return redirect()->to(base_url('/dashboard'));
        }
    }
}
