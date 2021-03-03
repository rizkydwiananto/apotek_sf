<form action="<?=base_url(); ?>barang/editbarangproses/<?php echo $barang['id_barang']; ?>" method="post">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" class="form-control" value="<?php echo $barang['kode_brg']; ?>" name="kode_brg" readonly>
              </div>

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="<?php echo $barang['nama_barang']; ?>" name="nama_barang">
                </div>

                <div class="form-group">
                    <label>Jenis</label>
                    <select name="id_jenis_brg" class="form-control select2" style="width: 100%;" required>
                        <option value="<?php echo $barang['id_jenis_brg']; ?>"><?php echo $barang['nama_jenis_brg']; ?></option>
                        <?php foreach ($jenis_brg as $category): ?>
                        <option value="<?php echo $category['id_jenis_brg']; ?>"> <?php echo $category['nama_jenis_brg']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="text" class="form-control" value="<?php echo $barang['stock']; ?>" name="stock">
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <select name="id_satuan_brg" class="form-control select2" style="width: 100%;" required>
                        <option value="<?php echo $barang['id_satuan_brg']; ?>"><?php echo $barang['nama_satuan_brg']; ?></option>
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
                        <input id="b" class="form-control" name="hrg_beli" value="<?php echo $barang['hrg_beli']; ?>" onkeyup="hitung()">
                    </div>

                    <div class="col-xs-4">
                        <label>Margin %</label>
                        <input id="a" class="form-control" name="margin" placeholder="Isi angka saja" onkeyup="hitung()">
                    </div>

                    <div class="col-xs-4">
                        <label>Harga Jual</label>
                        <input id="d" class="form-control" name="hrg_jual" value="<?php echo $barang['hrg_jual']; ?>" readonly="" onkeyup="hitung()">
                    </div>
                </div>

                <br>
                <div class="form-group">
                    <label>Expired</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker2" value="<?php echo $barang['expired']; ?>" name="expired">
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
    function tampilkanPreview(img,idpreview)
    { //membuat objek gambar
        var gb = img.files;
        //loop untuk merender gambar
        for (var i = 0; i < gb.length; i++)
        { //bikin variabel
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview=document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType))
            { //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element)
                {
                    return function(e)
                    {
                        element.src = e.target.result;
                    };
                })(preview);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            }
            else
            { //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
    }

    function hitung() {
        var a = $("#a").val();
        var b = $("#b").val();
        c = a/100 * b;
        $("#c").val(c);
        d = b/100*100 + c;
        $("#d").val(d);
    }
</script>
