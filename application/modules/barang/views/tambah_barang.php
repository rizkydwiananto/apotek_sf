<form action="<?=base_url(); ?>barang/tambahbarangproses" method="post">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" class="form-control" name="kode_brg" value="<?php echo $kode; ?>" readonly>
              </div>

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" required>
                </div>

                <div class="form-group">
                    <label>Jenis</label>
                    <select name="id_jenis_brg" class="form-control select2" style="width: 100%;" required>
                        <option value="">- Pilih Jenis Barang -</option>
                        <?php foreach ($jenis_brg as $category): ?>
                        <option value="<?php echo $category['id_jenis_brg']; ?>"> <?php echo $category['nama_jenis_brg']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control" value="0" placeholder="Stock" name="stock" readonly>
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <select name="id_satuan_brg" class="form-control select2" style="width: 100%;" required>
                        <option value="">- Pilih Satuan Barang -</option>
                        <?php foreach ($satuan_brg as $category): ?>
                            <option value="<?php echo $category['id_satuan_brg']; ?>"> <?php echo $category['nama_satuan_brg']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Harga Beli</label>
                        <input id="b" class="form-control" name="hrg_beli" placeholder="Isi angka saja" onkeyup="hitung()" required>
                    </div>

                    <div class="col-xs-4">
                        <label>Margin %</label>
                        <input id="a" class="form-control" name="margin" placeholder="Isi angka saja" onkeyup="hitung()" required>
                    </div>

                    <div class="col-xs-4">
                        <label>Harga Jual</label>
                        <input id="d" class="form-control" name="hrg_jual" readonly="" onkeyup="hitung()" required>
                    </div>
                </div>

                <br>
                <div class="form-group">
                    <label>Expired</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker2" name="expired" required>
                      </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>barang">
                        <button type="button" class="btn btn-danger">Batal</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
</form>
    <!-- /.box-body -->

    <!-- /.box-footer -->


<script>
    function hitung() {
        var a = $("#a").val();
        var b = $("#b").val();
        c = a/100 * b;
        $("#c").val(c);
        d = b/100*100 + c;
        $("#d").val(d);
    }
</script>
