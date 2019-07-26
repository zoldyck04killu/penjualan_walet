<?php

if (@$_GET['view'] == '' || @$_GET['view'] == 'home') {
    include 'view/home.php';
}
elseif (@$_GET['view'] == 'login') {
    include 'view/login.php';
}
elseif (@$_GET['view'] == 'cara-pemesanan') {
    include 'view/cara-pemesanan.php';
}
elseif (@$_GET['view'] == 'register') {
    include 'view/register.php';
}elseif (@$_GET['view'] == 'kategori-sarang') {
    include 'view/kategori_sarang.php';
}
elseif (@$_GET['view'] == 'pembelian') {
    include 'view/pembelian.php';
}
elseif (@$_GET['view'] == 'penjualan') {
    include 'view/admin/data-penjualan.php';
}elseif (@$_GET['view'] == 'about') {
    include 'view/about.php';
}elseif (@$_GET['view'] == 'logout') {
    $objUser->logout();
    echo '<script>
    window.location="?view=login";
     </script>';
}elseif (@$_GET['view'] == 'tambah-kategori') {
    include 'view/tambah_kategori.php';
}
elseif (@$_GET['view'] == 'hapus-kategori') {
    $id = $_GET['id'];
    $img = $objSarang->tampil($id);
    $data = $img->fetch_object();
    unlink('./assets/images/'.$data->img);
    $objSarang->hapus($id);
    echo '<script> window.location="?view=kategori-sarang"; </script>';
}
elseif (@$_GET['view'] == 'edit-kategori') {
    include 'view/edit_kategori.php';
}elseif (@$_GET['view'] == 'status-pembelian') {
    include 'view/status-pembelian.php';
}elseif (@$_GET['view'] == 'cetak-nota') {
    include 'view/laporan/kuitansiPembeli.php';
}elseif (@$_GET['view'] == 'cetak-laporan') {
    include 'view/laporan/laporanPenjualan.php';
}
elseif (@$_GET['view'] == 'profile_user') {
    include 'view/profile-user.php';
}

else {
    echo "404 not found";
}
