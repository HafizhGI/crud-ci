<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\HTTP\Client;

class InventroyModel extends Model
{
    public function getAll()
    {
        $api_url = 'http://localhost:9191/products';

        // Read JSON file
        $json_data = file_get_contents($api_url);

        // Decode JSON data into PHP array
        return json_decode($json_data);
    }

    public function addNew($data)
    {
        $api_url = 'http://localhost:9191/addProduct';

        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('post', $api_url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode($data)
            ]);

            $responseBody = $response->getBody();
            $result = [
                'status' => 'success',
                'message' => 'Response: ' . $responseBody
            ];

            return $result;
        } catch (\Exception $e) {
            $result = [
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage()
            ];
            return $result;
        }
    }
    public function loadById($id)
    {
        $api_url = 'http://localhost:9191/productById/' . $id;
        $client = \Config\Services::curlrequest();
        $response = $client->get($api_url);
        $data = json_decode($response->getBody(), true);

        return $data;
    }
    public function updateData($data)
    {
        $api_url = 'http://localhost:9191/update';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->put($api_url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => $data
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                $result = [
                    'status' => 'success',
                    'message' => 'Data updated successfully.'
                ];
                return $result;
            } else {
                $result = [
                    'status' => 'error',
                    'message' => 'Unexpected response: ' . $statusCode
                ];
                return $result;
            }
        } catch (\Exception $e) {
            $result = [
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage()
            ];
            return $result;
        }
    }
}
