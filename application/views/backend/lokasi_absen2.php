
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>LIHAT LOKASI ABSEN KELUAR</b> </h2>
                     

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="row">
                          <table border="0"  style="margin: 20px; font-size: 15pt;font-family: 'Times New Roman';  "  class="table " >
                        <div> 
                        <tbody>
                       
                       
                        <tr style="vertical-align: top;" >
                            <td width="270px">Kode Pegawai</td>
                            
                            <td> : <?php echo $data['kode_pegawai'];?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Nama Pegawai</td>
                            
                            <td> : <?php echo $data['nama_pegawai'];?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Tanggal Waktu Masuk</td>
                            
                              <td>: <?php echo tgl_indo(date('Y-m-d',strtotime($data['tgl_waktu_masuk'])));?>, <?php echo date('H:i',strtotime($data['tgl_waktu_masuk']));?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Tanggal Waktu Keluar</td>
                            
                              <td>: <?php echo tgl_indo(date('Y-m-d',strtotime($data['tgl_waktu_keluar'])));?>, <?php echo date('H:i',strtotime($data['tgl_waktu_keluar']));?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Status Kehadiran</td>
                            
                            <td>: <?php echo $data['status_kehadiran'];?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Latitude</td>
                            
                            <td> : <?php echo $data['lat_masuk'];?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Longitude</td>
                            
                            <td> : <?php echo $data['long_masuk'];?></td>
                          </tr>
                       
                        </tbody>
                      </div>
                      </table>
                    </div>


                   <div class="row" >
                      <iframe src="https://maps.google.com/maps?q=<?php echo $data['lat_keluar'];?>,<?php echo $data['long_keluar'];?>&hl=en&z=14&amp;output=embed" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe> 
                    </div>


                  </div>
                </div>
              
              <div class="row">
              </div>
            </div>
          </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>





<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Pegawai Berhasil di SIMPAN", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Pegawai Berhasil di EDIT", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Pegawai Behasil di HAPUS", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Format File Gambar Salah", "warning");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('ggl') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Umur Pegawai terlalu muda", "warning");
 </script>
<?php endif; ?>
        <!-- /page content -->
