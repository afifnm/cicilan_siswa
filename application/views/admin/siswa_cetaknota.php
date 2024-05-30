<?php
	include 'terbilang.php';
	foreach ($siswa as $u) {
	foreach ($transaksi as $uu) {
		$tahun_ajaran = $uu['tahun_ajaran'];

		$kelas1=substr($tahun_ajaran,0,4)-$u['angkatan']; 
        $kelas2=substr($tahun_ajaran,0,4)-1-$u['angkatan']; 
        $bulan=date('m'); //cek bulan ke 7 apa bukan?
        if($bulan>6){
          if($kelas1<1) {
            $kelas = 1;
          } elseif($kelas1==1) {
            $kelas = 2;
          } elseif($kelas1==2) {
            $kelas = 3;
          } else {
          	$kelas = 4;
          }
        } else {
          if($kelas2<1) {
            $kelas = 1;
          } elseif($kelas2==1) {
            $kelas = 2;
          } elseif($kelas2==2) {
            $kelas = 3;
          } else {
          	$kelas = 4;
          }
        }

	      if($kelas==1) {
	        $x = "X";
	      } elseif($kelas==2) {
	        $x = "XI";
	      } elseif($kelas==3) {
	        $x = "XII";
	      } else {
	        $x ='Alumni';
	      }

		$pdf = new TCPDF('', 'mm', 'A4');
		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);
		$pdf->AddPage('P');
		$pdf->SetFont('courier', '', 11, '', 'false');
		$spasi = 0;
		$pdf->Cell(0,$spasi,'YAYASAN BINA PRAJA',0,1);
		$pdf->SetFont('courier', 'B', 11, '', 'false');
		$pdf->Cell(0,$spasi,'SMK PEMBANGUNAN NASIONAL SUKOHARJO',0,1);
		$pdf->SetFont('courier', '', 11, '', 'false');
		$pdf->Cell(0,$spasi,'JL. Melati 52 Bulakrejo, Sukoharjo, Jawa tengah',0,1);
		$pdf->Cell(0,$spasi,'Telp/Fax. (0271)592863 Email: smkp_skh@yahoo.com ',0,1);

		$pdf->SetFont('courier', 'B', 13, '', 'false');
		$pdf->Cell(0,9,'KWITANSI PEMBAYARAN THN. AJARAN '.$uu['tahun_ajaran'],'TB',1,'C');
		$pdf->SetFont('courier', '', 11, '', 'false');


		$pdf->Cell(45,$spasi,'Uraian Pembayaran','',0,'L');
		$pdf->Cell(5,$spasi,':','',0,'C');
		$pdf->SetFont('courier', 'B', 11, '', 'false');
		$pdf->Cell(45,$spasi,'Pembayaran Pengembangan Sekolah','',1,'L');
		$pdf->SetFont('courier', '', 11, '', 'false');

		

		$pdf->Cell(45,$spasi,'Nama Siswa','',0,'L');
		$pdf->Cell(5,$spasi,':','',0,'C');
		$pdf->SetFont('courier', 'B', 11, '', 'false');
		$pdf->Cell(45,$spasi,$u['nama'],'',1,'L');
		$pdf->SetFont('courier', '', 11, '', 'false');

		$pdf->Cell(45,$spasi,'NISN','',0,'L');
		$pdf->Cell(5,$spasi,':','',0,'C');
		$pdf->Cell(45,$spasi,$u['nisn'],'',0,'L');

		$pdf->Cell(50,$spasi,'Kewajiban Pembayaran','',0,'L');
		$pdf->Cell(5,$spasi,':','',0,'C');
		if ($kelas==1) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format($this->CRUD_model->total_kelas1($uu['tahun_ajaran']),0,",","."),'',1,'L');
		} elseif ($kelas==2) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format($this->CRUD_model->total_kelas2($uu['tahun_ajaran']),0,",","."),'',1,'L');
		} elseif ($kelas==3) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format($this->CRUD_model->total_kelas3($uu['tahun_ajaran']),0,",","."),'',1,'L');
		}

		$pdf->Cell(45,$spasi,'Kelas','',0,'L');
		$pdf->Cell(5,$spasi,':','',0,'C');
		$pdf->Cell(45,$spasi,$this->CRUD_model->angkatan($u['angkatan']).' '.$u['kelas'],'',0,'L');

		$pdf->Cell(50,$spasi,'Dibayar Sebesar','',0,'L');
		$pdf->Cell(5,$spasi,':','',0,'C');
		if ($kelas==1) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format($this->CRUD_model->stotal_kelas1($u['id_siswa']),0,",","."),'',1,'L');
		} elseif ($kelas==2) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format($this->CRUD_model->stotal_kelas2($u['id_siswa']),0,",","."),'',1,'L');
		} elseif ($kelas==3) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format($this->CRUD_model->stotal_kelas3($u['id_siswa']),0,",","."),'',1,'L');
		}

		$pdf->Cell(45,$spasi,'Tgl. Pembayaran','',0,'L');
		$pdf->Cell(5,$spasi,':','',0,'C');
		$pdf->Cell(45,$spasi,mediumdate_indo($uu['tanggal']),'',0,'L');

		$pdf->Cell(50,$spasi,'Sisa Tagihan','',0,'L');
		$pdf->Cell(5,$spasi,':','',0,'C');
		if ($kelas==1) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format(
				$this->CRUD_model->total_kelas1($uu['tahun_ajaran'])-$this->CRUD_model->stotal_kelas1($u['id_siswa']),0,",","."),'',1,'L');
		} elseif ($kelas==2) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format(
				$this->CRUD_model->total_kelas2($uu['tahun_ajaran'])-$this->CRUD_model->stotal_kelas2($u['id_siswa']),0,",","."),'',1,'L');
		} elseif ($kelas==3) {
			$pdf->Cell(45,$spasi,'Rp. '.number_format(
				$this->CRUD_model->total_kelas3($uu['tahun_ajaran'])-$this->CRUD_model->stotal_kelas3($u['id_siswa']),0,",","."),'',1,'L');
		}

		$pdf->SetFont('courier', 'I', 12, '', 'false');
		$pdf->Cell(45,$spasi,'Terbilang','TB',0,'L');
		$pdf->Cell(5,$spasi,':','TB',0,'C');
		if ($kelas==1) {
			$pdf->Cell(0,$spasi,terbilang($this->CRUD_model->stotal_kelas1($u['id_siswa']),$style=3),'TB',1,'L');
		} elseif ($kelas==2) {
			$pdf->Cell(0,$spasi,terbilang($this->CRUD_model->stotal_kelas2($u['id_siswa']),$style=3),'TB',1,'L');
		} elseif ($kelas==3) {
			$pdf->Cell(0,$spasi,terbilang($this->CRUD_model->stotal_kelas3($u['id_siswa']),$style=3),'TB',1,'L');
		}
		$pdf->SetFont('courier', '', 12, '', 'false');
		$pdf->Cell(170,$spasi,'TTD Bendahara','',1,'R');
		$pdf->Ln();
		$pdf->Cell(170,$spasi,'(___________)','',1,'R');

		$pdf->Output('nota.pdf', 'I');
}}
?>