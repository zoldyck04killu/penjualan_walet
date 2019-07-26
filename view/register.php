<center>
  <h3 style="color:red">SILAHKAN ISI FORM REGISTER DIBAWAH INI DENGAN BENAR</h3>
</center>

<form method="post" action="">
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">No KTP</label>
              <input type="text" class="form-control input-sm" name="ktp"  required />
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Nama Lengkap</label>
              <input type="text" id="" class="form-control input-sm" name="nama" required/>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" id="" class="form-control input-sm" name="password" required/>
          </div>
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Alamat</label>
              <input type="text" id="" class="form-control input-sm" name="alamat" required/>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Jenis Kelamin</label>
              <select class="form-control" name="jekel">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <!-- <input type="text" id="" class="form-control input-sm" name="jekel" required/> -->
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">Pekerjaan</label>
              <input type="text" id="" class="form-control input-sm" name="pekerjaan" required/>
          </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
              <label class="control-label">No Hp</label>
              <input type="text" class="form-control input-sm" name="no_hp" required/>
          </div>
      </div>
  </div>

<input type="submit" name="register" class="btn btn-sm btn-info" value="Register">
</form>


<?php
if (isset($_POST['register'])) {
    $ktp = $obj->conn->real_escape_string($_POST['ktp']);
    $nama = $obj->conn->real_escape_string($_POST['nama']);
    $password = $obj->conn->real_escape_string($_POST['password']);
    $alamat = $obj->conn->real_escape_string($_POST['alamat']);
    $jekel = $obj->conn->real_escape_string($_POST['jekel']);
    $pekerjaan = $obj->conn->real_escape_string($_POST['pekerjaan']);
    $no_hp = $obj->conn->real_escape_string($_POST['no_hp']);

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $objUser->register($ktp, $nama, $password_hash, $alamat, $pekerjaan, $jekel, $no_hp);
    echo '<script>
    alert("Pendaftaran berhasil");
    window.location="?view=login";
         </script>';
}
