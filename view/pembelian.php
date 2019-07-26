<?php if(isset($_SESSION['user'])){ ?>
<center>
  <h3>SILAHKAN ISI FORM PEMBELIAN DIBAWAH INI DENGAN BENAR</h3>
</center>

<?php
    $id = $_SESSION['user'];
    $data = $objUser->data_user($id);
    $data_user = $data->fetch_object();
    $sarang = $objBeli->data_last();
    $data_sarang = $sarang->fetch_object();


?>

<form method="POST" action="">
  <input type="hidden" name="id" value="<?= $data_sarang->id + 1; ?>">
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">No KTP</label>
              <input type="text" class="form-control input-sm" name="ktp" value="<?= $data_user->ktp; ?>" readonly />
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Nama</label>
              <input type="text" id="" class="form-control input-sm" name="" value="<?= $data_user->nama; ?>" readonly/>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Alamat</label>
              <input type="text" id="" class="form-control input-sm" name="" value="<?= $data_user->alamat; ?>" readonly/>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Jenis Kelamin</label>
              <input type="text" id="" class="form-control input-sm" name="" value="<?= $data_user->jekel; ?>" readonly/>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Pekerjaan</label>
              <input type="text" id="" class="form-control input-sm" name="" value="<?= $data_user->pekerjaan; ?>" readonly/>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">No Hp</label>
              <input type="text" class="form-control input-sm" name="" value="<?= $data_user->no_hp; ?>" readonly/>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Tanggal Beli</label>
              <input type="text" class="form-control input-sm" name="tanggal_pembelian" value="<?php echo date('Y/m/d') ?>" readonly/>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Nama Barang</label>
              <div class="form-group">
              <select class="form-control" name="nama_barang" id="pilihSarang"  onchange="cari_stok()">
                <option value="">Pilih sarang</option>
                <?php
                    $jenis_sarang = $objSarang->tampil_jenis_sarang();
                    while ($data_jerang = $jenis_sarang->fetch_object()) {
                ?>
                    <option  value="<?=$data_jerang->id;?>"><?= $data_jerang->nama_sarang; ?></option>
                <?php
                    }
                ?>
              </select>
            </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">

  function cari_stok() {
    var id_sarang = document.getElementById("pilihSarang").value;
    // console.log(id_sarang);
    $.ajax({
              url: 'models/ajax.php?proses=stok',
              data:{id : id_sarang },
              success: function (data) {
              obj = JSON.parse(data);
              // console.log(data);
              $('#stok').val(obj.stok);
              $('#hargaPerKg').val(obj.harga);
              $('#ViewHargaPerKg').val('RP. '+ format_uang(obj.harga));
              }
          });
  }

  </script>

  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Stok per Kg</label>
              <input type="text" class="form-control input-sm" id="stok" name="" readonly/>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Harga per Kg</label>
              <input type="text" class="form-control input-sm" id="ViewHargaPerKg" name=""  readonly/>
              <input type="hidden" class="form-control input-sm" id="hargaPerKg" name=""  readonly/>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Jumlah Kg</label>
              <input type="text" class="form-control input-sm" id="jumlah_kg" name="jumlah_pesanan" onchange="cari_harga()" required/>
          </div>
      </div>

      <script>
          function cari_harga(){
            var jumlah_dibeli = document.getElementById("jumlah_kg").value;
            var hargaPerKg = document.getElementById("hargaPerKg").value;
            var total = jumlah_dibeli * hargaPerKg;
            console.log(total);
            $('#harga_total').val(total);
            $('#ViewHarga_total').val('Rp. '+format_uang(total));

          }
      </script>


      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Harga</label>
              <input type="text" class="form-control input-sm" id="ViewHarga_total" readonly required/>
              <input type="hidden" class="form-control input-sm" id="harga_total" name="harga" readonly required/>

          </div>
      </div>

  </div>

  <input class="btn btn-sm btn-info" type="submit" name="pesan" value="Pesan">
</form>
<?php
if (isset($_POST['pesan'])) {

    $id = $obj->conn->real_escape_string($_POST['id']);
    $ktp = $obj->conn->real_escape_string($_POST['ktp']);
    $tgl = $obj->conn->real_escape_string($_POST['tanggal_pembelian']);
    $nama = $obj->conn->real_escape_string($_POST['nama_barang']);
    $jml = $obj->conn->real_escape_string($_POST['jumlah_pesanan']);
    $harga = $obj->conn->real_escape_string($_POST['harga']);
    $kode = md5(rand(1, 1000));
    $status = "Belum";
      $objBeli->tambah($ktp, $tgl, $nama, $jml, $harga, $kode, $status);
      echo '<script>
              alert("Berhasil melakukan pemesanan, cek kode pembelian");
              window.location="?view=cetak-nota&id='.$id.'";
            </script>';

}

 ?>
<?php }else{
  echo '<script>window.location="?view=login"</script>';
} ?>
