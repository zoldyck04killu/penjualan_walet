<form class="" action="" method="post" enctype="multipart/form-data">
  <input type="file" name="img" value=""> <br>
  <input type="text" name="nama_sarang" value="" placeholder="Nama Sarang"> <br>
  <textarea name="keterangan" rows="8" cols="80" placeholder="Keterangan"></textarea> <br>
  <input type="number" name="harga" value="" placeholder="Harga sarang"> <br>
  <input type="number" name="stok" value="" placeholder="Stok Sarang"> <br>
  <input type="submit" class="btn btn-sm btn-primary" name="simpan" value="Simpan">
</form>

<?php
if (isset($_POST['simpan'])) {
  $nama_sarang = $obj->conn->real_escape_string($_POST['nama_sarang']);
  $keterangan = $obj->conn->real_escape_string($_POST['keterangan']);
  $harga = $obj->conn->real_escape_string($_POST['harga']);
  $stok = $obj->conn->real_escape_string($_POST['stok']);

  $format = explode(".", $_FILES['img']['name']);
  $img = "img-".round(microtime(true)).".".end($format);
  $sumber = $_FILES['img']['tmp_name'];
  $upload = move_uploaded_file($sumber, "./assets/images/".$img);
  if ($upload) {
      $objSarang->tambah($img, $nama_sarang, $keterangan, $harga, $stok);
      echo '<script> window.location="?view=kategori-sarang"; </script>';
  }
  else {
      echo '<script> alert ("error"); </script>';
      die;
  }
}
