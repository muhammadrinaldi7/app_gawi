


  <link rel="stylesheet" href="<?php echo base_url().'assets/adminlte/dist/css/AdminLTE.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
        <!-- /top navigation -->

        <!-- page content -->
<div class="right_col" role="main">

       


<?php 
if($this->session->userdata("level")!="pegawai"):?>

       
<?php 

$jump=$this->db->get('pegawai')->num_rows();
$jum_penugasan=$this->db->query('SELECT * FROM pegawai,jabatan,penugasan where 
      
      pegawai.id_jabatan=jabatan.id_jabatan AND penugasan.id_pegawai=pegawai.id_pegawai')->num_rows();
$jum_mutasi=$this->db->query('SELECT * FROM mutasi,pegawai where mutasi.id_pegawai=pegawai.id_pegawai')->num_rows();
?>



      <div class="row">

    <!-- Content Column -->
    <div class="col-md-12 col-sm-12 col-xs-12">

        <!-- Project Card Example -->
         <div class="x_panel">
                  <div class="x_title">
                <h6 class="m-0 font-weight-bold text-primary" style="font-size: 18px; font-family: 'Times New Roman';">MAPS</h6>
            </div>
            <div class="card-body">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15932.276009914322!2d114.6296085!3d-3.33313!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd86bbed89c4c33a0!2sGawi%20Makmur%20Kalimantan.%20PT!5e0!3m2!1sid!2sid!4v1655562749568!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>

</div>


        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>
             
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pegawai</span>
              <span class="info-box-number"><?php echo $jump;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Pegawai
                  </span>
            </div>
          
          </div>
        </div> 

 
         <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-edit"></i></span>
             
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Penugasan</span>
              <span class="info-box-number"><?php echo $jum_penugasan;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Penugasan
                  </span>
            </div>
          
          </div>
        </div> 


       <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-send"></i></span>
             
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Mutasi</span>
              <span class="info-box-number"><?php echo $jum_mutasi;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Mutasi
                  </span>
            </div>
          
          </div>
        </div> 

<!--         <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-bank"></i></span>
             
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Cuti</span>
              <span class="info-box-number"><?php echo $jum_cuti;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Cuti
                  </span>
            </div>
          
          </div>
        </div> -->

     <!--    <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-edit"></i></span>
             
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pegawai KONTRAK</span>
              <span class="info-box-number"><?php echo $hitung_kontrak;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Pegawai KONTRAK
                  </span>
            </div>
          </div>
        </div> -->




<?php endif;?>



<?php 
if($this->session->userdata("jenis_pengguna")==3):
  $id_pegawai=$this->session->userdata("id_pengguna");
  $row=$this->db->query("SELECT * FROM pegawai,jabatan where 
     
      pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_pegawai='$id_pegawai'")->row_array();

  ?>



<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="info-box">
                <div class="x_title">
                    <h2>Biodata  </h2>
                     

                    <div class="clearfix"></div>
                  </div>
  <img  src="<?php echo base_url(). 'assets/image/'.$row['foto_pegawai'];?>" height="200" width="148" align="right"style="margin: 10px 30px 20px 20px;">


<table border="0"  style="font-size: 15pt;font-family: 'Times New Roman'; margin: 10px 20px 20px 20px; " >
  <div> 
  <tbody>
  <tr>
      <td width="190px">Nama Pegawai</td>
      <td width="10px">: </td>
      <td><?php echo $row['nama_pegawai'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Kode Pegawai</td>
      <td width="10px">: </td>
      <td><?php echo $row['kode_pegawai'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Tempat, Tanggal Lahir</td>
      <td width="10px">: </td>
      <td><?php echo $row['tempat_lahir'];?>, <?php echo tgl_indo($row['tgl_lahir']);?></td>
      <td></td>
  </tr>

  <tr>
      <td width="190px">Jenis Kelamin</td>
      <td width="10px">: </td>
      <td><?php echo $row['jenis_kelamin'];?></td>
      <td></td>
  </tr>

  <tr>
      <td width="190px">Alamat</td>
      <td width="10px">: </td>
      <td><?php echo $row['alamat'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">No Telp</td>
      <td width="10px">: </td>
      <td><?php echo $row['no_telp'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Tanggal Bergabung</td>
      <td width="10px">: </td>
      <td><?php echo tgl_indo($row['tgl_bergabung']);?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Email</td>
      <td width="10px">: </td>
      <td><?php echo $row['email'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="190px">Jabatan</td>
      <td width="10px">: </td>
      <td><?php echo $row['nama_jabatan'];?></td>
      <td></td>
  </tr>


</tbody>
</div>
</table>

</div>
</div>
<br>
<?php endif;?>


 






          <!-- /top tiles -->
          <br />
          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="row">
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       



