<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <div id="dropzone1" class="pro-ad">
                        <h3>Edit Data Guru</h3>
                        <form action="<?= site_url("admin/editGuru")?>" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                            <div class="row h-100 justify-content-center">
                            <?php foreach ($edit as $guru) : ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  
                                    <div class="form-group">
                                        <label for="username">NIP/NIK</label>
                                        <input name="username" type="text" class="form-control" placeholder="<?= $guru['nip_nik']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input name="nama" type="text" class="form-control" placeholder="<?= $guru['nama'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input name="alamat" type="text" class="form-control" placeholder="<?= ($guru['alamat'] == null) ? 'Alamat' : $guru['alamat']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="<?= ($guru['email'] == null) ? 'E-mail' : $guru['email'];?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Nomor Handphone</label>
                                        <input name="phone" type="text" class="form-control" placeholder="<?= ($guru['phone'] == null) ? 'Phone' : $guru['phone'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control" placeholder="<?= ($guru['jabatan'] == null) ? 'Jabatan' : $guru['jabatan'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="image-upload">
                                        <label for="file-input">
                                            <img class="img-circle m-b" src="<?= ($guru['foto'] == null) ? base_url()."asset/themee/img/user.png" : $guru['foto'];?>"/>
                                        </label>
                                        <input id="file-input" type="file"/>
                                    </div>
                                    <p style="text-align: center;">Klik pada gambar untuk mengubah.</p>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="payment-adress">
                                        <a class="btn btn-danger" href="<?php echo base_url('index.php/' . strtolower($this->session->userdata('level')));?>">Batal</a>
                                        <button name="submit" type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
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
