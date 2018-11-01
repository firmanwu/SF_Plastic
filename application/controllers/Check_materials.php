<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_materials extends CI_Controller {

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
		$data['page_title'] = '原料準備作業';
		$this->load->view('layout/header.php', $data);
		$this->load->view('bootstrap/check_materials.php', $data);
		$this->load->view('layout/footer.php', $data);
	}

	public function update_validation_info(){
		$this->load->model('daily_orders_formulas_model');
		parse_str(file_get_contents("php://input"),$post_vars);

		$data_array = json_decode($post_vars['info']);
		$primary_key = $data_array[2];
		$validation_array = json_encode($data_array[0]);
		$material_info_array = $data_array[1];
		$material_info_array = json_decode($material_info_array, true);
		$material_id = $material_info_array['material_id']; //for later usse
		$material_info_array['weight'] = 99999;
		$material_info_array = json_encode($material_info_array);

		//We get from DB current values for multi_validation and material_info
		$current_multi_validation_data = $this->daily_orders_formulas_model->get_multi_validation_data ($primary_key);
		$current_material_info_data =$this->daily_orders_formulas_model->get_material_info_data ($primary_key);

		//We must replace the info for the material we are working with in both json objects
		//First multi_validation
		$current_multi_validation_data_array = json_decode($current_multi_validation_data['multi_validation'], true);
		$current_multi_validation_data_array[$material_id] = json_decode($validation_array,true);
		$final_multi_validation_json = json_encode($current_multi_validation_data_array);

		//Then material_info
		$current_material_info_data = json_decode($current_material_info_data['material_info'], true);
		$current_material_info_data[$material_id] = json_decode($material_info_array,true);
		$final_material_data_json = json_encode($current_material_info_data);


		//We update the DB with the new values
		$this->daily_orders_formulas_model->update_multi_validation_column ($final_multi_validation_json,$primary_key);
		$this->daily_orders_formulas_model->update_material_info_column ($final_material_data_json,$primary_key);

	}

	public function update_material_info(){
		$this->load->model('daily_orders_formulas_model');
		parse_str(file_get_contents("php://input"),$post_vars);

		$data_array = json_decode($post_vars['info']);
		$primary_key = $data_array[3];
		$validation_array = json_encode($data_array[0]);
		$material_id = $data_array[2]; //for later usse
		$material_weight = $data_array[1];

		//We get from DB current values for multi_validation and material_info
		$current_multi_validation_data = $this->daily_orders_formulas_model->get_multi_validation_data ($primary_key);
		$current_material_info_data =$this->daily_orders_formulas_model->get_material_info_data ($primary_key);

		//We must replace the info for the material we are working with in both json objects
		//First multi_validation
		$current_multi_validation_data_array = json_decode($current_multi_validation_data['multi_validation'], true);
		$current_multi_validation_data_array[$material_id] = json_decode($validation_array,true);
		$final_multi_validation_json = json_encode($current_multi_validation_data_array);

		//Then material_info
		$current_material_info_data = json_decode($current_material_info_data['material_info'], true);
		$mat_data_for_id = $current_material_info_data[$material_id];
		$mat_data_for_id['weight'] = $material_weight;
		$current_material_info_data[$material_id] = $mat_data_for_id;
		$final_material_data_json = json_encode($current_material_info_data);

		//We update the DB with the new values
		$this->daily_orders_formulas_model->update_multi_validation_column ($final_multi_validation_json,$primary_key);
		$this->daily_orders_formulas_model->update_material_info_column ($final_material_data_json,$primary_key);

	}

	public function generate_qr_code(){
		$this->load->library('qrloader.php');
		parse_str(file_get_contents("php://input"),$post_vars);
		$material_info_array = json_decode($post_vars['info'],true);
		$final_info_json = json_encode($material_info_array);
		QRcode::png($final_info_json, 'test.png', 'M', 10, 2);
		echo 200;
	}

	public function get_order_data($order_id){
		$this->load->model('daily_orders_formulas');
		return $this->daily_orders_formulas->get_formula_daily_order($order_id);
	}


}
