<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('AirModel');
	}

	public function index()
	{
		$data['air'] = json_encode($this->AirModel->get_data());
		$this->load->view('index', $data);
	}

	public function get_data()
	{
		$data = $this->AirModel->get_data();
		$last_data = end($data);
		echo json_encode($last_data);
	}
}
