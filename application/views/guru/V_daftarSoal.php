<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#soal">Bank Soal</a></li>
                    </ul>
                    <a id="addSoal" href="#" onclick="return addSoal();">Tambah Soal</a>
                    <script>
                        $("#addSoal").click(function() {
                            $('html, body').animate({
                                scrollTop: $("#tambahSoal").offset().top
                            }, 500);
                        });
                    </script>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="soal">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro table-responsive">
                                        <input style="display:none;" id="jmlhSoal" type="text" value="<?= $jmlsoal;?>">
                                            <?php $i = 0; $noSoal = 0; foreach($soal as $soal) :?>
                                                <input style="display:none;" id=<?= "idSoal".$i++;?> type="text" value="<?= $soal['id_soal']?>">
                                                <input style="display:none;" id="<?= "kunci".$soal['id_soal']?>" type="text" value="<?= $soal['kunciJawaban']?>">
                                                <table style="width:100%">
                                                    <tr style="vertical-align:top;">
                                                        <td style="width:3.5%; padding-top:2px; text-align:center;"><?= ++$noSoal.".";?></td>
                                                        <td style="width:85%; text-align:justify; text-justify:inter-word"><?= $soal['pertanyaan']?></td>
                                                        <td></td>
                                                        <td rowspan="5" style="vertical-align:middle; text-align:right; padding-right:25px;">
                                                            <a href="<?= site_url("guru/editSoal/".$soal["id_soal"])?>" class="btn btn-light"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            <a class="delete-it" data-id="<?= $soal["id_soal"]?>" href="" class="btn btn-light"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                            <script type="text/javascript">
                                                                $('.delete-it').on('click', function (e) {
                                                                    e.preventDefault();
                                                                    href = $(this).attr('hapusSoal/');
                                                                    var id = $(this).data('id');
                                                                    return bootbox.confirm({ 
                                                                        size: "small",
                                                                        locale: "id",
                                                                        message: "Yakin menghapus data ini?",
                                                                        callback: 
                                                                            function(result){
                                                                                if(result)
                                                                                    window.location = 'hapusSoal/' + id;
                                                                            }
                                                                    });
                                                                });
                                                            </script>
                                                        </td>
                                                    </tr>
                                                    <tr style="vertical-align:top;">
                                                        <td></td>
                                                        <td style="display:inline-table; margin-right:10px;"><p id="<?= "jwbnA".$soal['id_soal']?>">A.</p></td>
                                                        <td style="display:inline-table;"><?= $soal['jawabanA']?></td>                                                        
                                                    </tr>
                                                    <tr style="vertical-align:top;">
                                                        <td></td>
                                                        <td style="display:inline-table; margin-right:10px;"><p id="<?= "jwbnB".$soal['id_soal']?>">B.</p></td>
                                                        <td style="display:inline-table;"><?= $soal['jawabanB']?></td>
                                                    </tr>
                                                    <tr style="vertical-align:top;">
                                                        <td></td>
                                                        <td style="display:inline-table; margin-right:10px;"><p id="<?= "jwbnC".$soal['id_soal']?>">C.</p></td>
                                                        <td style="display:inline-table;"><?= $soal['jawabanC']?></td>
                                                    </tr>
                                                    <tr style="vertical-align:top;">
                                                        <td></td>
                                                        <td style="display:inline-table; margin-right:10px;"><p id="<?= "jwbnD".$soal['id_soal']?>">D.</p></td>
                                                        <td style="display:inline-table;"><?= $soal['jawabanD']?></td>
                                                    </tr>
                                                </table>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var x = document.getElementById("jmlhSoal").value;
                        // var z = document.getElementById("jawaban");
                        // z.innerHTML = x;
                        for (var index = 0; index < x; index++) {
                            var id = document.getElementById("idSoal"+index).value;
                            var kunci = document.getElementById("kunci"+id).value;
                            // var y = document.getElementById("kunciJwb"+id);
                            // y.value = kunci;
                            if (kunci == "a") {
                                document.getElementById("jwbnA"+id).style.fontWeight = "bold";
                            } else if (kunci === "b") {
                                document.getElementById("jwbnB"+id).style.fontWeight = "bold";
                            } else if (kunci === "c"){
                                document.getElementById("jwbnC"+id).style.fontWeight = "bold";
                            } else {
                                document.getElementById("jwbnD"+id).style.fontWeight = "bold";
                            }
                         }
                    </script>
                </div>
            </div>
            <script type="text/javascript">
                var xrow = document.getElementById("tabelSoal").rows.length;
                var btn = document.getElementById("simpan");
                if (xrow > 0) {
                    btn.style.display = "block";
                }
                function addSoal() {
                    var x = document.getElementById("tambahSoal");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    }
                }
            </script>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="tambahSoal" style="display:none;">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#tambahSoal">Tambah Soal</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="tambahSoal">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="<?= site_url("guru/addSoal")?>" class="dropzone dropzone-custom" id="demo1-upload" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group row">
                                                        <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                                        <div class="col-sm-8">
                                                            <select required name="mapel" class="form-control" >
                                                                <option value="none" selected="" disabled="">Mata Pelajaran</option>
                                                                <?php foreach($mapel as $mpl) :?>
                                                                <option value="<?= $mpl['kd_mapel']?>"><?= $mpl['nama_mapel']?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="pertanyaan" id="ckeditor"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jwbnA" class="col-sm-2 col-form-label">Jawaban A</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="jwbnA" id="ckeditora"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jwbnB" class="col-sm-2 col-form-label">Jawaban B</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="jwbnB" id="ckeditorb"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jwbnC" class="col-sm-2 col-form-label">Jawaban C</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="jwbnC" id="ckeditorc"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jwbnD" class="col-sm-2 col-form-label">Jawaban D</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="jwbnD" id="ckeditord"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kunci" class="col-sm-2 col-form-label">Kunci Jawaban</label>
                                                        <div class="col-sm-8">
                                                            <select name="kunci" class="form-control">
                                                                <option value="none" selected="" disabled="">Kunci Jawaban</option>
                                                                <option value="a">A</option>
                                                                <option value="b">B</option>
                                                                <option value="c">C</option>
                                                                <option value="d">D</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="payment-adress">
                                                            <button name="tambah" class="btn btn-primary waves-effect waves-light" type="submit">Tambah</button>
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