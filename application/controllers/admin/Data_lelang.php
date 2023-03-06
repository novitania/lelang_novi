<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_lelang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('lelang_model');
	
	}
	
	public function index()
	{
		$data['tb_lelang'] = $this->Lelang_model->tampil_data()->result();
		
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/data_lelang/data_lelang',$data);
		$this->load->view('templates_admin/footer');
	}
	

	public function edit($id_lelang)
	{
	  $where = array('id_lelang' => $id_lelang);
	  $data['tb_lelang'] = $this->Lelang_model->edit_barang($where, 'tb_lelang')->row_array();
  
	  $this->load->view('templates_admin/header');
	  $this->load->view('templates_admin/sidebar');
	  $this->load->view('admin/data_lelang/edit', $data);
	  $this->load->view('templates_admin/footer');
	}
  
	public function update()
	{
	  $id_barang                = $this->input->post('id_lelang');
	  $nama_barang              = $this->input->post('nama_lelang');
	  $deskripsi_barang         = $this->input->post('deskripsi_lelang');
	  $harga_awal            	= $this->input->post('harga_awal');
	  $gambar            		= $_FILES['gambar']['name'];
	//save gambar 
	if ($gambar != '') {
		$config['upload_path'] = 'assets/images/lelang/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
	
		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('gambar')) {
			echo "Gambar Gagal diupload! Error : " . $this->upload->display_errors();die;
		} else {
			$gambar = $this->upload->data('file_name');
		}
	}
	   
	  $data = array(
		'gambar'             	  => $gambar,
		'nama_lelang'             => $nama_lelang,
		'deskripsi_lelang'        => $deskripsi_lelang,
		'harga_awal'          	  => $harga_awal,
	  );
  
	  $where = array(
		'id_lelang' => $id_lelang

	  );
  
	  $this->Barang_model->update_data($where, $data, 'tb_lelang');
	  $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Data Berhasil DiUbah</strong> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>');
	  redirect('admin/data_lelang');
	}
	
	
	
	public function tambah_lelang()
    {
        $data['tb_lelang'] = $this->Lelang_model->tampil_data_lelang()->result_array();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/data_lelang/tambah',$data);
		$this->load->view('templates_admin/footer');
    }

    public function insert()
    {
		$nama = $this->input->post('nama_lelang');
        $desc = $this->input->post('deskripsi_lelang');
        $hrg = $this->input->post('harga_awal');
		$gambar = $_FILES['gambar']['name'];
		 //save gambar 
		 if ($gambar != '') {
			$config['upload_path'] = 'assets/images/lelang/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
		
			$this->load->library('upload');
			$this->upload->initialize($config); 

			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Gagal diupload! Error : " . $this->upload->display_errors();die;
			} else {
				$gambar = $this->upload->data('file_name');
			}
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Gagal mengupload gambar
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>'
			);
			redirect('admin/data_lelang');
		}
		
        $data = array(
            'gambar' => $gambar,
            'nama_lelang' => $nama,
            'deskripsi_lelang' => $desc,
            'harga_awal' => $hrg,
        );
		
        $this->Barang_model->insert_data($data);
        $this->session->set_flashdata(
			'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
            </button>
			</div>'
        );
        redirect('admin/data_lelang');
    }


	 public function delete($id)
    {
        $this->db->where('id_lelang', $id);
        $this->db->delete('tb_lelang');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasik Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('admin/data_lelang');
    }
}

		
	
