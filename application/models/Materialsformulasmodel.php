<?php

class Materialsformulasmodel extends CI_Model {

    public function queryWeightByID($formula_material_id)
    {
        $this->db->select('formula_id, weight');
        $this->db->where('formula_material_id', $formula_material_id);
        $result = $this->db->get('formula_material');

        return $result->row_array();
    }

    public function queryMaterialsByFormIdOrderded($formula_id)
    {
        $this->db->select('material_id');
        $this->db->where('formula_id', $formula_id);
        $this->db->order_by("order","asc");
        $result = $this->db->get('formula_material');
        return $result->result_array();
    }
}

?>