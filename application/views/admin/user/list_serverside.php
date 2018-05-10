<?php
// ALERT
      if($this->session->flashdata('sukses')){
        echo '<div class="alert alert-success" style="font-size:20px;"><i class="fa fa-check"></i> ';
        echo $this->session->flashdata('sukses');
        echo "</div>";
      }
    ?>
<div class="card ">
    <h5 class="card-header text-white bg-dark"><i class="fa fa-users"></i> <?php echo $title_panel?></h5>
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
            <a href="<?php echo base_url('administrator/user/tambah')?>" class="btn btn-primary btn-sm" id="tambah"><i class="fa fa-plus"></i> Tambah Data Pengguna</a>
            </li>
        </ul>    
    </div>
    
    <div class="card-body">
        <div class="col-md-4 col-lg-3" style="margin-bottom:10px">
        
        </div>
        
        <div class="table-responsive">
              <table id="table" class="table table-bordered table-striped" cellspacing="0" width="100%" >
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Username</th>
                        <th>Level Akses</th>
                        <th width="25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

               <!--  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Akses Level</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot> -->
            </table>
            </div>
    </div>
</div>
<!-- page script -->
<script type="text/javascript">

function confirmDialog() {
 return confirm('Apakah anda yakin akan menghapus data user ini?')
}
function verify() {
 return confirm('Apakah anda yakin akan memverifikasi user ini?')
}

var table;

$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "language": {
            "processing": '<i class="fa fa-refresh fa-spin fa-3x fa-fw" style="color:#00A65A"></i><span>Mohon Tunggu...</span>'
        },
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('administrator/user/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });
    

});

</script>