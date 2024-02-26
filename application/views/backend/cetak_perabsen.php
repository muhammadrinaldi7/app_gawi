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

        <font size="4"><b><u>LAPORAN ABSENSI PEGAWAI</u></b></font><br>
        <font size="4" style="text-transform:uppercase;"><b><u>PERIODE <?php echo tgl_indo($tgl1);?> SAMPAI DENGAN <?php echo tgl_indo($tgl2);?></u></b></font>
    </div>
    <br>

    <br>
    <table border="1" cellspacing="0" width="100%">
        <thead style="background-color: #333; color: #fff; text-align: center;">
                 <tr>
                          <th width="10px">No</th>
                          <th width="50px">Kode Pegawai</th>
                          <th width="300px">Nama Pegawai</th>
                          <th width="25px">HADIR</th>
                          <th width="25px">SAKIT</th>
                          <th width="25px">IZIN</th>
                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0; foreach($this->db->get("pegawai")->result() as $row): ?>
                        <tr>
                          <td align="center"><?php echo ++$no; ?></td>
              <td><?php echo $row->nip; ?></td>
              <td><?php echo $row->nama_pegawai;?></td>
              <?php 
                  $id_pegawai=$row->id_pegawai;
                  $jum_h=$this->db->query("select * from absen_masuk where id_pegawai='$id_pegawai' AND status_kehadiran ='HADIR' AND date(tgl_waktu_masuk) BETWEEN '$tgl1' AND '$tgl2' ")->num_rows();
                  $jum_s=$this->db->query("select * from absen_masuk where id_pegawai='$id_pegawai' AND status_kehadiran ='SAKIT' AND date(tgl_waktu_masuk) BETWEEN '$tgl1' AND '$tgl2' ")->num_rows();
                  $jum_i=$this->db->query("select * from absen_masuk where id_pegawai='$id_pegawai' AND status_kehadiran ='IZIN' AND date(tgl_waktu_masuk) BETWEEN '$tgl1' AND '$tgl2' ")->num_rows();
              ?>
              <td><?php echo $jum_h;?></td>
              <td><?php echo $jum_s;?></td>
              <td><?php echo $jum_i;?></td>
                      
            
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

