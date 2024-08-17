<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MainController extends BaseController
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('app.baseURL');
    }

    public function index()
    {
        try {
            // Fetch all projects and locations
            $client = \Config\Services::curlrequest();
            $proyekResponse = $client->get($this->apiUrl . 'proyek');
            $lokasiResponse = $client->get($this->apiUrl . 'lokasi');

            $data['proyek'] = json_decode($proyekResponse->getBody(), true);
            $data['lokasi'] = json_decode($lokasiResponse->getBody(), true);
        } catch (\Exception $e) {
            // Handle error, log it or show a user-friendly message
            $data['proyek'] = [];
            $data['lokasi'] = [];
        }

        return view('home', $data);
    }

    public function addLokasi()
    {
        return view('lokasi_form');
    }

    public function createLokasi()
    {
        try {
            $client = \Config\Services::curlrequest();

            $data = [
                'namaLokasi' => $this->request->getPost('nama_lokasi'),
                'negara' => $this->request->getPost('negara'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kota' => $this->request->getPost('kota'),
            ];

            $client->post($this->apiUrl . 'lokasi', [
                'json' => $data,
            ]);
        } catch (\Exception $e) {
            // Handle error, log it or show a user-friendly message
        }

        return redirect()->to('/');
    }

    public function addProyek()
    {
        try {
            // Fetch all locations for dropdown
            $client = \Config\Services::curlrequest();
            $lokasiResponse = $client->get($this->apiUrl . 'lokasi');
            $data['lokasi'] = json_decode($lokasiResponse->getBody(), true);
        } catch (\Exception $e) {
            // Handle error, log it or show a user-friendly message
            $data['lokasi'] = [];
        }

        return view('proyek_form', $data);
    }

    public function createProyek()
{
    $client = \Config\Services::curlrequest();

    $data = [
        'namaProyek' => $this->request->getPost('nama_proyek'),
        'client' => $this->request->getPost('client'),
        'tglMulai' => $this->request->getPost('tgl_mulai'),
        'tglSelesai' => $this->request->getPost('tgl_selesai'),
        'pimpinanProyek' => $this->request->getPost('pimpinan_proyek'),
        'keterangan' => $this->request->getPost('keterangan'),
        'lokasiSet' => array_map(function($id) {
            return ['id' => $id];
        }, $this->request->getPost('lokasi') ?? [])
    ];

    $client->post($this->apiUrl . 'proyek', [
        'json' => $data,
    ]);

    return redirect()->to('/');
}


    public function editLokasi($id)
    {
        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get($this->apiUrl . 'lokasi/' . $id);

            $data['lokasi'] = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            // Handle error, log it or show a user-friendly message
            $data['lokasi'] = null;
        }

        return view('lokasi_form', $data);
    }

    public function updateLokasi($id)
    {
        try {
            $client = \Config\Services::curlrequest();

            $data = [
                'namaLokasi' => $this->request->getPost('nama_lokasi'),
                'negara' => $this->request->getPost('negara'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kota' => $this->request->getPost('kota'),
            ];

            $client->put($this->apiUrl . 'lokasi/' . $id, [
                'json' => $data,
            ]);
        } catch (\Exception $e) {
            // Handle error, log it or show a user-friendly message
        }

        return redirect()->to('/');
    }

    public function deleteLokasi($id)
    {
        try {
            $client = \Config\Services::curlrequest();
            $client->delete($this->apiUrl . 'lokasi/' . $id);
        } catch (\Exception $e) {
            // Handle error, log it or show a user-friendly message
        }

        return redirect()->to('/');
    }

    public function editProyek($id)
    {
        try {
            $client = \Config\Services::curlrequest();

            // Fetch the specific project
            $proyekResponse = $client->get($this->apiUrl . 'proyek/' . $id);
            $data['proyek'] = json_decode($proyekResponse->getBody(), true);

            // Fetch all locations for dropdown
            $lokasiResponse = $client->get($this->apiUrl . 'lokasi');
            $data['lokasi'] = json_decode($lokasiResponse->getBody(), true);
        } catch (\Exception $e) {
            // Handle error, log it or show a user-friendly message
            $data['proyek'] = null;
            $data['lokasi'] = [];
        }

        return view('proyek_form', $data);
    }

    public function updateProyek($id)
    {
        $client = \Config\Services::curlrequest();
    
        $data = [
            'namaProyek' => $this->request->getPost('nama_proyek'),
            'client' => $this->request->getPost('client'),
            'tglMulai' => $this->request->getPost('tgl_mulai'),
            'tglSelesai' => $this->request->getPost('tgl_selesai'),
            'pimpinanProyek' => $this->request->getPost('pimpinan_proyek'),
            'keterangan' => $this->request->getPost('keterangan'),
            'lokasiSet' => array_map(function($id) {
                return ['id' => $id];
            }, $this->request->getPost('lokasi') ?? [])
        ];
    
        $response = $client->request('put', $this->apiUrl . 'proyek/' . $id, [
            'json' => $data,
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);
    
        if ($response->getStatusCode() != 200) {
            throw new \Exception('Error updating project: ' . $response->getBody());
        }
    
        return redirect()->to('/');
    }
    
    public function deleteProyek($id)
    {
        try {
            $client = \Config\Services::curlrequest();
            $client->delete($this->apiUrl . 'proyek/' . $id);
        } catch (\Exception $e) {
            // Handle error, log it or show a user-friendly message
        }

        return redirect()->to('/');
    }
}
