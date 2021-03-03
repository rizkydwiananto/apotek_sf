<div class="box-body">
  <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Cari Barang & Pilih</label><br>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cariProduk">Klik / Tekan</button>
        </div>

        <?php
        // define variables and set to empty values
        $kode_brg = $nama_barang = $nama_satuan_brg = $hrg_beli = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $kode_brg = test_input($_POST["kode_brg"]);
            $nama_barang = test_input($_POST["nama_barang"]);
            $nama_satuan_brg = test_input($_POST["nama_satuan_brg"]);
            $hrg_beli = test_input($_POST["hrg_beli"]);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <form action="<?=base_url(); ?>pembelian/add_to_cart_proses" method="post" onsubmit="return validasi_input(this)">
        <!-- BARANG TERPILIH DIBAWAH-->
            <div class="row">
                <input class="form-control" type="hidden" name="nomor_po" value="<?php echo $nomor_po; ?>">
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
                    <input class="form-control" type="text" value="<?php echo $nama_satuan_brg; ?>" name="satuan_brg_beli" readonly>
                </div>
            </div>

            <br>

            <div class="row" id="tampil">
                <div class="col-xs-4">
                    <label>Harga Beli</label>
                    <input id="d" onkeyup="hitung()" class="form-control" type="text" value="<?php echo $hrg_beli; ?>" name="hrg_beli" readonly>
                </div>

                <div class="col-xs-4">
                    <label>Qty Order</label>
                    <input id="e" onkeyup="hitung()" class="form-control" type="text" name="beli_qty" placeholder="Ketik Angka Saja">
                </div>

                <div class="col-xs-4">
                    <label>Total</label>
                    <input id="c" onkeyup="hitung()" class="form-control" type="text" name="beli_total" readonly>
                </div>
            </div>
            <!-- END OF BARANG TERPILIH DIBAWAH-->

            <br>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Tambahkan &nbsp; &nbsp;<i class="fa fa-arrow-down"></i></button>
            </div>
        </form>


    </div>

      <form action="<?=base_url(); ?>pembelian/tambah_pembelian_proses" method="post">
          <div class="row">
              <div class="col-md-6">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Tanggal Pembelian</label>
                              <?php date_default_timezone_set('Asia/Jakarta')?>
                              <input class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                              <input class="form-control" type="hidden" name="tgl_beli" value="<?php echo date("Y-m-d"); ?>" readonly>
                          </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Waktu</label>
                              <?php date_default_timezone_set('Asia/Jakarta')?>
                              <input class="form-control" value="<?php echo date("H:i:s"); ?>" readonly>
                              <input class="form-control" type="hidden" name="waktu" value="<?php echo date("H:i:s"); ?>" readonly>
                          </div>
                      </div>
                  </div>



                  <div class="form-group">
                      <label>Nomor PO</label>
                      <input class="form-control" value="<?php echo $nomor_po; ?>" readonly>
                      <input class="form-control" type="hidden" name="nomor_po" value="<?php echo $nomor_po; ?>" readonly>
                  </div>

                  <div class="form-group">
                      <label>Suplier</label>
                      <select class="form-control" name="id_supplier" required>
                          <option value="">- Pilih Supplier -</option>
                          <?php foreach ($supplier as $category): ?>
                              <option value="<?php echo $category["id_supplier"]; ?>"><?php echo $category["kode_supplier"]; ?> - <?php echo $category["nama_supplier"]; ?> </option>
                          <?php endforeach; ?>
                      </select>
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
        <?php $no = 1; foreach ($add_to_cart as $list): ?>
        <tr>
            <td style="width: 20px;"><?php echo $no++; ?></td>
            <input type="hidden" value="<?php echo $list['nomor_po']; ?>" name="nomor_po_beli[]">
            <td><input style="width: 70px;" type="hidden" name="kode_brg[]" value="<?php echo $list["kode_brg"]; ?>"><?php echo $list["kode_brg"]; ?></td>
            <td><input type="hidden" name="nama_barang[]" value="<?php echo $list["nama_barang"]; ?>"><?php echo $list["nama_barang"]; ?></td>
            <td><input style="width: 60px;" type="hidden" name="satuan_brg_beli[]" value="<?php echo $list["satuan_brg_beli"]; ?>" ><?php echo $list["satuan_brg_beli"]; ?></td>
            <td><input type="hidden" name="hrg_beli[]" value="<?php echo $list["hrg_beli"]; ?>" readonly>Rp. <?php echo number_format($list["hrg_beli"],0,",","."); ?>,-</td>
            <td><input style="width: 70px;" type="hidden" name="beli_qty[]" value="<?php echo $list["beli_qty"]; ?>" ><?php echo $list["beli_qty"]; ?></td>
            <td><input type="hidden" name="beli_total[]" value="<?php echo $list["beli_total"]; ?>" readonly>Rp. <?php echo number_format($list["beli_total"],0,",","."); ?></td>
            <td>
                <a href="<?=base_url(); ?>pembelian/hapus_add_to_cart/<?php echo $list["id_add"]?>">
                    <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-times" style="width: 20px;"></i></button></a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="alert alert-success">
        <h3>
            <i class="icon fa fa-check"></i>
            <span class="pull-right"><b>Total &nbsp; &nbsp; Rp. <?php echo number_format($jumlah_total,0, ",","."); ?> ,-</b></span>
            <input type="hidden" name="nama_user" value="<?php echo $this->session->userdata("nama_user"); ?>">
            <input type="hidden" value="<?php echo $jumlah_total; ?>" name="total_beli">
        </h3>
    </div>
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-success">Submit</button>
    <a onclick="return confirm('Anda yakin ingin membatalkan ?')" href="<?=base_url(); ?>pembelian/batal_pembelian/<?php echo $nomor_po; ?>">
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
                                    <form method="post" action="<?=base_url(); ?>pembelian/tambah_pembelian"> <!-- form --> <!-- id=inputText-->
                                        <td><?php echo $no++; ?></td>
                                        <td><input type="text" name="kode_brg" value="<?php echo $list["kode_brg"]; ?>" hidden><?php echo $list["kode_brg"]; ?></td>
                                        <td><input type="text" name="nama_barang" value="<?php echo $list["nama_barang"]; ?>" hidden><?php echo $list["nama_barang"]; ?></td>
                                        <td><?php echo $list["nama_jenis_brg"]; ?></td>
                                        <td><?php echo $list["stock"]; ?></td>
                                        <td><input type="text" name="nama_satuan_brg" value="<?php echo $list["nama_satuan_brg"]; ?>" hidden><?php echo $list["nama_satuan_brg"]; ?></td>
                                        <td><input type="text" name="hrg_beli" value="<?php echo $list["hrg_beli"]; ?>" hidden>Rp. <?php echo number_format($list["hrg_beli"],0,",","."); ?>,-</td>
                                        <td>Rp. <?php echo number_format($list["hrg_jual"],0,",","."); ?>,-</td>
                                        <td><?php echo $list["expired"]; ?></td>
                                        <td>
                                            <input type="submit" name="submit" value="submit" class="btn btn-success btn-flat">
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

<script type="text/javascript">
    function validasi_input(form){
        if (form.beli_qty.value == ""){
            alert("Cari / Pilih Barang dan Isi Qty Order !");
            form.beli_qty.focus();
            return (false);
        }
        return (true);
    }
</script>