<div class="box-header">
    <h3 class="box-title"><?php echo $title; ?></h3>
</div>

<form class="form-horizontal" action="<?=base_url(); ?>user/tambahproses" method="post">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="username" name="username">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Nama User</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Nama User" name="nama_user">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Akses</label>
            <div class="col-sm-10">
                <select name="akses" class="form-control" required>
                    <option value="Super Admin">- Super Admin -</option>
                    <option value="Apoteker">- Apoteker -</option>
                    <option value="Asisten Apoteker">- Asisten Apoteker -</option>
                    <option value="Kasir">- Kasir -</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
        </div>


    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>user">
            <button type="button" class="btn btn-danger">Batal</button>
        </a>
    </div>
    <!-- /.box-footer -->
</form>