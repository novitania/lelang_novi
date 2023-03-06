<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_barang extends CI_Controller
{
    public function index()
	{
    // $data['tb_barang'] = $this->Barang_model->tampil_data()->result();

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar_petugas');
    $this->load->view('petugas/laporan_barang/v_laporan_barang');
    $this->load->view('templates_admin/footer');
    }
}