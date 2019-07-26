<h3>Profile Pembeli</h3>
<?php
$data = $objUser->data_user($_GET['ktp']);
while ($a = $data->fetch_object()) {
?>

      <table class="table table-striped mx-5">
        <tr>
          <td scope="row">Ktp</td>
          <td>:</td>
          <td><?= $a->ktp ?></td>
        </tr>
        <tr>
          <td scope="row">Nama</td>
          <td>:</td>
          <td><?= $a->nama ?></td>
        </tr>
        <tr>
          <td scope="row">Alamat</td>
          <td>:</td>
          <td><?= $a->alamat ?></td>
        </tr>
        <tr>
          <td scope="row">Pekerjaan</td>
          <td>:</td>
          <td><?= $a->pekerjaan ?></td>
        </tr>
        <tr>
          <td scope="row">Jenis Kelamin</td>
          <td>:</td>
          <td><?= $a->jekel ?></td>
        </tr>
        <tr>
          <td scope="row">No Hp</td>
          <td>:</td>
          <td><?= $a->no_hp ?></td>
        </tr>
      </table>
<?php
}
?>
