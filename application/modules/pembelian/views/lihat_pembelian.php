<div class="box-body">
    <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal Pembelian</label>
                        <input class="form-control" type="text" name="tgl_beli" value="<?php echo $pembelian['tgl_beli']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Penginput Data Pembelian</label>
                        <input class="form-control" type="text" name="nama_user" value="<?php echo $pembelian['nama_user']; ?>" readonly>
                    </div>
                </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Nomor PO</label>
                <input class="form-control" type="text" name="nomor_po" value="<?php echo $pembelian['nomor_po']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Supplier</label>
                <input class="form-control" type="text" name="supplier" value="<?php echo $pembelian['kode_supplier']; ?> - <?php echo $pembelian["nama_supplier"]; ?>" readonly>
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
            <th style="width: 70px;">Kode Barang</th>
            <th style="width: 200px;">Nama Barang</th>
            <th style="width: 60px;">Satuan</th>
            <th style="width: 100px;">Harga</th>
            <th style="width: 70px;">Qty Order</th>
            <th style="width: 100px;"><span id="amount" class="amount">Sub Total</span></th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($pembelian_detail as $list) { ?>
                    <tr>
                        <td style="width: 20px;"><?php echo $no++; ?></td>
                        <td><input style="width: 70px;" type="text" name="kode_brg" value="<?php echo $list["kode_brg"]; ?>" hidden><?php echo $list["kode_brg"]; ?></td>
                        <td><input type="text" name="nama_barang" value="<?php echo $list["nama_barang"]; ?>" hidden><?php echo $list["nama_barang"]; ?></td>
                        <td><input style="width: 60px;" type="text" name="satuan_brg_beli" value="<?php echo $list["satuan_brg_beli"]; ?>" hidden><?php echo $list["satuan_brg_beli"]; ?></td>
                        <td><input type="text" name="hrg_beli" value="<?php echo $list["hrg_beli"]; ?>" hidden>Rp. <?php echo number_format($list["hrg_beli"], 0, ",", "."); ?>,-</td>
                        <td><input style="width: 70px;" type="text" name="beli_qty" value="<?php echo $list["beli_qty"]; ?>" hidden><?php echo $list["beli_qty"]; ?></td>
                        <td style="text-align: right"><input type="text" name="beli_total" value="<?php echo $list["beli_total"]; ?>" hidden>Rp. <?php echo number_format($list["beli_total"], 0, ",", "."); ?></td>
                    </tr>
                    <?php
        }
        ?>
        </tbody>
    </table>

    <div class="alert alert-success">
        <h3>
            <i class="icon fa fa-check"></i>
            <span class="pull-right"><b>Total &nbsp; &nbsp; Rp. <?php echo number_format($pembelian['total_beli'],0, ",","."); ?> ,-</b></span>
            <input type="hidden" name="total_beli" value="<?php echo $pembelian['total_beli']; ?>">
            <input type="hidden" name="nama_user" value="<?php echo $pembelian['nama_user']; ?>">
        </h3>
    </div>
</div>

<div class="box-footer">
    <a href="<?=base_url(); ?>laporan/cetak_pembelian/<?php echo $pembelian['nomor_po'];?>" target="_blank">
        <button type="button" class="btn btn-success">Cetak</button>
    </a>

    <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>pembelian">
        <button type="button" class="btn btn-danger">Batal</button>
    </a>
</div>