<div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Cuti Pegawai </h2>
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
                          <th>Tanggal Bergabung</th>
                          <th>Total Cuti</th>
                          <th>Sisa Cuti</th>
                          <th>Keterangan</th>
                          <th>Tanggal Cuti</th>
                     <?php if($this->session->userdata('jenis_pengguna')!=2):?>
                          <th style="text-align:right;">Aksi</th>
                          <?php endif;?>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; ?>
              <?php foreach ($data_cuti as $i) :
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
                          <td><?php echo $i['tgl_bergabung'];?></td>
                          <td><?php echo $i['totalcuti'];?></td>
                          <td><div class="progress progress-sm mb-2" style="width: 120px">                                        
                                        <div class="progress-bar" role="progressbar" style="width: <?= $i['sisa'] ?>0px;background-color:<?php if($i['sisa']>8){echo "#2dcc5a";}else if($i['sisa']>4 && $i['sisa']<9){echo "#eaed37";}else if($i['sisa']<4){echo "#f52c2c";}; ?>" aria-valuenow="10" aria-valuemin="0" aria-valuemax="12"><?= $i['sisa']."/12" ?></div>
                                    </div></td>
                          <td><?= $i['keterangan'] ?></td>
                          <td><?php echo $i['tanggal'];?></td>
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