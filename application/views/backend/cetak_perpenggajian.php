<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo base_url();?>"/>
  </head>
  <body onload="window.print()">
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
}

function Terbilang($x)   
 {   
  $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");   
  if ($x < 12)   
   return " " . $bilangan[$x];   
  elseif ($x < 20)   
   return Terbilang($x - 10) . "belas";   
  elseif ($x < 100)   
   return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);   
  elseif ($x < 200)   
   return " seratus" . Terbilang($x - 100);   
  elseif ($x < 1000)   
   return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);   
  elseif ($x < 2000)   
   return " seribu" . Terbilang($x - 1000);   
  elseif ($x < 1000000)   
   return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);   
  elseif ($x < 1000000000)   
   return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);    
 } 

?>
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
        <font size="4"><b><u> SLIP GAJI</u></b></font><br>
    </div>
    <br>
    <table border="1"width="100%" style="font-size: 14spx;">
   <tr>
                          <th>No. Slip</th>
                          <th>Kode Pegawai</th>
                          <th>Nama Lengkap</th>
                          <th>Tanggal Penggajian</th>
                        </tr>
                      </thead>
                        <tbody>
                                            <tr>
                                              
                                              <td><?= sprintf("%03d",$data['id_penggajian']) ?></td>
                                              <td><?php echo $data['kode_pegawai'];?></td> 
                                              <td><?php echo $data['nama_pegawai'];?></td>
                                              <td><?php echo tgl_indo($data['tgl_gaji']);?></td>
        </tr>
    </table>

    <br>
    <br>

      <table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
 
  <tr style="vertical-align: top; text-align: left;">
      <td width="200px"><b>PENGHASILAN</b></td>
      <td></td> 
 </tr>
  <tr style="vertical-align: top; text-align: left;">
      <td >Gaji Pokok</td>
      <td width="200px"></td>
      <td> <?php echo rupiah($data['gaji_pokok']);?></td> 
 </tr>
 <tr style="vertical-align: top; text-align: left;">
      <td > Tunjangan</td>
      <td ></td>
      <td > <?php echo rupiah($data['tunjangan']);?></td> 
 </tr>
  </tbody>
</div>
</table>

<hr>
  <table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
 <tr style="vertical-align: top; text-align: left;">
      <td width="200px"></td>
      <td width="200px"></td>
      <td > <?php $d1=$data['gaji_pokok']+$data['tunjangan']; echo rupiah($d1);?></td> 
 </tr>
  </tbody>
</div>
</table>

<br>
<table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
 
  <tr style="vertical-align: top; text-align: left;">
      <td width="200px"><b>POTONGAN</b></td>
      <td></td> 
 </tr>

  <tr style="vertical-align: top; text-align: left;">
      <td >BPJS</td>
      <td> <?php echo rupiah($data['bpjs']);?></td> 
 </tr>
  <tr style="vertical-align: top; text-align: left;">
      <td >Hutang</td>
      <td> <?php echo rupiah($data['hutang']);?></td> 
 </tr>

  </tbody>
</div>
</table>
<hr>
<table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
 <tr style="vertical-align: top; text-align: left;">
      <td width="200px"></td>
      <td></td>
      <td > <?php echo rupiah($data['bpjs']+$data['hutang']);?></td> 
 </tr>
  </tbody>
</div>
</table>

<table border="0"  style="margin-left: 80px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr style="vertical-align: top; text-align: left;">
      <td width="200px">TOTAL</td>
      <td width="200px"></td>
      <td > <?php echo rupiah($d1-($data['bpjs']+$data['hutang'])); ?></td> 
 </tr><!-- 
  <tr style="vertical-align: top; text-align: left;">
      <td width="200px">TERBILANG</td>
      <td ></td>
      <td> <?php// $ttt=terbilang($edit_penggajian['gaji_bersih']); echo strtoupper($ttt); ?></td> 
 </tr> -->
  </tbody>
</div>
</table>



<BR><BR>
<BR><BR>
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
