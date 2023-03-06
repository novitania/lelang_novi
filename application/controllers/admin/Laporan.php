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
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporan/v_laporan');
		$this->load->view('templates_admin/footer');
    }

    public function laporan_lelang()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporan/v_laporan_lelang');
        $this->load->view('templates_admin/footer');
    }

    public function cetak_laporan() {
        //load library
        $this->load->model('Lelang_model');
        $this->load->library('pdf');

        $tgl_lelang_awal = $this->input->post('tgl_lelang_awal');
        $tgl_lelang_akhir = $this->input->post('tgl_lelang_akhir');

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-lelang.pdf";

        $this->session->set_flashdata('tgl_lelang_awal', $tgl_lelang_awal);
        $this->session->set_flashdata('tgl_lelang_akhir', $tgl_lelang_akhir);
        
        $data['laporan'] = $this->Lelang_model->filter_laporan($tgl_lelang_awal, $tgl_lelang_akhir);
        
        //run dompdf
        $this->pdf->load_view('admin/laporan/cetak_laporan', $data);
    }

    public function cetak_laporan_masyarakat() {
            //load library
            $this->load->model('Lelang_model');
            $this->load->library('pdf');

            //load model dashboard
            $data['laporan'] = $this->Lelang_model->laporan_masyarakat();

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan_lelang.pdf";

            //run dompdf
            $this->pdf->load_view('admin/laporan_masyarakat/cetak_laporan_masyarakat', $data);

    }

    public function cetak_laporan_lelang()
    {
        //load library
        $this->load->model('Lelang_model');
        $this->load->library('pdf');

        $tgl_lelang_awal = $this->input->post('tgl_lelang_awal');
        $tgl_lelang_akhir = $this->input->post('tgl_lelang_akhir');

        //load model dashboard
        $data['laporan'] = $this->Lelang_model->filter_laporan($tgl_lelang_awal, $tgl_lelang_akhir);

        $this->session->set_flashdata('tgl_lelang_awal', $tgl_lelang_awal);
        $this->session->set_flashdata('tgl_lelang_akhir', $tgl_lelang_akhir);

        $this->pdf->setPaper('A4','patroit');
        $this->pdf->filename = "laporan-lelang.pdf";

        //run dompdf
        $this->pdf->load_view('admin/laporan/cetak_laporan_lelang', $data);
    }
}