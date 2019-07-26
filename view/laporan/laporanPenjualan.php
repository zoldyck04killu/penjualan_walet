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
$pdf->SetHeaderData('gallery.jpg', 20, 'Usaha Mandiri Walet',
            "Alamat : Jl. Saka Permai RT 004 RW 002 Kel.Mabuun Kec. Murung Pudak Kab. Tabalong \nTelp. 0812-5052-991", array(48,89,112), array(48,89,112));

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

// $pdf->writeHTMLCell(0, 0, '', '', '<H2>NOTA PEMBELIAN</H2>' , 0, 2, 0, true, 'C', true);

$html=<<<EOD
    <center> <h1> Laporan Penjualan </h1> </center>
    <table border="1">
      <tr align="center" style="font-weight: bold;">
        <td width="100">Ktp</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td width="110">No Hp</td>
        <td width="100">Tanggal <br> Pembelian</td>
        <td width="130">Nama Barang</td>
        <td width="90">Jumlah Pesanan</td>
        <td width="130">Harga</td>
        <td>Status</td>
      </tr>
    </table>
EOD;

$html2=<<<EOD
  <table border="1" cellpadding="4">
      <tr>
        <td width="100">
EOD;
$html5=<<<EOD
        </td>
      </tr>
    </table>
EOD;
$pdf->SetX(10);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);

$no = 1;
$a = $_POST['tgl_a'];
$b = $_POST['tgl_b'];
$sql        = $objBeli->laporanPenjualan($a,$b);
	while ($data = $sql->fetch_object()) {
      $pdf->SetX(10);
      $pdf->writeHTMLCell(0, 0, '', '', $html2.''.
            $data->ktp.'</td>
            <td>'.$data->nama.'</td>
            <td>'.$data->alamat.'</td>
            <td width="110">'.$data->no_hp.'</td>
            <td width="100">'.$data->tanggal_pembelian.'</td>
            <td width="130">'.$data->nama_sarang.'</td>
            <td width="90">'.$data->jumlah_pesanan.'</td>
            <td width="130"> Rp.'.number_format($data->harga).'</td>
            <td>'.$data->status.'
            '.$html5 , 0, 1, 0, true, '', true);
    $no++;
  }


$pdf->Ln(10);
$pdf->SetX(20);
$pdf->Cell(60,0, 'Laporan dari Tanggal '.$a.' Sampai '.$b, 0, 1, 'L', 0, '', 0);

// $pdf->Ln(1);
// $pdf->SetX(230);
// $pdf->Cell(60,0, 'Bidan, ', 0, 1, 'C', 0, '', 0);
//
// $pdf->Ln(20);
// $pdf->SetX(230);
// $pdf->Cell(60,0, 'Mainani Hariani, S.ST', 0, 1, 'L', 0, '', 0);
ob_end_clean();
$pdf->Output()

?>
