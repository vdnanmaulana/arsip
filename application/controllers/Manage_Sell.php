<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Sell extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Sell');
	}


	public function index()
	{
		$data['title'] = 'Kelola Penjualan';
		$data = array(
			'data_sell' => $this->M_Sell->get_data()->result()
		);
		$this->load->view('inc/header', $data);
		$this->load->view('inc/nav', $data);
		$this->load->view('manage_sell', $data);
		$this->load->view('inc/footer', $data);
	}

	public function add()
	{
		$data['title'] = 'Tambah Data';
		$this->load->view('inc/header', $data);
		$this->load->view('inc/nav', $data);
		$this->load->view('sell/add_sell', $data);
		$this->load->view('inc/footer', $data);
	}

	public function delete($id)
	{
		// Mengambil data gambar berdasarkan ID
		$data = $this->M_Sell->get_data_by_id($id);

		if ($data) {
			// Lokasi penyimpanan gambar
			$upload_path = './uploads/';

			// Mendapatkan nama file gambar
			$image = $data->image;

			// Menghapus data dari database
			$this->M_Sell->delete_data($id);

			// Menghapus file gambar
			if ($image != '') {
				$file_path = $upload_path . $image;
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}

			$this->session->set_flashdata('success', '
            <div class="alert alert-success">
                <div class="d-flex justify-content-start">
                    <span class="alert-icon m-r-20 font-size-30">
                        <i class="anticon anticon-check-circle"></i>
                    </span>
                    <div>
                        <h5 class="alert-heading">Sukses</h5>
                        <p>Data berhasil dihapus.</p>
                    </div>
                </div>
            </div>
        ');
		} else {
			$this->session->set_flashdata('error', '
            <div class="alert alert-danger">
                <div class="d-flex justify-content-start">
                    <span class="alert-icon m-r-20 font-size-30">
                        <i class="anticon anticon-close-circle"></i>
                    </span>
                    <div>
                        <h5 class="alert-heading">Error</h5>
                        <p>Data tidak ditemukan.</p>
                    </div>
                </div>
            </div>
        ');
		}

		// Redirect ke halaman manage_sell
		redirect('manage_sell');
	}


	public function save_data()
	{

		//get data dari form
		$customer_name            	= $this->input->post('customer_name');
		$customer_email            	= $this->input->post('customer_email');
		$username            		= $this->input->post('username');
		$password            		= $this->input->post('password');
		$phone            			= $this->input->post('phone');
		$ecommerce_acc            	= $this->input->post('ecommerce_acc');
		$id_category            	= $this->input->post('id_category');
		$id_type           			= $this->input->post('id_type');
		$start_date            		= $this->input->post('start_date');
		$exp_date            		= $this->input->post('exp_date');
		$description            	= $this->input->post('description');
		$status            			= $this->input->post('status');

		// Konfigurasi upload image
		$config['upload_path'] = './uploads/'; // Lokasi penyimpanan image
		$config['allowed_types'] = 'gif|jpg|png'; // Jenis file yang diperbolehkan
		$config['max_size'] = 1024; // Ukuran maksimum file (dalam kilobita)

		// Load library File Upload
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			// Jika berhasil diunggah
			$image_data = $this->upload->data();
			$image = $image_data['file_name'];


			$data = array(
				'customer_name'		=> $customer_name,
				'customer_email'	=> $customer_email,
				'username'         	=> $username,
				'password'         	=> $password,
				'phone'         	=> $phone,
				'ecommerce_acc'		=> $ecommerce_acc,
				'id_category'		=> $id_category,
				'id_type' 			=> $id_type,
				'start_date'        => $start_date,
				'exp_date'         	=> $exp_date,
				'description'       => $description,
				'status'         	=> $status,
				'image'				=> $image,
			);



			//insert data via model
			$this->M_Sell->save_data($data);
			$this->session->set_flashdata('success', '
			<div class="alert alert-success">
				<div class="d-flex justify-content-start">
					<span class="alert-icon m-r-20 font-size-30">
						<i class="anticon anticon-check-circle"></i>
					</span>
					<div>
						<h5 class="alert-heading">Sukses</h5>
						<p>Data berhasil diupload.</p>
					</div>
				</div>
			</div>
			');
			//redirect ke controller siswa
			redirect('manage_sell');
		} else {
			// Jika gagal mengunggah gambar
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', '
			<div class="alert alert-danger">
				<div class="d-flex justify-content-start">
					<span class="alert-icon m-r-20 font-size-30">
						<i class="anticon anticon-close-circle"></i>
					</span>
					<div>
						<h5 class="alert-heading">Error</h5>
						<p>Data tidak berhasil disimpan.</p>
					</div>
				</div>
			</div>
		');
			redirect('manage_sell/add');
		}
	}

	public function edit($id)
	{

		//get ID dari URL segment ke 3
		$id = $this->uri->segment(3);

		$data = array(
			'data_sell' => $this->M_Sell->edit_data($id)
		);

		//load view
		$this->load->view('inc/header', $data);
		$this->load->view('inc/nav', $data);
		$this->load->view('sell/edit_sell', $data);
		$this->load->view('inc/footer', $data);
	}

	public function update()
	{

		//get data dari form
		$customer_name            	= $this->input->post('customer_name');
		$customer_email            	= $this->input->post('customer_email');
		$username            		= $this->input->post('username');
		$password            		= $this->input->post('password');
		$phone            			= $this->input->post('phone');
		$ecommerce_acc            	= $this->input->post('ecommerce_acc');
		$id_category            	= $this->input->post('id_category');
		$id_type           			= $this->input->post('id_type');
		$start_date            		= $this->input->post('start_date');
		$exp_date            		= $this->input->post('exp_date');
		$description            	= $this->input->post('description');
		$status            			= $this->input->post('status');
		// Konfigurasi upload image
		$config['upload_path'] = './uploads/'; // Lokasi penyimpanan image
		$config['allowed_types'] = 'gif|jpg|png'; // Jenis file yang diperbolehkan
		$config['max_size'] = 1024; // Ukuran maksimum file (dalam kilobita)

		// Load library File Upload
		$this->load->library('upload', $config);

		// Check if a file is selected for upload
		if ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
			// A file is selected for upload
			if ($this->upload->do_upload('image')) {
				// Jika berhasil diunggah
				$image_data = $this->upload->data();
				$image = $image_data['file_name'];

				$data['image'] = $image;
			} else {
				// Jika gagal mengunggah gambar
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', '
            <div class="alert alert-danger">
                <div class="d-flex justify-content-start">
                    <span class="alert-icon m-r-20 font-size-30">
                        <i class="anticon anticon-close-circle"></i>
                    </span>
                    <div>
                        <h5 class="alert-heading">Error</h5>
                        <p>Data tidak berhasil disimpan.</p>
                    </div>
                </div>
            </div>
        ');
				redirect('manage_sell');
			}
		}

		//get data dari form
		$customer_name = $this->input->post('customer_name');
		$customer_email = $this->input->post('customer_email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$phone = $this->input->post('phone');
		$ecommerce_acc = $this->input->post('ecommerce_acc');
		$id_category = $this->input->post('id_category');
		$id_type = $this->input->post('id_type');
		$start_date = $this->input->post('start_date');
		$exp_date = $this->input->post('exp_date');
		$description = $this->input->post('description');
		$status = $this->input->post('status');

		$data = array(
			'customer_name' => $customer_name,
			'customer_email' => $customer_email,
			'username' => $username,
			'password' => $password,
			'phone' => $phone,
			'ecommerce_acc' => $ecommerce_acc,
			'id_category' => $id_category,
			'id_type' => $id_type,
			'start_date' => $start_date,
			'exp_date' => $exp_date,
			'description' => $description,
			'status' => $status,
		);

		// Insert or update data via model
		$this->M_Sell->update_data($data, $id);
		$this->session->set_flashdata('success', '
    <div class="alert alert-success">
        <div class="d-flex justify-content-start">
            <span class="alert-icon m-r-20 font-size-30">
                <i class="anticon anticon-check-circle"></i>
            </span>
            <div>
                <h5 class="alert-heading">Sukses</h5>
                <p>Data berhasil diupload.</p>
            </div>
        </div>
    </div>
');
		redirect('manage_sell');
	}
}
