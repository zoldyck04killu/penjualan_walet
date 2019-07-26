
<?php if (@$_SESSION['role'] == 'admin') { ?>
    <div class="tambah_sarang">
      <a class="btn btn-info btn-sm" href="?view=tambah-kategori">Tambah Kategori Sarang</a>
    </div>
<?php } ?>


<!-- Perulangan dari database -->
<?php
$data = $objSarang->tampil();
while ($a = $data->fetch_object()) {
 ?>

<div class="content">
  <center>
    <img width="300" height="200" src="<?php echo base_url(); ?>assets/images/<?php echo $a->img; ?>" alt="">
  </center>

  <div class="nama">
  <?php echo $a->nama_sarang; ?>
  </div>

  <div class="ket">
    <?php echo $a->keterangan; ?>
  </div>

  <div class="harga">
    Harga : <?php echo "Rp. ".number_format($a->harga, 0, ".", "."); ?>
  </div>

  <div class="">
    Stok : <?php echo $a->stok."Kg"; ?>
  <?php if (@$_SESSION['role'] == 'admin') { ?>
      <form class="" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $a->id; ?>">
        <input type="number" name="stokTambah" value="" required>
        <input type="submit" name="tambahStok" class="btn btn-sm btn-info" value="Update Stok">
      </form>
  <?php } ?>
<?php
if (isset($_POST['tambahStok'])) {
    $id = $_POST['id'];
    $stokBaru = $_POST['stokTambah'];
    // $stokBaru = $stokTambah + $a->stok;
    // echo $stokBaru;
    // die();
    $objSarang->upStok($id, $stokBaru);
    echo '<script>window.location="?view=kategori-sarang"; </script>';
}
 ?>

  </div>
  <?php if (@$_SESSION['role'] == 'admin') { ?>
      <a class="btn btn-warning btn-sm" href="?view=edit-kategori&id=<?php echo $a->id; ?>">Edit</a>
      <a class="btn btn-danger btn-sm" href="?view=hapus-kategori&id=<?php echo $a->id; ?>">Delete</a>
  <?php } ?>
</div>

<?php } ?>
<!-- End Perulangan -->
