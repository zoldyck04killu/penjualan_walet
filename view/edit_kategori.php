<?php
$id = $_GET['id'];
$data = $objSarang->tampil($id);
$a = $data->fetch_object();
?>

<form class="" action="" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $a->id; ?>" readonly>
  <img width="300" height="200" src="<?php echo base_url(); ?>assets/images/<?php echo $a->img; ?>" alt="">
  <input type="file" name="img"> <br>
  <input type="text" name="nama_sarang" value="<?php echo $a->nama_sarang; ?>"> <br>
  <textarea name="keterangan" rows="8" cols="80"><?php echo $a->keterangan; ?></textarea> <br>
  <input type="number" name="harga" value="<?php echo $a->harga; ?>"> <br>
  <input type="number" name="stok" value="<?php echo $a->stok; ?>"> <br>
  <input type="submit" class="btn btn-sm btn-primary" name="edit" value="Simpan">
</form>

<?php
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $pic = $_FILES['img']['name'];
    $nama_sarang = $obj->conn->real_escape_string($_POST['nama_sarang']);
    $keterangan = $obj->conn->real_escape_string($_POST['keterangan']);
    $harga = $obj->conn->real_escape_string($_POST['harga']);
    $stok = $obj->conn->real_escape_string($_POST['stok']);

    $format = explode(".", $_FILES['img']['name']);
    $img = "img-".round(microtime(true)).".".end($format);
    $sumber = $_FILES['img']['tmp_name'];

      if ($pic == '') {
          $objSarang->edit($id, $nama_sarang, $keterangan, $harga, $stok);
          echo '<script> window.location="?view=kategori-sarang"; </script>';
      }
      else {
        $img_awal = $objSarang->tampil($id);
        $output = $img_awal->fetch_object();
        unlink('./assets/images/'.$output->img);
        $upload = move_uploaded_file($sumber, "./assets/images/".$img);

            if ($upload) {
                $objSarang->editImg($id, $img, $nama_sarang, $keterangan, $harga, $stok);
                echo '<script> window.location="?view=kategori-sarang"; </script>';
            }
            else {
                echo '<script> alert ("error"); </script>';
                die;
            }
      }
}
