<?php

	$pdf = new TCPDF('P', 'mm', 'A4');
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('','B',11);
	$pdf->Cell(0 ,4,'RINCIAN PEMBAYARAN ',0,1,'L');
	$pdf->Ln();

    foreach ($data2 as $u) {
    	$pdf->SetFont('','B',10);
		$pdf->Cell(152 ,6,'TAHUN AJARAN '.$u['tahun_ajaran'],1,1,'C');
		$pdf->Cell(10 ,4,'No',1,0,'C');
		$pdf->Cell(40 ,4,'Uraian',1,0,'C');
		$pdf->Cell(34 ,4,'Kelas X',1,0,'C');
		$pdf->Cell(34 ,4,'Kelas XI',1,0,'C');
		$pdf->Cell(34 ,4,'Kelas XII',1,1,'C');
		$pdf->SetFont('','',10);
		$pdf->Cell(10 ,4,'1',1,0,'C');
		$pdf->Cell(40 ,4,'SPP',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('spp',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('spp',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('spp',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'2',1,0,'C');
		$pdf->Cell(40 ,4,'PS',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('ps',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('ps',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('ps',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'3',1,0,'C');
		$pdf->Cell(40 ,4,'PAP',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('pap',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('pap',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('pap',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'4',1,0,'C');
		$pdf->Cell(40 ,4,'OSIS',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('osis',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('osis',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('osis',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'5',1,0,'C');
		$pdf->Cell(40 ,4,'PSG',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('psg',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('psg',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('psg',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'6',1,0,'C');
		$pdf->Cell(40 ,4,'UUS',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('uus',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('uus',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('uus',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'7',1,0,'C');
		$pdf->Cell(40 ,4,'UN',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('un',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('un',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('un',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'6',1,0,'C');
		$pdf->Cell(40 ,4,'Asuransi',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('as',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('as',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('as',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'7',1,0,'C');
		$pdf->Cell(40 ,4,'Koperasi',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('kop',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('kop',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('kop',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');


		$pdf->Cell(10 ,4,'8',1,0,'C');
		$pdf->Cell(40 ,4,'Kalender dan Korban',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('kk',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('kk',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('kk',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Cell(10 ,4,'9',1,0,'C');
		$pdf->Cell(40 ,4,'Tweak',1,0,'L');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('tweak',1,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('tweak',2,$u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->Laporan_model->sum_pembayaran('tweak',3,$u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->SetFont('','B',10);
		$pdf->Cell(50 ,4,'TOTAL',1,0,'C');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->CRUD_model->total_kelas1($u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->CRUD_model->total_kelas2($u['tahun_ajaran']),0,",","."), 1, 0,'R');
		$pdf->Cell(34 ,4,'Rp. '.number_format($this->CRUD_model->total_kelas3($u['tahun_ajaran']),0,",","."), 1, 1,'R');

		$pdf->Ln();
		$pdf->Ln();
	}



	$pdf->Output('rincian_pembayaran.pdf', 'I');
?>