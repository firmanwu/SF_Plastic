<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produce_mixture extends CI_Controller {

	public function index( $material_id = NULL )
	{
		$data = array();
		$this->load->library('qrloader.php');
		$material_id_segment = $this->uri->segment(2);
		$this->load->model('materials');
		$this->load->model('daily_orders_formulas');

		$data['query_dorder_formula'] = $this->daily_orders_formulas->get_formula_daily_order($material_id_segment);
		$formula_info = json_decode(json_encode($data['query_dorder_formula'][0]), true);
		$data['material_id'] = $material_id_segment;
		$data['query'] = $this->materials->get_formula_materials_sorted($formula_info['formula_id']);
		$data['formula_name'] = $this->materials->get_formula_name_from_id($formula_info['formula_id']);	
		$data['page_title'] = 'Produce Mixtures';
		$this->load->view('layout/header.php', $data);
		$this->load->view('bootstrap/produce_mixture.php', $data);
		$this->load->view('layout/footer.php', $data);
	}
}
