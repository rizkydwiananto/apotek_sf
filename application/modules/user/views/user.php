<div class="box-header">
    <div class="form-group pull-left">
        <a href="<?php base_url();?>user/tambah">
            <button type="button" class="btn btn-info btn-flat"><b>Tambah User</b></button>
        </a>
    </div>
</div>

<div class="box-body table-responsive padding">

    <table id="example1" class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama User</th>
            <th>Akses</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($user as $list): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $list['username']; ?></td>
                <td><?php echo $list['nama_user']; ?></td>
                <td><?php echo $list['akses']; ?></td>
                <td>
                    <a href="<?php base_url();?>user/edituser/<?php echo $list['id_user']; ?>">
                        <button type="button" class="btn btn-primary btn-flat">Edit</button></a>
                </td>
                <td>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus user ini ?')" href="<?=base_url(); ?>user/hapus/<?php echo $list['id_user']?>">
                        <button type="button" class="btn btn-danger btn-flat">Hapus</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>