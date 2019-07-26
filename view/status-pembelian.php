<h3>Rincian Pembelian <?php echo $_SESSION['user']; ?></h3>
      <table class="table table-striped text-center" id="table">
        <thead>
        <tr>
          <th>Tanggal Pesan</th>
          <th>Kode Barang</th>
          <th>Jumlah Pesanan</th>
          <th>Total Harga</th>
          <th>Kode Pembelian</th>
          <th>Status Pembayaran</th>
          <th>Pilihan</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $id = $_GET['id'];
      $data = $objBeli->daftarPembelianUser($id);
      while ($a = $data->fetch_object()) {
       ?>
        <tr>
          <td><?=$a->tanggal_pembelian; ?></td>
          <td><?=$a->nama_sarang; ?></td>
          <td><?=$a->jumlah_pesanan; ?></td>
          <td><?= "Rp. ".number_format($a->harga, 0, ".", "."); ?></td>
          <td><?=$a->id; ?></td>
          <td><?=$a->status.' Bayar'; ?></td>
          <td>
            <a href="?view=cetak-nota&id=<?= $a->id ?>" class="btn btn-sm btn-primary">Cetak Nota</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
      </table>
