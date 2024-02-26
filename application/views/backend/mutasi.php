
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Mutasi </h2>
                     <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                       <a style="margin: 0px 0px 0px 20px; float: right;" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah Mutasi</a>
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
                          <th>Jabatan Saat Mutasi</th>
                          <th>Tanggal Efektif</th>
                          <th>Unit Kerja Baru</th>
                       <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                          <th style="text-align:right;">Aksi</th>
                          <?php endif;?>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; ?>
              <?php foreach ($data_mutasi->result_array() as $i) :
                $id_mutasi=$i['id_mutasi'];
            
              ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $i['kode_pegawai'];?></td>
                          <td><?php echo $i['nama_pegawai'];?></td>
                          <td><?php echo $i['jabatan_saat_mutasi'];?></td>
                           <td><?php echo tgl_indo($i['tanggal_efektif']);?></td>
                          <td><?php echo $i['tujuan'];?></td>
                      
                     <?php if($this->session->userdata('jenis_pengguna')!=2):?>  
                  <td style="text-align:right;">
                <a target="_blank" href="<?php echo base_url();?>mutasi/cetak2/<?php echo $id_mutasi;?>" class="btn btn-round btn-primary fa fa-print">
                  Cetak</a>

                   <button type="button" class="btn btn-round btn-info fa fa-pencil" data-toggle="modal" data-target="#ModalEdit<?php echo $id_mutasi;?>"> Edit</button>
                  <button type="button" class="btn btn-round btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalHapus<?php echo $id_mutasi;?>"> Hapus</button>
                  
                  
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Tambah Mutasi</h4>
      </div>
      <?php echo form_open(base_url('mutasi/simpan_mutasi'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pegawai <span style="color: red;">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengaduanModal"><b>Cari Data</b></button>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="id_pegawai" id="nid_pegawai" type="hidden" readonly required="required" class="form-control col-md-7 col-xs-12">
                          <input id="nnama_pegawai" type="text" readonly required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kode Pegawai 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input id="nnip" type="text" readonly class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jabatan Saat Mutasi <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="jabatan_saat_mutasi" required="required" type="text" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Efektif <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="tanggal_efektif" required="required" type="date" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Unit Kerja Baru <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="tujuan" required="required" type="text" class="form-control col-md-7 col-xs-12">
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



              <?php foreach ($data_mutasi->result_array() as $i) :
                $id_mutasi=$i['id_mutasi'];
            
              ?>
      <!-- Modal Edit mutasi -->
<div class="modal fade" id="ModalEdit<?php echo $id_mutasi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Edit Mutasi</h4>
      </div>
    <?php echo form_open(base_url('mutasi/update_mutasi'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">

              <input value="<?php echo $id_mutasi;?>" name="id_mutasi" type="hidden">

                      
                       


             


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['id_pegawai'];?>" name="id_pegawai" id="nid_pegawai" type="hidden" readonly required="required" class="form-control col-md-7 col-xs-12">
                          <input value="<?php echo $i['nama_pegawai'];?>" id="nnama_pegawai" type="text" readonly required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kode Pegawai 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['kode_pegawai'];?>" id="nnip" type="text" readonly class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jabatan Saat Mutasi <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['jabatan_saat_mutasi'];?>" name="jabatan_saat_mutasi" required="required" type="text" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Efektif <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['tanggal_efektif'];?>" name="tanggal_efektif" required="required" type="date" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Unit Kerja Baru <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input value="<?php echo $i['tujuan'];?>" name="tujuan" required="required" type="text" class="form-control col-md-7 col-xs-12">
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


             <?php foreach ($data_mutasi->result_array() as $i) :
                $id_mutasi=$i['id_mutasi'];
            
              ?>
      <!-- Modal Edit mutasi -->
<div class="modal fade" id="ModalHapus<?php echo $id_mutasi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Hapus Mutasi</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'mutasi/hapus_mutasi'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

            <input type="hidden" name="kode" value="<?php echo $id_mutasi;?>"/>
         <p>Apakah Anda yakin ingin menghapus Mutasi ini?</p>
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
 swal("Berhasil!", "Mutasi Berhasil di SIMPAN", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Mutasi Berhasil di EDIT", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Mutasi Behasil di HAPUS", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Format File Gambar Salah", "warning");
 </script>
<?php endif; ?>
        <!-- /page content -->
