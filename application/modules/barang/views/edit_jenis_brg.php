<div class="box-header">
    <h3 class="box-title"><?php echo $title; ?></h3>
</div>

<form class="form-horizontal" action="<?=base_url(); ?>barang/editjenisbrgproses/<?php echo $jenis_brg['id_jenis_brg']; ?>" method="post">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Jenis Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $jenis_brg['nama_jenis_brg']; ?>" name="nama_jenis_brg">
            </div>
        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>barang/jenis_brg">
            <button type="button" class="btn btn-danger">Batal</button>
        </a>
    </div>
    <!-- /.box-footer -->
</form>