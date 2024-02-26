<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->

  <!-- /top tiles -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_tittle">
          <div>
            <div id="datatable1" class="table table-striped table-bordered">
              <div class="x_content">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Masa Kerja</th>
                    <th>Mulai Pensiun</th>
                    <th>Jenis Pensiun</th>
                    <?php if ($this->session->userdata('jenis_pengguna') != 2) : ?>
                      <th style="text-align:right;">Aksi</th>
                    <?php endif; ?>
                  </tr>
                </thead>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Pensiun </h2>
          <?php if ($this->session->userdata('jenis_pengguna') != 2) : ?>
            <a style="margin: 0px 0px 0px 20px; float: right;" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Tambah Pensiun</a>
          <?php endif; ?>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Masa Kerja</th>
                <th>Mulai Pensiun</th>
                <th>Jenis Pensiun</th>
                <?php if ($this->session->userdata('jenis_pengguna') != 2) : ?>
                  <th style="text-align:right;">Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_pensiun->result_array() as $i) :
                $id_pensiun = $i['id_pensiun'];

              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $i['kode_pegawai']; ?></td>
                  <td><?php echo $i['nama_pegawai']; ?></td>
                  <td><?php echo $i['masa_kerja']; ?> Tahun</td>
                  <td><?php echo tgl_indo($i['mulai_pensiun']); ?></td>
                  <td><?php echo $i['jenis_pensiun']; ?></td>
                  <?php if ($this->session->userdata('jenis_pengguna') != 2) : ?>
                    <td style="text-align:right;">
                      <a target="_blank" href="<?php echo base_url(); ?>pensiun/cetak2/<?php echo $id_pensiun; ?>" class="btn btn-round btn-primary fa fa-print">
                        Cetak</a>

                      <button type="button" class="btn btn-round btn-info fa fa-pencil" data-toggle="modal" data-target="#ModalEdit<?php echo $id_pensiun; ?>"> Edit</button>
                      <button type="button" class="btn btn-round btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pensiun; ?>"> Hapus</button>


                    </td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>

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
        <h4 class="modal-title" id="myModalLabel"> Tambah Pensiun</h4>
      </div>
      <?php echo form_open(base_url('pensiun/simpan_pensiun'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Masa Kerja (tahun)<span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="masa_kerja" required="required" type="number" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Mulai Pensiun <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="mulai_pensiun" required="required" type="date" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jenis Pensiun <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="jenis_pensiun" required="required" type="text" class="form-control col-md-7 col-xs-12">
          </div>
        </div>








      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>



<?php foreach ($data_pensiun->result_array() as $i) :
  $id_pensiun = $i['id_pensiun'];

?>
  <!-- Modal Edit pensiun -->
  <div class="modal fade" id="ModalEdit<?php echo $id_pensiun; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel"> Edit Pensiun</h4>
        </div>
        <?php echo form_open(base_url('pensiun/update_pensiun'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?>
        <div class="modal-body">

          <input value="<?php echo $id_pensiun; ?>" name="id_pensiun" type="hidden">







          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['id_pegawai']; ?>" name="id_pegawai" id="nid_pegawai" type="hidden" readonly required="required" class="form-control col-md-7 col-xs-12">
              <input value="<?php echo $i['nama_pegawai']; ?>" id="nnama_pegawai" type="text" readonly required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kode Pegawai
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['nip']; ?>" id="nnip" type="text" readonly class="form-control col-md-7 col-xs-12">
            </div>
          </div>




          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Masa Kerja (tahun)<span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['masa_kerja']; ?>" name="masa_kerja" required="required" type="number" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Mulai Pensiun <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['mulai_pensiun']; ?>" name="mulai_pensiun" required="required" type="date" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jenis Pensiun <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['jenis_pensiun']; ?>" name="jenis_pensiun" required="required" type="text" class="form-control col-md-7 col-xs-12">
            </div>
          </div>









        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
        </div>


        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<?php foreach ($data_pensiun->result_array() as $i) :
  $id_pensiun = $i['id_pensiun'];

?>
  <!-- Modal Edit pensiun -->
  <div class="modal fade" id="ModalHapus<?php echo $id_pensiun; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel"> Hapus Pensiun</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'pensiun/hapus_pensiun' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <input type="hidden" name="kode" value="<?php echo $id_pensiun; ?>" />
            <p>Apakah Anda yakin ingin menghapus Pensiun ini?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
          </div>


        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php if ($this->session->flashdata('berhasil_simpan') == TRUE) : ?>
  <script type="text/javascript">
    swal("Berhasil!", "Pensiun Berhasil di SIMPAN", "success");
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil_edit') == TRUE) : ?>
  <script type="text/javascript">
    swal("Berhasil!", "Pensiun Berhasil di EDIT", "success");
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil_hapus') == TRUE) : ?>
  <script type="text/javascript">
    swal("Berhasil!", "Pensiun Behasil di HAPUS", "success");
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('gagal_up') == TRUE) : ?>
  <script type="text/javascript">
    swal("Gagal!", "Format File Gambar Salah", "warning");
  </script>
<?php endif; ?>
<!-- /page content -->