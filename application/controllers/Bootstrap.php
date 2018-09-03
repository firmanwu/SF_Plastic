<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootstrap extends CI_Controller {

	public function index()
	{
		$data = array();
		//$this->load->library('Ciqrcode.php');
		$this->load->library('qrloader.php');

		$this->load->model('materials');
		$data['query'] = $this->materials->get_formula_materials_sorted(1);	
		$data['formula_name'] = $this->materials->get_formula_name_from_id(1);	
		$data['page_title'] = 'how to integrate bootstrap theme/template in codeigniter';
		$this->load->view('layout/header.php', $data);
		$this->load->view('bootstrap/basic_example.php', $data);
		$this->load->view('layout/footer.php', $data);
	}
}
