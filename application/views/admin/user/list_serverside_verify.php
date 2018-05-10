
<section class="content">
  <?php
// ALERT
      if($this->session->flashdata('sukses')){
        echo '<div class="callout callout-success lead" style="font-size:20px;">';
        echo $this->session->flashdata('sukses');
        echo "</div>";
      }
    ?>
<div class="box animated fadeIn">

            <div class="box-header">
              <h3 class="box-title"><?php echo $title_panel?></h3>
            </div>
            <div class="box-header">
               <a href="<?php echo base_url('admin/user/tambah')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Pengguna</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="table" align="center" class="table table-bordered table-striped" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Kecamatan</th>
                    <th>Status Verifikasi</th>
                    <th width="5%">Aksi</th>
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
            <!-- /.box-body -->
          <!-- /.box -->

</section>
<!-- page script -->
<script type="text/javascript">

function confirmDialog() {
 return confirm('Apakah anda yakin akan menghapus data user ini?')
}
function verify() {
 return confirm('Apakah anda yakin akan memverifikasi user ini?')
}
// Munculkan Modal Dialog Verify
function ver_user(id){
    
    $.ajax({
        url: '<?php echo base_url('admin/user/get_serverside_id')?>/'+id,
        type:"GET",
        dataType: "JSON",
        success:function(data)
        {
            $(".verifi").attr('id','periksa'+id);
            $("#periksa"+id).modal('show');
            // $("#anim").addClass('animated bounceInUp');
            $(".bawah-modal").html(
                '<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tidak</button><a class="btn btn-success" href="<?php echo base_url('admin/user/verifikasi')?>/'+id+'"><i class="fa fa-check"></i> Ya Verifikasi</a>'
                );

        }
    });
}
var table;

$(document).ready(function() {   
$('[data-toggle="tooltip"]').tooltip();  
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
            "url": "<?php echo base_url('admin/user/ajax_list_verify')?>",
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
<div class="modal fade verifi" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="anim">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
            </div> -->
            <div class="modal-body">
                <h4 class="alert alert-info"><i class="fa fa-info-circle"></i> Yakin ingin memverifikasi user ini ?</h4>
            </div>
            <div class="modal-footer bawah-modal">
                

                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
