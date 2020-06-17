<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Deskripsi Ujian</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="<?= site_url("guru/addUjian")?>" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload" method="post">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="nama" type="text" class="form-control" placeholder="Nama Ujian" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="mapel" class="form-control" required>
                                                                <option value="none" selected="" disabled="">Mata Pelajaran</option>
                                                                <?php foreach($mapel as $mpl) :?>
                                                                <option value="<?= $mpl['kd_mapel']?>"><?= $mpl['nama_mapel']?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <select multiple name="kelas[]" data-placeholder="Kelas" class="chosen-select" tabindex="-1" required>
                                                                <?php foreach($kelas as $kls) :?>
                                                                <option value=""></option>
                                                                <option value="<?= $kls['kd_kelas']?>"><?= $kls['kelas'].' '.$kls['tahun']?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="tanggal" id="tgl" type="text" class="form-control" placeholder="Tanggal Pelaksanaan Ujian" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class='col-sm-3'>
                                                        <input type='text' name="mulai" class="form-control" id='mulai' onclick="$('#mulai').datepicker('show');" placeholder='Mulai' required/>
                                                    </div>
                                                    <div class='col-sm-3'>
                                                        <input type='text' name="selesai" class="form-control" id='selesai' onclick="$('#selesai').datepicker('show');" placeholder='Selesai' required/>
                                                    </div>
                                                    <script>
                                                    $(function(){
                                                        $('#tgl').datetimepicker({
                                                            format: 'L'
                                                        });
                                                        $('#mulai').datetimepicker({
                                                            format: 'LT'
                                                        });
                                                        $('#selesai').datetimepicker({
                                                            format: 'LT'
                                                        });
                                                    });
                                                    </script>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="kkm" type="number" class="form-control" placeholder="Nilai KKM" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="payment-adress">
                                                            <button name="next" class="btn btn-primary waves-effect waves-light" type="submit">Berikutnya</button>
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
                </div>
            </div>
        </div>
    </div>
</div>