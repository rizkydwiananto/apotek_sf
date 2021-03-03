<div class="box-header">
    <div class="form-group pull-left">
        <a href="<?php base_url();?>barang/tambah_jenis_brg">
            <button type="button" class="btn btn-info btn-flat"><b>Tambah Jenis Barang</b></button>
        </a>
    </div>
</div>

<div class="box-body table-responsive padding">

    <table id="example1" class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($jenis_brg as $list): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $list['nama_jenis_brg']; ?></td>
                <td>
                    <a href="<?php base_url();?>barang/edit_jenis_brg/<?php echo $list['id_jenis_brg']; ?>">
                        <button type="button" class="btn btn-primary btn-flat">Edit</button></a>
                </td>
                <td>
                    <a onclick="return confirm('Anda yakin ingin menghapus jenis barang ini ?')" href="<?=base_url(); ?>barang/hapus_jenis_brg/<?php echo $list['id_jenis_brg']?>">
                        <button type="button" class="btn btn-danger btn-flat">Hapus</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>