<?php

class Export extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mexport', 'mdl');
		
	}
	
	function print_data($id) {
		
		$data['data']	   = $this->mdl->cek_data($id);
		$data['transaksi'] = $this->mdl->get_transaksi($id);
		
		// Tambahkan table
		$this->load->view('tabel', $data);		
		
	}
	
	function excel($id) {
		
		$data['data']	   = $this->mdl->cek_data($id);
		$data['transaksi'] = $this->mdl->get_transaksi($id);
		
		header("Content-type: application/vnd-ms-excel");
		 
		// Mendefinisikan nama file ekspor "hasil-export.xls"
		header("Content-Disposition: attachment; filename=Transaksi ".$data['data']->nama.".xls");
		 
		// Tambahkan table
		$this->load->view('tabel', $data);		
		
	}
	
	function pdf($id) {
		
		$data['data']	   = $this->mdl->cek_data($id);
		$data['transaksi'] = $this->mdl->get_transaksi($id);
		
		$this->load->library('tcpdf/tcpdf.php');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 001');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$pdf->AddPage();

		$html = $this->load->view('tabel', $data, true);

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		$pdf->Output("Transaksi ".$data['data']->nama.".pdf", 'I');
		
		
	}
	
}