<div class="box-header">
    <div class="form-group pull-left">
        <a href="<?php base_url();?>pembelian/tambah_pembelian">
            <button type="button" class="btn btn-info btn-flat"><b>Tambah Pembelian</b></button>
        </a>
    </div>
</div>


<div class="box-body table-responsive padding">

    <table id="example1" class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th>No</th>
            <th>Tgl Pesan</th>
            <th>Waktu</th>
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
        <?php $no = 1; foreach ($pembelian as $list): ?>
            <tr>
                <!--<form target="_blank" action="<?//=base_url(); ?>laporan/cetak/<?php //echo $list['nomor_po'];?>" method="post" enctype="multipart/form-data">-->
                <td><?php echo $no++; ?></td>
                <td><input type="hidden" name="tgl_beli" value="<?php echo $list['tgl_beli']; ?>" readonly><?php echo $list['tgl_beli']; ?></td>
                <td><input type="hidden" name="waktu" value="<?php echo $list['waktu']; ?>" readonly><?php echo $list['waktu']; ?></td>
                <td><input type="hidden" name="nomor_po" value="<?php echo $list['nomor_po']; ?>" readonly><?php echo $list['nomor_po']; ?></td>
                <td><input type="hidden" name="supplier" value="<?php echo $list['kode_supplier']; ?> - <?php echo $list['nama_supplier']; ?>" readonly><?php echo $list['kode_supplier']; ?> - <?php echo $list['nama_supplier']; ?></td>
                <td><input type="hidden" name="total_beli" value="<?php echo $list['total_beli'];?>">Rp. <?php echo number_format($list['total_beli'],0,",","."); ?> ,-</td>
                <td><input type="hidden" name="nama_user" value="<?php echo $list['nama_user']; ?>"><?php echo $list['nama_user']; ?></td>
                <td>
                    <a href="<?=base_url(); ?>pembelian/lihat_pembelian/<?php echo $list['nomor_po']?>">
                        <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </a>
                </td>
                <?php
                if ($_SESSION['akses'] !== 'Asisten Apoteker') {

                ?>
                <td>
                    <a onclick="return confirm('Anda yakin ingin menghapus pembelian ini ?')" href="<?=base_url(); ?>pembelian/hapus_pembelian/<?php echo $list['nomor_po']?>">
                        <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-close"></i></button></a>
                </td>
                <?php } ?>
                <!--</form>-->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>