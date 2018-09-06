<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootstrap extends CI_Controller {

	public function index( $material_id = NULL )
	{
		$data = array();
		//$this->load->library('Ciqrcode.php');
		$this->load->library('qrloader.php');
		$material_id_segment = $this->uri->segment(2);
		$this->load->model('materials');

		$data['material_id'] = $material_id_segment;
		$data['query'] = $this->materials->get_formula_materials_sorted($material_id_segment);
		//log_message("ERROR", "QUERY: ".print_r($data['query'],true));
		$data['formula_name'] = $this->materials->get_formula_name_from_id($material_id_segment);	
		$data['page_title'] = 'how to integrate bootstrap theme/template in codeigniter';
		$this->load->view('layout/header.php', $data);
		$this->load->view('bootstrap/basic_example.php', $data);
		$this->load->view('layout/footer.php', $data);
	}
}
