      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MGS「」Gezio <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" dibawah jika ingin keluar dari akun ini</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Add Option -->
  <div class="modal fade" id="addOptionModal" tabindex="-1" role="dialog" aria-labelledby="addOptoinModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addOptionModalLabel">Tambah Unit Pendidikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Masukkan Unit Pendidikan">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="button" class="btn btn-primary" onclick="tambahOpsi()" data-dismiss="modal">Tambah</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
  integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
  crossorigin=""></script>
  <script src="<?php echo base_url('assets/js/leaflet.ajax.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/leaflet-search.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/js/highcharts.js'); ?>"></script>

      <script type="text/javascript">
        $(document).ready(function () {
          $('#table-ponpes').DataTable( { 
            "scrollX": true,
            "columnDefs": [
            { "width": "5px", "targets": 0 },
            { "width": "110px", "targets": 1 },
            { "width": "230px", "targets": 2 },
            { "width": "420px", "targets": 3 },
            { "width": "110px", "targets": 4 }
            ]
          } );
        } );
      </script>

      <script type="text/javascript">
        $(document).ready(function () {
          $('#alternatif').DataTable( { 
            "scrollX": true,
            "columnDefs": [
            { "width": "5px", "targets": 0 },
            { "width": "250px", "targets": 1 },
            { "width": "120px", "targets": 2 },
            { "width": "120px", "targets": 3 },
            { "width": "180px", "targets": 4 }
            ]
          } );
        } );
      </script>

      <script>
        $(document).ready(function () {
          $('#table-user').DataTable( { 
            "scrollX": true,
            "columnDefs": [
            { "width": "40px", "targets": 0 },
            { "width": "190px", "targets": 1 },
            { "width": "250px", "targets": 2 },
            { "width": "250px", "targets": 3 },
            { "width": "50px", "targets": 4 },
            { "width": "70px", "targets": 5 }
            ]
          } );
        } );
      </script>
      <script>
        $(document).ready(function () {
          $('#table-result').DataTable( { 
            "scrollX": true,
            "columnDefs": [
            { "width": "40px", "targets": 0 },
            { "width": "215px", "targets": 1 },
            { "width": "115px", "targets": 2 },
            { "width": "115px", "targets": 3 },
            { "width": "115px", "targets": 4 },
            { "width": "150px", "targets": 5 },
            { "width": "40px", "targets": 6 }
            ]
          } );
        } );
      </script>

      <script>
        $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('.form-check-input').on('click', function() {
          const menuId = $(this).data('menu');
          const roleId = $(this).data('role');

          $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
              menuId: menuId,
              roleId: roleId
            },
            success: function () {
              document.location.href = "<?= base_url('admin/roleaccess/'); ?>"  + roleId;
            }
          });
        });
      </script>
      <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>"
        var mymap = L.map('mapid').setView([-7.52817, 112.505836], 11);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);
    // var geojsonFeature = new L.geoJSON.ajax(baseURL+"welcome/geoJSON").addTo(mymap);
    var allFeature = new L.geoJSON.ajax(baseURL+"welcome/geoJSON", {
      onEachFeature: function (feature, layer) {
        layer.bindPopup('<h2>'+feature.properties.nama_ponpes+'</h2><p>Alamat: '+feature.properties.alamat+'</p>');
      }
    }).addTo(mymap);
    var searchControl = new L.Control.Search({
      layer: allFeature,
      propertyName: 'nama_ponpes'

    });

    searchControl.on('search:locationfound', function(e) {
      console.log(e);
      allFeature.bindPopup(e.layer.feature.properties.nama_ponpes).openPopup;
    });
    
    mymap.addControl( searchControl );  //inizialize search control

    var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
}

mymap.on('click', onMapClick);
  </script>
  <script>
    function tambahOpsi(){
      var select = document.getElementById('program'),
      txtVal = document.getElementById('nilai').value,
      newOption = document.createElement('option'),
      newOptionVal = document.createTextNode(txtVal);

      newOption.appendChild(newOptionVal);
      select.insertBefore(newOption, select.lastChild);

    }
  </script>

</body>

</html>
