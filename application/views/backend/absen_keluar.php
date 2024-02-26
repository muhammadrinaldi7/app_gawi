
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Absen Keluar </h2>
                     <?php 
                      $id_yg_login=$this->session->userdata('id_pengguna');
                      $jumlah_hari_ini=$this->db->query("SELECT * FROM absen_masuk,pegawai,absen_keluar where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_keluar.id_absen_masuk=absen_masuk.id_absen_masuk AND date(tgl_waktu_keluar)=CURRENT_DATE() AND absen_masuk.id_pegawai='$id_yg_login'")->num_rows();   
                    if($jumlah_hari_ini>0):
                      ?>
                       <?php else:?>
        <?php
        $id_pengguna=$this->session->userdata('id_pengguna');
        $cek_m=$this->db->query("SELECT * FROM absen_masuk,pegawai where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_masuk.id_pegawai='$id_pengguna' AND stat=0")->num_rows();
        if ($cek_m>0):
         if($this->session->userdata('level')=="pegawai"):?>

                       <a style="margin: 0px 0px 0px 20px; float: right;" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Isi Absen Keluar</a>
                    <?php endif;?>
                <?php endif;?>
                <?php endif;?>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                           <th>Kode Pegawai</th>
                          <th>Nama Pegawai</th>
                          <th>Tanggal Waktu Masuk</th>
                          <th>Tanggal Waktu Keluar</th>
                          <th>Status Keluar</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Lokasi</th>
                          <th>Keterangan</th>
                           <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                           <?php if($this->session->userdata('level')!="pegawai"):?>
                          <th style="text-align:right;">Aksi</th>
                            <?php endif;?>
                            <?php endif;?>
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
                                              <td><a  href="<?php echo base_url();?>absen_keluar/lokasi/<?php echo $i['id_absen_keluar'];?>" style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm" ><i class="fa fa-eye"></i> LIHAT</a></td>
                                              <td><?php echo $i['ket_keluar'];?></td>
                                               <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                       <?php if($this->session->userdata('level')!="pegawai"):?>
                  <td style="text-align:right;">
          

                   <button type="button" class="btn btn-round btn-info fa fa-pencil" data-toggle="modal" data-target="#ModalEdit<?php echo $id_absen_keluar;?>"> Edit</button>
                  <button type="button" class="btn btn-round btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalHapus<?php echo $id_absen_keluar;?>"> Hapus</button>
                  
                  
                 </td>
                 <?php endif;?>
                 <?php endif;?>
                </tr>
               <?php endforeach;?>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              
              <div class="row">
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Isi Absen Keluar</h4>
      </div>
      <?php echo form_open(base_url('absen_keluar/simpan_absen_keluar'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">

<?php 

   $cek_m=$this->db->query("SELECT * FROM absen_masuk,pegawai where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_masuk.id_pegawai='$id_pengguna' AND stat=0")->num_rows();
        if ($cek_m>0):

          ?>
                               <?php
        $id_pengguna=$this->session->userdata('id_pengguna');
        $cek_m2=$this->db->query("SELECT * FROM absen_masuk,pegawai where absen_masuk.id_pegawai=pegawai.id_pegawai AND absen_masuk.id_pegawai='$id_pengguna' AND absen_masuk.status_kehadiran='Hadir' AND stat=0")->row_array();
        ?>
                     
                                 <div class="form-group m-t-20">
                                    <label>Kode Pegawai <span style="color: red;">*</span></label>
                                    <input value="<?php echo $cek_m2['id_absen_masuk'];?>" type="hidden" name="id_absen_masuk" class="form-control" readonly>
                                    <input value="<?php echo $cek_m2['kode_pegawai'];?>" type="text"  class="form-control" readonly>
                                </div>

        <?php endif;?>

                                 <div class="form-group m-t-20">
                                    <label>Nama Pegawai <span style="color: red;">*</span></label>
                                    <input value="<?php echo $cek_m2['nama_pegawai'];?>" type="text"  class="form-control" readonly>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Tanggal, Waktu Masuk <span style="color: red;">*</span></label>
                                    <input value="<?php echo tgl_indo(date('Y-m-d',strtotime($cek_m2['tgl_waktu_masuk'])));?>, <?php echo date('H:i',strtotime($cek_m2['tgl_waktu_masuk']));?>" type="text" class="form-control" readonly>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Status Keluar <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_keluar" required>
                                      <option value="">--pilih status keluar--</option>
                                      <option>Pulang Tepat Waktu Setelah Jam Kerja Selesai</option>
                                      <option>Pulang Duluan Sebelum Jam Kerja Selesai</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Keterangan </label>
                                    <textarea class="form-control" name="ket_keluar"></textarea>
                                </div>


                                 <div class="form-group m-t-20">
                                    <button type="button"  class="btn btn-primary col-md-12" onclick="getLocation()"><b>Deteksi Lokasi</b></button>
                                </div>



                                <div class="form-group m-t-20">
                                    <label>Latitude <span style="color: red;">*</span></label>
                                    <input id="lat" readonly type="text" name="lat_keluar" class="form-control" required>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Longitude <span style="color: red;">*</span></label>
                                    <input id="lon" readonly type="text" name="long_keluar" class="form-control" required>
                                </div>

                                 <div class="form-group m-t-20 ">
                                    <div id="mapcanvas" ></div>
                                </div>


                     
                     

                     
                      

     
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
            </div>
      <?php echo form_close( ); ?>
    </div>
  </div>
</div>



              <?php foreach ($data_absen_keluar->result_array() as $i) :
                $id_absen_keluar=$i['id_absen_keluar'];
            
              ?>
      <!-- Modal Edit absen_keluar -->
<div class="modal fade" id="ModalEdit<?php echo $id_absen_keluar;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Edit Absen Keluar</h4>
      </div>
    <?php echo form_open(base_url('absen_keluar/update_absen_keluar'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">

              <input value="<?php echo $id_absen_keluar;?>" name="id_absen_keluar" type="hidden">

                      
                       


             


                       <div class="form-group m-t-20">
                                    <label>Absen Masuk <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_absen_masuk" required>
                                      <option value="">--pilih absen masuk--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM absen_masuk,pegawai where absen_masuk.id_pegawai=pegawai.id_pegawai")->result_array() as $key):?>
                                      <option <?= ($i['id_absen_masuk']==$key['id_absen_masuk'])?'selected':'';?> value="<?php echo $key['id_absen_masuk'];?>"><?php echo $key['id_pegawai'];?> | <?php echo $key['nama_pegawai'];?> | <?php echo tgl_indo(date('Y-m-d',strtotime($key['tgl_waktu_masuk'])));?>, <?php echo date('H:i',strtotime($key['tgl_waktu_masuk']));?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Status Keluar <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_keluar" required>
                                      <option value="">--pilih status keluar--</option>
                                      <option <?= ($i['status_keluar']=="Pulang Tepat Waktu Setelah Jam Kerja Selesai")?'selected':'';?>>Pulang Tepat Waktu Setelah Jam Kerja Selesai</option>
                                      <option <?= ($i['status_keluar']=="Pulang Duluan Sebelum Jam Kerja Selesai")?'selected':'';?>>Pulang Duluan Sebelum Jam Kerja Selesai</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Keterangan </label>
                                    <textarea class="form-control" name="ket_keluar"><?php echo $i['ket_keluar'];?></textarea>
                                </div>



                                <div class="form-group m-t-20">
                                    <label>Latitude <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['lat_keluar'];?>" type="text" name="lat_keluar" class="form-control" required>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Longitude <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['long_keluar'];?>" type="text" name="long_keluar" class="form-control" required>
                                </div>



                 





          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
            </div>

        
        <?php echo form_close( ); ?>
    </div>
  </div>
</div>
<?php endforeach;?>


             <?php foreach ($data_absen_keluar->result_array() as $i) :
                $id_absen_keluar=$i['id_absen_keluar'];
            
              ?>
      <!-- Modal Edit absen_keluar -->
<div class="modal fade" id="ModalHapus<?php echo $id_absen_keluar;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Hapus Absen Keluar</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'absen_keluar/hapus_absen_keluar'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

            <input type="hidden" name="kode" value="<?php echo $id_absen_keluar;?>"/>
         <p>Apakah Anda yakin ingin menghapus absen_keluar ini?</p>
         </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
            </div>

        
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>

<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Absen Keluar Berhasil di SIMPAN", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Absen Keluar Berhasil di EDIT", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Absen Keluar Behasil di HAPUS", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Format File Gambar Salah", "warning");
 </script>
<?php endif; ?>
        <!-- /page content -->




                                     <script src="http://maps.google.com/maps/api/js"></script>
<script>
var view = document.getElementById("tampilkan");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
    }
}
 
function showPosition(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    
    var delayInMilliseconds = 2000; //1 second

    setTimeout(function() {
      document.getElementById('lat').value = lat;
      document.getElementById('lon').value = lon;
      latlon = new google.maps.LatLng(lat, lon)
      mapcanvas = document.getElementById('mapcanvas')
      mapcanvas.style.height = '350px';
      mapcanvas.style.width = '100%';
   
      var myOptions = {
      center:latlon,
      zoom:14,
      mapTypeId:google.maps.MapTypeId.ROADMAP
      }
       
      var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
      var marker = new google.maps.Marker({
          position:latlon,
          map:map,
          title:"You are here!"
      });
    }, delayInMilliseconds);

    
}
 
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
            break;
        case error.POSITION_UNAVAILABLE:
            view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
            break;
        case error.TIMEOUT:
            view.innerHTML = "Requestnya timeout bro"
            break;
        case error.UNKNOWN_ERROR:
            view.innerHTML = "An unknown error occurred."
            break;
    }
 }
</script>