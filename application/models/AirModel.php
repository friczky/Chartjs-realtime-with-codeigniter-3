<?php

class AirModel extends CI_Model
{
    public function get_data()
    {
        $query = $this->db->get('air');
        return $query->result_array();
    }

    public function get_by_month($bulan)
    {
        $query = $this->db->query("SELECT * FROM view_air where bulan = $bulan");
        return $query->result_array();
    }
}
