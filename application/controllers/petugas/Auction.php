<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auction extends CI_Controller
{
	

	public function index()
	{
		// $data['tb_petugas'] = $this->Petugas_model->fi()->result();
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		// $this->load->view('auction/list');
		$this->load->view('templates_admin/footer');
	}

	public function detail_barang($id)
	{

		$product = $this->Lelang_model->first($id);
		if ($this->input->post('bid')) {
			$errors = $this->_detail_barang_process($product);
			$product = $this->Lelang_model->first($id);
		}

		$args = [
			'product' => $product,
			'history' => $this->Lelang_model->history($id),
			'auctions' => $this->Lelang_model->all(),
			'max_bid' => $this->Lelang_model->max_bid($id),
		];

		$this->load->view('templates_user/header', $args);
		$this->load->view('auction/detail_barang', $args);
		$this->load->view('templates_user/footer');
	}


	private function _detail_barang_process($product) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('price', 'price', 'required|numeric|greater_than_equal_to['.
		$product->harga_awal.']');
		if ($this->form_validation->run()) {
			$this->Lelang_model->price = set_value('price');
			$this->Lelang_model->id_lelang = $product->id_lelang;
			$this->Lelang_model->id_barang = $product->id_barang;
			$this->Lelang_model->id_user = uid();

			$this->Lelang_model->save_bid();
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success alert-dismissible fade-show" role="alert">
				Bid telah di tambahkan
				</div>'
			);
			redirect('petugas/auction/detail_barang/'.$product->id_lelang);
		}

		return $this->form_validation->error_array();
	}
}
