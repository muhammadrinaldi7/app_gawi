<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->

  <!-- /top tiles -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Penugasan </h2>
          <?php if ($this->session->userdata('jenis_pengguna') != 2) : ?>
            <a style="margin: 0px 0px 0px 20px; float: right;" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Tambah Penugasan</a>
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
                <th>Maksud Perjalanan</th>
                <th>Alat Angkut</th>
                <th>Tempat Berangkat</th>
                <th>Tempat Tujuan</th>
                <th>Tanggal Berangkat</th>
                <th>Tanggal harus kembali</th>
                <th>Keterangan</th>
                <?php if ($this->session->userdata('jenis_pengguna') != 2) : ?>
                  <th style="text-align:right;">Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_penugasan->result_array() as $i) :
                $id_penugasan = $i['id_penugasan'];

              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $i['kode_pegawai']; ?></td>
                  <td><?php echo $i['nama_pegawai']; ?></td>
                  <td><?php echo $i['maksud_perjalanan']; ?></td>
                  <td><?php echo $i['alat_angkut']; ?></td>
                  <td><?php echo $i['tempat_berangkat']; ?></td>
                  <td><?php echo $i['tempat_tujuan']; ?></td>
                  <td><?php echo tgl_indo($i['tgl_berangkat']); ?></td>
                  <td><?php echo tgl_indo($i['tgl_harus_kembali']); ?></td>
                  <td><?php echo $i['keterangan']; ?></td>

                  <?php if ($this->session->userdata('jenis_pengguna') != 2) : ?>
                    <td style="text-align:right;">


                      <?php if ($this->session->userdata("jenis_pengguna") != 3) : ?>
                        <button type="button" class="btn btn-round btn-info fa fa-pencil" data-toggle="modal" data-target="#ModalEdit<?php echo $id_penugasan; ?>"> Edit</button>
                        <button type="button" class="btn btn-round btn-danger fa fa-trash" data-toggle="modal" data-target="#ModalHapus<?php echo $id_penugasan; ?>"> Hapus</button>
                      <?php endif; ?>

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
        <h4 class="modal-title" id="myModalLabel"> Tambah Penugasan</h4>
      </div>
      <?php echo form_open(base_url('penugasan/simpan_penugasan'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?>
      <div class="modal-body">


        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yang Menugaskan <span style="color: red;">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <button onclick="mod1();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengaduanModal2"><b>Cari Data</b></button>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="id_pegawai2" id="nid_pegawai2" type="hidden" readonly required="required" class="form-control col-md-7 col-xs-12">
            <input id="nnama_pegawai2" type="text" readonly required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> NIP
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input id="nnip2" type="text" readonly class="form-control col-md-7 col-xs-12">
          </div>
        </div>



        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yang di Beri Tugas <span style="color: red;">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <button onclick="mod1();" type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengaduanModal"><b>Cari Data</b></button>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> NIP
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input id="nnip" type="text" readonly class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Penugasan <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="tanggal_penugasan" required="required" type="date" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Maksud Perjalanan <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="maksud_perjalanan" required="required" type="text" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Alat Transportasi <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="alat_angkut" required="required" type="text" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tempat Berangkat <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="tempat_berangkat" required="required" type="text" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tempat Tujuan <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="tempat_tujuan" required="required" type="text" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Berangkat <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="tgl_berangkat" required="required" type="date" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Harus Kembali <span class="required">*</span>
          </label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input name="tgl_harus_kembali" required="required" type="date" class="form-control col-md-7 col-xs-12">
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
      <?php echo form_close(); ?>
    </div>
  </div>
</div>



<?php foreach ($data_penugasan->result_array() as $i) :
  $id_penugasan = $i['id_penugasan'];

?>
  <!-- Modal Edit penugasan -->
  <div class="modal fade" id="ModalEdit<?php echo $id_penugasan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel"> Edit Penugasan</h4>
        </div>
        <?php echo form_open(base_url('penugasan/update_penugasan'), 'class="form-horizontal" enctype="multipart/form-data" data-parsley-validate');  ?>
        <div class="modal-body">

          <input value="<?php echo $id_penugasan; ?>" name="id_penugasan" type="hidden">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pegawai
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['id_pegawai']; ?>" name="id_pegawai" id="nid_pegawai" type="hidden" readonly required="required" class="form-control col-md-7 col-xs-12">
              <input value="<?php echo $i['nama_pegawai']; ?>" id="nnama_pegawai" type="text" readonly required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> NIP
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['nip']; ?>" id="nnip" type="text" readonly class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Penugasan <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['tanggal_penugasan']; ?>" name="tanggal_penugasan" required="required" type="date" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Maksud Perjalanan <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['maksud_perjalanan']; ?>" name="maksud_perjalanan" required="required" type="text" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Alat Transportasi <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['alat_angkut']; ?>" name="alat_angkut" required="required" type="text" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tempat Berangkat <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['tempat_berangkat']; ?>" name="tempat_berangkat" required="required" type="text" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tempat Tujuan <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['tempat_tujuan']; ?>" name="tempat_tujuan" required="required" type="text" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Berangkat <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['tgl_berangkat']; ?>" name="tgl_berangkat" required="required" type="date" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Harus Kembali <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input value="<?php echo $i['tgl_harus_kembali']; ?>" name="tgl_harus_kembali" required="required" type="date" class="form-control col-md-7 col-xs-12">
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
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
        </div>


        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<?php foreach ($data_penugasan->result_array() as $i) :
  $id_penugasan = $i['id_penugasan'];

?>
  <!-- Modal Edit penugasan -->
  <div class="modal fade" id="ModalHapus<?php echo $id_penugasan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel"> Hapus Penugasan</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'penugasan/hapus_penugasan' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <input type="hidden" name="kode" value="<?php echo $id_penugasan; ?>" />
            <p>Apakah Anda yakin ingin menghapus penugasan ini?</p>
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
    swal("Berhasil!", "Penugasan Berhasil di SIMPAN", "success");
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil_edit') == TRUE) : ?>
  <script type="text/javascript">
    swal("Berhasil!", "Penugasan Berhasil di EDIT", "success");
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil_hapus') == TRUE) : ?>
  <script type="text/javascript">
    swal("Berhasil!", "Penugasan Behasil di HAPUS", "success");
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('gagal_up') == TRUE) : ?>
  <script type="text/javascript">
    swal("Gagal!", "Format File Gambar Salah", "warning");
  </script>
<?php endif; ?>
<!-- /page content -->