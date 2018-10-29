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
		//$this->load->model('checkmaterials');
		$this->load->model('daily_orders_formulas_model');
		parse_str(file_get_contents("php://input"),$post_vars);
		log_message("ERROR", "VALIDATION INFO PASS FROM AJAX 2: ".print_r($post_vars,true));

		$data_array = json_decode($post_vars['info']);
		log_message("ERROR", "VALIDATION INFO PASS FROM AJAX 3: ".print_r($data_array,true));
		$primary_key = $data_array[2];
		$validation_array = json_encode($data_array[0]);
		log_message("ERROR", "VALIDATION INFO PASS FROM AJAX 4: ".print_r($validation_array,true));
		$material_info_array = $data_array[1];
		$material_info_array = json_decode($material_info_array, true);
		$material_id = $material_info_array['material_id']; //for later usse
		$material_info_array['weight'] = 99999;
		$material_info_array = json_encode($material_info_array);
		log_message("ERROR", "VALIDATION INFO PASS FROM AJAX 5: ".print_r($material_info_array,true));

		//We get from DB current values for multivalidation and material info
		$current_multi_validation_data = $this->daily_orders_formulas_model->get_multi_validation_data ($primary_key);
		log_message("ERROR", "CURRENT MULTI VALIDATION DATA: ".print_r($current_multi_validation_data,true));
		$current_material_info_data =$this->daily_orders_formulas_model->get_material_info_data ($primary_key);
		log_message("ERROR", "CURRENT MATERIAL INFO DATA: ".print_r($current_material_info_data,true));

		//We must replace the info for the material we are working with in both json objects
		$current_multi_validation_data_array = json_decode($current_multi_validation_data['multi_validation'], true);
		log_message("ERROR", "VALIDATION INFO PASS FROM AJAX 6: ".print_r($current_multi_validation_data_array,true));
		$current_multi_validation_data_array[$material_id] = json_decode($validation_array,true);
		log_message("ERROR", "VALIDATION INFO PASS FROM AJAX 7: ".print_r($current_multi_validation_data_array,true));
		$final_multi_validation_json = json_encode($current_multi_validation_data_array);
		log_message("ERROR", "VALIDATION INFO PASS FROM AJAX 8: ".print_r($final_multi_validation_json,true));


		$current_material_info_data = json_decode($current_material_info_data['material_info'], true);
		log_message("ERROR", "MAT INFO INFO PASS FROM AJAX 6: ".print_r($current_material_info_data,true));
		$current_material_info_data[$material_id] = json_decode($material_info_array,true);
		log_message("ERROR", "MAT INFO INFO PASS FROM AJAX 7: ".print_r($current_material_info_data,true));
		$final_material_data_json = json_encode($current_material_info_data);
		log_message("ERROR", "MAT INFO INFO PASS FROM AJAX 8: ".print_r($final_material_data_json,true));


		//We update the DB with the new values
		$this->daily_orders_formulas_model->update_multi_validation_column ($final_multi_validation_json,$primary_key);
		$this->daily_orders_formulas_model->update_material_info_column ($final_material_data_json,$primary_key);

	}


}
