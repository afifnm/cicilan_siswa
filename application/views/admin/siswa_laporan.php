<?php

	$pdf = new TCPDF('P', 'mm', 'A4');
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('','B',11);
	$pdf->Cell(0 ,5,'LAPORAN PEMBAYARAN '.$title.' THN. AJARAN '.$tahun_ajaran,0,1,'C');
	$pdf->SetFont('','B',9);
	$pdf->MultiCell(22,5,$this->CRUD_model->angkatan2($angkatan), 0, 'L', '', 0);
	if($jurusan>0){
      $pdf->MultiCell(0 ,5,'( '.$this->CRUD_model->jurusan($jurusan).' )', 0, 'L', '', 0);
    }
    $pdf->Ln();
	$pdf->MultiCell(9 ,5,'No.', 1, 'C', '', 0);
	$pdf->MultiCell(15 ,5,'NIS', 1, 'C', '', 0);
	$pdf->MultiCell(40 ,5,'NAMA', 1, 'C', '', 0);
	$pdf->MultiCell(20 ,5,'KELAS', 1, 'C', '', 0);
	$pdf->MultiCell(25 ,5,'TAGIHAN', 1, 'C', '', 0);
	$pdf->MultiCell(25 ,5,'DIBAYAR', 1, 'C', '', 0);
	$pdf->MultiCell(25 ,5,'SISA', 1, 'C', '', 0);
	$pdf->MultiCell(25 ,5,'KETERANGAN', 1, 'C', '', 1);
	$no = 1; $sum = 0; $dibayar_total = 0; $total_tagihan = 0;
	$tanggal = '';
    foreach ($data2 as $u) {
		$pdf->SetFont('','',8);
		$pdf->Cell(9 ,4,$no,  1, 0, 'C');
		$pdf->Cell(15 ,4,$u['nis'],  1, 0, 'C');
		$pdf->Cell(40 ,4,$u['nama'],  1, 0, 'L');
		$pdf->Cell(20 ,4,$u['kelas'],  1, 0, 'C');
		$pdf->Cell(25 ,4,'Rp. '.number_format($tagihan,0,",","."), 1, 0,'R');
		if($pembayaran=='all'){
			if($kelas==1){
	            $dibayar = $this->CRUD_model->stotal_kelas1($u['id_siswa']);
	        } elseif($kelas==2){
	            $dibayar = $this->CRUD_model->stotal_kelas2($u['id_siswa']);
	        } elseif($kelas==3){
	            $dibayar = $this->CRUD_model->stotal_kelas3($u['id_siswa']);
	        } 
		} else {
			if($kelas==1){
	            $dibayar = $this->Laporan_model->pembayaran_siswa($pembayaran,$kelas,$u['id_siswa']);
	        } elseif($kelas==2){
	            $dibayar = $this->Laporan_model->pembayaran_siswa($pembayaran,$kelas,$u['id_siswa']);
	        } elseif($kelas==3){
	            $dibayar = $this->Laporan_model->pembayaran_siswa($pembayaran,$kelas,$u['id_siswa']);
	        } 
		}
		$pdf->Cell(25 ,4,'Rp. '.number_format($dibayar,0,",","."), 1, 0,'R');
		
		$pdf->Cell(25 ,4,'Rp. '.number_format($sisa=$tagihan-$dibayar,0,",","."), 1, 0,'R');
		if($sisa<=0){
            $ket = 'LUNAS';
        } else {
        	$ket = 'BELUM LUNAS';
        }
		$pdf->Cell(25 ,4,$ket, 1, 1,'C');

		$dibayar_total = $dibayar_total+$dibayar;
		$total_tagihan = $total_tagihan+$tagihan;
		$no++;
	}
	$pdf->SetFont('','B',8);
	$pdf->MultiCell(84 ,4,'Jumlah  Total', 1, 'C', '', 0);
	$pdf->MultiCell(25 ,4,'Rp. '.number_format($total_tagihan,0,",","."), 1, 'R', '', 0);
	$pdf->MultiCell(25 ,4,'Rp. '.number_format($dibayar_total,0,",","."), 1, 'R', '', 0);
	$pdf->MultiCell(25 ,4,'Rp. '.number_format($total_tagihan-$dibayar_total,0,",","."), 1, 'R', '', 0);
	$pdf->MultiCell(25 ,4,'', 1, 'R', '', 0);
	$pdf->Output('Laporan Pembayaran'.$tahun_ajaran.'.pdf', 'I');
?>