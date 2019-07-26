<?php

class User {

  private $mysqli;

  function __construct($mysqli){
    $this->mysqli = $mysqli;
  }

  public function data_user($id){
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM login WHERE ktp = $id ";
    $query = $db->query($sql);
    return $query;
  }

  public function register($ktp, $nama, $password_hash, $alamat, $pekerjaan, $jekel , $no_hp){
    $db = $this->mysqli->conn;
    $userdata = $db->query("SELECT * FROM login WHERE ktp = '$ktp' ");
    $cek = $userdata->num_rows;
      if ($cek > 0) {
        echo "KTP sudah terdaftar";
        die;
      }
    $db->query("INSERT INTO login VALUES('$ktp', '$password_hash', '$nama', '$alamat', '$pekerjaan', '$jekel', '$no_hp', 'user')") or die ($db->error);
  }

  public function login($ktp, $password){
    $db = $this->mysqli->conn;
    $userdata = $db->query("SELECT * FROM login WHERE ktp = '$ktp' ") or die ($db->error);
    $cek = $userdata->num_rows;
    $cek_2 = $userdata->fetch_array();
    $role = $cek_2['role'];
      if ($cek  == 1) {
            if (password_verify($password, $cek_2['password'])) {
                $_SESSION['user'] = $ktp; //session KTP
                $_SESSION['role'] = $role;
                return true;
            } else {
              return false; // password salah
            }

      }else {
        return false; //user tidak ada
      }
  }

  public function logout(){
    @$_SESSION['user'] == FALSE;
    unset($_SESSION);
    session_destroy();
  }


} // end class
