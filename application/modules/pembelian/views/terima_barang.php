<div class="box-header">
    <div class="form-group pull-left">
        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#cariPO"><b>Tambah Terima Barang</b></button>
    </div>
</div>


<div class="box-body table-responsive padding">

    <table id="example1" class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th>No</th>
            <th>Tgl Input</th>
            <th>Waktu</th>
            <th>Nomor Faktur</th>
            <th>Nomor RCV</th>
            <th>Nomor PO</th>
            <th>Supplier</th>
            <th>Grand Total</th>
            <th>Petugas</th>
            <th>Lihat</th>
            <?php
            if ($_SESSION['akses'] !== 'Asisten Apoteker') {

            ?>
            <th>Hapus</th>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($terima_barang as $list): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><input type="hidden" name="tgl_input" value="<?php echo $list['tgl_input']; ?>" readonly><?php echo $list['tgl_input']; ?></td>
                <td><input type="hidden" name="waktu" value="<?php echo $list['waktu']; ?>" readonly><?php echo $list['waktu']; ?></td>
                <td><input type="hidden" name="nomor_faktur" value="<?php echo $list['nomor_faktur']; ?>" readonly><?php echo $list['nomor_faktur']; ?></td>
                <td><input type="hidden" name="nomor_rcv" value="<?php echo $list['nomor_rcv']; ?>" readonly><?php echo $list['nomor_rcv']; ?></td>
                <td><input type="hidden" name="nomor_po_beli" value="<?php echo $list['nomor_po_beli']; ?>" readonly><?php echo $list['nomor_po_beli']; ?></td>
                <td><input type="hidden" name="supplier" value="<?php echo $list['nama_supplier']; ?>" readonly><?php echo $list['nama_supplier']; ?></td>
                <td><input type="hidden" name="grand_total" value="<?php echo $list['grand_total'];?>">Rp. <?php echo number_format($list['grand_total'],0,",","."); ?> ,-</td>
                <td><input type="hidden" name="nama_user" value="<?php echo $list['nama_user']; ?>"><?php echo $list['nama_user']; ?></td>
                <td>
                    <a href="<?=base_url(); ?>pembelian/lihat_terima_barang/<?php echo $list['nomor_rcv']?>">
                        <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </a>
                </td>
                <?php
                if ($_SESSION['akses'] !== 'Asisten Apoteker') {

                ?>
                <td>
                    <a onclick="return confirm('Anda yakin ingin menghapus data terima barang ini ?')" href="<?=base_url(); ?>pembelian/hapus_terima_barang/<?php echo $list['nomor_rcv']?>">
                        <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-close"></i></button></a>
                </td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- MODAL -->
<div class="modal fade box-body table-responsive padding" id="cariPO">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Nomor PO</h4>
            </div>

            <div class="modal-body">
                <div class="box-body table-responsive padding">
                    <div class="table-responsive padding">
                        <table id="example3" class="table table-bordered table-hover dataTable no-footer">
                            <thead>
                            <tr>
                                <th style="width: 20px;">No</th>
                                <th>Tgl Pesan</th>
                                <th>Nomor PO</th>
                                <th>Supplier</th>
                                <th>Grand Total</th>
                                <th>Petugas</th>
                                <th>Pilih</th>
                                <?php
                                if ($_SESSION['akses'] !== 'Asisten Apoteker') {

                                ?>
                                <th>Hapus</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; foreach ($pembelian_sementara as $list): ?>
                                <tr>
                                    <!--<form target="_blank" action="<?//=base_url(); ?>laporan/cetak/<?php //echo $list['nomor_po'];?>" method="post" enctype="multipart/form-data">-->
                                    <td style="width: 20px;"><?php echo $no++; ?></td>
                                    <td><input type="hidden" name="tgl_beli" value="<?php echo $list['tgl_beli']; ?>" readonly><?php echo $list['tgl_beli']; ?></td>
                                    <td><input type="hidden" name="nomor_po" value="<?php echo $list['nomor_po']; ?>" readonly><?php echo $list['nomor_po']; ?></td>
                                    <td><input type="hidden" name="supplier" value="<?php echo $list['kode_supplier']; ?> - <?php echo $list['nama_supplier']; ?>" readonly><?php echo $list['kode_supplier']; ?> - <?php echo $list['nama_supplier']; ?></td>
                                    <td><input type="hidden" name="total_beli" value="<?php echo $list['total_beli'];?>">Rp. <?php echo number_format($list['total_beli'],0,",","."); ?> ,-</td>
                                    <td><input type="hidden" name="nama_user" value="<?php echo $list['nama_user']; ?>"><?php echo $list['nama_user']; ?></td>
                                    <td>
                                        <a href="<?=base_url(); ?>pembelian/tambah_terima_barang/<?php echo $list['nomor_po']?>">
                                            <button type="button" class="btn btn-primary"><i class="fa fa-check"></i></button>
                                        </a>
                                    </td>
                                    <?php
                                    if ($_SESSION['akses'] !== 'Asisten Apoteker') {

                                    ?>
                                    <td>
                                        <a onclick="return confirm('Anda yakin ingin menghapus pembelian ini ?')" href="<?=base_url(); ?>pembelian/hapus_pembelian_sementara/<?php echo $list['nomor_po']?>">
                                            <button type="button" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                        </a>
                                    </td>
                                    <?php } ?>
                                    <!--</form>-->
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>