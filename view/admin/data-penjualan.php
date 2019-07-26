<?php if(isset($_SESSION['user'])){ ?>

  <h1>DATA PENJUALAN</h1>

  <!-- Modal Profile user -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><?= $_GET['id'] ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <p>
    <button type="button" class="btn btn-sm btn-primary" name="button" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#cetak">Cetak Per tanggal</button>
  </p>
<div class="table-responsive">
  <table class="table table-striped text-center" id="table">
    <thead>
      <tr>
        <th scope="col">No KTP</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">No HP</th>
        <th scope="col">Tanggal Beli</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Jumlah Kg</th>
        <th scope="col">Harga</th>
        <th scope="col">Kode Pembelian</th>
        <th scope="col">Status Pembayaran</th>
        <th scope="col">Pilih</th>
      </tr>
    </thead>
    <tbody>
  <?php
$data = $objBeli->join();
while ($a = $data->fetch_object()) {
   ?>
   <tr>
     <td><?=$a->ktp; ?></td>
     <td> <a href="?view=profile_user&ktp=<?=$a->ktp; ?>" > <?=$a->nama; ?> </a></td>
     <td><?=$a->alamat; ?></td>
     <td><?=$a->no_hp; ?></td>
     <td><?=$a->tanggal_pembelian; ?></td>
     <td><?=$a->nama_sarang; ?></td>
     <td><?=$a->jumlah_pesanan; ?></td>
     <td><?= "Rp. ".number_format($a->harga, 0, ".", "."); ?></td>
     <td><?=$a->kode; ?></td>
     <td><?=$a->status.' Bayar'; ?></td>
     <td>
       <form class="" action="" method="post">
         <input type="hidden" name="id" value="<?php echo $a->id; ?>">
         <input type="submit" name="konfirmasi" class="btn btn-sm btn-primary" value="Konfirmasi Pembayaran">
       </form>
<?php
if (isset($_POST['konfirmasi'])) {
    $id = $_POST['id'];
    $status = "Sudah";
      $objBeli->konfirmasi($id, $status);
        echo '<script>window.location="?view=penjualan"; </script>';
}
 ?>
     </td>
   </tr>
<?php } ?>
        </tbody>
    </table>
</div>


<!--- modal cetak -->
  <div class="modal fade" id="cetak">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><center>Cetak Per Tanggal</center></h4>
        </div>
        <div class="modal-body">
          <div id="row">
              </div>
<form action="?view=cetak-laporan" method="post" target="_blank">
<table>
  <tr>
    <td>
      <div class="form-group">Dari Tanggal</div>
    </td>
    <td align="center" width="5%">
      <div class="form-group">:</div>
    </td>
    <td>
      <div class="form-group">
        <input type="date" class="form-control" name="tgl_a" required>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="form-group">Sampai Tanggal</div>
    </td>
    <td align="center" width="5%">
      <div class="form-group">:</div>
    </td>
    <td>
      <div class="form-group">
        <input type="date" class="form-control" name="tgl_b" required>
      </div>
    </td>
  </tr>
    <td></td>
    <td></td>
    <td>
        <input type="submit" name="cetak" class="btn btn-primary bt-sm" value="Cetak Data">
      </td>
</table>
  </form>

<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
</div>


<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
<?php
}

?>
