<?php

class Formulas extends CI_Model {

    public function increaseTotalWeightByID($formula_id, $weight)
    {
        $this->db->set('totalWeight', 'totalWeight + ' . $weight, FALSE);
        $this->db->where('formula_id', $formula_id);
        $this->db->update('formula');
    }

    public function decreaseTotalWeightByID($formula_id, $weight)
    {
        $this->db->set('totalWeight', 'totalWeight + ' . (-$weight), FALSE);
        $this->db->where('formula_id', $formula_id);
        $this->db->update('formula');
    }
}

?>