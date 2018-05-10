<?php
// ALERT
      if($this->session->flashdata('sukses')){
        echo '<div class="alert alert-success" style="font-size:20px;"><i class="fa fa-check"></i> ';
        echo $this->session->flashdata('sukses');
        echo "</div>";
      }
    ?>
<div class="card ">
    <h5 class="card-header text-white bg-primary"><i class="fa fa-newspaper-o"></i> <?php echo $title_panel?></h5>
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
            <a href="<?php echo base_url('administrator/gallery/tambah')?>" class="btn btn-primary btn-sm" id="tambah"><i class="fa fa-plus"></i> Tambah Gambar</a>
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
                        <th width="10%">Gambar</th>
                        <th>Jenis Gambar</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dibuat</th>
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
 return confirm('Apakah anda yakin akan menghapus data ini?')
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
        // "pageLength" : 5,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('administrator/gallery/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });
    

});

</script>