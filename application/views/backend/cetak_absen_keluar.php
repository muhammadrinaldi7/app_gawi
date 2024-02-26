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
        <font size="4"><b><u>LAPORAN ABSEN KELUAR</u></b></font><br>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%">
       <thead style="background-color: #333; color: #fff; text-align: center; font-size:11px;">
               <tr>
                          <th>No.</th>
                           <th>Kode Pegawai</th>
                          <th>Nama Pegawai</th>
                          <th>Tanggal Waktu Masuk</th>
                          <th>Tanggal Waktu Keluar</th>
                          <th>Status Keluar</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Keterangan</th>

                        </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; ?>
              <?php foreach ($data_absen_keluar->result_array() as $i) :
                $id_absen_keluar=$i['id_absen_keluar'];
            
              ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                                        <td><?php echo $i['kode_pegawai'];?></td> 
                                              <td><?php echo $i['nama_pegawai'];?></td>
                                              <td><?php echo tgl_indo(date('Y-m-d',strtotime($i['tgl_waktu_masuk'])));?>, <?php echo date('H:i',strtotime($i['tgl_waktu_masuk']));?></td>
                                              <td><?php echo tgl_indo(date('Y-m-d',strtotime($i['tgl_waktu_keluar'])));?>, <?php echo date('H:i',strtotime($i['tgl_waktu_keluar']));?></td>
                                              <td><?php echo $i['status_keluar'];?></td>
                                              <td><?php echo $i['lat_keluar'];?></td>
                                              <td><?php echo $i['long_keluar'];?></td>
                                              <td><?php echo $i['ket_keluar'];?></td>
                      
            
            </tr>
            <?php endforeach ?>
                
                </tbody>
              </table>

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

