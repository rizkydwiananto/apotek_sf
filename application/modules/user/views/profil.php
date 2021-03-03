<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->

            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/images/user/300/default.jpg" alt="User profile picture">

                <h3 class="profile-username text-center"><?php echo $this->session->userdata("nama_user"); ?></h3>

                <p class="text-muted text-center">- <?php echo $this->session->userdata("akses"); ?> -</p>

            </div>
            <!-- /.box-body -->


        <!-- About Me Box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Profil Saya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-id-badge margin-r-5"></i> Username</strong>

                <p class="text-muted">
                    <?php echo $this->session->userdata("username"); ?>
                </p>

                <hr>

                <strong><i class="fa fa-id-badge margin-r-5"></i> Nama</strong>

                <p class="text-muted"><?php echo $this->session->userdata("nama_user"); ?></p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#peraturan" data-toggle="tab">Peraturan</a></li>
                <li><a href="#edit" data-toggle="tab">Edit</a></li>
                <li><a href="#ubah_password" data-toggle="tab">Ubah Password</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="peraturan">
                    <!-- Post -->
                    <p>
                        Untuk merubah profil, klik <b>"Edit"</b> pada tab di samping kanan.
                        <br>
                        Untuk merubah password, klik <b>"Ubah Password"</b> pada tab di samping kanan.
                        <br>
                        Setelah merubah profil atau password, mohon untuk <b>Sign Out</b> dan <b>Login</b> kembali
                        <br>
                        Terimakasih !
                    </p>
                    <hr>
                    <img src="<?=base_url()?>assets/images/foto/LOGO_APOTEK.png" width="30%">
                </div>

                <div class="tab-pane" id="edit">
                    <form class="form-horizontal" action="<?=base_url(); ?>user/editprofilproses/<?php echo $this->session->userdata("id_user"); ?>" method="post">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $this->session->userdata("username"); ?>" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $this->session->userdata("nama_user"); ?>" name="nama_user">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="myCheck" onclick="myFunction()"> Cek , jika sudah sesuai lalu klik submit</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="text" style="display: none">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a onclick="return confirm('Username sudah dirubah, mohon untuk login kembali')">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="ubah_password">
                    <form class="form-horizontal" action="<?=base_url(); ?>user/editpassprofproses/<?php echo $this->session->userdata("id_user"); ?>" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" value="<?php echo $this->session->userdata("password"); ?>" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="check" onclick="myFunction2()"> Cek , jika sudah sesuai lalu klik submit</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="text2" style="display: none">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>

<script>
    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("text");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>

<script>
    function myFunction2() {
        var checkBox = document.getElementById("check");
        var text = document.getElementById("text2");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>