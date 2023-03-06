<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('lelang_model');
		$this->load->library('pdf');
		// if (!is_login() && is_level('')) {
		// 	redirect('dashboard/login');
		// }
	}

	public function index() {
		$this->load->library('pdf');
		$html = $this->load->view('report/lelang', [
			'auction' => $this->lelang_model->report(),
			'lelang_model' => $this->lelang_model
		], true);
		$this->pdf->WriteHTML($html);
		$this->pdf->Output('laporan-lelang-'.date('j-F-Y').'.pdf', 'I');
	}

	public function laporan_barang()
    {
        $args = [
            'judul' => 'Laporan Barang',
        ];

        $this->load->view('templates_admin/header', $args);
        $this->load->view('templates_admin/sidebar', $args);
        $this->load->view('admin/laporan_barang/v_laporan', $args);
        $this->load->view('templates_admin/footer');
    }

	public function cetak_laporan_barang() {
		//load library
		$this->load->model('Lelang_model');
		$this->load->library('pdf');

		//load model dashboard
		$data['laporan'] = $this->Lelang_model->laporan_barang();

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan_lelang.pdf";

		//run dompdf
		$this->pdf->load_view('admin/laporan_barang/cetak_laporan_barang', $data);	
	}
}
