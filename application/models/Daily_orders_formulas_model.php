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
	
}

?>