
<form action="<?=base_url(); ?>pembelian/tambah_terima_barang_proses" method="post">
<div class="box-body">
  <div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Input</label>
                    <?php date_default_timezone_set('Asia/Jakarta')?>
                    <input class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                    <input class="form-control" type="hidden" name="tgl_input" value="<?php echo date("Y-m-d"); ?>" readonly>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Waktu Input</label>
                    <?php date_default_timezone_set('Asia/Jakarta')?>
                    <input class="form-control" value="<?php echo date("H:i:s"); ?>" readonly>
                    <input class="form-control" type="hidden" name="waktu" value="<?php echo date("H:i:s"); ?>" readonly>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label>Nomor RCV</label>
            <input class="form-control" value="<?php echo $nomorrcv; ?>" readonly>
            <input class="form-control" type="hidden" name="nomor_rcv" value="<?php echo $nomorrcv; ?>" readonly>
        </div>

        <div class="form-group">
            <label>Nomor Faktur</label>
            <input type="text" class="form-control" name="nomor_faktur" placeholder="Input Nomor Faktur dari Supplier" ">
        </div>
    </div>

              <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Pembelian</label>
                            <input class="form-control" value="<?php echo $pembelian['tgl_beli']; ?>" readonly>
                            <input class="form-control" type="hidden" name="tgl_beli" value="<?php echo $pembelian['tgl_beli']; ?>" readonly>
                        </div>
                    </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Waktu Pembelian</label>
                              <input class="form-control" value="<?php echo $pembelian['waktu']; ?>" readonly>
                              <input class="form-control" type="hidden" name="waktu" value="<?php echo $pembelian['waktu']; ?>" readonly>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label>Nomor PO</label>
                      <input class="form-control" value="<?php echo $pembelian['nomor_po']; ?>" readonly>
                      <input class="form-control" type="hidden" name="nomor_po_beli" value="<?php echo $pembelian['nomor_po']; ?>" readonly>
                  </div>

                  <div class="form-group">
                      <label>Supplier</label>
                      <input class="form-control" value="<?php echo $pembelian['kode_supplier']; ?> - <?php echo $pembelian["nama_supplier"]; ?>" readonly>
                      <input class="form-control" type="hidden" name="nama_supplier" value="<?php echo $pembelian['kode_supplier']; ?> - <?php echo $pembelian["nama_supplier"]; ?>" readonly>
                  </div>
              </div>
  </div>
</div>

<div class="box-body">

</div>

<div class="box-body table-responsive padding">
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
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; $nomor_rcv_terima = $nomorrcv; foreach ($add_to_terima as $list) : ?>
            <tr>
                <td style="width: 20px;"><?php echo $no++; ?></td>
                <input type="hidden" value="<?php echo $nomor_rcv_terima; ?>" name="nomor_rcv_terima[]">
                <td><input style="width: 70px;" type="hidden" name="kode_brg[]" value="<?php echo $list["kode_brg"]; ?>"><?php echo $list["kode_brg"]; ?></td>
                <td><input type="hidden" name="nama_barang[]" value="<?php echo $list["nama_barang"]; ?>"><?php echo $list["nama_barang"]; ?></td>
                <td><input style="width: 60px;" type="hidden" name="satuan_brg_beli[]" value="<?php echo $list["satuan_brg_beli"]; ?>" ><?php echo $list["satuan_brg_beli"]; ?></td>
                <td><input type="hidden" name="hrg_beli[]" value="<?php echo $list["hrg_beli"]; ?>" readonly>Rp. <?php echo number_format($list["hrg_beli"],0,",","."); ?>,-</td>
                <td><input style="width: 70px;" type="hidden" name="beli_qty[]" value="<?php echo $list["beli_qty"]; ?>" ><?php echo $list["beli_qty"]; ?></td>
                <td><input type="hidden" name="beli_total[]" value="<?php echo $list["beli_total"]; ?>" readonly>Rp. <?php echo number_format($list["beli_total"],0,",","."); ?></td>
                <td>
                    <a href="<?php base_url();?>/apotek_sf/pembelian/edit_terima_barang/<?php echo $list['id_add_terima']; ?>">
                        <button type="button" class="btn btn-info btn-flat"><i class="fa fa-edit" style="width: 20px;"></i></button>
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Anda yakin ingin menghapus barang ini ?')" href="<?=base_url(); ?>pembelian/hapus_terima_barang/<?php echo $list['id_add_terima']?>">
                        <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-times" style="width: 20px;"></i></button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="alert alert-success">
        <h3>
            <i class="icon fa fa-check"></i>
            <?php
            $harga_total = 0;
                foreach ($add_to_terima as $rows => $row)
            {
                $harga_total += $row['beli_total'];
            }

            ?>
            <span class="pull-right"><b>Total &nbsp; &nbsp; Rp. <?php echo number_format($harga_total,0,",","."); ?> ,-</b></span>
            <input type="hidden" name="nama_user" value="<?php echo $this->session->userdata("nama_user"); ?>">
            <input type="hidden" value="<?php echo $harga_total; ?>" name="grand_total">
        </h3>
    </div>
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-success">Submit</button>
    <a onclick="return confirm("Anda yakin ingin membatalkan ?")" href="<?=base_url(); ?>pembelian/terima_barang">
        <button type="button" class="btn btn-danger">Batal</button>
    </a>
</div>
</form>