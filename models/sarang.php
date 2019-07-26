<?php

class Sarang {

  private $mysqli;

  function __construct($mysqli){
    $this->mysqli = $mysqli;
  }

  public function tampil_jenis_sarang(){
    $db = $this->mysqli->conn;
    $sql = "SELECT id,nama_sarang FROM sarang";
    $query = $db->query($sql);
    return $query;
  }

  public function tampil($id = NULL){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM sarang";
      if ($id != null) {
        $sql .= " WHERE id = '$id' ";
      }
    $query = $db->query($sql);
    return $query;
  }

  public function tambah($img, $nama_sarang, $keterangan, $harga, $stok){
    $db = $this->mysqli->conn;
    $db->query("INSERT INTO sarang VALUES('', '$img', '$nama_sarang', '$keterangan', '$harga', '$stok')") or die ($db->error);
  }

  public function hapus($id){
    $db = $this->mysqli->conn;
    $db->query("DELETE FROM sarang WHERE id = '$id' ") or die ($db->error);
  }

  public function edit($id, $nama_sarang, $keterangan, $harga, $stok){
    $db = $this->mysqli->conn;
    $db->query("UPDATE sarang SET nama_sarang = '$nama_sarang', keterangan = '$keterangan', harga = '$harga', stok = '$stok' WHERE id = '$id' ") or die ($db->error);
  }

  public function editImg($id, $img, $nama_sarang, $keterangan, $harga, $stok){
    $db = $this->mysqli->conn;
    $db->query("UPDATE sarang SET img = '$img', nama_sarang = '$nama_sarang', keterangan = '$keterangan', harga = '$harga', stok = '$stok' WHERE id = '$id' ") or die ($db->error);
  }

  public function upStok($id, $stokBaru){
    $db = $this->mysqli->conn;
    $db->query("UPDATE sarang SET stok = '$stokBaru' WHERE id = '$id' ") or die ($db->error);
  }

}
