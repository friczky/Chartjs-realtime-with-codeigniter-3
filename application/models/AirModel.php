<?php

class AirModel extends CI_Model
{
    public function get_data()
    {
        $query = $this->db->get('air');
        return $query->result_array();
    }
}
