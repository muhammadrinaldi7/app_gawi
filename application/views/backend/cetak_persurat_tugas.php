<!DOCTYPE html>
<html lang="en">
<?php
    $tgl1 = new DateTime($data['tanggal_mulai']);
    $tgl2 = new DateTime($data['tanggal_selesai']);
    $ddd = $tgl2->diff($tgl1)->days + 1;

    function Terbilang($nilai)
{
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($nilai == 0) {
        return "Kosong";
    } elseif ($nilai < 12 & $nilai != 0) {
        return "" . $huruf[$nilai];
    } elseif ($nilai < 20) {
        return Terbilang($nilai - 10) . " Belas ";
    } elseif ($nilai < 100) {
        return Terbilang($nilai / 10) . " Puluh " . Terbilang($nilai % 10);
    } elseif ($nilai < 200) {
        return " Seratus " . Terbilang($nilai - 100);
    } elseif ($nilai < 1000) {
        return Terbilang($nilai / 100) . " Ratus " . Terbilang($nilai % 100);
    } elseif ($nilai < 2000) {
        return " Seribu " . Terbilang($nilai - 1000);
    } elseif ($nilai < 1000000) {
        return Terbilang($nilai / 1000) . " Ribu " . Terbilang($nilai % 1000);
    } elseif ($nilai < 1000000000) {
        return Terbilang($nilai / 1000000) . " Juta " . Terbilang($nilai % 1000000);
    } elseif ($nilai < 1000000000000) {
        return Terbilang($nilai / 1000000000) . " Milyar " . Terbilang($nilai % 1000000000);
    } elseif ($nilai < 100000000000000) {
        return Terbilang($nilai / 1000000000000) . " Trilyun " . Terbilang($nilai % 1000000000000);
    } elseif ($nilai <= 100000000000000) {
        return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";
    }
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keputusan Cuti</title>
</head>

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
        <font size="4"><b><u>SURAT TUGAS</u></b></font><br>
       <font size="2">Nomor : <?= sprintf("%03d",$data['id_surat_tugas']) ?>/ST-GMK-TL/2022</font>
    </div>
    <br>
    <p style="margin:30px;">
    <?php echo $data['latar_belakang_penugasan'];?>, maka dengan ini menugaskan kepada :
</p>
    <table border="0"  style="margin-left: 30px; font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr >
      <td width="140px" >Nama</td>
      <td width="10px">:</td>
      <td ><?= $data['nama_pegawai'] ?></td>
  </tr>
  <br>
  <tr>
      <td>Kode Pegawai</td>
      <td>:</td>
      <td><?= $data['kode_pegawai'] ?></td>
  </tr>

  <tr>
      <td>Jabatan</td>
      <td>:</td>
      <td><?= $data['nama_jabatan'] ?></td>
  </tr>
  </tbody>
</div>
</table>
<br>
<br>
<p style="margin:30px;">
  <?php echo $data['tujuan_penugasan'];?>, terhitung mulai tanggal <?php echo tgl_indo($data['tanggal_mulai']);?> s/d <?php echo tgl_indo($data['tanggal_selesai']);?>.
  <br><br>
Segala biaya yang ditimbulkan dari pelaksanaan tugas ini akan dibebankan kepada biaya proyek pembangunan yang bersangkutan sesuai dengan aturan yang berlaku.
<br>
<br>
Demikianlah surat tugas ini diberikan agar dapat dilaksanakan dengan penuh tanggung jawab.
    </p>

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