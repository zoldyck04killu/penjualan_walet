<?php
require_once 'config/config.php';
require_once 'config/connection.php';
include('models/user.php');
include('models/sarang.php');
include('models/pembelian.php');
$obj = new Connection($host, $user, $pass, $db);
$objUser = new User ($obj);
$objSarang = new Sarang ($obj);
$objBeli = new Pembelian ($obj);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link href="<?php echo base_url()?>assets/bootstrap-4.0.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ScriptKiddie.js"></script>

    <script src="<?php echo base_url(); ?>assets/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>
  </head>
  <body>
    <div class="Header">
        Usaha Mandiri Walet Wilayah Tabalong
    </div>
    <div class="menu">
      <a href="<?php echo base_url() ?>"> <div class="sub-menu">
        Home
      </div> </a>

      <?php if (isset($_SESSION['user'])){ ?>
        <a href="?view=logout"> <div class="sub-menu">
          LogOut
        </div> </a>
      <?php } else { ?>
        <a href="?view=login"> <div class="sub-menu">
          Login
        </div> </a>
      <?php } ?>

      <a href="?view=kategori-sarang"> <div class="sub-menu">
        Kategori Sarang
      </div> </a>

<?php if (isset($_SESSION['user'])) { ?>

  <?php if (@$_SESSION['role'] == 'user') {?>
      <a href="?view=pembelian"> <div class="sub-menu">
        Pembelian
      </div> </a>
      <a href="?view=status-pembelian&id=<?php echo $_SESSION['user']; ?>"> <div class="sub-menu">
        Status Pembelian
      </div> </a>
      <a href="?view=cara-pemesanan"> <div class="sub-menu">
      Cara Pemesanan
    </div> </a>

  <?php  } ?>

  <?php if (@$_SESSION['role'] == 'admin') {?>
      <a href="?view=penjualan"> <div class="sub-menu">
        Data Penjualan Walet
      </div> </a>
  <?php  } ?>


<?php } ?>

      <a href="?view=about"> <div class="sub-menu">
        About
      </div> </a>
    </div>
    <div class="hal">


<?php include('page/page.php'); ?>


<script type="text/javascript">

$(document).ready( function () {
  $('#table').DataTable();
} );

</script>
    </div>
  </body>
</html>
