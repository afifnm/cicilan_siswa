<?php

	$pdf = new TCPDF('P', 'mm', 'A4');
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
	$pdf->AddPage();
	$pdf->SetFont('','B',11);
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
	$pdf->Cell(0 ,5,'LAPORAN PEMBAYARAN '.$title,0,1,'L');
	$pdf->SetFont('','',11);
	if($pembayaran=='all'){
		for ($i=0; $i <= 6; $i++) { 
			$pdf->Ln();
			$tahun_ini = date('Y')-$i; 
			$bulan=date('m'); //cek bulan ke 7 apa bukan?
			  if($bulan>6){
			    $plus1=$tahun_ini; 
			    $plus2=$tahun_ini+1;
			    $angkatan1=$tahun_ini;
			    $angkatan2=$tahun_ini-1;
			    $angkatan3=$tahun_ini-2;
			    $tahun=$plus1.'/'.$plus2; 
			  } else {
			    $plus1=$tahun_ini-1; 
			    $plus2=$tahun_ini;
			    $angkatan1=$tahun_ini-1;
			    $angkatan2=$tahun_ini-2;
			    $angkatan3=$tahun_ini-3;
			    $tahun=$plus1.'/'.$plus2; 
			  }

			$pdf->Cell(180 ,7,'TAHUN AJARAN '.$tahun,1,1,'C');
			$pdf->SetFont('','',10);
			$pdf->Cell(25 ,5,'-',1,0,'C');
			$pdf->Cell(20 ,5,'JUMLAH',1,0,'C');
			$pdf->Cell(30 ,5,'TAGIHAN',1,0,'C');
			$pdf->Cell(35 ,5,'TOTAL',1,0,'C');
			$pdf->Cell(35 ,5,'DIBAYAR',1,0,'C');
			$pdf->Cell(35 ,5,'SISA TAGIHAN',1,1,'C');

			$pdf->Cell(25 ,5,$this->CRUD_model->angkatan($angkatan1),1,0,'C');
			$pdf->Cell(20 ,5,$count1=$this->CRUD_model->count_angkatan($angkatan1),1,0,'C');
			$pdf->Cell(30 ,5,'Rp. '.number_format($total1=$this->CRUD_model->total_kelas1($tahun),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total1=$count1*$total1,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($dibayar1=$this->CRUD_model->angkatan_total_kelas1($angkatan1),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total1-$dibayar1,0,".",","),1,1,'R');

			$pdf->Cell(25 ,5,$this->CRUD_model->angkatan($angkatan2),1,0,'C');
			$pdf->Cell(20 ,5,$count2=$this->CRUD_model->count_angkatan($angkatan2),1,0,'C');
			$pdf->Cell(30 ,5,'Rp. '.number_format($total2=$this->CRUD_model->total_kelas2($tahun),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total2=$count2*$total2,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($dibayar2=$this->CRUD_model->angkatan_total_kelas2($angkatan2),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total2-$dibayar2,0,".",","),1,1,'R');

			$pdf->Cell(25 ,5,$this->CRUD_model->angkatan($angkatan3),1,0,'C');
			$pdf->Cell(20 ,5,$count3=$this->CRUD_model->count_angkatan($angkatan3),1,0,'C');
			$pdf->Cell(30 ,5,'Rp. '.number_format($total3=$this->CRUD_model->total_kelas3($tahun),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total3=$count3*$total3,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($dibayar3=$this->CRUD_model->angkatan_total_kelas3($angkatan3),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total3-$dibayar3,0,".",","),1,1,'R');

			$pdf->Cell(25 ,5,'-',1,0,'C');
			$pdf->Cell(20 ,5,$count1+$count2+$count3 ,1,0,'C');
			$pdf->Cell(30 ,5,'Rp. '.number_format($total1+$total2+$total3,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total1+$sub_total2+$sub_total3,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($dibayar1+$dibayar2+$dibayar3,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total1+$sub_total2+$sub_total3-$dibayar1-$dibayar2-$dibayar3,0,".",","),1,1,'R');
		}
	} else {
		for ($i=0; $i <= 6; $i++) { 
			$pdf->Ln();
			$tahun_ini = date('Y')-$i; 
			$bulan=date('m'); //cek bulan ke 7 apa bukan?
			  if($bulan>6){
			    $plus1=$tahun_ini; 
			    $plus2=$tahun_ini+1;
			    $angkatan1=$tahun_ini;
			    $angkatan2=$tahun_ini-1;
			    $angkatan3=$tahun_ini-2;
			    $tahun=$plus1.'/'.$plus2; 
			  } else {
			    $plus1=$tahun_ini-1; 
			    $plus2=$tahun_ini;
			    $angkatan1=$tahun_ini-1;
			    $angkatan2=$tahun_ini-2;
			    $angkatan3=$tahun_ini-3;
			    $tahun=$plus1.'/'.$plus2; 
			  }

			$pdf->Cell(180 ,7,'TAHUN AJARAN '.$tahun,1,1,'C');
			$pdf->SetFont('','',10);
			$pdf->Cell(25 ,5,'-',1,0,'C');
			$pdf->Cell(20 ,5,'JUMLAH',1,0,'C');
			$pdf->Cell(30 ,5,'TAGIHAN',1,0,'C');
			$pdf->Cell(35 ,5,'TOTAL',1,0,'C');
			$pdf->Cell(35 ,5,'DIBAYAR',1,0,'C');
			$pdf->Cell(35 ,5,'SISA TAGIHAN',1,1,'C');

			$pdf->Cell(25 ,5,$this->CRUD_model->angkatan($angkatan1),1,0,'C');
			$pdf->Cell(20 ,5,$count1=$this->CRUD_model->count_angkatan($angkatan1),1,0,'C');
			$pdf->Cell(30 ,5,'Rp. '.number_format($total1=$this->Laporan_model->sum_pembayaran($pembayaran,1,$tahun),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total1=$count1*$total1,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($dibayar1=$this->Laporan_model->sum_pembayaran_siswa($pembayaran,1,$angkatan1),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total1-$dibayar1,0,".",","),1,1,'R');

			$pdf->Cell(25 ,5,$this->CRUD_model->angkatan($angkatan2),1,0,'C');
			$pdf->Cell(20 ,5,$count2=$this->CRUD_model->count_angkatan($angkatan2),1,0,'C');
			$pdf->Cell(30 ,5,'Rp. '.number_format($total2=$this->Laporan_model->sum_pembayaran($pembayaran,2,$tahun),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total2=$count2*$total2,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($dibayar2=$this->Laporan_model->sum_pembayaran_siswa($pembayaran,2,$angkatan2),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total2-$dibayar2,0,".",","),1,1,'R');

			$pdf->Cell(25 ,5,$this->CRUD_model->angkatan($angkatan3),1,0,'C');
			$pdf->Cell(20 ,5,$count3=$this->CRUD_model->count_angkatan($angkatan3),1,0,'C');
			$pdf->Cell(30 ,5,'Rp. '.number_format($total3=$this->Laporan_model->sum_pembayaran($pembayaran,3,$tahun),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total3=$count3*$total3,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($dibayar3=$this->Laporan_model->sum_pembayaran_siswa($pembayaran,3,$angkatan3),0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total3-$dibayar3,0,".",","),1,1,'R');

			$pdf->Cell(25 ,5,'-',1,0,'C');
			$pdf->Cell(20 ,5,$count1+$count2+$count3 ,1,0,'C');
			$pdf->Cell(30 ,5,'Rp. '.number_format($total1+$total2+$total3,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total1+$sub_total2+$sub_total3,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($dibayar1+$dibayar2+$dibayar3,0,".",","),1,0,'R');
			$pdf->Cell(35 ,5,'Rp. '.number_format($sub_total1+$sub_total2+$sub_total3-$dibayar1-$dibayar2-$dibayar3,0,".",","),1,1,'R');
		}
	}
	
	


	$pdf->Output('LAPORAN PEMBAYARAN.pdf', 'I');
?>