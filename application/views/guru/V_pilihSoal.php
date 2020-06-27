<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#soal">Bank Soal</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="soal">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro table-responsive">
                                        <input style="display:none;" id="jmlhSoal" type="text" value="<?= $jmlsoal;?>">
                                        <p id="emptyText"></p>
                                            <?php $i = 0; $noSoal = 0; foreach($soal as $soal) :?>
                                                <input style="display:none;" id=<?= "idSoal".$i++;?> type="text" value="<?= $soal['id_soal']?>">
                                                <input style="display:none;" id="<?= "kunci".$soal['id_soal']?>" type="text" value="<?= $soal['kunciJawaban']?>">
                                                <form action="<?= site_url("guru/addSoalUjian")?>" method="post">
                                                    <table style="width:100%">
                                                        <tr style="vertical-align:top;">
                                                            <td rowspan = "5" style="width:3%; vertical-align:middle"><input type="checkbox" name="id_soal[]" id="id_soal" value=<?= $soal['id_soal']?>></td>
                                                            <td style="width:3%"><?= ++$noSoal.".";?></td>
                                                            <td><?= $soal['pertanyaan']?></td>
                                                            <td></td>
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
                                                    <?php endforeach; ?>
                                                    <br>
                                                    <div class="col-sm-6">
                                                        <div class="payment-adress">
                                                            <input class="btn btn-danger" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Batal"/>
                                                            <button id="btn" name="tambah" class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
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
                    <script type="text/javascript">
                        var x = document.getElementById("jmlhSoal").value;
                        var btn = document.getElementById("btn");
                        if (x == 0) {
                            document.getElementById("emptyText").innerHTML = "Belum ada soal ditambahkan";
                            btn.style.display = "none";
                        }
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
        </div>
    </div>
</div>