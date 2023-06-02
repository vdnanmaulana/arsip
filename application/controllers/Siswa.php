<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Siswa extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_siswa');
        
    }
    

    public function index()
    {
        $data = [
            'title' => "Data Siswa",
            'data_siswa' => $this->m_siswa->get_siswa()->result(),
        ];

        $this->load->view('inc/header', $data);
        $this->load->view('inc/nav', $data);
        $this->load->view('siswa', $data);
        $this->load->view('inc/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Data Siswa';

        $this->load->view('inc/header', $data);
        $this->load->view('inc/nav', $data);
        $this->load->view('add_siswa', $data);
        $this->load->view('inc/footer', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $where = array('id'=>$id);
        $data['siswa'] = $this->m_siswa->edit($id);

        $this->load->view('inc/header', $data);
        $this->load->view('inc/nav', $data);
        $this->load->view('edit_siswa', $data);
        $this->load->view('inc/footer', $data);
    }

    public function update()
{
    $id['id'] = $this->input->post("id");
    $nisn           = $this->input->post('nisn');
    $nama           = $this->input->post('nama');
    $tempat_lahir   = $this->input->post('tempat_lahir');
    $tanggal_lahir  = $this->input->post('tanggal_lahir');
    $kelas          = $this->input->post('kelas');
    $file_kk        = '';
    $file_kip       = '';

    // Cek apakah ada file KK yang diupload
    if (!empty($_FILES['file_kk']['name'])) {
        $file_kk = $nama . "_" . $_FILES['file_kk']['name'];

        $configKK['upload_path'] = './uploads/KK/';
        $configKK['allowed_types'] = 'gif|jpg|png';
        $configKK['file_name'] = $file_kk;

        $this->load->library('upload', $configKK);

        if (!$this->upload->do_upload('file_kk')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle error
        } else {
            $file_kk = $this->upload->data('file_name');
        }
    }

    // Cek apakah ada file KIP yang diupload
    if (!empty($_FILES['file_kip']['name'])) {
        $file_kip = $nama . "_" . $_FILES['file_kip']['name'];

        $configKIP['upload_path'] = './uploads/KIP/';
        $configKIP['allowed_types'] = 'gif|jpg|png';
        $configKIP['file_name']  = $file_kip;

        $this->load->library('upload', $configKIP);

        if (!$this->upload->do_upload('file_kip')) {
            $error = array('error' => $this->upload->display_errors());
            // Handle error
        } else {
            $file_kip = $this->upload->data('file_name');
        }
    }

    $data = array(
        'nisn'          => $nisn,
        'nama'          => $nama,
        'tempat_lahir'  => $tempat_lahir,
        'tanggal_lahir' => $tanggal_lahir,
        'kelas'         => $kelas,
    );

    // Update file KK jika ada
    if (!empty($file_kk)) {
        $data['file_kk'] = $file_kk;

        $kk_folder = './uploads/KK/' . $file_kk;
        move_uploaded_file($_FILES['file_kk']['tmp_name'], $kk_folder);
    }

    // Update file KIP jika ada
    if (!empty($file_kip)) {
        $data['file_kip'] = $file_kip;

        $kip_folder = './uploads/KIP/' . $file_kip;
        move_uploaded_file($_FILES['file_kip']['tmp_name'], $kip_folder);
    }

    // Panggil model untuk melakukan update data
    $this->m_siswa->update($data);

    $this->session->set_flashdata('success', 'Data berhasil diupdate!');
    
    redirect('siswa');
}


    public function save()
    {
        $nisn           = $this->input->post('nisn');
        $nama           = $this->input->post('nama');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $kelas          = $this->input->post('kelas');
        $file_kk        = $nama . "_" .$_FILES['file_kk']['name'];
        $file_kip       = $nama . "_" .$_FILES['file_kip']['name'];

        
        $configKK['upload_path'] = './uploads/KK/';
        $configKK['allowed_types'] = 'gif|jpg|png';
        $configKK['file_name'] = $file_kk;

        
        $configKIP['upload_path'] = './uploads/KIP/';
        $configKIP['allowed_types'] = 'gif|jpg|png';
        $configKIP['file_name']  = $file_kip;
        
        $this->load->library('upload', $configKK);
        if ( ! $this->upload->do_upload('file_kk')){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $file_kk = $this->upload->data('file_name');
            $data['file_kk'] = $file_kk;
        }

        $this->load->library('upload', $configKIP);
        if ( ! $this->upload->do_upload('file_kip')){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $file_kip = $this->upload->data('file_name');
            $data['file_kip'] = $file_kip;
        }
        

        $data = array(
            'nisn'          => $nisn,
            'nama'          => $nama,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'kelas'         => $kelas,
            'file_kk'       => $file_kk,
            'file_kip'      => $file_kip,
        );

        // Simpan file di folder kk
        
        
        $this->m_siswa->save($data);

        $this->session->set_flashdata('success', 'Yeay!!. Data berhasil disimpan!');
        

        $kk_folder = './uploads/KK/' . $file_kk;
        move_uploaded_file($_FILES['file_kk']['tmp_name'], $kk_folder);

        // Simpan file di folder kip
        $kip_folder = './uploads/KIP/' . $file_kip;
        move_uploaded_file($_FILES['file_kip']['tmp_name'], $kip_folder);
    
        redirect('siswa');
    }

    public function delete($id)
    {
        // Dapatkan informasi gambar dari database berdasarkan ID
        $file_kk = $this->db->get_where('tb_siswa', array('id' => $id))->row()->file_kk;
        $file_kip = $this->db->get_where('tb_siswa', array('id' => $id))->row()->file_kip;
        
        // Hapus gambar dari folder uploads
        unlink('./uploads/KK/'.$file_kk);
        unlink('./uploads/KIP/'.$file_kip);
        
        $where = array('id'=>$id);

        $this->m_siswa->delete_siswa($where);

        redirect('siswa');
    }
    

    
        
}
        
    /* End of file  Siswa.php */
        
                            