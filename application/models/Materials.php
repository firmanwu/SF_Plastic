<?php

class Materials extends CI_Model {

	public function get_formula_materials_sorted($formula_id)
    {
            $this->load->database();
            $this->db->select('material.label, material.material_id, formula_material.amount, formula_material.sort');
			$this->db->from('formula_material');
			$this->db->join('material', 'formula_material.material_id = material.material_id', 'left');
			$this->db->where('formula_material.formula_id', $formula_id);
			$query = $this->db->get();
			//Filter and sort all parameters
			$display_params = array('material_id', 'label', 'amount', 'sort');
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

    public function get_formula_name_from_id($formula_id)
    {
            $this->load->database();
            $this->db->select('name');
			$this->db->from('formula');
			$this->db->where('formula_id', $formula_id);
			$query = $this->db->get();
            return $query->result();
    }
	
}

?>