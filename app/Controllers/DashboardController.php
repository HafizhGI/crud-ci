<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function dashboard()
    {
        $data = array(
            'title' => 'Dashboard ',
            'isi' => 'dashboard/dashboard',
            'menu' => 'Admin Dashboard'
        );
        return view('layout/wrapper', $data);
    }
}
