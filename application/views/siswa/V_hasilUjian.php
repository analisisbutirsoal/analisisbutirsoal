        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list single-page-breadcome" style="margin: 20px 0px 0px 0px;">
                            <?php foreach ($desk as $desk): ?>
                                <h4 style="display:inline-block;"><?=$desk['nama_ujian'] . ' - ' . $desk['nama_mapel'] . ' - ' . $desk['kelas'] . ' ' . $desk['tahun']?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="static-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                        <div class="sparkline8-list">
                            <?php foreach ($siswa as $sis): ?>
                            <table class="table-condensed">
                                    <tr>
                                        <td><b>Nama</b></td>
                                        <td> : </td>
                                        <td><?=$sis['nama']?></td>
                                    </tr>
                                    <tr>
                                        <td><b>No Induk</b></td>
                                        <td> : </td>
                                        <td><?=$sis['nisn']?></td>
                                    </tr>
                            </table>
                            <?php endforeach;?>
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center" colspan="4"><h3>Hasil</h3></th>
                                </tr>
                                <tr scope="col">
                                    <th class="text-center">Jumlah Soal</th>
                                    <th class="text-center">Benar</th>
                                    <th class="text-center">Salah</th>
                                    <th class="text-center">Kosong</th>
                                </tr>
                                <tr>
                                <?php foreach ($nilai as $nilai) : ?>
                                    <td class="text-center"><?= $nilai['benar']+$nilai['salah']?></td>
                                    <td class="text-center"><?= $nilai['benar']?></td>
                                    <td class="text-center"><?= $nilai['salah']?></td>
                                    <td class="text-center"><?= $nilai['kosong']?></td>
                                <?php endforeach;?>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="4"><h4><?= "Nilai : ".$nilai['nilai']."<br>"?></h4><h4><?= ($nilai['nilai'] > $desk['nilaiKKM'])?"(Tuntas)":"(Belum Tuntas)"?></h4></td>
                                </tr>
                            </table>
                            <div class="payment-adress" style="text-align:center">
                                <input class="btn btn-primary waves-effect waves-light" action="action" onclick="window.history.go(-1); return false;" type="submit" value="Kembali"/>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>