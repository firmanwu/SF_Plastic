<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootstrap extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['page_title'] = 'how to integrate bootstrap theme/template in codeigniter';
		$this->load->view('layout/header.php', $data);
		$this->load->view('bootstrap/basic_example.php', $data);
		$this->load->view('layout/footer.php', $data);
	}
}
