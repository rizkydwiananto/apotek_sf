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

                </tbody>
            </table>
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