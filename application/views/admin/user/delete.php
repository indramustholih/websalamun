<!-- <?php //anchor('admin/user/verifikasi/'.$users->id_user, '<i class="fa fa-check-circle"></i> Verifikasi', array('class' => 'btn btn-success btn-xs','id'=>'verified','onclick'=>"return verify();"));?> -->
<!-- MODAL HAPUS -->
<div class="modal fade" id="periksa?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Data User : <?php echo $users->username?></h4>
            </div>
            <div class="modal-body">
                <p class="alert alert-danger"><i class="fa fa-warning"></i> Yakin ingin menghapus data ini ?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('admin/user/delete/'.$users->id_user)?>" class="btn btn-danger">
                <i class="fa fa-trash-o"></i> Hapus Data</a>

                <a href="<?php echo base_url('admin/user/edit/'.$users->id_user)?>" class="btn btn-warning">
                <i class="fa fa-edit"></i>Edit Data</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
