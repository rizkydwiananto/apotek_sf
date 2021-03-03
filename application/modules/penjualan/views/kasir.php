<div class="box-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Cari Barang & Pilih</label><br>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cariProduk">Klik / Tekan</button>
            </div>

            <?php
            // define variables and set to empty values
            $kode_brg = $nama_barang = $nama_satuan_brg = $hrg_jual = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $kode_brg = test_input($_POST["kode_brg"]);
                $nama_barang = test_input($_POST["nama_barang"]);
                $nama_satuan_brg = test_input($_POST["nama_satuan_brg"]);
                $hrg_jual = test_input($_POST["hrg_jual"]);
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>

            <form action="<?=base_url(); ?>penjualan/add_to_jual_proses" method="post" onsubmit="return validasi_input(this)">
                <!-- BARANG TERPILIH DIBAWAH-->
                <div class="row">
                    <input class="form-control" type="hidden" name="nomor_struk" value="<?php echo $nomor_struk; ?>">
                    <div class="col-xs-3">
                        <label>Kode Barang</label>
                        <input class="form-control" type="text" value="<?php echo $kode_brg; ?>" name="kode_brg" readonly>
                    </div>

                    <div class="col-sm-6">
                        <label>Nama Barang</label>
                        <input class="form-control" type="text" value="<?php echo $nama_barang; ?>" name="nama_barang" readonly>
                    </div>

                    <div class="col-xs-3">
                        <label>Satuan</label>
                        <input class="form-control" type="text" value="<?php echo $nama_satuan_brg; ?>" name="satuan_brg" readonly>
                    </div>
                </div>

                <br>

                <div class="row" id="tampil">
                    <div class="col-xs-4">
                        <label>Harga Jual</label>
                        <input id="d" onkeyup="hitung()" class="form-control" type="text" value="<?php echo $hrg_jual; ?>" name="hrg_jual" readonly>
                    </div>

                    <div class="col-xs-4">
                        <label>Qty</label>
                        <input id="e" onkeyup="hitung()" class="form-control" type="text" name="jual_qty" placeholder="Ketik Angka Saja">
                    </div>

                    <div class="col-xs-4">
                        <label>Total</label>
                        <input id="c" onkeyup="hitung()" class="form-control" type="text" name="jual_total" readonly>
                    </div>
                </div>
                <!-- END OF BARANG TERPILIH DIBAWAH-->

                <br>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Tambahkan &nbsp; &nbsp;<i class="fa fa-arrow-down"></i></button>
                </div>
            </form>


        </div>

        <form action="<?=base_url(); ?>penjualan/tambah_penjualan_proses" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
                        <input class="form-control" type="hidden" name="tgl_jual" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nomor Struk</label>
                        <input class="form-control" value="<?php echo $nomor_struk; ?>" readonly>
                        <input class="form-control" type="hidden" name="nomor_struk" value="<?php echo $nomor_struk; ?>" readonly>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <label>Customer</label>
                            <input class="form-control" type="text" name="customer" placeholder="Ketik nama customer / pasien">
                        </div>

                        <div class="col-xs-5">
                            <label>Telpon</label>
                            <input class="form-control" type="text" name="telpon" placeholder="Ketik nomor telpon">
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" type="text" name="alamat" placeholder="Ketik alamat customer / pasien">
                    </div>

                </div>
            </div>
    </div>
</div>

<div class="box-body">

</div>

