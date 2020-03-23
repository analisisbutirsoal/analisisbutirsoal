<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <div id="dropzone1" class="pro-ad">
                        <h3>Edit Data Guru</h3>
                        <?php foreach ($edit as $siswa) : ?>
                        <form action="<?= site_url("admin/editSiswa/".$siswa['nisn'])?>" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" enctype= "multipart/form-data">
                            <div class="row h-100 justify-content-center">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  
                                    <div class="form-group">
                                        <label for="username">Nomor Induk</label>
                                        <input name="username" type="text" class="form-control" value="<?= $siswa['nisn']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input name="nama" type="text" class="form-control" value="<?= $siswa['nama'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input name="alamat" type="text" class="form-control" value="<?= ($siswa['alamat'] == null) ? 'Alamat' : $siswa['alamat']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="<?= ($siswa['email'] == null) ? 'E-mail' : $siswa['email'];?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Nomor Handphone</label>
                                        <input name="phone" type="text" class="form-control" value="<?= ($siswa['phone'] == null) ? 'Phone' : $siswa['phone'];?>">
                                    </div>
                                    <label for="phone">Kelas</label><br>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                                                <select name="kelas" data-placeholder="<?= $siswa['kelas']?>" class="chosen-select" tabindex="-1" required>
                                                    <?php foreach($kelas as $kls) : ?>
                                                    <option value=""></option>
                                                    <option value="<?= $kls['kelas']?>"><?= $kls['kelas']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="phone">Tahun Ajaran</label><br>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                                                <select name="tahun" data-placeholder="<?= $siswa['tahun']?>" class="chosen-select" tabindex="-1" required>
                                                    <?php foreach($tahun as $thn) : ?>
                                                    <option value=""></option>
                                                    <option value="<?= $thn['tahun']?>"><?= $thn['tahun']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="image-upload">
                                        <label for="file-input">
                                            <img id="foto" class="img-circle m-b" src="<?= ($siswa['foto'] == null) ? base_url()."asset/themee/img/user.png" : base_url()."upload/siswa/".$siswa['foto'];?>"/>
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
                                        <a class="btn btn-danger" href="<?= site_url('admin/daftarSiswa')?>">Batal</a>
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
