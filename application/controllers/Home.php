<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array();
		$data['page_title'] = 'Dashboard page for centralize control';
		//$this->load->view('layout/header.php', $data);
		$this->load->view('bootstrap/home3.php', $data);
		//$this->load->view('layout/footer.php', $data);
	}
}
