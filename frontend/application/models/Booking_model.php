<?php
use GuzzleHttp\Client;

class Booking_model extends CI_Model {

    private $client;

    public function __construct() {
        $this->client = new Client([
            // TODO: Tambahkan Base URL API
            'base_uri' => "http://localhost:8080/",
        ]);
    }
    

    public function getAll() {
        $response = $this->client->request('GET', '/api/booking', []);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function getbookingByKode($kode_booking) {
        $response = $this->client->request('GET', '/api/booking/?kode_booking='.$kode_booking, []);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function insertBooking() {

        $kode_ruangan = $this->input->post('ruangan');
        $date = $this->input->post('date');
        $no_booking = $kode_ruangan.$date;

        $time = $this->input->post('time_start');
        var_dump($time);

        $response = $this->client->request('POST', '/api/booking', [
            'form_params' => [

                    'kode_ruangan'  => $this->input->post('ruangan'),
                    'id_user'       => $this->session->userdata('id_user'),
                    'no_booking'    => $no_booking,
                    'agenda'        => $this->input->post('agenda'),
                    'date'          => $this->input->post('date'),
                    'time_start'    => $time,
                    'time_end'      => $this->input->post('time_end'),
            ]
        ]);
        var_dump($response);
    }

    public function updateRecord($kode_booking) {
        //$kode_booking = $this->input->post('kode_booking');
        $response = $this->client->request('PUT', '/api/booking/'.$kode_booking, [
            'form_params' => [
                    'nama_booking' => $this->input->post('nama_booking'),
                    'status' => 'AVAILABLE'
            ]
        ]);
    }

    public function deleteRecord($kode_booking) {
        $response = $this->client->request('DELETE', '/api/booking/'.$kode_booking, []);
    }
}