<div class="box-body table-responsive padding">
    <table class="table table-bordered table-hover dataTable no-footer">
        <thead>
        <tr>
            <th style="width: 20px;">No</th>
            <th style="width: 70px;">Kode Barang</th>
            <th style="width: 200px;">Nama Barang</th>
            <th style="width: 60px;">Satuan</th>
            <th style="width: 100px;">Harga</th>
            <th style="width: 70px;">Qty Order</th>
            <th style="width: 100px;"><span id="amount" class="amount">Sub Total</span></th>
            <th style="width: 20px;">Hapus</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($add_to_jual as $list): ?>
            <tr>
                <td style="width: 20px;"><?php echo $no++; ?></td>
                <input type="hidden" value="<?php echo $list['nomor_struk']; ?>" name="nomor_struk_jual[]">
                <td><input style="width: 70px;" type="hidden" name="kode_brg[]" value="<?php echo $list["kode_brg"]; ?>"><?php echo $list["kode_brg"]; ?></td>
                <td><input type="hidden" name="nama_barang[]" value="<?php echo $list["nama_barang"]; ?>"><?php echo $list["nama_barang"]; ?></td>
                <td><input style="width: 60px;" type="hidden" name="satuan_brg[]" value="<?php echo $list["satuan_brg"]; ?>" ><?php echo $list["satuan_brg"]; ?></td>
                <td><input type="hidden" name="hrg_jual[]" value="<?php echo $list["hrg_jual"]; ?>" readonly>Rp. <?php echo number_format($list["hrg_jual"],0,",","."); ?>,-</td>
                <td><input style="width: 70px;" type="hidden" name="jual_qty[]" value="<?php echo $list["jual_qty"]; ?>" ><?php echo $list["jual_qty"]; ?></td>
                <td><input type="hidden" name="jual_total[]" value="<?php echo $list["jual_total"]; ?>" readonly>Rp. <?php echo number_format($list["jual_total"],0,",","."); ?></td>
                <td>
                    <a href="<?=base_url(); ?>penjualan/hapus_add_to_jual/<?php echo $list["id_add_jual"]?>">
                        <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-times" style="width: 20px;"></i></button></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td colspan="2"><font >Total</font></td>
            <td colspan="2"><font >Rp. <?php echo number_format($jumlah_total,2,',','.'); ?> ,-</font></td>
            <input type="hidden" name="jumlah_total" value="<?php echo $jumlah_total; ?>">
        </tr>
        <tr>
            <?php
            $totalharga = $jumlah_total;
            $totalharga = ceil($totalharga);
            if (substr($totalharga,-2)<100){
                $total_harga=round($totalharga,-2);
            } else {
                $total_harga=round($totalharga,-2)+50;
            }

            $pembulatan = $total_harga - $jumlah_total;
            ?>
            <td colspan="4"></td>
            <td colspan="2"><font >Pembulatan</font></td>
            <td colspan="2"><font >Rp. <?php echo number_format($pembulatan,2,',','.'); ?> ,-</font></td>
            <input type="hidden" name="pembulatan" value="<?php echo $pembulatan; ?>">
        </tr>
        <tr style="background-color: #EEEEEE">
            <td colspan="4"></td>
            <input type="hidden" id="h" onkeyup="bayar()"  name="total_jual" value="<?php echo $total_harga; ?>">
            <td colspan="2"><font size="4;"><b>Sub Total</b></font></td>
            <td colspan="2"><font size="4;"><b>Rp. <?php echo number_format($total_harga,2,',','.'); ?> ,-</b></font></td>
            <!--<input id="h" onkeyup="hitung()" class="form-control" type="text" value="<?php //echo $hrg_jual; ?>" name="hrg_jual" readonly>-->
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td colspan="2"><b>Bayar</b></td>
            <td colspan="2"><input id="g" onkeyup="bayar()" name="bayarcash"></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td colspan="2"><b>Kembali</b></td>
            <td colspan="2"><input id="i" name="kembali" readonly onkeyup="bayar()"></td>
        </tr>
        </tbody>
    </table>
    <input type="hidden" name="nama_user" value="<?php echo $this->session->userdata("nama_user"); ?>">
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-success">Submit</button>
    <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>penjualan/batal_penjualan">
        <button type="button" class="btn btn-danger">Batal</button>
    </a>
</div>
</form>

<!-- MODAL -->
<div class="modal fade box-body table-responsive padding" id="cariProduk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Barang</h4>
            </div>

            <div class="modal-body">
                <div class="box-body table-responsive padding">
                    <div class="table-responsive padding">
                        <table id="example1" class="table table-bordered table-hover dataTable no-footer">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis</th>
                                <th>Stock</th>
                                <th>Satuan</th>
                                <th>H_Beli</th>
                                <th>H_Jual</th>
                                <th>Expired</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $no = 1; foreach ($barang as $list): ?>
                                <tr>
                                    <form method="post" action="<?=base_url(); ?>penjualan/kasir"> <!-- form --> <!-- id=inputText-->
                                        <td><?php echo $no++; ?></td>
                                        <td><input type="text" name="kode_brg" value="<?php echo $list["kode_brg"]; ?>" hidden><?php echo $list["kode_brg"]; ?></td>
                                        <td><input type="text" name="nama_barang" value="<?php echo $list["nama_barang"]; ?>" hidden><?php echo $list["nama_barang"]; ?></td>
                                        <td><?php echo $list["nama_jenis_brg"]; ?></td>
                                        <td><?php echo $list["stock"]; ?></td>
                                        <td><input type="text" name="nama_satuan_brg" value="<?php echo $list["nama_satuan_brg"]; ?>" hidden><?php echo $list["nama_satuan_brg"]; ?></td>
                                        <td><input type="text" name="hrg_beli" value="<?php echo $list["hrg_beli"]; ?>" hidden>Rp. <?php echo number_format($list["hrg_beli"],0,",","."); ?>,-</td>
                                        <td><input type="text" name="hrg_jual" value="<?php echo $list["hrg_jual"]; ?>" hidden>Rp. <?php echo number_format($list["hrg_jual"],0,",","."); ?>,-</td>
                                        <td><?php echo $list["expired"]; ?></td>
                                        <td>
                                            <?php
                                            $input = '<input type="submit" name="submit" value="submit" class="btn btn-success btn-flat">';
                                            $notinput = '<input type="button" value="X" class="btn btn-danger">';
                                            $cant = $list["stock"];
                                            if ($cant > 0) {
                                                echo $input;
                                            } else {
                                                echo $notinput;
                                            }
                                            ?>
                                            <!--<input type="submit" name="submit" value="submit" class="btn btn-success btn-flat">-->
                                        </td>
                                    </form>
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

            <script>
                $(function () {
                    $("#example1").DataTable();
                    $("#example2").DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false
                    });

                    //Date picker
                    $("#datepicker1").datepicker({
                        autoclose: true,todayHighlight: true,format: "yyyy-mm-dd"
                    })
                    $("#datepicker2").datepicker({
                        autoclose: true,todayHighlight: true,format: "yyyy-mm-dd"
                    })

                    //Initialize Select2 Elements
                    $(".select2").select2()
                });
            </script>

        </div>
    </div>
</div>


<script>
    function hitung() {
        var d = $("#d").val();
        var e = $("#e").val();
        c = d * e;
        $("#c").val(c);
    }
</script>

<script>
    function bayar() {
        var g = $("#g").val();
        var h = $("#h").val();
        i = g - h;
        $("#i").val(i);
    }
</script>