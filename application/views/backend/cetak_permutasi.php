<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keputusan Mutasi</title>
</head>
  <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}
?>

  <?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>
<body onLoad="window.print()">
   <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <font style="font-size: 30px;"><img width="220px" src="<?= base_url() ?>assets/logo2.png"></font> <br>
                <font size="3">JL Pramuka, 16 RT 020, Pengambangan, Banjarmasin Timur, Kota Banjarmasin, Kalimantan Selatan 70653</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>
    <br>

    <br>

    <div style="text-align: center;">
        <font size="4"><b><u>SURAT KEPUTUSAN MUTASI</u></b></font><br>
        <font size="2">Nomor : <?= sprintf("%03d",$data['id_mutasi']) ?>/KM-GMK-TL/2021</font>
    </div>
    <br>
    Yang bertanda tangan di bawah ini :
    <table border="0"  style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr >
      <td width="140px" >Nama</td>
      <td width="10px">:</td>
      <td ></td>
  </tr>
  
  <tr>
      <td>Jabatan</td>
      <td>:</td>
      <td>MANAGER HRD </td>
  </tr>
 
  </tbody>
</div>
</table>
<br>
   Yang dengan ini bertindak atas nama PT-GMK, memutuskan untuk melakukan mutasi terhadap Pegawai di bawah ini:
   <table border="0"  style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr >
      <td width="140px" >Nama</td>
      <td width="10px">:</td>
      <td ><?= $data['nama_pegawai'] ?></td>
  </tr>

  <tr>
      <td>Kode Pegawai</td>
      <td>:</td>
      <td><?= $data['kode_pegawai'] ?></td>
  </tr>

   <tr >
      <td width="140px" >Jabatan</td>
      <td width="10px">:</td>
      <td ><?= $data['nama_jabatan'] ?></td>
  </tr>

  <!-- <tr style="vertical-align: top;">
      <td width="140px" >Unit Kerja</td>
      <td width="10px">:</td>
      <td >PT. GMK BANJARMASIN</td>
  </tr> -->

 
  </tbody>
</div>
</table>
<br>Adapun jabatan serta unit kerja yang baru adalah sebagai berikut:
    <table border="0"  style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr >
      <td width="140px" >Jabatan</td>
      <td width="10px">:</td>
      <td ><?= $data['jabatan_saat_mutasi'] ?></td>
  </tr>
  <tr >
      <td width="140px" >Tujuan Mutasi</td>
      <td width="10px">:</td>
      <td ><?= strtoupper($data['tujuan']) ?></td>
  </tr>


 
  </tbody>
</div>
</table>
    <br>Proses mutasi ini mulai efektif pada <?= tgl_indo($data['tanggal_efektif']) ?>. Oleh karena itu, mohon kepada pegawai yang bersangkutan serta <?= $data['tujuan'] ?> untuk mempersiapkan segala sesuatunya sebelum tanggal tersebut.

    <br><br><br>

    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px;">
        <label>
            Banjarmasin, <?= tgl_indo(date('Y-m-d')) ?>
            <br>
            <p style="text-align: center;">
                <b>MANAGER HRD</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>_______________________</u></b><br>
               
            </p>
        </label>
    </div>

    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

    
   
</body>

</html>