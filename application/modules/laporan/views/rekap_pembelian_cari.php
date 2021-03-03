<div class="row">

    <div class="col-md-12">
        <div class="form-group pull-left">

        </div>
    </div>

    <div class="col-md-10">
        <form class="form-horizontal" action="<?=base_url()?>laporan/rekap_pembelian_cari" method="post" onsubmit="return validasi_input(this)">
            <div class="col-md-5">
                <div class="form-group pull-left">
                    <label class="col-sm-4 control-label">Tanggal Awal</label>
                    <div class="col-sm-8">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker1" name="tgl_awal">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group pull-left">
                    <label class="col-sm-4 control-label">Tanggal Akhir</label>
                    <div class="col-sm-8">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker2" name="tgl_akhir">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <button class="btn bg-fuchsia" type="submit">
                        <i class="fa fa-search"></i>
                        Cari Rekap Pembelian
                    </button>
                </div>
            </div>
        </form>
    </div>


    <div class="col-md-12">
        <div class="box box-success">

        </div>
    </div>


    <div class="col-md-12">
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
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; $jumlahtotalbeli = 0; foreach ($pembelian as $list): ?>
                    <tr>
                        <!--<form target="_blank" action="<?//=base_url(); ?>laporan/cetak/<?php //echo $list['nomor_po'];?>" method="post" enctype="multipart/form-data">-->
                        <td><?php echo $no++; ?></td>
                        <td><input type="hidden" name="tgl_beli" value="<?php echo $list['tgl_beli']; ?>" readonly><?php echo $list['tgl_beli']; ?></td>
                        <td><input type="hidden" name="waktu" value="<?php echo $list['waktu']; ?>" readonly><?php echo $list['waktu']; ?></td>
                        <td><input type="hidden" name="nomor_po" value="<?php echo $list['nomor_po']; ?>" readonly><?php echo $list['nomor_po']; ?></td>
                        <td><input type="hidden" name="supplier" value="<?php echo $list['kode_supplier']; ?> - <?php echo $list['nama_supplier']; ?>" readonly><?php echo $list['kode_supplier']; ?> - <?php echo $list['nama_supplier']; ?></td>
                        <td style="text-align: right"><input type="hidden" name="total_beli" value="<?php echo $list['total_beli'];?>">Rp. <?php echo number_format($list['total_beli'],0,",","."); ?> ,-</td>
                        <td><input type="hidden" name="nama_user" value="<?php echo $list['nama_user']; ?>"><?php echo $list['nama_user']; ?></td>
                        <!--</form>-->
                        <?php
                            $jumlahtotalbeli += $list['total_beli'];
                        ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="box-body table-responsive padding">

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <?php
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $count = count($pembelian);
                        ?>
                        <td><h4>Rekap Pembelian pada Tanggal &nbsp; <b><u><?php echo date('d F Y', strtotime($tgl_awal)); ?></u></b> &nbsp; s.d. Tanggal &nbsp; <b><u><?php echo date('d F Y', strtotime($tgl_akhir)); ?></u></b> &nbsp; sebanyak &nbsp; <b><?php echo $count; ?></b> &nbsp; transaksi</h4></td>
                    </tr>
                    <tr>
                        <td><h4>Dengan Jumlah Grand Total Pembelian Sejumlah &nbsp; <b><?php echo "Rp  ".number_format($jumlahtotalbeli,0,",","."); ?></b></h4></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-12">
        <div class="box box-success">

        </div>
    </div>
</div>

<div class="box-footer">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>EXPORT DATA KE :</label>
            </div>

            <div class="col-md-1">
                <a href="#" target="_blank">
                    <button type="button" class="btn btn-danger">
                        PDF - <i class="fa fa-file-pdf-o"></i>
                    </button>
                </a>
            </div>

            <div class="col-md-1">
                <a href="#" target="_blank">
                    <button type="button" class="btn btn-success">
                        EXCEL - <i class="fa fa-file-excel-o"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function validasi_input(form){
        if (form.tgl_awal.value == "" && form.tgl_akhir.value == "") {
            alert("Tanggal Awal Dan Tanggal Akhir Masih Kosong !");
            form.tgl_awal.focus();
            form.tgl_akhir.focus();
            return (false);
        }else if (form.tgl_awal.value == ""){
            alert("Tanggal Awal Masih Kosong !");
            form.tgl_awal.focus();
            return (false);
        } else if (form.tgl_akhir.value == ""){
            alert("Tanggal Akhir Masih Kosong !");
            form.tgl_akhir.focus();
            return (false);
        }
        return (true);
    }
</script>