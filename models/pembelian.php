<?php

class Pembelian {

    private $mysqli;

    function __construct($mysqli){
      $this->mysqli = $mysqli;

    }

    public function join(){
      $db = $this->mysqli->conn;
      $sql = "SELECT login.ktp, login.nama, login.alamat, login.no_hp,
      penjualan.id, penjualan.tanggal_pembelian, penjualan.nama_barang, penjualan.jumlah_pesanan, penjualan.harga, penjualan.kode, penjualan.status, sarang.nama_sarang
      FROM login
      INNER JOIN penjualan
      ON login.ktp = penjualan.ktp
      INNER JOIN sarang
      ON sarang.id = penjualan.nama_barang
      -- WHERE penjualan.status = 'Belum'
      ORDER BY ktp ASC";
      $query = $db->query($sql) or die ($db->error);
      return $query;
    }

    public function laporan($kodeStruk){
      $db = $this->mysqli->conn;
      $sql = "SELECT login.ktp, login.nama, login.alamat, login.no_hp,
      penjualan.tanggal_pembelian, penjualan.nama_barang, penjualan.jumlah_pesanan, penjualan.harga, penjualan.kode, penjualan.status, sarang.nama_sarang
      FROM login
      INNER JOIN penjualan
      ON login.ktp = penjualan.ktp
      INNER JOIN sarang
      ON sarang.id = penjualan.nama_barang
      WHERE penjualan.id = '$kodeStruk'";

      $query = $db->query($sql) or die ($db->error);
      return $query;
    }

    public function laporanPenjualan($a, $b){
      $db = $this->mysqli->conn;
      $sql = "SELECT login.ktp, login.nama, login.alamat, login.no_hp,
      penjualan.tanggal_pembelian, sarang.nama_sarang, penjualan.jumlah_pesanan, penjualan.harga, penjualan.status
      FROM login
      INNER JOIN penjualan
      ON login.ktp = penjualan.ktp
      INNER JOIN sarang
      ON sarang.id = penjualan.nama_barang
      WHERE penjualan.tanggal_pembelian
      BETWEEN '$a' AND '$b'";

      $query = $db->query($sql) or die ($db->error);
      return $query;
    }

    public function daftarPembelianUser($id){
      $db = $this->mysqli->conn;
      $sql = "SELECT penjualan.tanggal_pembelian, sarang.nama_sarang, penjualan.jumlah_pesanan,
      penjualan.harga, penjualan.status, penjualan.id
      FROM penjualan
      INNER JOIN sarang
      ON sarang.id = penjualan.nama_barang
      WHERE penjualan.ktp = $id";

      $query = $db->query($sql) or die ($db->error);
      return $query;
    }


      public function tampil($id = NULL){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM penjualan";
          if ($id != null) {
            $sql .= " WHERE ktp = '$id' ";
          }
        $query = $db->query($sql);
        return $query;
      }

      public function data_last(){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM penjualan ORDER BY id DESC";
        $query = $db->query($sql);
        return $query;
      }



    public function tambah($ktp, $tgl, $nama, $jml, $harga, $kode, $status){
      $db = $this->mysqli->conn;
      $userdata = $db->query("SELECT * FROM sarang WHERE id = '$nama' ");
      $count = $userdata->fetch_array();
        if ($count['stok'] <= 0) {
          echo '<script>alert("Stok tidak tersedia/habis");</script>';
          die;
        }

      $db->query("INSERT INTO penjualan (ktp,tanggal_pembelian,nama_barang,jumlah_pesanan,harga,kode,status)
      VALUES ('$ktp', '$tgl', '$nama', '$jml', '$harga', '$kode', '$status')") or die ($db->error);    }

    public function konfirmasi($id, $status){
      $db = $this->mysqli->conn;
      $db->query("UPDATE penjualan SET status = '$status' WHERE id = '$id' ") or die ($db->error);
    }


}
