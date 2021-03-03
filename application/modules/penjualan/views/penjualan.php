<div class="box-header">
    <div class="form-group pull-left">
        <a href="<?php base_url();?>penjualan/kasir">
            <button type="button" class="btn btn-warning"><b>Tambah Penjualan / Kasir</b></button>
        </a>
    </div>
</div>

<div class="box-body table-responsive padding">

    <table id="example1" class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th>No</th>
            <th>Tgl Jual</th>
            <th>Nomor Struk</th>
            <th>Customer</th>
            <th>Kasir</th>
            <th>Total Jual</th>
            <th>Lihat</th>
            <?php
            if ($_SESSION['akses'] !== 'Kasir') {
                if ($_SESSION['akses'] !== 'Asisten Apoteker'){
            ?>
            <th>Hapus</th>
            <?php }} ?>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($penjualan as $list): ?>
            <tr>
                <!--<form target="_blank" action="<?//=base_url(); ?>laporan/cetak/<?php //echo $list['nomor_po'];?>" method="post" enctype="multipart/form-data">-->
                <td><?php echo $no++; ?></td>
                <td><input type="hidden" name="tgl_jual" value="<?php echo $list['tgl_jual']; ?>" readonly><?php echo $list['tgl_jual']; ?></td>
                <td><input type="hidden" name="nomor_struk" value="<?php echo $list['nomor_struk']; ?>" readonly><?php echo $list['nomor_struk']; ?></td>
                <td><input type="hidden" name="customer" value="<?php echo $list['customer']; ?>" readonly><?php echo $list['customer']; ?></td>
                <td><input type="hidden" name="nama_user" value="<?php echo $list['nama_user']; ?>"><?php echo $list['nama_user']; ?></td>
                <td><input type="hidden" name="total_jual" value="<?php echo $list['total_jual'];?>">Rp. <?php echo number_format($list['total_jual'],0,",","."); ?> ,-</td>
                <td>
                    <a href="<?=base_url(); ?>penjualan/lihat_penjualan/<?php echo $list['nomor_struk']?>">
                        <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </a>
                </td>
                <?php
                if ($_SESSION['akses'] !== 'Kasir') {
                if ($_SESSION['akses'] !== 'Asisten Apoteker'){
                ?>
                <td>
                    <a onclick="return confirm('Anda yakin ingin menghapus penjualan ini ?')" href="<?=base_url(); ?>penjualan/hapus_penjualan/<?php echo $list['nomor_struk']?>">
                        <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-close"></i></button></a>
                </td>
                <?php }} ?>
                <!--</form>-->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>