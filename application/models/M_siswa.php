<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class m_siswa extends CI_Model 
{
                        
    public function get_siswa()
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->order_by('id', 'asc');
        return $this->db->get();
    }

    public function save($data)
    {
        return $this->db->insert('tb_siswa', $data);
    }

    public function delete_siswa($id)
    {
        return $this->db->delete('tb_siswa', $id);
    }

    public function edit($id)
    {
        //edity data
        $query = $this->db->where("id", $id)->get("tb_siswa");
        return $query->row();
    }

    public function update($nisn, $data)
    {
        $this->db->where('nisn', $nisn);
        $this->db->update('tb_siswa', $data);
    }
                         
}
                        
/* End of file m_siswa.php */
    
                        