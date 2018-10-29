<?php

class Daily_orders_formulas_model extends CI_Model {

    public function update_multi_validation_column ($json_string,$primary_key){
        $data = array(
            'multi_validation' => $json_string,
        );
    	$this->db->where('order_id', $primary_key);
    	$this->db->update('formula_daily_order', $data);
    }

    public function update_material_info_column ($json_string,$primary_key){
        $data = array(
            'material_info' => $json_string,
        );
        $this->db->where('order_id', $primary_key);
        $this->db->update('formula_daily_order', $data);
    }

    public function get_multi_validation_data ($primary_key){
        $this->db->select('multi_validation');
        $this->db->where('order_id', $primary_key);
        $result = $this->db->get('formula_daily_order');

        return $result->row_array();
    }

    public function get_material_info_data ($primary_key){
        
        $this->db->select('material_info');
        $this->db->where('order_id', $primary_key);
        $result = $this->db->get('formula_daily_order');

        return $result->row_array();
    }
	
}

?>