<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <div id="dropzone1" class="pro-ad">
                        <h3>Edit Info Kelas</h3>
                        <?php foreach ($edit as $kls) : ?>
                        <form action="<?= site_url("admin/editKelas")?>" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                            <div class="form-group">
                                <div class="row">
                                    <?php $pisah = explode(" ", $kls['kelas']);?>
                                    <div class="col-lg-1 col-md-6 col-sm-6 col-xs-6">
                                        <select name="kelas" data-placeholder="<?= $pisah[0];?>" class="chosen-select" tabindex="-1" required>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                                        <input name="nmkelas" type="text" class="form-control" value="<?= $pisah[1];?>" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                                        <div class="input-mark-inner mg-b-22">
                                            <input name="tahun" type="text" class="form-control" data-mask="9999/9999" value="<?= $kls['tahun']?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="payment-adress">
                                        <a class="btn btn-danger" href="<?php echo base_url('index.php/' . strtolower($this->session->userdata('level')));?>">Batal</a>
                                        <button name="submit" type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
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
