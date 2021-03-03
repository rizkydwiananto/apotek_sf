<div class="box-header">
    <div class="form-group pull-left">
        <a href="<?php base_url();?>pembelian/tambah_supplier">
            <button type="button" class="btn btn-info btn-flat"><b>Tambah supplier</b></button>
        </a>
    </div>
</div>

<div class="box-body table-responsive padding">

    <table id="example1" class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($supplier as $list): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $list['kode_supplier']; ?></td>
                <td><?php echo $list['nama_supplier']; ?></td>
                <td><?php echo $list['alamat_supplier']; ?></td>
                <td><?php echo $list['telpon_supplier']; ?></td>
                <td>
                    <a href="<?php base_url();?>pembelian/edit_supplier/<?php echo $list['id_supplier']; ?>">
                        <button type="button" class="btn btn-primary btn-flat">Edit</button></a>
                </td>
                <td>
                    <a onclick="return confirm('Anda yakin ingin menghapus supplier ini ?')" href="<?=base_url(); ?>pembelian/hapus_supplier/<?php echo $list['id_supplier']?>">
                        <button type="button" class="btn btn-danger btn-flat">Hapus</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>