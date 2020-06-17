<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <div id="dropzone1" class="pro-ad">
                        <h3>Edit Profil</h3>
                        <?php foreach ($akun as $profil) : 
                            if ($this->session->userdata('level') == "Guru") {?>
                                <form action="<?= site_url("guru/editProfil/".$profil['nip_nik'])?>" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" enctype= "multipart/form-data">
                            <?php } else {?>
                                <form action="<?= site_url("siswa/editProfil/".$profil['nisn'])?>" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" enctype= "multipart/form-data">
                            <?php }?>
                            <div class="row h-100 justify-content-center">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input name="username" type="text" class="form-control" value="<?= ($this->session->userdata('level') == "Guru") ? $profil['nip_nik'] : $profil['nisn']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Password" minlength="8" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input name="nama" type="text" class="form-control" value="<?= $profil['nama'];?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input name="alamat" type="text" class="form-control" value="<?= ($profil['alamat'] == null) ? 'Alamat' : $profil['alamat']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control" value="<?= ($profil['email'] == null) ? 'E-mail' : $profil['email'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Nomor Handphone</label>
                                        <input name="phone" type="text" class="form-control" value="<?= ($profil['phone'] == null) ? 'Phone' : $profil['phone'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="image-upload">
                                        <label for="file-input">
                                            <img id="foto" class="img-circle m-b" src="<?= ($profil['foto'] == null) ? base_url()."asset/themee/img/user.png" : ($this->session->userdata('level') == "Guru" ? base_url() . "upload/guru/" . $profil['foto'] : base_url() . "upload/siswa/" . $profil['foto'])?>"/>
                                        </label>
                                        <input name="foto" class="form-control" id="file-input" type="file" onchange="document.getElementById('foto').src = window.URL.createObjectURL(this.files[0])"/>
                                    </div>
                                    <p style="text-align: center;">Klik pada gambar untuk mengubah.</p>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="payment-adress">
                                        <input class="btn btn-danger" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Batal"/>
                                        <button name="submitEdit" type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
