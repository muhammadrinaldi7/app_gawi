
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>DETAIL PRESENSI </h2>



                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <div class="row">
                          <table border="0"  style="margin: 20px; font-size: 15pt;font-family: 'Times New Roman';  "  class="table " >
                        <div> 
                        <tbody>
                       
                       
                         <tr style="vertical-align: top;" >
                            <td width="270px">Nama Pegawai</td>
                            
                            <td> : <?php echo $data_presensi['nama_pegawai'];?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">NIP</td>
                            
                            <td> : <?php echo $data_presensi['nip'];?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Tanggal Absen</td>
                            
                            <td> : <?php echo date('l F Y, H:i',strtotime($data_presensi['tgl_waktu_absen']));?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Latitude</td>
                            
                            <td> : <?php echo $data_presensi['Latitude'];?></td>
                          </tr>
                         <tr style="vertical-align: top;" >
                            <td width="270px">Longitude</td>
                            
                            <td> : <?php echo $data_presensi['Longitude'];?></td>
                          </tr>
                       
                        </tbody>
                      </div>
                      </table>
                    </div>






                    <div class="row" >
            
                          <div id="mapcanvas"></div>
                        <script src="http://maps.google.com/maps/api/js"></script>
                          
                      
                       </div>


                  </div>
                </div>
              
              <div class="row">
              </div>
            </div>
          </div>
        </div>


 
 
<script>

window.onload = function exampleFunction() {

    latlon = new google.maps.LatLng(<?php echo $data_presensi['Latitude'];?>, <?php echo $data_presensi['Longitude'];?>)
    mapcanvas = document.getElementById('mapcanvas')
    mapcanvas.style.height = '400px';
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
}
</script>