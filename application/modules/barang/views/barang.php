<?php
if ($_SESSION['akses'] !== 'Kasir') {

?>
<div class="box-header">
    <div class="form-group pull-left">
        <a href="<?php base_url();?>barang/tambah_barang">
            <button type="button" class="btn btn-info btn-flat"><b>Tambah Barang</b></button>
        </a>
    </div>
</div>
<?php } ?>
<div class="box-body table-responsive padding" style="font-size: 12px">

    <table id="example1" class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis</th>
            <th>Stock</th>
            <th>Satuan</th>
            <th>Mgn(%)</th>
            <th>H_Beli</th>
            <th>H_Jual</th>
            <th>Expired</th>
            <?php
            if ($_SESSION['akses'] !== 'Kasir') {
            ?>
            <th>Edit</th>
            <th>Hapus</th>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($barang as $list){ ?>
            <?php
            $e1 = $list['expired'] >= date('Y-m-01') && $list['expired'] <= date('Y-m-31');
            $e2 = $list['expired_first'] >= date('Y-m-01') && $list['expired_first'] <= date('Y-m-31');
            $e3 = $list['expired_second'] >= date('Y-m-01') && $list['expired_second'] <= date('Y-m-31');
            $e4 = $list['expired_third'] >= date('Y-m-01') && $list['expired_third'] <= date('Y-m-31');
            if ($e1 || $e2 || $e3 || $e4)
            {
                $ed = 'style="background-color: red; color: white"';
            } else {
                $ed = '';
            }
            ?>
            <tr <?php echo $ed; ?>>
                <td><?php echo $no++; ?></td>
                <td><?php echo $list['kode_brg']; ?></td>
                <td><?php echo $list['nama_barang']; ?></td>
                <td><?php echo $list['nama_jenis_brg']; ?></td>
                <td><?php echo $list['stock']; ?></td>
                <td><?php echo $list['nama_satuan_brg']; ?></td>
                <td><?php echo $list['margin'];?> %</td>
                <td>Rp. <?php echo number_format($list['hrg_beli'],0,',','.'); ?>,-</td>
                <td>Rp. <?php echo number_format($list['hrg_jual'],0,',','.'); ?>,-</td>
                <td><?php echo $list['expired']; ?></td>
                <?php
                if ($_SESSION['akses'] !== 'Kasir') {
                ?>
                <td>
                    <a href="<?php base_url();?>barang/edit_barang/<?php echo $list['id_barang']; ?>">
                        <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                </td>
                <td>
                    <a onclick="return confirm('Anda yakin ingin menghapus barang ini ?')" href="<?=base_url(); ?>barang/hapus_barang/<?php echo $list['id_barang']?>">
                        <button type="button" class="btn btn-danger"><i class="fa fa-close"></i></button></a>
                </td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
