<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Edit Soal</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="tambahSoal">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                        <?php foreach($soal as $soal) : ?>
                                            <form action="<?= site_url("guru/editSoal/".$soal['id_soal'])?>" class="dropzone dropzone-custom" id="demo1-upload" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group row">
                                                        <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="pertanyaan" id="ckeditor"><?= $soal['pertanyaan']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jwbnA" class="col-sm-2 col-form-label">Jawaban A</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="jwbnA" id="ckeditora"><?= $soal['jawabanA']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jwbnB" class="col-sm-2 col-form-label">Jawaban B</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="jwbnB" id="ckeditorb"><?= $soal['jawabanB']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jwbnC" class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-8">
                                                            <textarea name="jwbnC" id="ckeditorc"><?= $soal['jawabanC']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jwbnD" class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-8">
                                                            <textarea name="jwbnD" id="ckeditord"><?= $soal['jawabanD']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kunci" class="col-sm-2 col-form-label">Kunci Jawaban</label>
                                                        <div class="col-sm-8">
                                                            <select name="kunci" class="form-control">
                                                                <option value="<?= $soal['kunciJawaban']?>" selected="" disabled=""><?= strtoupper($soal['kunciJawaban'])?></option>
                                                                <option value="a">A</option>
                                                                <option value="b">B</option>
                                                                <option value="c">C</option>
                                                                <option value="d">D</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="payment-adress">
                                                            <input class="btn btn-danger" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Batal"/>
                                                            <button name="simpan" class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    $(function () {
                                                        CKEDITOR.replace('ckeditor',{ filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder/browse.php');?>',
                                                            height: '200px'             
                                                        });
                                                        CKEDITOR.replace('ckeditora',{ filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder/browse.php');?>',
                                                            height: '200px'             
                                                        });
                                                        CKEDITOR.replace('ckeditorb',{ filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder/browse.php');?>',
                                                            height: '200px'             
                                                        });
                                                        CKEDITOR.replace('ckeditorc',{ filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder/browse.php');?>',
                                                            height: '200px'             
                                                        });
                                                        CKEDITOR.replace('ckeditord',{ filebrowserImageBrowseUrl : '<?php echo base_url('asset/kcfinder/browse.php');?>',
                                                            height: '200px'             
                                                        });
                                                    });
                                                </script>
                                            </form>
                                        <?php endforeach; ?>
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