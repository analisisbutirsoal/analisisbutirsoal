        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list single-page-breadcome" style="margin: 20px 0px 0px 0px;">
                            <?php foreach ($desk as $desk): ?>
                                <h4 style="display:inline-block;"><?=$desk['nama_ujian'] . ' - ' . $desk['nama_mapel'] . ' - ' . $desk['kelas'] . ' ' . $desk['tahun']?></h4>
                                <input style="display:none;" id="done" type="text" value="<?= date('M j, Y ', strtotime($desk['tgl_ujian'])).' '.$desk['selesai_ujian']?>">
                                <h4 id="timer" style="display:inline-block; float:right;"></h4>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="static-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="sparkline8-list">
                            <p>Pilihlah salah satu jawaban yang paling tepat!</p>
                            <div class="review-content-section">
                                <form id="formUjian" name="formUjian" action="<?= site_url("siswa/koreksiUjian/".$this->session->userdata('kd_ujian')."/".$this->session->userdata('id_ud'))?>" method="post" >
                                    <div id="dropzone1" class="pro-ad addcoursepro table-responsive">
                                        <?php $noSoal = 0; foreach($soal as $soal) :?>
                                            <table style="width:100%">
                                                <tr style="vertical-align:top;">
                                                    <input name="id_soal[]" type="text" value="<?= $soal['id_soal']?>" style="display:none;">
                                                    <td style="width:3%"><?= ++$noSoal.".";?></td>
                                                    <td colspan="2"><?= $soal['pertanyaan']?></td>
                                                    <td rowspan = "5" style="vertical-align:middle">
                                                        <div class="form-group row" style="float:right;">
                                                            <div class="col-sm-1">
                                                                <input onclick="return checkReview(<?= $noSoal?>);" type="checkbox" id="<?= "review".$noSoal?>">
                                                            </div>
                                                            <label for="review" class="col-sm-1" style="font-weight:normal">Tandai</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr style="vertical-align:top;">
                                                    <td></td>
                                                    <td style="width:3%"><input onclick="return checkJawaban(<?= $noSoal?>);" type="radio" id="<?= 'jawabanA'.$noSoal?>" name="<?= "jawaban".$soal['id_soal']?>" value="a"></td>
                                                    <td style="display:inline-table; margin-right:10px;"><p id="<?= "jwbnA".$soal['id_soal']?>">A.</p></td>
                                                    <td style="display:inline-table;"><?= $soal['jawabanA']?></td>                                                        
                                                </tr>
                                                <tr style="vertical-align:top;">
                                                    <td></td>
                                                    <td style="width:3%"><input onclick="return checkJawaban(<?= $noSoal?>);" type="radio" id="<?= 'jawabanB'.$noSoal?>" name="<?= "jawaban".$soal['id_soal']?>" value="b"></td>
                                                    <td style="display:inline-table; margin-right:10px;"><p id="<?= "jwbnB".$soal['id_soal']?>">B.</p></td>
                                                    <td style="display:inline-table;"><?= $soal['jawabanB']?></td>
                                                </tr>
                                                <tr style="vertical-align:top;">
                                                    <td></td>
                                                    <td style="width:3%"><input onclick="return checkJawaban(<?= $noSoal?>);" type="radio" id="<?= 'jawabanC'.$noSoal?>" name="<?= "jawaban".$soal['id_soal']?>" value="c"></td>
                                                    <td style="display:inline-table; margin-right:10px;"><p id="<?= "jwbnC".$soal['id_soal']?>">C.</p></td>
                                                    <td style="display:inline-table;"><?= $soal['jawabanC']?></td>
                                                </tr>
                                                <tr style="vertical-align:top;">
                                                    <td></td>
                                                    <td style="width:3%"><input onclick="return checkJawaban(<?= $noSoal?>);" type="radio" id="<?= 'jawabanD'.$noSoal?>" name="<?= "jawaban".$soal['id_soal']?>" value="d"></td>
                                                    <td style="display:inline-table; margin-right:10px;"><p id="<?= "jwbnD".$soal['id_soal']?>">D.</p></td>
                                                    <td style="display:inline-table;"><?= $soal['jawabanD']?></td>
                                                </tr>
                                            </table>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="col">
                                        <div class="payment-adress" style="text-align:center">
                                            <input type="text" name="timedone" id="timedone" style="display:block">
                                            <button onclick="return submitFunction();" id="submitUjian" name="btnSubmit" class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div id="tabreview" class="sparkline9-list mt-b-30 res-mg-t-30 analysis-progrebar-ctn" style="padding: 20px 0 20px 22px;">
                            <input id="jmlsoal" type="text" value="<?=$jmlsoal?>" style="display:none">
                        </div>
                    </div>
                    <script type="text/javascript">
                        window.onload = function () { 
                            document.getElementById('dropzone1').style.overflowY="auto";
                            document.getElementById('dropzone1').style.height="350px";
                        }
                        var jmlsoal = document.getElementById("jmlsoal").value;
                        var number = 1;
                        for (let index = 0; index < jmlsoal; index++) {
                            var b = document.createElement('button');
                            b.setAttribute('class', 'btn btn-light');
                            b.setAttribute('id', 'btn'+number);
                            b.innerHTML = number++;
                            b.style.marginRight = "11px";
                            b.style.marginBottom = "15px";
                            b.style.width = "40px";

                            var wrapper = document.getElementById("tabreview");
                            wrapper.appendChild(b);
                        }
                        function checkReview(noSoal) {
                            var checkbox = document.getElementById("review"+noSoal);
                            var radioA = document.getElementById('jawabanA'+noSoal);
                            var radioB = document.getElementById('jawabanB'+noSoal);
                            var radioC = document.getElementById('jawabanC'+noSoal);
                            var radioD = document.getElementById('jawabanD'+noSoal);
                            var edit = document.getElementById('btn'+noSoal);
                            if (checkbox.checked == true) {
                                edit.setAttribute('class', 'btn btn-warning');
                            }else{
                                if (radioA.checked || radioB.checked || radioC.checked || radioD.checked == true) {
                                    edit.setAttribute('class', 'btn btn-success');
                                } else {
                                    edit.setAttribute('class', 'btn btn-light');
                                }
                            }
                        }
                        function checkJawaban(noSoal) {
                            var radioA = document.getElementById('jawabanA'+noSoal);
                            var radioB = document.getElementById('jawabanB'+noSoal);
                            var radioC = document.getElementById('jawabanC'+noSoal);
                            var radioD = document.getElementById('jawabanD'+noSoal);
                            var edit = document.getElementById('btn'+noSoal);
                            if (radioA.checked || radioB.checked || radioC.checked || radioD.checked == true) {
                                edit . setAttribute('class', 'btn btn-success');
                            }
                        }
                    </script>
                    <script type="text/javascript">
                        var done = document.getElementById('done').value;
                        var countDownDate = new Date(done).getTime();
                        var x = setInterval(function() {
                        var now = new Date().getTime();
                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        // Display the result in the element with id="demo"
                        document.getElementById("timer").innerHTML = hours + "h "
                        + minutes + "m " + seconds + "s ";
                        // If the count down is finished, write some text
                            if (distance < 0) {
                                clearInterval(x);
                                document.getElementById("timer").innerHTML = "EXPIRED";
                                submitFunction();
                            }
                        }, 1000);
                        function submitFunction() {
                            document.getElementById("formUjian").submit();
                            var tdy = new Date();
                            document.getElementById("timedone").value = tdy.getHours()+':'+tdy.getMinutes()+':'+tdy.getSeconds();
                        }
                    </script>
                </div>
            </div>
        </div>