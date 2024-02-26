<!DOCTYPE html>
<html lang="en">
<?php

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
} ?>

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
    <p style="margin-left: 50px; margin-right:50px;">
        Yth. HRD Manajer <br> PT. Gawi Makmur Kalimantan<br>
        Kota Banjarmasin<br>
        <br>
        <br>Sehubungan dengan sudah waktunya pensiun pegawai PT. Gawi Makmur Kalimantan atas nama <?= $data['nama_pegawai'] ?>/<?= $data['kode_pegawai'] ?> terhitung pada tanggal <?= tgl_indo($data['mulai_pensiun']) ?> dalam usia

        <?php
        $birthDate = new DateTime($data['tgl_lahir']);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        echo $y; ?>

        tahun dengan masa kerja <?= $data['masa_kerja'] ?> tahun.
        <br><br>Maka dengan ini kami sampaikan permohonan pensiun yang bersangkutan untuk diketahui dan diproses lebih lanjut, berkas persyaratan pensiun terlampir.
        Atas perhatiannya kami ucapkan terima kasih.

    </p>
    <br><br><br>
    <br><br><br>

    <div style="text-align: left; display: inline-block; float: left; margin-left: 50px;">
        <label>

            <p style="text-align: center;">
                <b>Hormat Saya,</b>
            </p>
            <br>
            <br>
            <br><br><br>
            <p style="text-align: center;">
                <b><u><?= $data['nama_pegawai'] ?></u></b><br>

            </p>
        </label>
    </div>

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