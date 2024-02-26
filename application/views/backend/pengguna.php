
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data User </h2>
                       <a style="margin: 0px 0px 0px 20px; float: right;" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah User</a>
                          
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No HP</th>
                          <th>Level</th>
                          <th style="text-align:right;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; ?>
              <?php foreach ($data_pengguna->result_array() as $i) :
                $id_pengguna=$i['id_pengguna'];
                $gambar=$i['gambar'];
                $username=$i['username'];
                $email=$i['email'];
                $no_hp=$i['no_hp'];
                $level=$i['level'];
              ?>
                        <tr>
                           <?php if(empty($gambar)): ?>
                           <td><img height="100" width="70" class="img-circle" src="<?php echo base_url().'assets/image/profil2.png';?>"></td>
                            <?php else: ?>
                            <td><img height="100" width="70" class="img-circle" src="<?php echo base_url().'assets/image/'.$gambar;?>"></td>
                           <?php endif; ?>
                          <td><?php echo $username;?></td>
                          <td><?php echo $email;?></td>
                          <td><?php echo $no_hp;?></td>
                          <td>
                            <?php if($i['level']==1):?>
                              ADMIN
                            <?php else:?>
                              PIMPINAN
                            <?php endif;?>
                          </td>
                       

                  <td style="text-align:right;">
                   <button type="button" class="btn btn-round btn-info fa fa-pencil" data-toggle="modal" data-target="#ModalEdit<?php echo $id_pengguna;?>"> Edit</button>
                  <button type="button" class="btn btn-round btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengguna;?>"> Hapus</button>
                  
                 </td>
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
        <h4 class="modal-title" id="myModalLabel"> Tambah User</h4>
      </div>
      <?php echo form_open(base_url('pengguna/simpan_pengguna'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama User <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="username" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Email <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="email" type="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input autocomplete="new-password" name="password" type="password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="no_hp" type="number"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <select name="level" class="form-control" >
                              <option value="">-Pilih Level -</option>
                              <option value="1">ADMIN</option>
                              <option value="2">PIMPINAN</option>
                            </select>
                        </div>
                      </div> 


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="dokumen" type="file"  class="form-control col-md-7 col-xs-12">
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



              <?php foreach ($data_pengguna->result_array() as $i) :
                $id_pengguna=$i['id_pengguna'];
                $gambar=$i['gambar'];
                $username=$i['username'];
                $email=$i['email'];
                $no_hp=$i['no_hp'];
                
              ?>
      <!-- Modal Edit pengguna -->
<div class="modal fade" id="ModalEdit<?php echo $id_pengguna;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Edit User</h4>
      </div>
    <?php echo form_open(base_url('pengguna/update_pengguna'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">

              <input value="<?php echo $id_pengguna;?>" name="id_pengguna" type="hidden">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama User <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $username;?>" name="username" type="text" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Email <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $email;?>" name="email" type="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="password" type="password" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $no_hp;?>" name="no_hp" type="number"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Level<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <select name="level" class="form-control" >
                              <option value="">-Pilih Level-</option>
                              <option <?= ($level == "1")?'selected': '' ?> value="1">ADMIN</option>
                              <option  <?= ($level == "2")?'selected': '' ?> value="2">PIMPINAN</option>
                            </select>
                        </div>
                      </div> 


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Photo
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="dokumen" type="file"  class="form-control col-md-7 col-xs-12">
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


            <?php foreach ($data_pengguna->result_array() as $i) :
                $id_pengguna=$i['id_pengguna'];
                $gambar=$i['gambar'];
                $username=$i['username'];
                $email=$i['email'];
                $no_hp=$i['no_hp'];
              ?>
      <!-- Modal Edit pengguna -->
<div class="modal fade" id="ModalHapus<?php echo $id_pengguna;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Hapus User</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

            <input type="hidden" name="kode" value="<?php echo $id_pengguna;?>"/>
         <p>Apakah Anda yakin ingin menghapus User <b><?php echo $username;?></b>?</p>
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
 swal("Berhasil!", "User Berhasil di SIMPAN", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "User Berhasil di EDIT", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "User Behasil di HAPUS", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Format File Gambar Salah", "warning");
 </script>
<?php endif; ?>
        <!-- /page content -->
