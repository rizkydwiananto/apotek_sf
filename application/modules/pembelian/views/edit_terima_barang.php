<form action="<?=base_url(); ?>pembelian/edit_terima_barang_proses/<?php echo $add_to_terima['id_add_terima']; ?>" method="post">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" class="form-control" value="<?php echo $add_to_terima['kode_brg']; ?>" name="kode_brg" readonly>
                </div>

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="<?php echo $add_to_terima['nama_barang']; ?>" name="nama_barang" readonly>
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" class="form-control" value="<?php echo $add_to_terima['satuan_brg_beli']; ?>" name="satuan_brg_beli" readonly>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Nomor PO Beli</label>
                    <input type="text" class="form-control" value="<?php echo $add_to_terima['nomor_po_beli']; ?>" name="nomor_po_beli" readonly>
                </div>

                <div class="row">
                    <div class="col-xs-4">
                        <label>Harga Beli</label>
                        <input id="b" class="form-control" name="hrg_beli" value="<?php echo $add_to_terima['hrg_beli']; ?>" onkeyup="hitung()" readonly="">
                    </div>

                    <div class="col-xs-4">
                        <label>Qty Order</label>
                        <input id="a" class="form-control" name="beli_qty" value="<?php echo $add_to_terima['beli_qty']; ?>" onkeyup="hitung()">
                    </div>

                    <div class="col-xs-4">
                        <label>Sub Total</label>
                        <input id="d" class="form-control" name="beli_total" value="<?php echo $add_to_terima['beli_total']; ?>" readonly="" onkeyup="hitung()">
                    </div>
                </div>

                <br>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Submit</button>

                    <a href="<?=base_url(); ?>pembelian/tambah_terima_barang/<?php echo $add_to_terima['nomor_po_beli']?>">
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
        d = b*a;
        $("#d").val(d);
    }
</script>
