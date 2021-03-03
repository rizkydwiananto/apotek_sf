<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>Dashboard</h3>

                <p>-</p>
            </div>
            <div class="icon">
                <i class="fa fa-dashboard"></i>
            </div>
            <a href="<?=base_url();?>dashboard" class="small-box-footer">Klik <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>User</h3>

                <p>-</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-circle-o"></i>
            </div>
            <?php
            if ($_SESSION['akses'] == 'Kasir') {
                echo '<a href="http://localhost/apotek_sf/user/profil" class="small-box-footer">Klik <i class="fa fa-arrow-circle-right"></i></a>';
            } elseif($_SESSION['akses'] == 'Asisten Apoteker') {
                echo '<a href="http://localhost/apotek_sf/user/profil" class="small-box-footer">Klik <i class="fa fa-arrow-circle-right"></i></a>';
                } else {
                echo '<a href="http://localhost/apotek_sf/user" class="small-box-footer">Klik <i class="fa fa-arrow-circle-right"></i></a>';
            }
            ?>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h3>Barang</h3>

                <p>-</p>
            </div>
            <div class="icon">
                <i class="fa fa-cube"></i>
            </div>

            <a href="<?=base_url();?>barang" class="small-box-footer">Klik <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <?php
    if ($_SESSION['akses'] !== 'Kasir') {
    ?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-fuchsia-active">
            <div class="inner">
                <h3>Pembelian</h3>

                <p>-</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-basket"></i>
            </div>
            <a href="<?=base_url();?>pembelian" class="small-box-footer">Klik <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <?php } ?>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red-active">
            <div class="inner">
                <h3>Penjualan</h3>

                <p>-</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?=base_url();?>penjualan" class="small-box-footer">Klik <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>