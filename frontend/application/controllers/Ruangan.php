<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Ruangan_model');
	}

	public function index()
	{
		$data = $this->Ruangan_model->getAll();
		$this->load->view('ruangan_view', $data);
	}

	public function login()
	{
		$this->load->view('login_view');
	}

    public function tambahRuangan()
	{
        $this->load->view('tambah_ruangan_view');
	}

	public function tambahRuanganAction()
	{
		$this->Ruangan_model->insertRuangan();
        redirect('Ruangan');
	}

    public function editRuangan($kode_ruangan)
	{
		$data  = $this->Ruangan_model->getRuanganByKode($kode_ruangan);
        $this->load->view('edit_ruangan_view',$data);
	}

	public function editRuanganAction()
	{
		$kode_ruangan = $this->input->post('kode_ruangan');
		$this->Ruangan_model->updateRecord($kode_ruangan);
        redirect('Ruangan');
	}

    public function hapusRuangan($kode_ruangan)
	{
		$this->Ruangan_model->deleteRecord($kode_ruangan);
        redirect('Ruangan');
	}
}