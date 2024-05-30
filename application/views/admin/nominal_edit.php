<?php foreach ($data2 as $u) { ?>  
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/nominal');?>">Data Rincian Pembayaran</a></li>
    <li class="active">Perbarui Rincian Tahun Pembayaran <?php echo $u->tahun_ajaran ?></li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/nominal/updatedata');?>">
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center" style="text-align: center; padding: 5px; margin: 2px;">RINCIAN PEMBAYARAN TAHUN <?php echo $u->tahun_ajaran ?></h3>
    </div>
    <div class="col-md-4">
      <h3 class="col-sm-12 control-label" style="text-align: center; margin-bottom: 10px;">KELAS X</h3>
      <div class="form-group">
        <label class="col-sm-3 control-label">SPP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="spp1" required id="spp1" onkeyup="kelas1()" onchange="kelas1()" value="<?php echo $u->spp1 ?>">
          <input type="hidden" class="form-control" name="id" value="<?php echo $u->id ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="ps1" required id="ps1" onkeyup="kelas1()" onchange="kelas1()" value="<?php echo $u->ps1 ?>">
        </div>
      </div> 
      <div class="form-group">
        <label class="col-sm-3 control-label">PAP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="pap1" required id="pap1" onkeyup="kelas1()" onchange="kelas1()" value="<?php echo $u->pap1 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">OSIS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="osis1" required id="osis1" onkeyup="kelas1()" onchange="kelas1()" value="<?php echo $u->osis1 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PSG</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="psg1" required id="psg1" onkeyup="kelas1()" onchange="kelas1()" value="<?php echo $u->psg1 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UUS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="uus1" required id="uus1" onkeyup="kelas1()" onchange="kelas1()" value="<?php echo $u->uus1 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Asuransi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="as1" required id="as1" onkeyup="kelas1()" onchange="kelas1()" value="<?php echo $u->as1 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Koperasi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="kop1" required id="kop1" onkeyup="kelas1()" onchange="kelas1()" value="<?php echo $u->kop1 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Total Tagihan</label>
        <div class="col-sm-8">
           <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="text" class="form-control" id="total1" readonly>
          </div>              
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Korban & Kalender</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="kk1" required value="<?php echo $u->kk1 ?>">
        </div>
      </div>
    </div>
      
    <div class="col-md-4">
      <h3 class="col-sm-12 control-label" style="text-align: center; margin-bottom: 10px;">KELAS XI</h3>
      <div class="form-group">
        <label class="col-sm-3 control-label">SPP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="spp2" id="spp2" onkeyup="kelas2()" onchange="kelas2()" required value="<?php echo $u->spp2 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="ps2" id="ps2" onkeyup="kelas2()" onchange="kelas2()" required value="<?php echo $u->ps2 ?>">
        </div>
      </div> 
      <div class="form-group">
        <label class="col-sm-3 control-label">PAP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="pap2" id="pap2" onkeyup="kelas2()" onchange="kelas2()" required value="<?php echo $u->pap2 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">OSIS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="osis2" id="osis2" onkeyup="kelas2()" onchange="kelas2()" required value="<?php echo $u->osis2 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PSG</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="psg2" id="psg2" onkeyup="kelas2()" onchange="kelas2()" required value="<?php echo $u->psg2 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UUS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="uus2" id="uus2" onkeyup="kelas2()" onchange="kelas2()" required value="<?php echo $u->uus2 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UN</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="un2" id="un2" onkeyup="kelas2()" onchange="kelas2()" required value="<?php echo $u->un2 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Asuransi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="as2" id="as2" onkeyup="kelas2()" onchange="kelas2()" required value="<?php echo $u->as2 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Total Tagihan</label>
        <div class="col-sm-8">
           <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="text" class="form-control" id="total2" readonly>
          </div>              
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Korban & Kalender</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="kk2" required value="<?php echo $u->kk1 ?>">
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <h3 class="col-sm-12 control-label" style="text-align: center; margin-bottom: 10px;">KELAS XII</h3>
      <div class="form-group">
        <label class="col-sm-3 control-label">SPP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="spp3" id='spp3' onkeyup="kelas3()" onchange="kelas3()" required value="<?php echo $u->spp3 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="ps3" id='ps3' onkeyup="kelas3()" onchange="kelas3()" required value="<?php echo $u->ps3 ?>">
        </div>
      </div> 
      <div class="form-group">
        <label class="col-sm-3 control-label">PAP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="pap3" id='pap3' onkeyup="kelas3()" onchange="kelas3()" required value="<?php echo $u->pap3 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">OSIS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="osis3" id='osis3' onkeyup="kelas3()" onchange="kelas3()" required value="<?php echo $u->osis3 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UUS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="uus3" id='uus3' onkeyup="kelas3()" onchange="kelas3()" required value="<?php echo $u->uus3 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UN</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="un3" id='un3' onkeyup="kelas3()" onchange="kelas3()" required value="<?php echo $u->un3 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Asuransi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="as3" id='as3' onkeyup="kelas3()" onchange="kelas3()" required value="<?php echo $u->as3 ?>">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label">Total Tagihan</label>
        <div class="col-sm-8">
           <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input type="text" class="form-control" id="total3" readonly>
          </div>              
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Tweak</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="tweak3" id='tweak3' onkeyup="kelas3()" onchange="kelas3()" required value="<?php echo $u->tweak3 ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Korban & Kalender</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="kk3" required value="<?php echo $u->kk3 ?>">
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="col-sm-3 control-label">Tahun Ajaran</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="Tahun Ajaran Sekolah" name="tahun_ajaran" disabled value="<?php echo $u->tahun_ajaran ?>">
        </div>
      </div>
    </div>
    <div class="box-footer">
       <button type="submit" class="btn btn-danger btn-block">Simpan</button>
    </div>
</div>
</div>
</form>
<script type="text/javascript">
  function kelas1() {
    var spp = parseInt(document.getElementById('spp1').value);
    var ps = parseInt(document.getElementById('ps1').value);
    var pap = parseInt(document.getElementById('pap1').value);
    var osis = parseInt(document.getElementById('osis1').value);
    var psg = parseInt(document.getElementById('psg1').value);
    var uus = parseInt(document.getElementById('uus1').value);
    var as = parseInt(document.getElementById('as1').value);
    var kop = parseInt(document.getElementById('kop1').value);

    var jumlah_harga = spp+ps+pap+osis+psg+uus+as+kop;
    var reverse = jumlah_harga.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    document.getElementById('total1').value = ribuan;
  }
  function kelas2() {
    var spp = parseInt(document.getElementById('spp2').value);
    var ps = parseInt(document.getElementById('ps2').value);
    var pap = parseInt(document.getElementById('pap2').value);
    var osis = parseInt(document.getElementById('osis2').value);
    var psg = parseInt(document.getElementById('psg2').value);
    var uus = parseInt(document.getElementById('uus2').value);
    var un = parseInt(document.getElementById('un2').value);
    var as = parseInt(document.getElementById('as2').value);

    var jumlah_harga = spp+ps+pap+osis+psg+uus+as+un;
    var reverse = jumlah_harga.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    document.getElementById('total2').value = ribuan;
  }
  function kelas3() {
    var spp = parseInt(document.getElementById('spp3').value);
    var ps = parseInt(document.getElementById('ps3').value);
    var pap = parseInt(document.getElementById('pap3').value);
    var osis = parseInt(document.getElementById('osis3').value);
    var uus = parseInt(document.getElementById('uus3').value);
    var un = parseInt(document.getElementById('un3').value);
    var as = parseInt(document.getElementById('as3').value);

    var jumlah_harga = spp+ps+pap+osis+uus+as+un;
    var reverse = jumlah_harga.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    document.getElementById('total3').value = ribuan;
  }
</script>  
<?php } ?>  