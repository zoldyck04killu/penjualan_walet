
<form class="" action="" method="post">
  <div class="form-group">
   <label for="formGroupExampleInput">No KTP</label>
   <input type="text" class="form-control" name="ktp" id="formGroupExampleInput" placeholder="No Ktp"  required>
 </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
  </div>

    <input type="submit" name="login" class="btn btn-sm btn-info" value="Login">
    <a class="btn btn-success btn-sm" href="?view=register">Register</a>

</form>

<?php
if (isset($_POST['login'])) {
    $ktp = $obj->conn->real_escape_string($_POST['ktp']);
    $password = $obj->conn->real_escape_string($_POST['password']);

    $login = $objUser->login($ktp, $password);
    if ($login) {
        echo '<script>
        window.location="?view=home";
         </script>';
    }else {
      echo '<script> alert("error login"); </script>';
    }
}


// login user
// ktp = 111 pass = aldi
// ktp = 123 pass = 123
//
// untuk admin
// ktp = admin pass = admin
