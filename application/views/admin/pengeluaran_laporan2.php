<?php
	if($pembayaran=='all'){
		$title = '';
	} elseif($pembayaran=='spp'){
		$title = 'SPP';
	} elseif($pembayaran=='ps'){
		$title = 'PS';
	} elseif($pembayaran=='pap'){
		$title = 'PAP';
	} elseif($pembayaran=='osis'){
		$title = 'OSIS';
	} elseif($pembayaran=='psg'){
		$title = 'PSG';
	} elseif($pembayaran=='uus'){
		$title = 'UUS';
	} elseif($pembayaran=='un'){
		$title = 'UN';
	} elseif($pembayaran=='kop'){
		$title = 'KOPERASI';
	} elseif($pembayaran=='as'){
		$title = 'ASURANSI';
	} elseif($pembayaran=='tweak'){
		$title = 'TWEAK';
	}
	$pdf = new TCPDF('P', 'mm', 'A4');
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('','B',11);
	$pdf->Cell(0 ,5,'Laporan Pemasukan '.$title.' '.mediumdate_indo($tanggal1).' Sampai '.mediumdate_indo($tanggal2),0,1,'L');
	$pdf->Cell(130 ,12,'',0,0);

	$pdf->Cell(189 ,0,'',0,1);//end of line
	$pdf->SetFont('','B',9);
	$pdf->MultiCell(9 ,5,'No.', 1, 'C', '', 0);
	$pdf->MultiCell(20 ,5,'Tanggal', 1, 'C', '', 0);
	$pdf->MultiCell(15 ,5,'NIS', 1, 'C', '', 0);
	$pdf->MultiCell(70 ,5,'Nama', 1, 'C', '', 0);
	$pdf->MultiCell(40 ,5,'Uraian Pembayaran', 1, 'C', '', 0);
	$pdf->MultiCell(30 ,5,'Nominal', 1, 'C', '', 1);
 
	$no = 1; $sum = 0; $desen = 0; $tagihan = 0;
	$tanggal = '';
    foreach ($data4 as $u) {
    	if($title == ''){
			$pdf->SetFont('','',8);
			if($tanggal<>$u['tanggal']){
			$pdf->MultiCell(9 ,4,$no, 1, 'C', '', 0);
			$pdf->MultiCell(20 ,4,mediumdate_indo($u['tanggal']), 1, 'C', '', 0);
			$no++;
			} else {
			$pdf->MultiCell(29 ,4,'', 1, 'C', '', 0);
			}
			$pdf->MultiCell(15 ,4,$u['nis'], 1, 'C', '', 0);
			$pdf->MultiCell(70 ,4,$u['nama'], 1, 'L', '', 0);
			$pdf->Cell(40 ,4,$u['uraian'],  1, 0, 'C');	
			$pdf->Cell(30 ,4,'Rp. '.number_format($nominal=$this->CRUD_model->nominal_transaksi2($u['id']),0,",","."), 1, 1,'R');	
			$tanggal = $u['tanggal'];	
			$sum = $sum+$nominal;
    	} else {
    		$nominal=$u[$pembayaran.'1']+$u[$pembayaran.'2']+$u[$pembayaran.'3'];
    		if ($nominal == 0) {
    			# code...
    		} else {
    			$pdf->SetFont('','',8);
				if($tanggal<>$u['tanggal']){
				$pdf->MultiCell(9 ,4,$no, 1, 'C', '', 0);
				$pdf->MultiCell(20 ,4,mediumdate_indo($u['tanggal']), 1, 'C', '', 0);
				$no++;
				} else {
				$pdf->MultiCell(29 ,4,'', 1, 'C', '', 0);
				}
				$pdf->MultiCell(15 ,4,$u['nis'], 1, 'C', '', 0);
				$pdf->MultiCell(70 ,4,$u['nama'], 1, 'L', '', 0);
				$pdf->Cell(40 ,4,$title,  1, 0, 'C');	
				$pdf->Cell(30 ,4,'Rp. '.number_format($nominal,0,",","."), 1, 1,'R');	
				$tanggal = $u['tanggal'];	
				$sum = $sum+$nominal;	
    		}

    	}

		
	}
	$pdf->SetFont('','B',8);
	$pdf->MultiCell(154 ,4,'Jumlah  Total', 1, 'C', '', 0);
	$pdf->MultiCell(30 ,4,'Rp. '.number_format($sum,0,",","."), 1, 'R', '', 0);
	$pdf->Output('pengeluaran_digital'.$tanggal1.'-'.$tanggal2.'.pdf', 'I');
?>