<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\InventroyModel;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

use App\Controllers\BaseController;

class InventoryController extends BaseController
{

    protected $session;
    protected $InventoryModel;
    public function __construct()
    {
        helper('form');
        $this->session = session();
        $this->InventoryModel = new InventroyModel();
    }
    public function inventory()
    {
        $data = array(
            'title' => 'Dashboard ',
            'isi' => 'inventory/inventory',
            'list' => $this->InventoryModel->getAll(),
            'menu' => 'Admin Inventory'
        );
        return view('layout/wrapper', $data);
    }
    public function dashboarduser()
    {
        $data = array(
            'title' => 'Dashboard ',
            'isi' => 'dashboard/dashboarduser',
            'menu' => 'User Dashboard'
        );
        return view('layout/wrapper', $data);
    }
    public function Add()
    {
        $data = array(
            'title' => 'Inventory',
            'isi' => 'inventory/inventory_add',
            'menu' => 'Inventory'
        );
        return view('layout/wrapper', $data);
    }
    public function Save()
    {
        $data = array(
            'name' => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('qty'),
            'price' => $this->request->getPost('price'),
        );

        $result = $this->InventoryModel->addNew($data);

        if ($result["status"] == "success") {
            $this->session->setFlashdata('message', '<div class="alert alert-success mt-5" role="alert">Data Added Successfuly</div>');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger mt-5" role="alert">' . $result['message'] . '</div>');
        }

        return redirect()->to(base_url('InventoryController/Add'));
    }
    public function Savecoba()
    {
        $data = array(
            'name' => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('qty'),
            'price' => $this->request->getPost('price'),
        );

        $result = $this->InventoryModel->addNew($data);

        if ($result["status"] == "success") {
            $this->session->setFlashdata('message', '<div class="alert alert-success mt-5" role="alert">Data Added Successfuly</div>');
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger mt-5" role="alert">' . $result['message'] . '</div>');
        }

        return redirect()->to(base_url('Dashboard/dashboarduser'));
    }
    public function Remove($id)
    {
        $api_url = 'http://localhost:9191/delete/' . $id;
        $curl = curl_init($api_url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, true);

        if ($result && $result["status"] == "success") {
            $this->session->setFlashdata('message', '<div class="alert alert-success mt-5" role="alert">Data Deleted Successfully</div>');
        } else {
            $errorMessage = isset($result['message']) ? $result['message'] : 'An error occurred while deleting data.';
            $this->session->setFlashdata('message', '<div class="alert alert-danger mt-5" role="alert">' . $errorMessage . '</div>');
        }

        return redirect()->to(base_url('InventoryController/inventory'));
    }
    public function editPage()
    {
        $id = $this->request->uri->getSegment(3);

        $InventoryModel = new InventroyModel();

        $data = array(
            'title' => 'Inventory',
            'isi' => 'inventory/inventory_edit',
            'menu' => 'Inventory'
        );
        $data["product"] = $InventoryModel->loadById($id);


        return view('layout/wrapper', $data);
    }

    public function edit()
    {
        $InventoryModel = new InventroyModel();
        $data = [
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('qty'),
            'price' => $this->request->getPost('price'),
        ];

        $result = $InventoryModel->updateData($data['id'], $data);

        if ($result["status"] == "success") {
            session()->setFlashdata('message', '<div class="alert alert-success mt-5" role="alert">Data Updated Successfully</div>');
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger mt-5" role="alert">' . $result['message'] . '</div>');
        }

        return redirect()->to(base_url('InventoryController/inventory'));
    }
}
