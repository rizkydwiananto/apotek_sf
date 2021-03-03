<div class='form-group'>
    <label>Kode Barang</label>
    <select class='form-control' name='id_supplier' required>
        <option value=''>- Pilih Supplier -</option>
        <?php foreach ($barang as $categorybrg): ?>
            <option value="<?php echo $categorybrg['id_barang']; ?>"><?php echo $categorybrg['kode_brg']; ?> - <?php echo $categorybrg['nama_barang']; ?> </option>
        <?php endforeach; ?>
    </select>
</div>

<div class='form-group'>
    <label>Nama Barang</label>
    <input class='form-control' type='text' name='nama_barang'>
</div>


<div class="row">
    <div class="col-xs-4">
        <label>Harga Beli</label>
        <input class="form-control" name="hrg_beli" placeholder="Isi angka saja">
    </div>

    <div class="col-xs-4">
        <label>Qty</label>
        <input class="form-control" name="" placeholder="Isi angka saja" >
    </div>

    <div class="col-xs-4">
        <label>Sub Total</label>
        <input class="form-control" name="total" readonly="">
    </div>
</div>

<br>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Tambah</button>
</div>