
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Cuti </h2>
                     <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                       <a style="margin: 0px 0px 0px 20px; float: right;" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah Cuti</a>
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
                          <th>Jenis Cuti</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
                          <th>Keterangan</th>
                          <th>Status Cuti</th>
                        <?php if($this->session->userdata("level")!="pegawai"):?>
                          <th style="text-align:right;">Aksi</th>
                           <?php endif;?>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; ?>
              <?php foreach ($data_cuti->result_array() as $i) :
                $id_cuti=$i['id_cuti'];
            
              ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $i['kode_pegawai'];?></td>
                          <td><?php echo $i['nama_pegawai'];?></td>
                          <td><?php echo $i['jenis_cuti'];?></td>
                          <td><?php echo tgl_indo($i['tanggal_mulai']);?></td>
                          <td><?php echo tgl_indo($i['tanggal_selesai']);?></td>
                          <td><?php echo $i['keterangan'];?></td>
                          <td><?php if(empty($i['status_cuti'])): ;?>
                              <button type="button" class="btn btn-round btn-info "> MENUNGGU KONFIRMASI</button>
                              <?php elseif($i['status_cuti']=="DISETUJUI"): ;?>
                              <button type="button" class="btn btn-round btn-success "> DISETUJUI</button>
                               <?php if($this->session->userdata("jenis_pengguna")==3):?>
                        <a target="_blank" href="<?php echo base_url();?>cuti/cetak2/<?php echo $id_cuti;?>" class="btn btn-round btn-primary fa fa-print">Cetak</a>
                      <?php endif;?>
                        <?php else:?>
                          <button type="button" class="btn btn-round btn-danger "> DITOLAK</button>
                        <?php endif;?>
                          </td>

                       
                <?php if($this->session->userdata("level")!="pegawai"):?>
                  <td style="text-align:right;">
                    <?php if($i['status_cuti']=="DISETUJUI"): ;?>
                <a target="_blank" href="<?php echo base_url();?>cuti/cetak2/<?php echo $id_cuti;?>" class="btn btn-round btn-primary fa fa-print">
                  Cetak</a>
                <?php endif;?>


                   <?php if($this->session->userdata('jenis_pengguna')==2):?>
                  <?php if(empty($i['status_cuti'])): ;?>
                <a href="<?php echo base_url();?>cuti/setuju/<?php echo $id_cuti;?>" class="btn btn-round btn-success fa fa-check">
                  Setuju</a>


                <a href="<?php echo base_url();?>cuti/tolak/<?php echo $id_cuti;?>" class="btn btn-round btn-danger fa fa-close">
                  Tolak</a>
                <?php endif;?>
                <?php endif;?>


              <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                   <button type="button" class="btn btn-round btn-info fa fa-pencil" data-toggle="modal" data-target="#ModalEdit<?php echo $id_cuti;?>"> Edit</button>
                  <button type="button" class="btn btn-round btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalHapus<?php echo $id_cuti;?>"> Hapus</button>
                      <?php endif;?>
                  
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
        <h4 class="modal-title" id="myModalLabel"> Tambah Cuti</h4>
      </div>
      <?php echo form_open(base_url('cuti/simpan_cuti'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">


              <?php if($this->session->userdata("jenis_pengguna")==1):?>
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

              <?php else:?>

                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input name="id_pegawai" value="<?php echo $this->session->userdata('id_pengguna');?>" type="hidden" readonly required="required" class="form-control col-md-7 col-xs-12">
                          <input value="<?php echo $this->session->userdata('username');?>" type="text" readonly required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

              <?php endif;?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jenis Cuti  <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         <select required class="form-control" name="jenis_cuti">
                                            <option value="">Pilih Jenis Cuti</option>
                                            <option>Cuti Besar</option>
                                            <option>Cuti Sakit</option>
                                            <option>Cuti Melahirkan</option>
                                            <option>Cuti Karena Alasan Penting</option>
                                            <option>Cuti Diluar Tanggungan Negara</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Mulai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input required name="tanggal_mulai" type="date" class="form-control col-md-7 col-xs-12 ">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Selesai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input required name="tanggal_selesai" type="date" class="form-control col-md-7 col-xs-12 ">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Keterangan
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea class="form-control" name="keterangan"></textarea>
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



              <?php foreach ($data_cuti->result_array() as $i) :
                $id_cuti=$i['id_cuti'];
            
              ?>
      <!-- Modal Edit cuti -->
<div class="modal fade" id="ModalEdit<?php echo $id_cuti;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Edit Cuti</h4>
      </div>
    <?php echo form_open(base_url('cuti/update_cuti'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?> 
        <div class="modal-body">

              <input value="<?php echo $id_cuti;?>" name="id_cuti" type="hidden">
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
                          <input value="<?php echo $i['nip'];?>" id="nnip" type="text" readonly class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jenis Cuti  <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                         <select required class="form-control" name="jenis_cuti">
                                            <option value="">Pilih Jenis Cuti</option>
                                            <option <?= ($i['jenis_cuti']=="Cuti Besar")?'selected':'';?> >Cuti Besar</option>
                                            <option <?= ($i['jenis_cuti']=="Cuti Sakit")?'selected':'';?> >Cuti Sakit</option>
                                            <option <?= ($i['jenis_cuti']=="Cuti Melahirkan")?'selected':'';?> >Cuti Melahirkan</option>
                                            <option <?= ($i['jenis_cuti']=="Cuti Karena Alasan Penting")?'selected':'';?> >Cuti Karena Alasan Penting</option>
                                            <option <?= ($i['jenis_cuti']=="Cuti Diluar Tanggungan Negara")?'selected':'';?> >Cuti Diluar Tanggungan Negara</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Mulai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input required value="<?php echo $i['tanggal_mulai'];?>" name="tanggal_mulai" type="date" class="form-control col-md-7 col-xs-12 ">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Selesai <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input required value="<?php echo $i['tanggal_selesai'];?>" name="tanggal_selesai" type="date" class="form-control col-md-7 col-xs-12 ">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Keterangan
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea class="form-control" name="keterangan"><?php echo $i['keterangan'];?></textarea>
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
             <?php foreach ($data_cuti->result_array() as $i) :
                $id_cuti=$i['id_cuti'];
            
              ?>
      <!-- Modal Edit cuti -->
<div class="modal fade" id="ModalHapus<?php echo $id_cuti;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel"> Hapus Cuti</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'cuti/hapus_cuti'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

            <input type="hidden" name="kode" value="<?php echo $id_cuti;?>"/>
         <p>Apakah Anda yakin ingin menghapus Cuti ini?</p>
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
 swal("Berhasil!", "Cuti Berhasil di SIMPAN", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Cuti Berhasil di EDIT", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_setuju') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Cuti Berhasil di Setujui", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_tolak') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Cuti Berhasil di Tolak", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('tertolak') == TRUE): ?>
 <script type="text/javascript">
 swal("Tertolakk!", "Cuti di Tolak, Karena sisa cuti kurang!", "warning");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Cuti Behasil di HAPUS", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Format File Gambar Salah", "warning");
 </script>
<?php endif; ?>
        <!-- /page content -->
