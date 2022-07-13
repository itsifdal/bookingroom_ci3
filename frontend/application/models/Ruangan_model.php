<?php
use GuzzleHttp\Client;

class Ruangan_model extends CI_Model {

    private $client;

    public function __construct() {
        $this->client = new Client([
            // TODO: Tambahkan Base URL API
            'base_uri' => "http://localhost:8080/",
        ]);
    }

    public function getAll() {
        $response = $this->client->request('GET', '/api/ruangan', []);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getRuanganByKode($kode_ruangan) {
        $response = $this->client->request('GET', '/api/ruangan/?kode_ruangan='.$kode_ruangan, []);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function insertRuangan() {

        $response = $this->client->request('POST', '/api/ruangan', [
            'form_params' => [

                    'kode_ruangan' => $this->input->post('kode_ruangan'),
                    'nama_ruangan' => $this->input->post('nama_ruangan'),
                    'status' => 'AVAILABLE'   
            ]
        ]);
    }

    public function updateRecord($kode_ruangan) {
        //$kode_ruangan = $this->input->post('kode_ruangan');
        $response = $this->client->request('PUT', '/api/ruangan/'.$kode_ruangan, [
            'form_params' => [
                    'nama_ruangan' => $this->input->post('nama_ruangan'),
                    'status' => 'AVAILABLE'
            ]
        ]);
    }

    public function deleteRecord($kode_ruangan) {
        $response = $this->client->request('DELETE', '/api/ruangan/'.$kode_ruangan, []);
    }
}