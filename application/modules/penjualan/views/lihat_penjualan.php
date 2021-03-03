<div class="box-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Penjualan</label>
                <input class="form-control" type="text" name="tgl_jual" value="<?php echo $penjualan['tgl_jual']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Nomor Struk</label>
                <input class="form-control" type="text" name="nomor_struk" value="<?php echo $penjualan['nomor_struk']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Kasir</label>
                <input class="form-control" type="text" name="nama_user" value="<?php echo $penjualan['nama_user']; ?>" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Customer</label>
                <input class="form-control" type="text" name="customer" value="<?php echo $penjualan['customer']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Telpon Customer</label>
                <input class="form-control" type="text" name="telpon" value="<?php echo $penjualan['telpon']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Alamat Customer</label>
                <input class="form-control" type="text" name="alamat" value="<?php echo $penjualan['alamat']; ?>" readonly>
            </div>
        </div>
    </div>
</div>

<div class="box-body">

</div>

<div class="box-body table-responsive padding" id="container">
    <table class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th style="width: 20px;">No</th>
            <!--<th>Nomo PO</th>-->
            <th style="width: 70px;">Kode Barang</th>
            <th style="width: 200px;">Nama Barang</th>
            <th style="width: 60px;">Satuan</th>
            <th style="width: 100px;">Harga</th>
            <th style="width: 70px;">Qty Order</th>
            <th style="width: 100px;"><span id="amount" class="amount">Sub Total</span></th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($penjualan_detail as $list): ?>
            <tr>
                <td style="width: 20px;"><?php echo $no++; ?></td>
                <td><input style="width: 70px;" type="text" name="kode_brg" value="<?php echo $list["kode_brg"]; ?>" hidden><?php echo $list["kode_brg"]; ?></td>
                <td><input type="text" name="nama_barang" value="<?php echo $list["nama_barang"]; ?>" hidden><?php echo $list["nama_barang"]; ?></td>
                <td><input style="width: 60px;" type="text" name="satuan_brg" value="<?php echo $list["satuan_brg"]; ?>" hidden><?php echo $list["satuan_brg"]; ?></td>
                <td><input type="text" name="hrg_jual" value="<?php echo $list["hrg_jual"]; ?>" hidden>Rp. <?php echo number_format($list["hrg_jual"], 0, ",", "."); ?>,-</td>
                <td><input style="width: 70px;" type="text" name="jual_qty" value="<?php echo $list["jual_qty"]; ?>" hidden><?php echo $list["jual_qty"]; ?></td>
                <td style="text-align: right"><input type="text" name="jual_total" value="<?php echo $list["jual_total"]; ?>" hidden>Rp. <?php echo number_format($list["jual_total"], 0, ",", "."); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td colspan="2"><font >Total</font></td>
            <td colspan="2" style="text-align: right"><font >Rp. <?php echo number_format($penjualan['jumlah_total'],2,',','.'); ?> ,-</font></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td colspan="2"><font >Pembulatan</font></td>
            <td colspan="2" style="text-align: right"><font >Rp. <?php echo number_format($penjualan['pembulatan'],2,',','.'); ?> ,-</font></td>
        </tr>
        <tr style="background-color: #EEEEEE">
            <td colspan="4"></td>
            <td colspan="2"><font size="4;"><b>Sub Total</b></font></td>
            <td colspan="2" style="text-align: right"><font size="4;"><b>Rp. <?php echo number_format($penjualan['total_jual'],2,',','.'); ?> ,-</b></font></td>
            <!--<input id="h" onkeyup="hitung()" class="form-control" type="text" value="<?php //echo $hrg_jual; ?>" name="hrg_jual" readonly>-->
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td colspan="2"><b>Bayar</b></td>
            <td colspan="2" style="text-align: right">Rp. <?php echo number_format($penjualan['bayarcash'],2,',','.'); ?> ,-</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td colspan="2"><font size="4;"><b>Kembali</b></font></td>
            <td colspan="2" style="text-align: right"><font size="4;"><b>Rp. <?php echo number_format($penjualan['kembali'],2,',','.'); ?> ,-</b></font></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="box-footer">
    <a href="<?=base_url(); ?>laporan/struk/<?php echo $penjualan['nomor_struk'];?>" target="_blank">
        <button type="button" class="btn btn-success">Cetak</button>
    </a>

    <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>penjualan">
        <button type="button" class="btn btn-danger">Batal</button>
    </a>
</div>