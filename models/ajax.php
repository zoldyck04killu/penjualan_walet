<?php

  require_once '../config/config.php';
  require_once '../config/connection.php';
  $obj = new Connection($host, $user, $pass, $db);

  if ($_GET['proses'] == 'stok') {
          $mysqli = $obj->conn;
          $id = $_GET['id'];
          $sql = "SELECT harga, stok FROM sarang WHERE id=$id";
          $query = $mysqli->query($sql);
          $stok_sarang = $query->fetch_object();
          // var_dump($stok_sarang);
          // echo $stok_sarang['stok'];
          $data = array(
                        'stok' => $stok_sarang->stok,
                        'harga' => $stok_sarang->harga,
                        );
          echo json_encode($data);
  }

?>
