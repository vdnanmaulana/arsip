<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Sell extends CI_Model
{

    public function save_data($data)
    {
        return $this->db->insert('sales', $data);
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('sales');
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }

    public function delete_data($id)
    {
        // Hapus data berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('sales');
    }

    public function get_data_by_id($id)
    {
        // Ambil data berdasarkan ID
        $this->db->where('id', $id);
        $query = $this->db->get('sales');
        return $query->row();
    }


    public function edit_data($id)
    {
        //edity data
        $query = $this->db->where("id", $id)->get("sales");
        return $query->row();
    }

    public function update_data($data, $id)
    {
        //update siswa
        return $this->db->update("sales", $data, $id);
    }
}
                        
/* End of file M_Sell.php */
