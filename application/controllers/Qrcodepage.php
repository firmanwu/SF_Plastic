<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcodepage extends CI_Controller {

	public function index()
	{
		//$this->load->library('Ciqrcode.php');
		$this->load->library('qrloader.php');

		$data = array();
		$data['page_title'] = 'how to integrate bootstrap theme/template in codeigniter';
		//$this->load->view('layout/header.php', $data);
		$this->load->view('bootstrap/example_01.php', $data);
		//$this->load->view('layout/footer.php', $data);
	}
}
