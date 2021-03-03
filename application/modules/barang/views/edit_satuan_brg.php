<div class="box-header">
    <h3 class="box-title"><?php echo $title; ?></h3>
</div>

<form class="form-horizontal" action="<?=base_url(); ?>barang/editsatuanbrgproses/<?php echo $satuan_brg['id_satuan_brg']; ?>" method="post">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Jenis Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $satuan_brg['nama_satuan_brg']; ?>" name="nama_satuan_brg">
            </div>
        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>barang/satuan_brg">
            <button type="button" class="btn btn-danger">Batal</button>
        </a>
    </div>
    <!-- /.box-footer -->
</form>