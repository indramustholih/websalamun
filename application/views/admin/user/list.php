<section class="content">
  <?php
// ALERT
      if($this->session->flashdata('sukses')){
        echo '<div class="callout callout-success lead" style="font-size:20px;">';
        echo $this->session->flashdata('sukses');
        echo "</div>";
      }
    ?>
<div class="box">

            <div class="box-header">
              <h3 class="box-title"><?php echo $title_panel?></h3>
            </div>
            <div class="box-header">
               <a href="<?php echo base_url('admin/user/tambah')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Pengguna</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Akses Level</th>
                      <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $n=1; foreach ($user as $users):?>
                  <tr>
                    <td><?php echo $n?></td>
                    <td><?php echo $users['username']?></td>
                    <td><?php echo $users['akses_level']?></td>
                    <td>
                      <a href="<?php echo base_url('admin/user/edit/'.$users['id_user'])?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                      <?php include('delete.php');?>
                    </td>
                  </tr>
                  <?php $n++; endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          <!-- /.box -->
</section>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable();
    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false
    // });
  });
</script>