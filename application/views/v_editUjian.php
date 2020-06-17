<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Deskripsi Ujian</a></li>
                    </ul>
                    <a id="edit" style="display:block;" onclick="return showButton();">Edit Deskripsi Ujian</a>
                    <script>
                        function showButton() {
                            var w = document.getElementById("btn2");
                            var y = document.getElementById("edit");
                            if (w.style.display === "none") {
                                w.style.display = "block";
                                y.style.display = "none";
                                document.querySelector('input[name=nama]').readOnly = false;
                                document.getElementById("mapel").disabled = false;
                                document.getElementById("kelas").disabled = false;
                                document.querySelector('input[name=tanggal]').readOnly = false;
                                document.querySelector('input[name=mulai]').readOnly = false;
                                document.querySelector('input[name=selesai]').readOnly = false;
                                document.querySelector('input[name=kkm]').readOnly = false;
                            }
                        }
                        function cancelButton() {
                            document.getElementById("edit").style.display = "block";
                            document.getElementById("btn2").style.display = "none";
                            document.querySelector('input[name=nama]').readOnly = true;
                            document.getElementById("mapel").disabled = true;
                            document.getElementById("kelas").disabled = true;
                            document.querySelector('input[name=tanggal]').readOnly = true;
                            document.querySelector('input[name=mulai]').readOnly = true;
                            document.querySelector('input[name=selesai]').readOnly = true;
                            document.querySelector('input[name=kkm]').readOnly = true;
                        }
                    </script>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                        <?php foreach($desk as $desk) :?>
                                            <form action="<?= site_url("guru/editUjian/").$desk['kd_ujian']."/".$desk['kd_kelas']?>" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload" method="post">
                                            <input style="display:none;" name="id_ud" type="text" value="<?= $desk['id_ud']?>">
                                                <div class="row">
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-3 col-form-label">Nama Ujian</label>
                                                        <div class="col-sm-6">
                                                            <input name="nama" type="text" class="form-control" value="<?= $desk['nama_ujian']?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="mapel" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                                        <div class="col-sm-6">
                                                            <select id="mapel" name="mapel" class="form-control" tabindex="-1" disabled>
                                                                <option value="<?= $desk['kd_mapel']?>" selected><?= $desk['nama_mapel']?></option>
                                                                <?php foreach($mapel as $mpl) :?>
                                                                <option value="<?= $mpl['kd_mapel']?>"><?= $mpl['nama_mapel']?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                                                        <div class="col-sm-6">
                                                            <select id="kelas" name="kelas" class="form-control" tabindex="-1" disabled>
                                                                <option value="<?= $desk['kd_kelas']?>" selected><?= $desk['kelas'].' '.$desk['tahun']?></option>
                                                                <?php foreach($kelas as $kls) :?>
                                                                <option value="<?= $kls['kd_kelas']?>"><?= $kls['kelas'].' '.$kls['tahun']?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pelaksanaan Ujian</label>
                                                        <div class="col-sm-6">
                                                            <input name="tanggal" id="tgl" type="text" class="form-control" value="<?= date("m/d/yy", strtotime($desk['tgl_ujian']));?>" readonly>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="mulai" class="col-sm-3 col-form-label">Waktu Mulai Ujian</label>
                                                        <div class="col-sm-3">
                                                            <input type='text' name="mulai" class="form-control" id='mulai' onclick="$('#mulai').datepicker('show');" value='<?= $desk['mulai_ujian']?>' readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="selesai" class="col-sm-3 col-form-label">Waktu Selesai Ujian</label>
                                                        <div class="col-sm-3">
                                                            <input type='text' name="selesai" class="form-control" id='selesai' onclick="$('#selesai').datepicker('show');" value='<?= $desk['selesai_ujian']?>' readonly/>
                                                        </div>
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
                                                    <div class="form-group row">
                                                        <label for="jumlahSoal" class="col-sm-3 col-form-label">Jumlah Soal</label>
                                                        <div class="col-sm-6">
                                                            <input name="jumlahSoal" id="jumlahSoal" type="number" class="form-control" value="<?= $desk['jumlah_soal']?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kkm" class="col-sm-3 col-form-label">Nilai KKM</label>
                                                        <div class="col-sm-6">
                                                            <input name="kkm" type="number" class="form-control" value="<?= $desk['nilaiKKM']?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="btn2" style="display:none;">
                                                    <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="payment-adress">
                                                            <a class="btn btn-danger" id="cancel" onclick="return cancelButton();">Batal</a>
                                                            <button name="submitEdit" type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php endforeach;?>
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
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#soal">Soal Ujian</a></li>
                    </ul>
                    <a href="<?= site_url("guru/pilihSoal")?>">Tambah Soal dari Bank Soal</a>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="soal">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro table-responsive">
                                        <input style="display:none;" id="jmlhSoal" type="text" value="<?= $jmlsoal;?>">
                                            <?php $i = 0; $noSoal=0; foreach($soal as $soal) :?>
                                                <input style="display:none;" id=<?= "idSoal".$i++;?> type="text" value="<?= $soal['id_soal']?>">
                                                <input style="display:none;" id="<?= "kunci".$soal['id_soal']?>" type="text" value="<?= $soal['kunciJawaban']?>">
                                                <table style="width:100%">
                                                    <tr style="vertical-align:top;">
                                                        <td style="width:3%"><?= ++$noSoal;?></td>
                                                        <td><?= $soal['pertanyaan']?></td>
                                                        <td></td>
                                                        <td rowspan="5" style="vertical-align:middle; text-align:right; padding-right:25px;">
                                                            <a href="<?= site_url("guru/hapusSoalUjian/".$soal["id_soal"])?>" class="btn btn-light"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
        </div>
    </div>
</div>