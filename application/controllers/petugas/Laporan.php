<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();

        if ($this->session->userdata('id_level') != '2') {
            $this->session->set_flashdata('mesage','<div class="alert alert-danger alert-didmissible fade-show"
            role="alert">
                Anda Belum Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
    }

    public function index() {
        $this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar_petugas');
		$this->load->view('petugas/laporan/v_laporan');
		$this->load->view('templates_admin/footer');
    }

    public function cetak_laporan() {
        //load library
        $this->load->model('Lelang_model');
        $this->load->library('pdf');

        $tgl_lelang_awal = $this->input->post('tgl_lelang_awal');
        $tgl_lelang_akhir = $this->input->post('tgl_lelang_akhir');

        $this->session->set_flashdata('tgl_lelang_awal', $tgl_lelang_awal);
        $this->session->set_flashdata('tgl_lelang_akhir', $tgl_lelang_akhir);

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-lelang.pdf";

        $data['laporan'] = $this->Lelang_model->filter_laporan($tgl_lelang_awal, $tgl_lelang_akhir);
        
        //run dompdf
        $this->pdf->load_view('petugas/laporan/cetak_laporan', $data);
    }
}