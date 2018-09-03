<?php

class Materials extends CI_Model {

	public function get_formula_materials_sorted($formula_id)
    {
            $this->load->database();
            $this->db->select('*');
			$this->db->from('formula_material');
			$this->db->join('material', 'formula_material.material_id = material.material_id', 'left');
			$this->db->where('formula_material.formula_id', $formula_id);
			$query = $this->db->get();
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