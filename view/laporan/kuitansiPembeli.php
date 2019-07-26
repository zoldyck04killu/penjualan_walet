<?php

require_once 'config/autoload.php';
// require_once '../../vendor/MYPDF.php';

require_once 'config/config.php';
require_once 'config/connection.php';
// include('models/pembelian.php');
$obj = new Connection($host, $user, $pass, $db);
$objBeli = new Pembelian ($obj);

	// error_reporting(E_ALL ^ E_DEPRECATED);
	// $server = "localhost";
	// $username = "root";
	// $password = "4";
	// $database = "aplikasi_bidan";
  //
	// $koneksi = new mysqli($server,$username,$password,$database) or die("Koneksi gagal");


define('K_PATH_IMAGES', 'assets/images/');

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, True, 'UTF-8', false);

// document information
$pdf->SetCreator('Kwitansi Penjualan');
$pdf->SetTitle('Kwitansi Penjualan');
$pdf->SetSubject('Kwitansi Penjualan');

// header & footer data
$pdf->SetHeaderData('gallery.jpg', 15, 'Usaha Mandiri Walet',
            "\nAlamat : Jl. Saka Permai RT 004 RW 002 Kel. Mabuun Kec. Murung Pudak Kab. Tabalong  \nTelp. 0812-5052-991", array(48,89,112), array(48,89,112));

// $pdf->SetHeaderData('logo.png', 30, 'BIDAN PRAKTEK MANDIRI (BPM)', PDF_HEADER_STRING);
$pdf->SetFooterData( array(0, 0, 0), array(0, 0, 0));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP + 20, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set page break
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set scaling image
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// font subsetting
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 14, '', true);

$pdf->AddPage();

$html=<<<EOD
    <table border="1">
      <tr align="center" style="font-weight: bold;">
        <td width="100">Tanggal</td>
        <td>Kode<br>Barang</td>
        <td>Nama Sarang </td>
        <td>Jumlah Dipesan</td>
        <td>Status</td>
        <td>Total</td>
      </tr>
    </table>
EOD;

$html2=<<<EOD
  <table border="1">
      <tr align="center">
        <td width="100">
EOD;
$html5=<<<EOD
        </td>
      </tr>
    </table>
EOD;

$kodeStruk  = $_GET['id'];
$sql        = $objBeli->laporan($kodeStruk);
$data       = $sql->fetch_object();
$pdf->writeHTMLCell(0, 0, '', '', '<H2>NOTA PEMBELIAN</H2>' , 0, 2, 0, true, 'C', true);

$pdf->writeHTMLCell(0, 0, '', 60, '
<table cellpadding="4">
<tr>
    <td width="150px">Nama</td>
    <td width="50px" style="text-align:center;">:</td>
    <td width="700px">'.$data->nama.'</td>
</tr>
<tr>
    <td width="150px">Alamat</td>
    <td width="50px" style="text-align:center;">:</td>
    <td>'.$data->alamat.'</td>
</tr>
<tr>
    <td width="150px">No Hp</td>
    <td width="50px" style="text-align:center;">:</td>
    <td>'.$data->no_hp.'</td>
</tr>
<tr>
    <td width="150px">Kode Pembelian</td>
    <td width="50px" style="text-align:center;">:</td>
    <td>'.$data->kode.'</td>
</tr>
<tr>
    <td width="150px">Tanggal Pembelian</td>
    <td width="50px" style="text-align:center;">:</td>
    <td>'.$data->tanggal_pembelian.'</td>
</tr>
</table>
' , 0, 1, 0, true, '', true);

$pdf->Ln(10); // margin atas
$pdf->writeHTMLCell(0, 0, '', '', '<hr/>' , 0, 1, 0, true, '', true);

$pdf->Ln(5); // margin atas
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, '', '', $html2.'
          '.$data->tanggal_pembelian.'</td>
          <td style="text-align:center;">'.$data->nama_barang.'</td>
          <td style="text-align:center;">'.$data->nama_sarang.'</td>
          <td>'.$data->jumlah_pesanan.'kg</td>
          <td>'.$data->status.' Bayar</td>
          <td>Rp.'.number_format($data->harga, 0, ".", ".").'
          '.$html5 , 0, 1, 0, true, '', true);

$pdf->Ln(10); // margin atas
$pdf->SetX(230); // margin kiri
$pdf->Cell(60,0, 'Tanjung, '.date("d-m-Y"), 0, 1, 'L', 0, '', 0); // untuk tanggal

ob_end_clean(); // membersihkan aoutput yg lebih dulu
$pdf->Output()

?>
