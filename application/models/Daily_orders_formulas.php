<?php

class Daily_orders_formulas extends CI_Model {

	public function get_formula_daily_order($formula_dorder_id)
    {
            $this->load->database();
            $this->db->select('*');
			$this->db->from('formula_daily_order');
			//$this->db->join('material', 'formula_material.material_id = material.material_id', 'left');
			$this->db->where('formula_dorder_id', $formula_dorder_id);
			$query = $this->db->get();
			//Filter and sort all parameters
			$display_params = array('formula_dorder_id', 'order_id', 'formula_id', 'processed', 'date', 'number');
            $required_params = array();
            foreach ($query->result() as $row) {
            	$array = json_decode(json_encode($row),true);
            	foreach ($array as $key => $value) {
		            if(in_array($key, $display_params)){
		            	$required_params[$key] = $value;
		            }
		        }
	        }
	        log_message("ERROR", "NEW ARRAY: ".print_r($required_params, true));
            return $query->result();
    }
	
}

?>