<div class="box-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Terima Barang</label>
                <input class="form-control" type="text" name="tgl_input" value="<?php echo $terima_barang['tgl_input']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Nomor RCV</label>
                <input class="form-control" type="text" name="nomor_rcv" value="<?php echo $terima_barang['nomor_rcv']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Penginput</label>
                <input class="form-control" type="text" name="nama_user" value="<?php echo $terima_barang['nama_user']; ?>" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Supplier</label>
                <input class="form-control" type="text" name="nama_supplier" value="<?php echo $terima_barang['nama_supplier']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Nomor PO</label>
                <input class="form-control" type="text" name="nomor_po_beli" value="<?php echo $terima_barang['nomor_po_beli']; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Nomor Faktur</label>
                <input class="form-control" type="text" name="nomor_faktur" value="<?php echo $terima_barang['nomor_faktur']; ?>" readonly>
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
        <?php $no = 1; foreach ($terima_barang_detail as $list) { ?>
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
            <span class="pull-right"><b>Total &nbsp; &nbsp; Rp. <?php echo number_format($terima_barang['grand_total'],0, ",","."); ?> ,-</b></span>
            <input type="hidden" name="total_beli" value="<?php echo $terima_barang['grand_total']; ?>">
            <input type="hidden" name="nama_user" value="<?php echo $terima_barang['grand_total']; ?>">
        </h3>
    </div>
</div>

<div class="box-footer">
    <a href="<?=base_url(); ?>laporan/cetak_terima_barang/<?php echo $terima_barang['nomor_rcv'];?>" target="_blank">
        <button type="button" class="btn btn-success">Cetak</button>
    </a>

    <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>pembelian/terima_barang">
        <button type="button" class="btn btn-danger">Batal</button>
    </a>
</div>