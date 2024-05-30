  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-dashboard"> </i> Home</a></li>
    <li><a href="<?php echo site_url('admin/nominal');?>">Data Rincian Pembayaran</a></li>
    <li class="active">Tambah Data Rincian Pembayaran</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/nominal/simpan');?>">
<div class="col-md-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title" align="center" style="text-align: center; padding: 5px; margin: 2px;">INPUT DATA RINCIAN PEMBAYARAN SEKOLAH</h3>
    </div>
    <div class="col-md-4">
      <h3 class="col-sm-12 control-label" style="text-align: center; margin-bottom: 10px;">KELAS X</h3>
      <div class="form-group">
        <label class="col-sm-3 control-label">SPP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="spp1" id="spp1" onkeyup="kelas1()" onchange="kelas1()" value="0" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="ps1" id="ps1" onkeyup="kelas1()" onchange="kelas1()" value="0" required>
        </div>
      </div> 
      <div class="form-group">
        <label class="col-sm-3 control-label">PAP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="pap1" id="pap1" onkeyup="kelas1()" onchange="kelas1()" value="0" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">OSIS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="osis1" id="osis1" onkeyup="kelas1()" onchange="kelas1()" value="0" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PSG</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="psg1"  id="psg1" onkeyup="kelas1()" onchange="kelas1()" value="0" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UUS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="uus1"  id="uus1" onkeyup="kelas1()" onchange="kelas1()" value="0" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Asuransi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="as1" id="as1" onkeyup="kelas1()" onchange="kelas1()" value="0" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Koperasi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="kop1" id="kop1" onkeyup="kelas1()" onchange="kelas1()" value="0" required>
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
          <input type="number" class="form-control" name="kk1" required>
        </div>
      </div>
    </div>
      
    <div class="col-md-4">
      <h3 class="col-sm-12 control-label" style="text-align: center; margin-bottom: 10px;">KELAS XI</h3>
      <div class="form-group">
        <label class="col-sm-3 control-label">SPP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="spp2" id="spp2" value="0" onkeyup="kelas2()" onchange="kelas2()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="ps2" id="ps2" value="0" onkeyup="kelas2()" onchange="kelas2()" required>
        </div>
      </div> 
      <div class="form-group">
        <label class="col-sm-3 control-label">PAP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="pap2" id="pap2" value="0" onkeyup="kelas2()" onchange="kelas2()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">OSIS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="osis2" id="osis2" value="0" onkeyup="kelas2()" onchange="kelas2()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PSG</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="psg2" id="psg2" value="0" onkeyup="kelas2()" onchange="kelas2()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UUS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="uus2" id="uus2" value="0" onkeyup="kelas2()" onchange="kelas2()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UN</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="un2" id="un2" value="0" onkeyup="kelas2()" onchange="kelas2()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Asuransi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="as2" id="as2" value="0" onkeyup="kelas2()" onchange="kelas2()" required>
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
          <input type="number" class="form-control" name="kk2" required>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <h3 class="col-sm-12 control-label" style="text-align: center; margin-bottom: 10px;">KELAS XII</h3>
      <div class="form-group">
        <label class="col-sm-3 control-label">SPP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="spp3" id="spp3" value="0" onkeyup="kelas3()" onchange="kelas3()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">PS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="ps3"  id="ps3" value="0" onkeyup="kelas3()" onchange="kelas3()" required>
        </div>
      </div> 
      <div class="form-group">
        <label class="col-sm-3 control-label">PAP</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="pap3" id="pap3" value="0" onkeyup="kelas3()" onchange="kelas3()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">OSIS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="osis3" id="osis3" value="0" onkeyup="kelas3()" onchange="kelas3()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UUS</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="uus3" id="uus3" value="0" onkeyup="kelas3()" onchange="kelas3()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">UN</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="un3"  id="un3" value="0" onkeyup="kelas3()" onchange="kelas3()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Asuransi</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="as3"  id="as3" value="0" onkeyup="kelas3()" onchange="kelas3()" required>
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
          <input type="number" class="form-control" name="tweak3" id="tweak3" value="0" onkeyup="kelas3()" onchange="kelas3()" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Korban & Kalender</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" name="kk3" required>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="col-sm-3 control-label">Tahun Ajaran</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="Tahun Ajaran Sekolah" name="tahun_ajaran" required>
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