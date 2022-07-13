<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Records extends CI_Controller {

	public function index()
	{
		$this->load->model('Record_model');
		$data["records"] = $this->Record_model->getAllRecords();
		$this->load->view('my_records', $data);
	}

    public function add()
	{
        // $this->load->model('Record_model');
		// $this->Record_model->insertRecord();
        $this->load->view('add_records');
	}

	public function addAction()
	{
        $this->load->model('Record_model');
		$this->Record_model->insertRecord();
        //$this->load->view('add_records');
	}

    public function edit()
	{
        $this->load->model('Record_model');
		$data["record"] = $this->Record_model->updateRecord();
        $this->load->view('edit_records');
	}

    public function delete()
	{
        $this->load->model('Record_model');
		$data["records"] = $this->Record_model->deleteRecord();
        $this->load->view('my_records', $data);
	}
}