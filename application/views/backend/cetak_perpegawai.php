<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
    <div style="text-align: center;">
        <font size="4"><b><u> LAPORAN PEGAWAI</u></b></font><br>
    </div>
    <br>
    <br>
     <img  src="<?php echo base_url().'assets/image/'.$edit_pegawai['foto_pegawai'];?>" height="180" width="148" align="right"style="margin: 10px 30px 20px 20px;">
<table border="0"  style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 

  <tbody>
<tr>
      <td width="170px">Nama Pegawai</td>
      <td width="10px">: </td>
      <td><?php echo $edit_pegawai['nama_pegawai'];?></td>
      <td></td>
  </tr>
  <?php if(!empty($edit_pegawai['nip'])):?>
  <tr>
      <td width="170px">NIP</td>
      <td width="10px">: </td>
      <td><?php echo $edit_pegawai['nip'];?></td>
      <td></td>
  </tr>
   <?php endif;?>
  <tr>
      <td width="170px">Tempat, Tanggal Lahir</td>
      <td width="10px">: </td>
      <td><?php echo $edit_pegawai['tempat_lahir'];?>, <?php echo tgl_indo($edit_pegawai['tgl_lahir']);?></td>
      <td></td>
  </tr>

  <tr>
      <td width="170px">Jenis Kelamin</td>
      <td width="10px">: </td>
      <td><?php echo $edit_pegawai['jenis_kelamin'];?></td>
      <td></td>
  </tr>

  <tr>
      <td width="170px">Alamat</td>
      <td width="10px">: </td>
      <td><?php echo $edit_pegawai['alamat'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="170px">No Telp</td>
      <td width="10px">: </td>
      <td><?php echo $edit_pegawai['no_telp'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="170px">Tanggal Bergabung</td>
      <td width="10px">: </td>
      <td><?php echo tgl_indo($edit_pegawai['tgl_bergabung']);?></td>
      <td></td>
  </tr>
  <tr>
      <td width="170px">Jabatan</td>
      <td width="10px">: </td>
      <td><?php echo $edit_pegawai['nama_jabatan'];?></td>
      <td></td>
  </tr>


 </tbody>



</div>
</table>
<br>


    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

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
   
</body>

</html>

