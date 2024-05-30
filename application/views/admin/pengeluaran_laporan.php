<?php

	$pdf = new TCPDF('P', 'mm', 'A4');
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('','B',11);
	$pdf->Cell(0 ,5,'Laporan Pengeluaran '.mediumdate_indo($tanggal1).' Sampai '.mediumdate_indo($tanggal2),0,1,'L');
	$pdf->Cell(130 ,12,'',0,0);

	$pdf->Cell(189 ,0,'',0,1);//end of line
	$pdf->SetFont('','B',9);
	$pdf->MultiCell(9 ,5,'No.', 1, 'C', '', 0);
	$pdf->MultiCell(30 ,5,'Tanggal', 1, 'C', '', 0);
	$pdf->MultiCell(60 ,5,'Keterangan', 1, 'C', '', 0);
	$pdf->MultiCell(40 ,5,'Nominal', 1, 'C', '', 1);

	$no = 1; $sum = 0; $desen = 0; $tagihan = 0;
	$tanggal = '';
    foreach ($data4 as $u) {
		$pdf->SetFont('','',8);
		if($tanggal<>$u['tanggal']){
		$pdf->MultiCell(9 ,4,$no, 1, 'C', '', 0);
		$pdf->MultiCell(30 ,4,mediumdate_indo($u['tanggal']), 1, 'C', '', 0);
		$no++;
		} else {
		$pdf->MultiCell(39 ,4,'', 1, 'C', '', 0);
		}
		$pdf->Cell(60 ,4,$u['keterangan'],  1, 0, 'L');
		$pdf->Cell(40 ,4,'Rp. '.number_format($u['nominal'],0,",","."), 1, 1,'R');
		
		$tanggal = $u['tanggal'];	
		$sum = $sum+$u['nominal'];
		
	}
	$pdf->SetFont('','B',8);
	$pdf->MultiCell(99 ,4,'Jumlah  Total', 1, 'C', '', 0);
	$pdf->MultiCell(40 ,4,'Rp. '.number_format($sum,0,",","."), 1, 'R', '', 0);
	$pdf->Output('pengeluaran_digital'.$tanggal1.'-'.$tanggal2.'.pdf', 'I');
?>