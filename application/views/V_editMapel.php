<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <div id="dropzone1" class="pro-ad">
                        <h3>Edit Mata Pelajaran</h3>
                        <?php foreach($edit as $mapel) : ?>
                        <form action="<?= site_url("admin/editMapel/".$mapel['id_md'])?>" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input name="nama_mapel" type="text" class="form-control" value="<?= $mapel['nama_mapel']?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <select name="guru" data-placeholder="<?= $mapel{'nama'}?>" class="chosen-select" tabindex="-1" required>
                                            <option selected="selected" value="<?= $mapel['guru']?>"></option>
                                            <?php foreach($guru as $guru) : ?>
                                            <option value="<?= $guru['nip_nik']?>"><?= $guru{'nama'}?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <select name="kelas" data-placeholder="<?= $mapel['kelas'].' '.$mapel['tahun']?>" class="chosen-select" tabindex="-1" required>
                                            <option selected="selected" value="<?= $mapel['kd_kelas']?>"></option>
                                            <?php foreach($kelas as $kls) :?>
                                            <option value="<?= $kls['kd_kelas']?>"><?= $kls['kelas'].' '.$kls['tahun']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="payment-adress">
                                        <a class="btn btn-danger" href="<?= site_url("admin/daftarMapel")?>">Batal</a>
                                        <button name="submitEdit" type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
