
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="card-body">
                                <h5 class="card-title"><b>Data Profil</b>
                                  
                        
                <?php
            $id_pengguna__=$this->session->userdata('id_pengguna');
            $qqq=$this->db->query("SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna__'");
            $datalogin2=$qqq->row_array();
?>
                                </h5>
                                <hr>
                                <?php if($datalogin2['gambar']==""): ?>
                                <img  src="<?php echo base_url();?>assets/image/profil2.png" height="180" width="148">
                                <?php else: ?>
                                <img  src="<?php echo base_url().'assets/image/'.$datalogin2['gambar'];?>" height="180" width="148">
                                <?php endif;?>
<div class="table-responsive">
 <table border="0"  style="font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr>
      <td width="100px" >Nama</td>
      <td width="10px">:</td>
      <td ><?php echo $datalogin2['username'];?></td>
  </tr>
  <br>
  <tr>
      <td>Email</td>
      <td>:</td>
      <td><?php echo $datalogin2['email'];?></td>
  </tr>
  <?php if($datalogin2['no_hp']==""): ?>
  <tr>
      <td>No HP</td>
      <td>:</td>
      <td style="color : red;">Belum di tambahkan</td>
  </tr>
  <?php else: ?>
  <tr>
      <td>No HP</td>
      <td>:</td>
      <td><?php echo $datalogin2['no_hp'];?></td>
  </tr>
  <?php endif;?>
    
</tbody>
</div>
</table>
</div>





                            <button style=" float: right; margin-left: 5px;" data-toggle="modal" data-target="#modalgantipass" class="btn btn-primary">
                                <i class="fa fa-pencil-square"></i> Ganti Password</button>
                                  <button style=" float: right;" data-toggle="modal" data-target="#modaledit" class="btn btn-success">
                                <i class="fa fa-edit"></i> Edit Profil</button>
                            </div>
              
            </div>
          </div>
        </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Profil</h4>
      </div>
      <?php echo form_open(base_url('profil/update_profil'), 'class="form-horizontal" enctype="multipart/form-data"');  ?> 
        <div class="modal-body">
          <input  readonly value="<?php echo $datalogin2['id_pengguna'];?>"  name="id_profil" type="hidden" class="form-control"  >

                                <div class="form-group m-t-20">
                                    <label>Nama Pengguna *</label>
                                    <input value="<?php echo $datalogin2['username'];?>"  value="<?php echo $datalogin2['username'];?>" type="text" class="form-control" name="username" required  placeholder="Nama Pengguna">
                                </div>
                                <div class="form-group m-t-20">
                                    <label>Email *</label>
                                    <input value="<?php echo $datalogin2['email'];?>"  value="<?php echo $datalogin2['email'];?>" type="email" class="form-control" name="email" required  placeholder="Email">
                                </div>
                                <div class="form-group m-t-20">
                                    <label>No HP</label>
                                    <input value="<?php echo $datalogin2['no_hp'];?>" type="number" class="form-control" name="no_hp">
                                </div>
                                <div class="form-group m-t-20">
                                    <label>Photo</label>
                                    <input type="file" name="dokumen" >
                                   
                                </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">CLOSE</button>
              <button type="submit" class="btn btn-success btn-flat" id="simpan">SIMPAN</button>
            </div>
      <?php echo form_close( ); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="modalgantipass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
      </div>
      <?php echo form_open(base_url('profil/update_pass'), 'class="form-horizontal" enctype="multipart/form-data"');  ?> 
        <div class="modal-body">
          <input  readonly value="<?php echo $this->session->userdata('id_pengguna');?>"  name="id_profil" type="hidden" class="form-control"  >

                                <div class="form-group m-t-20">
                                    <label>Password Lama *</label>
                                    <input type="password" class="form-control" name="pwlama" required  placeholder="Password Lama">
                                </div>
                                <div class="form-group m-t-20">
                                    <label>Password Baru *</label>
                                    <input type="password" class="form-control" name="pwbaru" required  placeholder="Password Baru">
                                </div>
                                <div class="form-group m-t-20">
                                    <label>Ulangi Password Baru *</label>
                                    <input type="password" class="form-control" name="pwbaru2" required  placeholder="Ulangi Password Baru">
                                </div>
                                
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">CLOSE</button>
              <button type="submit" class="btn btn-success btn-flat" id="simpan">SIMPAN</button>
            </div>
      <?php echo form_close( ); ?>
    </div>
  </div>
</div>





<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Profil Berhasil di EDIT", "success");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit_pass') == TRUE): ?>
 <script type="text/javascript">
 swal("Berhasil!", "Password Berhasil di UBAH", "success");
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Format File Gambar Salah", "warning");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('passalah') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Password Lama SALAH", "warning");
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('pwsalah') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal!", "Password Baru dan Ulangi Password SALAH", "warning");
 </script>
<?php endif; ?>