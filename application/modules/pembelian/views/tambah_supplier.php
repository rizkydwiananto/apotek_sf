<div class="box-header">
    <h3 class="box-title"><?php echo $title; ?></h3>
</div>

<form class="form-horizontal" action="<?=base_url(); ?>pembelian/tambahsupplierproses" method="post">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Kode Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $kode_supp; ?>" name="kode_supplier">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Nama Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nama Supplier" name="nama_supplier">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Alamat Supplier</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" placeholder="Alamat Supplier" name="alamat_supplier"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Telpon Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Telpon Supplier" name="telpon_supplier">
            </div>
        </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>pembelian/supplier">
            <button type="button" class="btn btn-danger">Batal</button>
        </a>
    </div>
    <!-- /.box-footer -->
</form>