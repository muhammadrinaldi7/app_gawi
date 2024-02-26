
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Pegawai </h2>
                    <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                       <a style="margin: 0px 0px 0px 20px; float: right;" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah Pegawai</a>
                            <?php endif;?>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Photo</th>
                          <th>Kode Pegawai</th>
                          <th>Nama Pegawai</th>
                          <th>Jabatan</th>
                          <th>Tempat Tanggal Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>No Telp</th>
                          <th>Tanggal Bergabung</th>
                    <!--       <th>Status Pegawai</th> -->
                          <th>Email</th>
                     <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                          <th style="text-align:right;">Aksi</th>
                          <?php endif;?>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; ?>
              <?php foreach ($data_pegawai->result_array() as $i) :
                $id_pegawai=$i['id_pegawai'];
            
              ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                           <?php if(empty($i['foto_pegawai'])): ?>
                           <td><img height="100" width="70" class="img-circle" src="<?php echo base_url().'assets/image/profil2.png';?>"></td>
                            <?php else: ?>
                            <td><img height="100" width="70"  src="<?php echo base_url().'assets/image/'.$i['foto_pegawai'];?>"></td>
                           <?php endif; ?>
                          <td><?php echo $i['kode_pegawai'];?></td>
                          <td><?php echo $i['nama_pegawai'];?></td>
                        
                          <td><?php echo $i['nama_jabatan'];?></td>
                          <td><?php echo $i['tempat_lahir'];?>, <?php echo tgl_indo($i['tgl_lahir']);?></td>
                          <td><?php echo $i['jenis_kelamin'];?></td>
                          <td><?php echo $i['alamat'];?></td>
                          <td><?php echo $i['no_telp'];?></td>
                          <td><?php echo tgl_indo($i['tgl_bergabung']);?></td>
          
                          <td><?php echo $i['email'];?></td>
                      <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                  <td style="text-align:right;">
                    <a target="_blank" href="<?php echo base_url();?>pegawai/cetak2/<?php echo $id_pegawai;?>" class="btn btn-round btn-primary fa fa-print">
                  Cetak</a>

                   <button type="button" class="btn btn-round btn-info fa fa-pencil" data-toggle="modal" data-target="#ModalEdit<?php echo $id_pegawai;?>"> Edit</button>
                  <button type="button" class="btn btn-round btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pegawai;?>"> Hapus</button>
                  
                  
                 </td>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>




        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Tambah Pegawai</h4>
      </div>
      <?php echo form_open(base_url('pegawai/simpan_pegawai'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kode Pegawai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="kode_pegawai" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Nama Pegawai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="nama_pegawai" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="tgl_lahir" type="date" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tempat Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="tempat_lahir" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Kelamin<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="jenis_kelamin" required="">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                          </select>
                        </div>
                      </div>

                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="alamat" required></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No Telp <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="no_telp" type="number" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                  


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="id_jabatan" required="">
                            <option value="">Pilih Jabatan</option>
                           <?php foreach ($this->db->get('jabatan')->result_array() as $key): ?>
                              <option value="<?php echo $key['id_jabatan'];?>"><?php echo $key['nama_jabatan'];?></option>
                           <?php endforeach;?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Bergabung <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="tgl_bergabung" type="date" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Foto Pegawai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="foto_pegawai" type="file" required="required" class="form-control">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Email<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="email" type="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Password <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="password" type="password" autocomplete="new-password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
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



              <?php foreach ($data_pegawai->result_array() as $i) :
                $id_pegawai=$i['id_pegawai'];
            
              ?>
      <!-- Modal Edit pegawai -->
<div class="modal fade" id="ModalEdit<?php echo $id_pegawai;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Edit Pegawai</h4>
      </div>
    <?php echo form_open(base_url('pegawai/update_pegawai'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">

              <input value="<?php echo $id_pegawai;?>" name="id_pegawai" type="hidden">

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kode Pegawai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['kode_pegawai'];?>" name="kode_pegawai" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Nama Pegawai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['nama_pegawai'];?>" name="nama_pegawai" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['tgl_lahir'];?>" name="tgl_lahir" type="date" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tempat Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['tempat_lahir'];?>" name="tempat_lahir" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Kelamin<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="jenis_kelamin" required="">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option <?= ($i['jenis_kelamin']=="Laki-Laki")?'selected':'';?> >Laki-Laki</option>
                            <option <?= ($i['jenis_kelamin']=="Perempuan")?'selected':'';?> >Perempuan</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="alamat" required><?php echo $i['alamat'];?></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No Telp <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['no_telp'];?>" name="no_telp" type="number" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>



                  

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="id_jabatan" required="">
                            <option value="">Pilih Jabatan</option>
                           <?php foreach ($this->db->get('jabatan')->result_array() as $key): ?>
                              <option <?= ($key['id_jabatan']==$i['id_jabatan'])?'selected':'';?> value="<?php echo $key['id_jabatan'];?>"><?php echo $key['nama_jabatan'];?></option>
                           <?php endforeach;?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Bergabung <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['tgl_bergabung'];?>" name="tgl_bergabung" type="date" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Foto Pegawai 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="foto_pegawai" type="file" class="form-control">
                        </div>
                      </div>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Email<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['email'];?>" name="email" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Password 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input  name="password" type="password" autocomplete="new-password"  class="form-control col-md-7 col-xs-12">
                        </div>
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


             <?php foreach ($data_pegawai->result_array() as $i) :
                $id_pegawai=$i['id_pegawai'];
            
              ?>
      <!-- Modal Edit pegawai -->
<div class="modal fade" id="ModalHapus<?php echo $id_pegawai;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Hapus Pegawai</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'pegawai/hapus_pegawai'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

            <input type="hidden" name="kode" value="<?php echo $id_pegawai;?>"/>
         <p>Apakah Anda yakin ingin menghapus pegawai ini?</p>
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
