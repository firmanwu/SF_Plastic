<?php

class Materialsformulasmodel extends CI_Model {

    public function queryWeightByID($formula_material_id)
    {
        $this->db->select('formula_id, weight');
        $this->db->where('formula_material_id', $formula_material_id);
        $result = $this->db->get('formula_material');

        return $result->row_array();
    }
}

?>